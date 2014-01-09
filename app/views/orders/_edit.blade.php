@extends('layouts.scaffold')

@section('page_styles')
@parent


	<!-- BEGIN PAGE LEVEL STYLES -->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css') }}"/>
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/gritter/css/jquery.gritter.css') }}"/>
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/select2/select2_metro.css') }}"/>
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/clockface/css/clockface.css') }}"/>
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css') }}"/>
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/bootstrap-datepicker/css/datepicker.css') }}"/>
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/bootstrap-timepicker/compiled/timepicker.css') }}"/>
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/bootstrap-colorpicker/css/colorpicker.css') }}"/>
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css') }}"/>
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/bootstrap-datetimepicker/css/datetimepicker.css') }}"/>
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/jquery-multi-select/css/multi-select.css') }}"/>
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/bootstrap-switch/static/stylesheets/bootstrap-switch-metro.css') }}"/>
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/jquery-tags-input/jquery.tagsinput.css') }}"/>
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css') }}">
	<!-- END PAGE LEVEL STYLES -->
@stop
@section('main')
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			
				@include('layouts.modals.config')
				
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			
			<!-- BEGIN STYLE CUSTOMIZER -->
			<div class="theme-panel hidden-xs hidden-sm">
			
				@include('layouts.sections.style')
				
			</div>
			<!-- END STYLE CUSTOMIZER -->
			
			<!-- BEGIN PAGE HEADER-->
			
				@include('layouts.sections.header')

			<!-- END PAGE HEADER-->
			
			<div class="clearfix">
			</div>
			<div class="row">
				<div class='col-md-12'>
			
						<div class="dashboard-stat yellow">
							<div class="visual">
								<i class="fa fa-edit"></i>
							</div>
							<div class="details">
								<div class="number">
									{{ $order->id }}
								</div>
								<div class="desc">
									Update Order
								</div>
							</div>
							<a href="{{ URL::to('orders') }}" class="more">
							View orders <i class="m-icon-swapright m-icon-white"></i>
							</a>
						</div>
				</div>
			</div>
				
			<div class="clearfix">
			</div>
			<div class="row">
				<div class='col-md-12'>
					<div class='well'>

						<h1>Edit Order</h1>
						{{ Form::model($order, array('method' => 'PATCH', 'class' => 'form-horizontal', 'route' => array('orders.update', $order->id))) }}
							<div class="form-body">

									<div class="form-group">
							            {{ Form::label('customer_id', 'Current Customers', ['class' => 'control-label col-md-3']) }}
							            <div class="col-md-9">
							            	{{ Form::text('customer_id', $order->customer->company, array('class' => 'form-control', 'disabled' => 'disabled')) }}
							            </div>
							        </div>

							        <div class="form-group">
							            {{ Form::label('number', 'Order Number', ['class' => 'control-label col-md-3']) }}
							            <div class="col-md-9">
							                {{ Form::text('number', null, array('class' => 'form-control')) }}
							            </div>
							        </div>

							        <div class="form-group">
							            {{ Form::label('dtype_id', 'Category', ['class' => 'control-label col-md-3']) }}
							            <div class="col-md-9">
								            <div class="btn-group" data-toggle="buttons">
												@foreach($dtypes as $dtype)
													@if($order->dtype_id === $dtype->id)
										            	<label class="btn btn-default active">
										            		<input name="dtype_id" type="radio" class="toggle" value="{{ $dtype->id }}"> {{$dtype->name}}
										            	</label>
										            @else
										            	<label class="btn btn-default">
										            		<input name="dtype_id" type="radio" class="toggle" value="{{ $dtype->id }}"> {{$dtype->name}}
										            	</label>
													@endif
												@endforeach
								            </div>
							            </div>
							        </div>

							        <div class="form-group">
							            {{ Form::label('dmethod_id', 'Method', ['class' => 'control-label col-md-3']) }}
							            <div class="col-md-9">
							            	{{ Form::select('dmethod_id', $dmethods, null, array('class' => 'form-control')) }}
							            </div>
							        </div>

							        

							        <div class="form-group">
							            {{ Form::label('title', 'Title:', ['class' => 'control-label col-md-3']) }}
							            <div class="col-md-9">
							                {{ Form::text('title', null, array('class' => 'form-control')) }}
							            </div>
							        </div>

							        <div class="form-group">
							            {{ Form::label('start', 'Ready by', ['class' => 'control-label col-md-3']) }}
							            <div class="col-md-9">
							                {{ Form::text('start', null, array('class' => 'form-control form-control-inline input-medium date-picker')) }}
							            </div>
							        </div>

							        <div class="form-group">
							            {{ Form::label('end', 'Est Date', ['class' => 'control-label col-md-3']) }}
							            <div class="col-md-9">
							                {{ Form::text('end', null, array('class' => 'form-control form-control-inline input-medium date-picker')) }}
							            </div>
							        </div>

							        <div class="form-group">
							            {{ Form::label('freight', 'Freight:', ['class' => 'control-label col-md-3']) }}
							            <div class="col-md-9">
							                {{ Form::text('freight', null, array('class' => 'form-control')) }}
							            </div>
							        </div>

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
							        <div class="form-group">
							        	<div class="col-md-9 col-md-offset-3 btn-group">
											{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
											{{ link_to_route('orders.show', 'View', array($order->id), array('class' => 'btn btn-warning')) }}
											<a href="{{ URL::to('orders/') }}" class="btn btn-default"><i class="fa fa-times"></i> Cancel</a>
										</div>
									</div>
								</div>
						{{ Form::close() }}
						
						@if ($errors->any())
							<ul>
								{{ implode('', $errors->all('<li class="error">:message</li>')) }}
							</ul>
						@endif
						
					</div>
				</div>
			</div>
		</div>
	</div>
@stop
@section('page_plugins')
	<!-- BEGIN PAGE LEVEL PLUGINS -->
		@include('layouts.plugins.formFull')
<!-- END PAGE LEVEL PLUGINS -->
@stop
@section('page_scripts')
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
		<script src="{{ asset('assets/scripts/app.js') }}"></script>
		<script src="{{ asset('assets/scripts/form-components.js') }}"></script>
		<!-- END PAGE LEVEL SCRIPTS -->
		<script>
		jQuery(document).ready(function() {       
		   // initiate layout and plugins
		   App.init();
		   FormComponents.init();
		   $('#dmethod_id').multiSelect();
		});   
		</script>
		<!-- BEGIN GOOGLE RECAPTCHA -->
		
<!-- END GOOGLE RECAPTCHA -->
<!-- END JAVASCRIPTS -->
@stop
