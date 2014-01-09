@extends('layouts.blueprint')

{{-- Web site Title --}}
@section('title')
@parent
Resend Activation
@stop

@section('page_title')
@parent
Resend Activation
@stop

{{-- Content --}}
@section('content')
<div class="col-md-4 col-md-offset-4">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Resend Activation</h3>
        </div>
        <div class="panel-body">
            {{ Form::open(array('action' => 'UserController@resend', 'method' => 'post')) }}
            	
                <h2>Resend Activation Email</h2>
        		
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
