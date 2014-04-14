@extends('layouts.blueprint')

		@section('page_styles')
		
				<!-- BEGIN PAGE LEVEL PLUGIN STYLES --> 
				<!-- <link href="{{ asset('assets/plugins/fullcalendar/fullcalendar/fullcalendar.css') }}" rel="stylesheet" type="text/css"/> -->
				<!-- <link href="{{ asset('fullCalalendar/plugins/fullcalendar/fullcalendar/fullcalendar.css') }}" rel="stylesheet" type="text/css"/> -->
				<!-- END PAGE LEVEL PLUGIN STYLES -->
				<!-- <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/1.6.4/fullcalendar.css"> -->
				<link href='{{ asset("fullcalendar/fullcalendar.css")}}' rel='stylesheet' />
				<link href='{{ asset("fullcalendar/fullcalendar.print.css")}}' rel='stylesheet' media='print' />
				
				<!-- <script src='../lib/jquery.min.js'></script> -->
				<!-- <script src='../lib/jquery-ui.custom.min.js'></script> -->


		@stop

		@section('extra')
		<link rel="stylesheet" href="{{ asset('jqw/jqx.base.css') }}" type="text/css" />
		<link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}" type="text/css" />
				<style type="text/css">
					
	body {
		margin-top: 40px;
	/*	text-align: center;*/
	/*	font-size: 14px;*/
		/*font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;*/
	}
		
	#wrap {
		width: 1100px;
		margin: 0 auto;
	}
		
	#external-events{
		float: left;
		width: 150px;
		width:100%;
		padding: 0 10px;
		border: 1px solid #ccc;
		background: #eee;
		text-align: left;
	}
	#external-orders {
		float: left;
		/*width: 150px;*/
		min-height:100px;
		width:100%;
		padding: 0 10px;
		margin-bottom:15px;
		border: 1px solid #ccc;
		background: #eee;
		text-align: left;
	}
		
	#external-events h4 {
		font-size: 16px;
		margin-top: 0;
		padding-top: 1em;
	}
		
	/*.external-event { 
		margin: 2px 2px;
		padding: 5px 4px;
		background: #3366CC;
		color: #fff;
		width:44%;
		
		font-size: .85em;
		cursor: pointer;
		
		display: block;
		float: left;*/
	}
	.external-order { /* try to mimick the look of a real event */
		margin: 10px 2px;
		padding: 2px 4px;
		background: #3366CC;
		color: #fff;
		font-size: .85em;
		cursor: pointer;
		width:200px;
		float: left;
	}
	.ex_event i {
		display:none;
	}
	.ex_event:hover i {
		display:inline-block;
		
	}
	#external-events p {
		margin: 1.5em 0;
		font-size: 11px;
		color: #666;
	}
		
	#external-events p input {
		margin: 0;
		vertical-align: middle;
	}

	#calendar {
		float: left;
		width: 100%;
	}
	 #list img
        {
            width: 50px;
            height: 55px;
        }
        #list div
        {
            margin-top: -35px;
            margin-left: 80px;
        }
        .jqx-listmenu-item
        {
            
            
        }
        #sortable1, #sortable2 { list-style-type: none; margin: 0; padding: 0 0 2.5em; float: left; margin-right: 10px; }
        #sortable1 li, #sortable2 li { margin: 0 5px 5px 5px; padding: 5px; font-size: 1.2em; width: 120px; }

				</style>


		@stop

@section('page_title')
		Calendar
@stop


@section('content')
		<!-- <div id='wrap'> -->

	<div class="col-md-3">
		<div id='external-events'>
			<br>
			<div class="btn-group">
				<button data-toggle="modal" data-target="#addOrderModal" type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Order</button>
				<button data-toggle="modal" data-target="#addGroupModal" type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Group</button>
				<!-- <button data-toggle="modal" data-target="#addTruckModal" type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Truck</button> -->
				
			</div>
			<h4>Draggable Groups</h4>
			<div class="clearfix"></div>
<!-- <ul id="list" data-role="listmenu">
        <li>
            <img src="{{ asset('images/andrew.png') }}" alt="" /><div>
                Andrew Fuller</div>
            <ul data-role="listmenu">
                <li>
                    <div style="padding: 5px;" data-role="content">
                        <table>
                            <tr>
                                <td>
                                    <img width="50" height="50" src="{{ asset('images/andrew.png') }}" alt="" />
                                </td>
                                <td>
                                    <b>Andrew Fuller</b>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Title
                                </td>
                                <td>
                                    Sales Representative
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Notes
                                </td>
                                <td>
                                    "Andrew received his BTS commercial in 1974 and a Ph.D. in international marketing
                                    from the University of Dallas in 1981. He is fluent in French and Italian and reads
                                    German. He joined the company as a sales representative, was promoted to sales manager
                                    in January 1992 and to vice president of sales in March 1993. Andrew is a member
                                    of the Sales Management Roundtable, the Seattle Chamber of Commerce, and the Pacific
                                    Rim Importers Association.
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Birth Date
                                </td>
                                <td>
                                    19-Feb-52
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Hire Date
                                </td>
                                <td>
                                    14-Aug-92
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Home Phone
                                </td>
                                <td>
                                    (206) 555-9482
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Address
                                </td>
                                <td>
                                    908 W. Capital Way.
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Postal Code
                                </td>
                                <td>
                                    98401
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    City
                                </td>
                                <td>
                                    Tacoma
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Country
                                </td>
                                <td>
                                    USA
                                </td>
                            </tr>
                        </table>
                    </div>
                </li>
            </ul>
        </li>
        <li>
            <img src="{{ asset('images/anne.png') }}" alt="" /><div>
                Anne Dodsworth</div>
            <ul data-role="listmenu">
                <li>
                    <div style="padding: 5px;" data-role="content">
                        <table>
                            <tr>
                                <td>
                                    <img width="50" height="50" src="{{ asset('images/anne.png') }}" alt="" />
                                </td>
                                <td>
                                    <b>Anne Dodsworth</b>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Title
                                </td>
                                <td>
                                    Inside Sales Coordinator
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Notes
                                </td>
                                <td>
                                    Anne has a BA degree in English from St. Lawrence College. She is fluent in French
                                    and German.
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Birth Date
                                </td>
                                <td>
                                    27-Jan-66
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Hire Date
                                </td>
                                <td>
                                    15-Nov-94
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Home Phone
                                </td>
                                <td>
                                    (71) 555-5598
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Address
                                </td>
                                <td>
                                    7 Houndstooth Rd.
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Postal Code
                                </td>
                                <td>
                                    WG2 7LT
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    City
                                </td>
                                <td>
                                    London
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Country
                                </td>
                                <td>
                                    UK
                                </td>
                            </tr>
                        </table>
                    </div>
                </li>
            </ul>
        </li>
        <li>
            <img src="{{ asset('images/janet.png') }}" alt="" /><div>
                Janet Leverling</div>
            <ul data-role="listmenu">
                <li>
                    <div style="padding: 5px;" data-role="content">
                        <table>
                            <tr>
                                <td>
                                    <img width="50" height="50" src="{{ asset('images/janet.png') }}" alt="" />
                                </td>
                                <td>
                                    <b>Janet Leverling</b>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Title
                                </td>
                                <td>
                                    Sales Representative
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Notes
                                </td>
                                <td>
                                    Janet has a BS degree in chemistry from Boston College (1984). She has also completed
                                    a certificate program in food retailing management. Janet was hired as a sales associate
                                    in 1991 and promoted to sales representative in February 1992.
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Birth Date
                                </td>
                                <td>
                                    27-Jan-69
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Hire Date
                                </td>
                                <td>
                                    15-Nov-94
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Home Phone
                                </td>
                                <td>
                                    (71) 555-4444
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Address
                                </td>
                                <td>
                                    Miner Rd.
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Postal Code
                                </td>
                                <td>
                                    WG2 7LT
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    City
                                </td>
                                <td>
                                    London
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Country
                                </td>
                                <td>
                                    UK
                                </td>
                            </tr>
                        </table>
                    </div>
                </li>
            </ul>
        </li>
        <li>
            <img src="{{ asset('images/laura.png') }}" alt="" /><div>
                Laura Callahan</div>
            <ul data-role="listmenu">
                <li>
                    <div style="padding: 5px;" data-role="content">
                        <table>
                            <tr>
                                <td>
                                    <img width="50" height="50" src="{{ asset('images/laura.png') }}" alt="" />
                                </td>
                                <td>
                                    <b>Laura Callahan</b>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Title
                                </td>
                                <td>
                                    Sales Representative
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Notes
                                </td>
                                <td>
                                    Laura received a BA in psychology from the University of Washington. She has also
                                    completed a course in business French. She reads and writes French.
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Birth Date
                                </td>
                                <td>
                                    27-Jan-66
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Hire Date
                                </td>
                                <td>
                                    15-Nov-94
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Home Phone
                                </td>
                                <td>
                                    (71) 555-4444
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Address
                                </td>
                                <td>
                                    7 Houndstooth Rd.
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Postal Code
                                </td>
                                <td>
                                    WG2 7LT
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    City
                                </td>
                                <td>
                                    London
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Country
                                </td>
                                <td>
                                    UK
                                </td>
                            </tr>
                        </table>
                    </div>
                </li>
            </ul>
        </li>
        <li>
            <img src="{{ asset('images/margaret.png') }}" alt="" /><div>
                Margaret Peacock</div>
            <ul data-role="listmenu">
                <li>
                    <div style="padding: 5px;" data-role="content">
                        <table>
                            <tr>
                                <td>
                                    <img width="50" height="50" src="{{ asset('images/margaret.png') }}" alt="" />
                                </td>
                                <td>
                                    <b>Margaret Peacock</b>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Title
                                </td>
                                <td>
                                    Vice President, Sales
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Notes
                                </td>
                                <td>
                                    Margaret holds a BA in English literature from Concordia College (1958) and an MA
                                    from the American Institute of Culinary Arts (1966). She was assigned to the London
                                    office temporarily from July through November 1992.
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Birth Date
                                </td>
                                <td>
                                    19-Sep-37
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Hire Date
                                </td>
                                <td>
                                    17-Oct-93
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Home Phone
                                </td>
                                <td>
                                    (206) 555-8122
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Address
                                </td>
                                <td>
                                    4110 Old Redmond Rd.
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Postal Code
                                </td>
                                <td>
                                    98052
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    City
                                </td>
                                <td>
                                    Redmond
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Country
                                </td>
                                <td>
                                    USA
                                </td>
                            </tr>
                        </table>
                    </div>
                </li>
            </ul>
        </li>
        <li>
            <img src="{{ asset('images/michael.png') }}" alt="" /><div>
                Michael Suyama</div>
            <ul data-role="listmenu">
                <li>
                    <div style="padding: 5px;" data-role="content">
                        <table>
                            <tr>
                                <td>
                                    <img width="50" height="50" src="{{ asset('images/michael.png') }}" alt="" />
                                </td>
                                <td>
                                    <b>Michael Suyama</b>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Title
                                </td>
                                <td>
                                    Sales Representative
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Notes
                                </td>
                                <td>
                                    Michael is a graduate of Sussex University (MA, economics, 1983) and the University
                                    of California at Los Angeles (MBA, marketing, 1986). He has also taken the courses
                                    'Multi-Cultural Selling' and 'Time Management for the Sales Professional.' He is
                                    fluent in Japanese and can read and write French, Portuguese, and Spanish.
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Birth Date
                                </td>
                                <td>
                                    02-Jul-63
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Hire Date
                                </td>
                                <td>
                                    05-June-96
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Home Phone
                                </td>
                                <td>
                                    (71) 555-4848
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Address
                                </td>
                                <td>
                                    Coventry House
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Postal Code
                                </td>
                                <td>
                                    EC2 7JR
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    City
                                </td>
                                <td>
                                    London
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Country
                                </td>
                                <td>
                                    UK
                                </td>
                            </tr>
                        </table>
                    </div>
                </li>
            </ul>
        </li>
        <li>
            <img src="{{ asset('images/nancy.png') }}" alt="" /><div>
                Nancy Divolio</div>
            <ul data-role="listmenu">
                <li>
                    <div style="padding: 5px;" data-role="content">
                        <table>
                            <tr>
                                <td>
                                    <img width="50" height="50" src="{{ asset('images/nancy.png') }}" alt="" />
                                </td>
                                <td>
                                    <b>Nancy Davolio</b>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Title
                                </td>
                                <td>
                                    Sales Representative
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Notes
                                </td>
                                <td>
                                    Education includes a BA in psychology from Colorado State University in 1970. She
                                    also completed 'The Art of the Cold Call.' Nancy is a member of Toastmasters International.
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Birth Date
                                </td>
                                <td>
                                    08-Dec-48
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Hire Date
                                </td>
                                <td>
                                    01-May-92
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Home Phone
                                </td>
                                <td>
                                    (206) 555-9857
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Address
                                </td>
                                <td>
                                    507 - 20th Ave. E. Apt. 2A
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Postal Code
                                </td>
                                <td>
                                    98122
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    City
                                </td>
                                <td>
                                    Seattle
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Country
                                </td>
                                <td>
                                    USA
                                </td>
                            </tr>
                        </table>
                    </div>
                </li>
            </ul>
        </li>
        <li>
            <img src="{{ asset('images/robert.png') }}" alt="" /><div>
                Robert King</div>
            <ul data-role="listmenu">
                <li>
                    <div style="padding: 5px;" data-role="content">
                        <table>
                            <tr>
                                <td>
                                    <img width="50" height="50" src="{{ asset('images/robert.png') }}" alt="" />
                                </td>
                                <td>
                                    <b>Robert King</b>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Title
                                </td>
                                <td>
                                    Sales Representative
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Notes
                                </td>
                                <td>
                                    Robert King served in the Peace Corps and traveled extensively before completing
                                    his degree in English at the University of Michigan in 1992, the year he joined
                                    the company. After completing a course entitled 'Selling in Europe,' he was transferred
                                    to the London office in March 1993.
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Birth Date
                                </td>
                                <td>
                                    29-May-60
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Hire Date
                                </td>
                                <td>
                                    02-Jan-94
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Home Phone
                                </td>
                                <td>
                                    (71) 555-5598
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Address
                                </td>
                                <td>
                                    Winchester Way
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Postal Code
                                </td>
                                <td>
                                    RG1 9SP
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    City
                                </td>
                                <td>
                                    London
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Country
                                </td>
                                <td>
                                    UK
                                </td>
                            </tr>
                        </table>
                    </div>
                </li>
            </ul>
        </li>
        <li>
            <img src="{{ asset('images/steven.png') }}" alt="" /><div>
                Steven Buchanan</div>
            <ul data-role="listmenu">
                <li>
                    <div style="padding: 5px;" data-role="content">
                        <table>
                            <tr>
                                <td>
                                    <img width="50" height="50" src="{{ asset('images/steven.png') }}" alt="" />
                                </td>
                                <td>
                                    <b>Steven Buchanan</b>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Title
                                </td>
                                <td>
                                    Sales Manager
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Notes
                                </td>
                                <td>
                                    Steven Buchanan graduated from St. Andrews University, Scotland, with a BSC degree
                                    in 1976. Upon joining the company as a sales representative in 1992, he spent 6
                                    months in an orientation program at the Seattle office and then returned to his
                                    permanent post in London. He was promoted to sales manager in March 1993. Mr. Buchanan
                                    has completed the courses 'Successful Telemarketing' and 'International Sales Management.'
                                    He is fluent in French.
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Birth Date
                                </td>
                                <td>
                                    04-Mar-55
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Hire Date
                                </td>
                                <td>
                                    02-May-94
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Home Phone
                                </td>
                                <td>
                                    (71) 555-5598
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Address
                                </td>
                                <td>
                                    908 W. Capital Way
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Postal Code
                                </td>
                                <td>
                                    98052
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    City
                                </td>
                                <td>
                                    Redmond
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Country
                                </td>
                                <td>
                                    USA
                                </td>
                            </tr>
                        </table>
                    </div>
                </li>
            </ul>
        </li>
</ul>	 -->		
<!-- <ul id="list" data-role="listmenu">

</ul> -->
			
			<ul id="ex_events" class="list-group">
									
			</ul>
			<div class="clearfix"></div>
			<p>
				<input type='checkbox' id='drop-remove' />
				<label for='drop-remove'>remove after drop</label>
				<!-- <label  for=''>&nbsp &nbsp<a class="point" id="allOrders"> All Orders</a></label> -->
			</p>
			
			<hr>
			<!-- <h4>Draggable Trucks</h4>
			<div class="clearfix"></div>
			<ul id="ex_events" class="list-group">
				
			</ul>
			<div class="clearfix"></div>
			<p>
				<input type='checkbox' id='drop-remove' />
				<label for='drop-remove'>remove after drop</label>

			</p> -->
		</div>
	</div>
	<div class="col-md-6">
		<div id="groupOrders"></div>
		<div id='calendar'></div>
	</div>
	<div class="col-md-3">
		<div id="external-orders">
			<h4 id="ex_orders_title">Orders</h4>
			<p id="ordersError">There are no orders available</p>
			<select id="findOrders" data-live-search="true" class="selectpicker" data-size="auto" data-style="primary">
				@foreach($orders as $order)
					<option value="{{$order->id}}, {{$order->title}}">{{ $order->title }}</option>
				@endforeach
			</select>
			<div id="selectionlog">
			</div>
			<hr>
			<div id="ex_orders" data-groupId=""  style="max-height: 800px; min-height:100px;" class="connectedSortable list-group"></div>
			<hr>
			<div id="ex_orders2"  style="max-height: 800px;" class="connectedSortable list-group">
				
			</div>
		</div>
	</div>

		<div style='clear:both'></div>



<!-- 	</div> -->

@foreach($orders as $order)
		<div class="modal fade" id="order_modal_{{{$order->id}}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel_{{$order->id}}">Update Order</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Order #</label>
							<input disabled="disabled" class="form-control" id="editOrderNumber_{{$order->id}}" placeholder="Order Number" value="{{$order->number}}">
						</div>
						<div class="form-group">
							<label>Group</label> <br>
							<select class="selectpicker" id="editOrderGroup_{{$order->id}}" data-live-search="true" data-width="100%">
								@foreach($grps as $grp)
									@if($order->grp_id == $grp->id)
										<option selected="selected" value="{{$grp->id}}">{{$grp->title}}</option>
									@endif
									<option value="{{$grp->id}}">{{$grp->title}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" id="submit_order_{{$order->id}}">Save</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						
					</div>
				</div>
			</div>
		</div>
@endforeach
		
<!-- ========================== ADD ORDER ========================== -->
<div class="modal fade" id="addOrderModal" tabindex="-1" role="dialog" aria-labelledby="addOrderModal" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="addOrderModalTitle"><i class="fa fa-plus"></i> Order</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Order #</label>
					<input class="form-control" id="orderNumber" placeholder="Order Number">
				</div>
				<div class="form-group">
					<label>Customer</label> <br>
					<select class="selectpicker" id="orderCustomer" data-live-search="true" data-width="100%">
						@foreach($customers as $cust)
							<option value="{{$cust->id}}">{{$cust->company}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label>Group</label> <br>
					<select class="selectpicker" id="orderGroup" data-live-search="true" data-width="100%">
						@foreach($grps as $grp)
							<option value="{{$grp->id}}">{{$grp->title}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" id="submitOrder">Save</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>				
			</div>
		</div>
	</div>
</div>

<!-- ========================== EDIT ORDER ========================== -->
<div id="orderModals">
	
</div>
<!-- ========================== ADD GROUP ========================== -->

<div class="modal fade" id="addGroupModal" tabindex="-1" role="dialog" aria-labelledby="addOrderModal" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="addGroupModalTitle"><i class="fa fa-plus"></i> Group</h4>
			</div>
			<div class="modal-body">
				
					<div class="form-group">
						<label class="">Title</label>
						<input type="text" name="title" id="grpTitle" class="form-control">						
					</div>
				

					<div class="form-group colorpicker">
						<label>Color</label> <br>
						<select name="color" class="s1 selectpicker"  data-size="auto" id="grpColor" data-style="btn-default" data-width="100%">
		        				<option class="bg-blue" value="#15aaff">Blue</option>
		        				<option class="bg-red" value="#e02222">Red</option>
		        				<option class="bg-green" value="#35aa47">Green</option>
		        				<option class="bg-yellow" value="#ffb848">Yellow</option>
		        				<option class="bg-purple" value="#852b99">Purple</option>
		        				<option class="bg-dark" value="#555555">Dark</option>
	        				</select>
	        			</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" id="addGroup">Save</button>
				<button type="button" class="btn btn-default" data-dismiss="modal" id="cancelGroup">Close</button>
			</div>
		</div>
	</div>
</div>

<!-- ========================== EDIT GROUP ========================== -->



<!-- ========================== ADD TRUCK ========================== -->

<div class="modal fade" id="addTruckModal" tabindex="-1" role="dialog" aria-labelledby="addOrderModal" aria-hidden="true">
	<div class="modal-dialog modal-wide">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="addOrderModalTitle"><i class="fa fa-plus"></i> Order</h4>
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
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</form>
			</div>
		</div>
	</div>
</div>


		@stop
		@section('page_plugins')
		
		
		
		<!-- <script src="{{ asset('assets/plugins/fullcalendar/fullcalendar/fullcalendar.min.js') }}" type="text/javascript"></script> -->
		<script src='{{ asset("fullcalendar/lib/moment.min.js")}}'></script>
		<!-- <script src='{{ asset("fullcalendar/lib/jquery-ui.custom.min.js") }}'></script> -->
		<script src='{{ asset("fullcalendar/fullcalendar.min.js")}}'></script>

		<script type="text/javascript" src="{{ asset('jqw/demos.js') }}"></script>
		<script type="text/javascript" src="{{ asset('jqw/jqxcore.js') }}"></script>
		<script type="text/javascript" src="{{ asset('jqw/jqxdata.js') }}"></script>
		<script type="text/javascript" src="{{ asset('jqw/jqxlistmenu.js') }}"></script>
		<script type="text/javascript" src="{{ asset('jqw/jqxbuttons.js') }}"></script>
		<script type="text/javascript" src="{{ asset('jqw/jqxscrollbar.js') }}"></script>
		<script type="text/javascript" src="{{ asset('jqw/jqxlistbox.js') }}"></script>
		<script type="text/javascript" src="{{ asset('jqw/jqxdropdownlist.js') }}"></script>


		@stop
		
		@section('page_scripts')
		
		
		

<script>




	$(document).ready(function() {
		var findOrder = $("#findOrders");
		var findBox = $("#selectionlog");
		var exOrders = $("#ex_orders");
		var exGroups = $("#ex_events");
		var exOrdersTitle = $("#ex_orders_title");
		var editOrderModals = $("#orderModals");

		var modals = {
			addGroup: {
				grpTitle: 		$("#grpTitle"),
				grpColor: 		$("#grpColor"),
				get: $("#addGroupModal"),
				clear: function(){
					modals.addGroup.grpTitle.val("");
					modals.addGroup.grpColor.val("");
					
				}
			},
			addOrder: {
				get: $("#addOrderModal"),
				number: $("#orderNumber"),
				customer: $("#orderCustomer"),
				group: $("#orderGroup"),
				submit: $("#submitOrder"),
				clear: function(){
					modals.addOrder.number.val("");
					modals.addOrder.customer.val("");
					modals.addOrder.group.val("");
				}
			},
			editOrder: {

			}
		}
		

		 $( "#sortable1, #sortable2" ).sortable({
		      connectWith: ".connectedSortable"
		    }).disableSelection();
		var groups = [];
		var editTitle =		$("#editGroupModalTitle");
		var editGrpTitle = 	$("#editGrpTitle");
		var editGrpColor = 	$("#editGrpColor");
		$("#allOrders").click(function(){
			Order.all();
		})
	
		var updateGrpOrders = function(orderId, groupId, remove){
			console.log(groupId);
			$.ajax({
				type: "PUT",
				url: "{{URL::to('calendars/')}}/" + orderId,
				data: { grp_id: groupId },
				success :function(data){

					console.log(data);
					if(remove){
						$("#sortableOrder_"+orderId).remove();
					}
				}
			});
		}

		var setSortableOrders = function (){
			$( "#ex_orders, .sortable" ).sortable({
      			connectWith: ".connectedSortable",
      			forcePlaceholderSize: true,
      			receive: function(e, ui){
      				var orderId = ui.item.context.id.split("_");
      				var groupId = $("#ex_orders").attr("data-groupId");
      				console.log(orderId[1]);
      				console.log(groupId);
      				updateGrpOrders(orderId[1], groupId, false);

      			}
    			}).disableSelection();
		}
		findOrder.on('change', function(){
			var x =  findOrder.val().split(",")[1];
			var customer = x.split(" - ")[0];
			var number = x.split(" - ")[1];

			console.log(x, customer, number)
			var cut = {
				id: findOrder.val().split(",")[0],
			}
			findBox.children().remove();
			var labelelement = $("<div class='list-group sortable connectedSortable'></div>");
                  labelelement.html('<li id="sortableOrder_'+cut.id+'" class="list-group-item">'+ x +'</li>');
			findBox.html(labelelement);
			setSortableOrders();
			
		});
		var setModal = function(id, title){

			var editGroupModal = [
			'<div class="modal fade" id="editGroupModal_'+id+'" tabindex="-1" role="dialog" aria-labelledby="editGroupModal" aria-hidden="true">',
				'<div class="modal-dialog modal-sm">',
					'<div class="modal-content">',
						'<div class="modal-header">',
							'<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>',
							'<h4 class="modal-title" id="editGroupModalTitle_'+id+'">Edit '+title+' </h4>',
						'</div>',
						'<div class="modal-body">',
							'<div class="form-group">',
								'<label class="control-label">Title</label>',
								'<input type="text" name="title" id="editGrpTitle_'+id+'" class="form-control" value="'+title+'">',
							'</div>',
							'<div class="form-group colorpicker">',
								'<label>Color</label><br>',
								'<select name="color" class="s1 selectpicker"  data-size="auto" id="editGrpColor_'+id+'" data-style="btn-default" data-width="100%">',
				        				'<option class="bg-blue" value="#15aaff">Blue</option>',
				        				'<option class="bg-red" value="#e02222">Red</option>',
				        				'<option class="bg-green" value="#35aa47">Green</option>',
				        				'<option class="bg-yellow" value="#ffb848">Yellow</option>',
				        				'<option class="bg-purple" value="#852b99">Purple</option>',
				        				'<option class="bg-dark" value="#555555">Dark</option>',
			        				'</select>',
			        			'</div>',
						'</div>',
						'<div class="modal-footer">',
							'<button type="button" class="btn btn-primary updateGroupBtn" id="updateGrpBtn_'+id+'">Save</button>',
							'<button type="button" class="btn btn-default" data-dismiss="modal" id="cancelGroup">Close</button>',
							'<button type="button" class="btn btn-danger" data-dismiss="modal" id="deleteGroup_'+id+'">Delete '+title+'</button>',
						'</div>',
					'</div>',
				'</div>',
			'</div>'].join('');
			$(editGroupModal).prependTo("body");
			 $('.selectpicker').selectpicker();
		}
		var setOrderModals = function(id, title){

			var temp = [
			'<div class="modal fade" id="editOrderModal_'+id+'" tabindex="-1" role="dialog" aria-labelledby="editGroupModal" aria-hidden="true">',
				'<div class="modal-dialog modal-wide">',
					'<div class="modal-content">',
						'<div class="modal-header">',
							'<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>',
							'<h4 class="modal-title" id="editOrderModalTitle_'+id+'">Edit '+title+' </h4>',
						'</div>',
						'<div class="modal-body">',
							'<div class="form-group">',
								'<label>Order #</label>',
								'<input class="form-control" id="orderNumber_'+id+'" placeholder="Order Number">',
							'</div>',
							'<div class="form-group">',
								'<label>Customer</label> <br>',
								'<select class="selectpicker" id="orderCustomer_'+id+'" data-live-search="true">',
								'</select>',
							'</div>',
							'<div class="form-group">',
								'<label>Group</label> <br>',
								'<select class="selectpicker" id="orderGroup_'+id+'" data-live-search="true">',
								'</select>',
							'</div>',
						'</div>',
						'<div class="modal-footer">',
							'<button type="button" class="btn btn-primary updateGroupBtn" id="updateOrderBtn'+id+'">Save</button>',
							'<button type="button" class="btn btn-default" data-dismiss="modal" id="cancelOrder">Close</button>',
							'<button type="button" class="btn btn-danger" data-dismiss="modal" id="deleteOrder_'+id+'">Delete '+title+'</button>',
						'</div>',
					'</div>',
				'</div>',
			'</div>'].join('');
			$(temp).prependTo(editOrderModals);
			 $('.selectpicker').selectpicker();
		}

		var each = function(array, cb){
			for (var i = 0; i < array.length; i++) {
				cb(array[i], i, array);
			};
		}
		
		var showOrders = function (item){

			var temp = ["<div class='list-group-item'>" + item.title + " <i class='fa fa-cog pull-right' id='editOrder_",
			item.id + "' data-toggle='modal' data-target='#editOrderModal'></i> </div>"].join("");

			$(temp).prependTo("#ex_orders");

			$("#editOrder_" + item.id).click(function(){
				Order.vars.editTitle.html(item.title);
			});
		}
		

		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();
		/* initialize the external events
		-----------------------------------------------------------------*/

		
		var renderExternal = function(id){
			$('#external-events .external-event').each(function() {
			
				// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
				// it doesn't need to have a start or end

				var eventObject = {
					title: $.trim($(this).text()) // use the element's text as the event title
				};
				console.log(this);
				
				// store the Event Object in the DOM element so we can get to it later
				$(this).data('eventObject', eventObject);
				
				// make the event draggable using jQuery UI
				$(this).draggable({
					zIndex: 1000,
					revert: true,      // will cause the event to go back to its
					revertDuration: 0  //  original position after the drag
				});
				
			});
			
		}
		var renderOrders = function(){	
			$('#external-orders .external-order').each(function() {
				// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
				// it doesn't need to have a start or end
				var eventObject = {
					title: $.trim($(this).text()) // use the element's text as the event title
				};
				// store the Event Object in the DOM element so we can get to it later
				$(this).data('eventObject', eventObject);
				
				// make the event draggable using jQuery UI				
				$(this).draggable({
					zIndex: 999,
					revert: true,      // will cause the event to go back to its
					revertDuration: 0  //  original position after the drag
				});
			});
		}
	
		var renderGroups = function(id){
			$('#external-events .ex_event').each(function() {
			
				// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
				// it doesn't need to have a start or end

				var eventObject = {
					id: $(this).attr("id").split("_")[2],
					title: $.trim($(this).text()),
					allDay: 'allDay', // use the element's text as the event title
					backgroundColor: $(this).attr('data-bg'),
					borderColor: $(this).attr('data-bg')
				};
				console.log(this);
				
				// store the Event Object in the DOM element so we can get to it later
				$(this).data('eventObject', eventObject);
				
				// make the event draggable using jQuery UI
				$(this).draggable({
					zIndex: 1000,
					revert: true,      // will cause the event to go back to its
					revertDuration: 0  //  original position after the drag
				});
				
			});		
		}
		var setGroup = function (item){
			setModal(item.id, item.title);
			var color = [];
			if(item.backgroundColor){
				color = "#ffffff";
			} else {
				color = "#000000";
			}
			var temp = [
				"<div id='ex_grp_" + item.id + "' data-title="+item.title+" data-bg="+item.backgroundColor+" class='ex_event list-group-item' style='cursor: pointer; background-color:" + item.backgroundColor + "; color: "+color+"'>",
					item.title,
			 		" <i class='fa fa-cog pull-right' id='editGroup_" + item.id + "' data-toggle='modal' data-target='#editGroupModal_"+item.id+"'></i>",
				"</div>"].join("");
			$(temp).prependTo(exGroups);
				

			$("#ex_grp_"+item.id).click(function(){
				//console.log(item.id);
				Order.get(item.id, item.title);
			});
			$("#updateGrpBtn_"+item.id).click(function(){
				Group.update(item.id, $("#editGrpTitle_" + item.id).val(), $("#editGrpColor_" + item.id).val());
			});
			$("#deleteGroup_" + item.id).click(function(){
				Group.delete(item.id);
			});
			setSortableOrders();
			//$('#ex_events').jqxListMenu({autoSeparators: true, enableScrolling: false, showHeader: true, width: '100%', placeHolder: 'Find contact...' });
		}
		var setOrder = function (item){
			//setOrderModals(item.id, item.title);

			var temp = ["<div style='cursor: move;' id='sortableOrder_"+item.id+"' class='list-group-item'>" + item.title,
			" <i style='color:red; cursor: pointer;' class='fa fa-times pull-right' id='removeOrder_" + item.id + "'></i>",
			"<i style='cursor: pointer;' class='fa fa-edit pull-right' id='clickOrder_'+"+item.id+" data-toggle='modal' data-target='#order_modal_"+item.id+"'></i></div>"
			].join("");
			$(temp).prependTo("#ex_orders");
			//" <i class='fa fa-cog pull-right' id='editOrder_" + item.id + "' data-toggle='modal' data-target='#editOrderModal'></i> </div>"].join("");

			$("#removeOrder_" + item.id).click(function(){
				Order.removeFromGrp(item.id);
			});

			$("#editOrder_" + item.id).click(function(){
				Order.vars.editTitle.html(item.title);
			});
			$("#submit_order_" + item.id).click(function(){
				Order.update(item.id, $("#editOrderNumber_" + item.id).val(), $("#editOrderGroup_"+item.id).val(), item.grp_id );
			});
		}
		var Group = {
			vars: {
				addGrp: 		$("#addGroup"),
				grpTitle: 		$("#grpTitle"),
				grpColor: 		$("#grpColor"),
				updateGrpBtn: 	$(".updateGroupBtn"),
				editTitle: 		$("#editGroupModalTitle"),
				editGrpTitle: 	$("#editGrpTitle"),
				editGrpColor: 	$("#editGrpColor")

			},
			all: function(){
				$.ajax({
					type: "GET",
					url: "{{URL::to('grps')}}",
					success: function(data){
						exGroups.children().remove();
						each(data, function(item, index, array){
							setGroup(item);
						});
						renderGroups(false);
					}
				});
				
			},
			post: function(){
				$.ajax({
					type: "POST",
					url: "{{URL::to('grps')}}",
					data: { 
						title: modals.addGroup.grpTitle.val(),
						//color: '#15aaff',
						label: "primary",
						backgroundColor: modals.addGroup.grpColor.val(),
						allDay: 'allDay'
					},
					success: function(data){
						//console.log(data);
						Group.all();
						$("#calendar").fullCalendar( 'refetchEvents' );
						modals.addGroup.get.modal("hide");
						modals.addGroup.clear();

					}
				});
			},
			update: function(id, grpTitle, grpColor){
				$.ajax({
					type: "PUT",
					url: "{{URL::to('grps')}}/" + id,
					data: { title: grpTitle, backgroundColor: grpColor },
					cache: false,
					success: function(data){
						console.log(data.data);
						//Group.all();
						var temp = " <i class='fa fa-cog pull-right' id='editGroup_" + data.data.id + "' data-toggle='modal' data-target='#editGroupModal_"+data.data.id+"'></i>";
						$("#ex_grp_" + id).html(data.data.title + temp);
						$("#ex_grp_" + id).css("background-color" , data.data.backgroundColor);
						$("#calendar").fullCalendar( 'refetchEvents' );
						$('#editGroupModal_' + data.data.id).modal('hide');


					}
				});
			},
			delete: function(groupId){
				console.log(groupId);
				var deleteGrp =  function(){
					$.ajax({
						url: "{{URL::to('grps')}}/" + groupId,
						type: "DELETE",
					});
				}
				deleteGrp();
				Group.all();
				$("#calendar").fullCalendar( 'refetchEvents' );
			}
		}
		var Order = {
			all: function(groupId){
				$.ajax({
					type: "GET",
					url: "{{URL::to('calendars/show')}}",
					success: function(data){
						exOrders.children().remove();
						exOrdersTitle.text("All Orders")
						$("#ordersError").hide();
						each(data, function (item, index, array){
							//setOrder(item);
						});
							//renderOrders();
					}
				});
			},
			get: function(groupId, groupTitle){
				if(groupId){
					$.ajax({
						type: "GET",
						url: "{{URL::to('collect/group/orders')}}/" + groupId,
						success: function(data){
							console.log(groupId);
							exOrders.children().remove();
							exOrdersTitle.text(groupTitle);
							$("#ex_orders").attr("data-groupId", groupId);
							editOrderModals.children().remove();
							each(data, function (item, index, array){								
								console.log(item);
								setOrder(item);
								$("#ordersError").hide();
							});
						}
					});
				} else {
					$("#ex_orders").html("");
					$("#ordersError").show();
				}
			},
			post: function(){
				$.ajax({
					type: "POST",
					url: "{{URL::to('orders')}}",
					data: {
						number: modals.addOrder.number.val(),
						customer_id: modals.addOrder.customer.val(),
						grp_id: modals.addOrder.group.val()
					},
					success: function(data){
						//console.log(data);
					}
				});
			},
			update: function(orderId, number, group, groupId){
				//console.log(group);
				$.ajax({
					type: "PUT",
					url: "{{URL::to('calendars')}}/" + orderId,
					data: { number: number, grp_id: group, full: 'full' },
					success: function(data){
						//console.log(data)
						if(data.grp_id !== groupId){
							$("#sortableOrder_" + orderId).remove();
						}
						$("#order_modal_" + orderId).modal("hide");
					}
				});
			},
			removeFromGrp: function(orderId){
				var groupId = " ";
				$.ajax({
					type: "PUT",
					url: "{{URL::to('calendars/')}}/" + orderId,
					data: { grp_id: groupId },
					success :function(data){
						$("#sortableOrder_"+orderId).remove();
						console.log(data);
					}
				});
			}
		}
		Group.all();
		Order.all();

		Group.vars.addGrp.click(function(){
			Group.post();
		});
		modals.addOrder.submit.click(function(){
			Order.post();
		});



		/* initialize the calendar
		-----------------------------------------------------------------*/
		
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			editable: true,
			weekends: false,
			droppable: true, // this allows things to be dropped onto the calendar !!!
			eventClick: function(event, jsEvent, view){
				console.log(event)
				Order.get(event.id, event.title);
				//console.log(jsEvent)
				//console.log(view)

			},
			drop: function( date, jsEvent, ui) { // this function is called when something is dropped
			


				// retrieve the dropped element's stored Event Object
				var originalEventObject = $(this).data('eventObject');
				
				// we need to copy it, so that multiple events don't have a reference to the same object
				var copiedEventObject = $.extend({}, originalEventObject);
				
				// assign it the date that was reported
				copiedEventObject.start = date;
				copiedEventObject.title = event.srcElement.innerText;
				var r = copiedEventObject.start._d;
				var d = String(r);
				var s = d.split(" ");
				
				var x = s[2]++;
				var da = [s[0] + " " + s[1] + " " + s[2] + " " + s[3] + " " + s[4]  +" " + s[5] + " " + s[6]].join("");
				console.log(da)
				console.log(copiedEventObject)
				console.log(copiedEventObject.id)
				//console.log(jsEvent)
				//console.log(ui)

				// render the event on the calendarfullcalendar
				// the last `true` argument determines if the event "sticks" (http://arshaw.com//docs/event_rendering/renderEvent/)
				//$('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
				
				// is the "remove after drop" checkbox checked?
				if ($('#drop-remove').is(':checked')) {
					// if so, remove the element from the "Draggable Events" list
					$(this).remove();
				}
				$.ajax({
					url: "{{URL::to('grps/')}}/" + copiedEventObject.id,
					method: "PUT",
					data: { start: da, title: copiedEventObject.title, backgroundColor: copiedEventObject.backgroundColor  },
					cache: false,
					success: function(data){
							$("#calendar").fullCalendar( 'refetchEvents' );
							console.log(data);							
					}
				});
			},
			/*drop: function (date, allDay, jsEvent, ui) { // this function is called when something is dropped
										
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
				var newstart = Date_toYMD(copiedEventObject.start)
				$.ajax({
						url: "{{URL::to('calendars/')}}/" + originalEventObject.id,
						method: "PUT",
						data: { start: newstart, title: copiedEventObject.title, backgroundColor: copiedEventObject.backgroundColor  },
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
			},*/
			eventDrop: function(event, jsEvent, ui, view) {
				var r = event._start._d;
				var d = String(r);
				var s = d.split(" ");
				
				var x = s[2]++;
				var da = [s[0] + " " + s[1] + " " + s[2] + " " + s[3] + " " + s[4]  +" " + s[5] + " " + s[6]].join("");
				//console.log(s[2], x);
				//console.log(d);
				//console.log(da);
				//console.log(jsEvent);
				//console.log(ui);
				//console.log(view);
				//	console.log( da);
				$.ajax({
					url: "{{URL::to('grps')}}/" + event.id,
					method: "PUT",
					data: { start: da, title: event.title, backgroundColor: event.backgroundColor },
					success: function(data){
						console.log(data);
					}
				});
			},
			eventSources: [
				{
					url: "{{URL::to('grps')}}",
					type:  'GET',
					data: {
						id: 1
					},
					error: function(){
						alert("There was a problem fetching the events");
					}
				}
			]
		});
		console.log($("#calendar").fullCalendar.eventSources);
		
	});

		/*jQuery(document).ready(function() {    
			
			 
			// var orders = eval({{ $orders }});
			 var title;
			 var start;
			 var newevent = [];
			 var addOrder = $("#addOrder");



			addOrder.click(function(){

		});*/
			
			

/*var Calendar = function () {


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
								//console.log(eventid);
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
										if(order.start == null || order.start == 0 || order.start == "")
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
								//hiddenDays: [ 1,3,5 ],
								weekends: false,
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
										var newstart = Date_toYMD(copiedEventObject.start)
										$.ajax({
												url: "{{URL::to('calendars/')}}/" + originalEventObject.id,
												method: "PUT",
												data: { start: newstart, title: copiedEventObject.title, backgroundColor: copiedEventObject.backgroundColor  },
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
										$("#submit_order_" + calEvent.id).click(function(){
												$.ajax({
														url: "{{URL::to('calendars/')}}/" + calEvent.id,
														method: "PUT",
														data: { start: calEvent.start, title: calEvent.title, backgroundColor: calEvent.backgroundColor, dtype_id: $("#dtype_id_" + calEvent.id).val() },
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

		};*/

//}();
	//		 Calendar.init();
			 
			
		
		</script>
		<!-- END PAGE LEVEL SCRIPTS --> 
		@stop