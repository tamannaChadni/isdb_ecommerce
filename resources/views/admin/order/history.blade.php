@extends('layouts.admin')

@section('title')
    order
@endsection

@section('content')
<div class="contaoner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Order History
                        <a href="{{ 'order' }}" class="btn btn-primary float-end">New order</a>
                    </h4>
                </div>
                   <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                {{-- <th scope="col">Tracking number</th>
                                <th scope="col">Total price</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th> --}}
                                <th>Tracking number</th>
                                <th>Total price</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $item)
                                <tr>
                                    {{-- <td>{{ $item->tracking_no }}</td>
                                    <td>{{ $item->total_price }}</td>
                                    <td>{{ $item->status == '0'? 'pending': 'completed' }}</td>
                                    <td>
                                        <a href="{{ url('admin/view-order/'.$item->id) }}" class="btn btn-primary">view</a>
                                    </td> --}}
                                    <td>{{ $item->prod_id }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>
                                        <a href="{{ url('admin/view-order/'.$item->id) }}" class="btn btn-primary">view</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
      
</div>


    
@endsection