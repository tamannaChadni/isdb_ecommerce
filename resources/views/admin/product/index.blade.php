@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h3>Product Page</h3>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category_name</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Selling_price</th>
                    <th>Original_price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $item)
                
                <tr>
                    <td>{{$item->id}} </td>
                    <td>{{$item->name}} </td>
                    <td>{{$item->category->name}}</td>
                    <td>
                        <img src="{{asset('assets/uploads/product/'.$item->image)}}" class="w-25" alt="image here" srcset=""></td>
                    <td>{{$item->description}}</td>
                    <td>{{$item->selling_price}}</td>
                    <td>{{$item->original_price}}</td>
                    <td>
                        <a href="{{url('edit_product/'.$item->id)}}" class="btn btn-warning">Edit</a>
                        <a href="{{url('product-delete/'.$item->id)}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>


@endsection