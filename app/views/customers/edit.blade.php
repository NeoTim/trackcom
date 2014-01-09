@extends('layouts.blueprint')
@section('page_title')
	Update {{$customer->company}}
@stop
@section('header')
	<div class="row">
		<div class="col-md-12">
			<!-- BEGIN PAGE TITLE & BREADCRUMB-->
			<blockquote><h3 class="page-title">
				{{{$customer->company}}}
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
					<a href="{{ URl::to('customers/' . $customer->id) }}">{{ $customer->company }}</a>
				
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
						
						{{$customer->company}}
					</div>
					<div class="desc">
						{{$customer->name}}
					</div>
				</div>
				<a href="{{ URL::to('customers/') }}" class="more">
				View Customers <i class="m-icon-swapright m-icon-white"></i>
				</a>
			</div>

		</div>
	</div>	
@stop
@section('content')
	
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-inverse ">
				<div class="panel-heading">
					<h3 class="panel-title">Edit Customer</h3>
				</div>
				<div class="panel-body">
					{{ Form::model($customer, array('method' => 'PATCH', 'class' => 'form-horizontal', 'route' => array('customers.update', $customer->id))) }}
						
					<div class="form-body">
						<div class="form-group">
				            {{ Form::label('company', 'Company:', ['class' => 'control-label col-md-3']) }}
				            <div class="col-md-9">
				                {{ Form::text('company', null, array('class' => 'form-control')) }}
				            </div>
				        </div>

				        <div class="form-group">
				            {{ Form::label('first', 'First Name:', ['class' => 'control-label col-md-3']) }}
				            <div class="col-md-9">
				                {{ Form::text('first', null, array('class' => 'form-control')) }}
				            </div>
				        </div>

				        <div class="form-group">
				            {{ Form::label('last', 'Last Name:', ['class' => 'control-label col-md-3']) }}
				            <div class="col-md-9">
				                {{ Form::text('last', null, array('class' => 'form-control')) }}
				            </div>
				        </div>

				        <div class="form-group">
				            {{ Form::label('email', 'Email:', ['class' => 'control-label col-md-3']) }}
				            <div class="col-md-9">
				                {{ Form::email('email', null, array('class' => 'form-control')) }}
				            </div>
				        </div>

				        <div class="form-group">
				            {{ Form::label('phone', 'Phone:', ['class' => 'control-label col-md-3']) }}
				            <div class="col-md-9">
				                {{ Form::text('phone', null, array('class' => 'form-control')) }}
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

				        <div class="form-group">
				            {{ Form::label('zip', 'Zip:', ['class' => 'control-label col-md-3']) }}
				            <div class="col-md-9">
				                {{ Form::text('zip', null, array('class' => 'form-control')) }}
				            </div>
				        </div>

						<div class="form-group">
							<div class="col-md-9 col-md-offset-3 btn-group">
								
							</div>
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<div class="btn-group">
						{{ Form::submit('Submit', array('class' => 'btn btn-success')) }}						
						<a href="{{ URL::route('customers.show', $customer->id) }}" class="btn btn-warning">Cancel</a>
						{{Form::close()}}
					</div>
				</div>
			</div>

				
							
		</div>

	
@stop

