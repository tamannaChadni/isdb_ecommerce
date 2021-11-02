@extends('layouts.front')

@section('title')
    Checkout
@endsection

@section('content')
    <div class="container mt-5">
        <form action="{{ url('place-order') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h6>Basic details</h6>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 mt-3">
                                    <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}"
                                        placeholder="First name">
                                </div>
                                {{-- <div class="col-md-6 mt-3">
                                    <input type="text" class="form-control" placeholder="Last name">
                                </div> --}}
                                {{-- <div class="col-md-6 mt-3">
                                    <input type="text" class="form-control" placeholder="Email">
                                </div> --}}
                                <div class="col-md-6 mt-3">
                                    <input type="text" class="form-control" name="phone"
                                        value="{{ Auth::user()->phone }}" placeholder="Phone number">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <input type="text" class="form-control" name="address"
                                        value="{{ Auth::user()->address }}" placeholder="Address">
                                </div>
                                {{-- <div class="col-md-6 mt-3">
                                    <input type="text" class="form-control" placeholder="City">
                                </div> --}}
                                {{-- <div class="col-md-6 mt-3">
                                    <input type="text" class="form-control" placeholder="Thana">
                                </div> --}}
                                {{-- <div class="col-md-6 mt-3">
                                    <input type="text" class="form-control" placeholder="Pincode">
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h6>Order details</h6>
                            <hr>
                            <table class="table table-secondary">
                                <tbody>
                                    <thead>
                                        <th>Name</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                    </thead>
                                    @foreach ($cartitems as $item)
                                        <tr>
                                            <td>{{ $item->products->name }}</td>
                                            <td>{{ $item->prod_qty }}</td>
                                            <td>{{ $item->products->original_price }}</td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <hr>
                            <button type="submit" class="btn btn-success float-end">Place order</button>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>





@endsection
