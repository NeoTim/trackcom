<div id="mainnav" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
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
		<div class="navbar-collapse collapse" style="height: 1px;">
			
			<ul class="nav navbar-nav navbar-right visible-xs">
				<li>
					<img src="{{ asset('assets/img/Empty_profile.png') }}" class="user-avatar"> 
					<a href="{{URL::route('users.show', Sentry::getUser()->id)}}">{{{Sentry::getUser()->username}}}</a>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right hidden-xs">
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


			<!-- <form class="navbar-form navbar-right form-search hidden-sm hidden-xs" role="search">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Search">
				</div>
				<button type="submit" class="btn btn-default"><i class="fa fa-search"></i> </button>
			</form> -->
		</div><!--/.nav-collapse -->
	</div><!--/.container -->
</div>
<!-- Button trigger modal -->


<!-- Modal -->

<

