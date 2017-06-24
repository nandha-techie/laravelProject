@extends('admin.layout.app')

@section('content')
	<div class="content-wrapper" style="background-color: white;">
		<div style="padding: 10px 0px 0px 20px;">
			<a class="btn btn-primary" href="{{url('admin/bf/add')}}">ADD</a>
		</div>
		<div style="padding: 10px 0px 0px 20px;">
			<table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                	 @if(!$productList->isEmpty())
	                	@foreach($productList as $list)
		                    <tr>
		                        <td><img src="{{asset($list->big_img)}}" style="width: 30px; height: 30px;"></td>
		                        <td>{{$list->price}}</td>
		                        <td>{{$list->categories}}</td>
		                        <td><a class="btn btn-primary" href="{{ url('admin/bf/edit', [ 'id' => $list->id, ])}}"><i class="fa fa-edit fa-lg"></i></a>
	                            <a class="btn btn-danger" onClick="return confirm('Are you sure?')" href="{{ url('/admin/bf/delete',[ 'id' => $list->id, ])}}"><i class="fa fa-trash-o fa-lg"></i></a></td>
		                    </tr>
		                @endforeach   
		            @endif     
                </tbody>
            </table>
            {{ $productList->render() }}
		</div>
	</div>
@stop