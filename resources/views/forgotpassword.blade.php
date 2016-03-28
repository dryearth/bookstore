@extends('block.master')
@section('breadcrumbs')
<!--breadcrumbs-->
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li><a href="#">Account</a></li>
				  <li><a href="#">Forgot Password</a></li>
				</ol>
			</div>
		</div>
	</div>
</div>
<!--/breadcrumbs-->
@stop
@section('contents')
<div class="container">

		@if (isset($success))
		<div class="row">
		<div class="col-sm-12">
		    <div class="alert alert-success">
		    	{{ $success }}
		    </div>
		</div>
		</div>
		@endif
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
				<h2 class="heading">Password Reset
				<p>Please enter your username here before continue.</p></h2>
				<hr style="both:clear;width: 100%; color: black; height: 1px; background-color:black;" />
				<div class="shopper-info">
				{!! Form::open(['url'=>'account/forgot','method'=>'post']) !!}
							<h5>Your Username</h5>
							{!! Form::text('username',null, ['placeholder'=>'Your username']) !!}
							{!! Form::submit('Reset Password', ['type'=>'submit','class'=>'btn btn-primary']) !!}
				{!! Form::close() !!}
				</div>
			</div>
		</div>

</div>
@stop