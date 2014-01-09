@extends('layouts.blueprint')
@section('page_title')
	Production
@stop
@section('header')
	<div class="row">
		<div class="col-md-12">
			<!-- BEGIN PAGE TITLE & BREADCRUMB-->
			<blockquote><h3 class="page-title">
				Production
			</h3></blockquote>
			<ul class="page-breadcrumb breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a href="{{URL::to('/')}}">HIS</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="{{URL::to('dashboard')}}">Dashboard</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="{{ URl::to('productions') }}">Production</a>
					
				</li>
				
					
			</ul>
							
		</div>
	</div>
<div class="clearfix"></div>
	<div class="row">
		<div class='col-md-12'>	
			<div class="dashboard-stat blue">
				<div class="visual">
					<i class="fa fa-list"></i>
				</div>
				<div class="details">
					<div class="number">
						
						{{count($entries)}}
						
					</div>
					<div class="desc">
						Total Products in Production
					</div>
				</div>
				<a href="{{ URL::to('orders') }}" class="more" >
				View orders <i class="m-icon-swapright m-icon-white"></i>
				</a>
			</div>

		</div>
	</div>	
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
									<th style="width:5%;">Sku</th>
									<th style="width:5%;">Batch</th>
									<th style="width:5%;">Tank</th>
									<th style="width:5%;">Containers</th>
									<th style="width:5%;">Quantity</th>
									<th>Status</th>
									<th style="width:10%;">Options</th>
								</tr>
							</thead>
	
							<tbody class="dropTbody" id="tbody_{{ $pmethod->id }}">
								
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
	var formS  = "#status_form";


	var color = [];
	var status = [];
	var id = [];
	var newid = [];
	var status=[];
	var entries = [];
	var ESUbtn = [];
	var ESDbtn = [];
	var methods = {{$pmethods}};
	setEntries();

	function setEntries(newid)
	{
		$.get("{{URL::to('collect/entries')}}").done(function(data){

			entries = eval(data);
			$.each($(entries), function(i){
				color = entries[i].color;
				status = entries[i].status;
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
				setTR(id, sku, batch, tank, container1, container2, container3, qty1, qty2, qty3, pmethod_id, newid);
				setBars(id, status, color);
				setButtons(id);
				ESUbtn = "#ESUbtn_" + id;
				ESDbtn = "#ESDbtn_" + id;
				statusUp(status, id, ESUbtn);
				statusDown(status, id, ESDbtn);

			});
		});
	}
	function addEntry(data)
	{
		var entry = jQuery.parseJSON(data);
		color = entry.color;
		status = entry.status;
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
		pmethod_id = entry.pmethod_id;
		setTR(id, sku, batch, tank, container1, container2, container3, qty1, qty2, qty3, pmethod_id, newid);
		setBars(id, status, color);
		setButtons(id);
		ESUbtn = "#ESUbtn_" + id;
		ESDbtn = "#ESDbtn_" + id;
		statusUp(status, id, ESUbtn);
		statusDown(status, id, ESDbtn);

	}
	function removeEntry(data)
	{
		var entry = jQuery.parseJSON(data);
		$("#table_tr_" + entry.id).fadeOut("slow");
		$("#table_tr_" + entry.id).delay(1000).remove();
	}
	
	function resetStatus(data)
	{

		color = data.color;
		status = data.status;
		id = data.id;
		setBars(id, status, color);
		setButtons(id);
		ESUbtn = "#ESUbtn_" + id;
		ESDbtn = "#ESDbtn_" + id;
		statusUp(status, id, ESUbtn);
		statusDown(status, id, ESDbtn);
		setStatusCount(id, status);
		
	
	}

	function setTR(id, sku, batch, tank, container1, container2, container3, qty1, qty2, qty3, pmethod_id, newid)
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
				'<tr id="table_tr_' + id + '" style="display:none;">',
					'<td>' + sku + '</td>',
					'<td>' + batch + '</td>',
					'<td>' + tank + '</td>',
					'<td>',
						'<p>' + container1 + '</p>',
						'<p>' + container2 + '</p>',
						'<p>' + container3 + '</p>',
					'</td>',
					'<td>',
						'<p>' + qty1 + '</p>',
						'<p>' + qty2 + '</p>',
						'<p>' + qty3 + '</p>',
					'</td>',
					'<td>',
						'<div clas="col-md-12">',
							'<div class="progress progress-striped active dropStatus" id="statusBar_' + id + '">',
							'</div>',
						'</div>',
						'<div class="col-md-12" style="text-align:right;">',
							'<div class="col-md-3">Production</div>',
							'<div class="col-md-3">Lab</div>',
							'<div class="col-md-3">Fill</div>',
							'<div class="col-md-3">Complete</div>',
						'</div>',
					'</td>',
	                '<td>',
	                   '<div class="btn-group dropButtons" id="buttons_' + id + '">',
	                    '</div>',
	                    '<h4 id="status_show_' + id + '">' + status + '%</h4>',
	                '</td>',
				'</tr>'].join('');

			
			$(temp).appendTo("#tbody_" + pmethod_id).fadeIn();
			$("#tbody_" + pmethod_id).fadeIn("fast");
			

	
	}

	function setButtons(id){
		$("#buttons_" + id).html("");
		temp = ['<button class="btn btn-primary" type="button" id="ESDbtn_' + id + '"><i class="fa fa-arrow-left"></i></button>',
				'<button class="btn btn-danger" type="button" id="ESUbtn_' + id + '"><i class="fa fa-arrow-right"></i></button>'].join('');
		$(temp).appendTo("#buttons_" + id);
	}
	function setStatusCount(id, status)
	{
		$("#status_show_" + id).text(status + "%");
	}

	function setBars(id, status, color)
	{
		var temp=["<div class='progress-bar progress-bar-" + color + "' role='progressbar' aria-valuenow='" + status + "' aria-valuemin='0' aria-valuemax='100' style='width: " + status + "%'></div>"].join('');
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
				console.log(data);
			}

		});
	}

	function statusUp(s, id, ESUbtn)
	{
		$(ESUbtn).click(function(){

			if(s <= 10){
				newdata = { status: "25", color: "warning" };
				goAjax(id, newdata);
			}
			if(s == 25){
				newdata = { status: "50", color: "default" };
				goAjax(id, newdata);
			}
			if(s == 50){
				newdata = { status: "75", color: "info" };
				goAjax(id, newdata);
			}
			if(s == 75){
				newdata = { status: "100", color: "success" };
				goAjax(id, newdata);
			}
		});
	}
	function statusDown(s, id)
	{
		$(ESDbtn).click(function(){
			if(s >= 100){
				newdata = { status: "75", color: "info" };
				goAjax(id, newdata);
			}
			if(s == 75){
				newdata = { status: "50", color: "default" }
				goAjax(id, newdata);
			}
			if(s == 50){	
				newdata = { status: "25", color: "warning" }
				goAjax(id, newdata);
			}
			if(s == 25){
				newdata = { status: "10", color: "danger" }
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
            var socket = io.connect('http://192.184.87.145:3000');
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
                setBars(entry.id, entry.status, entry.color);
                setStatusCount(entry.id, entry.status);
            });
            
 
// ]]>

});

</script>





@stop

