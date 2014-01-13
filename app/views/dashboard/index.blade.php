@extends('layouts.blueprint')
	@section('page_styles')
		<!-- BEGIN PAGE LEVEL PLUGIN STYLES --> 
		
		<!-- END PAGE LEVEL PLUGIN STYLES -->
	@stop

    @section('extra')
    <link href="{{ asset('assets/plugins/fullcalendar/fullcalendar/fullcalendar.css') }}" rel="stylesheet" type="text/css"/>
    <style type="text/css">

        ul.drop_orders{
            maring-left:0px;
            padding-left: 0px;
        }

        .external-order {
            display: block;
            cursor: move;
            margin-bottom: 5px;
            margin-left: 0px;
            padding-left:0;
        }

        .drop_orders li.label{
            text-align: left;
            

        }
        .drop_orders li {
            padding-top: 5px;
            border-bottom: 1px solid #eee;
            color:#777777;
        }
        .drop_orders li i{
            color:#4fa950;
        }


        
    </style>

    @stop

	@section('page_title')
		Dashboard
	@stop

	@section('content')

    
    <div id="notify_block" class="panel-body ">
       
    </div>
    
    
    <div class="col-md-9 " >
            <div class="col-md-12 hidden-xs">
                <!-- BEGIN ORDERS PROTLET -->
                    <div id="order_portlet" class="portlet box primary">
                        <div class="portlet-title">
                            <div class="caption">
                                Production Status
                            </div>
                            <div id="" class="tools">
                                <a href="#myCarousel" style="color:#ffffff" id="#myCarousel" class="left"><i class="fa fa-angle-left" id=""></i></a>
                                <a href="#myCarousel" style="color:#ffffff" id="#myCarousel" class="right"><i class="fa fa-angle-right" id=""></i></a>
                            </div>
                        </div>
                        <div id="order_status" class="portlet-body">
                            <div id="myCarousel" class="carousel slide" data-ride="carousel" style="width:110%; right:5%;">
                                <div id="entry_content" class="carousel-inner" style="width:100%;">
                                    
                                </div>
                                <!-- <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a> -->
                                <!-- <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a> -->
                            </div>
                        </div>
                    </div>
                <!-- END ORDERS POTLET -->
            </div>
            
                                
    

        
    		<div class="col-md-12 ">
    			<!-- BEGIN CALENDAR PORTLET-->
    				@include('dashboard.portlets.calendar')
    			<!-- END CALENDAR PORTLET-->
    		</div>  
            <div class="col-md-12 ">
                <!-- BEGIN ORDERS PROTLET -->
                    @include('dashboard.portlets.feeds')
                <!-- END ORDERS POTLET -->
            </div> 		
        
    </div>
    <div id="trucks_box" class="col-md-3">
            <!-- BEGIN DELIVERY TRUCKS -->
            <!-- END DELIVERY TRUCKS -->
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
    <script src="{{ asset('js/dashboard.templates.js') }}" type="text/javascript"></script>
    
	<script>

            
	jQuery(document).ready(function() {  
            $.initCalendar("{{ URL::to('calendars/show') }}");
            //Calendar.init("{{ URL::to('calendars/show') }}");
            



            var URLto           = "{{URL::to('/')}}";
            var title;
            var start;
            var newevent        = [];
            var trucks          = [];
            var orders          = [];
            var notifies        = [];
            var entries         = [];
            var trucks_box =   "#trucks_box";
            trucks      = $.getVariables("{{URL::route('trucks.show')}}");
            orders      = $.getVariables("{{URL::to('collect/orders')}}");
            notifies    = $.getVariables("{{URL::route('notifications.show')}}");
            entries     = $.getVariables("{{ URL::to('collect/entries/paginate') }}");
            //var feed_temp = $.entry_content_temp(1);
            //$(feed_temp).appendTo("#feed_content");
           // var tLen = trucks.length;
            
           // console.log(entries.data);
           // console.log(entries.total);
           // console.log(entries.current_page);
           // console.log(entries.last_page);
           // console.log(entries.from);
           // console.log(entries.to);
            // SET TRUCKS
            for(var i=0; i<=entries.last_page; i++)
            {
                var ii = i+1;
                $('<div class="item"><ul id="entries_page_' + ii + '" class="feeds"></ul></div>').appendTo("#entry_content");

                $("#entries_page_" + ii).load("{{URL::to('dashboard/entries?page=')}}" + ii);
            }
            $(".item:first").addClass("active");
            
            $.each($(trucks), function(i, truck){
                if(truck.active == 1)
                {
                    //trucks_temp(truck.id, truck.number, truck.driver, truck.dmethod_name);
                    var temp = $.trucks_temp(truck.id, truck.number, truck.driver, truck.dmethod_name);
                    $(temp).appendTo(trucks_box);
                }
            });
            
            // SET TRUCK ORDERS
            $.each($(orders), function(i, order){
                if(order.truck_id !== 0)
                {
                    var temp = $.truck_orders_temp(order.id, order.title, order.truck_id, order.position, order.dtype_id, order.number);
                    $(temp).appendTo("#drop_truck_" + order.truck_id);
                }
            });

            // SET ENTRIES
            
            $.each($(entries.data), function(i, entry){
                //var url = URLto + "orders/" + entry.order_id;
                //var temp = $.get_entries_temp(entry.id, entry.sku, entry.status, entry.color, url);
                //$(temp).appendTo("#entry_items");
            });

            // SET NOTIFICATIONS
            $.each($(notifies), function(i, notify){
                var temp = $.get_notifies_temp(notify.label, notify.title, notify.subject, notify.body);
                $(temp).prependTo("#notify_block").fadeIn('slow');
            });
           
            // SUBMIT NOTIFICATIONS
            $("#notify_submit").click(function(){
                $.ajax({
                    url: "{{URL::route('notifications.store')}}",
                    type: "POST",
                    cache: false,
                    data: { title: $("#notify_title").val(), subject: $("#notify_subject").val(), body: $("#notify_body").val(), label: $("#notify_label").val() },
                    success: function(data){
                        var temp = $.get_notifies_temp(data.label, data.title, data.subject, data.body);
                        $(temp).prependTo("#notify_block").fadeIn('slow');
                        $("#notify_modal").modal('hide');
                    }
                });
            });

            

	   

	});

	</script>
	<!-- END PAGE LEVEL SCRIPTS -->	
	@stop