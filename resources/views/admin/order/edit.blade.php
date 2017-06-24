@extends('admin.layout.app')

@section('content')

	<div class="content-wrapper" style="background-color: white;">
		<div style="padding: 10px 0px 0px 20px;">
			<div>
				@if(count($errors) > 0)
					<div class="alert alert-warning" id="success-alert">
					    <button type="button" class="close" data-dismiss="alert">x</button>
					    <ul>
					    	@foreach($errors->all() as $error)
					        	<li>{{ $error }}</li>
					    	@endforeach
					    </ul>	
					</div>
				@endif
			</div>
			{{ Form::model($product, array('url' => 'admin/bf/edit', 'id' => 'formvalidate','files'=>true, 'method' => 'POST', 'enctype'=>'multipart/form-data')) }}
		    	{{ csrf_field() }}
			    <div class="form-group row">
				  <label for="example-text-input" class="col-sm-2">Categories</label>
				  <div class="col-sm-5">
				  	<input type="hidden" name="id" value="{{$product->id}}"></input>
				  {{ Form::select('categories', array('nature' => 'Nature', 'watches' => 'Watches'),null, array('class' => 'form-control')) }}
				  </div>
				</div>
				<div class="form-group row">
					<label for="example-text-input" class="col-sm-2">Image</label>
					<div class="col-sm-5">
					  	{{ Form::file('updateImage', array('class' => 'form-control', )) }}
					  	<div style="margin-top: 5px;">
						  	<a href="{{asset($product->big_img)}}" target="_blank"><img src="{{asset($product->big_img)}}" style="width: 50px; height: 50px;"/></a>
						</div>  	
					</div>
				</div>
				<div class="form-group row">
					<label for="example-text-input" class="col-sm-2">Price</label>
				  	<div class="col-sm-5">
				  		{{ Form::input('number','price',null, array('class' => 'form-control' )) }}
				  	</div>
				</div>
				<div class="form-group row">
					<label for="example-text-input" class="col-sm-2"></label>
				    <div class="col-sm-5">
				    	<button type="submit" class="btn btn-default">Submit</button>
			    	</div>
			    </div>
		  	{{ Form::close() }}
		</div>
	</div>	
@stop