@extends('layouts.blueprint')
@section('page_title')
	Documents
@stop
@section('page_styles')



<!-- BEGIN PAGE LEVEL STYLES -->
	<link href="{{ asset('assets/plugins/fancybox/source/jquery.fancybox.css') }}" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL STYLES -->

@stop
@section('header')
	<div class="row">
		<div class="col-md-12">
			<!-- BEGIN PAGE TITLE & BREADCRUMB-->
			<blockquote><h3 class="page-title">
				Documents
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
					
				</li>
					
			</ul>
							
		</div>
	</div>
<div class="clearfix"></div>
	<div class="row">
		<div class='col-md-12'>	
			<div class="dashboard-stat green">
				<div class="visual">
					<i class="fa fa-file"></i>
				</div>
				<div class="details">
					<div class="number">
						
						{{count($documents)}}
						
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
			<div class=" aligncenter" style="text-align:center;"><a href="{{ URL::to('documents/create')}}" class="btn btn-primary aligncenter">Upload</a></div>
		</div>
		<br />
		<br />
	

			@if($documents->count())
					@foreach($documents as $doc)

					<div class="col-md-3">
						<div class="col-sm-12 ">
							<div class="thumbnail">
								<img src="{{ asset('files/' . $doc->name) }}" alt="" style="" data-src="holder.js/100%x200">
								<div class="caption">
									<h3> {{$doc->name}} </h3>
									<p>
										<input type="text" value="{{ asset('files/' . $doc->name) }}">
									</p>
									<p>
										{{ Form::open(array('method' => 'DELETE', 'route' => array('documents.destroy', $doc->id))) }}
										<a class="mix-preview fancybox-button btn green" href="{{ asset('files/' . $doc->name) }}" title="Project Name" data-rel="fancybox-button">View <i class="fa fa-search"></i></a>
										<button type="sutmit" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
										{{Form::close()}}
									</p>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				@else
				<h4> There are no documents!!</h4>
				<h5> Would you like to updload now?</h5>
				<a href="{{ URL::to('documents/create')}}" class="btn btn-primary">Upload</a>
				@endif
	

@stop
@section('page_plugins')
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="{{ asset('assets/plugins/jquery-mixitup/jquery.mixitup.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/fancybox/source/jquery.fancybox.pack.js') }}"></script>
<!-- END PAGE LEVEL PLUGINS -->
@stop
@section('page_scripts')

<script src="{{ asset('assets/scripts/portfolio.js') }}"></script>
<script>
jQuery(document).ready(function() {       
   
   Portfolio.init();
});
</script>

@stop