@extends('master')
@section('page_title', 'Agent | '. $find_agent->agent_fullname)
@section('MainContent')
  <main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single">{{ $find_agent->agent_fullname }}</h1>
              <span class="color-text-a">{{ $find_agent->agent_profession }}</span>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="{{ url('/') }}">Home</a>
                </li>
                <li class="breadcrumb-item">
                  <a href="{{ route('agents') }}">Agents</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  {{ $find_agent->agent_fullname }}
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single -->

    <!-- ======= Agent Single ======= -->
    <section class="agent-single">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="row">
              <div class="col-md-6">
                <div class="agent-avatar-box">
                  <img src="{{ asset('uploads/agents/'.$find_agent->agent_photo) }}" alt="" class="agent-avatar img-fluid">
                </div>
              </div>
              <div class="col-md-5 section-md-t3">
                <div class="agent-info-box">
                  <div class="agent-title">
                    <div class="title-box-d">
                      <h3 class="title-d">{{ $find_agent->agent_fullname }}
                      </h3>
                    </div>
                  </div>
                  <div class="agent-content mb-3">
                    <p class="content-d color-text-a">
                      {{ $find_agent->agent_description }}
                    </p>
                    <div class="info-agents color-a">
                      <p>
                        <strong>Phone: </strong>
                        <span class="color-text-a"> {{ $find_agent->agent_contact_number }} </span>
                      </p>
                     
                      <p>
                        <strong>Email: </strong>
                        <span class="color-text-a"> {{ $find_agent->agent_email }}</span>
                      </p>
                      @if($find_agent->agent_skype)
                      <p>
                        <strong>skype: </strong>
                        <span class="color-text-a"> {{ $find_agent->agent_skype }}</span>
                      </p>
                      @endif
                    </div>
                  </div>
                  <div class="socials-footer">
                    <ul class="list-inline">
                      @if($find_agent->agent_facebook)
                      <li class="list-inline-item">
                        <a href="{{ $find_agent->agent_facebook }}" class="link-one">
                          <i class="bi bi-facebook" aria-hidden="true"></i>
                        </a>
                      </li>
                      @endif
                      @if($find_agent->agent_twitter)
                      <li class="list-inline-item">
                        <a href="{{ $find_agent->agent_twitter }}" class="link-one">
                          <i class="bi bi-twitter" aria-hidden="true"></i>
                        </a>
                      </li>
                      @endif
                      @if($find_agent->agent_instagram)
                      <li class="list-inline-item">
                        <a href="{{ $find_agent->agent_instagram }}" class="link-one">
                          <i class="bi bi-twitter" aria-hidden="true"></i>
                        </a>
                      </li>
                      @endif
                      @if($find_agent->agent_linkedin)
                      <li class="list-inline-item">
                        <a href="{{ $find_agent->agent_linkedin }}" class="link-one">
                          <i class="bi bi-twitter" aria-hidden="true"></i>
                        </a>
                      </li>
                      @endif
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @if($get_this_agent_properties->count() > 0)
          <div class="col-md-12 section-t8">
            <div class="title-box-d">
              <h3 class="title-d">My Properties ({{ $get_this_agent_properties->count() }})</h3>
            </div>
          </div>
          <div class="row property-grid grid">
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
            @foreach($get_this_agent_properties as $agent_p)
            <div class="col-md-4">
              <div class="card-box-a card-shadow">
                <div class="img-box-a">
                  <img src="{{ asset('uploads/properties/thumbnails/'.$agent_p->property_thumbnail) }}" alt="" class="img-a img-fluid">
                </div>
                <div class="card-overlay">
                  <div class="card-overlay-a-content">
                    <div class="card-header-a">
                      <h2 class="card-title-a">
                        <a href="{{ route('property.single', $agent_p->property_slug) }}">{{ $agent_p->property_name }}</a>
                      </h2>
                    </div>
                    <div class="card-body-a">
                      <div class="price-box d-flex">
                        <span class="price-a">{{ $agent_p->property_status }} | $ {{ $agent_p->property_price }}</span>
                      </div>
                      <a href="{{ route('property.single', $agent_p->property_slug) }}" class="link-a">Click here to view
                        <span class="bi bi-chevron-right"></span>
                      </a>
                    </div>
                    <div class="card-footer-a">
                      <ul class="card-info d-flex justify-content-around">
                        <li>
                          <h4 class="card-info-title">Area</h4>
                          <span>{{ $agent_p->property_area}}m
                            <sup>2</sup>
                          </span>
                        </li>
                        <li>
                          <h4 class="card-info-title">Beds</h4>
                          <span>{{ $agent_p->property_beds }}</span>
                        </li>
                        <li>
                          <h4 class="card-info-title">Baths</h4>
                          <span>{{ $agent_p->property_baths }}</span>
                        </li>
                        <li>
                          <h4 class="card-info-title">Garages</h4>
                          <span>{{ $agent_p->property_garages }}</span>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          @else
            <h3>This agent have no property yet</h3>
          @endif
        </div>
      </div>
    </section><!-- End Agent Single -->

  </main><!-- End #main -->
@endsection