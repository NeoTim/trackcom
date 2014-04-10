@extends('layouts.blueprint')
@section('page_title')
	Production
@stop

@section('extra')
<style type="text/css">

	
	html>body .dropTbody tr { height: 1.5em; line-height: 1.2em; cursor: move;}
  	.dropTbody .ui-state-highlight { height: 6em; line-height: 3.2em;}
  	.dropTbody .ui-state-highlight,
	.dropTbody .ui-widget-content .ui-state-highlight,
	.dropTbody .ui-widget-header .ui-state-highlight {
	border: 1px solid #fcefa1;
	background: #fbf9ee url({{ asset('assets/plugins/jquery-ui/images/ui-bg_glass_55_fbf9ee_1x400.png')}}) 50% 50% repeat-x;
	color: #363636;
	}
	.dropTbody .ui-state-highlight td,
	.dropTbody .ui-widget-content .ui-state-highlight td,
	.dropTbody .ui-widget-header .ui-state-highlight td {
		color: #363636;
	}
</style>
@stop


@section('content')		
						

@if($pmethods->count())
	

<div class="tabbable-custom ">
	<ul class="nav nav-tabs ">
		@foreach($pmethods as $pmethod)
			@if($pmethod->ptype_id == 1)
			<li id="tab_{{$pmethod->id}}" class="">
				<a href="#tab_5_{{$pmethod->id}}" data-toggle="tab">{{$pmethod->name}}</a>
			</li>
			@elseif($pmethod->ptype_id == 2)
			<li class="pull-right">
				<a href="#tab_5_{{$pmethod->id}}" data-toggle="tab">{{$pmethod->name}}</a>
			</li>
			@endif
		@endforeach
	</ul>
	<div class="tab-content">
		
		@foreach($pmethods as $pmethod)
		<div class="tab-pane fade" id="tab_5_{{$pmethod->id}}">
			<p>
				
			</p>
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-hover table-full-width dataTable" id="table_{{$pmethod->id}}" aria-describedby="sample_2_info" style="width: 1060px;">
					
							<thead>
								<tr>
									<th style="display:none;">ID</th>
									<th style="width:15px;">Order #</th>
									<th style="width:100px;">Sku</th>
									<th style="width:100px;">Date</th>
									<th style="width:50px;">Batch</th>
									<th style="width:30px;">Containers</th>
									<th style="width:15px;">Quantity</th>
									<th style="width:100%;">Status</th>
									<th style="min-width:200px;">Options</th>
								</tr>
							</thead>
	
							<tbody class="dropTbody" id="tbody_{{ $pmethod->id }}" style="width:100%;">
								@foreach ($entries as $entry)
									@if($entry->pmethod_id == $pmethod->id)
										@if($entry->ptype_id !== 3 OR $entry->ptype_id !== 4)
										<tr class="table_tr_{{ $entry->id }}" id="{{ $entry->id }}" style="">
										</tr>
										@endif

									@endif
								@endforeach
							</tbody>
						
				</table>
			</div>
		</div>
		@endforeach
	</div>
</div>

{{ Form::open(array('url' => array('entries/update'), 'id' => 'status_form', 'method' => 'put')) }}
{{ Form::hidden('status', '', array('id' => 'input_status')) }}
{{ Form::hidden('color', '', array('id' => 'input_color')) }}
{{ Form::hidden('label', '', array('id' => 'input_label')) }}
@else
	There are no orders
@endif
	
@stop

@section('page_scripts')
<script type="text/javascript">


$(document).ready(function(){

  	

	$("#tab_5_1").addClass("fade in");

	$('#production_modal').on('hidden.bs.modal', function () {
	  $(this).removeData('bs.modal modal-body');
	});	
	$(".lg_modal").css("width", "1024px");
	$('.nav-tabs li:nth-child(1) a').tab('show');
	var inputS = "#input_status";
	var inputC = "#input_color";
	var inputL = "#input_label";
	var formS  = "#status_form";


	var color = [];
	var status = [];
	var label = [];
	var id = [];
	var newid = [];
	var order_id = [];
	var orderNumber = [];
	var status=[];
	var entries = [];
	var orders = [];
	var ESUbtn = [];
	var ESDbtn = [];
	var methods = {{$pmethods}};
	setEntries();

	var each = function(array, cb){
		for (var i = 0; i < array.length; i++) {
			cb(array[i], i);
		};
	}

	function setEntries(newid)
	{
		$.get("{{URL::to('productions/show')}}").done(function(data){
			orders = eval(data[0]);
			entries = eval(data[1]);
			$.each($(entries), function(i){
				color = entries[i].color;
				status = entries[i].status;
				label = entries[i].label;
				id = entries[i].id;
				sku = entries[i].sku;
				batch = entries[i].batch;
				tank = entries[i].tank;
				container1 = entries[i].container1;
				container2 = entries[i].container2;
				container3 = entries[i].container3;
				qty1 = entries[i].qty1;
				qty2 = entries[i].qty2;
				qty3 = entries[i].qty3;
				pmethod_id = entries[i].pmethod_id;
				order_id = entries[i].order_id;
				ready_date = entries[i].ready_date;
				setTDS(id, sku, batch, tank, container1, container2, container3, qty1, qty2, qty3, pmethod_id, newid, ready_date, order_id);
				setBars(id, status, color, label);
				setButtons(id, order_id);
				ESUbtn = "#ESUbtn_" + id;
				ESDbtn = "#ESDbtn_" + id;
				statusUp(status, id, ESUbtn);
				statusDown(status, id, ESDbtn);
				setOrderNumber(order_id, id);

			});

			each(orders, function(item, index){
				console.log(item.id);
				//$(item.number).appendTo("#order_" + item.id);
				$(".order_" + item.id).html(item.number);
			});

		});
	}
	function addEntry(data)
	{
		var entry = jQuery.parseJSON(data);
		color = entry.color;
		status = entry.status;
		label = entry.label;
		id = entry.id;
		sku = entry.sku;
		batch = entry.batch;
		tank = entry.tank;
		container1 = entry.container1;
		container2 = entry.container2;
		container3 = entry.container3;
		qty1 = entry.qty1;
		qty2 = entry.qty2;
		qty3 = entry.qty3;
		ready_date = entry.ready_date;
		pmethod_id = entry.pmethod_id;
		order_id = entry.order_id;
		setTR(id, pmethod_id);
		setTDS(id, sku, batch, tank, container1, container2, container3, qty1, qty2, qty3, pmethod_id, newid, ready_date, order_id);
		setBars(id, status, color, label);
		setButtons(id, order_id);
		ESUbtn = "#ESUbtn_" + id;
		ESDbtn = "#ESDbtn_" + id;
		statusUp(status, id, ESUbtn);
		statusDown(status, id, ESDbtn);
		setOrderNumber(order_id, id);

	}
	function removeEntry(data)
	{
		var entry = jQuery.parseJSON(data);
		$(".table_tr_" + entry.id).fadeOut("slow");
		$(".table_tr_" + entry.id).delay(1000).remove();
	}
	
	function resetStatus(data)
	{

		color = data.color;
		status = data.status;
		label = data.label;
		id = data.id;
		order_id = data.order_id;
		setBars(id, status, color, label);
		setButtons(id, order_id);
		ESUbtn = "#ESUbtn_" + id;
		ESDbtn = "#ESDbtn_" + id;
		statusUp(status, id, ESUbtn);
		statusDown(status, id, ESDbtn);
		//setStatusCount(id, status);
		
	
	}
	function setTR(id, pmethod_id)
	{
		var temp = ['<tr class="table_tr_' + id + '" id="' + id + '" style="display:none;"></tr>'].join('');
			$(temp).appendTo("#tbody_" + pmethod_id).fadeIn();
			$("#tbody_" + pmethod_id).fadeIn("fast");
	}

	function setOrderNumber(order_id, id){

	}

	function setTDS(id, sku, batch, tank, container1, container2, container3, qty1, qty2, qty3, pmethod_id, newid, ready_date, order_id)
	{	
		 if(container1 == 0 ){
		 	 container1 = "";
		 }
		 if(container2 == 0 ){
		 	 container2 = "";
		 }
		 if(container3 == 0 ){
		 	 container3 = "";
		 }
		 if(qty1 == 0 ){
		 	 qty1 = "";
		 }
		 if(qty2 == 0 ){
		 	 qty2 = "";
		 }
		 if(qty3 == 0 ){
		 	 qty3 = "";
		 }	
			var temp = [
				//'<tr class="table_tr_' + id + '" id="' + id + '" style="display:none;">',
					
					'<td  class="order_' + order_id + '" style="min-width:100px;"></td>',
					'<td  id="' + id + '" style="min-width:100px;">' + sku + '</td>',
					'<td  id="' + id + '" style="min-width:100px;">' + ready_date + '</td>',
					'<td style="min-width:50px; width:50px;">' + batch + '</td>',
					'<td style="min-width:30px; width:30px;">',
						'<p>' + container1 + '</p>',
						'<p>' + container2 + '</p>',
						'<p>' + container3 + '</p>',
					'</td>',
					'<td style="min-width:15px; width:15px;">',
						'<p>' + qty1 + '</p>',
						'<p>' + qty2 + '</p>',
						'<p>' + qty3 + '</p>',
					'</td>',
					'<td style="width:100%;">',
						'<div clas="col-md-12">',
							'<div class="progress active dropStatus" id="statusBar_' + id + '">',
							'</div>',
						'</div>',
						/*'<div class="col-md-12" style="text-align:right;">',
							'<div class="col-md-3">Production</div>',
							'<div class="col-md-3">Lab</div>',
							'<div class="col-md-3">Fill</div>',
							'<div class="col-md-3">Complete</div>',
						'</div>',*/
					'</td>',
	                '<td style="min-width:200px; width:200px;">',
	                   '<div class="btn-group dropButtons" id="buttons_' + id + '">',
	                    '</div>',
	                    /*'<h4 id="status_show_' + id + '">' + status + '%</h4>',*/
	                '</td>'].join('');

			
			$(temp).appendTo(".table_tr_" + id).fadeIn();
			$(".table_tr_" + id).fadeIn("fast");
			

	
	}

	function setButtons(id, order_id){
		$("#buttons_" + id).html("");
		temp = ['<button class="btn btn-primary btn-sm" type="button" id="ESDbtn_' + id + '"><i class="fa fa-arrow-left"></i></button>',
				'<button class="btn btn-danger btn-sm" type="button" id="ESUbtn_' + id + '"><i class="fa fa-arrow-right"></i></button>',
				'<a class="btn btn-default btn-sm" href="{{URL::to("orders")}}/'+ order_id + '/entries/' + id+ '/edit"><i class="fa fa-link"></i></a>'].join('');
		$(temp).appendTo("#buttons_" + id);
	}
	function setStatusCount(id, status)
	{
		/*$("#status_show_" + id).text(status + "%");*/
	}

	function setBars(id, status, color, label)
	{
		var temp=["<div class='progress-bar progress-bar-" + color + "' role='progressbar' aria-valuenow='" + status + "' aria-valuemin='0' aria-valuemax='100' style='width: " + status + "%'>" + label + " &nbsp &nbsp" + status + "%</div>"].join('');
		//$("#progressBar_" + data.id)
		$("#statusBar_" + id).html(temp);
	}

	
	function goAjax(id, newdata){
		$.ajax({
			url: "{{ URL::to('productions') }}/" + id,
			method: "PUT",
			data: newdata,
			cache: false,
			success: function(data){
				resetStatus(data);
				//console.log(data);
			}

		});
	}

	function statusUp(s, id, ESUbtn)
	{
		$(ESUbtn).click(function(){

			if(s <= 10){
				newdata = { status: "25", color: "warning", label: "In production"};
				goAjax(id, newdata);
			}
			if(s == 25){
				newdata = { status: "50", color: "default", label: "Lab"};
				goAjax(id, newdata);
			}
			if(s == 50){
				newdata = { status: "75", color: "info", label: "Filling"};
				goAjax(id, newdata);
			}
			if(s == 75){
				newdata = { status: "100", color: "success", label: "Complete"};
				goAjax(id, newdata);
			}
		});
	}
	function statusDown(s, id)
	{
		$(ESDbtn).click(function(){
			if(s >= 100){
				newdata = { status: "75", color: "info",  label: "Filling"};
				goAjax(id, newdata);
			}
			if(s == 75){
				newdata = { status: "50", color: "default", label: "Lab" }
				goAjax(id, newdata);
			}
			if(s == 50){	
				newdata = { status: "25", color: "warning", label: "In Production" }
				goAjax(id, newdata);
			}
			if(s == 25){
				newdata = { status: "10", color: "danger", label: "Hold" }
				goAjax(id, newdata);
			}
		});
	}
	function addGritter(head, message)
		{
			$.gritter.add({
                // (string | mandatory) the heading of the notification
                title: head,
                // (string | mandatory) the text inside the notification
                text: message
            });

            return false;
		}

// <![CDATA[
            var socket = io.connect('http://192.184.87.145:3000/');
            //socket.on('connect', function(data){
            //    socket.emit('subscribe', {channel:'score.update'});
            //});
            socket.on('entries.store', function (data) {
                addEntry(data);
                var entry = jQuery.parseJSON(data);
               
                
            });
            socket.on('entries.delete', function (data) {
                removeEntry(data);
            });

            socket.on('entries.update', function (data) {
            	var entry = jQuery.parseJSON(data);
                setBars(entry.id, entry.status, entry.color, entry.label);
                //setStatusCount(entry.id, entry.status);
            });
            
 
// ]]>
            
 
// ]]>
		

		$.each($(methods), function(i, method){

			$("#tbody_" + method.id).sortable({
				 placeholder: "ui-state-highlight",
				 handle: "td",
				 stop: function(e, ui) {
			            var priorities = $.map($(this).find('tr'), function(el) {
			                //return el.id + ' = ' + $(el).index();
			                return { id: el.id, p: $(el).index() + 1  };
			        	});
			        	$.each($(priorities), function(i, priority)
			        	{
			        		console.log(priority.id + '=' + priority.p);
			        		$.ajax({
								url: "{{ URL::to('productions') }}/" + priority.id,
								method: "PUT",
								data: { priority: priority.p },
								cache: false,
								success: function(data){
									console.log(data);
								}

							});
			        		
			        	});
			     }
			});
			$("#tbody_" + method.id).disableSelection();
		});
		//$( "#draggable" ).draggable({ opacity: 0.7, handle:'#drag' });
});

</script>





@stop

