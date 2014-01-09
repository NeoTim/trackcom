@extends('customers.layout')

@section('page_styles')

	@include('layouts.styles.advTable')
	@include('layouts.styles.form')

@stop
@section('header')
	<div class="row">
		<div class="col-md-12">
			<!-- BEGIN PAGE TITLE & BREADCRUMB-->
			<blockquote><h3 class="page-title">
				{{{$customer->company}}}
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
					<a href="{{ URl::to('customers') }}">customers</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="{{ URl::to('customers/' . $customer->id) }}">{{ $customer->company }}</a>
				
				</li>
					
			</ul>
							
		</div>
	</div>
<div class="clearfix"></div>
	<div class="row">
		<div class='col-md-12'>	
			<div class="dashboard-stat bg-dark">
				<div class="visual">
					<i class="fa fa-user"></i>
				</div>
				<div class="details">
					<div class="number">
						
						
					</div>
					<div class="desc">
						
					</div>
				</div>
				<a href="" data-toggle="modal" data-target="#create_contact" class="more" style="background-color:#444444;">
				Add Contact <i class="m-icon-swapright m-icon-white"></i>
				</a>
			</div>

		</div>
	</div>	
@stop
@section('content')		
					<div class='well'>

							<div class="row">
									<div class="col-md-3">
										<h3>{{$customer->name}}</h3>
										
											<address>
												<h3>{{$customer->first}} {{{$customer->last}}}</h3>
												@if($customer->phone)
													<i class="fa fa-phone"></i> {{ $customer->phone }} <br />
												@endif
												@if($customer->email)
													<i class="fa fa-envelope"></i> <a href="mailto:#">{{$customer->email}}</a>
												@endif
											</address>
											<address>
												@if($customer->address)
													<strong>Address</strong><br>
													{{$customer->address}}<br>
													@if($customer->address2)
														{{$customer->address2}}<br>
													@endif
													{{$customer->city}}, {{$customer->state}} {{$customer->zip}}<br>
												@endif
											</address>
										
									</div>
									@if($customer->contacts->count())
										@foreach($customer->contacts as $contact)
										<div class="col-md-3" id="view_contact_{{{$contact->id}}}">
											
											
										</div>
										<div class="col-md-3" id="edit_contact_{{{$contact->id}}}" style="display:none;">
											{{Form::open(array('url' => 'URL::to("contact/" . $contact->id)', 'method' => 'PUT', 'id' => 'ECOform_' . $contact->id));}}
											{{ Form::text('first', $contact->first, array('class' => 'form-control', 'placeholder' => 'First', 'id' => 'first_' . $contact->id)) }}
											{{ Form::text('last', $contact->last, array('class' => 'form-control', 'placeholder' => 'Last', 'id' => 'last_' . $contact->id)) }}
											{{ Form::text('title', $contact->title, array('class' => 'form-control', 'placeholder' => 'Title', 'id' => 'title_' . $contact->id)) }}
											{{ Form::text('phone', $contact->phone, array('class' => 'form-control', 'placeholder' => 'Phone', 'id' => 'phone_' . $contact->id)) }}
											{{ Form::text('email', $contact->email, array('class' => 'form-control', 'placeholder' => 'Email', 'id' => 'email_' . $contact->id)) }}
											{{ Form::text('address', $contact->address, array('class' => 'form-control', 'placeholder' => 'Street', 'id' => 'address_' . $contact->id)) }}
											{{ Form::text('address2', $contact->address2, array('class' => 'form-control', 'placeholder' => 'Address', 'id' => 'address2_' . $contact->id)) }}
											{{ Form::text('city', $contact->city, array('class' => 'form-control', 'placeholder' => 'City', 'id' => 'city_' . $contact->id)) }}
											{{ Form::text('state', $contact->state, array('class' => 'form-control', 'id' => 'state_' . $contact->id)) }}
											{{ Form::text('zip', $contact->zip, array('class' => 'form-control', 'placeholder' => 'Zip', 'id' => 'zip_' . $contact->id)) }}
											<div class="btn-group">
												<button class="btn btn-primary" type="button" id="SCObtn_{{{$contact->id}}}">Save</button>
												<button class="btn btn-danger" type="button" id="DCObtn_{{{$contact->id}}}"><i class="fa fa-trash-o"></i> Delete</button>
											</div>
											
										</div>
										@endforeach
									@endif
								</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>

<div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-wide">
    <div class="modal-content">
      <div class="modal-header">
      	{{ Form::open(array('id' => 'delete_form', 'method' => 'DELETE', 'route' => array('contacts.destroy'))) }}
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h2 class="modal-title" id="myModalLabel">Confirm Delete</h2>
      </div>
						
      <div class="modal-body">	                        	
      	<h4>Are you sure you want to delete <strong id="delete_message"></strong></h4>
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
<!-- Modal -->
<div class="modal fade" id="create_contact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Create Contact</h4>
      </div>
      <div class="modal-body">
      	<div class="row">
        {{ Form::open(array('route' => 'contacts.store', 'class' => 'form-horizontal')) }}
      		<div class="form-body">
		        {{Form::hidden('customer_id', $customer->id)}}

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
		                {{ Form::text('phone', null, array('class' => 'form-control', 'id' => 'mask_phone')) }}
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
		                {{ Form::select('state', Lang::get('order.states'), null, array('class' => 'form-control ')) }}
		            </div>
		        </div>

		        <div class="form-group">
		            {{ Form::label('zip', 'Zip:', ['class' => 'control-label col-md-3']) }}
		            <div class="col-md-9">
		                {{ Form::text('zip', null, array('class' => 'form-control')) }}
		            </div>
		        </div>
		    </div>
		{{ Form::close() }}
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="submitForm">Save Contact</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@stop
@section('page_plugins')
<!-- BEGIN PAGE LEVEL PLUGINS -->
	@include('layouts.plugins.advTable_form')
<!-- END PAGE LEVEL PLUGINS -->
@stop
@section('page_scripts')
	@include('layouts.scripts.advTable_form')
	<script type="text/javascript">
	$("#submitForm").click(function(){
		$("#create_contact form").submit();
	});
	
	
	
	
	
	
	
	var contacts = {{$customer->contacts}};
	$.each($(contacts), function(i, contact)
		{
			var id = contact.id;
			var viewCO = "#view_contact_" + contact.id;
			var editCO = "#edit_contact_" + contact.id;
			var ECObtn = "#ECObtn_"	+ contact.id;
			var SCObtn = "#SCObtn_"	+ contact.id;
			var ECOform = "#ECOform_" + contact.id;
			var DCObtn = "#DCObtn_" + contact.id;
			setAddress(contact.id, contact.first, contact.last, contact.title, contact.phone, contact.email, contact.address, contact.address2, contact.city, contact.state, contact.zip);
			$(viewCO).mouseenter(function(){
				$(ECObtn).fadeIn();
			});
			$(viewCO).mouseleave(function(){
				$(ECObtn).fadeOut();
			});
			$(ECObtn).click(function(){
				$(viewCO).hide();
				$(editCO).fadeIn();

			});
			$(DCObtn).click(function(){
				$.ajax({
					url: "{{URL::to('contacts')}}/" + id,
					method: "DELETE",
					success: function(){
						$(editCO).fadeOut();
						$(editCO).remove();
						$(viewCO).remove();
					}
				});
				
			});
			$(SCObtn).click(function(){
				$.ajax({
					url: "{{URL::to('/contacts/" + contact.id + "')}}",
					method: "PUT",
					data: { 
						first: $("#first_" + id).val(),
						last: $("#last_" + id).val(),
						title: $("#title_" + id).val(),
						phone: $("#phone_" + id).val(),
						email: $("#email_" + id).val(),
						address: $("#address_" + id).val(),
						address2: $("#address2_" + id).val(),
						city: $("#city_" + id).val(),
						state: $("#state_" + id).val(),
						zip: $("#zip_" + id).val()
					},
					cache: false,
					success: function(data){
						console.log(data.address2);
						
						$("#view_contact_content_" + id).html("");
						resetAddress(id, data.first, data.last, data.title, data.phone, data.email, data.address, data.address2, data.city, data.state, data.zip);
						$(editCO).hide();
						$(viewCO).fadeIn();
					}
				});

			});


		});

	
	function setAddress(id, first, last, title, phone, email, address, address2, city, state, zip)
	{
		var temp = ['<i class="fa fa-edit ECObtn_' + id + '" id="ECObtn_' + id + '" style="display:none; position:absolute; cursor:pointer; color:gray;"></i>',
		'<div id="view_contact_content_' + id + '">',
		'<address>',
			'<h3>' + first + ' ' + last + '</h3>',
			'<strong>' + title + '</strong><br>',			
			'<i class="fa fa-phone"></i> ' + phone + ' <br />',
			'<i class="fa fa-envelope"></i> <a href="mailto:#">' + email + '</a>',
		'</address>',
		'<address>',
				'<strong>Address</strong><br>',
				address + '<br>',
				address2 + '<br>',
				city + ', ' + state + ' ' + zip + '<br>',
		'</address>',
		'</div>'].join('');

		$(temp).appendTo("#view_contact_" + id);
	}

	function resetAddress(id, first, last, title, phone, email, address, address2, city, state, zip)
	{
		var temp = ['<address>',
					'<h3>' + first + ' ' + last + '</h3>',
					'<strong>' + title + '</strong><br>',			
					'<i class="fa fa-phone"></i> ' + phone + ' <br />',
					'<i class="fa fa-envelope"></i> <a href="mailto:#">' + email + '</a>',
				'</address>',
				'<address>',
						'<strong>Address</strong><br>',
						address + '<br>',
						address2 + '<br>',
						city + ', ' + state + ' ' + zip + '<br>',
				'</address>'].join('');

		$(temp).appendTo("#view_contact_content_" + id);
	}

	</script>


@stop




