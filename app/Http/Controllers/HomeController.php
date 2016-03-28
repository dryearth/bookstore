<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Category;
use Validator;
use App\Product;
use App\Order;
use App\OrderProduct;
use App\Review;
use Session;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

    protected $request;

    public function __construct(Request $request) {
        $this->request = $request;
    }

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$categories 	= Category::all();

		foreach ($categories as $Category){
			$ttl = Product::whereRaw('cid = '. $Category->id)->count();
			$Category['ttl'] = $ttl;
		}

		$products		= Product::all();
		foreach ($products as $product){
			$product['rating'] = $this->getRating($product['slug']);
		}


		return view('home')->with('categories',$categories)->with('products',$products)->with('cart',$this->getCart());
	}
	public function checkoutCart(){
		$cart = $this->getCart();
		$products = [];
		foreach($cart as $key => $value){
			$item	  = Product::findBySlug($key);
			$item['qty'] = $value;
			$item 	= $item->toArray();
			array_push($products,$item);
		}
		//http://www.regular-expressions.info/creditcard.html
		$input = $this->request->all();
		$endDate=date('Y-m-d', strtotime("+30 days"));
        $validator = Validator::make($input, [
			'receiver_name'=>'required|min:10|max:100',
			'address_1'=>'required|min:10|max:100',
			'phone'=>'required|digits:8',
			'credit_card_number'=>array('required',
				'regex:/^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14}|6(?:011|5[0-9][0-9])[0-9]{12}|3[47][0-9]{13}|3(?:0[0-5]|[68][0-9])[0-9]{11}|(?:2131|1800|35\d{3})\d{11})$/'),
			'csv'=>'required|digits:3',
			'delivery_date'=>'required|after:'.date('Y-m-d').'|before:'.$endDate
        ]);
        if (!$validator->fails()){
        	//TODO ! add cart , product , order information procedure
	        $ttlprice 	= 0;
			foreach($cart as $key => $value){
				$item	  = Product::findBySlug($key);
				$ttlprice += ($item['price'] * $value);
			}
        	$input['mid'] = Session::get('user')['id'];
        	$input['ttlprice'] = $ttlprice;

        	$input['payment_method'] = 'Online Payment';
        	$oid = Order::create($input)->id;
        	//TODO ! show order procedure
			foreach($cart as $key => $value){
				$item	  = Product::findBySlug($key);
        		OrderProduct::create(['oid'=>$oid,'pid'=>$item['id'],'qty'=>$value]);
			}
        	//oid','pid','qty'
			$this->request->session()->pull('cart');
        	//return view('order')->with('cart',$this->getCart());
        	return redirect('/order');
        }else{
        	return view('cart')->with('cart',$cart)->with('products',$products)->with('ferrors',$validator->errors())->with('input',$input);
        }
	}

	public function getOrder(){
		//get all asoociate order in a list
		//pass the data to the view
		$orders = Order::where('mid','=',Session::get('user')['id'])->get();
		return view('order')->with('cart',$this->getCart())->with('orders',$orders);
	}

	public function searchProduct(){
		//\DB::enableQueryLog();
		$str 				 = $this->request->all();
		if (empty(rtrim($str['title'])) || is_null($str['title'])){
			return redirect('/');
		}
		$products			= Product::where('title','like','%'.$str['title'].'%')->get();
		//dd(\DB::getQueryLog());
		return view('quicksearch')->with('products',$products)->with('searchTitle',$str['title'])->with('cart',$this->getCart());
	}

	public function getProduct($slug){
		$product 			= Product::findBySlug($slug);
		$reviews			= Review::where('pid','=',$product->id)->orderBy('created_at','desc')->get();
		$purchased			= false;
		if ( Session::get('user') !=null ){
			$orders 				= Order::where('mid','=',Session::get('user')['id'])->get();
			foreach ($orders as $order){
				$products 			= OrderProduct::where('oid','=',$order['id'])->get();
				foreach ($products as $pd){
					//dd($pd['id']);
					// echo ($pd['id']);
					// echo ('&nbsp;');
					// echo ($product['id']);
					// echo ('</br>');
					if ($pd['pid'] == $product['id']){$purchased = true;}
				}
			}
		}
		$reviewss			= Review::where('pid','=',$product->id)->where('username','=',Session::get('user')['username'])->get();
		if (count($reviewss)>0){
			$purchased = false;
		}
		//die();
		return view('product')->with('product',$product)->with('cart',$this->getCart())->with('reviews',$reviews)->with('purchased',$purchased)->with('rating',$this->getRating($slug));
	}

	public function getCategory($slug){
		$cat 				= Category::findBySlug($slug);
		$products			= Product::where('cid','=',$cat->id)->get();
		foreach ($products as $product){
			$product['rating'] = $this->getRating($product['slug']);
		}
		return view('categorylist')->with('products',$products)->with('searchType','Category')->with('searchName',$cat->name)->with('cart',$this->getCart());
	}

	public function getSort($type){
		$products = [];
		$sortName = 'N/A';
		switch($type){
			case 'new':
			$products			= Product::orderBy('created_at','desc')->get();
			$sortName			= 'Newest';
			break;
			case 'old':
			$products			= Product::orderBy('created_at','asc')->get();
			$sortName			= 'Oldest';
			break;
			case 'expensive':
			$products			= Product::orderBy('price','desc')->get();
			$sortName			= 'Most Expensive';
			break;
			case 'costly':
			$products			= Product::orderBy('price','asc')->get();
			$sortName			= 'Most Cost Effective';
			break;
		}
		return view('categorylist')->with('products',$products)->with('cart',$this->getCart())->with('searchType','Sort')->with('searchName',$sortName);
	}
	
	public function specialOffers(){
		$products			= Product::orderBy('price','asc')->get();
		$sortName			= 'Most Cost Effective';
		return view('categorylist')->with('products',$products)->with('cart',$this->getCart())->with('searchType','Shopper\'s Select')->with('searchName','Special Offers');
	}

	public function newArrivals(){
		$products			= Product::orderBy('created_at','asc')->get();
		$sortName			= 'Newest';
		return view('categorylist')->with('products',$products)->with('cart',$this->getCart())->with('searchType','Shopper\'s Select')->with('searchName','New Arrivals');
	}

	public function getPriceRange($low,$high){
		$products			= Product::whereBetween('price',[$low,$high])->get();
		return view('categorylist')->with('products',$products)->with('cart',$this->getCart())->with('searchType','Price Range')->with('searchName','$'.$low.' - $'. $high);
	}

	public function addProduct($slug){
		$cart = $this->getCart();
		$qty  = $this->request->input('qty');
		if (array_key_exists($slug, $cart)){
			$cart[$slug] += $qty;
		}else{
			$cart[$slug] = $qty;
		}
		$this->request->session()->put('cart',$cart);
		$this->request->session()->save();
		$product 		= Product::findBySlug($slug);
		//dd($this->request->session()->all());
		return redirect(url('/product/'.$slug));
	}

	private function getCart(){
		if (! $this->request->session()->has('cart')){
			$this->request->session()->put( 'cart',[] );;
			$this->request->session()->save();
		}
		return $cart = $this->request->session()->get('cart');
	}

	public function showCart(){
		$cart = $this->getCart();
		$products = [];
		foreach($cart as $key => $value){
			$item	  = Product::findBySlug($key);
			$item['qty'] = $value;
			$item 	= $item->toArray();
			array_push($products,$item);
		}
		return view('cart')->with('cart',$cart)->with('products',$products);
	}

	public function updateCart(){
		$cart = $this->getCart();
		$products = [];
		if ($this->request->input('action')=='add'){
			$cart[$this->request->input('slug')] += 1;
		}else if ($this->request->input('action')=='remove'){
			$cart[$this->request->input('slug')] -= 1;
			if ($cart[$this->request->input('slug')] == 0){
				unset ($cart[$this->request->input('slug')]);
			}
		}else if ($this->request->input('action')=='delete'){
			unset($cart[$this->request->input('slug')]);
		}
		$this->request->session()->put( 'cart',$cart );;
		$this->request->session()->save();
		foreach($cart as $key => $value){
			$item	  = Product::findBySlug($key);
			$item['qty'] = $value;
			$item 	= $item->toArray();
			array_push($products,$item);
		}
		return view('cart')->with('cart',$cart)->with('products',$products);
	}

	public function getOrderDetails($id){
		$orderProducts = OrderProduct::where('oid','=',$id)->get();
		$products =[];
		foreach($orderProducts as $op){
			$product = Product::where('id','=',$op->pid)->get()[0];
			$product['qty'] = $op['qty'];
			array_push($products,$product);
		}
		return view('orderdetails')->with('cart',$this->getCart())->with('products',$products)->with('id',$id);
	}

	public function addReview($slug){
		$review = $this->request->all();
		$review['username'] = Session::get('user')['username'];
		$review['pid'] = Product::findBySlug($slug)->id;
		Review::create($review);
		return redirect(url('/product/'.$slug));
	}

	private function getRating($slug){
		$product = Product::findBySlug($slug);
		$reviews = Review::where('pid','=',$product->id)->get();
		$rating  = null;
		if (count($reviews)>0){
			foreach($reviews as $review){
				$rating +=$review->rating;
			}
			$rating = round($rating / count($reviews),2);
		}
		return $rating;
	}
	public function getCheckOrder(){
		if (!Session::get('user')['isAdmin']){
			redirect('/account/login');
		}
		$orders = Order::get();
		return view('aorder')->with('cart',$this->getCart())->with('orders',$orders);
	}
	public function getCheckOrderId($oid){
		if (!Session::get('user')['isAdmin']){
			redirect('/account/login');
		}
		$orderProducts = OrderProduct::where('oid','=',$oid)->get();
		$products =[];
		foreach($orderProducts as $op){
			$product = Product::where('id','=',$op->pid)->get()[0];
			$product['qty'] = $op['qty'];
			array_push($products,$product);
		}
		return view('aorderdetails')->with('cart',$this->getCart())->with('products',$products)->with('id',$oid);
	}
	public function getCheckOrderDeliveried($oid){
		if (!Session::get('user')['isAdmin']){
			redirect('/account/login');
		}
		$order = order::where('id','=',$oid)->first();
		$order->handled = true;
		$order->save();
		$orders = Order::get();
		return view('aorder')->with('cart',$this->getCart())->with('orders',$orders);
	}
}
/*		$categories 		 = Category::all();
		foreach ($categories as $Category){
			$ttl 			 = Product::whereRaw('cid = '. $Category->id)->count();
			$Category'ttl'] = $ttl;
		}