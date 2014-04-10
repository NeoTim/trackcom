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
			<div class=" aligncenter" style="text-align:center;"><a id="sample_editable_1_new" href="" class="btn btn-primary aligncenter">Add order</a></div>
		</div>
		<br />
		<br />
	
	@if ($orders->count())
	<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover table-full-width dataTable" id="sample_editable_1" aria-describedby="sample_2_info" style="width: 1060px;">
			<thead>
				<tr>
					<th>ID</th>
					<th>Customer</th>
					<th>Number</th>
					<th>Delivery Type</th>
					<th>Delivery Method</th>
					<th>Finished</th>
					<th>Est Delivery</th>
					<th>Freight</th>
					<th>Tracking</th>
					<th>Instructions</th>
					<th>Edit</th>
					<th>Delete</th>
					
				</tr>
			</thead>
	
			<tbody>
				@foreach ($orders as $order)
					<tr>
						<td>{{{$order->id}}}</td>
						<td>
							@if(isset($order->customer->company))
								{{{ $order->customer->company }}}
							@endif
						</td>
						<td>{{{ $order->number }}}</td>
						<td>{{{ $order->dtype_id }}}</td>
						<td>
							@if(isset($order->dmethod->name))
								{{{ $order->dmethod->name }}}
							@endif
						</td>
						<td>{{{ $order->start }}}</td>
						<td>{{{ $order->est_delivery }}}</td>
						<td>{{{ $order->freight }}}</td>
						<td>{{{ $order->tracking }}}</td>
						<td>{{{ $order->instructions }}}</td>
	                    
	                    <td><a class="edit btn btn-default" href="javascript:;">Edit</a>	</td>
	                    <td><a class="delete btn btn-danger" href="javascript:;">Delete</a>	</td>
	                    	
	                    		
	                    		
	                       

	                    			{{--{{ link_to_route('orders.show', 'View', array($order->id), array('class' => 'btn btn-default')) }}--}}
	                            	{{--<button id="DObtn_{{$order->id}}" data-toggle="modal" data-target="#delete_modal_{{$order->id}}" type="button" class="btn btn-danger">Delete</button>--}}
	                       <!--
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
							</div> -->
	                        	

					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover table-full-width dataTable" id="ordersTable" aria-describedby="sample_2_info" style="width: 1060px;">
			<thead>
				<tr>
					<th>id</th>
					<th>customer_id</th>
					<th>Number</th>
					<th>dtype_id</th>
					<th>dmethod_id</th>
					<th>start</th>
					<th>est_delivery</th>
					<th>Freight</th>
					<th>Tracking</th>
					<th>Instructions</th>
					<th>Options</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
	
	@else
		There are no orders
	@endif
@stop

@section('page_plugins')
	<script type="text/javascript" src="{{ asset('assets/plugins/data-tables/jquery.dataTables.js') }}"></script>
@stop
@section('page_scripts')
<!-- BEGIN PAGE LEVEL SCRIPTS -->

	
<!-- END PAGE LEVEL SCRIPTS -->
<script type="text/javascript">
$(document).ready(function() {
	 
var TableEditable = function () {

    return {

        //main function to initiate the module
        init: function () {
            function restoreRow(oTable, nRow) {
                var aData = oTable.fnGetData(nRow);
                var jqTds = $('>td', nRow);

                for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
                    oTable.fnUpdate(aData[i], nRow, i, false);
                }

                oTable.fnDraw();
            }

            function editRow(oTable, nRow) {
                var aData = oTable.fnGetData(nRow);
                var jqTds = $('>td', nRow);
               	jqTds[0].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[0] + '">';
                jqTds[1].innerHTML = '{{ Form::select("customer_id", $customers, ' + aData[1] + ', array("class" => "form-control input-small select2me", "data-placeholder" => "Company")) }}';
                jqTds[2].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[2] + '">';
                jqTds[3].innerHTML = '{{ Form::select("dtype_id", $dtypes, ' + aData[3] + ', array("class" => "form-control select2me", "data-placeholder" => "Company")) }}';
                jqTds[4].innerHTML = '{{ Form::select("dmethod_id", $dmethods, ' + aData[4] + ', array("class" => "form-control select2me", "data-placeholder" => "Company")) }}';
                jqTds[5].innerHTML = '{{ Form::input("date", "start", ' + aData[5] + ', array("class" => "form-control form-control-inline input-small date-picker")) }}';
                jqTds[6].innerHTML = '{{ Form::input("date", "est_delivery", ' + aData[6] + ', array("class" => "form-control form-control-inline input-small date-picker")) }}';
                jqTds[7].innerHTML = '<input type="text" name="freight" class="form-control input-small" value="' + aData[7] + '">';
                jqTds[8].innerHTML = '<input type="text" name="tracking" class="form-control input-small" value="' + aData[8] + '">';
                jqTds[9].innerHTML = '<input type="text" name="instruction" class="form-control input-small" value="' + aData[9] + '">';
                jqTds[10].innerHTML = '<a class="edit btn btn-primary" href="">Save</a>',
				jqTds[11].innerHTML = '<a class="cancel btn btn-default" href="">Cancel</a>';
                
            }

            function saveRow(oTable, nRow) {
                var jqInputs = $('input', nRow);
                oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
                oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
                oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
                oTable.fnUpdate(jqInputs[3].value, nRow, 3, false);
                oTable.fnUpdate(jqInputs[4].value, nRow, 4, false);
                oTable.fnUpdate(jqInputs[5].value, nRow, 5, false);
                oTable.fnUpdate(jqInputs[6].value, nRow, 6, false);
                oTable.fnUpdate(jqInputs[7].value, nRow, 7, false);
                oTable.fnUpdate(jqInputs[8].value, nRow, 8, false);
                oTable.fnUpdate(jqInputs[9].value, nRow, 9, false);
                oTable.fnUpdate('<a class="edit btn btn-default" href="">Edit</a>', nRow, 10, false);
                oTable.fnUpdate('<a class="delete btn btn-danger" href="">Delete</a>', nRow, 11, false);
                oTable.fnDraw();
            }

            function cancelEditRow(oTable, nRow) {
                var jqInputs = $('input', nRow);
                oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
                oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
                oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
                oTable.fnUpdate(jqInputs[3].value, nRow, 3, false);
                oTable.fnUpdate(jqInputs[4].value, nRow, 4, false);
                oTable.fnUpdate(jqInputs[5].value, nRow, 5, false);
                oTable.fnUpdate(jqInputs[6].value, nRow, 6, false);
                oTable.fnUpdate(jqInputs[7].value, nRow, 7, false);
                oTable.fnUpdate(jqInputs[8].value, nRow, 8, false);
                oTable.fnUpdate(jqInputs[9].value, nRow, 9, false);
                oTable.fnUpdate('<a class="edit btn btn-default" href="">Edit</a>', nRow, 10, false);
                oTable.fnDraw();
            }

            var oTable = $('#sample_editable_1').dataTable({
                "aLengthMenu": [
                    [5, 15, 20, -1],
                    [5, 15, 20, "All"] // change per page values here
                ],
                // set the initial value
                "iDisplayLength": 5,
                
                "sPaginationType": "bootstrap",
                "oLanguage": {
                    "sLengthMenu": "_MENU_ records",
                    "oPaginate": {
                        "sPrevious": "Prev",
                        "sNext": "Next"
                    }
                },
                "aoColumnDefs": [{
                        'bSortable': false,
                        'aTargets': [0]
                    }
                ]
            });

            jQuery('#sample_editable_1_wrapper .dataTables_filter input').addClass("form-control input-medium"); // modify table search input
            jQuery('#sample_editable_1_wrapper .dataTables_length select').addClass("form-control input-small"); // modify table per page dropdown
            jQuery('#sample_editable_1_wrapper .dataTables_length select').select2({
                showSearchInput : false //hide search box with special css class
            }); // initialize select2 dropdown

            var nEditing = null;

            $('#sample_editable_1_new').click(function (e) {
                e.preventDefault();
                var aiNew = oTable.fnAddData(['', '', '', '',
                        '<a class="edit" href="">Edit</a>', '<a class="cancel" data-mode="new" href="">Cancel</a>'
                ]);
                var nRow = oTable.fnGetNodes(aiNew[0]);
                editRow(oTable, nRow);
                nEditing = nRow;
            });

            $('#sample_editable_1 a.delete').live('click', function (e) {
                e.preventDefault();

                if (confirm("Are you sure to delete this row ?") == false) {
                    return;
                }

                var nRow = $(this).parents('tr')[0];
                oTable.fnDeleteRow(nRow);
                alert("Deleted! Do not forget to do some ajax to sync with backend :)");
            });

            $('#sample_editable_1 a.cancel').live('click', function (e) {
                e.preventDefault();
                if ($(this).attr("data-mode") == "new") {
                    var nRow = $(this).parents('tr')[0];
                    oTable.fnDeleteRow(nRow);
                } else {
                    restoreRow(oTable, nEditing);
                    nEditing = null;
                }
            });

            $('#sample_editable_1 a.edit').live('click', function (e) {
                e.preventDefault();

                /* Get the row as a parent of the link that was clicked on */
                var nRow = $(this).parents('tr')[0];

                if (nEditing !== null && nEditing != nRow) {
                    /* Currently editing - but not this row - restore the old before continuing to edit mode */
                    restoreRow(oTable, nEditing);
                    editRow(oTable, nRow);
                    nEditing = nRow;
                } else if (nEditing == nRow && this.innerHTML == "Save") {
                    /* Editing this row and want to save it */
                    saveRow(oTable, nEditing);
                    nEditing = null;
                    alert("Updated! Do not forget to do some ajax to sync with backend :)");
                } else {
                    /* No edit in progress - let's start one */
                    editRow(oTable, nRow);
                    nEditing = nRow;
                }
            });
        }

    };

}();

  TableEditable.init();






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


















