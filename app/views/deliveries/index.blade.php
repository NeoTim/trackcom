@extends('layouts.blueprint')

@section('extra')
<style type="text/css">

	#box_metro, #box_shipping, #box_outbound, #box_pickup { list-style-type: none; margin: 0; padding: 0;  }
  	#box_metro li, #box_shipping li, #box_outbound li, #box_pickup li { margin: 0 3px 3px 3px;  font-size: 1.4em; height: 18px; }
  	#box_metro li button, #box_shipping li button, #box_outbound li button, #box_pickup li button  { position: absolute; margin-left: -1.3em; }
</style>
@stop

@section('page_title')
Deliveries
@stop


@section('content')
	<div class="col-md-3">
		<div class="panel panel-inverse order_btns">
			  <div class="panel-heading">
					<h3 class="panel-title">Orders</h3>
			  </div>
			  <div id="docked_orders" class="panel-body">
			  	
				Metro Deliveries
				<hr>
				<div id="box_metro">
			  	@foreach($orders as $order)
					@if($order->dtype_id == 1)
						<li class=" ui-state-defadivt"><button  class="btn btn-primary ">{{$order->title}}</button></li>
					@endif
				@endforeach
				</div>
				<br>
				<br>
				Outbound Deliveries
				<hr>
				<div id="box_outbound">
				@foreach($orders as $order)
					@if($order->dtype_id == 4)
						<li class=" ui-state-defadivt"><button disabled="disabled" class="btn btn-warning ">{{$order->title}}</button></li>
					@endif
				@endforeach
				</div>
				<br>
				<br>
				Shipping
				<hr>
				<div id="box_shipping">
				@foreach($orders as $order)
					@if($order->dtype_id == 2)
						<li class="btn btn-succes ui-state-defadivt"><button disabled="disabled" class="btn btn-success ">{{$order->title}}</button></li>
					@endif
				@endforeach
				</div>
				<br/>
				<br/>
				Pickup
				<hr>
				<div id="box_pickup">
				@foreach($orders as $order)
					@if($order->dtype_id == 3)
						<li class="btn btn-danger ui-state-defadivt"><button disabled="disabled" class="btn btn-danger ">{{$order->title}}</button></li>
					@endif
				@endforeach
				</div>
			</div>
		</div>
	</div>



@stop
@section('page_scripts')
<script type="text/javascript">
	$(document).ready(function(){
		$(".order_btns .btn").css('margin', '2px 0 2px 0');
		$("#box_metro").sortable();			
		$("#box_outbound").sortable();			
		$("#box_shipping").sortable();			
		$("#box_pickup").sortable();			
		 $("#box_metro").disableSelection();			
		 $("#box_outbound").disableSelection();			
		 $("#box_shipping").disableSelection();			
		 $("#box_pickup").disableSelection();			

	});
</script>



@stop
