<!-- <div id="mainnav" class="navbar bg-blue navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header col-md-1">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>

			<a class="navbar-toggle" id="sidebar-left-toggle" href="#sidebar-left">
				<i class="fa fa-cogs"></i>
			</a>

			<a class="navbar-brand" href="{{URL::to('/')}}">Track<strong>Com</strong></a>
			
		</div>
		<div class="navbar-collapse collapse col-md-11" style="height: 1px;">
			
			<ul class="top-bar nav navbar-nav hidden-xs col-md-10">
				<li class="col-md-2">
					<a class="navbar-icons" href="{{URL::to('dashboard')}}">
						<i class="fa fa-tachometer"></i>
					</a>
				</li>
				<li class="col-md-2">
					<a class="navbar-icons" href="{{URL::to('orders')}}">
						<i class="fa fa-clipboard"></i>
					</a>
				</li>
				<li class="col-md-2">
					<a class="navbar-icons" href="{{URL::to('productions')}}">
						<i class="fa fa-bar-chart-o"></i>
					</a>
				</li>
				<li class="col-md-2">
					<a class="navbar-icons" href="{{URL::to('customers')}}">
						<i class="fa fa-group"></i>
					</a>
				</li>
				<li class="col-md-2">
					<a class="navbar-icons" href="{{URL::to('calendars')}}">
						<i class="fa fa-calendar"></i>
					</a>
				</li>
				<li class="col-md-2">
					<a class="navbar-icons" href="{{URL::to('deliveries')}}">
						<i class="fa fa-truck"></i>
					</a>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right visible-xs ">
				<li>
					<img src="{{ asset('assets/img/Empty_profile.png') }}" class="user-avatar"> 
					<a href="{{URL::route('users.show', Sentry::getUser()->id)}}">{{{Sentry::getUser()->username}}}</a>
				</li>
			</ul>
			<ul class="top-bar  nav navbar-nav navbar-right hidden-xs col-md-2">
				
				
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<img src="{{ asset('assets/img/Empty_profile.png') }}" class="user-avatar"> 
						{{{Sentry::getUser()->username}}} <b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li class="dropdown-header">Admin</li>
						<li><a href="#" data-toggle="modal" data-target="#notify_modal">Notify</a></li>
						<li><a href="{{URL::to('/')}}">Dashboard</a></li>
						<li><a href="{{URL::to('calendars')}}">Calendar</a></li>
						<li><a href="{{URL::to('documents')}}">Documents</a></li>
						@if(Sentry::getUser()->username == 'chrisa' OR Sentry::getUser()->username == 'joelc')
						<li><a href="{{URL::to('phpmyadmin')}}">Database</a></li>
						@endif
						<li class="divider"></li>
						<li><a href="{{URL::to('logout')}}">Sign out</a></li>
					</ul>
				</li>
			</ul>


		</div>
	</div>
</div> -->

<nav id="navbarTop" class="navbar navbar-default bg-blue navbar-fixed-top" role="navigation">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{{URL::to('dashboard')}}">TraCom</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li class=" {{ (Request::is('dashboard*') ? 'active' : '') }} ">
					<a class="navbar-icons" href="{{URL::to('dashboard')}}">
						<i class="fa fa-tachometer"></i>
					</a>
				</li>
				<li class=" {{ (Request::is('orders*') ? 'active' : '') }} ">
					<a class="navbar-icons" href="{{URL::to('orders')}}">
						<i class="fa fa-clipboard"></i>
					</a>
				</li>
				<li class=" {{ (Request::is('productions*') ? 'active' : '') }} ">
					<a class="navbar-icons" href="{{URL::to('productions')}}">
						<i class="fa fa-bar-chart-o"></i>
					</a>
				</li>
				<li class=" {{ (Request::is('calendars*') ? 'active' : '') }} ">
					<a class="navbar-icons" href="{{URL::to('calendars')}}">
						<i class="fa fa-calendar"></i>
					</a>
				</li>
				<li class=" {{ (Request::is('deliveries*') ? 'active' : '') }} ">
					<a class="navbar-icons" href="{{URL::to('deliveries')}}">
						<i class="fa fa-truck"></i>
					</a>
				</li>
				<li class=" {{ (Request::is('products*') ? 'active' : '') }} ">
					<a class="navbar-icons" href="{{URL::to('products')}}">
						<i class="fa fa-tags"></i>
					</a>
				</li>
				<li class=" {{ (Request::is('notifications*') ? 'active' : '') }} ">
					<a class="navbar-icons" href="{{URL::to('notifications')}}">
						<i class="fa fa-bullhorn"></i>
					</a>
				</li>
				<!-- <li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li >
							<a class="" href="{{URL::to('dashboard')}}">
								<i class="fa fa-tachometer"></i>
							</a>
						</li>
						<li >
							<a class="" href="{{URL::to('orders')}}">
								<i class="fa fa-clipboard"></i>
							</a>
						</li>
						<li >
							<a class="" href="{{URL::to('productions')}}">
								<i class="fa fa-bar-chart-o"></i>
							</a>
						</li>
						<li >
							<a class="" href="{{URL::to('customers')}}">
								<i class="fa fa-group"></i>
							</a>
						</li>
						<li >
							<a class="" href="{{URL::to('calendars')}}">
								<i class="fa fa-calendar"></i>
							</a>
						</li>
						<li >
							<a class="" href="{{URL::to('deliveries')}}">
								<i class="fa fa-truck"></i>
							</a>
						</li>
					</ul>
				</li> -->
			</ul>
			<!-- <form class="navbar-form navbar-left" role="search">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Search">
				</div>
				<button type="submit" class="btn btn-default">Submit</button>
			</form> -->
			<ul class="nav navbar-nav navbar-right">
				<!-- <li><a href="#">Link</a></li> -->
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{{Sentry::getUser()->username}}} <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li class="dropdown-header">Admin</li>
						<li><a href="#" data-toggle="modal" data-target="#notify_modal">Notify</a></li>
						<li><a href="{{URL::to('/')}}">Dashboard</a></li>
						<li><a href="{{URL::to('calendars')}}">Calendar</a></li>

						@if(Sentry::getUser()->username == 'chrisa' OR Sentry::getUser()->username == 'joelc')

							<li><a href="{{URL::to('users')}}">Users</a></li>
							<li><a href="{{URL::to('phpmyadmin')}}">Database</a></li>

						@endif

						<li class="divider"></li>
						<li><a href="{{URL::to('logout')}}">Sign out</a></li>
					</ul>
				</li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>
<!-- Button trigger modal -->


<!-- Modal -->

			<!-- <form class="navbar-form navbar-right form-search hidden-sm hidden-xs" role="search">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Search">
				</div>
				<button type="submit" class="btn btn-default"><i class="fa fa-search"></i> </button>
			</form> -->
<!-- 
<li class="blue primary">
									<a href="{{URL::to('/')}}">
										<i class="fa fa-tachometer"></i>
										<span>Dashboard</span>
									</a>
								</li>
								<li class="yellow warning">
									<a href="{{URL::to('productions')}}">
										<i class="fa fa-bar-chart-o"></i>
										<span>Production</span>
									</a>
								</li>
								<li class="green success">
									<a href="{{URL::to('orders')}}">
										<i class="fa fa-clipboard"></i>
										<span>Orders</span>
									</a>
								</li>
								<li class="inverse">
									<a href="{{URL::to('customers')}}">
										<i class="fa fa-group"></i>
										<span>Customers</span>
									</a>
								</li>
								<li class="red danger">
									<a href="{{URL::to('calendars')}}">
										<i class="fa fa-calendar"></i>
										<span>Calendar</span>
									</a>
								</li>
								<li class="lite-blue info">
									<a href="{{URL::to('deliveries')}}">
										<i class="fa fa-truck"></i>
										<span>Deliveries</span>
									</a>
								</li> -->
