@extends('layouts.blueprint')
@section('page_title')
	Update Order - {{$order->number}}
@stop

@section('header')
	<div class="row">
		<div class="col-md-12">
			<!-- BEGIN PAGE TITLE & BREADCRUMB-->
			<blockquote><h3 class="page-title">
				{{{$order->number}}}
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
					<a href="{{ URl::to('orders/' . $order->id) }}">
						Order # {{{ $order->number }}}
					</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="">
						Edit
						
					</a>
				</li>
					
			</ul>
							
		</div>
	</div>
<div class="clearfix"></div>
	<div class="row">
		<div class='col-md-12'>	
			<div class="dashboard-stat yellow">
				<div class="visual">
					<i class="fa fa-barcode"></i>
				</div>
				<div class="details">
					<div class="number">
						
						{{{$order->customer->company}}}
						
					</div>
					<div class="desc">
						{{{$order->number}}}
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
	<!-- BEGIN PAGE LEVEL CONTENT -->
		<div class=" aligncenter">
			<div class="btn-group aligncenter" style="text-align:center;">
				<a href="{{ URL::to('orders')}}" class="btn btn-primary ">All orders</a>
				<a href="{{ URL::route('orders.show', $order->id)}}" class="btn btn-warning ">View</a>
			</div>
			
		</div>
		<br />
		<br />

		<div class="panel panel-inverse">
			<div class="panel-heading">
				<h3 class="panel-title">Edit Order</h3>
			</div>
			<div class="panel-body">
			{{ Form::model($order, array('method' => 'PATCH', 'class' => 'form-horizontal', 'route' => array('orders.update', $order->id))) }}
				<div class="form-body">

				<h4 class="form-section">Customer Info</h4>
					<div class="row">
						<div class="col-md-6">
					        <div class="form-group">
					            {{ Form::label('title', 'New Customer', ['class' => 'control-label col-md-3']) }}
					            <div class="col-md-9">
					            	{{ Form::text('company', $order->customer->company , array('class' => 'form-control', 'disabled' => 'disabled')) }}
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
					            {{ Form::label('end', 'Est Delvery', ['class' => 'control-label col-md-3']) }}
					            <div class="col-md-9">
					                {{ Form::text('est_delivery', null, array('class' => 'form-control form-control-inline input-medium date-picker')) }}
					            </div>
					        </div>
						</div>
						

					</div>
					<div class="row">
						<div class="col-md-6 col-md-offset-6">
							<div class="form-group">
					            {{ Form::label('start', 'Finished Date', ['class' => 'control-label col-md-3']) }}
					            <div class="col-md-9">
					                {{ Form::text('start', $order->start, array('class' => 'form-control form-control-inline input-medium date-picker')) }}
					            </div>
					        </div>
						</div>
					</div>
					

				<hr />
					
					<div class="row">
						<div class="col-md-6">
					        <div class="form-group">
					            {{ Form::label('dtype_id', 'Delivery Type:', ['class' => 'control-label col-md-3']) }}
					            <div class="col-md-9">
						            <div class="btn-group" data-toggle="buttons">
						            	@foreach($dtypes as $dtype)
											@if($order->dtype_id === $dtype->id)
								            	<label class="btn btn-info active">
								            		<input name="dtype_id" type="radio" class="toggle" value="{{ $dtype->id }}"> {{$dtype->name}}
								            	</label>
								            @else
								            	<label class="btn btn-info">
								            		<input name="dtype_id" type="radio" class="toggle" value="{{ $dtype->id }}"> {{$dtype->name}}
								            	</label>
											@endif
										@endforeach

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
				<!-- END FORM BODY -->
			</div>
			<div class="panel-footer">
				<div class="btn-group">
					{{ Form::submit('Submit', array('class' => 'btn btn-success')) }}
					<a href="{{ URL::to('orders') }}" class="btn btn-warning">Cancel</a>
					{{Form::close()}}
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
	
					$('#dmethod_id').multiSelect();	
					$.fn.datepicker.defaults.format = "mm/dd/yyyy";
					$('.date-picker').datepicker({
					    startDate: '-3d'
					})
				});   
			</script>
	<!-- END PAGLE LEVEL SCRIPTS -->
<!-- END JAVASCRIPTS -->
@stop



