@extends('layouts.blueprint')

@section('page_title')
Deliveries
@stop

@section('content')

	<div class="col-md-3">
		<ul class="ver-inline-menu tabbable margin-bottom-10">
			<li class="active">
				<a data-toggle="tab" href="#tab_1">
				<i class="fa fa-truck"></i> Deliveries </a>
				<span class="after">
				</span>
			</li>
			<li>
				<a data-toggle="tab" href="#tab_2"><i class="fa fa-truck"></i> Shipping</a>
			</li>
			<li>
				<a data-toggle="tab" href="#tab_3"><i class="fa fa-leaf"></i> Terms Of Service</a>
			</li>
			<li>
				<a data-toggle="tab" href="#tab_1"><i class="fa fa-info-circle"></i> License Terms</a>
			</li>
			<li>
				<a data-toggle="tab" href="#tab_2"><i class="fa fa-tint"></i> Payment Rules</a>
			</li>
			<li>
				<a data-toggle="tab" href="#tab_3"><i class="fa fa-plus"></i> Other Questions</a>
			</li>
		</ul>
	</div>
	<div class="col-md-9">
		<div class="tab-content">
			<div id="tab_1" class="tab-pane active fade in">
				@foreach($dmethods as $method)
					@if($method->dtype_id == 1)
						<div class="col-md-3">
							<div class="pricing hover-effect">
								<div class="pricing-head">
									<h3>{{{$method->name}}}
									<span>
										{{{$method->orders->count()}}}
									</span>
									</h3>
									<h4><i></i><i></i>
									<span>
										
									</span>
									</h4>
								</div>
								<ul class="pricing-content list-unstyled">
									@foreach($method->orders as $order)
									<li>
										<a href="{{{URL::to('orders/' . $order->id)}}}"> <i class="fa fa-tags"></i> {{{$order->customer->company}}} - {{{$order->number}}}</a>
									</li>
									@endforeach
								</ul>
								<div class="pricing-footer">
									<p>
										
									</p>
									<a href="#" class="btn green">
									Details <i class="m-icon-swapright m-icon-white"></i>
									</a>
								</div>
							</div>
						</div>	

					@endif
				@endforeach
			</div>
			<div id="tab_2" class="tab-pane fade">
				<div class="col-md-3">
					<div class="pricing hover-effect">
						<div class="pricing-head">
							<h3>FedEx
							<span>
								Shipping
							</span>
							</h3>
							<h4><i></i><i></i>
							<span>
								
							</span>
							</h4>
						</div>
						<ul class="pricing-content list-unstyled">
							
							<li>
								<a href="{{{URL::to('orders/')}}}"> <i class="fa fa-tags"></i> </a>
							</li>
							
						</ul>
						<div class="pricing-footer">
							<p>
								
							</p>
							<a href="#" class="btn green">
							Details <i class="m-icon-swapright m-icon-white"></i>
							</a>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="pricing hover-effect">
						<div class="pricing-head">
							<h3>UPS
							<span>
								Shipping
							</span>
							</h3>
							<h4><i></i><i></i>
							<span>
								
							</span>
							</h4>
						</div>
						<ul class="pricing-content list-unstyled">
							
							<li>
								<a href="{{{URL::to('orders/')}}}"> <i class="fa fa-tags"></i> </a>
							</li>
							
						</ul>
						<div class="pricing-footer">
							<p>
								
							</p>
							<a href="#" class="btn green">
							Details <i class="m-icon-swapright m-icon-white"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div id="tab_3" class="tab-pane fade">
				<div id="accordion3" class="panel-group">
					<div class="panel panel-danger">
						<div class="panel-heading">
							<h4 class="panel-title">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#accordion3_1">
							1. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry ? </a>
							</h4>
						</div>
						<div id="accordion3_1" class="panel-collapse collapse in">
							<div class="panel-body">
								<p>
									 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
								</p>
								<p>
									 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
								</p>
								<p>
									 Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
								</p>
							</div>
						</div>
					</div>
					<div class="panel panel-success">
						<div class="panel-heading">
							<h4 class="panel-title">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#accordion3_2">
							2. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry ? </a>
							</h4>
						</div>
						<div id="accordion3_2" class="panel-collapse collapse">
							<div class="panel-body">
								 Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#accordion3_3">
							3. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor ? </a>
							</h4>
						</div>
						<div id="accordion3_3" class="panel-collapse collapse">
							<div class="panel-body">
								 Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#accordion3_4">
							4. Wolf moon officia aute, non cupidatat skateboard dolor brunch ? </a>
							</h4>
						</div>
						<div id="accordion3_4" class="panel-collapse collapse">
							<div class="panel-body">
								 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#accordion3_5">
							5. Leggings occaecat craft beer farm-to-table, raw denim aesthetic ? </a>
							</h4>
						</div>
						<div id="accordion3_5" class="panel-collapse collapse">
							<div class="panel-body">
								 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#accordion3_6">
							6. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth ? </a>
							</h4>
						</div>
						<div id="accordion3_6" class="panel-collapse collapse">
							<div class="panel-body">
								 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#accordion3_7">
							7. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft ? </a>
							</h4>
						</div>
						<div id="accordion3_7" class="panel-collapse collapse">
							<div class="panel-body">
								 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>




@stop
