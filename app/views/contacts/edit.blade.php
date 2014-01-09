@extends('layouts.blueprint')
@section('page_title')
	Update {{$contact->first}} {{$contact->last}}
@stop
@section('header')
	<div class="row">
		<div class="col-md-12">
			<!-- BEGIN PAGE TITLE & BREADCRUMB-->
			<blockquote><h3 class="page-title">
				Edit: {{{$contact->first . ' ' . $contact->last}}}
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
					<a href="{{ URl::to('customers') }}">customers</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="{{ URl::to('customers/' . $contact->customer_id) }}">{{ $contact->customer->company }}</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="{{ URl::to('customers/' . $contact->customer_id) }}">{{ $contact->first . ' ' . $contact->last }}</a>
					
				</li>
					
			</ul>
							
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="row">
		<div class='col-md-12'>	
			<div class="dashboard-stat yellow">
				<div class="visual">
					<i class="fa fa-edit"></i>
				</div>
				<div class="details">
					<div class="number">
						
						{{{$contact->first . ' ' . $contact->last}}}
					</div>
					<div class="desc">
						{{{$contact->phone}}}
					</div>
				</div>
				<a href="{{ URl::to('customers/' . $contact->customer_id) }}" class="more">
				Back to {{{$contact->customer->company}}} <i class="m-icon-swapright m-icon-white"></i>
				</a>
			</div>

		</div>
	</div>	
@stop
@section('content')
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-inverse">
			<div class="panel-heading">
				<h3 class="panel-title">Edit Contact</h3>
			</div>
			<div class="panel-body">
				{{ Form::model($contact, array('method' => 'PATCH', 'class' => 'form-horizontal', 'route' => array('contacts.update', $contact->id))) }}

				<div class="form-body">
					{{Form::hidden('customer_id', null)}}
			        <div class="form-group">
			            {{ Form::label('first', 'First:', ['class' => 'control-label col-md-3']) }}
			            <div class="col-md-9">
			                {{ Form::text('first', null, array('class' => 'form-control')) }}
			            </div>
			        </div>

			        <div class="form-group">
			            {{ Form::label('last', 'Last:', ['class' => 'control-label col-md-3']) }}
			            <div class="col-md-9">
			                {{ Form::text('last', null, array('class' => 'form-control')) }}
			            </div>
			        </div>

			        <div class="form-group">
			            {{ Form::label('title', 'Title:', ['class' => 'control-label col-md-3']) }}
			            <div class="col-md-9">
			                {{ Form::text('title', null, array('class' => 'form-control')) }}
			            </div>
			        </div>

			        <div class="form-group">
			            {{ Form::label('phone', 'Phone:', ['class' => 'control-label col-md-3']) }}
			            <div class="col-md-9">
			                {{ Form::text('phone', null, array('class' => 'form-control', 'id' => 'mask_phone')) }}
			            </div>
			        </div>

			        <div class="form-group">
			            {{ Form::label('email', 'Email:', ['class' => 'control-label col-md-3']) }}
			            <div class="col-md-9">
			                {{ Form::text('email', null, array('class' => 'form-control')) }}
			            </div>
			        </div>

			        <div class="form-group">
			            {{ Form::label('address', 'Address:', ['class' => 'control-label col-md-3']) }}
			            <div class="col-md-9">
			                {{ Form::text('address', null, array('class' => 'form-control')) }}
			            </div>
			        </div>

			        <div class="form-group">
			            {{ Form::label('address2', 'Address2:', ['class' => 'control-label col-md-3']) }}
			            <div class="col-md-9">
			                {{ Form::text('address2', null, array('class' => 'form-control')) }}
			            </div>
			        </div>

			        <div class="form-group">
			            {{ Form::label('city', 'City:', ['class' => 'control-label col-md-3']) }}
			            <div class="col-md-9">
			                {{ Form::text('city', null, array('class' => 'form-control')) }}
			            </div>
			        </div>

			        <div class="form-group">
			            {{ Form::label('state', 'State:', ['class' => 'control-label col-md-3']) }}
			            <div class="col-md-9">
			                {{ Form::text('state', null, array('class' => 'form-control')) }}
			            </div>
			        </div>

					
				</div>

			</div>
			<div class="panel-footer">
				<div class="btn-group">
					{{ Form::submit('Update', array('class' => 'btn btn-success')) }}
					{{ link_to_route('customers.show', 'Cancel', $contact->customer_id, array('class' => 'btn btn-warning')) }}
					{{Form::close()}}
				</div>
			</div>
		</div>

			
						
	</div>
@stop
