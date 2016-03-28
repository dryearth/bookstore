		<!--Head menu-->
		<div class="header-middle">
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="{{url ('/')}}"><h4>AlphaBull</h4></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="{{url ('/account')}}"><i class="fa fa-user"></i>Account</a></li>			
								<li><a href="{{url ('/cart')}}"><i class="fa fa-shopping-cart"></i>Cart({{ count($cart) }})</a></li>
								<li><a href="{{url ('/order')}}"><i class="fa fa-crosshairs"></i>Order</a></li>
								<li><a href="{{url ('/account/login')}}"><i class="fa fa-lock"></i>Logout</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/Head menu-->