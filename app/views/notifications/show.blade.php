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
								<i class="fa fa-eye"></i>
							</div>
							<div class="details">
								<div class="number">
									{{ $notification->id }}
								</div>
								<div class="desc">
									Notification
								</div>
							</div>
							<a href="{{ URL::to('notifications') }}" class="more">
							View Notifications <i class="m-icon-swapright m-icon-white"></i>
							</a>
						</div>
				</div>
			</div>
				
			<div class="clearfix">
			</div>
			<div class="row">
				<div class='col-md-12'>
					<div class='well'>

	
						<p>{{ link_to_route('notifications.index', 'Return to all notifications') }}</p>
	
						<table class="table table-striped table-bordered table-hover table-full-width dataTable" id="sample_2" aria-describedby="sample_2_info" style="width: 1060px;">
							<thead>
								<tr>
									<th>User_id</th>
				<th>Title</th>
				<th>Subject</th>
				<th>Body</th>
				<th>Active</th>
				<th>Color</th>
				<th>Label</th>
								</tr>
							</thead>
	
							<tbody>
								<tr>
									<td>{{{ $notification->user_id }}}</td>
					<td>{{{ $notification->title }}}</td>
					<td>{{{ $notification->subject }}}</td>
					<td>{{{ $notification->body }}}</td>
					<td>{{{ $notification->active }}}</td>
					<td>{{{ $notification->color }}}</td>
					<td>{{{ $notification->label }}}</td>
                    <td>{{ link_to_route('notifications.edit', 'Edit', array($notification->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('notifications.destroy', $notification->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
								</tr>
							</tbody>
						</table>	
						
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