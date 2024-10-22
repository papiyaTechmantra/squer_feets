@extends('layout.app')
@section('content')

    <section class="about__banner" style="background-image: url({{ asset('Front/images/banner3.png') }});">
      <div class="about__banner_content">
        <h1 class="banner__caption">PROPERTY LEASING & RENTING</h1>
        <!-- <p class="banner__subcaption subcaption--mod">We are an ambitious startup that is trying to change the way the creative industry collaborates. It takes a variety of different people and resources to make projects happen — we aim to make it easier to bring those dreams to life. At Studiosesh our top priority is connecting people in an efficient and sustainable way.</p> -->
        
        <!-- <p class="banner__subcaption subcaption--mod">If you want to join our community, sign up for the mailing list or follow us on social media, to get notified when we launch in your area. </p> -->
      </div>
    </section>

    <section class="why_section">
      <div class="container mb-3 mb-sm-5">
        <p>At Squarefeets Realty Services, we offer a full spectrum of leasing and rental services designed to connect property owners and tenants while ensuring a harmonious experience for all parties involved. Our approach is two-fold: assisting clients in finding the right property that meets their specific needs and providing comprehensive property management services to property owners.</p>
      </div>

      <div class="container mb-3 mb-sm-5">
        <div class="row align-items-center justify-content-between">
          <div class="col-sm-5">
            <figure class="left_image">
              <img src="{{ asset('Front/images/buying_8.jpg')}}">
            </figure>
          </div>
          <div class="col-sm-6">
            <h4>For Tenants</h4>
            <p>We understand that finding the ideal rental property is about matching lifestyle needs with the right location and amenities. Our team provides personalized search services, filtering through our extensive database of rental listings to find properties that align with your preferences, whether it's proximity to work, schools, or essential services. We also guide tenants through the legal formalities and process, ensuring a smooth transition into their new rental home or establishment.</p>
          </div>
        </div>
      </div>

      <div class="container mb-3 mb-sm-5">
        <div class="row flex-sm-row-reverse align-items-center justify-content-between">
          <div class="col-sm-5">
            <figure class="right_image">
              <img src="{{ asset('Front/images/buying_9.jpg')}}">
            </figure>
          </div>
          <div class="col-sm-6">
            <h4>For Property Owners</h4>
            <p>For property owners, our rental management services are designed to minimize vacancies and maximize return on investment. We aim at performing proper tenant profiling, to ensure reliable and responsible occupants. Our lease management includes drafting comprehensive agreements that protect your interests, regular property inspections, and swift resolution of any maintenance issues so that you can have peace of mind knowing your property is in professional hands.</p>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row align-items-center justify-content-between">
          <div class="col-sm-5">
            <figure class="left_image">
              <img src="{{ asset('Front/images/buying_10.jpg')}}">
            </figure>
          </div>
          <div class="col-sm-6">
            <h4>Repairs & Staging</h4>
            <p>One of the most important aspects of property renting or leasing is presentation of the property to the prospect tenant. A well repaired, painted, neat and clean property can never go wrong in instantly appealing to an intending tenant, and helps in promptly renting out the property. Most of the times, it is not possible for a property owner to spend time in addressing these things. This is where we step in and help our clients with our staging advice, which is grounded in market trends and buyer preferences, aiming to showcase your property at its best.</p>
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
