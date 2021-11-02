@extends('layouts.front')

@section('title')
    Category
@endsection

@section('content')
    <div class="py-5">
        <div class="container">
            <h1 class="text-center">All Category</h1>
            <div class="row g-4">
                @foreach ($category as $cate)
                    <div class="col-md-4">
                        {{-- <a href="{{ url('view_category/'.$cate->slug) }}"> --}}
                        <div class="card h-100">
                            <img height="300" src="{{ asset('assets/uploads/category/' . $cate->image) }}"
                                class="card-img-top w-100" alt="image here">
                            <div class="card-body">
                                <h5 class="card-title">{{ $cate->name }}</h5>
                                <p class="card-text">{{ $cate->description }}</p>
                                <a href="{{ url('view_category/' . $cate->slug) }}" class="btn btn-primary">For
                                    details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
