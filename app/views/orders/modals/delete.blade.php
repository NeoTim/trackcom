<div class="modal fade" id="delete_Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-wide">
    <div class="modal-content">
      <div class="modal-header">
      	{{ Form::open(array('id' => 'delete_form', 'method' => 'DELETE', 'route' => array('orders.entries.destroy'))) }}
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h2 class="modal-title" id="myModalLabel">Confirm Delete</h2>
      </div>
						
      <div class="modal-body">	                        	
      	<h4 >Are you sure you want to delete <strong id="delete_entry_message"></strong></h4>
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