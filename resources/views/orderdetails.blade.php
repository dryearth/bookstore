@extends ('block.master')

@section('breadcrumbs')
<!--breadcrumbs-->
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li><a href="#">Order</a></li>
				  <li><a href="#">Order ID : {{$id}}</a></li>
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
					<tbody>
						<?php $ttl = 0;?>
						@foreach ($products as $product)
						<tr>
							<td class="cart_product">
								<a href="{{ url('product',$product['slug']) }}"><img src="{{ $product['imgsrc'] }}" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="{{ url('product',$product['slug']) }}">{{ $product['title'] }}</a></h4>
								<p>PID: {{ $product['id'] }}</p>
							</td>
							<td class="cart_price">
								<p>$59</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<h4>{{ $product['qty'] }}</h4>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{ $product['qty']*$product['price'] }}</p>
							</td>
						</tr>
						<?php $ttl += $product['qty']*$product['price']; ?>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->
@stop