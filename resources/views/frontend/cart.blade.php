@extends('layouts.front')

@section('title')
    My cart
@endsection

@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning borde-top">
    <div class="container">
        <h6 class="mb-0">Collection/Home/Cart</h6>
    </div>
</div>
    <div class="container my-5">
        <div class="card shadow prod_data">
            <div class="card-body">
                @php $total = 0; @endphp
                @foreach ($cartitems as $item)
                <div class="row">
                    <div class="col-md-2 my-auto">
                        <img src="{{ asset('assets/uploads/product/'.$item->products->image) }}" height="70px" width="70px" alt="image here">
                    </div>
                    <div class="col-md-3 my-auto">
                        <h6>{{ $item->products->name }}</h6>
                    </div>
                    <div class="col-md-2 my-auto">
                        <h6>{{ $item->products->original_price }}</h6>
                    </div>

                    <div class="col-md-3 my-auto">
                        <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                        <label for="Quantity">Quantity</label>
                        <div class="input-group text-center mb-3">
                            <button class="input-group-text changeQuanlity decrement-btn ">-</button>
                            <input type="text" class="form-control qty-input text-center" name="Quatity" value="{{ $item->prod_qty }}">
                            <button class="input-group-text changeQuanlity increment-btn">+</button>
                        </div>
                    </div>
                    <div class="col-md-2 my-auto">
                        <button type="button" class="btn btn-danger delete-cart-item"><i class="fa fa-trash"></i> Remove
                        </button>
                    </div>
                </div>
                @php $total += $item->products->original_price*$item->prod_qty; @endphp
                @endforeach
            </div>
            <div class="card-footer">
                <h6> Total Price:RS {{ $total }}
                    <a href="{{ url('checkout') }}" type="button" class="btn btn-outline-info float-end">Checkout</a>
                </h6>


            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.increment-btn').click(function(e) {
                e.preventDefault();
                // var inc_value = $('.qty-input').val();
                var inc_value = $(this).closest('.prod_data').find('.qty-input').val();
                var value = parseInt(inc_value, 10);
                value = isNaN(value) ? 0 : value;
                if (value < 10) {
                    value++;
                    // $('.qty-input').val(value);
                    $(this).closest('.prod_data').find('.qty-input').val(value);
                }
            });
            $('.decrement-btn').click(function(e) {
                e.preventDefault();
                var dec_value = $(this).closest('.prod_data').find('.qty-input').val();
                // var dec_value = $('.qty-input').val();
                var value = parseInt(dec_value, 10);
                value = isNaN(value) ? 0 : value;
                if (value > 1) {
                    value--;
                    // $('.qty-input').val(value);
                    $(this).closest('.prod_data').find('.qty-input').val(value);
                }
            });
            $('.delete-cart-item').click(function (e) {
                e.preventDefault();
                var prod_id = $(this).closest('.prod_data').find('.prod_id').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: "POST",
                    url: "delete-cart-item",
                    data: {
                        'prod_id':prod_id,
                    },

                    success: function (response) {
                        window.location.reload();
                        swal("",response.status,"success");
                    }
                });
            });
            $('.changeQuanlity').click(function (e) {
                e.preventDefault();

                var prod_id = $(this).closest('.prod_data').find('.prod_id').val();
                var qty = $(this).closest('.prod_data').find('.qty-input').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: "POST",
                    url: "update-cart",
                    data: {
                        'prod_id':prod_id,
                        'prod_qty': qty,

                    },

                    success: function (response) {
                       window.location.reload();
                    }
                });

            });
        });
    </script>
@endsection
