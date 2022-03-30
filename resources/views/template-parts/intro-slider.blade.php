 @if($get_intro_slider_property->count() > 0)
 
 <!-- ======= Intro Section ======= -->
 <div class="intro intro-carousel swiper position-relative">

    <div class="swiper-wrapper">
      @foreach($get_intro_slider_property as $slide)
      <div class="swiper-slide carousel-item-a intro-item bg-image" style="background-image: url({{ asset('uploads/properties/thumbnails/'.$slide->property_thumbnail) }})">
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          <div class="table-cell">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="intro-body">
                    <p class="intro-title-top">{{ $slide->property_location }}
                    </p>
                    <h1 class="intro-title mb-4 ">
                      <span class="color-b">{{ $slide->property_name }}
                    </h1>
                    <p class="intro-subtitle intro-price">
                      <a href="#"><span class="price-a">{{ $slide->property_status }} | $ {{ $slide->property_price }}</span></a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <div class="swiper-pagination"></div>
  </div><!-- End Intro Section -->
@endif