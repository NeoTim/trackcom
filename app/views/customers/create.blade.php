@extends('layouts.blueprint')
@section('page_title')
	Create Customer
@stop
@section('header')
	<div class="row">
		<div class="col-md-12">
			<!-- BEGIN PAGE TITLE & BREADCRUMB-->
			<blockquote><h3 class="page-title">
				Create A Customer
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
					<a href="{{ URl::to('customers') }}">Customers</a>
					<i class="fa fa-angle-right"></i>
					
				</li>
				<li>
					<a href="{{ URl::to('customers/create') }}">Create</a>
				
					
				</li>
					
			</ul>
							
		</div>
	</div>
<div class="clearfix"></div>
	<div class="row">
		<div class='col-md-12'>	
			<div class="dashboard-stat blue">
				<div class="visual">
					<i class="fa fa-plus"></i>
				</div>
				<div class="details">
					<div class="number">
						
						Create
						
					</div>
					<div class="desc">
						Customer
					</div>
				</div>
				<a href="{{ URL::to('customers/create') }}" class="more" >
				Add Documents <i class="m-icon-swapright m-icon-white"></i>
				</a>
			</div>

		</div>
	</div>	
@stop
@section('content')
<div class="col-md-6 col-md-offset-3">
	<div class='panel panel-inverse'>
		<div class="panel-heading">
			<h3 class="panel-title">Create Customer</h3>
		</div>
		<div class="panel-body">
			{{ Form::open(array('route' => 'customers.store', 'class' => 'form-horizontal')) }}
				<div class="form-body">
					<div class="form-group">
			            {{ Form::label('company', 'Company:', ['class' => 'control-label col-md-3']) }}
			            <div class="col-md-9">
			                {{ Form::text('company', null, array('class' => 'form-control')) }}
			            </div>
			        </div>

			        <div class="form-group">
			            {{ Form::label('last', 'Last Name:', ['class' => 'control-label col-md-3']) }}
			            <div class="col-md-9">
			                {{ Form::text('last', null, array('class' => 'form-control')) }}
			            </div>
			        </div>
			        <div class="form-group">
			            {{ Form::label('first', 'First Name:', ['class' => 'control-label col-md-3']) }}
			            <div class="col-md-9">
			                {{ Form::text('first', null, array('class' => 'form-control')) }}
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
			                {{ Form::text('phone', null, array('class' => 'form-control', 'id' => 'mask_phone')) }}
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
						<div class="col-md-9 col-md-offset-3">
							
						</div>
					</div>
				</div>
		</div>
		<div class="panel-footer">
			<div class="btn-group">
				{{ Form::submit('Submit', array('class' => 'btn btn-success')) }}
				<a href="{{ URL::to('customers') }}" class="btn btn-warning"><i class="fa fa-times"></i> Cancel</a>
				{{ Form::close() }}
			</div>

		</div>

	</div>
</div>

@stop

