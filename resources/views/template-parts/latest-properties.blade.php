   <!-- ======= Latest Properties Section ======= -->
   @if($get_property->count() > 0)
   <section class="section-property section-t8">
     <div class="container">
       <div class="row">
         <div class="col-md-12">
           <div class="title-wrap d-flex justify-content-between">
             <div class="title-box">
               <h2 class="title-a">Latest Properties</h2>
             </div>
             <div class="title-link">
               <a href="{{ route('properties') }}">All Property
                 <span class="bi bi-chevron-right"></span>
               </a>
             </div>
           </div>
         </div>
       </div>

       <div id="property-carousel" class="swiper">
         <div class="swiper-wrapper">

         @foreach($get_property as $p)
           <div class="carousel-item-b swiper-slide">
             <div class="card-box-a card-shadow">
               <div class="img-box-a">
                 <img src="{{ asset('uploads/properties/thumbnails/'.$p->property_thumbnail) }}" alt="" class="img-a img-fluid">
               </div>
               <div class="card-overlay">
                 <div class="card-overlay-a-content">
                   <div class="card-header-a">
                     <h2 class="card-title-a">
                       <a href="{{ route('property.single', $p->property_slug) }}">{{ $p->property_name }}</a>
                     </h2>
                   </div>
                   <div class="card-body-a">
                     <div class="price-box d-flex">
                       <span class="price-a">{{ $p->property_status }} | $ {{ $p->property_price }}</span>
                     </div>
                     <a href="{{ route('property.single', $p->property_slug) }}" class="link-a">Click here to view
                       <span class="bi bi-chevron-right"></span>
                     </a>
                   </div>
                   <div class="card-footer-a">
                     <ul class="card-info d-flex justify-content-around">
                       <li>
                         <h4 class="card-info-title">Area</h4>
                         <span>{{ $p->property_area }}m
                           <sup>2</sup>
                         </span>
                       </li>
                       <li>
                         <h4 class="card-info-title">Beds</h4>
                         <span>{{ $p->property_beds }}</span>
                       </li>
                       <li>
                         <h4 class="card-info-title">Baths</h4>
                         <span>{{ $p->property_baths }}</span>
                       </li>
                       <li>
                         <h4 class="card-info-title">Garages</h4>
                         <span>{{ $p->property_garages }}</span>
                       </li>
                     </ul>
                   </div>
                 </div>
               </div>
             </div>
           </div><!-- End carousel item -->
           @endforeach 
         </div>
       </div>
       <div class="property-carousel-pagination carousel-pagination"></div>
     </div>
   </section><!-- End Latest Properties Section -->
@endif