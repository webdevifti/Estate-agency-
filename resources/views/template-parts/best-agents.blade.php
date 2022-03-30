
    @if($get_agents->count() > 0)
    <!-- ======= Agents Section ======= -->
    <section class="section-agents section-t8">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between">
              <div class="title-box">
                <h2 class="title-a">Best Agents</h2>
              </div>
              <div class="title-link">
                <a href="{{ route('agents') }}">All Agents
                  <span class="bi bi-chevron-right"></span>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          @foreach($get_agents as $agent)
          <div class="col-md-4">
            <div class="card-box-d">
              <div class="card-img-d">
                <img src="{{ asset('uploads/agents/'.$agent->agent_photo) }}" alt="" class="img-d img-fluid">
              </div>
              <div class="card-overlay card-overlay-hover">
                <div class="card-header-d">
                  <div class="card-title-d align-self-center">
                    <h3 class="title-d">
                      <a href="{{ route('agent.single', $agent->id) }}" class="link-two">{{ $agent->agent_fullname }}</a>
                    </h3>
                  </div>
                </div>
                <div class="card-body-d">
                  <p class="content-d color-text-a">
                    {{ $agent->agent_description }}
                  </p>
                  <div class="info-agents color-a">
                    <p>
                      <strong>Phone: </strong> {{ $agent->agent_contact_number }}
                    </p>
                    <p>
                      <strong>Email: </strong> {{ $agent->agent_email }}
                    </p>
                  </div>
                </div>
                <div class="card-footer-d">
                  <div class="socials-footer d-flex justify-content-center">
                    <ul class="list-inline">
                      @if($agent->agent_facebook)
                      <li class="list-inline-item">
                        <a href="{{ $agent->agent_facebook }}" class="link-one">
                          <i class="bi bi-facebook" aria-hidden="true"></i>
                        </a>
                      </li>
                      @endif
                      @if($agent->agent_twitter)
                      <li class="list-inline-item">
                        <a href="{{ $agent->agent_twitter }}" class="link-one">
                          <i class="bi bi-twitter" aria-hidden="true"></i>
                        </a>
                      </li>
                      @endif
                      @if($agent->agent_instagram)
                      <li class="list-inline-item">
                        <a href="{{ $agent->agent_instagram }}" class="link-one">
                          <i class="bi bi-instagram" aria-hidden="true"></i>
                        </a>
                      </li>
                      @endif
                      @if($agent->agent_linkedin)
                      <li class="list-inline-item">
                        <a href="{{ $agent->agent_linkedin }}" class="link-one">
                          <i class="bi bi-linkedin" aria-hidden="true"></i>
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
      </div>
    </section><!-- End Agents Section -->
    @endif