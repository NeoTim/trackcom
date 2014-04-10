@extends('layouts.blueprint')
@section('page_title')
	Upload
@stop
@section('page_styles')



	<!-- BEGIN PAGE LEVEL STYLES -->
		<link href="{{ asset('assets/plugins/dropzone/css/dropzone.css') }}" rel="stylesheet"/>
	<!-- END PAGE LEVEL STYLES -->
@stop
@section('header')
	<div class="row">
		<div class="col-md-12">
			<!-- BEGIN PAGE TITLE & BREADCRUMB-->
			<blockquote><h3 class="page-title">
				Upload Documents
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
					<a href="{{ URl::to('documents') }}">Documents</a>
					<i class="fa fa-angle-right"></i>
					
				</li>
				<li>
					<a href="{{ URl::to('documents/create') }}">Upload</a>
				
					
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
						
						Upload
						
					</div>
					<div class="desc">
						Total Documents
					</div>
				</div>
				<a href="{{ URL::to('documents/create') }}" class="more" >
				Add Documents <i class="m-icon-swapright m-icon-white"></i>
				</a>
			</div>

		</div>
	</div>	
@stop
@section('content')
				<div class=" aligncenter">
					<div class=" aligncenter" style="text-align:center;"><a href="{{ URL::to('documents')}}" class="btn btn-primary aligncenter">View All</a></div>
				</div>
				<br />
				<br />		
						
							<!-- BEGIN PAGE CONTENT-->
						
						
									
	{{ Form::open(array('route' => 'documents.store', 'class' => 'dropzone', 'id' => 'my-dropzone')) }}


	{{ Form::close() }}
	<p>
		<span class="label label-danger">
			 NOTE:
		</span>
		 &nbsp; This will only work in the latest Chrome, Firefox, Safari, Opera & Internet Explorer 10.
	</p>

							<!-- END PAGE CONTENT-->
						
						
	@if ($errors->any())
		<ul>
			{{ implode('', $errors->all('<li class="error">:message</li>')) }}
		</ul>
	@endif


@stop
@section('page_plugins')
	
	@include('layouts.scripts.dropzone')
@stop