@extends('layouts.blueprint')

@section('main')
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			
				@include('layouts.modals.config')
				
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			
			<!-- BEGIN STYLE CUSTOMIZER -->
			<div class="theme-panel hidden-xs hidden-sm">
			
				@include('layouts.sections.style')
				
			</div>
			<!-- END STYLE CUSTOMIZER -->
			
			<!-- BEGIN PAGE HEADER-->
			
				@include('layouts.sections.header')

			<!-- END PAGE HEADER-->
			
			<div class="clearfix">
			</div>
			<div class="row">
				<div class='col-md-12'>
			
						<div class="dashboard-stat blue">
							<div class="visual">
								<i class="fa fa-plus"></i>
							</div>
							<div class="details">
								<div class="number">
									
								</div>
								<div class="desc">
									Create Pmethod
								</div>
							</div>
							<a href="{{ URL::to('pmethods') }}" class="more">
							View Pmethods <i class="m-icon-swapright m-icon-white"></i>
							</a>
						</div>
				</div>
			</div>
				
			<div class="clearfix">
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class='well'>


						<h1>Create Pmethod</h1>
						
						{{ Form::open(array('route' => 'pmethods.store')) }}
							<ul>
						        <div class="form-group">
						            {{ Form::label('name', 'Name:', ['class' => 'control-label col-md-3']) }}
						            <div class="col-md-9">
						                {{ Form::text('name', null, array('class' => 'form-control')) }}
						            </div>
						        </div>

						        <div class="form-group">
						            {{ Form::label('dtype_id', 'Category', ['class' => 'control-label col-md-3']) }}
						            <div class="col-md-9">
							            <div class="btn-group" data-toggle="buttons">
											@foreach($ptypes as $ptype)
								            	<label class="btn btn-default">
								            		<input name="ptype_id" type="radio" class="toggle" value="{{ $ptype->id }}"> {{$ptype->name}}
								            	</label>
											@endforeach
							            </div>
						            </div>
						        </div>

						        <div class="form-group">
						            {{ Form::label('label', 'Label:', ['class' => 'control-label col-md-3']) }}
						            <div class="col-md-9">
						                {{ Form::text('label', null, array('class' => 'form-control')) }}
						            </div>
						        </div>

						        <div class="form-group">
						            {{ Form::label('desc', 'Desc:', ['class' => 'control-label col-md-3']) }}
						            <div class="col-md-9">
						                {{ Form::textarea('desc', null, array('class' => 'form-control')) }}
						            </div>
						        </div>

								<li>
									{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
								</li>
							</ul>
						{{ Form::close() }}
						
						@if ($errors->any())
							<ul>
								{{ implode('', $errors->all('<li class="error">:message</li>')) }}
							</ul>
						@endif

					</div>
				</div>
			</div>
		</div>
	</div>
@stop




