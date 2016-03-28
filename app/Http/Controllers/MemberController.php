<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Category;
use App\Product;
use App\Member;
use Validator;
use Session;

class MemberController extends Controller {

    protected $request;

    public function __construct(Request $request) {
        $this->request = $request;
    }

	private function getCart(){
		if (! $this->request->session()->has('cart')){
			$this->request->session()->put( 'cart',[] );;
			$this->request->session()->save();
		}
		return $cart = $this->request->session()->get('cart');
	}
	public function getLogin(){
		return view('login')->with('cart',$this->getCart())
    						->with('username',null)
    						->with('secretquestion',null)
    						->with('secretanswer',null);
	}	
	public function postRegister(){
        $validator = Validator::make($this->request->all(), [
			'username'=>'required|unique:member,username|min:10|max:20',
			'password'=>'required|min:10|max:20',
			'secretquestion'=>'required|min:10|max:100',
			'secretanswer'=>'required|min:1|max:100',
            'captcha' => 'required|captcha'
        ],['captcha.captcha'=>'Your captcha is invalid.']);
        if ($validator->fails()){
        	return view('login')->with('cart',$this->getCart())
        						->with('ferrors',$validator->errors())
        						->with('username',$this->request->input('username'))
        						->with('secretquestion',$this->request->input('secretquestion'))
        						->with('secretanswer',$this->request->input('secretanswer'));
        }else{
			Member::create($this->request->all());
			return view('login')->with('cart',$this->getCart())
								->with('success','Your account is successful created.');
        }
	}
    public function postLogin(){
        $validator = Validator::make($this->request->all(),[
                'username' => 'required|exists:member,username',
                'password' => 'required|exists:member,password,username,'.$this->request->input('username')
            ]);
        if ($validator->fails()){
            return view('login')->with('cart',$this->getCart())
                                ->with('ferrors',$validator->errors())
                                ->with('lusername',$this->request->input('username'));
            }else{
            $user = Member::where('username',$this->request->input('username'))->first();
            $user->login();
            return view('login')->with('cart',$this->getCart())
                                ->with('success','You are successful login.')
                                ->with('hasLogin',true);
            }
    }
    public function getLogout(){
        $user = Member::where('username',Session::get('user')['username'])->first();
        $user->logout();
        return view('login')->with('cart',$this->getCart())
                            ->with('success','You are successful logout.');
    }
    public function getAccount(){
        $user = Member::where('username',Session::get('user')['username'])->first();
        return view('account')->with('cart',$this->getCart())
                              ->with('user',$user->toArray());
    }

    public function updateAccount(){
        $user = Member::where('username',Session::get('user')['username'])->first();

        $validator = Validator::make($this->request->all(), [
            'secretquestion'=>'required|min:10|max:100',
            'secretanswer'=>'required|min:1|max:100',
            'password'    =>'required|exists:member,password,username,'.$user['username']
        ]);
        if ($validator->fails()){
            return view('account')->with('cart',$this->getCart())
                                ->with('ferrors',$validator->errors())
                                ->with('user',$user->toArray());
        }else{
            $user->secretanswer = $this->request->input('secretanswer');
            $user->secretquestion = $this->request->input('secretquestion');
            $user->save();
            $user->login();
            return view('account')->with('cart',$this->getCart())
                                ->with('user',$user->toArray())
                                ->with('success','Your account information has been updated.');
        }
    }

    public function updatePassword(){
        $user = Member::where('username',Session::get('user')['username'])->first();

        $validator = Validator::make($this->request->all(), [
            'password'    =>'required|exists:member,password,username,'.$user['username'],
            'new_password'=>'required|min:10|max:20'
        ]);
        if ($validator->fails()){
            return view('account')->with('cart',$this->getCart())
                                ->with('ferrors',$validator->errors())
                                ->with('user',$user->toArray());
        }else{
            $user->password = $this->request->input('new_password');
            $user->save();
            $user->login();
            return view('account')->with('cart',$this->getCart())
                                ->with('user',$user->toArray())
                                ->with('success','Your account password has been updated.');
        }
    }

    public function getForgotPassword(){
        return view('forgotpassword')->with('cart',$this->getCart());
    }

    public function postForgotPassword(){
        $validator = Validator::make($this->request->all(), [
            'username'    =>'required|min:10|max:20|exists:member,username'
        ]);
        if ($validator->fails()){
            return view('forgotpassword')->with('cart',$this->getCart())
                                         ->with('ferrors',$validator->errors());
        }else{
        $user = Member::where('username',$this->request->input('username'))->first();
            return view('resetpassword')->with('cart',$this->getCart())
                                         ->with('username',$user->username)
                                         ->with('secretquestion',$user->secretquestion);
        }
    }
    public function postResetPassword(){
        $user = Member::where('username',$this->request->input('username'))->first();
        $validator = Validator::make($this->request->all(), [
            'username'    =>'required|min:10|max:20|exists:member,username',
            'new_password'=>'required|min:10|max:20',
            'secretanswer'=>'required|min:1|max:100|exists:member,secretanswer,username,'.$user['username']
        ]);
        if ($validator->fails()){
            return view('resetpassword')->with('cart',$this->getCart())
                                         ->with('username',$user->username)
                                         ->with('secretquestion',$user->secretquestion)
                                         ->with('ferrors',$validator->errors());
        }else{
        $user = Member::where('username',$this->request->input('username'))->first();
        $user->password = $this->request->input('new_password');
        $user->save();
            return view('login')->with('cart',$this->getCart())
                                ->with('success','Your account password has been successfully reset.');
        }
    }

}
