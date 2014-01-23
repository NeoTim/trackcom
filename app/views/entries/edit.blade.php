@extends('layouts.blueprint')

@section('page_title')
	Update {{$entry->sku}} for Order - {{$order->number}}
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
					<a href="{{ URl::route('orders.show', $order->id) }}">Order# {{$order->number}}</a>
					<i class="fa fa-angle-right"></i>
					
				</li>
				<li>
					<a href="{{ URl::route('orders.show', $order->id) }}">entries</a>
					<i class="fa fa-angle-right"></i>
					
				</li>
				<li>
					<a href="{{{URL::to('orders/' . $order->id . '/entries/' . $entry->id . '/edit')}}}">Update: {{$entry->sku}}</a>

					
				</li>
					
			</ul>
							
		</div>
	</div>
<div class="clearfix"></div>
	<div class="row">
		<div class='col-md-12'>	
			<div class="dashboard-stat yellow">
				<div class="visual">
					<i class="fa fa-edit"></i>
				</div>
				<div class="details">
					<div class="number">
						
						Update {{{$entry->sku}}}
						
					</div>
					<div class="desc">
						
					</div>
				</div>
				<a href="{{ URl::route('orders.show', $order->id) }}" class="more" >
				View Order # {{$order->number}} <i class="m-icon-swapright m-icon-white"></i>
				</a>
			</div>

		</div>
	</div>	
@stop
<!-- Modal -->
@section('content')
 
					


	
		{{ Form::model($entry, array('method' => 'PATCH', 'class' => 'form-horizontal', 'role' => 'form', 'url' => array('orders/' . $order->id . '/entries/' . $entry->id))) }}
		<div class="form-body">
	        
	       
	        
	        
			{{Form::hidden('order_id', $order->id)}}
	        
			<div class="form-group">
				<div class="col-md-6">
		            {{ Form::label('product_id', 'Products', ['class' => 'control-label']) }}
		            {{ Form::select('product_id', $products, $entry->product_id, array('class' => 'form-control select2me', 'data-placeholder' => 'Product')) }}

		        </div>
		        

	        </div>
			
	        <!-- END SKU -->

	        <!-- BATCH AND ORDER # -->
	        <div class="form-group">
	            <div class="col-md-4">
	            {{ Form::label('batch', 'Batch:', ['class' => 'control-label']) }}
	                {{ Form::text('batch', null, array('class' => 'form-control')) }}
	            </div>
	            <div class="col-md-4">
	            {{ Form::label('tank', 'Tank:', ['class' => 'control-label']) }}
	                {{ Form::text('tank', null, array('class' => 'form-control')) }}
	            </div>
	            <div class="col-md-3">
			<label class="control-label">Date Ready</label>
			<div class="input-group date form_meridian_datetime" data-date="">
				<input type="text" name="ready_date" size="16"  class="form-control" value="{{$entry->ready_date}}">
				<span class="input-group-btn">
					<button class="btn default date-reset" type="button"><i class="fa fa-times"></i></button>
				</span>
				<span class="input-group-btn">
					<button class="btn default date-set" type="button"><i class="fa fa-calendar"></i></button>
				</span>
			</div>
		</div>
	        </div>
	        <!-- END BATCH AND ORDER # -->

	        

	        <!-- GROUP 1 -->
	        <div class="form-group">
	            <div class="col-md-3">
	            {{ Form::label('container1', 'Container1:', ['class' => 'control-label']) }}
	                 {{ Form::select('container1', Lang::get('order.containers'), null, array('class' => 'form-control ')) }}
	            </div>
	            <div class="col-md-2">
	            {{ Form::label('qty1', 'Qty1:', ['class' => 'control-label']) }}
	                {{ Form::text('qty1', null, array('class' => 'form-control')) }}
	            </div>
	            <div class="col-md-7">
	            {{ Form::label('desc1', 'Desc1:', ['class' => 'control-label col-md-3']) }}
	                {{ Form::text('desc1', null, array('class' => 'form-control')) }}
	            </div>
	        </div>
	        <!-- END GROUP 1 -->

	        <!-- GROUP 2 -->
	        <div class="form-group">
	            <div class="col-md-3">
	           		{{ Form::label('container2', 'Container2:', ['class' => 'control-label']) }}
	                {{ Form::select('container2', Lang::get('order.containers'), null, array('class' => 'form-control')) }}
	            </div>
	            <div class="col-md-2">
	            {{ Form::label('qty2', 'Qty2:', ['class' => 'control-label']) }}
	                {{ Form::text('qty2', null, array('class' => 'form-control')) }}
	            </div>
	            <div class="col-md-7">
	            {{ Form::label('desc2', 'Desc2:', ['class' => 'control-label col-md-3']) }}
	                {{ Form::text('desc2', null, array('class' => 'form-control')) }}
	            </div>
	        </div>
	        <!-- END GROUP 2 -->

	        <!-- GROUP 3 -->
	        <div class="form-group">
	            <div class="col-md-3">
	            {{ Form::label('container3', 'Container3:', ['class' => 'control-label']) }}
	                 {{ Form::select('container3', Lang::get('order.containers'), null, array('class' => 'form-control')) }}
	            </div>
	            <div class="col-md-2">
	            {{ Form::label('qty3', 'Qty3:', ['class' => 'control-label']) }}
	                {{ Form::text('qty3', null, array('class' => 'form-control')) }}
	            </div>
	            <div class="col-md-7">
	            {{ Form::label('desc3', 'Desc3:', ['class' => 'control-label col-md-3']) }}
	                {{ Form::text('desc3', null, array('class' => 'form-control')) }}
	            </div>
	        </div>
	        <!-- END GROUP 3 -->

	        <h4 class="form-section">Production Info</h4>


	        <!-- PTYPE -->
	        <div class="form-group">
	            <div class="col-md-12">
		            <div class="btn-group" data-toggle="buttons">
		            	<button class="btn btn-default" disabled="disabled">Type <i class="fa fa-arrow-right"></i></button>
						@foreach($ptypes as $ptype)
							@if($entry->ptype_id == $ptype->id)
		            			<label class="btn btn-primary active">
		            		@else
		            			<label class="btn btn-primary">
		            		@endif
		            				<input name="ptype_id" type="radio" class="toggle" value="{{ $ptype->id }}"> {{ $ptype->name }}
		            			</label>
		            	@endforeach
		            </div>
	            </div>
	        </div>
	        <!-- END PTYPE -->

	        <!-- PMETHOD -->
	        <div class="form-group">
	            <div class="col-md-12">
		            <div class="btn-group" data-toggle="buttons">
		            	<button class="btn btn-default" disabled="disabled">Production <i class="fa fa-arrow-right"></i></button>
						@foreach($pmethods as $pmethod)
		            		@if($entry->pmethod_id == $pmethod->id)
		            			<label class="btn btn-warning active">
		            		@else
		            			<label class="btn btn-warning">
		            		@endif
		            				<input name="pmethod_id" type="radio" class="toggle pmethods" data-toggle="button" value="{{ $pmethod->id }}"> {{ $pmethod->name }}
		            			</label>
		            	@endforeach
		            </div>
	            </div>
	        </div>
	        <!-- END PMETHOD -->

	        <!-- MSDS -->
	        <div class="form-group">
	            <div class="col-md-4">
	            	{{ Form::label('msds', 'Msds:', ['class' => 'control-label']) }}
	                {{ Form::url('msds', null, array('class' => 'form-control')) }}
	                <span class="helper-block">Paste the Link for the MSDS Here</span>
	            </div>
	        </div>

	        <div class="form-group">
	        	<div class="btn-group">
	        		<button class="btn btn-primary" type="submit">Save</button>
	        		<a  href="{{{URL::previous()}}}" class="btn btn-default">Cancel</a>
	        	</div>
	        </div>

		</div>


	{{ Form::close() }}
	
	@if ($errors->any())
		<ul>
			{{ implode('', $errors->all('<li class="error">:message</li>')) }}
		</ul>
	@endif



@stop
@section('page_plugins')
	<script type="text/javascript" src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/bootstrap-touchspin/bootstrap.touchspin.js') }}" type="text/javascript"></script>
@stop

@section('page_scripts')
<!-- BEGIN PAGE LEVEL PLUGINS -->

	<script type="text/javascript">
		$(document).ready(function(){
	        $("#qty1, #qty2, #qty3").TouchSpin({
	            inputGroupClass: 'input-small',
	            spinUpClass: 'btn-primary',
	            spinDownClass: 'btn-primary',
	            min: 0,
	            max: 500,
	            step: 1,
	            boostat: 5,
	            maxboostedstep: 10
	        }); 
	        $("#tank").TouchSpin({
	            inputGroupClass: 'input-medium',
	            spinUpClass: 'btn-default',
	            spinDownClass: 'btn-default',
	            min: 0,
	            max: 30,
	            step: 1,
	            boostat: 1,
	            maxboostedstep: 1
	        });         
			$('#product_id').select2({
	            placeholder: "Select an option",
	            allowClear: true
	        });
		});

		
	</script>

<!-- END PAGE LEVEL PLUGINS -->
@stop

