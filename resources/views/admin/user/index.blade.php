@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h3>Register Page</h3>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $item)
                
                <tr>
                    <td>{{$item->id}} </td>
                    <td>{{$item->name}} </td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->phone}}</td>

                    <td>
                        <a href="{{url('view-user/'.$item->id)}}" class="btn btn-warning">View</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>


@endsection