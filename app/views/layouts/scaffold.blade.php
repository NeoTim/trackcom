@extends('layouts.master')


@section('head')

	@include('layouts.styles.global')
	<link href="{{ asset('assets/plugins/gritter/css/jquery.gritter.css') }}" rel="stylesheet" type="text/css">
	@yield('page_styles')

	@include('layouts.styles.theme')

	@yield('extra')

@stop

@section('body')
	
	@include('layouts.headers.main')

	<div class="clearfix"></div>

	<div class="page-container">

		@include('layouts.menus.sidebar')

		@yield('page_header')

		@yield('main')

	</div>

@stop




@section('scripts')
	@include('layouts.scripts.global')

	@yield('page_plugins')
	

	@yield('page_scripts')
	<script type="text/javascript" src="{{ asset('assets/plugins/gritter/js/jquery.gritter.js') }}"></script>
	<script src="{{ asset('node_modules/socket.io/node_modules/socket.io-client/dist/socket.io.js') }}"></script>
	<script>
	$(document).ready(function(){
		SetStats();
		var menu = "#main_top_menu";


		function setAdminMenu(cat)
		{
			var temp = ["<li class='dropdown' id=top_menu_{{"  cat.name  "}}>",
							"<a href='{{ URL::to('" + cat.name + "') }}' data-close-others='true'>",
								"" + cat.name + " |",
							"</a>",
						"</li>"].join('');
			$(temp).prependTo("#main_top_menu");
			//console.log(cat.name);
		}


		$.get("{{URL::to('collect/categories')}}").done(function(data){
			var cats = eval(data);
			$.each($(cats), function(i){
				var cat = cats[i];
				//setAdminMenu(cat);
			});
		});


		$(".bsControl :input").addClass("form-control");

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
			
			$("#drop_down_status_title").text('You have ' + entries.length + ' orders pending!');
			$.each($(entries), function(i){
				var status 	= entries[i].status;
				var color 	= entries[i].color;
				var sku		= entries[i].sku;
				var id 		= entries[i].id;

				placeOrdersStatus(id, sku, status, color);
			});
		}
// <![CDATA[
            var socket = io.connect('http://joels-imac.local:3000/');
            //socket.on('connect', function(data){
            //    socket.emit('subscribe', {channel:'score.update'});
            //});
			 socket.on('entries.store', function (data) {
                var entry = jQuery.parseJSON(data);
                placeOrdersStatus(entry.id, entry.sku, entry.status, entry.color);
                $.gritter.add({
                // (string | mandatory) the heading of the notification
                	title: entry.sku,
                // (string | mandatory) the text inside the notification
                	text: "Was Just Added to production"
            	});
            });
            socket.on('entries.update', function (data) {
                var entry = jQuery.parseJSON(data);
                $("#drop_down_status").html("");
                SetStats();
                
                $.gritter.add({
                // (string | mandatory) the heading of the notification
                	title: entry.sku,
                // (string | mandatory) the text inside the notification
                	text: "Was Just Updated"
            	});
            });
            socket.on('entries.delete', function (data) {
                var entry = jQuery.parseJSON(data);
                $("li#status_menu_" + entry.id).remove();
                $.gritter.add({
                // (string | mandatory) the heading of the notification
                	title: entry.sku,
                // (string | mandatory) the text inside the notification
                	text: "Was Just removed"
            	});
            });
            
 
// ]]>		
	

	});
	</script>
@stop



