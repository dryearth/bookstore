@extends ('block.master')

@section('breadcrumbs')
<!--breadcrumbs-->
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li><a href="#">Cart</a></li>
				</ol>
			</div>
		</div>
	</div>
</div>
<!--/breadcrumbs-->
@stop

@section ('contents')
<section id="cart_items">
		<div class="container">
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					@if (isset($products) && count($products)> 0)
					<tbody>
						<?php $ttl = 0;?>
						@foreach ($products as $product)
						<tr>
							<td>
								<a href="{{ url('product',$product['slug']) }}"><img class="img-responsive" src="{{ $product['imgsrc'] }}" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="{{ url('product',$product['slug']) }}">{{ $product['title'] }}</a></h4>
								<p>PID: {{ $product['id'] }}</p>
							</td>
							<td>
								<p>{{ $product['price'] }}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button" >
									{!! Form::open(['url'=>'cart','method'=>'post','style'=>'display:inline']) !!}
									<button type="submit" class="btn btn-fefault cart cart_quantity_down" style="margin:0"><i class="fa fa-plus"></i></button> 
									{!! Form::hidden('action','add') !!}
									{!! Form::hidden('slug',$product['slug']) !!}
									{!! Form::close() !!}
									{!! Form::open(['url'=>'cart','method'=>'post','style'=>'display:inline']) !!}
									<input class="cart_quantity_input" disabled="true" type="text" style="margin:0" name="quantity" value="{{ $product['qty'] }}" autocomplete="off" size="2">
									<button type="submit" class="btn btn-fefault cart cart_quantity_up" style="margin:0"><i class="fa fa-minus"></i></button> 
									{!! Form::hidden('action','remove') !!}
									{!! Form::hidden('slug',$product['slug']) !!}
									{!! Form::close() !!}
								</div>
							</td>
							<td>
								<p class="cart_total_price" style="font-size:20px" >{{ $product['qty']*$product['price'] }}</p>
							</td>
							<td>

									{!! Form::open(['url'=>'cart','method'=>'post','style'=>'display:inline']) !!}
									<button type="submit" class="btn btn-fefault cart cart_quantity_delete"><i class="fa fa-times"></i></button> 
									{!! Form::hidden('action','delete') !!}
									{!! Form::hidden('slug',$product['slug']) !!}
									{!! Form::close() !!}
									</td>
						</tr>
						<?php $ttl += $product['qty']*$product['price']; ?>
						@endforeach
					</tbody>
					@else
					<tbody>
						<tr><td class="cart_description" rowspan="2"><p>Your shopping cart is currently empty! Please come back later.</p></td></tr>
					</tbody>
					@endif
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	@if (isset($products) && count($products)> 0)
	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>${{$ttl}}</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>${{$ttl}}</span></li>
						</ul>
							@if (! Session::has('user'))
							<a class="btn btn-default check_out" href="{{ url('account','login') }}">Check Out</a>
							@endif
					</div>
				</div>
			</div>
		</div>

		@if (Session::has('user'))	
		<div class="container">
		@if (isset($ferrors))
		<div class="row">
		<div class="col-sm-12">
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($ferrors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		</div>
		</div>
		@endif
			<div class="col-sm-12">
					<div class="jumbotron">
					<h2 class="heading">Payment Information
					<p>logged in as <b>{{ Session::get('user')['username'] }}</b></p></h2>
					<hr style="both:clear;width: 100%; color: black; height: 1px; background-color:black;" />
					<div class="shopper-info">
					@if (isset($input))
					{!! Form::open(['url'=>'cart/checkout','method'=>'post']) !!}
								Shipping Order
								{!! Form::text('receiver_name',$input['receiver_name'], ['placeholder'=>'Receiver Name']) !!}
								{!! Form::text('address_1',$input['address_1'], ['placeholder'=>'Address 1']) !!}
								{!! Form::text('address_2',$input['address_2'], ['placeholder'=>'Address 2']) !!}
								{!! Form::text('phone',$input['phone'], ['placeholder'=>'Phone']) !!}
								</br>Online Payment Information
								{!! Form::text('credit_card_number',$input['credit_card_number'], ['placeholder'=>'16 Digits Credit Card Number']) !!}
								{!! Form::text('csv',$input['csv'], ['placeholder'=>'CSV']) !!}
								</br>Prefered Delivery Day
								{!! Form::input('date', 'delivery_date', $input['delivery_date'], ['class' => 'form-control', 'placeholder' => 'Date']) !!}
								{!! Form::submit('Continue', ['type'=>'submit','class'=>'btn btn-primary']) !!}
					{!! Form::close() !!}
					@else
					{!! Form::open(['url'=>'cart/checkout','method'=>'post']) !!}
								Shipping Order
								{!! Form::text('receiver_name',null, ['placeholder'=>'Receiver Name']) !!}
								{!! Form::text('address_1',null, ['placeholder'=>'Address 1']) !!}
								{!! Form::text('address_2',null, ['placeholder'=>'Address 2']) !!}
								{!! Form::text('phone',null, ['placeholder'=>'Phone']) !!}
								</br>Online Payment Information
								{!! Form::text('credit_card_number',null, ['placeholder'=>'16 Digits Credit Card Number']) !!}
								{!! Form::text('csv',null, ['placeholder'=>'CSV']) !!}
								</br>Prefered Delivery Day
								{!! Form::input('date', 'delivery_date', date('Y-m-d',strtotime('+1 Days')), ['class' => 'form-control', 'placeholder' => 'Date']) !!}
								{!! Form::submit('Continue', ['type'=>'submit','class'=>'btn btn-primary']) !!}
					{!! Form::close() !!}
					@endif
					</div>
				</div>
			</div>
		</div>
		@endif
	</section><!--/#do_action-->
	@endif
@stop