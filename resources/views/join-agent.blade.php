@extends('master')
@section('page_title', 'Join as a Agent')
@section('MainContent')
<!-- ======= Intro Single ======= -->
<section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">Join With Us</h1>
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
                Join as a agent
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section><!-- End Intro Single-->
  <section class="contact">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-md-6" style="padding: 20px;border-radius: 10px;">
                    <h3 class="mb-3">Want To Be a Agent</h3>
                  <form action="{{ route('agent.register') }}" method="POST">
                    @csrf
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <div class="form-group">
                          <input type="text" name="fullname" class="form-control form-control-lg form-control-a" placeholder="Your Name" required>
                          @error('fullname') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                      </div>
                      <div class="col-md-6 mb-3">
                        <div class="form-group">
                          <input name="agent_email" type="email" class="form-control form-control-lg form-control-a" placeholder="Your Email" required>
                          @error('agent_email') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                      </div>
                      <div class="col-md-6 mb-3">
                        <div class="form-group">
                          <input name="password" type="password" class="form-control form-control-lg form-control-a" placeholder="Your Password" required>
                          @error('password') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                      </div>
                      <div class="col-md-6 mb-3">
                        <div class="form-group">
                          <input name="confirm_password" type="password" class="form-control form-control-lg form-control-a" placeholder="Confirm Password" required>
                          @error('confirm_password') <span class="text-danger">{{ $message }}</span>@enderror
                          @if(session()->has('pass_not_match'))
                          <span class="text-danger">{{ session()->get('pass_not_match') }}</span>
                          @endif
                        </div>
                      </div>
                      <div class="col-md-12 text-center">
                        <button type="submit" name="join" class="btn btn-a">Join With Us</button>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="col-md-6 section-md-t3" style="padding: 20px;border-radius: 10px;">
                    <h3 class="mb-3">Login Into Your Account</h3>
                    @if(session()->has('pass_wrong'))
                      <div class="alert alert-danger">
                        {{ session()->get('pass_wrong') }}
                      </div>
                    @endif
                    @if(session()->has('email_wrong'))
                      <div class="alert alert-danger">
                        {{ session()->get('email_wrong') }}
                      </div>
                    @endif
                    @if(session()->has('verify_wrong'))
                      <div class="alert alert-danger">
                        {{ session()->get('verify_wrong') }}
                      </div>
                    @endif
                    @if(session()->has('status_wrong'))
                      <div class="alert alert-danger">
                        {{ session()->get('status_wrong') }}
                      </div>
                    @endif
                    <form action="{{ route('agent.login') }}" method="POST">
                      @csrf
                        <div class="row">
                          <div class="col-md-12 mb-3">
                            <div class="form-group">
                              <input name="email" type="email" class="form-control form-control-lg form-control-a" placeholder="Your Email" required>
                              @error('email') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                          </div>
                          <div class="col-md-12 mb-3">
                            <div class="form-group">
                              <input name="password" type="password" class="form-control form-control-lg form-control-a" placeholder="Your Password" required>
                              @error('password') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                          </div>
      
                          <div class="col-md-12 text-center">
                            <button type="submit" name="login" class="btn btn-a">Login</button>
                          </div>
                        </div>
                      </form>
                </div>
              </div>
        </div>
      </div>
    </div>
  </section>
@endsection