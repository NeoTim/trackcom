@extends('layouts.blueprint')

@section('page_title')
Notifications

@stop
@section('content')

		<div class=" aligncenter">
			<div class=" aligncenter" style="text-align:center;"><a id="" href="" data-toggle="modal" data-target="#notify_modal" class="btn btn-primary aligncenter">Notify</a></div>
		</div>
		<br />
		<br />
	
	
		
		<div class="col-md-12">
		<table class="table table-striped table-bordered table-hover dataTable" id="sample_2" aria-describedby="sample_2_info" >
			<thead>
				<tr>
					<th style="" >Title</th>
					<th>Subject</th>
					<th>Body</th>
					<th style="min-width:200px; width:200px;">Options</th>
				</tr>
			</thead>
	
			<tbody id="notify_tbody">
				@foreach ($notifications as $notification)
					<tr>
						<td>{{{ $notification->title }}}</td>
						<td>{{{ $notification->subject }}}</td>
						<td>{{{Str::limit($notification->body, $limit = 100, $end = '...')  }}}</td>
	                    <td>
	                        {{ Form::open(array('id' => 'delete_form', 'method' => 'DELETE', 'route' => array('notifications.destroy', $notification->id))) }}
	                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
	                        {{ Form::close() }}
	                    </td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	@if ($notifications->count())
	@else
		There are no notifications
	@endif
	
					
@stop

@section('page_scripts')

<script>
jQuery(document).ready(function() {       
		var notifies = [];

		notifies    = $.getVariables("{{URL::route('notifications.show')}}");

		function add_notify(id, title, subject, body)
		{
			var delete_url = "{{URL::to('notifications')}}/" + id;
			var temp = ['<tr>',
				'<td>' + title + '</td>',
				'<td>' + subject + '</td>',
				'<td>' + body + '</td>',
				'<td>',
                    '<form method="POST" action="' + delete_url + '" accept-charset="UTF-8">',
                    	'<input name="_method" type="hidden" value="DELETE"><input name="_token" type="hidden">',
                        '<button type="submit" class="btn btn-danger">Delete</button>',
                    '</form>',
                '</td>',
            '</tr>'].join('');
            $(temp).appendTo("#notify_tbody");
		}
	

	
	        $("#notify_submit").click(function(){
	            $.ajax({
	                url: "{{URL::route('notifications.store')}}",
	                type: "POST",
	                cache: false,
	                data: { title: $("#notify_title").val(), subject: $("#notify_subject").val(), body: $("#notify_body").val(), label: $("#notify_label").val() },
	                success: function(data){
	                    add_notify(data.id, data.title, data.subject, data.body);
	                	$(".modal").modal('hide');
	                }
	            });
	        });
		
});
</script>

@stop