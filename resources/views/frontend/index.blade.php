@extends('layouts.front')

@section('title')
    Isdb_Ecommerce
@endsection

@section('content')

    @include('layouts.inc.frontslider')
    <div class="py-5">
        <div class="container">
            <h2 class="text-center"> Feature Product</h2>
            <div class="owl-carousel feature-carousel owl-theme">
                @foreach ($feature_products as $prod)
                    <div class="card">
                        <img height="300" src="{{ asset('assets/uploads/product/' . $prod->image) }}" alt="product image"
                            srcset="">
                        <div class="card-body">
                            <h5 class="card-title text-center ">{{ $prod->name }}</h5>
                            <span class="float-start">{{ $prod->original_price }}</span>
                            <span class="float-end"><s>{{ $prod->selling_price }}</s></span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- For using trending category --}}
    <div class="py-5">
        <div class="container">
            <h2 class="text-center"> Trending Category</h2>
            <div class="owl-carousel feature-carousel owl-theme">
                @foreach ($feature_category as $cat)
                    <div class="card">
                        <img height="300" src="{{ asset('assets/uploads/category/' . $cat->image) }}" alt="product image"
                            srcset="">
                        <div class="card-body">
                            <h5 class="card-title text-center ">{{ $cat->name }}</h5>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{-- For using trending category --}}


@endsection
@section('scripts')
    <script>
        $('.feature-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 3
                }
            }
        })
    </script>
@endsection
