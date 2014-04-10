@extends('layouts.blueprint')
@section('page_title')
	Orders Trash
@stop



@section('content')
	
	<div class=" aligncenter">
		<div class=" aligncenter" style="text-align:center;"><a id="" href="{{URL::to('orders')}}" class="btn btn-primary aligncenter"><i class="fa fa-arrow-left"></i>  All Orders</a></div>
	</div>
	<br />
	<br />
	
	@if ($orders->count())
	<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover table-full-width dataTable" id="sample_editable_1" aria-describedby="sample_1_info">
			<thead>
				<tr>
					<th style="min-width:250px; width:250px;">Options</th>
					<th>ID</th>
					<th>Customer</th>
					<th>Number</th>
					<th>Deleted</th>
				</tr>
			</thead>
	
			<tbody>
				@foreach($orders as $order)
					<tr>
						<td>
	                       <div class="btn-group">
	                            	<button id="DObtn_{{$order->id}}" data-toggle="modal" data-target="#delete_modal_{{$order->id}}" type="button" class="btn btn-danger">Delete</button>
	                       	
	                            	<button id="restore_{{$order->id}}" data-toggle="modal" data-target="#restore_modal_{{$order->id}}" type="button" class="btn btn-info">Restore</button>
	                       </div>
	                       
	                        <div class="modal fade" id="delete_modal_{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							  <div class="modal-dialog modal-wide">
							    <div class="modal-content">
							      <div class="modal-header">
							      	{{Form::open(array('url' => 'orders/' . $order->id . '/remove', 'method' => 'post'))}}
							        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							        <h2 class="modal-title" id="myModalLabel">Confirm Delete</h2>
							      </div>
													
							      <div class="modal-body">	                        	
							      	<h4 id="">Are you sure you want to delete <strong> {{$order->number}} </strong></h4>
							      	<h5>This Cannot be undone!</h5>
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
							<div class="modal fade" id="restore_modal_{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="restore_modal_{{$order->id}}" aria-hidden="true">
							  <div class="modal-dialog modal-wide">
							    <div class="modal-content">
							      <div class="modal-header">
							      	{{Form::open(array('url' => 'orders/' . $order->id . '/restore', 'method' => 'post'))}}
							        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							        <h2 class="modal-title" id="myModalLabel">Confirm Restore</h2>
							      </div>
													
							      <div class="modal-body">	                        	
							      	<h4 id="">Are you sure you want to restore <strong> {{$order->number}} </strong></h4>
							      </div>
							      <div class="modal-footer">
							      	<div class="btn-group">
										{{ Form::submit('Restore', array('class' => 'btn btn-info')) }}
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
						<td>{{ date("F d Y",strtotime($order->deleted_at)) }}</td>
					</tr>
				@endforeach
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

@stop


















