@extends('layouts.blueprint')
@section('page_title')
	{{$contact->first}} {{$contact->first}}
@stop

@section('content')
	<div class="page-content-wrapper">
		<div class="page-content">
			
			
			<div class="clearfix">
			</div>
			<div class="row">
				<div class='col-md-12'>
			
						<div class="dashboard-stat green">
							<div class="visual">
								<i class="fa fa-eye"></i>
							</div>
							<div class="details">
								<div class="number">
									{{ $contact->id }}
								</div>
								<div class="desc">
									Contact
								</div>
							</div>
							<a href="{{ URL::to('contacts') }}" class="more">
							View Contacts <i class="m-icon-swapright m-icon-white"></i>
							</a>
						</div>
				</div>
			</div>
				
			<div class="clearfix">
			</div>
			<div class="row">
				<div class='col-md-12'>
					<div class='well'>

	
						<p>{{ link_to_route('contacts.index', 'Return to all contacts') }}</p>
	
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
							</tbody>
						</table>	
						
					</div>
				</div>
			</div>
		</div>
	</div>
@stop
