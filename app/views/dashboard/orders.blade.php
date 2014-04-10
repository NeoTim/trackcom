@extends('layouts.main')

	@section('styles')
	@parent
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/select2/select2_metro.css') }}"/>
	<link rel="stylesheet" href="{{ asset('assets/plugins/data-tables/DT_bootstrap.css') }}"/>
	<link href="{{ asset('assets/plugins/gritter/css/jquery.gritter.css') }}" rel="stylesheet" type="text/css"/>
	@stop
	
	@section('content')
	
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			
				@include('dashboard.modals.config')
				
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			
			<!-- BEGIN STYLE CUSTOMIZER -->
			<div class="theme-panel hidden-xs hidden-sm">
			
				@include('dashboard.sections.style')
				
			</div>
			<!-- END STYLE CUSTOMIZER -->
			
			<!-- BEGIN PAGE HEADER-->
			
				@include('dashboard.sections.header')
			
			<!-- END PAGE HEADER-->
			
			<!-- BEGIN DASHBOARD STATS -->
			
				@include('dashboard.sections.stats')
			
			<!-- END DASHBOARD STATS -->
			
			<div class="clearfix">
			</div>
			<div class="row">
				<div class="col-md-3">

						<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue" id="order_menu">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>Show/Hide Columns
							</div>							
						</div>
						<div class="portlet-body">
							<table class="table table-striped table-bordered table-hover table-full-width" id="sample_2">
							
							<tbody>
								@foreach($orders as $order)
									<tr id="tab_btn_{{ $order->id }}" class="tab_button" data-toggle="tab" data-target="#tab_{{ $order->id }}" style="cursor:pointer;">
										<td>
											<h4>{{ $order->company }}</h4>
											<p>{{ $order->order_n }}</p>
										</td>
									</tr>
								@endforeach
							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->

				</div>
				
				<div class="col-md-9">
						<div class="tab-content">
							@foreach($orders as $order)
								<!-- TAB PANE -->
								<div class="tab-pane fade" id="tab_{{ $order->id }}">
									<div class="row">
										<div class="col-md-12">
											<!-- BEGING ORDER INFO  -->
												<div class="portlet">
													<div class="portlet-title">
														<div class="caption">
															<i class="fa fa-globe"></i>{{ $order->order_n }}
														</div>							
													</div>
													<div class="portlet-body">
														<div class="tabbable-custom nav-justified">
															<ul class="nav nav-tabs nav-justified">
																<li class="active">
																	<a href="#tab_info_{{ $order->id }}" data-toggle="tab">Order Info</a>
																</li>
																<li>
																	<a href="#tab_customer_{{ $order->id }}" data-toggle="tab">Customer Info</a>
																</li>
																<li>
																	<a href="#tab_shipping_{{ $order->id }}" data-toggle="tab">Shipping Details</a>
																</li>
															</ul>
															<div class="tab-content">
																<div class="tab-pane active" id="tab_info_{{ $order->id }}">
																	<p>
																		I'm in Section 1.
																	</p>
																	<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
									
																	</div>
																	<p>
																		 Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat.
																	</p>
																</div>
																<div class="tab-pane" id="tab_customer_{{ $order->id }}">
																	<p>
																		Howdy, I'm in Section 2.
																	</p>
																	<p>
																		 Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat. Ut wisi enim ad minim veniam, quis nostrud exerci tation.
																	</p>
																	<p>
																		<a class="btn green" href="ui_tabs_accordions_navs.html#tab_1_1_2" target="_blank">Activate this tab via URL</a>
																	</p>
																</div>
																<div class="tab-pane" id="tab_shipping_{{ $order->id }}">
																	<p>
																		Howdy, I'm in Section 3.
																	</p>
																	<p>
																		 Duis autem vel eum iriure dolor in hendrerit in vulputate. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat
																	</p>
																	<p>
																		<a class="btn yellow" href="ui_tabs_accordions_navs.html#tab_1_1_3" target="_blank">Activate this tab via URL</a>
																	</p>
																</div>
															</div>
														</div><!-- End Tabs 2 -->
													</div> <!-- end portlet-body -->
												</div>
											<!-- END ORDER INFO -->
										</div> <!-- end col -->
									</div> <!-- end row -->
									<div class="clearfix">
									</div>
									<div class="row">
										<div class="col-md-12">
											<!-- BEGIN EXAMPLE TABLE PORTLET-->
											
												<div class="portlet box blue" id="order_products">
													<div class="portlet-title">
														<div class="caption">
															<i class="fa fa-globe"></i>Products
														</div>							
													</div>
													<div class="portlet-body">
															@if($order->entries->count())
																	<table class="table table-striped table-bordered table-hover table-full-width" id="table_{{ $order->id }}">
																		<thead>
																			<tr>
																				<th>SKU</th>
																				<th>Batch #</th>
																				<th>Production</th>
																				<th>Status</th>
																				<th>Options</th>
																			</tr>
																		</thead>
																		<tbody>
																			@foreach($order->entries as $entry)
																				<tr>
																					<td id="sku_{{ $entry->id }}"></td>														
																					<td id="batch_{{ $entry->id }}"></td>
																					<td id="prod_{{ $entry->id }}"></td>
																					<td >
																						<div class="progress">
																						<div id="status_{{ $entry->id }}" class="progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
																							
																						</div>
																						</div>
																					</td>
																					<td></td>
																				
																				</tr>
																			@endforeach
																		</tbody>
																	</table>
																	
															@else
																<div class="note note-info">
																	<h4 class="block">There are no Products found</h4>
																	<p>
																		 Please try selecting the "Add Product" Button!!
																	</p>
																</div>
															@endif
																
													</div>
												</div>
											<!-- END EXAMPLE TABLE PORTLET-->
										</div>
									</div>
								</div>
								<!-- END TAB PANE -->
							@endforeach
						</div><!-- End Tab Content -->
					</div> <!-- END Side -->
					
			</div> <!-- end row -->
			
			
		</div>
	</div>
	
<div id="newEntry" class="getOld"  style="display:one;">
<table>
<tr>
	<td>
		<div class="newtd" id="sku"></div>
		<div class="newtd" id="sku"></div>
	</td>														
	<td>
		<div class="newtd" id="batch"></div>
		
	</td>
	<td>
		<div class="newtd" id="prod"></div>
		
	</td>
	<td>
		<div class="progress">
			<div id="status" class="newtd progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
				
			</div>
		</div>
	</td>
	<td></td>
	
</tr>
</table>
</div>
<div id="dropEntry">
<table>


</table>
</div>
	@stop
	
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	@section('page_plugins')
	<script type="text/javascript" src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/plugins/data-tables/jquery.dataTables.min.js') }}"></script>
	
	<script type="text/javascript" src="{{ asset('assets/plugins/data-tables/DT_bootstrap.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/plugins/gritter/js/jquery.gritter.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/plugins/jquery.pulsate.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/plugins/jquery-bootpag/jquery.bootpag.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/plugins/holder.js') }}"></script>
	@stop
	<!-- END PAGE LEVEL PLUGINS -->
	
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	@section('page_scripts')
	<script src="{{ asset('assets/scripts/app.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/scripts/table-advanced.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/scripts/ui-general.js') }}"></script>
	
	<script>
	jQuery(document).ready(function() {       
	   App.init();
	   TableAdvanced.init();
	   UIGeneral.init();
	   
	   
	   
	   $('#order_menu tr:nth-child(1)').addClass('active').tab('show');
	   var ordersj = {{ $orders }};
	   
	   
	   // Retrieve the ID
		
	   
	   function setTables(orders)
	   {
	   		var newtds = $.map($("#newEntry .newtd"), function(n, i){
				return n;
			});
		   	var newEntry	= "#newEntry table tr";
	   		$.each($(orders), function(i)
	   		{
	   			var oid = orders[i].id;
		   		var entries = orders[i].entries;
		   		$.each($(entries), function(j)
		   		{
		   			var id = entries[j].id;
		   			var entry = entries[j];
			   		$(newEntry).clone().appendTo("#dropEntry table");
			   		$(newtds[0]).attr('id', "sku_" + id)
			   		$(newtds[1]).attr('id', "batch_" + id);
			   		$(newtds[2]).attr('id', "prod_" + id);
			   		$(newtds[3]).attr('id', "status_" + id);			   		
		   			$("#dropEntry table tr:nth-child(1)").addClass("hello");
		   			$("#dropEntry table tr:not('.hello')").appendTo("table_" + oid )
		   			

			   		
			   		
		   		});
	   		});
		   
	   }
	   	  
	   
	   function selectData(orders, prods)
	   {
			$.each($(orders), function(i)
			{
				var order = orders[i];
				var entries = orders[i].entries;
				
				$.each($(entries), function(j)
				{
					
					var entry 	= entries[j];
					var	sku		= entry.sku;
					var batch	= entry.batch_n;
					var prodid 	= entry.prodmethod_id;
					
					var status	= entry.status;
					var color	= entry.color;
					var id 		= entry.id;
					var Tsku 	= 	"#sku_" + id;
			   		var Tbatch	= 	"#batch_" + id;
			   		var Tprod	=	"#prod_" + id;
			   		var Tstatus	=	"#status_" + id;
			   		
			   		$.each($(prods), function(k)
			   		{
				   		if(prods[k].id == entry.prodmethod_id)
				   		{
					   		$(Tprod).text(prods[k].name);
				   		}
			   		});
			   		
					//prod = findProd(prods, prodid, Tprod);
					$(Tsku).text(sku);
			   		$(Tbatch).text(batch);
			   		
			   		$(Tstatus).addClass("progress-bar-" + color).css('width', status + "%");
						
					
				});
			});
	   }
	   function getOrders()
	   {
	   		$.get("{{ URL::to('collect/orders') }}").done(function(data)
			{ 												
				var orders = eval(data.orders);
				var production = eval(data.production);
				selectData(orders, production)
			});
	   }
   		$.get("{{ URL::to('collect/orders') }}").done(function(data)
		{ 												
			var orders = eval(data.orders);
			var production = eval(data.production);
			selectData(orders, production)
			setTables(orders);
			setOrders(orders);
		});
		function setOrders(orders)
		{
		   $.each($(orders), function(i)
		   {	
				var order = orders[i];
				var entries = order.entries;
				var tabBtn 		= "#tab_btn_" + order.id; 
				var NotTabBtn	= ".tab_button:not(#tab_btn_" + order.id + ")";
				// Tab Buttons
				$(tabBtn).click(function(e)
				{
					e.preventDefault();
					$(this).tab('show');
					$(NotTabBtn).removeClass('active');
					$(this).addClass('active');
				});
					
			}); // End Each Orders
		}

	   
	   

	   setInterval(getOrders, 5000);
	});
	</script>
	@stop
	