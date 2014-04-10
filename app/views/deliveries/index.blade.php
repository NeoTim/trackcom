@extends('layouts.blueprint')

@section('extra')
<style type="text/css">

	#box_metro, #box_shipping, #box_outbound, #box_pickup { list-style-type: none; margin: 0; padding: 0;  }
  	#box_metro li, #box_shipping li, #box_outbound li, #box_pickup li { margin: 0 3px 3px 3px;   font-size: 1em; height: 20px; padding:3px; }
  	#box_metro li p, #box_shipping li p, #box_outbound li p, #box_pickup li p  { position: absolute; margin-left: -1.3em; }
  	
  	ul.drop_orders{
  		maring-left:0px;
  		padding-left: 0px;
  	}

  	.external-order {
  		display: block;
		cursor: move;
		margin-bottom: 5px;
		margin-left: 0px;
		padding-left:0;
  	}

  	.drop_orders li.label{
  		text-align: left;
  		

  	}
  	.drop_orders li {
  		padding-top: 5px;
  		border-bottom: 1px solid #eee;
  		color:#777777;
  	}
  	.drop_orders li i{
  		color:#4fa950;
  	}


</style>
@stop

@section('page_title')
Deliveries
@stop


@section('content')
		<div class=" aligncenter">
			<div class=" aligncenter" style="text-align:center;"><button id="" data-toggle="modal" data-target="#trucks_modal" class="btn btn-primary aligncenter">Delivery Trucks</button></div>
		</div>
		<br />
		<br />

		
	@include('deliveries.modals.trucks')

	<div class="col-md-3">
		<div class="panel panel-inverse order_btns">
			  <div class="panel-heading">
					<h3 class="panel-title">Orders</h3>
			  </div>
			  <div id="docked_orders" class="panel-body">
			  	
				Metro Deliveries
				<hr>
				<ul id="box_metro" data-dtype='1' class="connectedSortable order_box_1" style="min-height:10px;">
			  	@foreach($orders as $order)
					@if($order->dtype_id == 1 AND $order->truck_id == 0)
						<li id="{{$order->id}}" class="external-order label label-primary ui-draggable" style="position: relative;"><i class="fa fa-tags" style="display:none;"></i> {{$order->title}} </li>
					@endif
				@endforeach
				</ul>
				<br>
				<br>
				Outbound Deliveries
				<hr>
				<ul id="box_outbound" data-dtype='4' class="connectedSortable order_box_4" style="min-height:10px;">
				@foreach($orders as $order)
					@if($order->dtype_id == 4)
						<li id="{{$order->id}}" class="external-order label label-warning ui-draggable" style="position: relative;"><i class="fa fa-tags" style="display:none;"></i> {{$order->title}} </li>
					@endif
				@endforeach
				</ul>
				
				
			</div>
		</div>
	</div>

	<div class="col-md-9">
	@foreach($trucks as $truck)
		@if($truck->active == 0)
			<div id="truck_panel_{{$truck->id}}"  class="col-md-4 truck_panel hidden_truck_panel" style="display:none;">
		@else
			<div id="truck_panel_{{$truck->id}}"  class="col-md-4 truck_panel">
		@endif
				<div class=" panel panel-primary">
					<div class="panel-heading" style="text-align:center;">
						<h1 class="panel-title" style="text-align:center; float:none; font-size:30px;">{{{$truck->dmethod_name}}}</h1>
						<h4 class="panel-title" style="text-align:center; float:none;">
							<span id="truck_number_{{$truck->id}}">
								{{{$truck->number}}}
							</span>
						</h4>
					</div>
					<div class="panel-body">
						<ul id="drop_truck_{{$truck->id}}" class="connectedSortable drop_orders unstyled-list" data-id="{{$truck->id}}" style="min-height:10px;">

						</ul>
					</div>
					<div class="panel-footer">
						<p>
							
						</p>
						<a href="#" class="btn btn-primary">
						Details <i class="m-icon-swapright m-icon-white"></i>
						</a>
						<p style="display:inline; float:right;">Driver: <strong id="truck_driver_{{$truck->id}}">{{$truck->driver}}</strong></p>
					</div>
				</div>
			</div>	

	
	@endforeach
	</div>
	
		
	

@stop



@section('page_scripts')


<script type="text/javascript">	
		


	$(document).ready(function(){

		var clearF = ['<div class="clearfix"></div>'].join('');
		$(".truck_panel:nth-child(3n+3)").after(clearF);
		var saveTrucks = '#submit_trucks';
		var activeSystemClass = $('.list-group-item.active');
		var trucks = [];
		var dmethods = {{$dmethods}};
		var orders = {{$orders}};

		

		function updateOrder(id, pos, truck, dtype)
		{
			$.ajax({
				url: "{{ URL::to('deliveries') }}/" + id,
				method: "PUT",
				data: { position: pos, truck_id: truck, dtype_id: dtype },
				cache: false,
				success: function(data){
					console.log(data);
				}
			});
		}
		function removeTruckOrders(id)
		{				
			$.ajax({
				url: "{{ URL::to('deliveries') }}/" + id,
				method: "PUT",
				data: { truck_id: '0' },
				cache: false,
				success: function(data){
					if(data.dtype_id == 1)
					{
						$("#" + id).addClass('label-primary').appendTo('.order_box_' + data.dtype_id);
						$("#" + id + " i").hide();
					}
					if(data.dtype_id == 4)
					{
						$("#" + id).addClass('label-warning').appendTo('.order_box_' + data.dtype_id);
						$("#" + id + " i").hide();
					}
					console.log(data);
				}
			});			
		}

		function getTruckOrders(id, title, truck, position, dtype)
    	{
    		var temp = ['<li id="' + id + '" class="external-order label ui-draggable" data-dtype="' + dtype + '" style="position: relative;">',
			'<i class="fa fa-tags" style=""></i> ' + title + ' </li>'].join('');
			$(temp).appendTo("#drop_truck_" + truck);
    	}


		
		
		$(".order_btns .btn").css('margin', '2px 0 2px 0');


		// GLOBAL Sortable options for orders
		$( "#box_metro, #box_outbound, #box_shipping, #box_pickup" ).sortable({
      		connectWith: "ul.connectedSortable",
      		dropOnEmpty: true
      		
    	}).disableSelection();

		// Sortable options for Metro deliveries
    	$( "#box_metro" ).sortable({
      		receive: function( event, ui ) {
      			$(ui.item).removeClass("label-warning ");
      			$(ui.item).addClass(" label label-primary");
      			$("#box_metro i").hide();
      			var truck = '0';
      			var dtype = $(this).attr("data-dtype");
	            var positions = $.map($(this).find('li'), function(el) {
	                //return el.id + ' = ' + $(el).index();
	                return { id: el.id, p: $(el).index() + 1  };
	        	});
	        	$.each($(positions), function(i, pos)
	        	{

	        		console.log(pos.id + '=' + pos.p);
					updateOrder(pos.id, pos.p, truck, dtype);
	        	});
      		}
      	}).disableSelection();

    	// Sortable options for Outbound deliveries
    	$( "#box_outbound" ).sortable({
      		receive: function( event, ui ) {
      			

      			$(ui.item).removeClass("label-primary ");
      			$(ui.item).addClass(" label label-warning");
      			$("#box_outbound i").hide();

      			var truck = '0';
      			var dtype = $(this).attr("data-dtype");
	            var positions = $.map($(this).find('li'), function(el) {
	                //return el.id + ' = ' + $(el).index();
	                return { id: el.id, p: $(el).index() + 1  };
	        	});
	        	$.each($(positions), function(i, pos)
	        	{

	        		console.log(pos.id + '=' + pos.p);
					updateOrder(pos.id, pos.p, truck, dtype);
	        	});
      		},

      		update: function( event, ui ) {
      			
      		}
    	}).disableSelection();

    	// Sortable options for delivery trucks
    	function setTrucks(trucks)
    	{
    		$.each($(trucks), function(i, truck){
		    	$( "#drop_truck_" + truck.id).sortable({
		      		connectWith: "ul.connectedSortable",
		      		dropOnEmpty: true,
		      		forcePlaceholderSize: true,
		      		out: function( event, ui ) {
		      			$(ui.item).css("border", "none");
		      		},
		      		receive: function( event, ui ) {
		      		
		      			$(ui.item).removeClass("label-primary label-warning label-success label-danger");
		      			
		      			$(".drop_orders i").show();

		      			var truck = $(this).attr("data-id");
		      			var dtype = $(ui.item).attr("data-dtype");
			            var positions = $.map($(this).find('li'), function(el) {
			                //return el.id + ' = ' + $(el).index();
			                return { id: el.id, p: $(el).index() + 1  };
			        	});
			        	$.each($(positions), function(i, pos)
			        	{

			        		console.log(pos.id + '=' + pos.p);
							updateOrder(pos.id, pos.p, truck, dtype);
			        	});


		      		},
		      		start: function( event, ui ) {
		      			$(ui.item).addClass("label");

		      		},
		      		stop: function(e, ui) {
		      			
					}
		    	}).disableSelection();
    		});
    	}
   	
    	// Get truck id -- NOT IN USE
		function getTruckId(id)
		{
			var truckId = [];
			truckId = $.grep($(trucks), function(idx){
				return idx.id == id;
			});
			if(truckId && truckId.length == 1)
			{
				return truckId[0].name;
			}
		}

		// Get Dmethod Name for updating trucks
		function getFormDataName(id)
		{
			var dname = [];
			dname = $.grep($(dmethods), function(idx){
				return idx.id == id;
			});
			if(dname && dname.length == 1)
			{
				return dname[0].name;
			}	
		}
		


		// Get Trucks Via AJAX
		$.get("{{URL::route('trucks.show')}}").done(function(data){
			trucks = eval(data);
			setTrucks(trucks);
			$.each($(trucks), function(i, truck){
				
				$("#remove_truck_" + truck.id).click(function(){
					var form 	= "#form_" + truck.id;
					var formUrl			= $(form).attr("action");
					var panel 			= "#truck_panel_" + truck.id;
					var truckOrders  		= panel + " li";

					$("#active_" + truck.id).val(0);
					
					$.ajax({
					 	url: formUrl,
					 	type: "PUT",
					 	data: { active: 0 },
					 	cache: false ,
					 	success: function(data){
					 		$(form).addClass("hidden_truck").fadeOut();
							$(panel).addClass('hidden_truck_panel').fadeOut();
							$.each($(truckOrders), function(i, order){

								var orderId = $(order).attr("id");
								removeTruckOrders(orderId);

							});
							
					 	}
					 });
				});
			});
			$("#submit_trucks").click(function(){

				$.each($(trucks), function(i, truck){
					var panel 			= "#truck_panel_" + truck.id;
					var form 			= "#form_" + truck.id;
					var formUrl			= $(form).attr("action");
					var formDataNumber	= $("#dNumber_" + truck.id).val();
					var formDataId 		= $("#dOptions_" + truck.id).val();
					var formDataDriver 	= $("#driver_" + truck.id).val();
					var formDataName	= getFormDataName(formDataId);
					var formDataActive  = $("#active_" + truck.id).val();
					console.log(formDataActive);
					
					if(formDataActive == 1)
					{
						 $.ajax({
						 	url: formUrl,
						 	type: "PUT",
						 	data: { dmethod_id: formDataId, dmethod_name: formDataName, driver: formDataDriver, number: formDataNumber, active: formDataActive },
						 	cache: false ,
						 	success: function(data){
						 		$("#truck_panel_" + data.id + " h1.panel-title").html(data.dmethod_name);
						 		$("#truck_driver_" + data.id).html(data.driver);
						 		$("#trucks_modal").modal('hide');
						 		$("#truck_number_" + data.id).html(data.number);
						 		console.log(data.number);
						 	}
						 });
					}
				});
			});

			$("#add_truck").click(function(){
				var newTruck 	= ".hidden_truck:first";
				var newPanel 	= ".hidden_truck_panel:first";
				var id 			= $(newTruck).attr("data-id");
				var formUrl	 	= $(newTruck).attr("action");

				$.ajax({
				 	url: formUrl,
				 	type: "PUT",
				 	data: { active: 1 },
				 	cache: false ,
				 	success: function(data){
						$(newTruck + " input.active_truck").val("1");
						$(newTruck).fadeIn().removeClass('hidden_truck');
						$(newPanel).fadeIn().removeClass('hidden_truck_panel');
				 	}
				});
				
			});
		});

		
			
		


		$.each($(orders), function(i, order){
			//var truck_id = getTruckId(order.id);
			console.log(order.id);

			if(order.dtype_id == 1 || order.dtype_id == 4)
			{
				getTruckOrders(order.id, order.title, order.truck_id, order.position, order.dtype_id);
			}
		});

	});
</script>



@stop
