<div class="col-lg-12">
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#carousel-example-generic" data-slide-to="0" class=""></li>
			<li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
			<li data-target="#carousel-example-generic" data-slide-to="2" class="active"></li>
		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner">
			<div id="slide_one" class="item">
				<iframe style="width:100%; height:600px;" src="{{URL::to('productions')}}"></iframe>
				
			</div>
			
			<div class="item">
				@include('dashboard.portlets.general')
				
			</div>

			<div class="item active">
				@include('dashboard.portlets.chat')
				
			</div>

		</div>

		<!-- Controls -->
		<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left"></span>
		</a>
		<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right"></span>
		</a>
	</div>
</div>