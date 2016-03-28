@extends('block.master')
@section('breadcrumbs')
<!--breadcrumbs-->
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li><a href="#">{{ $searchType }}</a></li>
				  <li><a href="#">{{ $searchName }}</a></li>
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
									<a href="{{url('product',$product->slug)}}"><img src="{{ $product->imgsrc }}" alt="" />
									<h2>{{ $product->price }}</h2>
									<p>{{ (strlen($product->title) > 35) ? substr($product->title,0,32).'...' : $product->title }}</p>
									<a href="{{url('product',$product->slug)}}" class="btn btn-default add-to-cart"><i class="fa fa-search"></i>Show</a>
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