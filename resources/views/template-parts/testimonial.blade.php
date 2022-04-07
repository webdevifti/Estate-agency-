@if($get_testimonials->count() > 0)
<section class="section-testimonials section-t8 nav-arrow-a">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box">
              <h2 class="title-a">Testimonials</h2>
            </div>
          </div>
        </div>
      </div>

      <div id="testimonial-carousel" class="swiper">
        <div class="swiper-wrapper">

         @foreach ($get_testimonials as $testimonial)
         <div class="carousel-item-a swiper-slide">
             <div class="testimonials-box">
                 <div class="row">
                 
                <div class="col-sm-12 col-md-6">
                  <div class="testimonial-img">
                    <img src="{{ asset('uploads/client_photos/'.$testimonial->client_photo) }}" alt="" class="img-fluid">
                  </div>
                </div>
                <div class="col-sm-12 col-md-6">
                  <div class="testimonial-ico">
                    <i class="bi bi-chat-quote-fill"></i>
                  </div>
                  <div class="testimonials-content">
                    <p class="testimonial-text">
                    {{ $testimonial->client_review }}
                    </p>
                  </div>
                  <div class="testimonial-author-box">
                    <img src="{{ asset('uploads/client_photos/'.$testimonial->client_photo) }}" alt="" class="testimonial-avatar">
                    <h5 class="testimonial-author">{{ $testimonial->client_name }}</h5>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- End carousel item -->

          @endforeach
        </div>
      </div>
      <div class="testimonial-carousel-pagination carousel-pagination"></div>

    </div>
  </section>
  @endif