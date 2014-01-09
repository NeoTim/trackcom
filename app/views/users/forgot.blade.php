@extends('layouts.blueprint')

{{-- Web site Title --}}
@section('title')
@parent
Forgot Password
@stop

@section('page_title')
@parent
Forgot Password
@stop

{{-- Content --}}
@section('content')
<div class="col-md-4 col-md-offset-4">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Resend Activation</h3>
        </div>
        <div class="panel-body">
        {{ Form::open(array('action' => 'UserController@forgot', 'method' => 'post')) }}
            
            <h2>Forgot your Password?</h2>
            
            <div class="form-group {{ ($errors->has('email')) ? 'has-error' : '' }}">
                {{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'E-mail', 'autofocus')) }}
                {{ ($errors->has('email') ? $errors->first('email') : '') }}
            </div>


        </div>
        <div class="panel-footer">
            {{ Form::submit('Resend', array('class' => 'btn btn-primary')) }}
            {{ Form::close() }}
        </div>
    </div>
</div>

@stop