@extends('layouts.front')

@section('title')
    My orders
@endsection

@section('content')


    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>My orders</h4>
                    </div>
                       <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Tracking number</th>
                                    <th scope="col">Total price</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order as $item)
                                    <tr>
                                        <td>{{ $item->tracking_no }}</td>
                                        <td>{{ $item->total_price }}</td>
                                        <td>{{ $item->status == '0'? 'pending': 'completed' }}</td>
                                        <td>
                                            <a href="{{ url('view-order/'.$item->id) }}" class="btn btn-primary">view</a>
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
