@extends('layouts.blueprint')
@section('page_title')
	Order - {{$order->number}} <small>{{$order->customer->company}}</small>
@stop
@section('header')
	<div class="row">
		<div class="col-md-12">
			<!-- BEGIN PAGE TITLE & BREADCRUMB-->
			<blockquote><h3 class="page-title">
				Order # {{ $order->number }} <small>@if(isset($order->customer->company)) {{$order->customer->company}} @endif </small>
			</h3></blockquote>
			<ul class="page-breadcrumb breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a href="index.html">HIS</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="#">Dashboard</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="#">Orders</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="#">
						Order # {{{ $order->number }}}
						
					</a>
				</li>	
			</ul>
							
		</div>
	</div>
<div class="clearfix"></div>
	<div class="row">
		<div class='col-md-12'>	
			<div class="dashboard-stat bg-dark">
				<div class="visual">
					<i class="fa fa-tag"></i>
				</div>
				<div class="details">
					<div class="number">
						
						{{ $order->customer->company }}
						
					</div>
					<div class="desc">
						{{ $order->number }}
					</div>
				</div>
				<a href="{{ URL::to('orders') }}" class="more" style="background-color:#444444;">
				View orders <i class="m-icon-swapright m-icon-white"></i>
				</a>
			</div>

		</div>
	</div>	
@stop

@section('content')
		<div class=" aligncenter">
			<div class="btn-group aligncenter" style="text-align:center;">
				<a href="{{ URL::to('orders')}}" class="btn btn-default"><i class="fa fa-arrow-left"></i> View all</a>
				<a href="{{URL::route('orders.entries.create', $order->id)}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Products</a>
				{{ link_to_route('orders.edit', 'Edit', array($order->id), array('class' => 'btn btn-warning')) }}
				<button class="btn btn-danger" id="DObtn_{{$order->id}}" data-toggle="modal" data-target="#delete_Order">Delete</button>
			</div>
		                        	
		</div>
		<br />
		<br />

	<div class="col-md-4">
	
		<div class='panel panel-info'>
			<div class="panel-heading">
				<h3 class="panel-title">Order Info</h3>
			</div>
			<div class="pane-body">
				<div class="table-responsive">
					<table class="table table-bordered table-hover">
						<tr>
							<td>Customer</td>
							<td>{{ $order->customer->company }}</td>
						</tr>
						<tr>
							<td>Type</td>
							<td>{{ $order->dtype_id }}</td>
						</tr>
						<tr>
							<td>Method</td>
							<td>{{ $order->dmethod->name }}</td>
						</tr>
						<tr>
							<td>Title</td>
							<td>{{ $order->title }}</td>
						</tr>
						<tr>
							<td>Ready By</td>
							<td>{{ $order->start }}</td>
						</tr>
						<tr>
							<td>Est Date</td>
							<td>{{ $order->end }}</td>
						</tr>
						<tr>
							<td>Freight</td>
							<td>{{ $order->freight }}</td>
						</tr>
						<tr>
							<td>Tracking #</td>
							<td>{{ $order->tracking }}</td>
						</tr>
						<tr>
							<td>Instructions</td>
							<td>{{ $order->instructions }}</td>
						</tr>
						<tr>
							<td>Order</td>
							<td>
								@foreach($order->entries as $entry)
									@if($entry->ptype_id == 1 OR $entry->ptype_id == 2)
										@if($entry->container1 > 0)
										<dl class="dl-horizontal">
											<dt>{{{$entry->sku}}}-{{{$entry->container1}}}</dt>
											<dd></dd>
											<dt>Ordered:</dt>
											<dd>
											{{{$entry->gal1}}} gallons in {{{$entry->container1}}}s
											</dd>
											<dt>Customer:</dt>
											<dd>{{{$order->customer->company}}}</dd>
											<dt>{{{$order->dmethod->name}}}</dt>
											<dd>{{{$entry->date_ready}}}</dd>
										</dl>
										@endif
										@if($entry->container2 > 0)
										<dl class="dl-horizontal">
											<dt>{{{$entry->sku}}}-{{{$entry->container2}}}</dt>
											<dd></dd>
											<dt>Ordered:</dt>
											<dd>
											{{{$entry->gal2}}} gallons in {{{$entry->container2}}}s
											</dd>
											<dt>Customer:</dt>
											<dd>{{{$order->customer->company}}}</dd>
											<dt>{{{$order->dmethod->name}}}</dt>
											<dd>{{{$entry->date_ready}}}</dd>
										</dl>
										@endif
										@if($entry->container3 > 0)
										<dl class="dl-horizontal">
											<dt>{{{$entry->sku}}}-{{{$entry->container3}}}</dt>
											<dd></dd>
											<dt>Ordered:</dt>
											<dd>
											{{{$entry->gal3}}} gallons in {{{$entry->container3}}}s
											</dd>
											<dt>Customer:</dt>
											<dd>{{{$order->customer->company}}}</dd>
											<dt>{{{$order->dmethod->name}}}</dt>
											<dd>{{{$entry->date_ready}}}</dd>
										</dl>
										@endif
									@endif
									
								@endforeach
									<div id="email_set"></div>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div> <!-- END COL_4 -->

<div class="modal fade" id="delete_Order" tabindex="-1" role="dialog" aria-labelledby="OrderModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-wide">
    <div class="modal-content">
      <div class="modal-header">
      	{{ Form::open(array('id' => 'delete_form', 'method' => 'DELETE', 'route' => array('orders.destroy', $order->id))) }}
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h2 class="modal-title" id="OrderModalLabel">Delete Order # {{{ $order->number }}}</h2>
      </div>
						
      <div class="modal-body">	                        	
      	<h4 id=""> Are you Sure you want to Delete this order?</h4>
      	<p>If you delete this order. All Product entries contained in this order will be destroyed as well!!</p>
      </div>
      <div class="modal-footer">
      	<div class="btn-group">
			{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
		{{ Form::close() }}
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->	

	<div class="col-md-8">
		<div class="panel panel-inverse">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-tags"></i> Products</h3>
			</div>
			<div class="panel-body">

				<div class="table-responsive">
					<table class="table table-bordered table-striped table-hovered">
						<thead>
							<tr>
								<th style="width:100px;">SKU</th>
								<th style="width:50px;">Batch</th>
								<th style="width:50px;">Container</th>
								<th style="width:50px;">Quantity</th>
								<th>Status</th>
								<th style="width:200px;">Options</th>
							</tr>
						</thead>
						<tbody>
							@foreach($order->entries as $entry)
							<tr>
								<td>
									{{$entry->sku}}
								</td>
								<td>{{ $entry->batch }}</td>
								<td>
									<p>@if($entry->container1 != 0) {{ $entry->container1 }} @endif</p>
									<p>@if($entry->container2 != 0){{ $entry->container2 }} @endif</p>
									<p>@if($entry->container3 != 0){{ $entry->container3 }} @endif</p>
								</td>
								<td>
									<p>@if($entry->qty1 != 0) {{ $entry->qty1 }} @endif</p>
									<p>@if($entry->qty2 != 0) {{ $entry->qty2 }} @endif</p>
									<p>@if($entry->qty3 != 0) {{ $entry->qty3 }} @endif</p>
								</td>
								<td>
									@if($entry->ptype_id == 3 || $entry->ptype_id == 4)
										<h3><strong> {{$entry->sku}} </strong> is already in stock! <i class="fa fa-thumbs-o-up" style="font-size:20px;"></i></h3>
									@else
									<div class="progress progress-striped active">
										<div class="progress-bar progress-bar-{{{ $entry->color }}}" role="progressbar" aria-valuenow="{{ $entry->status }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $entry->status }}%">
											<span class="sr-only">
												{{ $entry->status }}% Complete (success)
											</span>
										</div>
									</div>
									@endif
								</td>
								<td >
									<div class="btn-group">
										
										<a href="{{{URL::to('orders/' . $order->id . '/entries/' . $entry->id . '/edit')}}}" class="btn btn-primary">Edit</a>
										<button type="button" class='btn btn-danger' id="DEbtn_{{$entry->id}}" data-toggle="modal" data-target="#delete_modal_{{$entry->id}}">Delete</button>
									</div>
									<div class="modal fade" id="delete_modal_{{$entry->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									  <div class="modal-dialog modal-wide">
									    <div class="modal-content">
									      <div class="modal-header">
									      	{{ Form::open(array('id' => 'delete_form', 'method' => 'DELETE', 'url' => array('orders/' . $order->id . '/entries/' . $entry->id))) }}
									        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									        <h2 class="modal-title" id="myModalLabel">Confirm Delete</h2>
									      </div>
															
									      <div class="modal-body">	                        	
									      	<h4 >Are you sure you want to delete <strong id=""> {{$entry->sku}} from {{$order->number}} </strong></h4>
									      </div>
									      <div class="modal-footer">
									      	<div class="btn-group">
												{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
									        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									        </div>
											{{ Form::close() }}
									      </div>
									    </div><!-- /.modal-content -->
									  </div><!-- /.modal-dialog -->
									</div><!-- /.modal -->	
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>

			</div>
		</div>
		
				
	</div> <!-- END COL-8 -->

	@include('orders.modals.delete')
	
	<div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="load_modalLabel" aria-hidden="true">
	</div>

		<!-- END MAIN CONTENT -->
@stop


<!-- Modal -->

@section('page_scripts')
<!-- BEGIN PAGE LEVEL PLUGINS -->

	<script type="text/javascript">
		$(document).ready(function(){
	                 
		
			$('#product_id').select2({
	            placeholder: "Select an option",
	            allowClear: true
	        });

			var orderID = "{{$order->id}}";
			var orderCustomer = "{{$order->customer->company}}";
			var method = "{{$order->dtype_id}}";
	  		var orderDate = "{{ date('F d Y',strtotime($order->start)) }}";
	  		var orderEntries = eval({{$order->entries}});

	  
		   function setEmail(id, sku, cont, gal)
		   {

			var temp = ['<dl class="dl-horizontal">',
						  '<dt>' + sku + '-' + cont + '</dt>',
						  '<dd></dd>',
						  '<dt>Ordered:</dt>',
						  '<dd>' + gal + ' gallons in ' + cont + 's </dd>',
						  '<dt>Customer:</dt>',
						  '<dd>' + orderCustomer + '</dd>',
						  '<dt>' + method + ':</dt>',
						  '<dd>' + orderDate + '</dd>',
						'</dl>'].join('');
						$(temp).appendTo("#email_set");
				
		   }
		   function getEntries(c1, c2, c3, q1, q2, q3, sku, id, ptype)
		   {
		   			function runit(c1, c2, c3, q1, q2, q3, sku, id, ptype){
		   				if(c1 == 0 || c1 == "" )
				   		{
				   			var nothing = "nothing";
				   		}
				   		else
				   		{
				   			var gal1 = c1 * q1;
				   			console.log(c1);
				   			setEmail(id, sku, c1, gal1);
				   		}
				   		if(c2 == 0 || c2 == "")
				   		{
				   			var nothing = "nothing";
				   		}
				   		else
				   		{
				   			console.log(c2);
				   			setEmail(id, sku, c2, gal2);
				   		}
				   		if(c3 == 0 || c3 == "" )
				   		{
				   			var nothing = "nothing";
				   		}
				   		else
				   		{
				   			var gal3 = c3 * q3;
				   			setEmail(id, sku, c3, gal3);
				   		}
		   			}
		   			if(ptype == 1)
			   		{
				   		runit(c1, c2, c3, q1, q2, q3, sku, id, ptype);
				   	}
				   	else if(ptype == 2)
				   	{
				   		runit(c1, c2, c3, q1, q2, q3, sku, id, ptype);
				   	}
		   }
		   $.each($(orderEntries), function(i, entry){
		   			var id = entry.id;
		   			var sku = entry.sku;
		   			var c1 = entry.container1;
		  			var c2 = entry.container2;
		  			var c3 = entry.container3;
		  			var q1 = entry.qty1;
		  			var q2 = entry.qty2;
		  			var q3 = entry.qty3;
		  			var ptype = entry.ptype_id;
			  		getEntries(c1, c2, c3, q1, q2, q3, sku, id, ptype);
			   		
		   });
		   
		   
			 $.get("{{ URL::to('collect/entries') }}").done(function(data){
			  		var entries = eval(data);
			  		$.each($(entries), function(i){
			  			var id = entries[i].id;
			  			var sku = entries[i].sku;
			  			var entry = entries[i];
			  			
			  			
				  		
				  		$("#DEbtn_" + id).click(function(){
				   			$("#delete_Modal form").attr("action", "{{ URL::to('orders/' . $order->id . '/entries') }}/" + id);
				   			$("#delete_entry_message").text(entry.sku);
				   		});


			  		});
			  });
		 });
	</script>

<!-- END PAGE LEVEL PLUGINS -->
@stop

