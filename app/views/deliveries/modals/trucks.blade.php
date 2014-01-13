<div class="modal fade" id="trucks_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Configure Trucks</h4>

      </div>
      <div class="modal-body">



        @foreach($trucks as $truck)
        	@if($truck->active == 0)
	        {{Form::open(array('route' => array('trucks.update', $truck->id), 'class' => 'form-horizontal hidden_truck', 'data-id' => $truck->id, 'id' => 'form_' . $truck->id, 'style' => 'display:none;'))}}
	        @else
	        {{Form::open(array('route' => array('trucks.update', $truck->id), 'class' => 'form-horizontal', 'data-id' => $truck->id, 'id' => 'form_' . $truck->id))}}
	        @endif

	        	<div class="form-group">
	        		
	        		<div id="" class="input-group">
	        			<span class="input-group-btn">
	        			<select name="number" class="s1 selectpicker" data-width="100px" data-size="auto" id="dNumber_{{$truck->id}}" data-style="btn-default">
	        					@foreach($actives as $n)
	        						@if($n == $truck->number)
		        						<option selected="selected" value="{{$n}}"> {{$n}} </option>
	        						@else
		        						<option value="{{$n}}"> {{$n}} </option>
		        					@endif
	        					@endforeach
	        			</select>
	        			</span>
	        			<span class="input-group-btn">
	        			{{Form::select('dmethod_id', $methods, $truck->dmethod_id, array('class' => 's2 selectpicker', 'id' => 'dOptions_' . $truck->id , 'data-style' => 'btn-default'))}}
	        			</span>
	        			{{Form::text('driver', $truck->driver, array('class' => 's3 form-control', 'data-width' => "auto", 'id' => 'driver_' . $truck->id, 'placeholder' => 'Driver'))}}
	        			<span class="input-group-btn">
	        				<button type="button" class="btn btn-danger" id="remove_truck_{{$truck->id}}"><i class="fa fa-times"></i></button>
	        			</span>
	        			
	        		</div>
	        		{{Form::hidden('active', $truck->active, array('class' => 'active_truck', 'id' => 'active_' . $truck->id))}}
	        		
	        	</div>

	       	{{Form::close()}}
        @endforeach
       


      </div>
      <div class="modal-footer">
      	<!-- <button class='btn btn-success pull-left' id="add_truck">New Truck</button> -->
        <button type="button" class="btn btn-success pull-left" id="add_truck">Add Truck</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button id="submit_trucks" type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

    	


