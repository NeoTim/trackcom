@extends('layouts.blueprint')
	@section('page_styles')
		<!-- BEGIN PAGE LEVEL PLUGIN STYLES --> 
		<link href="{{ asset('assets/plugins/fullcalendar/fullcalendar/fullcalendar.css') }}" rel="stylesheet" type="text/css"/>
		<!-- END PAGE LEVEL PLUGIN STYLES -->
	@stop
	@section('page_title')
		Dashboard
	@stop
	@section('content')

    
                  <div id="notify_block" class="panel-body">
                       
                  </div>
    
    

    
    <div class="row">
		<div class="col-md-6">
			<!-- BEGIN CALENDAR PORTLET-->
				@include('dashboard.portlets.calendar')
			<!-- END CALENDAR PORTLET-->
		</div>
		<div class="col-md-6">
			<!-- BEGIN PORTLET-->
				
			<!-- END PORTLET-->
			
			<!-- BEGIN PORTLET-->
				@include('dashboard.portlets.feeds')
			<!-- END PORTLET-->
		</div>
    </div>
			
	@stop
	@section('page_plugins')
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->
	<script src="{{ asset('assets/plugins/fullcalendar/fullcalendar/fullcalendar.min.js') }}" type="text/javascript"></script>
	<!-- END PAGE LEVEL PLUGINS -->
	@stop
    @section('page_scripts')
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script>
	jQuery(document).ready(function() {    
            var title;
            var start;
            var newevent = [];


            $.get("{{URL::route('notifications.show')}}").done(function(data){
                //var notifies = jQuery.parseJSON(data);
                var notifies = eval(data);
                $.each($(notifies), function(i, notify){
                    var temp = [
                                    '<blockquote class=" alert goonote note-' + notify.label + '">',
                                            '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>',
                                            '<h2 class="block">',
                                            notify.title,
                                            '<small style="font-size:12px;">',
                                            notify.subject,
                                            '</small>',
                                            '</h2>',
                                            '<p>',
                                            notify.body,
                                            '</p>',
                                    '</blockquote>'
                                ].join('');
                    $(temp).prependTo("#notify_block").fadeIn('slow');
                });
            });
            $("#notify_submit").click(function(){
                $.ajax({
                    url: "{{URL::route('notifications.store')}}",
                    type: "POST",
                    cache: false,
                    data: { title: $("#notify_title").val(), subject: $("#notify_subject").val(), body: $("#notify_body").val(), label: $("#notify_label").val() },
                    success: function(data){
                        console.log(data);
                        var temp = [
                                    '<blockquote class="note note-' + data.label + '">',
                                        '<h2 class="block">',
                                        data.title,
                                        '<small style="font-size:12px;">',
                                        data.subject,
                                        '</small>',
                                        '</h2>',
                                        '<p>',
                                        data.body,
                                        '</p>',
                                    '</blockquote>'
                                    ].join('');
                        $(temp).prependTo("#notify_block").fadeIn('slow');
                        $("#notify_modal").modal('hide');
                    }
                });
            });

	   
    	   function SetStats()
            {
                $.get("{{ URL::to('collect/entries') }}").done(function(data)
            {                                               
                    var entries = eval(data);
                    selectVars(entries);
                });
            }
            
            
            function placeOrdersStatus(id, sku, status, color)
            {

                $("<li id=status_menu_'" + id + "'><a href='{{ URL::to('orders') }}'><span class='task'><span class='desc'>" + sku + "</span><span class='percent'>" + status + "%</span></span><span class='progress progress-striped'><span style='width: " + status + "%;' class='progress-bar progress-bar-" + color + "' aria-valuenow='" + status + "' aria-valuemin='0' aria-valuemax='100'><span class='sr-only'>" + status + "%% Complete</span></span></span></a></li>").appendTo("#drop_down_status");

            }
            function selectVars(entries)
            {
                $("#entry_count").text(entries.length);
                $("#drop_down_status_title").text('You have ' + entries.length + ' orders pending!');
                $.each($(entries), function(i){
                    var status  = entries[i].status;
                    var color   = entries[i].color;
                    var sku     = entries[i].sku;
                    var id      = entries[i].id;

                    placeOrdersStatus(id, sku, status, color);
                });
            }

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