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
									{{ $ptype->id }}
								</div>
								<div class="desc">
									Update Ptype
								</div>
							</div>
							<a href="{{ URL::to('ptypes') }}" class="more">
							View ptypes <i class="m-icon-swapright m-icon-white"></i>
							</a>
						</div>
				</div>
			</div>
				
			<div class="clearfix">
			</div>
			<div class="row">
				<div class='col-md-12'>
					<div class='well'>

						<h1>Edit Ptype</h1>
						{{ Form::model($ptype, array('method' => 'PATCH', 'route' => array('ptypes.update', $ptype->id))) }}
							<ul>
						        <div class="form-group">
            {{ Form::label('name', 'Name:', ['class' => 'control-label col-md-3']) }}
            <div class="col-md-9">
                {{ Form::text('name', null, array('class' => 'form-control')) }}
            </div>
        </div>

								<li>
									{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
									{{ link_to_route('ptypes.show', 'Cancel', $ptype->id, array('class' => 'btn')) }}
								</li>
							</ul>
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
		<script type="text/javascript" src="{{ asset('assets/plugins/fuelux/js/spinner.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/plugins/ckeditor/ckeditor.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/plugins/bootstrap-fileupload/bootstrap-fileupload.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/plugins/clockface/js/clockface.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/plugins/bootstrap-daterangepicker/moment.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/plugins/jquery.input-ip-address-control-1.0.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/plugins/jquery-multi-select/js/jquery.multi-select.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/plugins/jquery-multi-select/js/jquery.quicksearch.js') }}"></script>
		<script src="{{ asset('assets/plugins/jquery.pwstrength.bootstrap/src/pwstrength.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/plugins/bootstrap-switch/static/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/plugins/jquery-tags-input/jquery.tagsinput.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/plugins/bootstrap-markdown/js/bootstrap-markdown.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/plugins/bootstrap-markdown/lib/markdown.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/plugins/bootstrap-touchspin/bootstrap.touchspin.js') }}" type="text/javascript"></script>
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
		});   
		</script>
		<!-- BEGIN GOOGLE RECAPTCHA -->
		<script type="text/javascript">
		var RecaptchaOptions = {
		   theme : 'custom',
		   custom_theme_widget: 'recaptcha_widget'
		};
		</script>
		<script type="text/javascript" src="{{ asset('https://www.google.com/recaptcha/api/challenge?k=6LcrK9cSAAAAALEcjG9gTRPbeA0yAVsKd8sBpFpR"></script>
<!-- END GOOGLE RECAPTCHA -->
<!-- END JAVASCRIPTS -->
@stop
