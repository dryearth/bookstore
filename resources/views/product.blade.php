@extends('block.master')
@section('breadcrumbs')
<!--breadcrumbs-->
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li><a href="#">Product</a></li>
				  <li><a href="#">{{ $product->title }}</a></li>
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
			<!--product-details-->
			<div class="col-sm-12 padding-right">
				<div class="product-details">
					<div class="col-sm-5">
						<div class="view-product">
							<img src="{{ $product->imgsrc }}" alt="" />
						</div>
					</div>

					<div class="col-sm-7">
						<!--/product-information-->
						<div class="product-information">
							<h1>{{ $product->title }}</h1>
							{!! Form::open(['url'=>'product/'.$product->slug,'method'=>'post']) !!}
							<span>
								<span>$ {{ $product->price }}</span>
								<label>Quantity:</label>
								{!! Form::text('qty',1) !!}
								<button type="submit" class="btn btn-fefault add-to-cart cart ">
									<i class="fa fa-shopping-cart"></i>
									Add to cart
								</button>
							</span>
							{!! Form::close() !!}
							<p><b>Product ID:</b>{{ $product->id }}</p>
							<p><b>Rating:</b>
							@if ($rating != null)
							{{$rating}}
							@else
							This product has no rating yet!
							@endif
							</p>
							<p><b>Availability:
							@if ($product->hadstock)
							</b> In Stock</p>
							@else
							</b> Sold Out</p>
							@endif
							<p><b>Company:</b> {{ $product->company }}</p>
							<p><b>Publisher:</b> {{ $product->publisher }}</p>
							<p><b>Created At:</b> {{ $product->created_at }}</p>
						</div>
						<!--/product-information-->
					</div>
				</div>
				<!--/product-details-->

					<!--review-tab-->
					<div class="category-tab shop-details-tab">
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#details" data-toggle="tab">Details</a></li>
								<li><a href="#reviews" data-toggle="tab">Reviews ({{count($reviews)}})</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="details" >
									<div class="col-sm-12">
										<p>{{ $product->detail }}</p>
									</div>
							</div>
							
							<div class="tab-pane fade in" id="reviews" >
								<div class="col-sm-12">
								<!--
									<ul>
										<li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
										<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
										<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
									</ul>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
								-->
								@if (count($reviews) == 0 )
								There are no reviews right now.
								@endif
								@foreach ($reviews as $review)
									<ul>
										<li><a href="#"><i class="fa fa-user"></i>{{ $review->username }}</a></li>
										<li><a href="#"><i class="fa fa-clock-o"></i>{{ $review->created_at }}</a></li>
										<li><a href="#"><i class="fa fa-star"></i>{{ $review->rating }}</a></li>
									</ul>
									<p>{{ $review->detail }}</p>
								@endforeach
								@if ($purchased)
									<p><b>Write Your Review</b></p>
									{!! Form::open(['url'=>'product/'.$product->slug.'/addreview','method'=>'post']) !!}
										<span>
											<label>Rating:</label>
											<input type="range" name="rating" min="1" max="5" step="1"/>
										</span>
										<textarea name="detail">What you wanna say? You can only write a reviews once only!</textarea>
										<button type="submit" class="btn btn-default pull-right">
											Submit
										</button>
									{!! Form::close() !!}
								@endif
								</div>
							</div>
						</div>
					</div>
					<!--/review-tab-->
					
					
				</div>
			</div>
		</div>
	</section>
@stop