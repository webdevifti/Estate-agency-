@extends('master')
@section('page_title','Contact with us')
@section('MainContent')
  <main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single">{{ $get_contact_data->title }}</h1>
              <span class="color-text-a">{{ $get_contact_data->description }}</span>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="{{ url('/') }}">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Contact
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->

    <!-- ======= Contact Single ======= -->
    <section class="contact">
      <div class="container">
        <div class="row">
          @if($get_contact_data->google_map)
          <div class="col-sm-12">
            <div class="contact-map box">
              <div id="map" class="contact-map">
                {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe> --}}
                 {!!  $get_contact_data->google_map !!}
              </div>
            </div>
          </div>
          @endif
          <div class="col-sm-12 section-t8">
            <div class="row">
              <div class="col-md-7">
                <form onsubmit="contact()">
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <div class="form-group">
                        <input type="text" name="name" id="name" class="form-control form-control-lg form-control-a" placeholder="Your Name" required>
                      </div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <div class="form-group">
                        <input name="email" type="email" id="email" class="form-control form-control-lg form-control-a" placeholder="Your Email" required>
                      </div>
                    </div>
                    <div class="col-md-12 mb-3">
                      <div class="form-group">
                        <input type="text" name="subject" class="form-control form-control-lg form-control-a" placeholder="Subject" id="subject" required>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <textarea name="message" id="message" class="form-control" name="message" cols="45" rows="8" placeholder="Message" required></textarea>
                      </div>
                    </div>
                    <div class="col-md-12 my-3">
                      <div class="mb-3">
                        <div class="loading"></div>
                        <div class="error-message"></div>
                        <div class="sent-message"></div>
                      </div>
                    </div>

                    <div class="col-md-12 text-center">
                      <button type="button" id="contactBtn" class="btn btn-a">Send Message</button>
                    </div>
                  </div>
                </form>
              </div>
              <div class="col-md-5 section-md-t3">
                <div class="icon-box section-b2">
                  <div class="icon-box-icon">
                    <span class="bi bi-envelope"></span>
                  </div>
                  <div class="icon-box-content table-cell">
                    <div class="icon-box-title">
                      <h4 class="icon-title">Say Hello</h4>
                    </div>
                    <div class="icon-box-content">
                      <p class="mb-1">Email.
                        <span class="color-a">{{ $get_contact_data->email }}</span>
                      </p>
                      <p class="mb-1">Phone.
                        <span class="color-a">{{ $get_contact_data->phone }}</span>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="icon-box section-b2">
                  <div class="icon-box-icon">
                    <span class="bi bi-geo-alt"></span>
                  </div>
                  <div class="icon-box-content table-cell">
                    <div class="icon-box-title">
                      <h4 class="icon-title">Find us in</h4>
                    </div>
                    <div class="icon-box-content">
                      <p class="mb-1">
                        {{ $get_contact_data->address }}
                      </p>
                    </div>
                  </div>
                </div>
                <div class="icon-box">
                  <div class="icon-box-icon">
                    <span class="bi bi-share"></span>
                  </div>
                  <div class="icon-box-content table-cell">
                    <div class="icon-box-title">
                      <h4 class="icon-title">Social networks</h4>
                    </div>
                    <div class="icon-box-content">
                      <div class="socials-footer">
                        <ul class="list-inline">
                         @if($get_contact_data->facebook)
                          <li class="list-inline-item">
                            <a href="{{ $get_contact_data->facebook }}" class="link-one">
                              <i class="bi bi-facebook" aria-hidden="true"></i>
                            </a>
                          </li>
                          @endif
                          @if($get_contact_data->twitter)
                          <li class="list-inline-item">
                            <a href="{{ $get_contact_data->twitter }}" class="link-one">
                              <i class="bi bi-twitter" aria-hidden="true"></i>
                            </a>
                          </li>
                          @endif
                          @if($get_contact_data->instagram)
                          <li class="list-inline-item">
                            <a href="{{ $get_contact_data->instagram }}" class="link-one">
                              <i class="bi bi-instagram" aria-hidden="true"></i>
                            </a>
                          </li>
                          @endif
                          @if($get_contact_data->linkedin)
                          <li class="list-inline-item">
                            <a href="{{ $get_contact_data->linkedin }}" class="link-one">
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
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Contact Single-->

  </main><!-- End #main -->

 @endsection

 @section('footer_script')
<script>
  $('#contactBtn').on('click', function(){
    var name = $('#name').val();
    var email = $('#email').val();
    var subject = $('#subject').val();
    var message = $('#message').val();
    $('.loading').html('Loading..');
    $('#contactBtn').attr('disabled');
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      url: '/contact-with-us/message',
      type: 'POST',
      data: {name: name,email: email,subject: subject, message: message},
      success: function(res){
       
        if(res.message){
          $('.loading').html('')
          $('#contactBtn').attr('');
          var name = $('#name').val('');
          var email = $('#email').val('');
          var subject = $('#subject').val('');
          var message = $('#message').val('');
          $('.sent-message').html(res.message);
        }
      }
    });

  });
  

</script>
 @endsection