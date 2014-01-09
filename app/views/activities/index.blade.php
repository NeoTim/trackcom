@extends('layouts.blueprint')

@section('page_styles')
<link href="{{ asset('assets/css/pages/timeline.css') }}" rel="stylesheet" type="text/css"/>
@stop

@section('page_title')
	Activity
@stop

@section('header')
	<div class="row">
		<div class="col-md-12">
			<!-- BEGIN PAGE TITLE & BREADCRUMB-->
			<blockquote><h3 class="page-title">
				Recent Activity
			</h3></blockquote>
			<ul class="page-breadcrumb breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a href="{{URL::to('/')}}">HIS</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="{{URL::to('dashboard')}}">Dashboard</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="{{ URl::to('activities') }}">Activities</a>
					
				</li>
					
			</ul>
							
		</div>
	</div>
	<div class="clearfix"></div>
	
@stop
@section('content')
	<div class="tabbable-custom">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#activities" data-toggle="tab">All Activity </a></li>
			<li><a href="#production" data-toggle="tab">Production</a></li>
			<li><a href="#orders" data-toggle="tab">Orders</a></li>
			<li><a href="#customers" data-toggle="tab">Customers</a></li>
			<li><a href="#store" data-toggle="tab">Created</a></li>
			<li><a href="#update" data-toggle="tab">Updates</a></li>
			<li><a href="#delete" data-toggle="tab">Deleted</a></li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane active fade in" id="activities">
				<ul class="timeline">
					@foreach($activities as $act)
						@if($act->type == 'delete')
							<li class="timeline-red">
						@else
							<li class="timeline-{{$act->color}}">
						@endif
								<div class="timeline-time">
									<span class="date">
										{{ date("F d Y",strtotime($act->created_at)) }}
									</span>
									<span class="time">
										{{ date("h:i a",strtotime($act->created_at)) }}

									</span>

								</div>
								<div class="timeline-icon">
									<i class="fa fa-{{{$act->icon}}}"></i>
								</div>
								<div class="timeline-body">
									<h2>{{{$act->title}}} 
										@if($act->color == 'purple' OR $act->color == 'red' OR $act->color == 'grey' OR $act->type == 'delete')
										<small style="color:#dddddd"> {{{$act->subject}}} </small>
										@else
										<small> {{{$act->subject}}} </small>
										@endif
									</h2>
									<div class="timeline-content">
										
										<p>{{{$act->message}}}</p>
									</div>
									
								</div>
							</li>
					@endforeach
					
				</ul>
			</div>
			<div class="tab-pane fade" id="production">
				<ul class="timeline">
					@foreach($production_activities as $prod)
						@if($prod->type == 'delete')
							<li class="timeline-red">
						@elseif($prod->type == 'store')
							<li class="timeline-blue">
						@else
							<li class="timeline-{{$prod->color}}">
						@endif
						<div class="timeline-time">
							<span class="date">

								{{ date("F d Y",strtotime($prod->created_at)) }}
							</span>
							<span class="time">
								{{ date("h:i a",strtotime($prod->created_at)) }}

							</span>

						</div>
						<div class="timeline-icon">
							<i class="fa fa-{{{$prod->icon}}}"></i>
						</div>
						<div class="timeline-body">
							<h2>{{{$prod->title}}} 
								@if($prod->type == 'delete')
								<small style="color:#dddddd"> {{{$prod->subject}}} </small>
								@else
								<small> {{{$prod->subject}}} </small>
								@endif
							</h2>
							<div class="timeline-content">
								
								<p>{{{$prod->message}}}</p>
							</div>
							
						</div>
					</li>
					@endforeach
					
				</ul>
			</div>
			
			<div class="tab-pane fade" id="orders">
				<ul class="timeline">
					@foreach($order_activities as $order)
					@if($order->type == 'delete')
							<li class="timeline-red">
						@else
							<li class="timeline-{{$order->color}}">
						@endif
						<div class="timeline-time">
							<span class="date">
								{{ date("F d Y",strtotime($order->created_at)) }}
							</span>
							<span class="time">
								{{ date("h:i a",strtotime($order->created_at)) }}

							</span>

						</div>
						<div class="timeline-icon">
							<i class="fa fa-{{{$order->icon}}}"></i>
						</div>
						<div class="timeline-body">
							<h2>{{{$order->title}}} 
								@if($order->color == 'purple' OR $order->color == 'red' OR $order->color == 'grey')
								<small style="color:#dddddd"> {{{$order->subject}}} </small>
								@else
								<small> {{{$order->subject}}} </small>
								@endif
							</h2>
							<div class="timeline-content">
								
								<p>{{{$order->message}}}</p>
							</div>
							
						</div>
					</li>
					@endforeach
					
				</ul>
			</div>

			<div class="tab-pane fade" id="customers">
				<ul class="timeline">
					@foreach($customer_activities as $customer)
					<li class="timeline-{{$customer->color}}">
						<div class="timeline-time">
							<span class="date">
								{{ date("F d Y",strtotime($customer->created_at)) }}
							</span>
							<span class="time">
								{{ date("h:i a",strtotime($customer->created_at)) }}

							</span>

						</div>
						<div class="timeline-icon">
							<i class="fa fa-{{{$customer->icon}}}"></i>
						</div>
						<div class="timeline-body">
							<h2>{{{$customer->title}}} 
								@if($customer->color == 'purple' OR $customer->color == 'red' OR $customer->color == 'grey')
								<small style="color:#dddddd"> {{{$customer->subject}}} </small>
								@else
								<small> {{{$customer->subject}}} </small>
								@endif
							</h2>
							<div class="timeline-content">
								
								<p>{{{$customer->message}}}</p>
							</div>
							
						</div>
					</li>
					@endforeach
					
				</ul>
			</div>
			<div class="tab-pane fade" id="store">
				<ul class="timeline">
					@foreach($stores as $store)
					<li class="timeline-{{$store->color}}">
						<div class="timeline-time">
							<span class="date">
								{{ date("F d Y",strtotime($store->created_at)) }}
							</span>
							<span class="time">
								{{ date("h:i a",strtotime($store->created_at)) }}

							</span>

						</div>
						<div class="timeline-icon">
							<i class="fa fa-{{{$store->icon}}}"></i>
						</div>
						<div class="timeline-body">
							<h2>{{{$store->title}}} 
								@if($store->color == 'purple' OR $store->color == 'red' OR $store->color == 'grey')
								<small style="color:#dddddd"> {{{$store->subject}}} </small>
								@else
								<small> {{{$store->subject}}} </small>
								@endif
							</h2>
							<div class="timeline-content">
								
								<p>{{{$store->message}}}</p>
							</div>
							
						</div>
					</li>
					@endforeach
					
				</ul>
			</div>
			<div class="tab-pane fade" id="update">
				<ul class="timeline">
					@foreach($updates as $update)
					<li class="timeline-{{$update->color}}">
						<div class="timeline-time">
							<span class="date">
								{{ date("F d Y",strtotime($update->created_at)) }}
							</span>
							<span class="time">
								{{ date("h:i a",strtotime($update->created_at)) }}

							</span>

						</div>
						<div class="timeline-icon">
							<i class="fa fa-{{{$update->icon}}}"></i>
						</div>
						<div class="timeline-body">
							<h2>{{{$update->title}}} 
								@if($update->color == 'purple' OR $update->color == 'red' OR $update->color == 'grey')
								<small style="color:#dddddd"> {{{$update->subject}}} </small>
								@else
								<small> {{{$update->subject}}} </small>
								@endif
							</h2>
							<div class="timeline-content">
								
								<p>{{{$update->message}}}</p>
							</div>
							
						</div>
					</li>
					@endforeach
					
				</ul>
			</div>
			<div class="tab-pane fade" id="delete">
				<ul class="timeline">
					@foreach($deletes as $delete)
					<li class="timeline-{{$delete->color}}">
						<div class="timeline-time">
							<span class="date">
								{{ date("F d Y",strtotime($delete->created_at)) }}
							</span>
							<span class="time">
								{{ date("h:i a",strtotime($delete->created_at)) }}

							</span>

						</div>
						<div class="timeline-icon">
							<i class="fa fa-{{{$delete->icon}}}"></i>
						</div>
						<div class="timeline-body">
							<h2>{{{$delete->title}}} 
								@if($delete->color == 'purple' OR $delete->color == 'red' OR $delete->color == 'grey')
								<small style="color:#dddddd"> {{{$delete->subject}}} </small>
								@else
								<small> {{{$delete->subject}}} </small>
								@endif
							</h2>
							<div class="timeline-content">
								
								<p>{{{$delete->message}}}</p>
							</div>
							
						</div>
					</li>
					@endforeach
					
				</ul>
			</div>
		</div>
	</div>
	
@stop
