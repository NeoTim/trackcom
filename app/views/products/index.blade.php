@extends('layouts.blueprint')
@section('page_title')
	Products
@stop
@section('header')
	<div class="row">
		<div class="col-md-12">
			<!-- BEGIN PAGE TITLE & BREADCRUMB-->
			<blockquote><h3 class="page-title">
				Products
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
					<a href="{{ URl::to('products') }}">Products</a>
					
				</li>
					
			</ul>
							
		</div>
	</div>
<div class="clearfix"></div>
	<div class="row">
		<div class='col-md-12'>	
			<div class="dashboard-stat green">
				<div class="visual">
					<i class="fa fa-tag"></i>
				</div>
				<div class="details">
					<div class="number">
						
						{{count($products)}}
						
					</div>
					<div class="desc">
						Total Products
					</div>
				</div>
				<a href="{{ URL::to('products/create') }}" class="more" >
				Add Products <i class="m-icon-swapright m-icon-white"></i>
				</a>
			</div>

		</div>
	</div>	
@stop

@section('content')
		<div class=" aligncenter">
			<div class=" aligncenter" style="text-align:center;"><a href="{{ URL::to('products/create')}}" class="btn btn-primary aligncenter">Add Product</a></div>
		</div>
		<br />
		<br />				
	
		@if ($products->count())
	<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover table-full-width dataTable" id="sample_2" aria-describedby="sample_2_info" style="width: 1060px;">
				<thead>
					<tr>
						<th>Sku</th>
						<th>Name</th>
						<th>Fullname</th>
						<th>Desc</th>
						<th>File</th>
						<th style="width:200px;">OPtions</th>
					</tr>
				</thead>
		
				<tbody>
					@foreach ($products as $product)
						<tr>
							<td>{{{ $product->sku }}}</td>
							<td>{{{ $product->name }}}</td>
							<td>{{{ $product->fullname }}}</td>
							<td>{{{ $product->desc }}}</td>
							<td>{{{ $product->file }}}</td>
		                    <td style="min-width:200px;">
		                         	
		                    	<div class="btn-group">
		                    			{{ link_to_route('products.edit', 'Edit', array($product->id), array('class' => 'btn btn-info')) }}
		                            	<button class="btn btn-danger" id="DPbtn_{{{$product->id}}}" data-toggle="modal" data-target="#delete_modal">Delete</button>
		                        </div>
		                        	
		                    </td>
						</tr>
					@endforeach
				</tbody>
			</table>
	</div>
		@else
			There are no products
		@endif
<div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-wide">
    <div class="modal-content">
      <div class="modal-header">
      	{{ Form::open(array('id' => 'delete_form', 'method' => 'DELETE', 'route' => array('products.destroy'))) }}
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h2 class="modal-title" id="productModalLabel">Delete Product</h2>
      </div>
						
      <div class="modal-body">	                        	
      	<h4 id=""> Are you Sure you want to Delete <strong id="delete_message"></strong></h4>
      	
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
			
@stop
@section('page_scripts')
<script type="text/javascript">

	$(document).ready(function(){
		var products = {{$products}};

		$.each($(products), function(i, product){
			$("#DPbtn_" + product.id).click(function(){
				$("#delete_modal form").attr("action", "{{{URL::to('products')}}}/" + product.id);
				$("#delete_message").text(product.sku);
				console.log(product.sku);
			});
		});
	});

</script>
@stop
