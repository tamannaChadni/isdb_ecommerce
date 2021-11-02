@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h3>Edit Product</h3>
    </div>
    <div class="card-body">
        <form action="{{url('update-product/'.$products->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12 mb-3">
                    <select class="form-select">
                        <option value="">{{$products->category->name}}</option> 
                      </select>

                </div>

                <div class="col-md-6 mb-3">
                    <label for="">Name</label>
                    <input type="text" value="{{$products->name}}" class="form-control" name="name">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Slug</label>
                    <input type="text" value="{{$products->slug}}" class="form-control" name="slug">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Small_Description</label>
                 <textarea name="small_description" rows="" class="form-control">{{$products->small_description}}</textarea>
                 </div>

                 <div class="col-md-12 mb-3">
                    <label for="">Description</label>
                 <textarea name="description" rows="" class="form-control">{{$products->description}}</textarea>
                 </div>
                 <div class="col-md-6 mb-3">
                    <label for="">Original_price</label><br>
                    <input type="number" value="{{$products->original_price}}"name="original_price">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Selling_price</label><br>
                    <input type="number"value="{{$products->selling_price}}" name="selling_price">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Qty</label><br>
                    <input type="number" value="{{$products->qty}}" name="qty">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Tax</label><br>
                    <input type="number"value="{{$products->tax}}" name="tax">
                </div>


                 <div class="col-md-6 mb-3">
                     <label for="">Status</label>
                     <input type="checkbox"{{$products->status == "1" ? 'checked':''}} name="status">
                 </div>
                 <div class="col-md-6 mb-3">
                    <label for="">Trending</label>
                    <input type="checkbox"{{$products->trending == "1" ? 'checked':''}}name="trending">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta_title</label>
                    <input type="text" value="{{$products->meta_title}}"class="form-control" name="meta_title">
                    
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta_description</label>
                    <textarea name="meta_description" rows="3" class="form-control">{{$products->meta_description}}</textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta_keywords</label>
                    <textarea name="meta_keywords" rows="3" class="form-control">{{$products->meta_keywords}}</textarea>
                </div>
                @if ($products->image)
                <img src="{{asset('assets/uploads/product/'.$products->image)}}" alt="image here" srcset="">
                    
                @endif
                <div class="col-md-12">
                    <input type="file" name="image" class="form-control">
                </div>
                
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>

    </div>

</div>

    
@endsection