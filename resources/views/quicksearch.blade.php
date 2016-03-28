@extends('block.master')
@section('breadcrumbs')
<!--breadcrumbs-->
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li><a href="#">Search : {{ $searchTitle }}</a></li>
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
			<!--recommended_items-->
			<div class="col-sm-12">
				<div class="features_items"><!--features_items-->
					@if (count($products)==1)
					<h2 class="title text-center">Total {{ count($products) }} Result</h2>
					@else
					<h2 class="title text-center">Total {{ count($products) }} Results</h2>
					@endif
					<!--product_details-->
					@foreach ($products as $product)
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{ $product->imgsrc }}" alt="" />
									<h2>{{ $product->price }}</h2>
									<p>{{ $product->title }}</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
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