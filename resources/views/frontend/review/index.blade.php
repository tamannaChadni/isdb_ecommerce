@extends('layouts.front')

@section('title', "Write a review")

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if ($verified_purchase->count()>0)
                        <h5>You are writing a review for {{ $product->name }}</h5>
                        <form action="{{ url('/add-review') }}" method="POST"></form>
                        @csrf
                        <input type="hidden" name="prod_id" value="{{ $product->id }}">
                        <textarea name="prod_review" rows="5" class="form-control" placeholder="write some review"></textarea>
                        <button type="submit" class="btn btn-info mt-5">Submit review</button>
                    @else
                       <div class="alert alert-danger">
                            <h5>you are not eligible for writing a review</h5>
                            <a href="{{ url('/') }}" class="btn btn-secondary mt-5">Go to home page</a>
                        </div> 
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


@endsection