@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

<div class="card">
    <div class="card-header">
        <h3>User details</h3>
        <a href="{{ url('user') }}" class="btn btn-success btn-sm float-end">Back</a>
    </div>

</div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4 mt-3">
                <label for="">Role</label>
                <div class="border p-2">{{ $user->role_as == '0'? 'User':'Admin' }}</div>
            </div>
            <div class="col-md-4 mt-3">
                <label for="">Name</label>
                <div class="border p-2">{{ $user->name }}</div>
            </div>
            <div class="col-md-4 mt-3">
                <label for="">E-mail</label>
                <div class="border p-2">{{ $user->email }}</div>
            </div>
            <div class="col-md-4">
                <label for="">Phone</label>
                <div class="border p-2">{{ $user->phone }}</div>
            </div>
            <div class="col-md-4">
                <label for="">Address</label>
                <div class="border p-2">{{ $user->address }}</div>
            </div>
        </div>
        
    </div>

</div>
</div>
</div>


@endsection