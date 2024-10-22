@extends('layout.app')
@section('content')

    <section class="about__banner" style="background-image: url({{ asset('Front/images/banner3.png') }});">
      <div class="about__banner_content">
        <h1 class="banner__caption">Property Selling</h1>
        <!-- <p class="banner__subcaption subcaption--mod">We are an ambitious startup that is trying to change the way the creative industry collaborates. It takes a variety of different people and resources to make projects happen — we aim to make it easier to bring those dreams to life. At Studiosesh our top priority is connecting people in an efficient and sustainable way.</p> -->
        
        <!-- <p class="banner__subcaption subcaption--mod">If you want to join our community, sign up for the mailing list or follow us on social media, to get notified when we launch in your area. </p> -->
      </div>
    </section>

    <section class="why_section">
      <div class="container mb-3 mb-sm-5">
        <p>At Squarefeets Realty Services, we customize our property selling strategies to ensure your listing captures the attention of the most appropriate audience. Our methods are focused on creating wide-reaching exposure that targets potential buyers effectively. This results in a quick sale of your property and helps maximizing your returns.</p>
      </div>

      <div class="container mb-3 mb-sm-5">
        <div class="row align-items-center justify-content-between">
          <div class="col-sm-5">
            <figure class="left_image">
              <img src="{{ asset('Front/images/buying_5.jpg')}}">
            </figure>
          </div>
          <div class="col-sm-6">
            <h4>Customer Profiling</h4>
            <p>While they say that a good salesperson is one who can sell a comb to a bald person, the same does not apply to all aspects of selling. At Squarefeets, we strongly believe in offering the inventory only to those who have a matching requirement. We ask the right questions to the prospective buyer to understand what he needs, so that we can offer them accordingly. This saves time and harassment for both the buyer as well as the seller, and the turnaround time is much quicker.</p>
          </div>
        </div>
      </div>

      <div class="container mb-3 mb-sm-5">
        <div class="row flex-sm-row-reverse align-items-center justify-content-between">
          <div class="col-sm-5">
            <figure class="right_image">
              <img src="{{ asset('Front/images/buying_6.jpg')}}">
            </figure>
          </div>
          <div class="col-sm-6">
            <h4>Price Setting</h4>
            <p>Often, Sellers expect the Realtor to guide them with the right price point at which they should look to sell their property. In setting the price, we make an effort into deriving the right price point through a data-driven approach. We analyze comparable sales and market conditions to establish a competitive yet realistic price point. This strategy aims to attract serious offers while ensuring you receive optimal value for your property. </p>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row align-items-center justify-content-between">
          <div class="col-sm-5">
            <figure class="left_image">
              <img src="{{ asset('Front/images/buying_7.jpg')}}">
            </figure>
          </div>
          <div class="col-sm-6">
            <h4>Marketing & Property Listing</h4>
            <p>We craft compelling marketing campaigns that combine digital and traditional media, ensuring your property is seen by a broad audience of potential buyers. Not only do we hold premium subscriptions with most online property portals, we also engage in digital marketing, social media marketing, etc, so that your listing stands out through professional marketing practices, including high-quality photography, compelling property descriptions, and strategic online placements.</p>
          </div>
        </div>
      </div>

      <div class="container mb-3 mb-sm-5">
        <div class="row flex-sm-row-reverse align-items-center justify-content-between">
          <div class="col-sm-5">
            <figure class="right_image">
              <img src="{{ asset('Front/images/buying_3.jpg')}}">
            </figure>
          </div>
          <div class="col-sm-6">
            <h4>Price Negotiations</h4>
            <p>When it comes to negotiations, we bring to the table strong communication skills and a deep understanding of buyer psychology, ensuring that the final sale terms are advantageous for you. Our goal is to secure the best sale price and terms, making the selling process as profitable and stress-free as possible.</p>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row align-items-center justify-content-between">
          <div class="col-sm-5">
            <figure class="left_image">
              <img src="{{ asset('Front/images/buying_4.jpg')}}">
            </figure>
          </div>
          <div class="col-sm-6">
            <h4>Closing Assistance</h4>
            <p>Finalizing a property transaction can be complex, but with Squarefeets Realty Services, you have a partner every step of the way. Our property closing services are designed to take the weight off your shoulders, handling all legal paperwork and procedures with precision. We provide end-to-end real estate assistance, ensuring each detail is addressed for a smooth, secure closing. Count on us to guide you to a successful and stress-free conclusion of your property journey.</p>
          </div>
        </div>
      </div>

    </section>

    <section class="subscription">
      <div class="container">
        <div class="row">
          <div class="col-12 col-md-12">
            <h2 class="title1">subscribe to our newsletter</h2>
            <div class="subscription_box">
              <div class="subscription_banner">
                <img src="{{ asset('Front/images/form_img.png')}}">
              </div>
              <div class="subscription_form">
                <div class="form__box">
                  <h5 class="form__title">Sign up for our mailing list!</h5>
                  <form action="{{ route('front.subscribers_store') }}" method="post">
                    @csrf
                    <div class="studio__form">
                      <input type="email" name="email" placeholder="Email">
                      <span class="icon"><img src="{{ asset('Front/images/mail-black-envelope-symbol.svg')}}"></span>
                      @error('email')
                          <p class="small text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                    <button type="submit" class="btn btn-success btn__subscribe">Subscribe</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection
