@extends('layouts.blueprint')
@section('page_title')
    @if(isset($user->first_name))
                {{$user->first_name}} {{$user->last_name}}
            @else
            {{$user->username}}
            @endif
@stop
{{-- Web site Title --}}
@section('title')
@parent
Home
@stop

{{-- Content --}}


@section('content')
			
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-inverse">
				  <div class="panel-heading">
						<h3 class="panel-title">Account Profile</h3>
				  </div>
				  <div class="panel-body">
						<div class="col-md-8">
						    @if ($user->first_name)
						    	<p><strong>First Name:</strong> {{ $user->first_name }} </p>
							@endif
							@if ($user->last_name)
						    	<p><strong>Last Name:</strong> {{ $user->last_name }} </p>
							@endif
						    <p><strong>Email:</strong> {{ $user->email }}</p>
						    <hr>
						    <h4>Group Memberships:</h4>
							<?php $userGroups = $user->getGroups(); ?>
							<div class="well">
							    <ul>
							    	@if (count($userGroups) >= 1)
								    	@foreach ($userGroups as $group)
											<li>{{ $group['name'] }}</li>
										@endforeach
									@else 
										<li>No Group Memberships.</li>
									@endif
							    </ul>
							</div>
							
							

							
						</div>
						<div class="col-md-4">
							<p><em>Account created: {{ $user->created_at }}</em></p>
							<p><em>Last Updated: {{ $user->updated_at }}</em></p>
							
							<button class="btn btn-info" type="button" onClick="location.href='{{ action('UserController@edit', array($user->id)) }}'">Edit</button> 
							@if ($user->status != 'Suspended')
								<button class="btn btn-warning" type="button" onClick="location.href='{{ route('suspendUserForm', array($user->id)) }}'">Suspend</button> 
							@else
								<button class="btn btn-success" type="button" onClick="location.href='{{ action('UserController@unsuspend', array($user->id)) }}'">Un-Suspend</button> 
							@endif
							@if ($user->status != 'Banned')
								<button class="btn btn-danger" type="button" onClick="location.href='{{ action('UserController@ban', array($user->id)) }}'">Ban</button> 
							@else
								<button class="btn btn-success" type="button" onClick="location.href='{{ action('UserController@unban', array($user->id)) }}'">Un-Ban</button> 
							@endif

							@if($user->activated != 1)
								<button class="btn btn-info" type="button" onClick="location.href='{{ action('UserController@activate', array($user->id, $user->activation_code)) }}'">Activate</button> 
							@endif
						</div>
				  </div>
			</div>
		</div>
		
			

@stop

