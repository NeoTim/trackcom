
<!DOCTYPE html>
<html lang="en">
	<head>
	<!-- 
	Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.0.3
	Version: 1.5.5
	Author: KeenThemes
	Website: http://www.keenthemes.com/
	Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
	-->
	<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
	<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
	<!--[if !IE]><!-->
	<html lang="en" class="no-js">
	<!--<![endif]-->
	<!-- BEGIN HEAD -->
	<head>
	<meta charset="utf-8"/>
	<title>Metronic | Admin Dashboard Template</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
	<meta content="" name="description"/>
	<meta content="" name="author"/>
	<meta name="MobileOptimized" content="320">
	
	
	
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
	
	
	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
	<!-- BEGIN CORE PLUGINS -->
	<!--[if lt IE 9]>
	<script src="{{ asset('assets/plugins/respond.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/excanvas.min.js') }}"></script> 
	<![endif]-->
	
	

	<!-- END CORE PLUGINS -->
	
	</head>
	<body>
		
	<script src="{{ asset('assets/plugins/jquery-1.10.2.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/plugins/jquery-migrate-1.2.1.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap2-typeahead.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/plugins/jquery.cokie.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/plugins/uniform/jquery.uniform.min.js') }}" type="text/javascript"></script>
	<!-- END CORE PLUGINS -->
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
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="{{ asset('assets/scripts/app.js') }}"></script>
	<script src="{{ asset('assets/scripts/form-components.js') }}"></script>
	<!-- END PAGE LEVEL SCRIPTS -->
	<script>
	jQuery(document).ready(function() {       
	   // initiate layout and plugins
	   App.init();
	   FormComponents.init();

  		$('#order_id').multiSelect();


  
	});   
	</script>	
				
				<!-- Content -->
				@yield('main')
			
			
			
		

		</body>
</html>