@extends ('block.master')

@section('breadcrumbs')
<!--breadcrumbs-->
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li><a href="#">Check Order</a></li>
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
<div class="row">
<div class="table-responsive cart_info">
		<table class="table table-condensed table-hover">
			<thead>
				<tr class="cart_menu" style="font-size:12px">
					<td class="description">Order ID</td>
					<td class="description">Delivered</td>
					<td class="description">Total Price</td>
					<td class="description">Receiver Name</td>
					<td class="description">Address</td>
					<td class="description">Phone</td>
					<td class="description">Payment Method</td>
					<td class="description">Proposed Delivery Date</td>
					<td class="description">Purchased Date</td>
				</tr>
			</thead>
			<tbody>
@foreach ($orders as $order)
				<tr>
				<td>{{ $order->id }}</td>
				@if ($order->handled)
				<td>Yes</td>
				@else
				<td>No</td>
				@endif
				<td>{{ $order->ttlprice }}</td>
				<td>{{ $order->receiver_name }}</td>
				<td>{{ $order->address_1 }}
				@if (!empty($order->address_2))
				</br>{{ $order->address_2 }}
				@endif
				</td>
				<td>{{ $order->phone }}</td>
				<td>{{ $order->payment_method }}</td>
				<td>{{ date('Y-m-d',strtotime($order->delivery_date)) }}</td>
				<td>{{ $order->created_at }}&nbsp;<a href="{{ url('checkorder/'.$order->id) }}" class="btn btn-primary"><span class="fa fa-search"></span></a>
				@if ($order->handled == false)
				<a href="{{ url('deliverorder/'.$order->id) }}" class="btn btn-primary"><span class="fa fa-rocket"></span></a>
				@endif
				</td>
				</tr>
@endforeach
			</tbody>
		</table>
	</div>
	</div>
</div>
</section>
@stop