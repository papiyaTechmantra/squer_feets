@extends('layout.app')
@section('content')

<section class="search__banner">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 col-md-10 m-auto listing-select">
                <form action="{{ route('front.property.listing') }}" method="get">
                    <div class="form__area">
                        <!-- Location filter in the banner -->
                        <div class="form__block">
                            <div class="form__select customselect where">
                                <label>Where:</label>
                                <select name="location" id="location" class="form-control">
                                    <option value="" selected="selected">Location...</option>
                                    @foreach ($Locality as $Localities)
                                        <option value="{{ $Localities->name }}">{{ $Localities->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary mt-2" value="Browse" name="">
                    </div>
                </form> 
            </div>
        </div>
    </div>
</section>

<section class="list__section py-5">
    <div class="container">
        <div class="row">
            <!-- Filter Sidebar Section (Left Side) -->
            <div class="col-12 col-lg-3 col-md-4 mb-4">
                <form action="{{ route('front.property.listing') }}" method="get">
                    <div class="filter__sidebar p-3 bg-light border rounded">
                        <h4 class="mb-3">Filters</h4>
                        
                       

                        <!-- Bedroom Filter -->
                        <div class="form-group mb-3">
                            <label>Bedrooms</label>
                            <select name="bedrooms" class="form-control">
                                <option value="">Select Bedroom</option>
                                <option value="1" {{ request('bedrooms') == '1' ? 'selected' : '' }}>1 BHK</option>
                                <option value="2" {{ request('bedrooms') == '2' ? 'selected' : '' }}>2 BHK</option>
                                <option value="3" {{ request('bedrooms') == '3' ? 'selected' : '' }}>3 BHK</option>
                            </select>
                        </div>

                        <!-- Kitchen Filter -->
                        <div class="form-group mb-3">
                            <label>Kitchens</label>
                            <select name="kitchens" class="form-control">
                                <option value="">Select Kitchen</option>
                                <option value="1" {{ request('kitchens') == '1' ? 'selected' : '' }}>1 Kitchen</option>
                                <option value="2" {{ request('kitchens') == '2' ? 'selected' : '' }}>2 Kitchens</option>
                            </select>
                        </div>

                        <!-- Price Range Filter -->
                        <div class="form-group mb-3">
                            <label>Price Range (₹)</label>
                            <input type="text" id="priceminValue" name="min_price" class="form-control" readonly value="{{ request('min_price') }}">
                            <input type="text" id="pricemaxValue" name="max_price" class="form-control mt-2" readonly value="{{ request('max_price') }}">
                            <div id="price"></div>
                        </div>

                        <!-- Area Filter (Square Feet) -->
                        <div class="form-group mb-3">
                            <label>Area (Sq. Feet)</label>
                            <input type="text" id="minValue" name="min_area" class="form-control" readonly value="{{ request('min_area') }}">
                            <input type="text" id="maxValue" name="max_area" class="form-control mt-2" readonly value="{{ request('max_area') }}">
                            <div id="distance"></div>
                        </div>

                        <!-- Submit Button for Filter -->
                        <input type="submit" class="btn btn-success w-100" value="Apply Filters">
                    </div>
                </form>
            </div>

            <!-- Property Listing Section (Right Side) -->
            <div class="col-12 col-lg-9 col-md-8">
                <div class="property_listing">
                    @if($Property_listing->count() > 0)
                        <div class="row">
                            @foreach ($Property_listing as $listing)
                                <div class="col-12 col-md-6 col-lg-4 mb-4">
                                    <div class="card h-100">
                                        <img class="card-img-top" src="{{ asset($listing->image) }}" alt="{{ $listing->title }}">
                                        <div class="card-body">
                                            <h5><a href="{{ route('front.property.details', $listing->id) }}">{{ $listing->title }}</a></h5>
                                            <p><i class="fas fa-map-marker-alt"></i> {{ $listing->location }}</p>
                                            <ul class="list-inline">
                                                <li class="list-inline-item"><i class="fas fa-arrows-alt"></i> {{ $listing->property_Area }} Sqft</li>
                                                <li class="list-inline-item"><i class="fas fa-bed"></i> {{ $listing->No_of_bedroom }} Bedroom</li>
                                                <li class="list-inline-item"><i class="fas fa-utensils"></i> {{ $listing->No_of_kitchen }} Kitchen</li>
                                                <li class="list-inline-item"><i class="fas fa-bath"></i> {{ $listing->No_of_bathroom }} Bathroom</li>
                                                <li class="list-inline-item"><i class="fas fa-parking"></i> {{ $listing->No_of_parking }} Parking</li>
                                            </ul>
                                            <h6 class="text-danger">₹{{ $listing->price }}</h6>
                                        </div>
                                        <div class="card-footer">
                                            <a href="{{ route('front.property.details', $listing->id) }}" class="btn btn-primary w-100">View Details</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p>No properties found matching the filters.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script>

$('input[type=radio][name=filter]').on('change', function() {
    $('#form1').submit();
    // alert("gg");
});

$('input[type=radio][name=new_arrival]').on('change', function() {
    $('#form2').submit();
    // alert("gg");
});
$('input[type=radio][name=most_popular]').on('change', function() {
    $('#form2').submit();
    // alert("gg");
});
$('input[type=radio][name=recent_venue]').on('change', function() {
    $('#form2').submit();
    // alert("gg");
});
$('input[type=radio][name=upcoming_property]').on('change', function() {
    $('#form2').submit();
    // alert("gg");
});

function eatFood() {
document.getElementById('form1').submit();
}

</script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="{{ asset('Front/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="{{ asset('Front/js/slick.min.js') }}"></script>
    

    <script type="text/javascript">
      $(document).ready(function(){
        $('.toggle__btn').click(function(){
          $('#mobile__nav').toggleClass('d-none');
        });
       $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.slider-nav'
      });
      $('.slider-nav').slick({
        margin: 5,
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.slider-for',
        dots: false,
        centerMode: false,
        focusOnSelect: true
      });
        $('a[data-toggle="tab"]').on('click', function (e) {
          $('.space__list').slick('refresh');
        });
      });
  </script>
  <script type="text/javascript">
    jQuery(document).ready(function(){
      var getOutput    = $("#state");
      var getSlider = $("#distance");
      getSlider.slider({
        range:true,
        min:5,
        max:2500,
        values:[0, 2500],
        step:5,
        slide:function(event, ui){
          getOutput.html( ui.values[0]+' - '+ui.values[1]+'sq. ft. Sqft');
          $("#minValue").val(ui.values[0]+ ' sq. ft. Sqft');
          $("#maxValue").val(ui.values[1]+ ' sq. ft. Sqft');
        }
      });
      getOutput.html(getSlider.slider("values",0)+' - '+getSlider.slider("values",1)+"sq. ft. Sqft");
      $("#minValue").val(getSlider.slider('values', 0)+ ' sq. ft. Sqft');
      $("#maxValue").val(getSlider.slider('values', 1)+ ' sq. ft. Sqft');

    });
  </script>
  <script type="text/javascript">
    jQuery(document).ready(function(){
      var getOutput    = $("#pricestate");
      var getSlider = $("#price");
      getSlider.slider({
        range:true,
        min:50,
        max:850000,
        values:[0, 100000],
        step:50,
        slide:function(event, ui){
          getOutput.html( ui.values[0]+' - '+ui.values[1]+'₹');
          $("#priceminValue").val(ui.values[0]+ ' ₹');
          $("#pricemaxValue").val(ui.values[1]+ ' ₹');
        }
      });
      getOutput.html(getSlider.slider("values",0)+' - '+getSlider.slider("values",1)+"₹");
      $("#priceminValue").val(getSlider.slider('values', 0)+ ' ₹');
      $("#pricemaxValue").val(getSlider.slider('values', 1)+ ' ₹');

    });
  </script>

@endsection