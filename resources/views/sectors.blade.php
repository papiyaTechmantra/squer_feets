@extends('layout.app')
@section('content')

    <section class="about__banner" style="background-image: url({{ asset('Front/images/banner3.png') }});">
      <div class="about__banner_content">
        <h1 class="banner__caption">REAL ESTATE SECTORS THAT WE CAN HELP YOU WITH:</h1>
        <!-- <p class="banner__subcaption subcaption--mod">We are an ambitious startup that is trying to change the way the creative industry collaborates. It takes a variety of different people and resources to make projects happen — we aim to make it easier to bring those dreams to life. At Studiosesh our top priority is connecting people in an efficient and sustainable way.</p> -->
        
        <!-- <p class="banner__subcaption subcaption--mod">If you want to join our community, sign up for the mailing list or follow us on social media, to get notified when we launch in your area. </p> -->
      </div>
    </section>

    <section class="why_section">
      <div class="container mb-3 mb-sm-5">
        <div class="row align-items-center justify-content-between">
          <div class="col-sm-5">
            <figure class="left_image">
              <img src="{{ asset('Front/images/sector_1.jpg')}}">
            </figure>
          </div>
          <div class="col-sm-6">
            <h4>Residential</h4>
            <p>We offer tailored services for home buyers and sellers, assisting with everything from property search and viewings to negotiations and closing. Whether you're looking for a family home or an investment property, our expertise ensures a smooth and satisfactory transaction.</p>
          </div>
        </div>
      </div>

      <div class="container mb-3 mb-sm-5">
        <div class="row flex-sm-row-reverse align-items-center justify-content-between">
          <div class="col-sm-5">
            <figure class="right_image">
              <img src="{{ asset('Front/images/sector_2.jpg')}}">
            </figure>
          </div>
          <div class="col-sm-6">
            <h4>Commercial</h4>
            <p>Our team provides specialized services for commercial real estate transactions, including office spaces, industrial properties, and special-purpose buildings. We understand the unique challenges of commercial investments and offer insights into market trends and yield optimization.</p>
          </div>
        </div>
      </div>

      <div class="container mb-3 mb-sm-5">
        <div class="row align-items-center justify-content-between">
          <div class="col-sm-5">
            <figure class="left_image">
              <img src="{{ asset('Front/images/sector_3.jpg')}}">
            </figure>
          </div>
          <div class="col-sm-6">
            <h4>Retail</h4>
            <p>For retail properties, we connect clients with prime locations that boost visibility and foot traffic. We understand the retail landscape and can advise on leasing, purchasing, and selling retail spaces that align with your business goals.</p>
          </div>
        </div>
      </div>

      <div class="container mb-3 mb-sm-5">
        <div class="row flex-sm-row-reverse align-items-center justify-content-between">
          <div class="col-sm-5">
            <figure class="right_image">
              <img src="{{ asset('Front/images/sector_4.jpg')}}">
            </figure>
          </div>
          <div class="col-sm-6">
            <h4>Land</h4>
            <p>We assist clients in the acquisition and sale of land, offering insights into zoning, potential for appreciation, and development opportunities. Whether for investment, development, or conservation, we provide the expertise to navigate these transactions.</p>
          </div>
        </div>
      </div>

      <div class="container mb-3 mb-sm-5">
        <div class="row align-items-center justify-content-between">
          <div class="col-sm-5">
            <figure class="left_image">
              <img src="{{ asset('Front/images/sector_5.jpg')}}">
            </figure>
          </div>
          <div class="col-sm-6">
            <h4>Warehouse</h4>
            <p>With the rise of e-commerce, demand for warehouse space has grown. We help clients find functional warehouse properties suited for logistics, distribution, or manufacturing, ensuring they meet operational requirements and investment criteria.</p>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-sm-6">
            <p>For each sector, our services are designed to navigate complex markets, provide strategic advice, and manage transactions with professional diligence.</p>
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
