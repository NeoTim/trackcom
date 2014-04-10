@extends('layouts.blueprint')

{{-- Web site Title --}}
@section('title')
@parent
Suspend User
@stop

@section('page_title')
@parent
Suspend User
@stop

{{-- Content --}}
@section('content')
<div class="col-md-4 col-md-offset-4">
    <div class="panel panel-danger">
        <div class="panel-heading">
            <h3 class="panel-title">Suspend User</h3>
        </div>
        <div class="panel-body">
        {{ Form::open(array('action' => array('UserController@suspend', $id), 'method' => 'post')) }}
 
            

            <div class="form-group {{ ($errors->has('minutes')) ? 'has-error' : '' }}">
                {{ Form::text('minutes', null, array('class' => 'form-control', 'placeholder' => 'Minutes', 'autofocus')) }}
                {{ ($errors->has('minutes') ? $errors->first('minutes') : '') }}
            </div>    	   

            {{ Form::hidden('id', $id) }}


        </div>
        <div class="panel-footer">
            {{ Form::submit('Resend', array('class' => 'btn btn-danger')) }}
            <a href="{{URL::to('users')}}" class="btn btn-default">Cancel</a>
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop