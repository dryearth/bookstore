@extends('block.master')
@section('breadcrumbs')
<!--breadcrumbs-->
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li><a href="#">All Products</a></li>
				</ol>
			</div>
		</div>
	</div>
</div>
<!--/breadcrumbs-->
@stop
@section('contents')
<section>
	<div class="container">
		<div class="row">
			<!--category-products-->
			<div class="col-sm-3">
				<div class="left-sidebar">
					<!--brands_products-->
					<div class="brands_products">
						<h2>Category</h2>
						<div class="brands-name">
							<ul class="nav nav-pills nav-stacked">
								@foreach ($categories as $category)
								<li><a href="{{ url ('/category/'.$category->slug) }}"> <span class="pull-right">({{ $category->ttl }})</span>{{ $category->name }}</a></li>
								@endforeach
							</ul>
						</div>
					</div>
					<!--/brands_products-->

					<!--sorting-->
					<div class="price-range">
						<h2>Sorting</h2>
						<div class="brands-name">
							<ul class="nav nav-pills nav-stacked">
								<li><a href="{{ url('sort/new') }}">Newest</a></li>
								<li><a href="{{ url('sort/old') }}">Oldest</a></li>
								<li><a href="{{ url('sort/expensive') }}">Most Expensive</a></li>
								<li><a href="{{ url('sort/costly') }}">Most Cost Effective</a></li>
							</ul>
						</div>
					</div>
					<!--/sorting-->

					<!--price_range-->
					<div class="price-range">
						<h2>Price Range</h2>
						<div class="well text-center">
							 <input type="text" class="span2" value="0,600" j="0" data-slider-max="600" data-slider-step="5" data-slider-value="[0,600]" id="sl2" ><br />
							 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
							 <a href="#" id="sl2_search" class="btn btn-primary cart">Show</a>
						</div>
					</div>
					<!--/price_range-->

				</div>
			</div>
			<!--/category-products-->

			<!--recommended_items-->
			<div class="col-sm-9 padding-right">
				<div class="features_items"><!--features_items-->
					<h2 class="title text-center">Product List</h2>
				
					<!--product_details-->
					@foreach ($products as $product)
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<a href="{{url('product',$product->slug)}}"><img src="{{ $product->imgsrc }}" alt="" />
									@if($product['rating'] != null)
									<p class="newarrival" style="background:#FE980F;font-weight:bold;color:#eee;padding:0px 5px;font-size:16px">
										@for ($i=0;$i<(int)$product['rating'];$i++)
											<span class="fa fa-star"></span>
										@endfor
										@if ( $product['rating'] > (int)$product['rating'])
											<span class="fa fa-star-o"></span>
										@endif
									</p>
									@endif
									<h2>{{ $product->price }}</h2>
									<p>{{ (strlen($product->title) > 35) ? substr($product->title,0,32).'...' : $product->title }}</p>
										<a href="{{url('product',$product->slug)}}" class="btn btn-default add-to-cart"><i class="fa fa-search"></i>Show</a>
									</a>
								</div>
							</div>
						</div>
					</div>
					<!--/product_details-->
					@endforeach

			<!--/recommended_items-->
				</div>
			</div>
		</div>
	</div>
</section>
@stop