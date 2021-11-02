@extends('layouts.front')

@section('title')
    My cart
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning borde-top">
        <div class="container">
            <h6 class="mb-0">Collection/Home/Wishlist</h6>
        </div>
    </div>
    <div class="container my-5">
        <div class="card shadow">
            <div class="card-body">
                @if ($wishlist->count() > 0)
                    @foreach ($wishlist as $item)
                        <div class="row">
                            <div class="col-md-2 my-auto">
                                <img src="{{ asset('assets/uploads/product/' . $item->products->image) }}" height="70px"
                                    width="70px" alt="image here">
                            </div>
                            <div class="col-md-3 my-auto">
                                <h6>{{ $item->products->name }}</h6>
                            </div>
                            <div class="col-md-2 my-auto">
                                <h6>{{ $item->products->original_price }}</h6>
                            </div>

                            <div class="col-md-3 my-auto">
                                <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                                {{-- @if ($item->products->qty >= $item->prod_qty) --}}
                                <h6>Available in stock</h6>
                                    
                                {{-- @else --}}
                                   {{-- <h6>Out of stock</h6>  --}}
                                {{-- @endif --}}

                            </div>
                            
                            <div class="col-md-2 my-auto">
                                <button type="button" class="btn btn-danger removeWishlist "><i class="fa fa-trash"></i> Remove
                                </button>
                            </div>
                        </div>

                    @endforeach

                @else
                    <h4>There is no product on your wishlist</h4>
                @endif
            </div>
        </div>
    </div>
@endsection
