@extends('layouts.blueprint')
@section('page_title')
	Customers
@stop	
@section('header')
	<div class="row">
		<div class="col-md-12">
			<!-- BEGIN PAGE TITLE & BREADCRUMB-->
			<blockquote><h3 class="page-title">
				Customers
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
					<a href="{{ URl::to('customers') }}">customers</a>
					
				</li>
					
			</ul>
							
		</div>
	</div>
<div class="clearfix"></div>
	<div class="row">
		<div class='col-md-12'>	
			<div class="dashboard-stat green">
				<div class="visual">
					<i class="fa fa-group"></i>
				</div>
				<div class="details">
					<div class="number">
						
						{{count($customers)}}
						
					</div>
					<div class="desc">
						Total Customers
					</div>
				</div>
				<a href="{{ URL::to('customers/create') }}" class="more" >
				Add Customer <i class="m-icon-swapright m-icon-white"></i>
				</a>
			</div>

		</div>
	</div>	
@stop
@section('content')
		<div class=" aligncenter">
			<div class=" aligncenter" style="text-align:center;"><a href="{{ URL::to('customers/create')}}" class="btn btn-primary aligncenter">Add customer</a></div>
		</div>
		<br />
		<br />
		
		
		
		
		@if ($customers->count())
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover table-full-width dataTable" id="customers_table" aria-describedby="sample_2_info" style="width: 1060px;">
				<thead>
					<tr>
						<th>Company</th>
						<th>Last</th>
						<th>First</th>
						<th>Email</th>
						<th>Phone</th>
						<th>City</th>
						<th>State</th>
						<th style="min-width:200px;">Options</th>
					</tr>
				</thead>
		
				<tbody>
					@foreach ($customers as $customer)
						<tr>
							<td>{{{ $customer->company }}}</td>
							<td>{{{ $customer->last }}}</td>
							<td>{{{ $customer->first }}}</td>
							<td>{{{ $customer->email }}}</td>
							<td>{{{ $customer->phone }}}</td>
							<td>{{{ $customer->city }}}</td>
							<td>{{{ $customer->state }}}</td>
		                    <td>
		                       
		                    		<div class="btn-group">
		                    			{{ link_to_route('customers.show', ' View', array($customer->id), array('class' => 'btn btn-default')) }}
		                    			<button class="btn btn-danger" id="DCbtn_{{$customer->id}}" data-toggle="modal" data-target="#delete_modal_{{$customer->id}}">Delete</button>
		                        	</div>
		                        	<div class="modal fade" id="delete_modal_{{$customer->id}}" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
									  <div class="modal-dialog modal-wide">
									    <div class="modal-content">
									      <div class="modal-header">
									      	{{ Form::open(array('id' => 'delete_form', 'method' => 'DELETE', 'route' => array('customers.destroy', $customer->id))) }}
									        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									        <h2 class="modal-title" id="productModalLabel">Delete {{$customer->company}} </h2>
									      </div>
															
									      <div class="modal-body">	                        	
									      	<h4 id=""> Are you Sure you want to Delete <strong id="">{{$customer->company}}</strong></h4>
									      	<p>You must Delete all orders from this customer before deleting!!!</p>
									      	
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
		@else
			There are no customers
		@endif



			
@stop
@section('page_scripts')
<script type="text/javascript">

	$(document).ready(function() {
	 
		$('#customers_table').dataTable( {
	        "bPaginate": false,
	        "bLengthChange": false,
	        "bFilter": true,
	        "bSort": true,
	        "bInfo": false,
	        "bAutoWidth": true
	    });
		
	});

</script>
@stop
