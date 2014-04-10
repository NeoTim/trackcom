@extends('layouts.scaffold')

	@section('page_styles')
	@parent
		<!-- BEGIN PAGE LEVEL PLUGIN STYLES --> 
		<link href="{{ asset('assets/plugins/gritter/css/jquery.gritter.css') }}" rel="stylesheet" type="text/css"/>
		<link href="{{ asset('assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet" type="text/css"/>
		<link href="{{ asset('assets/plugins/fullcalendar/fullcalendar/fullcalendar.css') }}" rel="stylesheet" type="text/css"/>
		<link href="{{ asset('assets/plugins/jqvmap/jqvmap/jqvmap.css') }}" rel="stylesheet" type="text/css"/>
		
		<!-- END PAGE LEVEL PLUGIN STYLES -->
	@stop
	
	@section('main')
	
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			
				@include('dashboard.modals.config')
				
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			
			<!-- BEGIN STYLE CUSTOMIZER -->
			<div class="theme-panel hidden-xs hidden-sm">
			
				@include('dashboard.sections.style')
				
			</div>
			<!-- END STYLE CUSTOMIZER -->
			
			<!-- BEGIN PAGE HEADER-->
			
				@include('dashboard.sections.header')
			
			<!-- END PAGE HEADER-->
			
			<!-- BEGIN DASHBOARD STATS -->
			
				
			
			<!-- END DASHBOARD STATS -->
			
			<div class="clearfix">
			</div>
			<div class="row ">
				<div class="col-md-6 col-sm-6">
					<!-- BEGIN CALENDAR PORTLET-->
						@include('dashboard.portlets.calendar')
					<!-- END CALENDAR PORTLET-->
				</div>
				<div class="col-md-6 col-sm-6">
					<!-- BEGIN CHAT PORTLET-->
						@include('dashboard.portlets.recent')
						
					<!-- END CHAT PORTLET-->
				</div>
			</div>



			<div class="clearfix">
			</div>
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<!-- BEGIN PORTLET-->
						
						@include('dashboard.portlets.task')
					<!-- END PORTLET-->
				</div>
				<div class="col-md-6 col-sm-6">
					<!-- BEGIN PORTLET-->
						@include('dashboard.portlets.activities')
					<!-- END PORTLET-->
					
					<!-- BEGIN PORTLET-->
						@include('dashboard.portlets.server_load')
					<!-- END PORTLET-->
				</div>
			</div>

			<div class="clearfix">
			</div>
			<div class="row ">
				<div class="col-md-6 col-sm-6">
					<!-- BEGIN RECENT PORTLET -->
						@include('dashboard.portlets.chat')
					<!-- END RECENT -->
				</div>
				<div class="col-md-6 col-sm-6">
					<!-- BEGIN TASKS PORTLET -->
						@include('dashboard.portlets.feeds')
					<!-- END TASKS -->
				</div>
			</div>
			<div class="clearfix">
			</div>
			
			
		</div>
	</div>

	
	
	@stop
	@section('page_plugins')
		<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script src="{{ asset('assets/plugins/jqvmap/jqvmap/jquery.vmap.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/plugins/flot/jquery.flot.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/plugins/flot/jquery.flot.resize.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/plugins/jquery.pulsate.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/plugins/bootstrap-daterangepicker/moment.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>
	
	<!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->
	<script src="{{ asset('assets/plugins/fullcalendar/fullcalendar/fullcalendar.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/plugins/jquery.sparkline.min.js') }}" type="text/javascript"></script>
	<!-- END PAGE LEVEL PLUGINS -->
	@stop
	
	@section('page_scripts')
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="{{ asset('assets/scripts/app.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/scripts/index.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/scripts/tasks.js') }}" type="text/javascript"></script>
	<script>
	jQuery(document).ready(function() {    
	   App.init(); // initlayout and core plugins
	  // Index.init();
	   Index.initJQVMAP(); // init index page's custom scripts
	    // init index page's custom scripts
	   Index.initCharts(); // init index page's custom scripts
	   Index.initChat();
	   Index.initMiniCharts();
	   Index.initDashboardDaterange();
	   
	   Tasks.initDashboardWidget();



var title;
	   var start;
	   var newevent = [];
	   
	  
	  
	  newevent = $.get("{{ URL::to('collect') }}").done(function(data){
	  					var orders = eval(data);
	  					newevent = $.grep(orders, function(idx, order){
	  						return $.push(order);
	  					});
	  					$.push(newevent);
	  });
	   
	   console.log(newevent);

var Calendar = function () {


    return {
        //main function to initiate the module
        init: function () {
            Calendar.initCalendar();
        },

        initCalendar: function () {

            if (!jQuery().fullCalendar) {
                return;
            }

            var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();

            var h = {};

            if (App.isRTL()) {
                 if ($('#calendar').parents(".portlet").width() <= 720) {
                    $('#calendar').addClass("mobile");
                    h = {
                        right: 'title, prev, next',
                        center: '',
                        right: 'agendaDay, agendaWeek, month, today'
                    };
                } else {
                    $('#calendar').removeClass("mobile");
                    h = {
                        right: 'title',
                        center: '',
                        left: 'agendaDay, agendaWeek, month, today, prev,next'
                    };
                }                
            } else {
                 if ($('#calendar').parents(".portlet").width() <= 720) {
                    $('#calendar').addClass("mobile");
                    h = {
                        left: 'title, prev, next',
                        center: '',
                        right: 'today,month,agendaWeek,agendaDay'
                    };
                } else {
                    $('#calendar').removeClass("mobile");
                    h = {
                        left: 'title',
                        center: '',
                        right: 'prev,next,today,month,agendaWeek,agendaDay'
                    };
                }
            }
           

            var initDrag = function (el) {
                // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                // it doesn't need to have a start or end
                var eventObject = {
                    title: $.trim(el.text()) // use the element's text as the event title
                };
                // store the Event Object in the DOM element so we can get to it later
                el.data('eventObject', eventObject);
                // make the event draggable using jQuery UI
                el.draggable({
                    zIndex: 999,
                    revert: true, // will cause the event to go back to its
                    revertDuration: 0 //  original position after the drag
                });
            }

            var addEvent = function (title) {
                title = title.length == 0 ? "Untitled Event" : title;
                var html = $('<div class="external-event label label-default">' + title + '</div>');
                jQuery('#event_box').append(html);
                initDrag(html);
            }

            $('#external-events div.external-event').each(function () {
                initDrag($(this))
            });

            $('#event_add').unbind('click').click(function () {
                var title = $('#event_title').val();
                addEvent(title);
            });

            //predefined events
            
			
            $('#event_box').html("");
            
            
        			
					
				
			
			
			
			

            $('#calendar').fullCalendar('destroy'); // destroy the calendar
            $('#calendar').fullCalendar({ //re-initialize the calendar
                header: h,
                slotMinutes: 15,
                editable: true,
                droppable: true, // this allows things to be dropped onto the calendar !!!
                drop: function (date, allDay) { // this function is called when something is dropped

                    // retrieve the dropped element's stored Event Object
                    var originalEventObject = $(this).data('eventObject');
                    // we need to copy it, so that multiple events don't have a reference to the same object
                    var copiedEventObject = $.extend({}, originalEventObject);
					
                    // assign it the date that was reported
                    copiedEventObject.start = date;
                    copiedEventObject.allDay = allDay;
                    copiedEventObject.className = $(this).attr("data-class");

                    // render the event on the calendar
                    // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                    $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

                    // is the "remove after drop" checkbox checked?
                    if ($('#drop-remove').is(':checked')) {
                        // if so, remove the element from the "Draggable Events" list
                        $(this).remove();
                    }
                },
	                
                eventSources: [
                	"{{ URL::to('calendars/show') }}"
                ],
                
                eventClick: function(event, element) {

			        event.title = "CLICKED!";

			        $('#calendar').fullCalendar('updateEvent', event);

			    },

            });

        }

    };

}();
	   Calendar.init();
	});
	</script>
	<!-- END PAGE LEVEL SCRIPTS -->	
	@stop