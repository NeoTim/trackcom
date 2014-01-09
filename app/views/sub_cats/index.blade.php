@extends('layouts.scaffold')

@section('page_styles')
@parent


<!-- BEGIN PAGE LEVEL STYLES -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/select2/select2_metro.css') }}"/>
	<link rel="stylesheet" href="{{ asset('assets/plugins/data-tables/DT_bootstrap.css') }}"/>
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
			
						<div class="dashboard-stat green">
							<div class="visual">
								<i class="fa fa-home"></i>
							</div>
							<div class="details">
								<div class="number">
									{{ count($sub_cats) }}
								</div>
								<div class="desc">
									Sub_cat
								</div>
							</div>
							<a href="{{ URL::to('sub_cats/create') }}" class="more">
							Add Sub_cat <i class="m-icon-swapright m-icon-white"></i>
							</a>
						</div>
				</div>
			</div>
			
			<div class="clearfix">
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="well">
						
						
						<p>{{ link_to_route('sub_cats.create', 'Add new sub_cat') }}</p>
						
						@if ($sub_cats->count())
							<table class="table table-striped table-bordered table-hover table-full-width dataTable" id="sample_2" aria-describedby="sample_2_info" style="width: 1060px;">
								<thead>
									<tr>
										<th>Name</th>
				<th>Category_id</th>
				<th>Position</th>
				<th>Visible</th>
									</tr>
								</thead>
						
								<tbody>
									@foreach ($sub_cats as $sub_cat)
										<tr>
											<td>{{{ $sub_cat->name }}}</td>
					<td>{{{ $sub_cat->category_id }}}</td>
					<td>{{{ $sub_cat->position }}}</td>
					<td>{{{ $sub_cat->visible }}}</td>
                    <td>{{ link_to_route('sub_cats.edit', 'Edit', array($sub_cat->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('sub_cats.destroy', $sub_cat->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
										</tr>
									@endforeach
								</tbody>
							</table>
						@else
							There are no sub_cats
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
@stop
@section('page_plugins')
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="{{ ('assets/plugins/select2/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ ('assets/plugins/data-tables/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ ('assets/plugins/data-tables/DT_bootstrap.js') }}"></script>
<!-- END PAGE LEVEL PLUGINS -->
@stop
@section('page_scripts')
<script src="{{ ('assets/scripts/app.js') }}"></script>
<script src="{{ ('assets/scripts/table-advanced.js') }}"></script>
<script>
jQuery(document).ready(function() {       
   App.init();
   TableAdvanced.init();
});
</script>

@stop