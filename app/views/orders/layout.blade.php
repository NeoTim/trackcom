@extends('layouts.scaffold')




@section('main')
	<div class="page-content-wrapper">
		<div class="page-content">
			
			
			<!-- END PAGE HEADER-->
			@yield('header')
			@include('layouts.notifications')
			<!-- BEGIN HEADER WRAP -->
	
			<div class="clearfix"></div>

			<!-- BEGIN CONTENT WRAP -->
			<div class="row">
				<div class='col-md-12'>
			
						@yield('content')


				</div>
			</div>
			<!-- END CONTENT WRAP -->

		</div>
	</div>
@stop
