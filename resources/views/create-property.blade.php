@extends('master')
@section('page_title','Add a new property')
@section('MainContent')
<main id="main">
    <section class="intro-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="title-single-box">
                        <h1 class="title-single">We Do Great Design For Creative Folks</h1>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                            Add New Property
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section><!-- End Intro Single-->
    <section class="container">
        <form action="{{ route('agent.store.property') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="row">
           <div class="col-md-8 col-lg-8">
                <div class="mb-3">
                    <label for="">Property Name</label>
                    <input type="text" name="property_name" placeholder="Property Name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Property Price</label>
                    <input type="text" name="property_price" placeholder="Property Price" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Property Location/Address</label>
                    <input type="text" name="property_location" placeholder="Property Location or Address" class="form-control">
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="mb-3">
                            <label for="">Property Type</label>
                            <select name="property_type" class="form-control">
                                <option value="">--select type--</option>
                                <option value="house">House</option>
                                <option value="hotel">Hotel</option>
                                <option value="restaurant">Restaurant</option>
                                <option value="flat">flat</option>
                                <option value="room">Room</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">Property Area</label>
                           <input type="text" placeholder="Property Area" name="property_area" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Property Garage</label>
                            <select name="property_garage" class="form-control">
                                <option value="">--select garage--</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="mb-3">
                            <label for="">Property Status</label>
                            <select name="property_status" class="form-control">
                                <option value="">--select staus---</option>
                                <option value="sale">Sale</option>
                                <option value="rent">Rent</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">Property Beds</label>
                            <select name="property_beds" class="form-control">
                                <option value="">--select beds---</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">Property Baths</label>
                            <select name="property_baths" class="form-control">
                                <option value="">--select baths---</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="">Property Description</label>
                    <textarea name="property_description"  cols="30" rows="5" class="form-control" placeholder="Property Description"></textarea>
                </div>
           </div>
           <div class="col-md-4 col-lg-4">
              <div class="mb-3 mt-3">
                <h5>Add Property Images</h5>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <input type="file" name="property_images[]">
                    </div>
                    <div class="col-lg-6 col-md-6" style="text-align: right">
                        <button type="button" onclick="addMoreImage()" class="btn btn-add-more">Add More</button>
                    </div>
                </div>
                <div id="showContent"></div>
              </div>
              <div class="mb-3 mt-3">
                <h5>Add Property Video</h5>
                <input name="property_video" type="file">
              </div>
              <div class="mb-3 mt-3">
                <h5>Add Property Floor Plan image</h5>
                <input type="file" name="property_foor_plan">
              </div>
              <div class="mb-3 mt-3">
                <h5>Add Property Ubication</h5>
                <input type="text" class="form-control" placeholder="Ubication" name="ubication">
              </div>
              <div class="mb-3 mt-3">
                <h5>Add Property Amenities</h5>
                <select name="amenities[]" id="selectAmenities" class="form-control selectpicker" multiple>
                    <option value="">--select--</option>
                    <option value="Balcony">Balcony</option>
                    <option value="Deck">Deck</option>
                    <option value="Parking">Parking</option>
                    <option value="Outdoor Kitchen">Outdoor Kitchen</option>
                    <option value="Cable Tv">Cable Tv</option>
                    <option value="Sun Room">Sun Room</option>
                    <option value="Tennis Courts">Tennis Courts</option>
                    <option value="Internet">Internet</option>
                    <option value="Concrete Flooring">Concrete Flooring</option>
                </select>
              </div>
           </div>
        </div>
        <button type="reset" class="btn btn-b">Clear</button>
        <button type="submit" class="btn btn-a">Add</button>
    </form>
    </section>
  
</main>
@endsection

@section('footer_script')

<script>
    function addMoreImage(){
        var html_content = '<div class="row mt-3" id="abc"><div class="col-lg-6 col-md-6"><input type="file" name="property_images[]"> </div><div class="col-lg-6 col-md-6" style="text-align: right"><button type="button" onclick="removeaddmore()" class="btn btn-add-more">Remove</button></div> </div>';
        $('#showContent').append(html_content);
    }

    function removeaddmore(){
        $('#abc').remove();
    }
</script>
@endsection
