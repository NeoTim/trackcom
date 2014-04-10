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
							<table class="table table-striped table-bordered table-hover table-full-width" id="order_select">
							
							<tbody>

								

							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->

				</div>
			
				
					<div class="col-md-8">
						<div id="order_content" class="tab-content">
						
				
						</div>								
					</div>
					

			</div>
		</div>
	</div>
			



<div id="newtable" style="display:none;">
<table id="entry_table_id" class="table">
<tr>
	<td>sku</td>
	<td>batch_number</td>
	<td>
		<div class="row">
		
			<div class="col-xs-8">
			
				<div class="progress">
					
				</div>
				
				<div class="row" style="text-align:center;">
					<div class="col-xs-3">
						<p>Production</p>
					</div>
					<div class="col-xs-3">
						<p>Lab</p>
					</div>
					<div class="col-xs-3">
						<p>Fill</p>
					</div>
					<div class="col-xs-3">
						<p>Ready</p>
					</div>
				</div>
				
			</div><!-- end Col-xs-8-->
			
			<div class="col-xs-4">
				<div class="btn-group">
					<button data-toggle="modal" id="UEbtn_" data-target="#entries_model" type="button" class="btn btn-default ">Info</button>
					<button data-toggle="modal" id="DEbtn_" data-target="#delete_modal" type="button" class="btn btn-danger"><i class="fa fa-trash-o "></i></button>										
				</div>
			</div>
			
		</div><!-- end row-->
	</td>
</tr>
</table>

</div>
<div id="newoTab" style="display:none;">
	<div id="tab_id" class="tab-pane fade">
		<table class="table table-bordered order_table" id="table_id">
			<tr>
				<th>SKU</th>
				<th>Batch #</th>
				<th>Status</th>
			</tr>
		</table>
		
		<div class="btn-group">
			<button data-toggle="modal" id="CEbtn_id" data-target="#entries_model" type="button" class="btn btn-default ">Add Product</button>
			<button data-toggle="modal" id="UObtn_id" data-target="#UO_modal" type="button" class="btn btn-default ">Order Info</button>
			<button data-toggle="modal" id="DObtn_id" data-target="#delete_modal" type="button" class="btn btn-danger ">Delete</button>
			<a class="btn btn-primary" href="">View Order</a>
		</div>								
		
	</div>
</div>

<div id="neworderssssss" style="display:none;">
<a href="#tab_" class="list-group-item tab_button" data-toggle="tab" id="tab_btn_">
	<h4 class="list-group-item-heading">customer</h4>
	<p class="list-group-item-text">order_number</p>
</a>

</div>


<div id="neworder" style="display:none;">
<table>
<tr id="tab_btn_" class="tab_button" data-toggle="tab" data-target="" style="cursor:pointer;">
	<td>
		
		<h4 class="">customer</h4>
		<p class="">order_number</p>
		
	</td>
</tr>
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
	<script src="http://js.pusher.com/2.1/pusher.min.js" type="text/javascript"></script>
	<script src="{{ asset('pusher/PusherActivityStreamer.js') }}"></script>

	
	<script>
	jQuery(document).ready(function() {       
	   App.init();
	   TableAdvanced.init();
	   UIGeneral.init();
	   
	   // Data.Length
	   var entryL;
	   var orderL;


	   // Data Get Length
	   var ordersPHP = {{ $orders }};
	   var entriesPHP = {{ $entries }};
	   // data Length
	   orderL = ordersPHP.length;
	   entryL = entriesPHP.length;
	   
/*

			var pusher = new Pusher('064e7f64840b89322d86');
			var channel = pusher.subscribe('new-channel');
			var streamer = new PusherActivityStreamer(channel, '#activity_stream_example');
					  
			

			pusher.connection.bind('connected', function() {			
				//return NewData = data;
			});
			Pusher.log = function(message) {
		      if (window.console && window.console.log) {
		        window.console.log(message);
		      }
		    };
			console.log(NewData);
		 	
*/
		
		
		function loadOrders()
		{
			$.get("{{ URL::to('collect/orders') }}").done(function(data)
			{
				var orders		= eval(data.orders);
				var production	= eval(data.production);
				var entries 	= eval(data.entries);
				updateOrders(orders, entries);
			});
		}




		 		
		
			$.get("{{ URL::to('collect/orders') }}").done(function(data)
			{ 												
					var orders = eval(data.orders);
					var production = eval(data.production);
					var entries 	= eval(data.entries);
					placeOrders(orders, entries);
			});
		


		/*|
		  |  Template 
		  |
		  */	
		
		// New Tab
		function newOrderTab(nid)
		{			
			var newt	= "#newoTab div:first";
			var newtbl	= "#newoTab table";
			var newbtn1	= "#newoTab button:nth-child(1)";
			var newbtn2	= "#newoTab button:nth-child(2)";
			var newbtn3	= "#newoTab button:nth-child(3)";
			var newbtn4	= "#newoTab a";
			$(newt).attr('id', 'tab_' + nid);
			$(newtbl).attr('id', 'table_' +nid);
			$(newbtn1).attr('id', 'CObtn_' + nid);
			$(newbtn2).attr('id', 'UObtn_' + nid);
			$(newbtn3).attr('id', 'DObtn_' + nid);
			$(newbtn4).attr('href', "{{ URL::to('orders/') }}/" + nid);
			$(newt).clone().appendTo("#order_content");
			resetNewOrderTab();					
		}
		// Reset New Tab
		function resetNewOrderTab()
		{
			var newt	= "#newoTab tab-pane";
			var newtbl	= "#newoTab table";
			var newbtn1	= "#newoTab button:nth-child(1)";
			var newbtn2	= "#newoTab button:nth-child(2)";
			var newbtn3	= "#newoTab button:nth-child(3)";
			var newbtn4	= "#newoTab a";
			$(newt).attr('id', 'tab_id');
			$(newtbl).attr('id', "table_");
			$(newbtn1).attr('id', 'CObtn_');
			$(newbtn2).attr('id', 'UObtn_');
			$(newbtn3).attr('id', 'DObtn_');
			$(newbtn4).attr('href', "{{ URL::to('orders/') }}/");						
		}
		// New Order
		function newOrder(nid, ncompany, nnumber)
		{
			
			var newtr	= "#neworder table tr";
			var newh4 	= "#neworder h4";
			var newp	= "#neworder p";
			$(newtr).attr('data-target', '#tab_' + nid);		
			$(newtr).attr('id', "tab_btn_" + nid);
			$(newh4).text(ncompany);
			$(newp).text(nnumber);
			$(newtr).clone().appendTo("#order_menu table");
			resetNewOrder();										
		}
		// Reset New Order			
		function resetNewOrder()
		{
			var newtr	= "#neworder table tr";
			var newh4 	= "#neworder h4";
			var newp	= "#neworder p";
			$(newtr).attr('data-target', '#tab_');
			$(newtr).attr('id', "tab_btn_");
			$(newh4).text("customer");
			$(newp).text("number");
		}
		
		
		// New Order Table
		function newOrderContentTable(nsku, nbatch, nstatus, ncolor, nid, noid)
		{
			
			var newt		= "#newtable tr";	
			var newsku		= "#newtable tr td:nth-child(1)";
			var newbatch	= "#newtable tr td:nth-child(2)";
			var newstatus	= "#newtable .progress";
			var neweebtn1	= "#newtable button:nth-child(1)";
			var neweebtn2	= "#newtable button:nth-child(2)";
			$(newt).attr('id', 'entry_table_' + nid);
			$("#entry_table_" + nid).addClass('EntryTR');
			$(newsku).text(nsku);
			$(newbatch).text(nbatch);
			//$(newstatus).attr('id', "status_" + nid);
			//$("#status_" + nid).addClass("progress-bar-" + ncolor).css("width", nstatus + "%");
			$(newstatus).html("<div id='status_bar' class='newtd progress-bar progress-bar-" + ncolor + "' role='progressbar' aria-valuenow='20' aria-valuemin='0' aria-valuemax='100' style='width:" + nstatus + "%;'></div>");
			$(neweebtn1).attr('id', 'UEbtn_' + nid);
			$(neweebtn2).attr('id', 'DEbtn_' + nid);
			$(newt).clone().appendTo('#table_' + noid);
			//console.log("#table_" + noid);
			resetNewOrderContentTable(nid);
			//console.log(newstatus);
		}
		
		// Reset New Order Table		
		function resetNewOrderContentTable()
		{
			var newt		= "#newtable tr";
			var newsku		= "#newtable tr td:nth-child(1)";
			var newbatch	= "#newtable tr td:nth-child(2)";
			var newstatus	= "#newtable .progress";
			var neweebtn1	= "#newtable button:nth-child(1)";
			var neweebtn2	= "#newtable button:nth-child(2)";
			$(newt).attr('id', 'entry_table_id').removeClass("EntryTR");
			$(newsku).text("sku");
			$(newbatch).text("batch");
			//$(newstatus).attr('id', "status_bar");
			//$(newstatus).css("width", "0%");
			$(newstatus).html("");
			$(neweebtn1).attr('id', 'UEbtn_');
			$(neweebtn2).attr('id', 'DEbtn_');
		}
		// Form Variables
		var COurl = "{{ URL::to('orders') }}";
		
		
		// Delete function
		function delete_this(url)
		{}
		// AJAX Form Submition
		$('#orders_modal form').submit(function(e){
	
		    $.ajax({
		        url: newOrderForm,
		        type: 'POST',
				data: { company: $("input#order_customer").val(), order_n: $("input#order_number").val() },
		        dataType: 'json',
		        success: function(data){
		        	alert(data);
		         }
		    });
		    e.preventDefault();
		
		    $("#orders_model").modal('hide');
		});
	
	
	
	/* Template Setting */
	
	
	// CLEAR ALL
	function clearAll()
	{
		var orderMenu		=	"#order_menu table";
		var orderContent	=	"#order_content";
		$(orderMenu).html("");
		$(orderContent).html("");
	}
	// UPDATE ORDERS
	function updateOrders(orders, entries)
	{
		var setOL = orders.length;
		var setEL = entries.length;
		console.log(entryL);
		console.log(orderL);
		if(setOL > orderL)
		{
			clearAll();
			placeOrders(orders, entries);
			return orderL = setOL;
		}else if(setEL > entryL)
		{
			clearAll();
			placeOrders(orders, entries);
			return entryL = setEL;
		}
	}
	// PLACE ORDERS
	function placeOrders(orders, entries)
	{
		$.each($(orders), function(i)
		{
			var oid = orders[i].id;
			newOrder(orders[i].id, orders[i].company, orders[i].order_n);
			newOrderTab(orders[i].id);
			
			$.each($(entries), function(j)
			{				
				if(entries[j].order_id == oid)
				{					
					newOrderContentTable(entries[j].sku, entries[j].batch_n, entries[j].status, entries[j].color, entries[j].id, entries[j].order_id);
				}
			});
		
		});
		var tabB = $.map($("#order_menu .tab_button"), function(n, i){
			return "#" + n.id;
		});
		$(tabB[0]).addClass('active').tab("show");

		orderConfig(orders, entries);
	}
	// ORDER BLOCK CONFIG
	function orderConfig(orders, entries)
	{
		$.each($(orders), function(i)
		{
			var oid = orders[i].id;
			var order = orders[i];
			var tabBtn 		= "#tab_btn_" + oid; 
			var NotTabBtn	= ".tab_button:not(#tab_btn_" + oid + ")"; 
			
			$(tabBtn).click(function(e)
			{
				e.preventDefault();
				$(this).tab('show');
				$(NotTabBtn).removeClass('active');
				$(this).addClass('active');
			});
	
		});
	
	}
	
	// SET ORDERS ********* NOT IN USE **********
	function setOrders(orders, entries)
	{
		$.each($(orders), function(i)
		{
			var oid = orders[i].id;
			var order = orders[i];
			var tabBtn 		= "#tab_btn_" + oid; 
			var NotTabBtn	= ".tab_button:not(#tab_btn_" + oid + ")"; 
			var UObtn		= "#UObtn_"+oid;
			var CEbtn 		= "#CEbtn_"+oid;
			var DObtn		= "#DObtn_"+oid;
			
								
			$(DObtn).click(function(){
				$("#delete_modal form").attr('action', "{{ URL::to('/orders') }}/" + oid);
	
			});
			$(CEbtn).click(function(){
				//$(ef).attr("action", "{{ URL::to('entries/store') }}");
				$(efc).val("");
				$("#order_id").val(oid);
				
					
				
				
			});
			$(tabBtn).click(function(e)
			{
				e.preventDefault();
				$(this).tab('show');
				$(NotTabBtn).removeClass('active');
				$(this).addClass('active');
			});
			$(UObtn).click(function(){				
				
				$(ofc[0]).val(oid);
				$(ofc[1]).val(order.company);
				$(ofc[2]).val(order.order_n);
			});
			
	
			
		});
		
		$.each($(orders), function(j)
		{
			
		
			$.each($(entries), function(i)
			{
				if(entries[i].order_id == orders[j].id)
				{
					var eid = entries[i].id;
					var entry = entries[i];
					var UEbtn = "#UEbtn_"+eid;
					var DEbtn = "#DEbtn_"+eid;
					
					
					
					
					$(DEbtn).click(function(){
						$("#delete_modal form").attr('action', "{{ URL::to('/entries') }}/" + eid);
						
						
						var BASE  = "{{ URL::to('/entries') }}/" + eid;
					
						$('#delete_modal form').submit(function(e){
					
						    $.ajax({
						        url: BASE,
						        type: 'DELETE',
						        
						        dataType: 'json',
						        success: function(info){
						                     //console.log(info);
						         }
						    });
						
						    e.preventDefault();
						    $("#delete_modal").modal('hide');
						});
					});
					
					
					function changeVal(target, value){
						$(efc[target]).val(value);
					}
					
					
					$(UEbtn).click(function(){
						$(ef).attr("action", "{{ URL::to('entries/update') }}");
						changeVal(0, entry.id);
						changeVal(1, entry.order_id);
						changeVal(2, entry.sku);
						changeVal(3, entry.batch_number);
						changeVal(4, entry.tank_number);
						changeVal(5, entry.container1);
						changeVal(6, entry.qty1);
						changeVal(7, entry.desc1);
						changeVal(8, entry.container2);
						changeVal(9, entry.qty2);
						changeVal(10, entry.desc2);
						changeVal(11, entry.container3);
						changeVal(12, entry.qty3);
						changeVal(13, entry.desc3);
						changeVal(14, entry.production);
						changeVal(15, entry.shipping);
							
					});
					$("#DEbtn").click(function(){
						$("#delete_id").val(eid);
						$("#delete_message").text("Remove "+ ex.sku +" from production?");
					});
				}
		
		
				
			});
		});
	}	

		// SET INTERVAL
	   setInterval(loadOrders(), 5000);
	   
	});
	</script>
	@stop
	