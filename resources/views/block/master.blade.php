<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Frank Lee | Online Bookstore</title>
    <link href="{{url ('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url ('css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{url ('css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{url ('css/price-range.css')}}" rel="stylesheet">
    <link href="{{url ('css/animate.css')}}" rel="stylesheet">
	<link href="{{url ('css/main.css')}}" rel="stylesheet">
	<link href="{{url ('css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="{{url ('js/html5shiv.js')}}"></script>
    <script src="{{url ('js/respond.min.js')}}"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{url ('images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{url ('images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{url ('images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{url ('images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{url ('images/ico/apple-touch-icon-57-precomposed.png')}}">
</head><!--/head-->

<body>
	<!--header-->
	<header id="header">
	<!--header_top-->
		<div class="header_top">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-book"></i> Online Bookstore Made By Frank <i class="fa fa-heart"> </i> Since 2015</a></li>
								
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="mailto:zongyanl@usc.edu"><i class="fa fa-envelope"></i> zongyanl@usc.edu</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/header_top-->
		@if (Session::has('user'))
		<!--Head menu-->
		<div class="header-middle">
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<!-- <a href="{{url ('/')}}"><h4>Reading starts here!</h4></a> -->
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="{{url ('/account')}}"><i class="fa fa-user"></i>Account</a></li>	
								@if (Session::get('user')['isAdmin'])		
								<li><a href="{{url ('/checkorder')}}"><i class="fa fa-user"></i>Check Order</a></li>			
								@endif
								<li><a href="{{url ('/cart')}}"><i class="fa fa-shopping-cart"></i>Cart({{ count($cart) }})</a></li>
								<li><a href="{{url ('/order')}}"><i class="fa fa-crosshairs"></i>Order</a></li>
								<li><a href="{{url ('/account/logout')}}"><i class="fa fa-lock"></i>Logout</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/Head menu-->
		@else
		<!--Head menu-->
		<div class="header-middle">
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="{{url ('/')}}"><h4>Reading starts here</h4></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="{{url ('/cart')}}"><i class="fa fa-shopping-cart"></i>Cart({{ count($cart) }})</a></li>
								<li><a href="{{url ('/account/login')}}"><i class="fa fa-lock"></i>Login</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/Head menu-->
		@endif
		<!--Shop menu-->
		<div class="header-bottom">
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{url ('/')}}">Home</a></li>
								<li><a href="{{url ('/new-arrivals')}}">New Arrivals</a></li>
								<li><a href="{{url ('/special-offers')}}">Special Offers</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							{!! Form::open(['url'=>'/search/','method'=>'get']) !!}
								@if (isset($searchTitle))
								{!! Form::text('title',$searchTitle,['placeholder'=>'Quick Search']) !!}
								@else
								{!! Form::text('title',null,['placeholder'=>'Quick Search']) !!}
								@endif
							{!! Form::close() !!}
						</div>
					</div>
				</div>
			</div>
			@yield('breadcrumbs')
		</div>
		<!--/Shop menu-->
	</header>
	<!--/header-->

	
	@yield('contents')

	
	<!--/Footer-->
	<footer>
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2015 Frank Lee. All rights reserved.</p>
					<p class="pull-right">Project @ Using Laravel</span></p>
				</div>
			</div>
		</div>
	</footer>
	<!--/Footer-->
	

  	<!--bottom-->
    <script src="{{url('js/jquery.js')}}"></script>
	<script src="{{url('js/bootstrap.min.js')}}"></script>
	<script src="{{url('js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{url('js/price-range.js')}}"></script>
    <script src="{{url('js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{url('js/main.js')}}"></script>
</body>
</html>
<!--/bottom-->