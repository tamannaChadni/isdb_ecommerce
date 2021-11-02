@extends('layouts.front')

@section('title', $products->name)

@section('content')
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ url('/add-rating') }}" method="POST">
                    @csrf
                    <input type="hidden" name="prod_id" value=" {{ $products->id }}">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Rate this {{ $products->name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="rating-css">
                            <div class="star-icon">
                                <input type="radio" value="1" name="product_rating" checked id="rating1">
                                <label for="rating1" class="fa fa-star"></label>
                                <input type="radio" value="2" name="product_rating" id="rating2">
                                <label for="rating2" class="fa fa-star"></label>
                                <input type="radio" value="3" name="product_rating" id="rating3">
                                <label for="rating3" class="fa fa-star"></label>
                                <input type="radio" value="4" name="product_rating" id="rating4">
                                <label for="rating4" class="fa fa-star"></label>
                                <input type="radio" value="5" name="product_rating" id="rating5">
                                <label for="rating5" class="fa fa-star"></label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="py-3 mb-4 shadow-sm bg-warning borde-top">
        <div class="container">
            <h6 class="mb-0">Collection/{{ $products->category->name }}/{{ $products->name }}</h6>
        </div>
    </div>
    <div class="container">
        <div class="card shadow prod_data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <img src="{{ asset('assets/uploads/product/' . $products->image) }}" class="w-100" alt=""
                            srcset="">
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-0">
                            {{ $products->name }}
                            @if ($products->trending == '1')
                                <label style="font-size:16px"
                                    class="float-end badge bg-danger trending_tag">Trending</label>
                            @endif
                        </h2>
                        <hr>

                        <label class="me-3">Selling price: <s>RS {{ $products->selling_price }}</s></label>
                        <label class="fw-bold">Original price: RS {{ $products->original_price }}</label>
                        <div class="rating">
                            <span> Rating : {{ $rating->count() }} </span>
                            @php
                                $totalRating = 0;
                            @endphp
                            @foreach ($rating as $rate)
                                @php
                                    $totalRating += $rate['star_rated'];
                                @endphp
                            @endforeach
                            @for ($i = 1; $i <= $totalRating; $i++)
                                <i class="fa fa-star text-warning"></i>
                            @endfor
                        </div>
                        <p class="mt-3">{{ $products->small_description }}</p>
                        <hr>
                        @if ($products->qty > 0)
                            <label class="badge bg-success">In stock</label>
                        @else
                            <label class="badge bg-danger">Out of stock</label>
                        @endif
                        <div class="row mt-2">
                            <div class="col-md-2">
                                <input type="hidden" class="prod_id" value="{{ $products->id }}">
                                <label for="Quantity">Quantity</label>
                                <div class="input-group text-center mb-3">
                                    <button class="input-group-text decrement-btn ">-</button>
                                    <input type="text" class="form-control qty-input text-center" name="Quatity" value="1">
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <br />
                                <button type="button" class="btn btn-success me-3 addToWishlist float-start">Add to wishlist
                                    <i class="fa fa-heart"></i></button>
                                <button type="button" class="btn btn-primary me-3 addToCartBtn float-start">Add to cart <i
                                        class="fa fa-shopping-cart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Rate this product
                </button>
                <a href="{{ url('add-review/' . $products->slug . '/userreview') }}" class="btn btn-primary">
                    Review this product
                </a>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            loadcart();
            loadwishlist();

            function loadcart() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: "GET",
                    url: "/load-cart-data",

                    success: function(response) {
                        $('.cart-count').html('');
                        $('.cart-count').html(response.count);

                    }
                });

            }

            function loadwishlist() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: "GET",
                    url: "/load-wishlist-data",

                    success: function(response) {
                        $('.wishlist-count').html('');
                        $('.wishlist-count').html(response.count);

                    }
                });

            }











            $('.addToCartBtn').click(function(e) {
                e.preventDefault();
                var product_id = $(this).closest('.prod_data').find('.prod_id').val();
                var product_qty = $(this).closest('.prod_data').find('.qty-input').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: "POST",
                    url: "/add-to-cart",
                    data: {
                        'product_id': product_id,
                        'product_qty': product_qty,
                    },
                    success: function(response) {
                        swal(response.status);
                        // alert(response.status);
                        // console.log(response);
                        loadcart();
                    }
                });
            });


            $('.addToWishlist').click(function(e) {
                e.preventDefault();
                var product_id = $(this).closest('.prod_data').find('.prod_id').val();
                // console.log(product_id);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: "POST",
                    url: "/add-to-wishlist",
                    data: {
                        'product_id': product_id,

                    },
                    success: function(response) {
                        swal(response.status);
                        loadwishlist();
                    }
                });
            });
            $('.removeWishlist').click(function(e) {
                e.preventDefault();
                var product_id = $(this).closest('.prod_data').find('.prod_id').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: "POST",
                    url: "/delete-to-wishlist",
                    data: {
                        'product_id': product_id,

                    },
                    success: function(response) {
                        swal(response.status);
                        // alert(response.status);
                        // console.log(response);
                    }
                });
            });










            $('.increment-btn').click(function(e) {
                e.preventDefault();
                var inc_value = $('.qty-input').val();
                var value = parseInt(inc_value, 10);
                value = isNaN(value) ? 0 : value;
                if (value < 10) {
                    value++;
                    $('.qty-input').val(value);
                }
            });
            $('.decrement-btn').click(function(e) {
                e.preventDefault();
                var dec_value = $('.qty-input').val();
                var value = parseInt(dec_value, 10);
                value = isNaN(value) ? 0 : value;
                if (value > 1) {
                    value--;
                    $('.qty-input').val(value);
                }
            });
        });
    </script>
@endsection
