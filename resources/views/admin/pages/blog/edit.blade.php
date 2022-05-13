@extends('admin.layouts.master')
@section('title','Update Blog Post')
@section('content')
<div class="content pt-5">
    
    <div class="mx-n6 bg-white px-6 pt-5 py-5 border-y border-300">
        <div class="row">
            <h3 class="mb-5">Edit A New Post</h3>
            <a class="btn" href="{{ route('admin.blog.index') }}">Go Back</a>


            <form action="{{ route('admin.blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-md-12 position-relative">
                    <label class="form-label" for="validationTooltip01"> Title</label> 
                    <input class="form-control" name="title" value="{{ $blog->title }}" placeholder="Enter Blog Title" id="validationTooltip01" required="">
                </div>
                <div class="col-md-12 position-relative">
                    <label class="form-label" for="c"> Category</label> 
                    <select name="category_id" id="c" class="form-control" required>
                        <option value="">Select Category</option>
                        @foreach ($getActiveCategory as $item)

                            <option {{ ($item->id == $blog->category_id ? 'selected': '') }} value="{{ $item->id }}">{{ $item->category }}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-sm btn-phoenix-secondary bg-white hover-bg-100" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add New Category</button>
                    
                </div>
                <div class="row">
                <div class="col-md-8 position-relative">
                    <label class="form-label" for="inp_editor1"> Article</label> 
                    <textarea name="article" id="inp_editor1" required class="form-control" cols="30" rows="10">{{ $blog->article }}</textarea>
                </div>
                <div class="col-md-3 position-relative">
                    <label class="form-label"> Thumbnails</label> 
                    <input type="file" class="form-control" name="thumbnail">
                    <img src="{{ asset('uploads/blog/thumbnails/'.$blog->thumbnails) }}" alt="">
                </div>
                </div>
                <button type="submit" class="btn btn-success mt-5">Post</button>
            </form>
        </div>
    </div>

    {{-- Category Modal --}}
    <div class="modal fade" id="staticBackdrop" tabindex="-1" data-bs-backdrop="static" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <h5 class="modal-title text-white" id="staticBackdropLabel">Add New Category</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1 text-white"></span></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.category.store') }}" method="POST" >
                  @csrf
                    <div class="col-md-12 position-relative">
                        <label class="form-label" for="ct"> Category</label>
                      <input type="text" name="category" id="ct" placeholder="Enter Category Name" class="form-control">
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit">Add</button>
                <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button>
            </div>
        </form>
          </div>
        </div>

  @endsection
  @section('footer_script')
  @error('category')
  <script>
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.error("{{ $message }}");
    </script>
@enderror
@error('title')
  <script>
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.error("{{ $message }}");
    </script>
@enderror
@error('category_id')
  <script>
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.error("{{ $message }}");
    </script>
@enderror
@error('article')
  <script>
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.error("{{ $message }}");
    </script>
@enderror
@error('thumbnail')
  <script>
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.error("{{ $message }}");
    </script>
@enderror
@if(Session::has('success'))
<script>
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.success("{{ session('success') }}");
  </script>
  @endif

  @if(Session::has('error'))
  <script>
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.error("{{ session('error') }}");
    </script>
  @endif

  <script>
       var editor1 = new RichTextEditor("#inp_editor1"); 
  </script>
@endsection