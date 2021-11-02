@extends('layouts.admin')

@section('title')
    My orders
@endsection

@section('content')


    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Orers view</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Shopping details</h4>
                                <label for="">Name</label>
                                <div class="border p-2">{{ $order->name }}</div>
                                <label for="">Phone Number</label>
                                <div class="border p-2">{{ $order->phone }}</div>
                                <label for="">Address</label>
                                <div class="border p-2">{{ $order->address }}</div>

                            </div>
                            <div class="col-md-6">
                                <h4>Order details</h4>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Quality</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Image</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->order_item as $item)
                                            <tr>
                                                <td>{{ $item->products->name }}</td>
                                                <td>{{ $item->qty }}</td>
                                                <td>{{ $item->price }}</td>
                                                <td>
                                                    <img src="{{ asset('assets/uploads/product/' . $item->products->image) }}"
                                                        width="50px" alt="image here">


                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                <h4 class="px-2">Grand totall :<span class="float-end"> {{ $order->total_price }} </span></h4>
                               <div class="mt-5 p-2">
                                {{-- <label for="">Order Status</label><br>
                                <form action="{{ url('upadte-order/'.$order->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                <select class="form-select" name="order_status">
                                    <option {{ $order->status == '0'?'selected':'' }} value="0">Pending</option>
                                    <option {{ $order->status == '1'?'selected':'' }} value="1">Complete</option>
                                    
                                  </select>
                               </div>
                               <button type="submit" class="btn btn-primary float-end">Update</button>
                            </form> --}}

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
