@extends('layouts.blueprint')


@section('header')
	<div class="row">
		<div class="col-md-12">
			<!-- BEGIN PAGE TITLE & BREADCRUMB-->
			<blockquote><h3 class="page-title">
				Customers
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
					
				</li>
					
			</ul>
							
		</div>
	</div>
<div class="clearfix"></div>
	<div class="row">
		<div class='col-md-12'>	
			<div class="dashboard-stat green">
				<div class="visual">
					<i class="fa fa-group"></i>
				</div>
				<div class="details">
					<div class="number">
						
						{{count($customers)}}
						
					</div>
					<div class="desc">
						Total Customers
					</div>
				</div>
				<a href="{{ URL::to('customers/create') }}" class="more" >
				Add Customer <i class="m-icon-swapright m-icon-white"></i>
				</a>
			</div>

		</div>
	</div>	
@stop
@section('content')
	<div class="well">
						
						
		<p>{{ link_to_route('contacts.create', 'Add new contact') }}</p>
		
		@if ($contacts->count())
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover table-full-width dataTable" id="sample_2" aria-describedby="sample_2_info" style="width: 1060px;">
				<thead>
					<tr>
						<th>Customer_id</th>
						<th>Category_id</th>
						<th>First</th>
						<th>Last</th>
						<th>Title</th>
						<th>Phone</th>
						<th>Email</th>
						<th>Address</th>
						<th>Address2</th>
						<th>City</th>
						<th>State</th>
					</tr>
				</thead>
		
				<tbody>
					@foreach ($contacts as $contact)
						<tr>
							<td>{{{ $contact->customer_id }}}</td>
							<td>{{{ $contact->category_id }}}</td>
							<td>{{{ $contact->first }}}</td>
							<td>{{{ $contact->last }}}</td>
							<td>{{{ $contact->title }}}</td>
							<td>{{{ $contact->phone }}}</td>
							<td>{{{ $contact->email }}}</td>
							<td>{{{ $contact->address }}}</td>
							<td>{{{ $contact->address2 }}}</td>
							<td>{{{ $contact->city }}}</td>
							<td>{{{ $contact->state }}}</td>
		                    <td>{{ link_to_route('contacts.edit', 'Edit', array($contact->id), array('class' => 'btn btn-info')) }}</td>
		                    <td>
		                        {{ Form::open(array('method' => 'DELETE', 'route' => array('contacts.destroy', $contact->id))) }}
		                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
		                        {{ Form::close() }}
		                    </td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		@else
			There are no contacts
		@endif
	</div>
@stop
