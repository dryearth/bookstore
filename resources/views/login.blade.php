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
				  <li><a href="#" class="active">Login</a></li>
				</ol>
			</div>
		</div>
	</div>
</div>
<!--/breadcrumbs-->
@stop
@section('contents')
<section id="form"><!--form-->
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
		@if (!isset($hasLogin))
			<div class="row">
					@if (!isset($success))
				<div class="col-sm-12">
					<div class="jumbotron">
					<p> Please identify your credencial before continue. </p>
					</div>
				</div>
				@endif
				<div class="col-sm-4 col-sm-offset-1">
					<!--login form-->
					<div class="login-form">
						<h2>Login to your account</h2>
						{!! Form::open(['url'=>'account/login','method'=>'post']) !!}
							@if (isset($lusername))
							{!! Form::text('username',$lusername,['placeholder'=>'Name']) !!}
							@else
							{!! Form::text('username',null,['placeholder'=>'Name']) !!}
							@endif
							{!! Form::password('password',['placeholder'=>'Your Password']) !!}
							<a href="{!! url('account/forgot') !!}" class>Forgot Password?</a>
							{!! Form::button('Login',['type'=>'submit','class'=>'btn btn-default']) !!}
						{!! Form::close() !!}
					</div>
					<!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<!--sign up form-->
					<div class="signup-form">
						<h2>New User Signup!</h2>
						{!! Form::open(['url'=>'account/register','method'=>'post']) !!}
							@if (isset($username))
							{!! Form::text('username' ,$username, ['placeholder'=>'Name']) !!}
							@else
							{!! Form::text('username' ,null, ['placeholder'=>'Name']) !!}
							@endif
							{!! Form::password('password', ['placeholder'=>'Your Password']) !!}
							@if (isset($secretquestion))
							{!! Form::text('secretquestion',$secretquestion, ['placeholder'=>'Reset Password Secret Question']) !!}
							@else
							{!! Form::text('secretquestion',null, ['placeholder'=>'Reset Password Secret Question']) !!}
							@endif
							@if (isset($secretanswer))
							{!! Form::text('secretanswer',$secretanswer,  ['placeholder'=>'Secret Answer']) !!}
							@else
							{!! Form::text('secretanswer',null,  ['placeholder'=>'Secret Answer']) !!}
							@endif
							<p><h3>Captcha:{!! captcha_img() !!}</h3></p>
							{!! Form::text('captcha',null,['placeholder'=>'Captcha Here']) !!}
							{!! Form::button('Signup', ['type'=>'submit','class'=>'btn btn-default']) !!}
						{!! Form::close() !!}
					</div>
					<!--/sign up form-->
				</div>
			</div>
		</div>
	@endif
</section><!--/form-->
@stop