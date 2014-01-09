	<div class="container hidden-xs">
		 <div class="navbar navbar-default">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a class="navbar-brand" href="{{ URL::route('home') }}">HIS Coatings</a>
	        </div>
	        <div class="collapse navbar-collapse">
	          <ul class="nav navbar-nav">
				@if (Sentry::check() && Sentry::getUser())	
				@if (Sentry::check() && Sentry::getUser()->hasAccess('admin'))	
					<li {{ (Request::is('home') ? 'class="active"' : '') }}><a href="{{ URL::route('home') }}">Home</a></li>
					
					
					<li {{ (Request::is('customers*') ? 'class="active"' : '') }}><a href="{{ URL::to('/customers') }}">Customers</a></li>										
					<li {{ (Request::is('orders*') ? 'class="active"' : '') }}><a href="{{ URL::to('/orders') }}">Orders</a></li>
				@endif
					<li {{ (Request::is('production*') ? 'class="active"' : '') }}><a href="{{ URL::to('/production') }}">Production</a></li>
					<li {{ (Request::is('shipping*') ? 'class="active"' : '') }}><a href="{{ URL::to('/shipping') }}">Shipping</a></li>
				@endif
	          </ul>
	          <ul class="nav navbar-nav navbar-right">
	            @if (Sentry::check())
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Session::get('username') }} <b class="caret"></b></a>
					<ul class="dropdown-menu">	
					@if (Sentry::check() && Sentry::getUser()->hasAccess('admin'))					
						<li><a href="{{ URL::to('users') }}"><i class="fa fa-user"></i> Users</a></li>
						<li><a href="{{ URL::to('groups') }}"><i class="fa fa-users"></i> Groups</a></li>
						<li><a href="{{ URL::to('settings') }}"><i class="fa fa-wrench"></i> Settings</a></li>
					@endif
						<li><a href="{{ URL::to('logout') }}"><i class="fa fa-sign-out"></i> Logout</a></li>
					</ul>
				</li>
				@else
				<li {{ (Request::is('login') ? 'class="active"' : '') }}><a href="#login_modal" data-toggle="modal" data-target="#login_modal">Login</a></li>
				<li {{ (Request::is('users/create') ? 'class="active"' : '') }}><a href="#register_modal" data-toggle="modal" data-target="#register_modal">Register</a></li>
				
				@endif
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </div>
	    
	    
	<div class="container visible-xs">
		 <div class="navbar navbar-default navbar-fixed-top">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a class="navbar-brand" href="{{ URL::route('home') }}">HIS Coatings</a>
	        </div>
	        <div class="collapse navbar-collapse">
	          <ul class="nav navbar-nav">
				@if (Sentry::check() && Sentry::getUser()->hasAccess('admin'))	
					<li {{ (Request::is('home') ? 'class="active"' : '') }}><a href="{{ URL::route('home') }}">Home</a></li>
					
					
					<li {{ (Request::is('customers*') ? 'class="active"' : '') }}><a href="{{ URL::to('/customers') }}">Customers</a></li>										
					<li {{ (Request::is('orders*') ? 'class="active"' : '') }}><a href="{{ URL::to('/orders') }}">Orders</a></li>
				@endif
					<li {{ (Request::is('production*') ? 'class="active"' : '') }}><a href="{{ URL::to('/production') }}">Production</a></li>
					<li {{ (Request::is('shipping*') ? 'class="active"' : '') }}><a href="{{ URL::to('/shipping') }}">Shipping</a></li>
	          </ul>
	          <ul class="nav navbar-nav navbar-right">
	            @if (Sentry::check())
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Session::get('username') }} <b class="caret"></b></a>
					<ul class="dropdown-menu">	
					@if (Sentry::check() && Sentry::getUser()->hasAccess('admin'))					
						<li><a href="{{ URL::to('users') }}"><i class="fa fa-user"></i> Users</a></li>
						<li><a href="{{ URL::to('groups') }}"><i class="fa fa-users"></i> Groups</a></li>
						<li><a href="{{ URL::to('settings') }}"><i class="fa fa-wrench"></i> Settings</a></li>
					@endif
						<li><a href="{{ URL::to('logout') }}"><i class="fa fa-sign-out"></i> Logout</a></li>
					</ul>
				</li>
				@else
				<li {{ (Request::is('login') ? 'class="active"' : '') }}><a href="#login_modal" data-toggle="modal" data-target="#login_modal">Login</a></li>
				<li {{ (Request::is('users/create') ? 'class="active"' : '') }}><a href="#register_modal" data-toggle="modal" data-target="#register_modal">Register</a></li>
				
				@endif
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </div>