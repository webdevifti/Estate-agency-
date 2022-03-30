@extends('master')
@section('page_title','Agents')
@section('MainContent')
  <main id="main">
    <!-- =======Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single">Our Amazing Agents</h1>
              <span class="color-text-a">Agents</span>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="{{ url('/') }}">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Agents
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->

    @if($all_agents->count() > 0)
    <!-- ======= Agents Grid ======= -->
    <section class="agents-grid grid">
      <div class="container">
        <div class="row">
          @foreach($all_agents as $a)
          <div class="col-md-4">
            <div class="card-box-d">
              <div class="card-img-d">
                <img src="{{ asset('uploads/agents/'.$a->agent_photo) }}" alt="" class="img-d img-fluid">
              </div>
              <div class="card-overlay card-overlay-hover">
                <div class="card-header-d">
                  <div class="card-title-d align-self-center">
                    <h3 class="title-d">
                      <a href="{{ route('agent.single',$a->id) }}" class="link-two">{{ $a->agent_fullname }}</a>
                    </h3>
                  </div>
                </div>
                <div class="card-body-d">
                  <p class="content-d color-text-a">
                    {{ $a->agent_description }}
                  </p>
                  <div class="info-agents color-a">
                    <p>
                      <strong>Phone: </strong> {{ $a->agent_contact_number }}
                    </p>
                    <p>
                      <strong>Email: </strong> {{ $a->agent_email }}
                    </p>
                  </div>
                </div>
                <div class="card-footer-d">
                  <div class="socials-footer d-flex justify-content-center">
                    <ul class="list-inline">
                      @if($a->agent_facebook)
                      <li class="list-inline-item">
                        <a href="{{ $a->agent_facebook }}" class="link-one">
                          <i class="bi bi-facebook" aria-hidden="true"></i>
                        </a>
                      </li>
                      @endif
                      @if($a->agent_twitter)
                      <li class="list-inline-item">
                        <a href="{{ $a->agent_twitter }}" class="link-one">
                          <i class="bi bi-facebook" aria-hidden="true"></i>
                        </a>
                      </li>
                      @endif
                      @if($a->agent_instagram)
                      <li class="list-inline-item">
                        <a href="{{ $a->agent_instagram }}" class="link-one">
                          <i class="bi bi-facebook" aria-hidden="true"></i>
                        </a>
                      </li>
                      @endif
                      @if($a->agent_linkedin)
                      <li class="list-inline-item">
                        <a href="{{ $a->agent_linkedin }}" class="link-one">
                          <i class="bi bi-facebook" aria-hidden="true"></i>
                        </a>
                      </li>
                      @endif
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        {{ $all_agents->links() }}
        {{-- <div class="row">
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
        </div> --}}
      </div>
    </section><!-- End Agents Grid-->
    @else 
      <h5>No Agent Found</h5>
    @endif

  </main><!-- End #main -->
@endsection