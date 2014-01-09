<div class="modal fade" id="load_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-wide">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h2 class="modal-title" id="myModalLabel">Create Product</h2>
      </div>
						
      <div class="modal-body">
			<div class="row">
				<div class="col-md-12">
					<div class="table-respponsive">

					</div>


						
						{{ Form::open(array('route' => 'orders.entries.store', 'class' => 'form-horizontal', 'role' => 'form')) }}
							
						        
						       {{ Form::hidden('order_id', $order->id) }}
						        
						        
						       <!-- SKU -->
						        <div class="form-group">
						            <div class="col-md-6">
						            {{ Form::label('newsku', 'Add Product', ['class' => 'control-label']) }}
						                {{ Form::text('newsku', null, array('class' => 'form-control')) }}
						            </div>
						            <div class="col-md-6">
						            {{ Form::label('product_id', 'Products', ['class' => 'control-label']) }}
						                {{ Form::select('product_id', $products, null, array('class' => 'form-control')) }}
						            </div>
						        </div>
						        <!-- END SKU -->

						        <!-- BATCH AND ORDER # -->
						        <div class="form-group">
						            <div class="col-md-4">
						            {{ Form::label('batch', 'Batch:', ['class' => 'control-label']) }}
						                {{ Form::text('batch', null, array('class' => 'form-control')) }}
						            </div>
						            <div class="col-md-4">
						            {{ Form::label('tank', 'Tank:', ['class' => 'control-label']) }}
						                {{ Form::text('tank', null, array('class' => 'form-control')) }}
						            </div>
						        </div>
						        <!-- END BATCH AND ORDER # -->

						        

						        <!-- GROUP 1 -->
						        <div class="form-group">
						            <div class="col-md-3">
						            {{ Form::label('container1', 'Container1:', ['class' => 'control-label']) }}
						                 {{ Form::select('container1', Lang::get('order.containers'), null, array('class' => 'form-control ')) }}
						            </div>
						            <div class="col-md-2">
						            {{ Form::label('qty1', 'Qty1:', ['class' => 'control-label']) }}
						                {{ Form::text('qty1', null, array('class' => 'form-control')) }}
						            </div>
						            <div class="col-md-7">
						            {{ Form::label('desc1', 'Desc1:', ['class' => 'control-label col-md-3']) }}
						                {{ Form::text('desc1', null, array('class' => 'form-control')) }}
						            </div>
						        </div>
						        <!-- END GROUP 1 -->

						        <!-- GROUP 2 -->
						        <div class="form-group">
						            <div class="col-md-3">
						           		{{ Form::label('container2', 'Container2:', ['class' => 'control-label']) }}
						                {{ Form::select('container2', Lang::get('order.containers'), null, array('class' => 'form-control')) }}
						            </div>
						            <div class="col-md-2">
						            {{ Form::label('qty2', 'Qty2:', ['class' => 'control-label']) }}
						                {{ Form::text('qty2', null, array('class' => 'form-control')) }}
						            </div>
						            <div class="col-md-7">
						            {{ Form::label('desc2', 'Desc2:', ['class' => 'control-label col-md-3']) }}
						                {{ Form::text('desc2', null, array('class' => 'form-control')) }}
						            </div>
						        </div>
						        <!-- END GROUP 2 -->

						        <!-- GROUP 3 -->
						        <div class="form-group">
						            <div class="col-md-3">
						            {{ Form::label('container3', 'Container3:', ['class' => 'control-label']) }}
						                 {{ Form::select('container3', Lang::get('order.containers'), null, array('class' => 'form-control')) }}
						            </div>
						            <div class="col-md-2">
						            {{ Form::label('qty3', 'Qty3:', ['class' => 'control-label']) }}
						                {{ Form::text('qty3', null, array('class' => 'form-control')) }}
						            </div>
						            <div class="col-md-7">
						            {{ Form::label('desc3', 'Desc3:', ['class' => 'control-label col-md-3']) }}
						                {{ Form::text('desc3', null, array('class' => 'form-control')) }}
						            </div>
						        </div>
						        <!-- END GROUP 3 -->

						        <h4 class="form-section">Production Info</h4>


						        <!-- PTYPE -->
						        <div class="form-group">
						            <div class="col-md-12">
							            <div class="btn-group" data-toggle="buttons">
							            	<button class="btn btn-default" disabled="disabled">Type <i class="fa fa-arrow-right"></i></button>
											@foreach($ptypes as $ptype)
							            	<label class="btn btn-primary">
							            		<input name="ptype_id" type="radio" class="toggle" value="{{ $ptype->id }}"> {{ $ptype->name }}
							            	</label>
							            	@endforeach
							            </div>
						            </div>
						        </div>
						        <!-- END PTYPE -->

						        <!-- PMETHOD -->
						        <div class="form-group">
						            <div class="col-md-12">
							            <div class="btn-group" data-toggle="buttons">
							            	<button class="btn btn-default" disabled="disabled">Production <i class="fa fa-arrow-right"></i></button>
											@foreach($pmethods as $pmethod)
							            	<label class="btn btn-info">
							            		<input name="pmethod_id" type="radio" class="toggle pmethods" data-toggle="button" value="{{ $pmethod->id }}"> {{ $pmethod->name }}
							            	</label>
							            	@endforeach
							            </div>
						            </div>
						        </div>
						        <!-- END PMETHOD -->

						        <!-- MSDS -->
						        <div class="form-group">
						            <div class="col-md-4">
						            	{{ Form::label('msds', 'Msds:', ['class' => 'control-label']) }}
						                {{ Form::url('msds', null, array('class' => 'form-control')) }}
						                <span class="helper-block">Paste the Link for the MSDS Here</span>
						            </div>
						        </div>
						        

						
						@if ($errors->any())
							<ul>
								{{ implode('', $errors->all('<li class="error">:message</li>')) }}
							</ul>
						@endif

					
				</div>
		
			</div>
		</div>
      <div class="modal-footer">

      	<div class="btn-group">
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
		{{ Form::close() }}
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->