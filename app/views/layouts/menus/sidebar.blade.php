<aside id="sidebar-left" class="section menu" style="height: 3543px;">
	<ul class="nav list-unstyled">
		<li class=" {{ (Request::is('/') ? 'active' : '') }} {{ (Request::is('dashboard') ? 'active' : '') }} ">
			<a href="{{URL::to('/')}}">
				<i class="fa fa-dashboard"></i>
				<span>Dashboard</span>
			</a>
		</li>
		<li class=" {{ (Request::is('users*') ? 'active' : '') }} ">
			<a href="{{URL::to('users')}}">
				<i class="fa fa-user"></i>
				<span>Users</span>
			</a>
		</li>
		<li class=" {{ (Request::is('calendars') ? 'active' : '') }} ">
			<a href="{{URL::to('calendars')}}">
				<i class="fa fa-calendar"></i>
				<span>Calendar</span>
			</a>
		</li>
		<li class=" {{ (Request::is('productions*') ? 'active' : '') }} ">
			<a href="{{URL::to('productions')}}">
				<i class="fa fa-bar-chart-o"></i>
				<span>Production</span>
			</a>
		</li>
		<li class=" {{ (Request::is('orders*') ? 'active' : '') }} ">
			<a href="{{URL::to('orders')}}">
				<i class="fa fa-clipboard"></i>
				<span>Orders</span>
			</a>
		</li>
		<li class=" {{ (Request::is('customers*') ? 'active' : '') }} ">
			<a href="{{URL::to('customers')}}">
				<i class="fa fa-group"></i>
				<span>Customers</span>
			</a>
		</li>
		<li class=" {{ (Request::is('products*') ? 'active' : '') }} ">
			<a href="{{URL::to('products')}}">
				<i class="fa fa-tags"></i>
				<span>Products</span>
			</a>
		</li>
		<li class=" {{ (Request::is('documents*') ? 'active' : '') }} ">
			<a href="{{URL::to('documents')}}">
				<i class="fa fa-file"></i>
				<span>Documents</span>
			</a>
		</li>
		<li class=" {{ (Request::is('activities*') ? 'active' : '') }} ">
			<a href="{{URL::to('activities')}}">
				<i class="fa fa-tasks"></i>
				<span>Activity</span>
			</a>
		</li>
		<li class=" {{ (Request::is('notifications*') ? 'active' : '') }} ">
			<a href="{{URL::to('notifications')}}">
				<i class="fa fa-bullhorn"></i>
				<span>Notify</span>
			</a>
		</li>

	</ul>
</aside>