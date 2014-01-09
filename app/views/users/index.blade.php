@extends('layouts.blueprint')
@section('page_title')
	Users
@stop
@section('header')
	<div class="row">
		<div class="col-md-12">
			<!-- BEGIN PAGE TITLE & BREADCRUMB-->
			<blockquote><h3 class="page-title">
				Users
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
					<a href="{{ URl::to('users') }}">customers</a>
					
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
						
						{{count($users)}}
						
					</div>
					<div class="desc">
						Total Users
					</div>
				</div>
				<a href="{{ URL::to('users') }}" class="more" >
				Users <i class="m-icon-swapright m-icon-white"></i>
				</a>
			</div>

		</div>
	</div>	
@stop


@section('content')
	

				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover table-full-width dataTable" id="sample_2" aria-describedby="sample_2_info" style="width: 1060px;">
						<thead>
							<th>User</th>
							<th>Last Name</th>
							<th>First Name</th>
							<th>Email</th>
							<th>Status</th>
							<th style="max-width:200px; min-width:200px; width:200px;">Options</th>
						</thead>
						<tbody>

							@foreach ($users as $user)
								<tr>
									<td>{{ $user->username }} </td>
									<td>{{ $user->last_name }} </td>
									<td>{{ $user->first_name }} </td>
									<td><a href="{{$user->email}}">{{ $user->email }}</a></td>
									<td>{{ $user->status }} </td>
									<td>
										<div class="btn-group">
											<button class="btn btn-default" type="button" onClick="location.href='{{ action('UserController@show', array($user->id)) }}'">View</button> 
											<button class="btn btn-danger" type="submit" data-toggle="modal" data-target="#delete_modal_{{{$user->id}}}">Delete</button>
										</div>
									</td>
								</tr>
								<div class="modal fade" id="delete_modal_{{{$user->id}}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								  <div class="modal-dialog modal-wide">
								    <div class="modal-content">
								      <div class="modal-header">
								      	{{ Form::open(array('id' => 'delete_form', 'method' => 'DELETE', 'route' => array('users.destroy', $user->id))) }}
								        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								        <h2 class="modal-title" id="myModalLabel">Confirm Delete</h2>
								      </div>
														
								      <div class="modal-body">	                        	
								      	<h4 id="delete_message">Are you sure you want to delete <strong>{{ $user->email }}</strong></h4>
								      </div>
								      <div class="modal-footer">
								      	<div class="btn-group">
											{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
								        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								        </div>
										{{ Form::close() }}
								      </div>
								    </div><!-- /.modal-content -->
								  </div><!-- /.modal-dialog -->
								</div><!-- /.modal -->		
							@endforeach
						</tbody>
					</table>
				</div>
			



@stop


@section('page_scripts')

	
	<script type="text/javascript">
	

	$.each($(users), function(i){
		var user = users[i];
		var DUbtn 	=	"#DUbtn_" + user.id;

		$(DUbtn).click(function(){
			$("#delete_Modal form").attr('action', '{{URL::to("users")}}/' + user.id);
			$("#delete_message").text("Are you sure you want to delete " + user.email);
		});
	});


	</script>
@stop