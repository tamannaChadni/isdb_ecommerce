@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h3>Edit Category</h3>
    </div>
    <div class="card-body">
        <form action="{{url('update-category/'.$category->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="">Name</label>
                    <input type="text" value="{{$category->name}}" class="form-control" name="name">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Slug</label>
                    <input type="text" value="{{$category->slug}}" class="form-control" name="slug">
                </div>
                 <div class="col-md-12 mb-3">
                    <label for="">Description</label>
                 <textarea name="description" rows="" class="form-control">{{$category->description}}</textarea>
                 </div>
                 <div class="col-md-6 mb-3">
                     <label for="">Status</label>
                     <input type="checkbox" {{$category->status == "1" ? 'checked':''}} name="status">
                 </div>
                 <div class="col-md-6 mb-3">
                    <label for="">Popular</label>
                    <input type="checkbox" {{$category->popular == "1" ? 'checked':''}} name="popular">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta_title</label>
                    <input type="text" value="{{$category->meta_title}}" class="form-control" name="meta_title">
                    
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta_descrip</label>
                    <textarea name="meta_descrip" rows="3" class="form-control">{{$category->meta_descrip}}</textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta_keywords</label>
                    <textarea name="meta_keywords" rows="3" class="form-control">{{$category->meta_keywords}}</textarea>
                </div>
                @if ($category->image)
                <img src="{{asset('assets/uploads/category/'.$category->image)}}" alt="image here" srcset="">
                    
                @endif
                <div class="col-md-12">
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>

    </div>

</div>

    
@endsection