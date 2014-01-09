@extends('layouts.blueprint')

@section('page_title')
	{{$entry->sku}} for Order - {{$order->number}}
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
									{{ $entry->id }}
								</div>
								<div class="desc">
									Entry
								</div>
							</div>
							<a href="{{ URL::to('entries') }}" class="more">
							View Entries <i class="m-icon-swapright m-icon-white"></i>
							</a>
						</div>
				</div>
			</div>
				
			<div class="clearfix">
			</div>
			<div class="row">
				<div class='col-md-12'>
					<div class='well'>

	
						<p>{{ link_to_route('entries.index', 'Return to all entries') }}</p>
	
						<table class="table table-striped table-bordered table-hover table-full-width dataTable" id="sample_2" aria-describedby="sample_2_info" style="width: 1060px;">
							<thead>
								<tr>
									<th>Order_id</th>
									<th>Ptype_id</th>
									<th>Pmethod_id</th>
									<th>Sku</th>
									<th>Batch</th>
									<th>Tank</th>
									<th>Container1</th>
									<th>Container2</th>
									<th>Container3</th>
									<th>Qty1</th>
									<th>Qty2</th>
									<th>Qty3</th>
									<th>Desc1</th>
									<th>Desc2</th>
									<th>Desc3</th>
									<th>Status</th>
									<th>Color</th>
									<th>Msds</th>
								</tr>
							</thead>
	
							<tbody>
								<tr>
									<td>{{{ $entry->order_id }}}</td>
									<td>{{{ $entry->ptype_id }}}</td>
									<td>{{{ $entry->pmethod_id }}}</td>
									<td>{{{ $entry->sku }}}</td>
									<td>{{{ $entry->batch }}}</td>
									<td>{{{ $entry->tank }}}</td>
									<td>{{{ $entry->container1 }}}</td>
									<td>{{{ $entry->container2 }}}</td>
									<td>{{{ $entry->container3 }}}</td>
									<td>{{{ $entry->qty1 }}}</td>
									<td>{{{ $entry->qty2 }}}</td>
									<td>{{{ $entry->qty3 }}}</td>
									<td>{{{ $entry->desc1 }}}</td>
									<td>{{{ $entry->desc2 }}}</td>
									<td>{{{ $entry->desc3 }}}</td>
									<td>{{{ $entry->status }}}</td>
									<td>{{{ $entry->color }}}</td>
									<td>{{{ $entry->msds }}}</td>
				                    <td>{{ link_to_route('entries.edit', 'Edit', array($entry->id), array('class' => 'btn btn-info')) }}</td>
				                    <td>
				                        {{ Form::open(array('method' => 'DELETE', 'route' => array('entries.destroy', $entry->id))) }}
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
