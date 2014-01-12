
{{ Form::open(array('route' => 'umessages.store', 'class' => 'inbox-compose form-horizontal', 'id' => 'compose_form')) }}
	<div class="inbox-compose-btn">
		<button class="btn blue"><i class="fa fa-check"></i>Send</button>
		<button class="btn">Discard</button>
		<button class="btn">Draft</button>
	</div>
	<div class="inbox-form-group mail-to">
		<label class="control-label">To:</label>
		<div class="controls controls-to">
			<input type="text" class="form-control" name="to">
			<span class="inbox-cc-bcc">
				<span class="inbox-cc">
					 Cc
				</span>
				<span class="inbox-bcc">
					 Bcc
				</span>
			</span>
		</div>
	</div>
	<div class="inbox-form-group input-cc display-hide">
		<a href="javascript:;" class="close"></a>
		<label class="control-label">Cc:</label>
		<div class="controls controls-cc">
			<input type="text" name="cc" class="form-control">
		</div>
	</div>
	<div class="inbox-form-group input-bcc display-hide">
		<a href="javascript:;" class="close"></a>
		<label class="control-label">Bcc:</label>
		<div class="controls controls-bcc">
			<input type="text" name="bcc" class="form-control">
		</div>
	</div>
	<div class="inbox-form-group">
		<label class="control-label">Subject:</label>
		<div class="controls">
			<input type="text" class="form-control" name="subject">
		</div>
	</div>
	<div class="inbox-form-group">
		<textarea class="inbox-editor inbox-wysihtml5 form-control" name="message" rows="12"></textarea>
	</div>
																																																																																																																																																																																				
	<div class="inbox-compose-btn">
		<button type="submit" class="btn blue"><i class="fa fa-check"></i>Send</button>
		<button class="btn">Discard</button>
		<button class="btn">Draft</button>
	</div>
</form>