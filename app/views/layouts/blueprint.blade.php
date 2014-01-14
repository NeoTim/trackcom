@extends('layouts.master')


@section('head')

	<!-- BEGIN CORE STYLES -->
	<link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
	<link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
	<link href="{{ asset('assets/plugins/uniform/css/uniform.default.css') }}" rel="stylesheet" type="text/css"/>
	<!-- END CORE STYLES -->
	<!-- BEGIN GLOBAL STYLES -->
	<link rel="stylesheet" href="{{ asset('assets/plugins/data-tables/DT_bootstrap.css') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/gritter/css/jquery.gritter.css') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/select2/select2_metro.css') }}"/>
	
	
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/bootstrap-datepicker/css/datepicker.css') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/bootstrap-datetimepicker/css/datetimepicker.css') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/jquery-multi-select/css/multi-select.css') }}"/>
	<link href="{{ asset('assets/css/pages/pricing-tables.css') }}" rel="stylesheet" type="text/css"/>

	<!-- END GLOBAL STYLES -->

	<!-- BEGIN PAGE STYLES -->
	@yield('page_styles')
	<!-- END PAGE STYLES -->

	<!-- BEGIN THEME STYLES -->
	<link href="{{ asset('assets/css/style-metronic.css') }}" rel="stylesheet" type="text/css"/>
	<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css"/>
	
	<link href="{{ asset('assets/css/plugins.css') }}" rel="stylesheet" type="text/css"/>
	<link href="{{ asset('assets/css/themes/default.css') }}" rel="stylesheet" type="text/css" id="style_color"/>

	<link href="{{ asset('css/bootstrap-switch.css') }}" rel="stylesheet" type="text/css" id="style_color"/>
	<link href="{{ asset('css/jquery.sidr.dark.css') }}" rel="stylesheet" type="text/css" id="style_color"/>
	<link href="{{ asset('css/docs.css') }}" rel="stylesheet" type="text/css" id="style_color"/>
	<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" id="style_color"/>
	<link href="{{ asset('js/boot-select/bootstrap-select.css') }}" rel="stylesheet" type="text/css" id="style_color"/>
	


	<!-- END THEME STYLES -->

	@yield('extra')
	<style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style>
	<link href="{{ asset('assets/plugins/gritter/css/jquery.gritter.css') }}" rel="stylesheet" type="text/css">
@stop

@section('body')
	
	@include('layouts.headers.main')

	<div class="clearfix"></div>

	<div class="page-container">
		
			@include('layouts.menus.sidebar')
		

		@yield('page_header')

		

		<div class="page-content-wrapper">
			<div class="page-content">
				
				
				<!-- END PAGE HEADER-->
				<div class="row">

					<div class="col-md-12">

						<div class="shortcut-group section-content">
					
							<ul class="quick-menu list-unstyled">
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
								</li>
							</ul>
							
							<span class="align-center">
								
								<br />
								<h1>@yield('page_title')</h1>
							</span>
							<hr>
						</div>

					</div>

				</div>

				@include('layouts.notifications')
				<!-- BEGIN HEADER WRAP -->
		
				<div class="clearfix"></div>

				<!-- BEGIN CONTENT WRAP -->
				<div class="row">
					<div class='col-md-12'>
				
							@yield('content')


					</div>
				</div>
				<!-- END CONTENT WRAP -->

			</div>
		</div>



	</div>

@stop




@section('scripts')

	<!-- BEGIN CORE PLUGINS -->
	<!--[if lt IE 9]>
	<script src="{{ asset('assets/plugins/respond.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/excanvas.min.js') }}"></script> 
	<![endif]-->
	<script src="{{ asset('assets/plugins/jquery-1.10.2.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/plugins/jquery-migrate-1.2.1.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('js/jquery-ui.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('js/jquery.equalheights.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('js/bootstrap-switch.js') }}" type="text/javascript"></script>
	<script src="{{ asset('js/boot-select/bootstrap-select.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('js/bootstrap-filestyle.js') }}" type="text/javascript"></script>
	<script src="{{ asset('js/jquery.sidr.min.js') }}" type="text/javascript"></script>


	<script src="{{ asset('assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/plugins/jquery.cokie.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/plugins/uniform/jquery.uniform.min.js') }}" type="text/javascript"></script>
	<!-- END CORE PLUGINS -->

	<!-- BEGIN GLOBAL PLUGINS -->
	<script type="text/javascript" src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/plugins/jquery-multi-select/js/jquery.multi-select.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/plugins/jquery-multi-select/js/jquery.quicksearch.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/plugins/data-tables/jquery.dataTables.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/plugins/data-tables/DT_bootstrap.js') }}"></script>
	<!-- END CORE PLUGINS -->

	<!-- BEGIN PAGE PLUGINS -->
	@yield('page_plugins')
	<!-- END PAGE PLUGINS -->
	<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
	<!--[if (gte IE 8)&(lt IE 10)]>
	<script src="assets/plugins/jquery-file-upload/js/cors/jquery.xdr-transport.js"></script>
	<![endif]-->
	<!-- BEGIN GLOBAL SCRIPTS -->
	
	<script type="text/javascript" src="{{ asset('assets/plugins/gritter/js/jquery.gritter.js') }}"></script>
	<script src="{{ asset('node_modules/socket.io/node_modules/socket.io-client/dist/socket.io.js') }}"></script>
	<script src="{{ asset('assets/scripts/app.js') }}"></script>
	<script src="{{ asset('assets/scripts/table-advanced.js') }}"></script>
	<script src="{{ asset('assets/scripts/form-components.js') }}"></script>
	<script src="{{ asset('js/script.js') }}" type="text/javascript"></script>
	<script src="{{ asset('js/jquery.getajax.js') }}" type="text/javascript"></script>
	
	<script>
	jQuery(document).ready(function() {
	   App.init();
	   TableAdvanced.init();
	   FormComponents.init();
	    $('.selectpicker').selectpicker();
	    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
		    $('.selectpicker').selectpicker('mobile');
		}
		
	});
	</script>
	<!-- END GLOBAL SCRIPTS -->

	<!-- BEGIN PAGE SCRIPTS -->
	@yield('page_scripts')
	<!-- END PAGE SCRIPTS -->

	<script>
	$(document).ready(function(){
		//SetStats();

		$(".dataTables_filter :input").addClass("form-control").attr('placeholder', 'Search...').appendTo(".dataTables_filter");
		$(".dataTables_filter").addClass('input-group col-md-8 pull-right');
		$(".dataTables_filter label").html('');
		$("<span class='input-group-addon'><i class='fa fa-search'></span></i></button>").appendTo(".dataTables_filter");
		var menu = "#main_top_menu";
		


		function setAdminMenu(cat)
		{
			var temp = ["<li class='dropdown' id=top_menu_{{"  cat.name  "}}>",
							"<a href='{{ URL::to('" + cat.name + "') }}' data-close-others='true'>",
								"" + cat.name + " |",
							"</a>",
						"</li>"].join('');
			$(temp).prependTo("#main_top_menu");
			//console.log(cat.name);
		}


		$.get("{{URL::to('collect/categories')}}").done(function(data){
			var cats = eval(data);
			$.each($(cats), function(i){
				var cat = cats[i];
				//setAdminMenu(cat);
			});
		});


		$(".bsControl :input").addClass("form-control");

		
		
// <![CDATA[
            var socket = io.connect('http://127.0.0.1:3000/');
            //socket.on('connect', function(data){
            //    socket.emit('subscribe', {channel:'score.update'});
            //});
			 socket.on('entries.store', function (data) {
                var entry = jQuery.parseJSON(data);
                placeOrdersStatus(entry.id, entry.sku, entry.status, entry.color);
                $.gritter.add({
                // (string | mandatory) the heading of the notification
                	title: entry.sku,
                // (string | mandatory) the text inside the notification
                	text: "Was Just Added to production"
            	});
            });
            socket.on('entries.update', function (data) {
                var entry = jQuery.parseJSON(data);
                $("#drop_down_status").html("");
                var message = [];
                SetStats();
                
                	if(entry.status == 10)
                	{
                		message = "Was just removed from production";
                	}
                	if(entry.status == 25)
                	{
                		message = "Was just moved into production";
                	}
                	if(entry.status == 50)
                	{
                		message = "Was just sent to the Lab!!";
                	}
                	if(entry.status == 75)
                	{
                		message = "Is now being filled";
                	}
                	if(entry.status == 100)
                	{
                		message = "Is ready";
                	}

                $.gritter.add({
                // (string | mandatory) the heading of the notification

                	title: '<h2>' + entry.sku + '</h2>',
                // (string | mandatory) the text inside the notification
                	
                	text: '<p>' + message + '</p>'

            	});
            });
            socket.on('entries.delete', function (data) {
                var entry = jQuery.parseJSON(data);
                $("li#status_menu_" + entry.id).remove();
                $.gritter.add({
                // (string | mandatory) the heading of the notification
                	title: entry.sku,
                // (string | mandatory) the text inside the notification
                	text: "Was Just removed"
            	});
            });
            socket.on('orders.store', function () {
                
                $.gritter.add({
                // (string | mandatory) the heading of the notification
                	title: 'order',
                // (string | mandatory) the text inside the notification
                	text: "Was Just added"
            	});
            });

            socket.on('orders.delete', function (data) {
                var order = jQuery.parseJSON(data);
                $.gritter.add({
                // (string | mandatory) the heading of the notification
                	title: order.number,
                // (string | mandatory) the text inside the notification
                	text: "Was Just Deleted"
            	});
            });
            
 
// ]]>		
	

	});
	</script>
@stop



