@extends('master')
@section('page_title', 'Properties')
@section('MainContent')
  <main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single">Our Amazing Properties</h1>
              <span class="color-text-a">Grid Properties</span>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="{{ url('/') }}">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Properties
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->
@if($get_all_properties->count() > 0)
    <!-- ======= Property Grid ======= -->
    <section class="property-grid grid">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="grid-option">
              <form>
                <select class="custom-select">
                  <option selected>All</option>
                  <option value="1">New to Old</option>
                  <option value="2">For Rent</option>
                  <option value="3">For Sale</option>
                </select>
              </form>
            </div>
          </div>
          @foreach($get_all_properties as $property)
          <div class="col-md-4">
            <div class="card-box-a card-shadow">
              <div class="img-box-a">
                <img src="{{ asset('uploads/properties/thumbnails/'.$property->property_thumbnail) }}" alt="" class="img-a img-fluid">
              </div>
              <div class="card-overlay">
                <div class="card-overlay-a-content">
                  <div class="card-header-a">
                    <h2 class="card-title-a">
                      <a href="{{ route('property.single', $property->property_slug) }}">{{ $property->property_name }}</a>
                    </h2>
                  </div>
                  <div class="card-body-a">
                    <div class="price-box d-flex">
                      <span class="price-a">{{ $property->property_status }} | $ {{ $property->property_price }}</span>
                    </div>
                    <a href="{{ route('property.single', $property->property_slug) }}" class="link-a">Click here to view
                      <span class="bi bi-chevron-right"></span>
                    </a>
                  </div>
                  <div class="card-footer-a">
                    <ul class="card-info d-flex justify-content-around">
                      <li>
                        <h4 class="card-info-title">Area</h4>
                        <span>{{ $property->property_area }}m
                          <sup>2</sup>
                        </span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Beds</h4>
                        <span>{{ $property->property_beds }}</span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Baths</h4>
                        <span>{{ $property->property_baths }}</span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Garages</h4>
                        <span>{{ $property->property_garages }}</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        <div class="row">
          <div class="col-sm-12">
            <nav class="pagination-a">
              <ul class="pagination justify-content-end">
                <li class="page-item disabled">
                  <a class="page-link" href="#" tabindex="-1">
                    <span class="bi bi-chevron-left"></span>
                  </a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item active">
                  <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#">3</a>
                </li>
                <li class="page-item next">
                  <a class="page-link" href="#">
                    <span class="bi bi-chevron-right"></span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Property Grid Single-->
  @else
  <h6>There is no property</h6>
@endif
  </main><!-- End #main -->
@endsection