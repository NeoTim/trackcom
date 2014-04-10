@extends('layouts.blueprint')
@section('page_title')
    Update @if(isset($user->first_name))
                {{$user->first_name}} {{$user->last_name}}
            @else
            {{$user->username}}
            @endif
@stop

   
@section('content')
                
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h3 class="panel-title">Update Your Account</h3>
                </div>

                <div class="panel-body">
                    
                    {{ Form::open(array(
                        'action' => array('UserController@update', $user->id), 
                        'method' => 'put',
                        'class' => 'form-horizontal',
                        'role' => 'form'
                        )) }}
                        <div class="form-body">
                            <div class="form-group {{ ($errors->has('firstName')) ? 'has-error' : '' }}" for="firstName">
                                {{ Form::label('edit_firstName', 'First Name', array('class' => 'col-sm-2 control-label')) }}
                                <div class="col-sm-10">
                                  {{ Form::text('firstName', $user->first_name, array('class' => 'form-control', 'placeholder' => 'First Name', 'id' => 'edit_firstName'))}}
                                </div>
                                {{ ($errors->has('firstName') ? $errors->first('firstName') : '') }}                
                            </div>


                            <div class="form-group {{ ($errors->has('lastName')) ? 'has-error' : '' }}" for="lastName">
                                {{ Form::label('edit_lastName', 'Last Name', array('class' => 'col-sm-2 control-label')) }}
                                <div class="col-sm-10">
                                  {{ Form::text('lastName', $user->last_name, array('class' => 'form-control', 'placeholder' => 'Last Name', 'id' => 'edit_lastName'))}}
                                </div>
                                {{ ($errors->has('lastName') ? $errors->first('lastName') : '') }}                
                            </div>

                            @if (Sentry::getUser()->hasAccess('admin'))
                            <div class="form-group">
                                {{ Form::label('edit_memberships', 'Group Memberships', array('class' => 'col-sm-2 control-label'))}}
                                <div class="col-sm-10">
                                    @foreach ($allGroups as $group)
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="groups[{{ $group->id }}]" value='1' 
                                            {{ (in_array($group->name, $userGroups) ? 'checked="checked"' : '') }} > {{ $group->name }}
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                            
                            @endif

                        </div>
                </div>
                <div class="panel-footer">
                    <div class="btn-group">
                        {{ Form::hidden('id', $user->id) }}
                        {{ Form::submit('Submit', array('class' => 'btn btn-primary'))}}
                        <a href="{{URL::route('users.show', $user->id)}}" class="btn btn-default">Cancel</a>
                    {{ Form::close()}}
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h3 class="panel-title">Change Password</h3>
                </div>

                <div class="panel-body">

                    {{ Form::open(array(
                    'action' => array('UserController@change', $user->id), 
                    'class' => 'form-inline', 
                    'role' => 'form'
                    )) }}
                    <div class="form-body">
                        <div class="form-group {{ $errors->has('oldPassword') ? 'has-error' : '' }}">
                            {{ Form::label('oldPassword', 'Old Password', array('class' => 'sr-only')) }}
                            {{ Form::password('oldPassword', array('class' => 'form-control', 'placeholder' => 'Old Password')) }}
                        </div>

                        <div class="form-group {{ $errors->has('newPassword') ? 'has-error' : '' }}">
                            {{ Form::label('newPassword', 'New Password', array('class' => 'sr-only')) }}
                            {{ Form::password('newPassword', array('class' => 'form-control', 'placeholder' => 'New Password')) }}
                        </div>

                        <div class="form-group {{ $errors->has('newPassword_confirmation') ? 'has-error' : '' }}">
                            {{ Form::label('newPassword_confirmation', 'Confirm New Password', array('class' => 'sr-only')) }}
                            {{ Form::password('newPassword_confirmation', array('class' => 'form-control', 'placeholder' => 'Confirm New Password')) }}
                        </div>
                    </div>
                                
                      {{ ($errors->has('oldPassword') ? '<br />' . $errors->first('oldPassword') : '') }}
                      {{ ($errors->has('newPassword') ?  '<br />' . $errors->first('newPassword') : '') }}
                      {{ ($errors->has('newPassword_confirmation') ? '<br />' . $errors->first('newPassword_confirmation') : '') }}

                </div>
                <div class="panel-footer">
                    {{ Form::submit('Change Password', array('class' => 'btn btn-primary'))}}
                    {{ Form::close() }}
                </div>
            </div>
                    
        


        


@stop
