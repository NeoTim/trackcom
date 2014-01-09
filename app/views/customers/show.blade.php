@extends('layouts.blueprint')
@section('page_title')
	{{$customer->company}}
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
						{{{$customer->company}}}
						
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
		<div class=" aligncenter">
			<div class="btn-group aligncenter" style="text-align:center;">
				<a href="{{ URL::to('customers')}}" class="btn btn-default"><i class="fa fa-arrow-left"></i> View All</a>
				<a href="" data-toggle="modal" data-target="#create_contact" class="btn btn-primary">Add Contact</a>
				{{ link_to_route('customers.edit', 'Edit', array($customer->id), array('class' => 'btn btn-warning')) }}
				<button class="btn btn-danger" id="DCbtn_{{$customer->id}}" data-toggle="modal" data-target="#delete_modal_{{$customer->id}}">Delete</button>
			</div>
		                        	
		</div>
		<br />
		<br />
<div class="modal fade" id="delete_modal_{{$customer->id}}" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-wide">
    <div class="modal-content">
      <div class="modal-header">
      	{{ Form::open(array('id' => 'delete_form', 'method' => 'DELETE', 'route' => array('customers.destroy', $customer->id))) }}
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h2 class="modal-title" id="productModalLabel">Delete {{$customer->company}} </h2>
      </div>
						
      <div class="modal-body">	                        	
      	<h4 id=""> Are you Sure you want to Delete <strong id="">{{$customer->company}}</strong></h4>
      	<p>You must Delete all orders from this customer before deleting!!!</p>
      	
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

		<div class="col-md-4">
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<h3 class="panel-title ">Customer Info</h3>
				</div>
				<div class="panel-body">
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
			</div>
			
		</div>
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Contacts</h3>
				</div>
				<div class="panel-body">
					@if($customer->contacts->count())
						@foreach($customer->contacts as $contact)
							<div class="col-md-6" id="view_contact_{{{$contact->id}}}">
								
								<address>
									<h3>{{{$contact->first . ' ' . $contact->last}}}</h3>
									<strong>{{{$contact->title}}}</strong><br>
									<i class="fa fa-phone"></i> {{{$contact->phone}}}<br />
									<i class="fa fa-envelope"></i> <a href="mailto:#">{{{$contact->email}}}</a>
								</address>
								<address>
									<strong>Address</strong><br>
									{{{$contact->address}}}<br>
									{{{$contact->address2}}}<br>
									{{{$contact->city . ', ' . $contact->state . ' ' . $contact->zip}}}<br>
								</address>
								
									<a href="{{URL::to('contacts/' . $contact->id)}}/edit"><i class="fa fa-edit"></i> Edit</a>   <a href="" data-toggle="modal" data-target="#delete_modal" id="DCObtn_{{$contact->id}}"><i class="fa fa-trash-o"></i> Delete</a>
								
							</div>
						@endforeach
					@endif
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

@section('page_scripts')

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
			
			$(viewCO).mouseenter(function(){
				$(ECObtn).fadeIn();
			});
			$(viewCO).mouseleave(function(){
				$(ECObtn).fadeOut();
			});
			$(DCObtn).click(function(){
				$("#delete_modal form").attr("action", "{{URL::to('contacts')}}/" + id);
				$("#delete_message").text(contact.first + ' ' + contact.last);
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

	
	

	</script>


@stop




