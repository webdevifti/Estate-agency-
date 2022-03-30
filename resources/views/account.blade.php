@extends('master')
@section('page_title', 'My Account')

@section('MainContent')
<main id="main">
<!-- ======= Intro Single ======= -->
<section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">My Account</h1>
            <span class="color-text-a">Aut voluptas consequatur unde sed omnis ex placeat quis eos. Aut natus officia corrupti qui autem fugit consectetur quo. Et ipsum eveniet laboriosam voluptas beatae possimus qui ducimus. Et voluptatem deleniti. Voluptatum voluptatibus amet. Et esse sed omnis inventore hic culpa.</span>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="{{ url('/') }}">Home</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                My Account
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section><!-- End Intro Single-->
  <section class="container">
     
  <div class="col-md-10 offset-md-1">
      @if(session()->has('complete_account'))
        <div class="alert alert-success">
            {{ session()->get('complete_account') }}
        </div>
      @endif
      @if(session()->has('pass_change'))
        <div class="alert alert-success">
            {{ session()->get('pass_change') }}
        </div>
      @endif
      @if(session()->has('pass_error'))
        <div class="alert alert-danger">
            {{ session()->get('pass_error') }}
        </div>
      @endif
      @if(session()->has('update_error'))
        <div class="alert alert-danger">
            {{ session()->get('update_error') }}
        </div>
      @endif
      @if(session()->has('update_success'))
        <div class="alert alert-success">
            {{ session()->get('update_success') }}
        </div>
      @endif
    <ul class="nav nav-pills-a nav-pills mb-3 section-t3" id="pills-tab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="pills-account-tab" data-bs-toggle="pill" href="#pills-account" role="tab" aria-controls="pills-account" aria-selected="false">My Profile</a>
    </li>
      <li class="nav-item">
        <a class="nav-link" id="pills-property-tab" data-bs-toggle="pill" href="#pills-property" role="tab" aria-controls="pills-property" aria-selected="true">My Properties</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="pills-password-tab" data-bs-toggle="pill" href="#pills-password" role="tab" aria-controls="pills-password" aria-selected="false">Password Change</a>
      </li>
      <li class="nav-item">
        <a class="nav-link btn-logout" href="{{ route('agent.logout') }}"
        onclick="event.preventDefault();
                      document.getElementById('agent_logout_form').submit();">Sign Out</a>
                      <form id="agent_logout_form" action="{{ route('agent.logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
      </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
     
      <div class="tab-pane fade show active" id="pills-account" role="tabpanel" aria-labelledby="pills-account-tab">
            <form action="{{ route('agent.profile.update') }}" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="row">
                    <div class="col-md-6 col-lg-6">
                      <input type="hidden" name="id" value="{{ $get_logged_agent->id }}">
                        <div class="mb-3">
                            <div class="mb-3 mt-3" style="text-align: center">
                              <img style="height: 100px;width: 100px;border-radius: 50%;object-fit: contain;" src="{{ asset('uploads/agents/'.$get_logged_agent->agent_photo) }}" id="pic" alt="">
                            </div>
                            <input type="file" oninput="pic.src=window.URL.createObjectURL(this.files[0])"  name="agent_photo" class="form-control">
                            @error('agent_photo') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">My Name</label>
                            <input type="text" value="{{ $get_logged_agent->agent_fullname }}" name="agent_name" class="form-control" placeholder="Your Fullname">
                        </div>
                        <div class="mb-3">
                            <label for="">My Email</label>
                            <input type="email"  value="{{ $get_logged_agent->agent_email }}" name="agent_email" class="form-control" placeholder="Your Email address">
                        </div>
                        <div class="mb-3">
                            <label for="">My Instagram</label>
                            <input type="text"  value="{{ $get_logged_agent->agent_instagram }}" name="agent_instagram" class="form-control" placeholder="Your Instagram username">
                        </div>
                        <div class="mb-3">
                            <label for="">My Linkedin</label>
                            <input type="text" name="agent_linkedin"  value="{{ $get_logged_agent->agent_linkedin }}" class="form-control" placeholder="Your Linkedin profile link">
                        </div>
                       
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <div class="mb-3">
                            <label for="">My Profession</label>
                            <input type="text" name="agent_profession"  value="{{ $get_logged_agent->agent_profession }}" class="form-control" placeholder="Your Profession">
                        </div>
                        <div class="mb-3">
                            <label for="">My Contact Number</label>
                            <input type="text" name="agent_contact_number"  value="{{ $get_logged_agent->agent_contact_number }}" class="form-control" placeholder="Your contact number">
                        </div>
                        <div class="mb-3">
                            <label for="">My Facebook</label>
                            <input type="text"  value="{{ $get_logged_agent->agent_facebook }}" name="agent_facebook" class="form-control" placeholder="Your facebook profile link">
                        </div>
                        <div class="mb-3">
                            <label for="">My Twitter</label>
                            <input type="text"  value="{{ $get_logged_agent->agent_twitter }}" name="agent_twitter" class="form-control" placeholder="Your twitter username">
                        </div>
                        <div class="mb-3">
                            <label for="">My Skype</label>
                            <input type="text" name="agent_skype"  value="{{ $get_logged_agent->agent_skype }}" class="form-control" placeholder="Your skyp ID">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="">My Description</label>
                        <textarea name="agent_description" placeholder="Describe yourself" cols="30" rows="5" class="form-control">{{ $get_logged_agent->agent_description }}</textarea>
                    </div>
                </div>
               <button type="submit" name="account_update" class="btn btn-a">Save</button>
            </form>
      </div>
      <div class="tab-pane fade " id="pills-property" role="tabpanel" aria-labelledby="pills-property-tab">
        @if($get_logged_agent_property->count() > 0)
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
          @foreach($get_logged_agent_property as $property)
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
          </div>
        </section>
        @else
          <h6>You have no properties yet</h6>
        @endif
      </div>
      <div class="tab-pane fade" id="pills-password" role="tabpanel" aria-labelledby="pills-password-tab">
          <form action="{{ route('agent.pass.update') }}" method="POST">
              @csrf
              <input type="hidden" name="id" value="{{ $get_logged_agent->id }}">
              <div class="mb-3">
                  <label for="">Old Password</label>
                  <input type="password" name="old_password" class="form-control">
              </div>
              <div class="mb-3">
                <label for="">New Password</label>
                <input type="password" name="new_password" class="form-control">
            </div>
            <button name="passChange" type="submit" class="btn btn-a">Save Changed</button>
          </form>
      </div>
    </div>
  </div>
  </section>
</main>
@endsection