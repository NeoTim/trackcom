<div class="portlet box tabbable primary">
						<div class="portlet-title line">
							<div class="caption">
								<i class="fa fa-clock-o"></i>Activities
							</div>
						</div>
						<div class="portlet-body">
							<!--BEGIN TABS-->
							<div class="portlet-tabs">
								<ul class="nav nav-tabs">
									<li><a href="#delete" data-toggle="tab">Deleted</a></li>
									<li><a href="#update" data-toggle="tab">Updates</a></li>
									<li><a href="#store" data-toggle="tab">Created</a></li>
									<li><a href="#customers" data-toggle="tab">Customers</a></li>
									<li><a href="#orders" data-toggle="tab">Orders</a></li>
									<li><a href="#production" data-toggle="tab">Production</a></li>
									<li class="active"><a href="#activities" data-toggle="tab">All Activity </a></li>
								</ul>
								<div class="tab-content no_pad" style="padding:0;">
									<div class="tab-pane active fade in" id="activities">
										<div class="scroller" style="height: auto; max-height:600px;" data-always-visible="1" data-rail-visible="0">
											<ul class="feeds">
												@foreach($activities as $act)
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																@if($act->type == 'delete')
																	<div class="label label-sm label-danger">
																@else
																	<div class="label label-sm label-{{$act->label}}">
																@endif
																	<i class="fa fa-{{$act->icon}}"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc">
																	 {{$act->message}}
																	<!-- <span class="label label-sm label-danger ">
																		 Take action <i class="fa fa-share"></i>
																	</span> -->
																</div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date">
															{{ date("h:i a",strtotime($act->created_at)) }} - {{ date("m / d / Y",strtotime($act->created_at)) }}
														</div>
														
													</div>
												</li>
												@endforeach
											</ul>
										</div>
									</div>
									<div class="tab-pane fade" id="production">
										<div class="scroller" style="height: 290px;" data-always-visible="1" data-rail-visible="0">
											<ul class="feeds">
												@foreach($production_activities as $prod)
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																@if($prod->type == 'delete')
																	<div class="label label-sm label-danger">
																@else
																	<div class="label label-sm label-{{$prod->label}}">
																@endif
																	<i class="fa fa-{{$prod->icon}}"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc">
																	 {{$prod->message}}
																	<!-- <span class="label label-sm label-danger ">
																		 Take action <i class="fa fa-share"></i>
																	</span> -->
																</div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date">
															{{ date("h:i a",strtotime($prod->created_at)) }} - {{ date("m / d / Y",strtotime($prod->created_at)) }}
														</div>
														
													</div>
												</li>
												@endforeach
											</ul>
										</div>
									</div>
									<div class="tab-pane fade" id="orders">
										<div class="scroller" style="height: 290px;" data-always-visible="1" data-rail-visible="0">
											<ul class="feeds">
												@foreach($order_activities as $order)
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																@if($order->type == 'delete')
																	<div class="label label-sm label-danger">
																@else
																	<div class="label label-sm label-{{$order->label}}">
																@endif
																	<i class="fa fa-{{$order->icon}}"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc">
																	 {{$order->message}}
																	<!-- <span class="label label-sm label-danger ">
																		 Take action <i class="fa fa-share"></i>
																	</span> -->
																</div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date">
															{{ date("h:i a",strtotime($order->created_at)) }} - {{ date("m / d / Y",strtotime($order->created_at)) }}
														</div>
														
													</div>
												</li>
												@endforeach
											</ul>
										</div>
									</div>
									<div class="tab-pane fade" id="customers">
										<div class="scroller" style="height: 290px;" data-always-visible="1" data-rail-visible="0">
											<ul class="feeds">
												@foreach($customer_activities as $customer)
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																@if($customer->type == 'delete')
																	<div class="label label-sm label-danger">
																@else
																	<div class="label label-sm label-{{$customer->label}}">
																@endif
																	<i class="fa fa-{{$customer->icon}}"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc">
																	 {{$customer->message}}
																	<!-- <span class="label label-sm label-danger ">
																		 Take action <i class="fa fa-share"></i>
																	</span> -->
																</div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date">
															{{ date("h:i a",strtotime($customer->created_at)) }} - {{ date("m / d / Y",strtotime($customer->created_at)) }}
														</div>
														
													</div>
												</li>
												@endforeach
											</ul>
										</div>
									</div>
									<div class="tab-pane fade" id="store">
										<div class="scroller" style="height: 290px;" data-always-visible="1" data-rail-visible="0">
											<ul class="feeds">
												@foreach($stores as $store)
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																<div class="label label-sm label-{{$store->label}}">
																	<i class="fa fa-{{$store->icon}}"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc">
																	 {{$store->message}}
																	<!-- <span class="label label-sm label-danger ">
																		 Take action <i class="fa fa-share"></i>
																	</span> -->
																</div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date">
															{{ date("h:i a",strtotime($store->created_at)) }} - {{ date("m / d / Y",strtotime($store->created_at)) }}
														</div>
														
													</div>
												</li>
												@endforeach
											</ul>
										</div>
									</div>
									<div class="tab-pane fade" id="update">
										<div class="scroller" style="height: 290px;" data-always-visible="1" data-rail-visible="0">
											<ul class="feeds">
												@foreach($updates as $update)
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																<div class="label label-sm label-{{$update->label}}">
																	<i class="fa fa-{{$update->icon}}"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc">
																	 {{$update->message}}
																	<!-- <span class="label label-sm label-danger ">
																		 Take action <i class="fa fa-share"></i>
																	</span> -->
																</div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date">
															{{ date("h:i a",strtotime($update->created_at)) }} - {{ date("m / d / Y",strtotime($update->created_at)) }}
														</div>
														
													</div>
												</li>
												@endforeach
											</ul>
										</div>
									</div>
									<div class="tab-pane fade" id="delete">
										<div class="scroller" style="height: 290px;" data-always-visible="1" data-rail-visible="0">
											<ul class="feeds">
												@foreach($deletes as $delete)
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																<div class="label label-sm label-{{$delete->label}}">
																	<i class="fa fa-{{$delete->icon}}"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc">
																	 {{$delete->message}}
																	<!-- <span class="label label-sm label-danger ">
																		 Take action <i class="fa fa-share"></i>
																	</span> -->
																</div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date">
															{{ date("h:i a",strtotime($delete->created_at)) }} - {{ date("m / d / Y",strtotime($delete->created_at)) }}
														</div>
														
													</div>
												</li>
												@endforeach
											</ul>
										</div>
									</div>
									
								</div>
							</div>
							<!--END TABS-->
						</div>
					</div>