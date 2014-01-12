@extends('layouts.blueprint')

@section('extra')
<style type="text/css">

	#box_metro, #box_shipping, #box_outbound, #box_pickup { list-style-type: none; margin: 0; padding: 0;  }
  	#box_metro li, #box_shipping li, #box_outbound li, #box_pickup li { margin: 0 3px 3px 3px;   font-size: 1em; height: 20px; padding:3px; }
  	#box_metro li p, #box_shipping li p, #box_outbound li p, #box_pickup li p  { position: absolute; margin-left: -1.3em; }
  	
  	.external-order {
  		display: block;
		cursor: move;
		margin-bottom: 5px;
		margin-left: 5px;
  	}
  	.drop_orders li.label{
  		text-align: left;
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

		
		<div class="modal fade" id="trucks_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h4 class="modal-title" id="myModalLabel">Configure Trucks</h4>

		      </div>
		      <div class="modal-body">
		        @foreach($trucks as $truck)
		        {{Form::open(array('route' => array('trucks.update', $truck->id), 'class' => 'form-horizontal', 'id' => 'form_' . $truck->id))}}
		        	<div class="form-group">
		        		<label for="input" class="col-sm-2 control-label"><strong># {{$truck->number}}</strong></label>
		        		<div id="" class="col-sm-9 input-group">
		        			<div class="input-group-btn">
		        			{{Form::select('dmethod_id', $methods, $truck->dmethod_id, array('class' => 'selectpicker', 'id' => 'dOptions_' . $truck->id , 'data-style' => 'btn-inverse'))}}
		        			</div>
		        			{{Form::text('driver', $truck->driver, array('class' => 'form-control', 'id' => 'driver_' . $truck->id, 'placeholder' => 'Driver'))}}
		        		</div>
		        		
		        	</div>
		       	{{Form::close()}}
		        @endforeach
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        <button id="submit_trucks" type="submit" class="btn btn-primary">Save changes</button>
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

	<div class="col-md-3">
		<div class="panel panel-inverse order_btns">
			  <div class="panel-heading">
					<h3 class="panel-title">Orders</h3>
			  </div>
			  <div id="docked_orders" class="panel-body">
			  	
				Metro Deliveries
				<hr>
				<ul id="box_metro" data-dtype='1' class="connectedSortable" style="min-height:10px;">
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
				<ul id="box_outbound" data-dtype='4' class="connectedSortable" style="min-height:10px;">
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
			<div class="col-md-4">
				<div class="panel panel-primary">
					<div class="panel-heading" style="text-align:center;">
						<h1 class="panel-title" style="text-align:center; float:none; font-size:30px;">{{{$truck->dmethod->name}}}</h1>
						<h4 class="panel-title" style="text-align:center; float:none;">
							<span>
								{{{$truck->number}}}
							</span>
						</h4>
					</div>
					<div class="panel-body">
						<ul id="drop_truck_{{$truck->id}}" class="connectedSortable drop_orders pricing-content unstyled-list" data-id="{{$truck->id}}" style="min-height:10px;">

						</ul>
					</div>
					<div class="panel-footer">
						<p>
							
						</p>
						<a href="#" class="btn btn-primary">
						Details <i class="m-icon-swapright m-icon-white"></i>
						</a>
						<p style="display:inline; float:right;">Driver:<strong> {{$truck->driver}}</strong></p>
					</div>
				</div>
			</div>	

	
	@endforeach
	</div>

@stop


<!-- <div class="col-md-9">
        <div class="col-md-3">
            <form action="#" method="get">
                <div class="input-group">
                   
                    <input class="form-control" id="system-search" name="q" placeholder="Search for" required>
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
                    </span>
                </div>
            </form>
        </div>
		<div class="col-md-9">
    	 <table class="table table-list-search">
                    <thead>
                        <tr>
                            <th>Entry</th>
                            <th>Entry</th>
                            <th>Entry</th>
                            <th>Entry</th>
                            <th>Entry</th>
                            <th>Entry</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Sample</td>
                            <td>Filter</td>
                            <td>12-11-2011 11:11</td>
                            <td>OK</td>
                            <td>123</td>
                            <td>Do some other</td>
                        </tr>
                        <tr>
                            <td>Try</td>
                            <td>It</td>
                            <td>11-20-2013 08:56</td>
                            <td>It</td>
                            <td>Works</td>
                            <td>Do some FILTERME</td>
                        </tr>
                        <tr>
                            <td>§</td>
                            <td>$</td>
                            <td>%</td>
                            <td>&</td>
                            <td>/</td>
                            <td>!</td>
                        </tr>
                    </tbody>
                </table>   


@stop
		</div> -->
@section('page_scripts')
<script type="text/javascript">	
		var saveTrucks = '#submit_trucks';
		var activeSystemClass = $('.list-group-item.active');
		var trucks = {{$trucks}};
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


	$(document).ready(function(){
		$(".selectpicker").selectpicker('setStyle', 'btn-inverse');
		$(".order_btns .btn").css('margin', '2px 0 2px 0');

		$( "#box_metro, #box_outbound, #box_shipping, #box_pickup" ).sortable({
      		connectWith: "ul.connectedSortable",
      		dropOnEmpty: true
      		
    	}).disableSelection();

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



    	$( "#drop_truck_1, #drop_truck_2, #drop_truck_3, #drop_truck_4, #drop_truck_5" ).sortable({
      		connectWith: "ul.connectedSortable",
      		dropOnEmpty: true,
      		receive: function( event, ui ) {
      			
      			$(ui.item).removeClass("label-primary label-warning label-success label-danger");
      			$(ui.item).css("border", "none");
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



		
		 
    	function getTruckOrders(id, title, truck, position, dtype)
    	{
    		var temp = ['<li id="' + id + '" class="external-order label ui-draggable" data-dtype="' + dtype + '" style="position: relative;">',
			'<i class="fa fa-tags" style=""></i> ' + title + ' </li>'].join('');
			$(temp).appendTo("#drop_truck_" + truck);
    	}

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
			// if(dmethods[j].id == formDataId)
			// {
			// 	return formDataName = dmethods[ie].name;
			// }
				
		}

		$.each($(orders), function(i, order){
			//var truck_id = getTruckId(order.id);
			if(order.dtype_id == 1 || order.dtype_id == 4)
			{
				getTruckOrders(order.id, order.title, order.truck_id, order.position, order.dtype_id);
			}
		});


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
			// if(dmethods[j].id == formDataId)
			// {
			// 	return formDataName = dmethods[ie].name;
			// }
				
		}

		$("#submit_trucks").click(function(){
			$.each($(trucks), function(i, truck){
				var form 			= "#form_" + truck.id;
				var formUrl			= $(form).attr("action");
				var formDataId 		= $("#dOptions_" + truck.id).val();
				var formDataDriver 	= $("#driver_" + truck.id).val();
				var formDataName	= getFormDataName(formDataId);
				var selectData 		= "#dOptions_" + truck.id;

				console.log(formDataName);

				 $.ajax({
				 	url: formUrl,
				 	type: "PUT",
				 	data: { dmethod_id: formDataId, dmethod_name: formDataName, driver: formDataDriver },
				 	cache: false ,
				 	success: function(data){
				 		$("#trucks_modal").modal('hide');
				 		console.log(data);
				 	}
				 });
			});
		});


	    //something is entered in search form
	    $('#system-search').keyup( function() {
	       var that = this;
	        // affect all table rows on in systems table
	        var tableBody = $('.table-list-search tbody');
	        var tableRowsClass = $('.table-list-search tbody tr');
	        $('.search-sf').remove();
	        tableRowsClass.each( function(i, val) {
	        
	            //Lower text for case insensitive
	            var rowText = $(val).text().toLowerCase();
	            var inputText = $(that).val().toLowerCase();
	            if(inputText != '')
	            {
	                $('.search-query-sf').remove();
	                tableBody.prepend('<tr class="search-query-sf"><td colspan="6"><strong>Searching for: "'
	                    + $(that).val()
	                    + '"</strong></td></tr>');
	            }
	            else
	            {
	                $('.search-query-sf').remove();
	            }

	            if( rowText.indexOf( inputText ) == -1 )
	            {
	                //hide rows
	                tableRowsClass.eq(i).hide();
	                
	            }
	            else
	            {
	                $('.search-sf').remove();
	                tableRowsClass.eq(i).show();
	            }
	        });
	        //all tr elements are hidden
	        if(tableRowsClass.children(':visible').length == 0)
	        {
	            tableBody.append('<tr class="search-sf"><td class="text-muted" colspan="6">No entries found.</td></tr>');
	        }
	    });
		

	});
</script>



@stop
