<div class="page-sidebar-wrapper">
	<div class="page-sidebar navbar-collapse collapse">
				<!-- BEGIN SIDEBAR MENU -->
				<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 1278px;">
					<ul class="page-sidebar-menu" style="overflow: hidden; width: auto; height: 1278px;">
						<li class="sidebar-toggler-wrapper">
							<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
							<div class="sidebar-toggler hidden-phone">
							</div>
							<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
						</li>
						<li class="sidebar-search-wrapper">
							<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
							<form class="sidebar-search" action="extra_search.html" method="POST">
								<div class="form-container">
									<div class="input-box">
										<a href="javascript:;" class="remove"></a>
										<input type="text" placeholder="Search...">
										<input type="button" class="submit" value=" ">
									</div>
								</div>
							</form>
							<!-- END RESPONSIVE QUICK SEARCH FORM -->
						</li>
						<li class=" start {{ (Request::is('/') ? 'active' : '') }} ">
								<a href="{{ URL::to('/') }}">
								<i class="fa fa-home"></i>
								<span class="title">
									Dashboard
								</span>
								<span class="selected">
								</span>
								</a>
							</li>
							@if (Sentry::check() && Sentry::getUser()->hasAccess('admin'))
							<li {{ (Request::is('users*') ? 'class="active"' : '') }}>
								<a href="{{ URL::to('users') }}">
								<i class="fa fa-user"></i>
								<span class="title">
									Users
								</span>
								<span class="selected">
								</span>
								</a>
							</li>
							<li class="  {{ (Request::is('documents*') ? 'active' : '') }}">
								<a href="javascript:;">
								<i class="fa fa-file"></i>
								<span class="title">
									Documents
								</span>
								<span class="arrow {{ (Request::is('documents*') ? 'open' : '') }}">
								</span>
								</a>
								<ul class="sub-menu">
									<li {{ (Request::is('documents/') ? 'class="active"' : '') }}>
										<a href="{{ URL::to('documents/') }}">
										<i class="fa fa-search"></i>
										
										View Documents</a>
									</li>
									<li {{ (Request::is('documents/create') ? 'class="active"' : '') }}>
										<a href="{{ URL::to('documents/create') }}">
										<i class="fa fa-upload"></i>
										
										Upload</a>
									</li>
								</ul>
							</li>
							
							<li class=" {{ (Request::is('calendars*') ? 'active' : '') }}">
								<a href="{{ URL::to('calendars') }}">
								<i class="fa fa-calendar"></i>
								<span class="title">
									Calendar
								</span>
								<span class="selected">
								</span>
								</a>
							</li>
							<li class=" {{ (Request::is('orders*') ? 'active' : '') }}">
								<a href="javascript:;">
								<i class="fa fa-barcode"></i>
								<span class="title">
									Orders
								</span>
								<span class="arrow {{ (Request::is('orders*') ? 'open' : '') }}">
								</span>
								</a>
								<ul class="sub-menu">
									<li class=" {{ (Request::is('orders/') ? 'active' : '') }}">
										<a href="{{ URL::to('orders/') }}">
										<i class="fa fa-barcode"></i>
										
										View Orders</a>
									</li>
									<li class=" {{ (Request::is('orders/create') ? 'active' : '') }}">
										<a href="{{ URL::to('orders/create') }}">
										<i class="fa fa-plus"></i>
										
										Create Order</a>
									</li>
								</ul>
							</li>
							<li class=" {{ (Request::is('products*') ? 'active' : '') }}">
								<a href="javascript:;">
								<i class="fa fa-th"></i>
								<span class="title">
									Products
								</span>
								<span class="arrow {{ (Request::is('products*') ? 'open' : '') }}">
								</span>
								</a>
								<ul class="sub-menu">
									<li class=" {{ (Request::is('products/') ? 'active' : '') }}">
										<a href="{{ URL::to('products/') }}">
										<i class="fa fa-tag"></i>
										
										View All</a>
									</li>
									<li class=" {{ (Request::is('products/create') ? 'active' : '') }}">
										<a href="{{ URL::to('products/create') }}">
										<i class="fa fa-plus"></i>
										
										Add Product</a>
									</li>
								</ul>
							</li>
							<li class=" {{ (Request::is('customers*') ? 'active' : '') }}">
								<a href="javascript:;">
								<i class="fa fa-group"></i>
								<span class="title">
									Customers
								</span>
								<span class="arrow {{ (Request::is('customers*') ? 'open' : '') }}">
								</span>
								</a>
								<ul class="sub-menu">
									<li class=" {{ (Request::is('customers') ? 'active' : '') }}">
										<a href="{{ URL::to('customers') }}">
										<i class="fa fa-clock-o"></i>
										
										All Customers</a>
									</li>
									<li class=" {{ (Request::is('customers/create') ? 'active' : '') }}">
										<a href="{{ URL::to('customers/create') }}">
										<i class="fa fa-plus"></i>
										
										Add Customer</a>
									</li>
								</ul>
							</li>	
							@endif

							<li class=" {{ (Request::is('productions*') ? 'active' : '') }}">
								<a href="{{URL::to('productions')}}">
								<i class="fa fa-cogs"></i>
								<span class="title">
									Production
								</span>
								<span class="selected">
								</span>
								</a>
							</li>
							<li class=" end {{ (Request::is('activities*') ? 'active' : '') }} ">
								<a href="{{URL::to('activities')}}">
								<i class="fa fa-clock-o"></i>
								<span class="title">
									Activity
								</span>
								<span class="selected">
								</span>
								</a>
							</li>
				
					</ul>
				<div class="slimScrollBar" style="background-color: rgb(161, 178, 189); width: 7px; position: absolute; top: 71px; opacity: 0.3; display: none; border-top-left-radius: 7px; border-top-right-radius: 7px; border-bottom-right-radius: 7px; border-bottom-left-radius: 7px; z-index: 99; right: 1px; height: 1207.1574279379158px; background-position: initial initial; background-repeat: initial initial;"></div>
				<div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-top-left-radius: 7px; border-top-right-radius: 7px; border-bottom-right-radius: 7px; border-bottom-left-radius: 7px; background-color: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px; background-position: initial initial; background-repeat: initial initial;"></div>
				
				<div class="col-md-12" style="margin-top:30px;">
					<img width="100%" src="{{ asset('assets/img/his-logo.png') }}">
				</div>	
				<!-- END SIDEBAR MENU -->
	</div>
</div>