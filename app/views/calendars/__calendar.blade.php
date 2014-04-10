@extends('layouts.blueprint')

    @section('page_styles')
    
        <!-- BEGIN PAGE LEVEL PLUGIN STYLES --> 
        <link href="{{ asset('assets/plugins/fullcalendar/fullcalendar/fullcalendar.css') }}" rel="stylesheet" type="text/css"/>
        <!-- END PAGE LEVEL PLUGIN STYLES -->
    @stop
@section('page_title')
    Calendar
@stop
    @section('content')
    
    
            <div class="col-md-3 col-sm-12">
                <!-- BEGIN DRAGGABLE EVENTS PORTLET-->
                <div id="external-events">
                
                    <!-- <form class="inline-form">
                        <input type="text" value="" class="form-control" placeholder="Event Title..." id="event_title"/><br/>
                        <a href="javascript:;" id="event_add" class="btn green">Add Event</a>
                    </form> -->
                    <div id="event_box">
                    </div>
                    

                    <h3 class="event-form-title">Metro deliveries</h3>
                    <hr class="visible-xs"/>
                    
                    <div id="metro_deliveries">
                    </div>
                    <hr/>

                    <h3 class="event-form-title">Outbound deliveries</h3>
                    <hr class="visible-xs"/>

                    <div id="outbound_deliveries">
                    </div>
                    <hr/>

                    <h3 class="event-form-title">Shipping</h3>
                    <hr class="visible-xs"/>

                    <div id="shipping">
                    </div>
                    <hr/>

                    <h3 class="event-form-title">Pickup</h3>
                    <hr class="visible-xs"/>

                    <div id="pickup">
                    </div>
                    <hr/>

                    <label for="drop-remove">
                    <input type="checkbox" checked="checked" id="drop-remove"/>remove after drop </label>
                </div>
                <!-- END DRAGGABLE EVENTS PORTLET-->
            </div>
            <div class="col-md-9 col-sm-9">
                <div id="calendar" class="has-toolbar calendar inverse">
                </div>
                
            </div>
@foreach($orders as $order)
<div class="modal fade" id="order_modal_{{{$order->id}}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-wide">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel_{{$order->id}}">Update Order</h4>
      </div>
      <div class="modal-body">
        <form id="modal_form" method="PUT" action="{{URL::to('calendars')}}">
            <div class="form-group">
                <div class="btn-group" data-toggle="buttons">
                    {{Form::label('dtype_id_$order->id', 'Delivery Type', 'control-label')}}
                    <select id="dtype_id_{{$order->id}}" name="dtype_id" class="form-control">
                    @foreach($dtypes as $dtype)
                        <option value="{{$dtype->id}}">{{$dtype->name}}</option>
                    @endforeach
                    </select>
                </div>
        
            </div>
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="submit_order_{{$order->id}}">Save</button>
        <button type="button" class="btn btn-danger" id="remove_order_{{$order->id}}">Remove from Calendar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endforeach
    
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
      
       
      // var orders = eval({{ $orders }});
       var title;
       var start;
       var newevent = [];
       
      
      
      

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
            function Date_toYMD(d)
            {
                var year, month, day;
                year = String(d.getFullYear());
                month = String(d.getMonth() + 1);
                if (month.length == 1) {
                    month = "0" + month;
                }
                day = String(d.getDate());
                if (day.length == 1) {
                    day = "0" + day;
                }
                return year + "-" + month + "-" + day;
            }
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
                    title: $.trim(el.text()), // use the element's text as the event title
                    id: id,
                    backgroundColor: backgroundColor
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

            var addEvent = function (eventid, title, box, lc, bg) {
                title = title.length == 0 ? "Untitled Event" : title;
                id = eventid;
                backgroundColor = bg;
                console.log(eventid);
                var html = $('<div id="cal_order_' + id + '" class="external-event label label-' + lc + '">' + title + '</div>');
                jQuery(box).append(html);
                initDrag(html);
            }

            $('#external-events div.external-event').each(function () {
                initDrag($(this))
            });

            $('#event_add').unbind('click').click(function () {
                var title = $('#event_title').val();
                var box = "#event_box";
                var bg = "default";
                var id = "";
                addEvent(id, title, box, lc, bg);
            });

            //predefined events
            
            
            
            

            $.get("{{URL::to('calendars/show')}}").done(function(data){
                var orders = eval(data);
                $('#metro_deliveries').html("");
                $('#outbound_deliveries').html("");
                $('#shipping').html("");
                $('#pickup').html("");
                $.each($(orders), function(i, order){
                    if(order.start == null)
                    {
                        if(order.dtype_id == 1)
                        {
                            addEvent(order.id, order.title, '#metro_deliveries', 'primary', '#428bca');
                        }
                        else if(order.dtype_id == 2)
                        {
                            addEvent(order.id, order.title, '#shipping', 'success', '#3cc051');
                        }
                        else if(order.dtype_id == 3)
                        {
                            addEvent(order.id, order.title, '#pickup', 'danger', '#ea4519');
                        }
                        else if(order.dtype_id == 4)
                        {
                            addEvent(order.id, order.title, '#outbound_deliveries', 'warning', '#fcb322');
                        }
                    }

                });
            });


            
           
            
                    
            
            
            
            
            

            $('#calendar').fullCalendar('destroy'); // destroy the calendar
            $('#calendar').fullCalendar({ //re-initialize the calendar
                header: h,
                slotMinutes: 15,
                editable: true,
                droppable: true, // this allows things to be dropped onto the calendar !!!
                drop: function (date, allDay, jsEvent, ui) { // this function is called when something is dropped
                    
                    // retrieve the dropped element's stored Event Object
                    var originalEventObject = $(this).data('eventObject');
                    // we need to copy it, so that multiple events don't have a reference to the same object
                    var copiedEventObject = originalEventObject;
                    
                    // assign it the date that was reported
                    copiedEventObject.id = originalEventObject.id;
                    copiedEventObject.start = date;
                    copiedEventObject.allDay = allDay;
                    copiedEventObject.className = $(this).attr("data-class");
                    copiedEventObject.backgroundColor = originalEventObject.backgroundColor;
                    //console.log(originalEventObject);

                    // render the event on the calendar
                    // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                    $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
                    
                   
                    // is the "remove after drop" checkbox checked?
                    if ($('#drop-remove').is(':checked')) {
                        // if so, remove the element from the "Draggable Events" list
                        $(this).remove();
                    }
                    console.log(copiedEventObject.start + '-' + originalEventObject.start);
                    var newStart = Date_toYMD(copiedEventObject.start);
                    $.ajax({
                        url: "{{URL::to('calendars/')}}/" + originalEventObject.id,
                        method: "PUT",
                        data: { start: newStart, title: copiedEventObject.title, backgroundColor: copiedEventObject.backgroundColor  },
                        cache: false,
                        success: function(data){
                            //console.log(data);
                             console.log(data);
                            $('#metro_deliveries').html("");
                            $('#outbound_deliveries').html("");
                            $('#shipping').html("");
                            $('#pickup').html("");
                            Calendar.init();

                        }
                    });
                },
                
                eventSources: [
                    "{{URL::to('calendars/show')}}"
                ],
                
                eventClick: function(calEvent, jsEvent, view) {

                    $("#dtype_id_" + calEvent.id).val(calEvent.dtype_id);

                    $("#order_modal_" + calEvent.id).modal('toggle');
                    var newStart = Date_toYMD(calEvent.start);
                    $("#submit_order_" + calEvent.id).click(function(){
                        $.ajax({
                            url: "{{URL::to('calendars/')}}/" + calEvent.id,
                            method: "PUT",
                            data: { start: newStart, title: calEvent.title, backgroundColor: calEvent.backgroundColor, dtype_id: $("#dtype_id_" + calEvent.id).val() },
                            cache: false,
                            success: function(data){
                                console.log(data);
                                $("#order_modal_" + calEvent.id).modal('hide');
                                $('#metro_deliveries').html("");
                                $('#outbound_deliveries').html("");
                                $('#shipping').html("");
                                $('#pickup').html("");
                                 Calendar.init();
                            }
                        });
                    });
                    $("#remove_order_" + calEvent.id).click(function(){
                        $.ajax({
                            url: "{{URL::to('calendars/')}}/" + calEvent.id,
                            method: "PUT",
                            data: { droporder: "droporder" },
                            cache: false,
                            success: function(data){
                                console.log(data);
                                $("#order_modal_" + calEvent.id).modal('hide');
                                $('#metro_deliveries').html("");
                                $('#outbound_deliveries').html("");
                                $('#shipping').html("");
                                $('#pickup').html("");
                                 Calendar.init();

                            }
                        });
                    });

                    // if(calEvent.dtype_id == 1)
                    // {
                    //     calEvent.dtype_id = 2;
                    //     calEvent.backgroundColor = 'green';

                    // $('#calendar').fullCalendar('updateEvent', calEvent);
                       
                        
                    // }
                    // else if(calEvent.dtype_id == 2)
                    // {
                    //     calEvent.dtype_id = 3;
                    //     calEvent.backgroundColor = 'red';
                    // $('#calendar').fullCalendar('updateEvent', calEvent);
                      
                        
                    // }
                    // else if(calEvent.dtype_id == 3)
                    // {
                    //     calEvent.dtype_id = 4;
                    //     calEvent.backgroundColor = '#fcb322';
                    // $('#calendar').fullCalendar('updateEvent', calEvent);
                        
                        
                    // }
                    // else if(calEvent.dtype_id == 4)
                    // {
                    //     calEvent.dtype_id = 1;
                    //     calEvent.backgroundColor = '#428bca';
                    // $('#calendar').fullCalendar('updateEvent', calEvent);
                       
                        
                    // }
                    
                    

                    
                    
                },
                 eventDrop: function(event) {

                 
                    $.ajax({
                        url: "{{URL::to('calendars/')}}/" + event.id,
                        method: "PUT",
                        data: { start: event.start, title: event.title, backgroundColor: event.backgroundColor },
                        cache: false,
                        success: function(data){
                            

                        }
                    });

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