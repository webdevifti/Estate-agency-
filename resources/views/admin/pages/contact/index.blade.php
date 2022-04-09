@extends('admin.layouts.master')
@section('title','Contact page Management')
@section('content')
<div class="content pt-5">
<div class="card shadow-none border border-300 my-4" data-component-card="">
    <div class="card-header p-4 border-bottom border-300 bg-soft">
      <div class="row g-3 justify-content-between align-items-center">
        <div class="col-12 col-md">
          <h3 class="text-900 mb-0" data-anchor="" id="accordion-example">Manage Contact Page Content<a class="anchorjs-link " aria-label="Anchor" data-anchorjs-icon="#" href="#accordion-example" style="padding-left: 0.375em;"></a></h3>
        </div>
       
      </div>
    </div>
    <div class="card-body p-0">
     
      <div class="p-4 code-to-copy">
        <div class="accordion" id="accordionExample">
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">Page Title And Description</button></h2>
            <div class="accordion-collapse collapse" id="collapseOne" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
              <div class="accordion-body pt-0">
                  <form action="{{ route('admin.contact.basic',$get_data->id) }}" method="POST">
                      @csrf
                      @method('PUT')
                      <input type="text" name="page_title" value="{{ $get_data->title }}" placeholder="Page Title" class="form-control">
                      <br>
                      <textarea cols="30" name="page_desc" rows="10" placeholder="Page Description" class="form-control">{{ $get_data->description }}</textarea>
                      <br>
                      <button type="submit" class="btn btn-success">Save</button>
                  </form>
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Office / Your Google Map Location</button></h2>
            <div class="accordion-collapse collapse" id="collapseTwo" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
              <div class="accordion-body pt-0">
                  <form action="{{ route('admin.contact.map',$get_data->id) }}" method="POST">
                      @csrf
                      @method('PUT')
                      <input type="text" name="map" class="form-control" value="{{ $get_data->google_map }}" placeholder="Enter Google Map Embeded URL"><br>
                      <button type="submit" class="btn btn-success">Save</button>
                  </form>
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Contact Information</button></h2>
            <div class="accordion-collapse collapse" id="collapseThree" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
              <div class="accordion-body pt-0">
                  <form action="{{ route('admin.contact.info.update', $get_data->id) }}" method="POST">
                      @csrf
                      @method('PUT')
                      <input type="text" name="email" placeholder="Email" value="{{ $get_data->email }}" class="form-control">
                      <input type="text" name="phone" placeholder="Phone Number" value="{{ $get_data->phone }}" class="form-control">
                      <input type="text" name="address" placeholder="Address / Location" value="{{ $get_data->address }}" class="form-control">
                      <br>
                      <button type="submit" class="btn btn-success">Save</button>
                  </form>
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingFour"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">Social Media Links</button></h2>
            <div class="accordion-collapse collapse" id="collapseFour" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
              <div class="accordion-body pt-0">
                  <form action="{{ route('admin.contact.social', $get_data->id) }}" method="POST">
                      @csrf
                      @method('PUT')
                      <input type="text" name="fb" class="form-control" value="{{ $get_data->facebook }}" placeholder="Facebook "><br>
                      <input type="text" name="twtr" class="form-control" value="{{ $get_data->twitter }}" placeholder="Twitter"><br>
                      <input type="text" name="insta" class="form-control" value="{{ $get_data->instagram }}" placeholder="Instagram"><br>
                      <input type="text" name="linkdin" class="form-control" value="{{ $get_data->linkedin }}" placeholder="Linkedin"><br>
                      <button type="submit" class="btn btn-success">Save</button>
                  </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @endsection
  @section('footer_script')
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
@endsection