@extends('layouts.blueprint')

@section('page_title')
	Create Order
@stop
@section('header')
	<div class="row">
		<div class="col-md-12">
			<!-- BEGIN PAGE TITLE & BREADCRUMB-->
			<blockquote><h3 class="page-title">
				Create Order
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
					<i class="fa fa-angle-right"></i>
					
				</li>
				<li>
					<a href="{{ URl::to('orders/create') }}">Create</a>

					
				</li>
					
			</ul>
							
		</div>
	</div>
<div class="clearfix"></div>
	<div class="row">
		<div class='col-md-12'>	
			<div class="dashboard-stat blue">
				<div class="visual">
					<i class="fa fa-plus"></i>
				</div>
				<div class="details">
					<div class="number">
						
						Create
						
					</div>
					<div class="desc">
						Order
					</div>
				</div>
				<a href="{{ URL::to('orders/') }}" class="more" >
				View Orders <i class="m-icon-swapright m-icon-white"></i>
				</a>
			</div>

		</div>
	</div>	
@stop

@section('content')
	<!-- BEGIN PAGE LEVEL CONTENT -->
		<div class=" aligncenter">
			<div class="btn-group aligncenter" style="text-align:center;">
				<a href="{{ URL::to('orders')}}" class="btn btn-primary ">All orders</a>
			</div>
			
		</div>
		<br />
		<br />

		<div class="panel panel-inverse">
			<div class="panel-heading">
				<h3 class="panel-title">Create Order</h3>
			</div>
			<div class="panel-body">
				
				{{ Form::open(array('route' => 'orders.store', 'class' => 'form-horizontal', 'id' => 'order_form')) }}
				<div class="form-body">

					<h4 class="form-section">Customer Info</h4>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">				
						            {{ Form::label('customer_id', 'Current Customers', ['class' => 'control-label col-md-3']) }}
						            <div class="col-md-9">
						            	{{ Form::select('customer_id', $customers, null, array('class' => 'form-control select2me', 'data-placeholder' => 'Company')) }}
						            </div>
						        </div>
							</div>

							<div class="col-md-6">
						        <div class="form-group">
						            {{ Form::label('title', 'New Customer', ['class' => 'control-label col-md-3']) }}
						            <div class="col-md-9">
						            	{{ Form::text('company', null, array('class' => 'form-control', 'autofocus')) }}
						            </div>
						        </div>
						        <div class="form-group">
						            {{ Form::label('newname', 'Customer Name', ['class' => 'control-label col-md-3']) }}
						            <div class="col-md-9">
						            	{{ Form::text('newname', null, array('class' => 'form-control')) }}
						            </div>
						        </div>
							</div>
							
						</div>
						
					<div class="clearfix"></div>

					<h4 class="form-section">Order Information</h4>
					
						<div class="row">

							<div class="col-md-6">
						        <div class="form-group">
						            {{ Form::label('number', 'Order Number', ['class' => 'control-label col-md-3']) }}
						            <div class="col-md-9">
						                {{ Form::text('number', null, array('class' => 'form-control')) }}
						            </div>
						        </div>
							</div>
							<div class="col-md-6">
						        <div class="form-group">
						            {{ Form::label('start', 'Est Deliery', ['class' => 'control-label col-md-3']) }}
						            <div class="col-md-9">
						                {{ Form::text('est_delivery', null, array('class' => 'form-control form-control-inline input-medium date-picker')) }}
						            </div>
						        </div>
							</div>

						</div>
						

					<h4 class="form-section">Delivery Information</h4>
						
						<div class="row">
							<div class="col-md-6">
						        <div class="form-group">
						            {{ Form::label('dtype_id', 'Delivery Type:', ['class' => 'control-label col-md-3']) }}
						            <div class="col-md-9">
							            <div class="btn-group" data-toggle="buttons">

							            	<label class="btn btn-info">
							            		<input name="dtype_id" type="radio" class="toggle" value="1"> Metro Delivery
							            	</label>
							            	<label class="btn btn-info">
							            		<input name="dtype_id" type="radio" class="toggle" value="4"> Outbound Delivery
							            	</label>
							            	<label class="btn btn-info">
							            		<input name="dtype_id" type="radio" class="toggle" value="2"> Shipping
							            	</label>
							            	<label class="btn btn-info">
							            		<input name="dtype_id" type="radio" class="toggle" value="3"> Pickup
							            	</label>

							            </div>
						            </div>
						        </div>
							</div>
							<div class="col-md-6">
						        <div class="form-group">
						            {{ Form::label('freight', 'Freight:', ['class' => 'control-label col-md-3']) }}
						            <div class="col-md-9">
						                {{ Form::text('freight', null, array('class' => 'form-control')) }}
						            </div>
						        </div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
						        <div class="form-group">
						            {{ Form::label('dmethod_id', 'Delivery Method:', ['class' => 'control-label col-md-3']) }}
						            <div class="col-md-9">
						            	{{ Form::select('dmethod_id', $dmethods, null, array('class' => 'form-control')) }}
						            </div>
						        </div>

							</div>
							<div class="col-md-6">
						        <div class="form-group">
						            {{ Form::label('tracking', 'Tracking:', ['class' => 'control-label col-md-3']) }}
						            <div class="col-md-9">
						                {{ Form::text('tracking', null, array('class' => 'form-control')) }}
						            </div>
						        </div>
						        <div class="form-group">
						            {{ Form::label('instructions', 'Instructions:', ['class' => 'control-label col-md-3']) }}
						            <div class="col-md-9">
						                {{ Form::textarea('instructions', null, array('class' => 'form-control')) }}
						            </div>
						        </div>
							</div>
						</div>
						
					</div>
				</div>

				<div class="panel-footer">
					<div class="btn-group">
						{{ Form::submit('Submit', array('class' => 'btn btn-success')) }}
						<a href="{{ URL::to('orders') }}" class="btn btn-warning">Cancel</a>
					{{ Form::close() }}
					</div>
				</div>
					
		</div>

	<!-- END PAGE LEVEL CONTENT -->
@stop

@section('page_plugins')
	
	
@stop

@section('page_scripts')
	<!-- BEGIN PAGE LEVEL SCRIPTS -->

			
			
			
			<script>
				jQuery(document).ready(function() {       
				   // initiate layout and plugins

				   

					$('#dmethod_id').multiSelect();
					 
				});   
			</script>
	<!-- END PAGLE LEVEL SCRIPTS -->
<!-- END JAVASCRIPTS -->
@stop



