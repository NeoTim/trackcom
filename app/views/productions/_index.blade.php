@extends('layouts.scaffold')

@section('content')
@if (Sentry::getUser()->hasAccess('admin'))

		

@endif
@if($pmethods->count())
<div class="col-md-12">
	<div class="well">
		<blockquote><h2>All Orders in Production</h2></blockquote>

	<!-- Nav tabs -->
	<ul class="nav nav-tabs">
	@foreach ($pmethods as $prod)
	  <li><a href="#tab_{{ $prod->id }}" data-toggle="tab" data-target="#tab_{{ $prod->id }}">{{ $prod->name }}</a></li>
	@endforeach    
	</ul>

	<!-- Tab panes -->
	<div class="tab-content">
	@foreach ($pmethods as $prod)
	  <div class="tab-pane" id="tab_{{ $prod->id }}">
		  
		  
		@if(isset($prod->entries))
		
				<table class="table table-striped table-bordered" id="table_"{{ $prod->id }}>
						<tr>
							
							<th>SKU</th>
							<th>Batch #</th>
							<th>Status</th>
						</tr>
						@foreach($prod->entries as $entry)
						<tr>
							
							<td>{{ $entry->sku }}</td>
							<td>{{ $entry->batch }}</td>
							<td>
								<div class="row">
								
									<div class="col-md-8">
									
										<div class="progress progress-striped active">
							<!-- status-->		<div class="progress-bar progress-bar-{{ $entry->color }}"  role="progressbar " aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width:{{ $entry->status }}%">
												<span class="sr-only">45% Complete</span>
											</div>
										</div>
										
										<div class="row hidden-xs" style="text-align:center;">
											<div class="col-xs-3">
												<p><small>Production</small></p>
											</div>
											<div class="col-xs-3">
												<p><small>Lab</small></p>
											</div>
											<div class="col-xs-3">
												<p><small>Fill</small></p>
											</div>
											<div class="col-xs-3">
												<p><small>Ready</small></p>
											</div>
										</div>
										
									</div><!-- end Col-xs-8-->
									
									<div class="col-md-4">
										<div class="btn-group">
											
											<button id="ESDbtn_{{ $entry->id }}" type="button" class="btn btn-default"><i class="fa fa-arrow-left"></i></button>
											<button id="ESUbtn_{{ $entry->id }}" type="button" class="btn btn-default"><i class="fa fa-arrow-right"></i></button>
										</div>
									</div>
									
								</div><!-- end row-->
								<div id="delete_entry" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="Delete_entryLabel" aria-hidden="true" style="display: none;">
							      <div class="modal-dialog">
							        <div class="modal-content">
										
										
										<div class="modal-header">
											{{ Form::open(array('method' => 'DELETE', 'route' => array('entries.destroy', $entry->id))) }}
							            	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
											<h4 class="modal-title" id="Delete_entryLabel">Delete?</h4>
										</div>
										<div class="modal-body">
											<blockquote><h4>Are You Sure you want to Remove this Entry?</h4></blockquote>
										</div>
										<div class="modal-footer">
							            	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										
											{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
										{{ Form::close() }}
						
										</div>
									  {{ Form::close() }}
							        </div><!-- /.modal-content -->
							      </div><!-- /.modal-dialog -->
							    </div>
	
							</td>
						</tr>
						@endforeach
					</table>
		@else
			<blockquote><h3>No Products found</h3></blockquote>
		@endif
		  
		  
		  
	  </div>
	@endforeach 
	</div> 

	</div>
@else
<div class="col-md-12">
	<div class="well">
		<blockquote><h2>No Production methods found</h2></blockquote>
	</div>
</div>
@endif


{{ Form::open(array('url' => array('entries/update'), 'id' => 'status_form', 'method' => 'post')) }}
{{ Form::hidden('status', '', array('id' => 'input_status')) }}
{{ Form::hidden('color', '', array('id' => 'input_color')) }}

{{ Form::close() }}
<div class="modal fade" id="production_modal" tabindex="-1" role="dialog" aria-labelledby="ProductionModalLabel" aria-hidden="true">
  </div>
</div>

		
@stop

@section('page_scripts')



<script>
$(document).ready(function(){
	
	
	
	
	
	
	$('#production_modal').on('hidden.bs.modal', function () {
	  $(this).removeData('bs.modal modal-body');
	});	
	$(".lg_modal").css("width", "1024px");
	$('.nav-tabs li:nth-child(1) a').tab('show');
	var inputS = "#input_status";
	var inputC = "#input_color";
	var formS  = "#status_form";
	
	
	
	
	
	function statusUp(s, id)
	{
		if(s <= 10)
		{
			$(formS).attr("action", "{{ URL::to('entries/update') }}/" + id);
			$(inputS).val(25);
			$(inputC).val('warning');
			
			
			$(formS).submit();
		}
		if(s == 25)
		{
			$(formS).attr("action", "{{ URL::to('entries/update') }}/" + id);
			$(inputS).val(50);
			$(inputC).val('default');
			
			
			
			$(formS).submit();

		}
		if(s == 50)
		{
			$(formS).attr("action", "{{ URL::to('entries/update') }}/" + id);
			$(inputS).val(75);
			$(inputC).val('info');
			
			
			$(formS).submit();


		}
		if(s == 75)
		{
			$(formS).attr("action", "{{ URL::to('entries/update') }}/" + id);
			$(inputS).val(100);
			$(inputC).val('success');
			
			
			$(formS).submit();

		}
	}
	function statusDown(s, id)
	{
		if(s >= 100)
		{
			$(formS).attr("action", "{{ URL::to('entries/update') }}/" + id);
			$(inputS).val(75);
			$(inputC).val('info');
			$(formS).submit();
		}
		if(s == 75)
		{
			$(formS).attr("action", "{{ URL::to('entries/update') }}/" + id);
			$(inputS).val(50);
			$(inputC).val('default');
			$(formS).submit();
		}
		if(s == 50)
		{
			$(formS).attr("action", "{{ URL::to('entries/update') }}/" + id);
			$(inputS).val(25);
			$(inputC).val('warning');
			$(formS).submit();
		}
		if(s == 25)
		{
			$(formS).attr("action", "{{ URL::to('entries/update') }}/" + id);
			$(inputS).val(10);
			$(inputC).val('danger');
			$(formS).submit();
		}
	}
	
	
	
	var pmethods = {{ $pmethods }};
	$.each($(pmethods), function(i)
	{
		var entries = pmethods[i].entries;
		$.each($(entries), function(j)
		{
			var entry = entries[j];
			var ESUbtn = "#ESUbtn_" + entry.id;
			var ESDbtn = "#ESDbtn_" + entry.id;
			$(ESUbtn).click(function(){
				statusUp(entry.status, entry.id)
				
			});
			$(ESDbtn).click(function(){
				statusDown(entry.status, entry.id)
				
			});
		});
	});
	
	
	
});
	
	
	
	
	
	
	
</script>



@stop
