@extends ('block.master')

@section('breadcrumbs')
<!--breadcrumbs-->
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li><a href="#">Account</a></li>
				</ol>
			</div>
		</div>
	</div>
</div>
<!--/breadcrumbs-->
@stop

@section('contents')
<!--breadcrumbs-->
<div class="container">
	<div class="row">
		<div class="col-sm-12">
				<div class="jumbotron">
				<h2 class="heading">Account Information : {{ $user['username'] }} 
				<h3>Registered at : {{ $user['created_at'] }}</h3></h2>
			</div>
		</div>

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
				<h2 class="heading">Account Information
				<p>You may update your account information here.</p></h2>
				<hr style="both:clear;width: 100%; color: black; height: 1px; background-color:black;" />
				<div class="shopper-info">
				{!! Form::open(['url'=>'account/updateaccount','method'=>'post']) !!}
							<h5>YOUR PASSWORD RESET SECRET QUESTION</h5>
							@if (isset($user['secretquestion']))
							{!! Form::text('secretquestion',$user['secretquestion'], ['placeholder'=>'Reset Password Secret Question']) !!}
							@else
							{!! Form::text('secretquestion',null, ['placeholder'=>'Reset Password Secret Question']) !!}
							@endif
							<h5>YOUR PASSWORD RESET SECRET ANSWER</h5>
							@if (isset($user['secretanswer']))
							{!! Form::text('secretanswer',$user['secretanswer'],  ['placeholder'=>'Secret Answer']) !!}
							@else
							{!! Form::text('secretanswer',null,  ['placeholder'=>'Secret Answer']) !!}
							@endif
							<h5>Please enter your current password before continue.</h5>
							{!! Form::password('password', ['placeholder'=>'Your Current Password']) !!}
							{!! Form::submit('Update My Account Information', ['type'=>'submit','class'=>'btn btn-primary']) !!}
				{!! Form::close() !!}
				</div>
			</div>
		</div>

		<div class="col-sm-12">
				<div class="jumbotron">
				<h2 class="heading">Reset Password
				<p>You may update your password here.</p></h2>
				<hr style="both:clear;width: 100%; color: black; height: 1px; background-color:black;" />
				<div class="shopper-info">
				{!! Form::open(['url'=>'account/updatepassword','method'=>'post']) !!}
							<h5>YOUR NEW PASSWORD</h5>
							{!! Form::password('new_password',  ['placeholder'=>'New Password']) !!}
							<!--<h5>REPEAT YOUR NEW PASSWORD </h5>
							{!! Form::text('password',null,  ['placeholder'=>'Repeat New Password']) !!}-->
							<h5>Please enter your current password before continue.</h5>
							{!! Form::password('password', ['placeholder'=>'Your Current Password']) !!}
							{!! Form::submit('Update My Password', ['type'=>'submit','class'=>'btn btn-primary']) !!}
				{!! Form::close() !!}
				</div>
			</div>
		</div>

	</div>
</div>
<!--/breadcrumbs-->
@stop