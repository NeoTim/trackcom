<div class="portlet solid bordered light-grey">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-signal"></i>Server Load
		</div>
		<div class="tools">
			<div class="btn-group pull-right" data-toggle="buttons">
				<a href="" class="btn red btn-sm active">Database</a>
				<a href="" class="btn red btn-sm">Web</a>
			</div>
		</div>
	</div>
	<div class="portlet-body">
		<div id="load_statistics_loading">
			<img src="{{ asset('assets/img/loading.gif') }}" alt="loading"/>
		</div>
		<div id="load_statistics_content" class="display-none">
			<div id="load_statistics" style="height: 108px;">
			</div>
		</div>
	</div>
</div>