<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>CoatingsCom | Dashboard</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
		<meta content="" name="description"/>
		<meta content="" name="author"/>
		<meta name="MobileOptimized" content="320">
		@yield('head')

	</head>
	<body class="page-header-fixed">


		@yield('body')		

		@yield('footer')
		<div class="modal fade" id="notify_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
			        <form action="{{URL::to('notifications')}}" method="POST" accept-charset="UTF-8" role="form" id="notify_form">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Notify</h4>
		      </div>
		      <div class="modal-body">
					<div class="form-group">
					{{Form::label('title', 'Title', 'control-label')}}
					{{Form::text('title', null, array('class' => 'form-control', 'placeholder' => 'Title', "id" => "notify_title"))}}
					</div>
					<div class="form-group">
					{{Form::label('subject', 'subject', 'control-label')}}
					{{Form::text('subject', null, array('class' => 'form-control', 'placeholder' => 'Subject', "id" => "notify_subject"))}}
					</div>
					<div class="form-group">
					{{Form::label('body', 'Body', 'control-label')}}
					{{Form::textarea('body', null, array('class' => 'form-control wysihtml5', "id" => "notify_body"))}}
					</div>
					<div class="form-group">
					{{Form::label('label', 'Alert', 'control-label')}}
					<select name="label" class="form-control" id="notify_label">
						<option value="success">Success</option>						
						<option value="info">Info</option>
						<option value="warning">Warning</option>
						<option value="danger">Danger</option>
					</select>
					</div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        <button id="notify_submit" type="button" class="btn btn-primary">Notify</button>
		       
					</form>
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		@yield('scripts')

	</body>
</html>
