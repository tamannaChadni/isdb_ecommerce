@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h3>Category Page</h3>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($category as $item)
                
                <tr>
                    <td>{{$item->id}} </td>
                    <td>{{$item->name}} </td>
                    <td>
                        <img src="{{asset('assets/uploads/category/'.$item->image)}}" class="w-25" alt="image here" srcset=""></td>
                    <td>{{$item->description}}</td>
                    <td>
                        <a href="{{url('edit_category/'.$item->id)}}" class="btn btn-warning">Edit</a>
                        <a href="{{url('category-delete/'.$item->id)}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>


@endsection