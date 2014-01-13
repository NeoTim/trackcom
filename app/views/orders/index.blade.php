@extends('layouts.blueprint')
@section('page_title')
	Orders
@stop
@section('header')
	<div class="row">
		<div class="col-md-12">
			<!-- BEGIN PAGE TITLE & BREADCRUMB-->
			<blockquote><h3 class="page-title">
				Orders
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
					<a href="{{ URl::to('orders') }}">Orders</a>
					
				</li>
					
			</ul>
							
		</div>
	</div>
<div class="clearfix"></div>
	<div class="row">
		<div class='col-md-12'>	
			<div class="dashboard-stat green">
				<div class="visual">
					<i class="fa fa-barcode"></i>
				</div>
				<div class="details">
					<div class="number">
						
						{{count($orders)}}
						
					</div>
					<div class="desc">
						Total Orders
					</div>
				</div>
				<a href="{{ URL::to('orders/create') }}" class="more" >
				Create Order <i class="m-icon-swapright m-icon-white"></i>
				</a>
			</div>

		</div>
	</div>	
@stop


@section('content')
	
		<div class=" aligncenter">
			<div class=" aligncenter" style="text-align:center;"><a id="" href="{{URL::route('orders.create')}}" class="btn btn-primary aligncenter">Add order</a></div>
		</div>
		<br />
		<br />
	
	@if ($orders->count())
	<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover table-full-width dataTable" id="sample_editable_1" aria-describedby="sample_1_info">
			<thead>
				<tr>
					<th style="min-width:200px;">Options</th>
					<th>ID</th>
					<th>Customer</th>
					<th>Number</th>
					<th>Delivery Type</th>
					<th>Delivery Method</th>
					<th>Ready Date</th>
					<th>Est Delivery</th>
					<th>Freight</th>
					<th>Tracking</th>
					<th>Instructions</th>
				
					
				</tr>
			</thead>
	
			<tbody>
				@foreach ($orders as $order)

					<tr>
						<td>
	                    	
	                    		
	                    		
	                       <div class="btn-group">

	                    			{{ link_to_route('orders.show', 'View', array($order->id), array('class' => 'btn btn-default')) }}
	                            	<button id="DObtn_{{$order->id}}" data-toggle="modal" data-target="#delete_modal_{{$order->id}}" type="button" class="btn btn-danger">Delete</button>
	                       </div>
	                       
	                        <div class="modal fade" id="delete_modal_{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							  <div class="modal-dialog modal-wide">
							    <div class="modal-content">
							      <div class="modal-header">
							      	{{ Form::open(array('id' => 'delete_form', 'method' => 'DELETE', 'route' => array('orders.destroy', $order->id))) }}
							        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							        <h2 class="modal-title" id="myModalLabel">Confirm Delete</h2>
							      </div>
													
							      <div class="modal-body">	                        	
							      	<h4 id="">Are you sure you want to delete <strong> {{$order->number}} </strong></h4>
							      </div>
							      <div class="modal-footer">
							      	<div class="btn-group">
										{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
							        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							        </div>
									{{ Form::close() }}
							      </div>
							    </div>
							  </div>
							</div> 
	                        	
	                    </td>
						<td>{{{$order->id}}}</td>
						<td>
							@if(isset($order->customer->company))
								{{{ $order->customer->company }}}
							@endif
						</td>
						<td>{{{ $order->number }}}</td>
						<td>
							@if($order->dtype_id == 1)
							Metro Delivery
							@elseif($order->dtype_id == 2)
							Shipping
							@elseif($order->dtype_id == 3)
							Pickup
							@elseif($order->dtype_id == 4)
							Outbound Delivery
							@endif
							
						</td>
						<td>
							@if(isset($order->dmethod->name))
								{{{ $order->dmethod->name }}}
							@endif
						</td>
						<td>{{ date("F d Y",strtotime($order->start)) }}</td>
						<td>{{ date("F d Y",strtotime($order->est_delivery)) }}</td>
						<td>{{{ $order->freight }}}</td>
						<td>{{{ $order->tracking }}}</td>
						<td>{{{ $order->instructions }}}</td>
	                    
	                    

					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	
	
	@else
		There are no orders
	@endif
	<br />
	<br />
	<div class=" aligncenter">
		<div class=" aligncenter" style="text-align:center;"><a id="" href="{{URL::to('trashed/orders')}}" class="btn btn-danger aligncenter"><i class="fa fa-trash-o"></i> Trash</a></div>
	</div>
@stop

@section('page_plugins')
	<script type="text/javascript" src="{{ asset('assets/plugins/data-tables/jquery.dataTables.js') }}"></script>
@stop
@section('page_scripts')
<!-- BEGIN PAGE LEVEL SCRIPTS -->

	
<!-- END PAGE LEVEL SCRIPTS -->
<script type="text/javascript">
$(document).ready(function() {
	 
		$('#sample_editable_1').dataTable( {
	        "bPaginate": false,
	        "bLengthChange": false,
	        "bFilter": true,
	        "bSort": true,
	        "bInfo": false,
	        "bAutoWidth": true
	    });



fnOrdersToArray = function ( aElements )
{
    return function ( sSource, aoData, fnCallback ) {
        $.ajax( {
            "dataType": 'json',
            "type": "POST",
            "url": "{{URL::to('data/orders')}}",
            "data": aoData,
            "success": function (json) {
                var a = [];
                for ( var i=0, iLen=json.aaData.length ; i<iLen ; i++ ) {
                    var inner = [];
                    for ( var j=0, jLen=aElements.length ; j<jLen ; j++ ) {
                        inner.push( json.aaData[i][aElements[j]] );
                    }
                    a.push( inner );
                }
                json.aaData = a;
                console.log(a);
                fnCallback(json);
            }
        } );
    }
}
 var editor;


	
    $('#orderTable').dataTable( {
	        "bPaginate": false,
	        "bLengthChange": false,
	        "bFilter": true,
	        "bSort": true,
	        "bInfo": false,
	        "bAutoWidth": true,
	     	"bProcessing": true,
	        "sAjaxSource": '../examples_support/json_source_object.txt',
	        "fnServerData": fnOrdersToArray( [ 'id', 'customer_id', 'number', 'dtype_id', 'dmethod_id',
		 							 			'start', 'est_delivery', 'freight', 'tracking', 'instructions'
		 							 			] )
	        
        
	});
    /* Init DataTables */
  // var edit_order function(){
  //  		"ajaxUrl" : {
		// 	"create":  	"{{URL::to('data/orders/store')}}",
		// 	"edit"	:	"{{URL::to('data/orders/update')}}/" ,
		// 	"remove": 	"{{URL::to('data/orders/delete')}}/" 
		// },
        
  //       "domTable" : "#ordersTable",
		// "fields": [
		// 			{
		// 				"lable": 	"Customer",
		// 				"name": 	"customer_id"
		// 			},{
		// 				"lable": 	"Number",
		// 				"name": 	"number"
		// 			},{
		// 				"lable": 	"Delivery Type",
		// 				"name": 	"dtype_id"
		// 			},{
		// 				"lable": 	"Delivery Method",
		// 				"name": 	"dmethod_id"
		// 			},{
		// 				"lable": 	"Ready Date",
		// 				"name": 	"start"
		// 			},{
		// 				"lable": 	"Delivery Date",
		// 				"name": 	"est_delivery"
		// 			},{
		// 				"lable": 	"Freight",
		// 				"name": 	"freight"
		// 			},{
		// 				"lable": 	"Tracking #",
		// 				"name": 	"tracking"
		// 			},{
		// 				"lable": 	"Instructions",
		// 				"name": 	"instructions"
		// 			}
		// 		]
  //   };
 
    // New record
    $('a.editor_create').on('click', function (e) {
        e.preventDefault();
 
        editor.create(
            'Create new record',
            { "label": "Add", "fn": function () { editor.submit() } }
        );
    } );
 
    // Edit record
    $('#ordersTable').on('click', 'a.editor_edit', function (e) {
        e.preventDefault();
 
        editor.edit(
            $(this).parents('tr')[0],
            'Edit record',
            { "label": "Update", "fn": function () { editor.submit() } }
        );
    } );
 
    // Delete a record (without asking a user for confirmation)
    $('#ordersTable').on('click', 'a.editor_remove', function (e) {
        e.preventDefault();
 
        editor.remove( $(this).parents('tr')[0], '123', false, false );
        editor.submit();
    } );
 
    // DataTables init
    $('#ordersTable').dataTable( {
        "sDom": "Tfrtip",
        "sAjaxSource": "{{URL::to('data/orders')}}",
        "aoColumns": [
            { "mData": "customer_id" },
            { "mData": "number" },
            { "mData": "dtype_id" },
            { "mData": "dmethod_id" },
            { "mData": "start" },
            { "mData": "est_delivery" },
            { "mData": "freight" },
            { "mData": "tracking" },
            { "mData": "instructions" },
            {
                "mData": null,
                "sClass": "center",
                "sDefaultContent": '<a href="" class="editor_edit">Edit</a> / <a href="" class="editor_remove">Delete</a>'
            }
        ]
    } );
     
    /* Apply the jEditable handlers to the table */
    
} );


</script>
@stop


















