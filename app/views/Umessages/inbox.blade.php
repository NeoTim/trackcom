<table id="inbox_table_2" class="table table-list-search table-striped table-advance table-hover dataTable sample_editable_1" aria-describedby="inbox_info_2">
<thead>
<tr>
	<th ><input type="checkbox" class="mail-checkbox"></th>
	<th ><i class="fa fa-star inbox-started"></i></th>
	<th>Name</th>
	<th>Subject</th>
	<th>Date</th>
	<!-- <th colspan="3">
		<input type="checkbox" class="mail-checkbox mail-group-checkbox">
		<div class="btn-group">
			<a class="btn btn-sm blue" href="#" data-toggle="dropdown"> More <i class="fa fa-angle-down"></i>
			</a>
			<ul class="dropdown-menu">
				<li>
					<a href="#"><i class="fa fa-pencil"></i> Mark as Read</a>
				</li>
				<li>
					<a href="#"><i class="fa fa-ban"></i> Spam</a>
				</li>
				<li class="divider">
				</li>
				<li>
					<a href="#"><i class="fa fa-trash-o"></i> Delete</a>
				</li>
			</ul>
		</div>
	</th>
	<th class="pagination-control" colspan="3">
		<span class="pagination-info">
			 1-30 of 789
		</span>
		<a class="btn btn-sm blue"><i class="fa fa-angle-left"></i></a>
		<a class="btn btn-sm blue"><i class="fa fa-angle-right"></i></a>
	</th> -->
</tr>
</thead>
<tbody>

	@foreach($umessages as $msg)
		@if($msg->read == 0)
			<tr class="unread">
		@else
			<tr>
		@endif
				<td class="inbox-small-cells">
					<input type="checkbox" class="mail-checkbox">
				</td>
				<td class="inbox-small-cells">
				@if($msg->flag == 1)
					<i class="fa fa-star inbox-started"></i>
				@else
					<i class="fa fa-star"></i>
				@endif
				</td>
				<td class="view-message hidden-xs">
					 {{$msg->from_user}}
				</td>
				<td class="view-message ">
					 {{Str::limit($msg->subject, $limit = 100, $end = '...')}}
				</td>
				
				<td class="view-message text-right">
					 {{ date("F d",strtotime($msg->created_at)) }}
				</td>
			</tr>
			
		
	@endforeach

</tbody>
</table>