<!doctype html>
<html lang="en" ng-app="app">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>TraCom</title>
	<!-- Bootstrap -->
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic" rel="stylesheet" type="text/css">

	<link rel="stylesheet" href="bower_components/weather-icons/css/weather-icons.min.css">
	<link rel="stylesheet" href="/js/libs/ng-table/ng-table.min.css" type="text/css" />
	<link href="/delighted/css/bootstrap.css" rel="stylesheet">
	<!-- Styles -->
	<link href="/delighted/js/slick/slick/slick.css" rel="stylesheet" type="text/css"> 
	<link href="/delighted/css/style.css" rel="stylesheet">
	<style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style>
	<!-- Custom Styles -->
	<link rel="stylesheet" href="/js/libs/jqw/jqwidgets/jqwidgets/styles/jqx.base.css" type="text/css" />
	<link rel="stylesheet" type="text/css" href="/delighted/js/tc/bootstrap-duallistbox/src/bootstrap-duallistbox.css">
	<link rel="stylesheet" href="/js/libs/jqw/jqwidgets/jqwidgets/styles/jqx.highblue.custom.css" type="text/css" />
	<link rel="stylesheet" href="/delighted/css/tc/deliveries.css" type="text/css" />
	<link href="/delighted/less/style.less" rel="stylesheet"  title="lessCss" id="lessCss">
	<link rel="stylesheet" href="/css/normalize.css">
	<link rel="stylesheet" href="/bower_components/jquery-ui/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="/bower_components/fullcalendar/fullcalendar.css">
	<link rel="stylesheet" href="/bower_components/angular-ui-layout/ui-layout.css">
	<link rel="stylesheet" href="/bower_components/slick-carousel/slick/slick.css">
	<link rel="stylesheet" href="/bower_components/select2/select2.css">
	<link rel="stylesheet" href="/bower_components/angular-ui-handsontable/dist/angular-ui-handsontable.full.min.css">
	<style type="text/css">
	    .beingDragged {
	        height: 60px;
	        padding:30px;
	        margin-bottom: .5em !important;
	        border: 2px dotted #ccc !important;
	        background: none !important;
	    	}
  	</style>
  	<script type="text/javascript" charset="UTF-8" src="http://maps.gstatic.com/cat_js/intl/en_us/mapfiles/api-3/16/10/%7Bcommon,util,stats%7D.js"></script>
	<!-- <link rel="stylesheet" href="/css/foundation.min.css"> -->
	<!-- <link rel="stylesheet" href="/css/style.css"> -->
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
	<script src="/delighted/js/jquery/jquery.js"></script>
	<script src="/bower_components/jquery-ui/ui/jquery-ui.js"></script>
	<script>
		// $(document).ready(function() {
		// $('.site-holder').hide();
		// // $('.navbar').hide();
		// // $('.box-holder').hide();
		// });
	</script>

  	<link href="/delighted/css/custom.css" rel="stylesheet">
	


	
	<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<script src="http://maps.gstatic.com/intl/en_us/mapfiles/api-3/16/10/main.js" type="text/javascript"></script>
	<script src="/bower_components/momentjs/min/moment.min.js"></script>
	<script src="/bower_components/select2/select2.min.js"></script>
	<script src="/bower_components/slick-carousel/slick/slick.js"></script>
	<script src="/bower_components/angular/angular.js"></script>
	<script src="/bower_components/angular-slick/dist/slick.js"></script>
	<script src="/js/libs/ng-table/ng-table.min.js"></script>
	<script src="/bower_components/angular-sanitize/angular-sanitize.js"></script>  
	<script src="/bower_components/angular-route/angular-route.js"></script>  
	<script src="/bower_components/underscore/underscore.js"></script>
	<script src="/bower_components/angular-bootstrap/ui-bootstrap.min.js"></script>
	<script src="/bower_components/angular-bootstrap/ui-bootstrap-tpls.min.js"></script>
	<script src="/bower_components/fullcalendar/fullcalendar.js"></script>
	<script src="/bower_components/fullcalendar/gcal.js"></script>
	<script src="/bower_components/angular-ui-calendar/src/calendar.js"></script>
	<script src="/bower_components/angular-ui-layout/ui-layout.js"></script>
	<script src="/bower_components/angular-ui-select2/src/select2.js"></script>
	<script src="/bower_components/angular-ui-sortable/sortable.js"></script>
	<script src="/bower_components/angular-ui-utils/ui-utils.js"></script>
	<script src="/js/libs/angular-dragdrop/src/angular-dragdrop.js"></script>
	<script src="/node_modules/socket.io/node_modules/socket.io-client/dist/socket.io.js"></script>
	<!-- <script type="text/javascript" src="ngSocketIO/build/ng-socket-io.js"></script> -->
	<!-- <script src="/bower_components/angular-socket-io/mock/socket-io.js"></script> -->
		
	<script src="/bower_components/angular-animate/angular-animate.js"></script>
	<script src="/bower_components/greensock/src/minified/TweenMax.min.js"></script>
	<script src="/bower_components/ng-Fx/dist/ng-Fx.js"></script>
	<script src="/bower_components/angular-socket-io/socket.js"></script>
	<script src="/bower_components/angular-ui-handsontable/dist/angular-ui-handsontable.full.min.js"></script>
	<!--[if lt IE 9]>
	<script src="/bower_components/angular-ui-utils/ui-utils-ieshiv.min.js"></script>
	<![endif]-->
	<script src="/js/app.js"></script>
	<script src="/js/app.routes.js"></script>
	<script src="/js/auth/app.auth.js"></script>
	<script src="/js/auth/auth.controllers.js"></script>
	<script src="/js/auth/auth.directives.js"></script>
	<script src="/js/auth/auth.services.js"></script>
	<script src="/js/services/app.services.js"></script>
	<script src="/js/services/service.models.js"></script>
	<script src="/js/controllers/app.controllers.js"></script>
	<script src="/js/controllers/dashboard.controllers.js"></script>
	<script src="/js/controllers/production.controllers.js"></script>
	<script src="/js/controllers/calendar.controllers.js"></script>
	<script>


		angular.module("app").constant("CSRF_TOKEN", '<?php echo csrf_token(); ?>');
		
		
	</script>
</head>
<body>
<div class="site-holder mini-sidebar top-side-fixed">
				<!-- .navbar -->
				<nav class="navbar  navbar-default nav-delighted navbar-fixed-top" role="navigation">
					<a href="#" class="toggle-left-sidebar">
						<i class="fa fa-th-list"></i>
					</a>
					<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
						<a class="navbar-brand" href="#">
							<!-- <img src="/delighted/images/logoed.png" alt=""> -->
							TraCom
						</a>
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse">
							<ul class="nav navbar-nav navbar-right">
								<li>
									<form role="search" class="search-form">
										<div class="form-group">
											<input type="text" class="form-control  nav-input-search " data-provide="typehead" placeholder="Search ">
											<i class="fa fa-search"></i>
										</div>
									</form>
								</li>
								<li>
									<a href="lock" class="logout">
										<i class="fa fa-power-off"></i>
									</a>
								</li>
							</ul>
						</div>
						<!-- /.navbar-collapse -->
				</nav>

	<!-- .box-holder -->
	<div class="box-holder">

		<!-- .left-sidebar -->
		<div class="left-sidebar">
			<div class="sidebar-holder">
				<!-- User   -->
				<div class="user-menu">
					<img src="/delighted/images/profiles/one.png" alt="" class="avatar">
					<div class="user-info">
						<div class="welcome">Welcome,</div>
						<div class="username">Anusha</div>
					</div>
					<div class="user-status">
						<i class="fa fa-circle "></i>
					</div>
				</div>
				<!-- /.User   -->

				<!-- Menu -->
				<ul class="nav  nav-list">
					<li class=''>
						<a href='#dashboard' data-original-title='Dashboard'>
							<i class='icon ion-home'></i>

							<span class='hidden-minibar'>Dashboard</span>
						</a>
					</li>
					<li class=' '>
						<a href='#deliveries' data-original-title='Deliveries'>
							<i class='fa fa-truck'></i>
							<span class='hidden-minibar'>Deliveries</span>
						</a>
					</li>
					<li class=' '>
						<a href='#production' data-original-title='Production'>
							<i class='fa fa-bar-chart-o'></i>
							<span class='hidden-minibar'>Production</span>
						</a>
					</li>
					<li class=' '>
						<a href='#orders' data-original-title='Orders'>
							<i class='fa fa-clipboard'></i>
							<span class='hidden-minibar'>Orders</span>
						</a>
					</li>
					<li class=' '>
						<a href='#calendar' data-original-title='Calendar'>
							<i class='fa fa-calendar'></i>
							<span class='hidden-minibar'>Calendar</span>
						</a>
					</li>
							
				</ul>
				<!-- /.Menu -->
		</div>
		<!-- /.left-sidebar Holder-->
	</div>
	<!-- /.left-sidebar -->

		<!-- .right-sidebar -->
	<div class="user-details user-details-close animated fadeInLeft">
		<div class="right-sidebar-holder">
			<div class="panel-group" id="accordion">
				<div class="panel panel-default">	
					<div class="panel-heading">
					  	<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
							  Personalize
						  	</a>
					  		<i class="fa fa-times close-right-user text-danger pull-right"></i>
				  		</h4>
			  		</div>
		 			<div id="collapseOne" class="panel-collapse collapse in">
						<div class="panel-body">
							<ul class="list-inline text-center">
								<li>Status</li>
								<li><input type="checkbox" name="my-checkbox"  data-on-text="Online" data-off-text="Offline" data-size="medium" checked data-on-color="success" data-off-color="danger" class="status-mode"></li>
							</ul>
							<hr>

							<h5 class="text-center">
								Theme Options
								<a  href="#"  class="theme-panel-close text-danger pull-right"><strong><i class="fa fa-times"></i></strong></a>
							</h5>

							<ul class="list-group theme-options">
								
								<li class="list-group-item" >Predefined Themes
									<ul class="list-inline predefined-themes"> 
										<li><a class="badge" style="background-color:#23bab5" data-color-primary="#23bab5" data-color-secondary="#232b2d" data-color-link="#80969c"> &nbsp; </a></li>
										<li><a class="badge" style="background-color:#e96363" data-color-primary="#e96363" data-color-secondary="#232b2d" data-color-link="#AFB5AA"> &nbsp; </a></li>
										<li><a class="badge" style="background-color:#5cb85c" data-color-primary="#5cb85c" data-color-secondary="#232b2d" data-color-link="#777e88"> &nbsp; </a></li>
										<li><a class="badge" style="background-color:#e97436" data-color-primary="#e97436" data-color-secondary="#232b2d" data-color-link="#80969c"> &nbsp; </a></li>
										<li><a class="badge" style="background-color:#2FA2D1" data-color-primary="#2FA2D1" data-color-secondary="#232b2d" data-color-link="#A5B1B7"> &nbsp; </a></li>
										<li><a class="badge" style="background-color:#2f343b" data-color-primary="#2f343b" data-color-secondary="#FFFFFF" data-color-link="#232b2d"> &nbsp; </a></li>
									</ul>
								</li>
							</ul>
							<div class="list-group contact-list  animated fadeInBig">
								<a class="list-group-item  text-primary">Profile <i class="fa fa-user pull-right"></i></a>
								<a class="list-group-item  text-info">Inbox <i class="fa fa-envelope pull-right"></i></a>
							</div>
							<hr>
							Server Load
							<div class="live-pie-chart">
								<div class="user-canvas user-chart" data-percent="73" >73%</div>  
							</div>

							Users Load
							<div class="live-pie-chart">
								<div class="user-canvas-two user-chart" data-percent="36" >36%</div>  
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
						  		Contacts
						  		<i class="fa fa-users pull-right"></i>
					  		</a>
				  		</h4>
			 	 	</div>
			  		<div id="collapseTwo" class="panel-collapse collapse">
				  		<div class="panel-body no-padding">
							<div id="side-contact-list" class="list-group contact-list">

							<!-- <a data-ng-repeat="cust in customers" class="list-group-item">
								<img src="/delighted/images/profiles/one.png" class="chat-user-avatar" alt="">
								<div class="contact-info">
									<span class="name"> {{cust.company}} </span>
									<span class="status"> {{cust.phone}} </span>
									<i class="fa fa-dot-circle-o"></i>
								</div>
							</a> -->

							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
							  Settings
							  <i class="fa fa-cogs pull-right"></i>
						  </a>
					  	</h4>
					</div>
					<div id="collapseFour" class="panel-collapse collapse">
						<div class="panel-body no-padding">
							<table class="table switches-table">
								<tr>
									<td> Wi-fi</td>                
									<td><input type="checkbox" name="my-checkbox" data-size="mini" checked data-on-color="success" data-off-color="danger"></td>
								</tr>
								<tr>
									<td> Data</td>                
									<td><input type="checkbox" name="my-checkbox" data-size="mini" unchecked data-on-color="success" data-off-color="danger"></td>
								</tr>
								<tr>
									<td> Music</td>                
									<td><input type="checkbox" name="my-checkbox" data-size="mini" unchecked data-on-color="success" data-off-color="danger"></td>
								</tr>
								<tr>
									<td> Flight mode</td>                
									<td><input type="checkbox" name="my-checkbox" data-size="mini" unchecked data-on-color="success" data-off-color="danger"></td>
								</tr>
								<tr>
									<td> Roaming</td>                
									<td><input type="checkbox" name="my-checkbox" data-size="mini" checked data-on-color="success" data-off-color="danger"></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
					  	<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
						  		Current Projects
						  		<i class="fa fa-clock-o pull-right"></i>
					  		</a>
				  		</h4>
					</div>
					<div id="collapseThree" class="panel-collapse collapse">
						<div class="panel-body no-padding">
							  <div class="list-group projects">
								<a class="list-group-item" href="#">    
									<p> Archon <span class="pull-right label bg-success">90%</span></p>
									<div class="progress progress-mini">
										<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">
											<span class="sr-only">90% Complete</span>
										</div>
									</div>

								</a>
								<a class="list-group-item" href="#">    
									<p> Banshee <span class="pull-right label bg-warning">40%</span></p>
									<div class="progress progress-mini">
										<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
											<span class="sr-only">40% Complete</span>
										</div>
									</div>

								</a>
								<a class="list-group-item" href="#">    
									<p> Cascade <span class="pull-right label bg-primary">40%</span></p>
									<div class="progress progress-mini">
										<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 75%;">
											<span class="sr-only">75% Complete</span>
										</div>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /.right-sidebar-holder -->
	</div>
	<!-- /.right-sidebar -->









		<!-- .content -->
		<div class="content  animated fadeInBig">
			<div class=" breadcrumb-holder">
				<ul class="breadcrumb">
					<li class="active">DashBoard fuck</li>
					<li>
						<a href="#">Dashboard</a>
					</li>
					<li>
						<a href="#">Template</a>
					</li>
				</ul>
				<a href="#" class="options-toggle">
					<i class="fa fa-th"></i>
				</a>
				<a href="#" class="refresh-storage">
					<i class="fa fa-refresh"></i>
				</a>
			</div>
			<div class="options-holder closed   animated  fadeInLeft  ">
				<div class="col-md-2 col-sm-2  col-xs-4">
					<div class="thumbnail tile tile-blue">
						<a href="inbox" class="fa-links">
							<i class="fa fa-3x fa-envelope"></i>
							<h1>Inbox</h1>
						</a>
					</div>
				</div>
				<div class="col-md-2 col-sm-2  col-xs-4">
					<div class="thumbnail tile tile-orange">
						<a href="form-elements" class="fa-links">
							<i class="fa fa-3x fa fa-hdd-o"></i>
						</a>
						<h1>Forms</h1>
					</div>
				</div>
				<div class="col-md-2 col-sm-2  col-xs-4">
					<div class="thumbnail tile tile-midnight-blue">
						<a href="invoice" class="fa-links">
							<i class="fa fa-3x fa-money"></i>
							<h1>Invoice</h1>
						</a>
					</div>
				</div>
				<div class="col-md-2 col-sm-2  col-xs-4">
					<div class="thumbnail tile tile-amethyst">
						<a href="profile" class="fa-links">
							<i class="fa fa-3x fa-users"></i>
							<h1>Users</h1>
						</a>
					</div>
				</div>
				<div class="col-md-2 col-sm-2  col-xs-4">
					<div class="thumbnail tile tile-red">
						<a href="file-manager" class="fa-links">
							<i class="fa fa-3x fa-file-o"></i>
							<h1>Files</h1>
						</a>
					</div>
				</div>
				<div class="col-md-2 col-sm-2  col-xs-4">
					<div class="thumbnail tile tile-lime">
						<a href="dropzone" class="fa-links">
							<i class="fa fa-3x fa-cloud-upload"></i>
							<h1>Upload</h1>
						</a>
					</div>
				</div>
			</div>
			<div class="main-content">
				<div class="col-md-6 col-md-offset-3">
					<div id="flash" class="alert-box alert" ng-show="flash">
						{{ flash }}
					</div>
				</div>
						
				<div id="view" ng-view></div>								
			
			</div>
		</div>
		<!-- /.content -->
	</div>
	<!-- /.box-holder -->
</div>
<!-- /.site-holder -->


<!-- Modal -->
<div class="modal fade" id="customiseWidget" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Customise Widget</h4>
			</div>
			<div class="modal-body">
				<div class="panel-body">
					<form class="form-horizontal" role="form" id="customise-widget-form">

						<div class="form-group hidden">
							<label for="inputEmail1" class="col-lg-3 col-md-4 control-label">Panel Heading</label>
							<div class="col-lg-9 col-md-8">
								<input id="title" name="title" type="text" placeholder="placeholder" class="input-xlarge form-control" required="">
							</div>
						</div>
						<input id="current-div" name="title" type="hidden" placeholder="placeholder" class="input-xlarge form-control" required="">

						<div class="form-group">
							<label for="color" class="col-lg-3 col-md-4 control-label">Color</label>
							<div class="col-lg-9 col-md-8">
								<select id="color" name="color" class="input-xlarge form-control">
									<option value="panel-primary">Primary</option>
									<option value="panel-danger">Danger</option>
									<option value="panel-success">Success</option>
									<option value="panel-warning">Warning</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="column-size" class="col-lg-3 col-md-4 control-label">Column Size</label>
							<div class="col-lg-9 col-md-8">
								<select id="column-size" name="column-size" class="input-xlarge form-control">
									<option value="col-md-1">col-md-1</option>
									<option value="col-md-2">col-md-2</option>
									<option value="col-md-3">col-md-3</option>
									<option value="col-md-4">col-md-4</option>
									<option value="col-md-5">col-md-5</option>
									<option value="col-md-6">col-md-6</option>
									<option value="col-md-7">col-md-7</option>
									<option value="col-md-8">col-md-8</option>
									<option value="col-md-9">col-md-9</option>
									<option value="col-md-10">col-md-10</option>
									<option value="col-md-11">col-md-11</option>
									<option value="col-md-12">col-md-12</option>
								</select>
							</div>
						</div>

					</form>


				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" id="submit" class="btn btn-primary">Save changes</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
</div>

<!-- This section is for Splash Screen -->
<!-- 
<div id="jSplash">
	<section class="selected">
		<h1>
			<a href="#" class="brand">
			<img src="/delighted/images/logoed.png" alt=""></a>
		</h1>
		<h2>Smart and beautiful Admin template</h2>
	</section>
	<section>
		<p>Create your own
		<br/>
		<span >Splash Screen</span>.</p>
	</section>
	<section>
		<p>Customize Progress Bar and Progress Percentage
		<br/>
		<span >using CSS</span>.</p>
	</section>
	<section>
		<p>Preload all images in
		<br/>
		<span >&lt; img &gt;tag</span>+
		<span >CSS background-image</span>.</p>
	</section>
</div>
 -->
<!-- End of Splash Screen -->












	



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script type='text/javascript' src='https://cdn.firebase.com/js/simple-login/1.3.2/firebase-simple-login.js'></script>
	<script type='text/javascript' src='https://cdn.firebase.com/js/client/1.0.11/firebase.js'></script>
	<!-- <script src="/delighted/js/jquery-ui-1.10.3.custom.min.js"></script> -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/json2/20110223/json2.js"></script>
	<!-- <script type="text/javascript" src="/delighted/assets/jStorage/jStorage.min.js"></script>	 -->
	<!-- <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.6.0/underscore-min.js"></script> -->
	<script src="/delighted/js/less-1.5.0.min.js"></script>
	<script src="/delighted/js/bootstrap2.min.js"></script>
	<!-- <script src="/delighted/js/jquery.storage.js"></script>    -->     
	<!-- <script src="/delighted/js/jquery.accordion.js"></script> -->
	<!-- <script src="/delighted/js/tc/boot-select/bootstrap-select.min.js" type="text/javascript"></script> -->
	
	<!-- <script src="/delighted/js/bootstrap-typeahead.js"></script> -->
	<!-- <script src="/delighted/js/nav-search.js"></script> -->

	<!-- Messenger assets -->
	<script src="/delighted/js/messenger.min.js"></script>
	<script src="/delighted/js/messenger-theme-flat.js"></script>

<!-- 	<script src="/delighted/js/bootstrap-progressbar.js"></script> -->


	<script src="/delighted/js/jpreloader/jpreLoader.min.js"></script>
	<script src="/delighted/js/jpreloader/preloader-delighted.js"></script>
	<script src="/delighted/js/jquery.loadmask.min.js"></script>    

	<script  src="/delighted/js/galaxy/hovermenu.js" charset="utf-8"></script>
	<script src="/delighted/js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="/delighted/js/jquery.easy-pie-chart.js"></script>


	<script src="/delighted/js/bootstrap-switch.js"></script>
	<script src="/delighted/js/jquery.address-1.6.min.js"></script>

	<script>
	$('document').ready(function(){
	$("[name='my-checkbox']").bootstrapSwitch();
	});
	</script>

	<!-- Remove below two lines in production -->

	<script src="/delighted/js/theme-options.js"></script>

	<script src="/delighted/js/core.js"></script>	
	<script type="text/javascript">

		// <![CDATA[
		            // var socket = io.connect('http://joels-imac.local:3000/');
		            // // socket.on('connect', function(data){
		            // //     socket.emit('subscribe', {channel:'orders.update'});
		            // // });
		            // socket.on('entries.update', function (data) {
		            // 	console.log(data);
		            // 	console.log("me");
		            //     var item = jQuery.parseJSON(data);
		            //     //console.log("node", item);
		            //    // renderOrder(item);
		            //     // if($.Order.setting !== order.id){
		            //     // 		$("#order_" + order.id).remove();
		            //     // 		$.Order.list[order.id] = order;
		            //     // 		$.Order.setUp(order);
		            //     // }
		            // });
		            
			 
			// ]]>

	</script>






</body>
</html>
