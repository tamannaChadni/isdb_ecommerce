@extends('layouts.front')

@section('title')
    {{ $category->name }}
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning borde-top">
        <div class="container">
            <h6 class="mb-0">Collection/{{ $category->name }}</h6>
        </div>
    </div>
    <div class="py-5">
        <div class="container">
            <div class="row g-4">
                <h2 class="text-center"> {{ $category->name }}</h2>
                @foreach ($products as $prod)
                    <div class="col-md-3">
                        <div class="card h-100">
                            <a href="{{ url('category/' . $category->slug . '/' . $prod->slug) }}">
                                <img height="300" class="w-100"
                                    src="{{ asset('assets/uploads/product/' . $prod->image) }}" alt="product image"
                                    srcset="">
                                <div class="card-body">
                                    <h5 class="card-title text-center ">{{ $prod->name }}</h5>
                                    <p class="card-text">{{ $prod->description }}</p>
                                    {{-- <p class="card-text">{{ $prod->description }}</p> --}}
                                    <span class="float-start">{{ $prod->original_price }}</span>
                                    <span class="float-end"><s>{{ $prod->selling_price }}</s></span>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
