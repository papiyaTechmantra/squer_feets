@extends('layout.app')
@section('content')

    <section class="about__banner" style="background-image: url({{ asset('Front/images/banner3.png') }});">
      <div class="about__banner_content">
        <h1 class="banner__caption">Property Buying</h1>
        <!-- <p class="banner__subcaption subcaption--mod">We are an ambitious startup that is trying to change the way the creative industry collaborates. It takes a variety of different people and resources to make projects happen — we aim to make it easier to bring those dreams to life. At Studiosesh our top priority is connecting people in an efficient and sustainable way.</p> -->
        
        <!-- <p class="banner__subcaption subcaption--mod">If you want to join our community, sign up for the mailing list or follow us on social media, to get notified when we launch in your area. </p> -->
      </div>
    </section>

    <section class="why_section">
      <div class="container mb-3 mb-sm-5">
        <p>Discover the ease of property buying in Kolkata with Squarefeets Realty Services. We tailor our expertise in residential and commercial property purchases to meet your individual needs, ensuring a smooth path to ownership. Our team is committed to aligning your real estate investments with your goals, providing support and insights throughout the city's diverse neighborhoods. Trust us to guide you to your ideal property in Kolkata's dynamic market.</p>
      </div>

      <div class="container mb-3 mb-sm-5">
        <div class="row align-items-center justify-content-between">
          <div class="col-sm-5">
            <figure class="left_image">
              <img src="{{ asset('Front/images/buying_1.jpg')}}">
            </figure>
          </div>
          <div class="col-sm-6">
            <h4>Market Analysis</h4>
            <p>Navigating Kolkata's real estate requires up-to-date market knowledge. Squarefeets Realty Services offers a succinct market analysis to inform you of the latest trends and pricing, ensuring you make data-driven property decisions. Our continuous monitoring of market fluctuations equips you with foresight for impactful investments, guiding you to success in a vibrant property landscape.</p>
          </div>
        </div>
      </div>

      <div class="container mb-3 mb-sm-5">
        <div class="row flex-sm-row-reverse align-items-center justify-content-between">
          <div class="col-sm-5">
            <figure class="right_image">
              <img src="{{ asset('Front/images/buying_2.jpg')}}">
            </figure>
          </div>
          <div class="col-sm-6">
            <h4>Property Selection</h4>
            <p>Selecting the perfect property in Kolkata is made easy with Squarefeets Realty Services. Our personalized approach starts with your needs, guiding you to the best residential or commercial properties. Whether it's for living or investment, we ensure every choice offers value, growth potential, and suits your criteria. With our expert guidance, you'll find a property that's not just a space but a smart investment for your future.</p>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row align-items-center justify-content-between">
          <div class="col-sm-5">
            <figure class="left_image">
              <img src="{{ asset('Front/images/buying_3.jpg')}}">
            </figure>
          </div>
          <div class="col-sm-6">
            <h4>Price Negotiation</h4>
            <p>At Squarefeets Realty Services, we excel in property price negotiation, ensuring our clients secure deals that are both fair and beneficial. Our skilled negotiators combine in-depth local market knowledge with a strategic approach, aiming for terms that genuinely reflect the property's value. We commit to transparent negotiations, focused on delivering results that exceed your property investment goals with integrity and fairness.</p>
          </div>
        </div>
      </div>

      <div class="container mb-3 mb-sm-5">
        <div class="row flex-sm-row-reverse align-items-center justify-content-between">
          <div class="col-sm-5">
            <figure class="right_image">
              <img src="{{ asset('Front/images/buying_4.jpg')}}">
            </figure>
          </div>
          <div class="col-sm-6">
            <h4>Closing Assistance</h4>
            <p>Our closing is a comprehensive support system designed to navigate you through the final and often most intricate part of the property transaction. We manage all the essential tasks, from the meticulous review of legal documents to ensuring all contractual obligations are met. Our property closing services encompass all the necessary steps to finalize the sale, including title examination, resolving any contingencies, and conducting the final walkthrough. With our real estate purchase assistance, we aim to deliver a smooth, transparent, and efficient closing process, mitigating any challenges that can arise and ensuring a successful transaction. Whether you're a buyer or a seller, our expertise ensures that when the keys change hands, you're confident and content with the outcome.</p>
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
