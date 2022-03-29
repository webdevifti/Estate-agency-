@extends('master')
@section('page_title', 'Property | '.$get_signle_property->property_name)
@section('MainContent')
  <main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single"> {{ $get_signle_property->property_name }}</h1>
              <span class="color-text-a"> {{ $get_signle_property->property_location }}</span>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="{{ url('/') }}">Home</a>
                </li>
                <li class="breadcrumb-item">
                  <a href="{{ route('properties') }}">Properties</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  {{ $get_signle_property->property_name }}
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->

    <!-- ======= Property Single ======= -->
    <section class="property-single nav-arrow-b">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div id="property-single-carousel" class="swiper">
              <div class="swiper-wrapper">
                @if($get_images)
                @foreach($get_images as $image)
                  <div class="carousel-item-b swiper-slide">
                    <img src="{{ asset('uploads/properties/propertyimages/'.$image->image) }}" alt="">
                  </div>
                @endforeach
                @endif
              </div>
            </div>
            <div class="property-single-carousel-pagination carousel-pagination"></div>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-12">

            <div class="row justify-content-between">
              <div class="col-md-5 col-lg-4">
                <div class="property-price d-flex justify-content-center foo">
                  <div class="card-header-c d-flex">
                    <div class="card-box-ico">
                      <span class="bi bi-cash">$</span>
                    </div>
                    <div class="card-title-c align-self-center">
                      <h5 class="title-c"> {{ $get_signle_property->property_price }}</h5>
                    </div>
                  </div>
                </div>
                <div class="property-summary">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="title-box-d section-t4">
                        <h3 class="title-d">Quick Summary</h3>
                      </div>
                    </div>
                  </div>
                  <div class="summary-list">
                    <ul class="list">
                      <li class="d-flex justify-content-between">
                        <strong>Property ID:</strong>
                        <span>1134</span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Location:</strong>
                        <span> {{ $get_signle_property->property_location }}</span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Property Type:</strong>
                        <span> {{ $get_signle_property->property_type }}</span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Status:</strong>
                        <span> {{ $get_signle_property->property_status }}</span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Area:</strong>
                        <span> {{ $get_signle_property->property_area }}m
                          <sup>2</sup>
                        </span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Beds:</strong>
                        <span> {{ $get_signle_property->property_beds }}</span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Baths:</strong>
                        <span> {{ $get_signle_property->property_baths }}</span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Garage:</strong>
                        <span> {{ $get_signle_property->property_garages }}</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-7 col-lg-7 section-md-t3">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="title-box-d">
                      <h3 class="title-d">Property Description</h3>
                    </div>
                  </div>
                </div>
                <div class="property-description">
                  {{ $get_signle_property->property_description }}
                </div>
                <div class="row section-t3">
                  <div class="col-sm-12">
                    <div class="title-box-d">
                      <h3 class="title-d">Amenities</h3>
                    </div>
                  </div>
                </div>
                <div class="amenities-list color-text-a">
                  <ul class="list-a no-margin">
                    @foreach($get_amenity as $l)
                    <li>{{ $l->amenitity }}</li>

                    @endforeach
                  </ul>
                </div>
              </div>
            </div>
          </div>
          @if($get_properties_attr->count() > 0)
          <div class="col-md-10 offset-md-1">
            <ul class="nav nav-pills-a nav-pills mb-3 section-t3" id="pills-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="pills-video-tab" data-bs-toggle="pill" href="#pills-video" role="tab" aria-controls="pills-video" aria-selected="true">Video</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-plans-tab" data-bs-toggle="pill" href="#pills-plans" role="tab" aria-controls="pills-plans" aria-selected="false">Floor Plans</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-map-tab" data-bs-toggle="pill" href="#pills-map" role="tab" aria-controls="pills-map" aria-selected="false">Ubication</a>
              </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-video" role="tabpanel" aria-labelledby="pills-video-tab">
                <iframe src="{{ $get_properties_attr->property_video }}" width="100%" height="460" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
              </div>
              <div class="tab-pane fade" id="pills-plans" role="tabpanel" aria-labelledby="pills-plans-tab">
                <img src="{{ asset('uploads/properties/floorimages/'.$get_properties_attr->property_floor_plan) }}" alt="" class="img-fluid">
              </div>
              <div class="tab-pane fade" id="pills-map" role="tabpanel" aria-labelledby="pills-map-tab">
                <iframe src="{{ $get_properties_attr->property_ubication }}" width="100%" height="460" frameborder="0" style="border:0" allowfullscreen></iframe>
              </div>
            </div>
          </div>
          @endif
          <div class="col-md-12">
            <div class="row section-t3">
              <div class="col-sm-12">
                <div class="title-box-d">
                  <h3 class="title-d">Contact Agent</h3>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-lg-4">
                <img src="{{ asset('uploads/agents/'.$get_this_property_agent_info->agent_photo) }}" alt="" class="img-fluid">
              </div>
              <div class="col-md-6 col-lg-4">
                <div class="property-agent">
                  <h4 class="title-agent">{{ $get_this_property_agent_info->agent_fullname }}</h4>
                  <p class="color-text-a">
                    {{ $get_this_property_agent_info->agent_description }}
                  </p>
                  <ul class="list-unstyled">
                    @if($get_this_property_agent_info->agent_contact_number)
                    <li class="d-flex justify-content-between">
                      <strong>Phone:</strong>
                      <span class="color-text-a">{{ $get_this_property_agent_info->agent_contact_number }}</span>
                    </li>
                   @endif
                   @if($get_this_property_agent_info->agent_email)
                    <li class="d-flex justify-content-between">
                      <strong>Email:</strong>
                      <span class="color-text-a">{{ $get_this_property_agent_info->agent_email }}</span>
                    </li>
                    @endif
                    @if($get_this_property_agent_info->agent_skype)
                    <li class="d-flex justify-content-between">
                      <strong>Skype:</strong>
                      <span class="color-text-a">{{ $get_this_property_agent_info->agent_skype }}</span>
                    </li>
                    @endif
                  </ul>
                  <div class="socials-a">
                    <ul class="list-inline">
                      @if($get_this_property_agent_info->agent_facebook)
                      <li class="list-inline-item">
                        <a href="{{ $get_this_property_agent_info->agent_facebook }}">
                          <i class="bi bi-facebook" aria-hidden="true"></i>
                        </a>
                      </li>
                      @endif
                      @if($get_this_property_agent_info->agent_twitter )
                      <li class="list-inline-item">
                        <a href="{{ $get_this_property_agent_info->agent_twitter }}">
                          <i class="bi bi-twitter" aria-hidden="true"></i>
                        </a>
                      </li>
                      @endif
                      @if($get_this_property_agent_info->agent_instagram)
                      <li class="list-inline-item">
                        <a href="{{ $get_this_property_agent_info->agent_instagram }}">
                          <i class="bi bi-instagram" aria-hidden="true"></i>
                        </a>
                      </li>
                      @endif
                      @if($get_this_property_agent_info->agent_linkedi)
                      <li class="list-inline-item">
                        <a href="{{ $get_this_property_agent_info->agent_linkedin }}">
                          <i class="bi bi-linkedin" aria-hidden="true"></i>
                        </a>
                      </li>
                      @endif
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-12 col-lg-4">
                <div class="property-contact">
                  <form class="form-a">
                    <div class="row">
                      <div class="col-md-12 mb-1">
                        <div class="form-group">
                          <input type="text" class="form-control form-control-lg form-control-a" id="inputName" placeholder="Name *" required>
                        </div>
                      </div>
                      <div class="col-md-12 mb-1">
                        <div class="form-group">
                          <input type="email" class="form-control form-control-lg form-control-a" id="inputEmail1" placeholder="Email *" required>
                        </div>
                      </div>
                      <div class="col-md-12 mb-1">
                        <div class="form-group">
                          <textarea id="textMessage" class="form-control" placeholder="Comment *" name="message" cols="45" rows="8" required></textarea>
                        </div>
                      </div>
                      <div class="col-md-12 mt-3">
                        <button type="submit" class="btn btn-a">Send Message</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Property Single-->

  </main><!-- End #main -->
@endsection