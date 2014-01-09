@extends('layouts.blueprint')
@section('page_title')
	{{$product->sku}}
@stop
@section('header')
	<div class="row">
		<div class="col-md-12">
			<!-- BEGIN PAGE TITLE & BREADCRUMB-->
			<blockquote><h3 class="page-title">
				{{$product->name}}
			</h3></blockquote>
			<ul class="page-breadcrumb breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a href="{{URL::to('/')}}">HIS</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="{{URL::to('dashboard')}}">Dashboard</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="{{URL::to('products')}}">products</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="{{ URl::to('products/' . $product->id) }}">{{$product->sku}}</a>
					
				</li>
					
			</ul>
							
		</div>
	</div>
<div class="clearfix"></div>
	<div class="row">
		<div class='col-md-12'>	
			<div class="dashboard-stat bg-dark">
				<div class="visual">
					<i class="fa fa-tag"></i>
				</div>
				<div class="details">
					<div class="number">
						
						{{{$product->sku}}}
						
					</div>
					<div class="desc">
						{{{$product->fullname}}}
					</div>
				</div>
				<a href="{{ URL::to('products') }}" class="more" style="background-color:#444444;" >
				View Products <i class="m-icon-swapright m-icon-white"></i>
				</a>
			</div>

		</div>
	</div>	
@stop
@section('content')

	<div class='well'>


		
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover table-full-width dataTable" id="sample_2" aria-describedby="sample_2_info" style="width: 1060px;">
				<thead>
					<tr>
						<th style="width:150px;">Product</th>
						<th>{{{$product->sku}}}</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td style="width:150px;">SKU:</td>
						<td>{{{ $product->sku }}}</td>
					</tr>
					<tr>
						<td style="width:150px;">Name:</td>
						<td>{{{ $product->name }}}</td>
					</tr>
					<tr>
						<td style="width:150px;">Full Name:</td>
						<td>{{{ $product->fullname }}}</td>
					</tr>
					<tr>
						<td style="width:150px;">Formula:</td>
						<td>{{{ $product->formula }}}</td>
					</tr>
					<tr>
						<td style="width:150px;">Description:</td>
						<td>{{{ $product->desc }}}</td>
					</tr>
					<tr>
						<td style="width:150px;">File</td>
						<td>
							<img style="width:100%; position:relative;" src="{{ $product->file }}">
						</td>
					</tr>
				</tbody>
						
			</table>
		</div>
		<div class="row">
			<div class="col-md-12">									
                <div class="btn-group">
                    {{ Form::open(array('method' => 'DELETE', 'route' => array('products.destroy', $product->id))) }}
                		{{ link_to_route('products.edit', 'Edit', array($product->id), array('class' => 'btn btn-info')) }}</td>
                        {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                    {{ Form::close() }}
                </div>
			</div>
		</div>
	</div>

@stop
@section('page_scripts')
<script type="text/javascript">

	

</script>
@stop
