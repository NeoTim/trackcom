@extends('layouts.blueprint')

@section('page_title')
	Create Contact
@stop

@section('content')

					<div class='well'>


						<h1>Create Contact</h1>
						
						{{ Form::open(array('route' => 'contacts.store', 'class' => 'form-horizontal')) }}
							<div class="form-body">
						        <div class="form-group">
						            {{ Form::label('customer_id', 'Customer_id:', ['class' => 'control-label col-md-3']) }}
						            <div class="col-md-9">
						                {{ Form::input('number', 'customer_id', null, array('class' => 'form-control')) }}
						            </div>
						        </div>

						        <div class="form-group">
						            {{ Form::label('category_id', 'Category_id:', ['class' => 'control-label col-md-3']) }}
						            <div class="col-md-9">
						                {{ Form::input('number', 'category_id', null, array('class' => 'form-control')) }}
						            </div>
						        </div>

						        <div class="form-group">
						            {{ Form::label('first', 'First:', ['class' => 'control-label col-md-3']) }}
						            <div class="col-md-9">
						                {{ Form::text('first', null, array('class' => 'form-control')) }}
						            </div>
						        </div>

						        <div class="form-group">
						            {{ Form::label('last', 'Last:', ['class' => 'control-label col-md-3']) }}
						            <div class="col-md-9">
						                {{ Form::text('last', null, array('class' => 'form-control')) }}
						            </div>
						        </div>

						        <div class="form-group">
						            {{ Form::label('title', 'Title:', ['class' => 'control-label col-md-3']) }}
						            <div class="col-md-9">
						                {{ Form::text('title', null, array('class' => 'form-control')) }}
						            </div>
						        </div>

						        <div class="form-group">
						            {{ Form::label('phone', 'Phone:', ['class' => 'control-label col-md-3']) }}
						            <div class="col-md-9">
						                {{ Form::text('phone', null, array('class' => 'form-control')) }}
						            </div>
						        </div>

						        <div class="form-group">
						            {{ Form::label('email', 'Email:', ['class' => 'control-label col-md-3']) }}
						            <div class="col-md-9">
						                {{ Form::text('email', null, array('class' => 'form-control')) }}
						            </div>
						        </div>

						        <div class="form-group">
						            {{ Form::label('address', 'Address:', ['class' => 'control-label col-md-3']) }}
						            <div class="col-md-9">
						                {{ Form::text('address', null, array('class' => 'form-control')) }}
						            </div>
						        </div>

						        <div class="form-group">
						            {{ Form::label('address2', 'Address2:', ['class' => 'control-label col-md-3']) }}
						            <div class="col-md-9">
						                {{ Form::text('address2', null, array('class' => 'form-control')) }}
						            </div>
						        </div>

						        <div class="form-group">
						            {{ Form::label('city', 'City:', ['class' => 'control-label col-md-3']) }}
						            <div class="col-md-9">
						                {{ Form::text('city', null, array('class' => 'form-control')) }}
						            </div>
						        </div>

						        <div class="form-group">
						            {{ Form::label('state', 'State:', ['class' => 'control-label col-md-3']) }}
						            <div class="col-md-9">
						                {{ Form::text('state', null, array('class' => 'form-control')) }}
						            </div>
						        </div>

								<div class="form-group">
									{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
								</div>
							</div>
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
