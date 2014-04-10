@extends('layouts.blueprint')
@section('page_title')
	Create Product
@stop
@section('page_styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css') }}">
@stop

@section('header')
	<div class="row">
		<div class="col-md-12">
			<!-- BEGIN PAGE TITLE & BREADCRUMB-->
			<blockquote><h3 class="page-title">
				Create Product
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
					<a href="{{ URl::to('products') }}">Products</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="{{ URl::to('products/create') }}">Create</a>
					
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
						
						New
						
					</div>
					<div class="desc">
						Product
					</div>
				</div>
				<a href="{{ URL::to('products') }}" class="more" >
				View Products <i class="m-icon-swapright m-icon-white"></i>
				</a>
			</div>

		</div>
	</div>	
@stop
@section('content')
	<div class='col-md-6 col-md-offset-3'>
		<div class="panel panel-inverse">
			<div class="panel-heading">
				<h3 class="panel-title">Create Product</h3>
			</div>
			<div class="panel-body">
			{{ Form::open(array('route' => 'products.store', 'class' => 'form-horizontal')) }}
				<div class="form-body">
					<div class="form-group">
			            {{ Form::label('sku', 'Sku:', ['class' => 'control-label col-md-3']) }}
			            <div class="col-md-9">
			                {{ Form::text('sku', null, array('class' => 'form-control')) }}
			            </div>
			        </div>

			        <div class="form-group">
			            {{ Form::label('name', 'Name:', ['class' => 'control-label col-md-3']) }}
			            <div class="col-md-9">
			                {{ Form::text('name', null, array('class' => 'form-control')) }}
			            </div>
			        </div>

			        <div class="form-group">
			            {{ Form::label('fullname', 'Fullname:', ['class' => 'control-label col-md-3']) }}
			            <div class="col-md-9">
			                {{ Form::text('fullname', null, array('class' => 'form-control')) }}
			            </div>
			        </div>

			        <div class="form-group">
			            {{ Form::label('formula', 'Formula:', ['class' => 'control-label col-md-3']) }}
			            <div class="col-md-9">
			                {{ Form::textarea('formula', null, array('class' => 'form-control ckeditor', 'style' => 'visibility:hidden; display:none;')) }}
			            </div> 
			        </div>

			        <div class="form-group">
			            {{ Form::label('desc', 'Description:', ['class' => 'control-label col-md-3']) }}
			            <div class="col-md-9">
			                {{ Form::textarea('desc', null, array('class' => 'form-control')) }}
			            </div>
			        </div>

			        <div class="form-group">
			            {{ Form::label('file', 'File:', ['class' => 'control-label col-md-3']) }}
			            <div class="col-md-9">
			                {{ Form::text('file', null, array('class' => 'form-control')) }}
			            </div>
			        </div>

					<div class="form-group">
						<div class="col-md-9 col-md-offset-3 btn-group">
							{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
							<a href="{{ URL::to('products') }}" class="btn btn-default"><i class="fa fa-times"></i> Cancel</a>
						</div>
					</div>
				</div>
			</div>
			<div class="panel-footer">
				<div class="btn-group">
					{{ Form::submit('Submit', array('class' => 'btn btn-success')) }}
					<a href="{{ URL::to('products') }}" class="btn btn-warning">Cancel</a>
					{{ Form::close() }}
				</div>
			</div>
		</div>

	</div>
	
@stop
@section('page_plugins')
	<script type="text/javascript" src="{{ asset('assets/plugins/ckeditor/ckeditor.js') }}"></script>
	<script src="{{ asset('assets/plugins/bootstrap-markdown/js/bootstrap-markdown.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/plugins/bootstrap-markdown/lib/markdown.js') }}" type="text/javascript"></script>
@stop


