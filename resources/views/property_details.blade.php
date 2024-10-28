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
                               
                            </div>
                            <input type="submit" class="form__submit" value="Submit" name="">
                    </div>
                </div>
            </form>
        </div>
        </div>
      </div>
    </section>

    <section class="details_area">
      <div class="container">
        <nav aria-label="breadcrumb">
          {{-- <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Lucknow</a></li>
            <li class="breadcrumb-item"><a href="#">Gomti Nagar</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tulip 7th Avenue</li>
          </ol> --}}
        </nav>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-sm-8">

            <div class="details_banner">
              <div class="property_banner">
                  @foreach ($Property_Images as $Images)
                    <div class="banner_item">
                      <img src="{{ asset($Images->images) }}">
                      

                    </div>
                    
                  @endforeach
              </div>
              <button id="share-button" class="btn btn-secondary">
                        <i class="fas fa-share-alt"></i> Share
                      </button>

                      <!-- Share Modal -->
                      <div id="share-modal" class="modal" style="display:none;">
                        <div class="modal-content">
                          <span id="close-modal" class="close">&times;</span>
                          <h2>Share this property</h2>
                          
                          <!-- WhatsApp Share -->
                          <a href="https://wa.me/?text={{ urlencode('Check out this property: ' . route('front.property.details', ['slug' => $Property_details->slug, 'uid' => $Property_details->uid])) }}" target="_blank" class="btn btn-success">
                            <i class="fab fa-whatsapp"></i> Share on WhatsApp
                          </a>

                          <!-- Email Share -->
                          <a href="mailto:?subject=Check out this property&body=Check out this property: {{ route('front.property.details', ['slug' => $Property_details->slug, 'uid' => $Property_details->uid]) }}" class="btn btn-primary">
                            <i class="fas fa-envelope"></i> Share via Email
                          </a>
                        </div>
                      </div>
              <div class="property_excerpt">
                    <div class="row">
                        <div class="col-sm-9">
                            <h2>{{ $Property_details->title }}</h2>
                            <div class="property_address">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg>
                                <p>{{ $Property_details->location }}</p></br>
                                
                            </div>
                            <div>
                                <i class="fas fa-clock"></i> 
                                Last Updated Date: {{ $Property_details->updated_at->format('d F, Y') }}
                            </div>
                        </div>
                         <div class="col-sm-3">
                            <h4>₹ {{ $Property_details->price }}*</h4>
                            <div class="details_card">
                                <a href="{{ asset($Property_details->brochure) }}" class="btn btn-primary" download>Download Brochure</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="details_card">
              <h3>Overview of {{ $Property_details->title }}</h3>
              <div class="row">
                <div class="col-sm-4">  
                  <label>Project Area</label>
                  <p>{{ $Property_details->property_Area }}</p>
                </div>
                <div class="col-sm-4">
                  <label>Project Type</label>
                  <p>{{ $Property_details->property_Type }}</p>
                </div>
                <div class="col-sm-4">
                  <label>Project Status</label>
                  <p>{{ $Property_details->property_Status }}</p>
                </div>
                <div class="col-sm-4">
                  <label>Possession on</label>
                  <p>On Request</p>
                </div>
                <div class="col-sm-4">
                  <label>Configurations</label>
                  <p>{{ $Property_details->Configurations }}</p>
                </div>
                <div class="col-sm-4">
                  <label>RERA ID</label>
                  <p>UPRERAPRJ541330</p>
                </div>
                <div class="col-sm-4">
                <label>Parking</label>
                  <p>
                      @phpn 
                          $parkingId = explode(",", $Property_details->parking_id);
                          $totalParking = count($parkingId); // Get the total number of parking entries
                      @endphp

                      @foreach ($parkingId as $key => $parkingData)
                          @php
                              $parking = App\Models\Parking::where('id', $parkingData)->first();
                          @endphp

                          {{ $parking?$parking->name:"NA" }}@if($key != $totalParking - 1), @endif
                      @endforeach
                  </p>


                </div>
                <div class="col-sm-4">
                <label>Size of flat</label>
                  <p>
                      @php
                          $flatsizeId = explode(",", $Property_details->flat_size_id);
                          $totalFlatsize = count($flatsizeId); // Get the total number of parking entries
                      @endphp

                      @foreach ($flatsizeId as $key => $flatsizData)
                          @php
                              $flatsiz = App\Models\FlatSize::where('id', $flatsizData)->first();
                          @endphp

                          {{ $flatsiz?$flatsiz->name:"NA" }}@if($key != $totalFlatsize - 1), @endif
                      @endforeach
                  </p>


                </div>
                
              </div>

              <h4>{{ $Property_details->subtitle }}</h4>
              <p>{!!$Property_details->details!!}</p>
            </div>

            <div class="details_card">
              <h3>Floor Plan of {{$Property_details->title}}</h3>

              <div class="row">
                <div class="col-sm-8">
                  <img src="{{ asset($Property_details->floor_plan_image) }}" class="img-fluid">
                </div>
                <div class="col-sm-4">
                  <div class="row">
                    <div class="col-sm-12">
                      <label>Built-up Area</label>
                      <p>{{$Property_details->property_Area}}</p>
                    </div>
                    <div class="col-sm-12">
                      <label>Base Selling Price</label>
                      <p> ₹ {{$Property_details->price}}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="details_card">
              <h3>Amenities of {{$Property_details->title}}</h3>
              @php
              $amenityId = explode(",", $Property_details->ameniti_id);
              // dd($amenityId);
              @endphp
              
              <ul class="amenity__list">
                @foreach ($amenityId as $amenityIds)
                @php
                    $Amenity = App\Models\Amenity::where('id', $amenityIds)->first();
                @endphp
                <li><img src="{{ asset($Amenity->image) }}" width="15%">{{ $Amenity->name }}</li>
                @endforeach
              </ul>
            </div>

          

            <div class="details_card">
              <h3>Specification of {{$Property_details->title}}</h3>
                {!! $Property_details->discriprion !!}
            </div>

            <div class="details_card">
              <h3>Payments of Tulip 7th Avenue</h3>
              <table class="table">
                <tr>
                  <th>Unit Type</th>
                  <th>Size (SQ. FT.)</th>
                  <th>Price (SQ. FT.)</th>
                  <th>Amount</th>
                  <th>Booking Amt</th>
                </tr>
                @foreach ($Property_variation as $variation)
                    
                  <tr>
                    <td>{{ $variation->property_type }}</td>
                    <td>On Request</td>
                    <td>₹ {{ $variation->selling_price }}</td>
                    <td>₹ On Request</td>
                    <td>₹ {{ $variation->booking_amt }}</td>
                  </tr>
                
                @endforeach
              </table>
              <div id="share-modal" class="modal" style="display:none;">
                        <div class="modal-content">
                            <span id="close-modal" class="close">&times;</span>
                            <h2>Share this property</h2>
                            <a href="https://wa.me/?text={{ urlencode('Check out this property: ' . route('front.property.details', ['slug' => $Property_details->slug, 'uid' => $Property_details->uid])) }}" target="_blank" class="btn btn-success">
                                <i class="fab fa-whatsapp"></i> Share on WhatsApp
                            </a>
                            <a href="mailto:?subject=Check out this property&body=Check out this property: {{ route('front.property.details', ['slug' => $Property_details->slug, 'uid' => $Property_details->uid]) }}" class="btn btn-primary">
                                <i class="fas fa-envelope"></i> Share via Email
                            </a>
                        </div>
                    </div>
            </div>

            <div class="details_card">
              <h3>EMI Calculator</h3>
              <div class="row gx-3 gy-2 mb-4 align-items-center">
                <label class="col-sm-auto" for="specificSizeInputName">Name</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="specificSizeInputName" placeholder="Jane Doe">
                </div>
                <label class="col-sm-auto" for="specificSizeInputName">Total Amount</label>
                <div class="col-sm">
                  <input type="number" id="total_amount" class="form-control" id="specificSizeInputName" value="{{ $Property_details->price }}" onkeyup="myFunction(event,this.value)" placeholder="500000">
                </div>
              </div>

              <div class="row gx-3 gy-2 mb-4 align-items-center">
                <label class="col-sm-auto" for="specificSizeInputName">Down Payment</label>
                <div class="col-sm">
                  <input type="number" id="down_payment" class="form-control" id="specificSizeInputName" onkeyup="myFunction(event,this.value)" placeholder="0.00">
                </div>
                <label class="col-sm-auto" for="specificSizeInputName">Interest Rate (%)</label>
                <div class="col-sm">
                  <input type="number" id="interest_rate" class="form-control" id="specificSizeInputName" onkeyup="myFunction(event,this.value)" placeholder="10">
                </div>
                <label class="col-sm-auto" for="specificSizeInputName">Tenure</label>
                <div class="col-sm">
                  <select id="tenure" class="form-control" onchange="ChangeYears(event,this.value)">
                    <option value="1">1 Year</option>
                    <option value="2">2 Years</option>
                    <option value="3">3 Years</option>
                    <option value="4">4 Years</option>
                    <option value="5">5 Years</option>
                  </select>
                </div>
              </div>

              <div class="row">
                <div class="col-6 col-sm-4">
                  <label>Total Amount</label>
                  <p>₹ <span id="total_amt"></span></p>
                </div>
                <div class="col-6 col-sm-4">
                  <label>Interest to be paid</label>
                  <p>₹ <span id="interest_amt"></span></p>
                </div>
                <div class="col-sm-4 text-right">
                  <label>EMI</label>
                  <p class="emi" id="emi">₹</p>
                </div>
              </div>
            </div>


            <div class="details_card">
              <h3>Rating</h3>
              <div class="row mb-3 align-items-center">
                <div class="col-sm-2"><label class="m-0">Location</label></div>
                <div class="col-sm">
                  <div class="progress" style="height: 5px;">
                    <div class="progress-bar bg-green" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
                <div class="col-sm-auto"><p class="rating"><img src="{{ asset('Front/images/star.svg') }}">0</p></div>
              </div>
              <div class="row mb-3 align-items-center">
                <div class="col-sm-2"><label class="m-0">Safety</label></div>
                <div class="col-sm">
                  <div class="progress" style="height: 5px;">
                    <div class="progress-bar bg-green" role="progressbar" style="width:0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
                <div class="col-sm-auto"><p class="rating"><img src="{{ asset('Front/images/star.svg') }}">0</p></div>
              </div>
              <div class="row mb-3 align-items-center">
                <div class="col-sm-2"><label class="m-0">Transport</label></div>
                <div class="col-sm">
                  <div class="progress" style="height: 5px;">
                    <div class="progress-bar bg-green" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
                <div class="col-sm-auto"><p class="rating"><img src="{{ asset('Front/images/star.svg') }}">0</p></div>
              </div>
              <div class="row mb-3 align-items-center">
                <div class="col-sm-2"><label class="m-0">Entertainment</label></div>
                <div class="col-sm">
                  <div class="progress" style="height: 5px;">
                    <div class="progress-bar bg-orange" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
                <div class="col-sm-auto"><p class="rating"><img src="{{ asset('Front/images/star.svg') }}">0</p></div>
              </div>
              <div class="row mb-3 align-items-center">
                <div class="col-sm-2"><label class="m-0">Connectivity</label></div>
                <div class="col-sm">
                  <div class="progress" style="height: 5px;">
                    <div class="progress-bar bg-green" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
                <div class="col-sm-auto"><p class="rating"><img src="{{ asset('Front/images/star.svg') }}">0</p></div>
              </div>
            </div>

          </div>
          <div class="col-sm-4">
              <div class="details_form">
              <form action="{{ route('front.store.lead') }}" method="post">
                @csrf
                <h4>I AM INTERESTED IN</h4>

                <div class="form-group">
                    <input type="hidden" name="property_id" value="{{$Property_details->id}}">
                  <label class="property_type">
                    <input type="checkbox" name="bhk[]" id="bhk" value="1 BHK"> <span>1BHK</span>
                  </label>
                  <label class="property_type">
                    <input type="checkbox" name="bhk[]" id="bhk" value="2 BHK"> <span>2BHK</span>
                  </label>
                  <label class="property_type">
                    <input type="checkbox" name="bhk[]" id="bhk" value="3 BHK"> <span>3BHK</span>
                  </label>
                  <label class="property_type">
                    <input type="checkbox" name="bhk[]" id="bhk" value="4 BHK"> <span>4BHK</span>
                  </label>
                  <label class="property_type">
                    <input type="checkbox" name="bhk[]" id="bhk" value="5 BHK"> <span>5BHK</span>
                  </label>
                </div>
                <div class="form-group">
                  <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
                <div class="form-group">
                  <input type="email" name="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                  <input type="tel" name="phone_no" class="form-control" placeholder="Phone">
                </div>
                <div class="form-group">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" name="interested_in_loan" id="interested_in_loan">
                    <label class="form-check-label" for="flexCheckDefault">
                      I would also like to know about Home Loans
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <input type="submit" name="" class="submit_btn" value="Get a quote">
                </div>
              </form>
              @if (session('success'))
                  <div class="alert alert-success">{{ session('success') }}</div>
                @endif
              </div>
          </div>
        </div>
      </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="js/slick.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script>
  function myFunction(event,value) {
      var total_amount    = $("#total_amount").val();
      var down_payment    = $("#down_payment").val();
      var interest_rate    = $("#interest_rate").val();
      var tenure    = $("#tenure").val();
      var n = 12*tenure;
      
      total_amount = total_amount-down_payment;
      // alert(value);
      // var interest_amt = (total_amount-down_payment)/100*
      let amt_with_interest = total_amount *(Math.pow((1 + interest_rate / 100), tenure));
      let CI = amt_with_interest - total_amount;
      emi = amt_with_interest/n;
      $('#emi').text(emi.toFixed(2));
      $('#total_amt').text(amt_with_interest.toFixed(2));
      $('#interest_amt').text(CI.toFixed(2));

      console.log("Compound interest is " + CI);
  }
  function ChangeYears(event,value) {

    var total_amount    = $("#total_amount").val();
      var down_payment    = $("#down_payment").val();
      var interest_rate    = $("#interest_rate").val();
      var tenure    = $("#tenure").val();
      var n = 12*tenure;

      total_amount = total_amount-down_payment;

      // alert(value);
      // var interest_amt = (total_amount-down_payment)/100*
      var amt_with_interest = total_amount *(Math.pow((1 + interest_rate / 100), tenure));
      var CI = amt_with_interest - total_amount;
      emi = amt_with_interest/n;
      $('#emi').text(emi.toFixed(2));
      $('#total_amt').text(amt_with_interest.toFixed(2));
      $('#interest_amt').text(CI.toFixed(2));

  }
  </script>
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
      $('.property_banner').slick({
          margin: 10,
          infinite: true,
          slidesToScroll: 1,
          slidesToShow: 1,
          dots: true,
          lazyLoad: 'ondemand',
          arrows: false,
          adaptiveHeight: true,
          autoplay: true,
          autoplaySpeed: 2000,
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
    document.addEventListener('DOMContentLoaded', function () {
  var shareButton = document.getElementById('share-button');
  var shareModal = document.getElementById('share-modal');
  var closeModal = document.getElementById('close-modal');

  // Show modal when share button is clicked
  shareButton.addEventListener('click', function () {
    shareModal.style.display = 'block';
  });

  // Close modal when close button is clicked
  closeModal.addEventListener('click', function () {
    shareModal.style.display = 'none';
  });

  // Close modal when clicking outside the modal content
  window.addEventListener('click', function (event) {
    if (event.target === shareModal) {
      shareModal.style.display = 'none';
    }
  });
});

  </script>

@endsection