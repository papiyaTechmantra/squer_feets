@extends('layout.app')
@section('content')

<section class="search__banner">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-6 col-md-10 m-auto listing-select">
          <form action="{{ route('front.property.listing') }}" method="get">
              <div class="row">
                  <div class="form__area">
                          <div class="form__block">
                              <div class="form__select customselect where">
                                  <label>Where:</label>
                                  <select class="" name="location" id="location">
                                      <option value="" selected="selected">Location...</option>
                                      @foreach ($Locality as $Localities)
                                          <option value="{{ $Localities->name }}">{{ $Localities->name }}</option>
                                      @endforeach
                                  </select>
                              </div>
                              {{-- <div class="form__select customselect category">
                                  <label>Category:</label>
                                  <select class="" name="category" id="category">
                                      <option value="" selected>Select Category</option>
                                      <option value="villas">Villas</option>
                                      <option value="deplux">Deplux</option>
                                      <option value="apartments">Apartments</option>
                                  </select>
                              </div>
                              <div class="form__select keyword">
                                  <label>Keywords:</label>
                                  <input type="text" name="configurations" placeholder="1BHK, 2BHK, 3BHK">
                              </div> --}}
                          </div>
                          <input type="submit" class="form__submit" value="Browse" name="">
                  </div>
              </div>
          </form>
      </div>
      </div>
    </div>
</section>

<section class="list__section">
    <div class="container">
      <div class="row">
        {{-- <div class="col-12 col-md-3">
          <div class="list__section__filter">
            <div class="filter__title">
              <span class="filter__icon"><img src="{{ asset('Front/images/filter.svg') }}"></span>
              <h6>Filter</h6>
            </div>
            <div class="filter__area">
                <form id="form1" action="{{ route('front.property.listing') }}" method="GET">
                    <div class="form__filter">
                        <input type="radio" name="filter" id="all" value="">
                        <label class="custom__filter" for="all">
                        All
                        </label>
                    </div>
                    <div class="form__filter">
                        <input type="radio" name="filter" id="villas" value="villas">
                        <label class="custom__filter" for="villas">
                        Villas
                        </label>
                    </div>
                    <div class="form__filter">
                        <input type="radio" name="filter" id="apartments" value="apartments">
                        <label class="custom__filter" for="apartments">
                        Apartments
                        </label>
                    </div>
                    <div class="form__filter">
                        <input type="radio" name="filter" id="deplux" value="deplux">
                        <label class="custom__filter" for="deplux">
                        Deplux Houses
                        </label>
                    </div>
                </form>
            </div>
            <div class="range__distance">
              <label for="customRange1">Maximum Distance</label>
              <div id="distance"></div>
              <input type="text" id="minValue" minValue="100">
              <input type="text" id="maxValue" maxValue="1000">
            </div>
            <div class="range__price">
              <label for="customRange1">Price</label>
              <div id="price"></div>
              <input type="text" id="priceminValue" readonly="">
              <input type="text" id="pricemaxValue" readonly="">
            </div>
            <div class="select__list">
              <form id="form2" action="{{ route('front.property.listing') }}" method="get">
                <h6 class="filter__title--mod">Collection</h6>
                <div class="custom-control custom-radio">
                  <input type="radio" {{ request()->is('property/listing?new_arrival*') ? 'checked' : '' }} class="custom-control-input" value="1" name="new_arrival" id="customCheck1">
                  <label class="custom-control-label" for="customCheck1">New Arrival</label>
                </div>
                <div class="custom-control custom-radio">
                  <input type="radio" {{ request()->is('property/listing?most_popular*') ? 'checked' : '' }} class="custom-control-input" value="1" name="most_popular" id="customCheck2">
                  <label class="custom-control-label" for="customCheck2">Most Popular</label>
                </div>
                <div class="custom-control custom-radio">
                  <input type="radio" {{ request()->is('property/listing?recent_venue*') ? 'checked' : '' }} class="custom-control-input" value="1" name="recent_venue" id="customCheck3">
                  <label class="custom-control-label" for="customCheck3">Recent Venue</label>
                </div>
                <div class="custom-control custom-radio">
                  <input type="radio" {{ request()->is('property/listing?upcoming_property*') ? 'checked' : '' }} class="custom-control-input" value="1" name="upcoming_property" id="customCheck4">
                  <label class="custom-control-label" for="customCheck4">Upcoming Property</label>
                </div>
              </form>
            </div>
            <div class="select__list">
              <h6 class="filter__title--mod">Property Type</h6>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck5">
                <label class="custom-control-label" for="customCheck5">1BHK</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck6">
                <label class="custom-control-label" for="customCheck6">2BHK</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck7">
                <label class="custom-control-label" for="customCheck7">3BHK</label>
              </div>
            </div>
          </div>
        </div> --}}
        <div class="col-12">
          <div class="property_listing">
            
            <ul>
                @foreach ($Property_listing as $listing)
                    <li>
                        <div class="space__list__details">
                          <img src="{{ asset($listing->image) }}">
                        <div class="list__caption">
                            <h5><a href="{{ route('front.property.details', $listing->id) }}">{{ $listing->title }}</a></h5>
                            <h6><img src="{{ asset('Front/images/map-pin.svg')}}"> {{ $listing->location }}</h6>
                            <ul>
                            <li><i class="fas fa-arrows-alt"></i> {{ $listing->property_Area }}</li>
                            <li><i class="fas fa-bed"></i> {{ $listing->No_of_bedroom }} Bedroom</li>
                            <li><i class="fas fa-utensils"></i> {{ $listing->No_of_kitchen }} Kitchen</li>
                            <li><i class="fas fa-bath"></i> {{ $listing->No_of_bathroom }} Bathroom</li>
                            <li><i class="fas fa-parking"></i> {{ $listing->No_of_parking }} Parking</li>
                            </ul>
                            {{-- <p>{!! $listing->discriprion !!}</p> --}}
        
                            <div class="list__footer">
                            <h2>₹{{ $listing->price }}</h2>
                            <a class="view__btn" href="{{ route('front.property.details', $listing->id) }}">View Details</a>
                        </div>
                        </div>
                    </li>
                @endforeach
            </ul>
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
          getOutput.html( ui.values[0]+' - '+ui.values[1]+'Miles');
          $("#minValue").val(ui.values[0]+ ' Miles');
          $("#maxValue").val(ui.values[1]+ ' Miles');
        }
      });
      getOutput.html(getSlider.slider("values",0)+' - '+getSlider.slider("values",1)+"Miles");
      $("#minValue").val(getSlider.slider('values', 0)+ ' Miles');
      $("#maxValue").val(getSlider.slider('values', 1)+ ' Miles');

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
          getOutput.html( ui.values[0]+' - '+ui.values[1]+'$');
          $("#priceminValue").val(ui.values[0]+ ' $');
          $("#pricemaxValue").val(ui.values[1]+ ' $');
        }
      });
      getOutput.html(getSlider.slider("values",0)+' - '+getSlider.slider("values",1)+"$");
      $("#priceminValue").val(getSlider.slider('values', 0)+ ' $');
      $("#pricemaxValue").val(getSlider.slider('values', 1)+ ' $');

    });
  </script>

@endsection