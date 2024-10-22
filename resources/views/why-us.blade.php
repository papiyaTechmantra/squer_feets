@extends('layout.app')
@section('content')

    <section class="about__banner" style="background-image: url({{ asset('Front/images/banner3.png') }});">
      <div class="about__banner_content">
        <h1 class="banner__caption">Why Us</h1>
        <!-- <p class="banner__subcaption subcaption--mod">We are an ambitious startup that is trying to change the way the creative industry collaborates. It takes a variety of different people and resources to make projects happen — we aim to make it easier to bring those dreams to life. At Studiosesh our top priority is connecting people in an efficient and sustainable way.</p> -->
        
        <!-- <p class="banner__subcaption subcaption--mod">If you want to join our community, sign up for the mailing list or follow us on social media, to get notified when we launch in your area. </p> -->
      </div>
    </section>

    <section class="why_section">
      <div class="container mb-3 mb-sm-5">
        <div class="row align-items-center justify-content-between">
          <div class="col-sm-5">
            <figure class="left_image">
              <img src="{{ asset('Front/images/why_1.jpg')}}">
            </figure>
          </div>
          <div class="col-sm-6">
            <h4>Commitment to Transparency</h4>
            <p>Transparency in real estate is crucial for building trust with clients. This means providing full disclosure on the conditions of the property, any associated costs, and the terms of the deal without hidden fees or unexpected obligations. Transparent dealings would also include educating the client on all their options and being clear about the process from start to finish.</p>
          </div>
        </div>
      </div>

      <div class="container mb-3 mb-sm-5">
        <div class="row flex-sm-row-reverse align-items-center justify-content-between">
          <div class="col-sm-5">
            <figure class="right_image">
              <img src="{{ asset('Front/images/why_2.jpg')}}">
            </figure>
          </div>
          <div class="col-sm-6">
            <h4>Expert Negotiation</h4>
            <p>Negotiation is an art in the real estate industry, requiring a deep understanding of market conditions, the needs and desires of both parties, and the legal and financial intricacies of property transactions. Our expertise in this area ensures that negotiations are handled professionally and efficiently, with the aim of achieving the best possible outcome for all involved. A focus on expert negotiation helps secure favorable terms while maintaining fairness and consideration for both buyers and sellers.</p>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row align-items-center justify-content-between">
          <div class="col-sm-5">
            <figure class="left_image">
              <img src="{{ asset('Front/images/why_3.jpg')}}">
            </figure>
          </div>
          <div class="col-sm-6">
            <h4>Ethical Dealings</h4>
            <p>Ethical dealings are the cornerstone of any reputable business, especially in real estate. This includes being honest about the pros and cons of a property, not misrepresenting facts, and avoiding conflicts of interest. By operating with integrity and honesty, Squarefeets Realty Services stands out in an industry where these values are sometimes overlooked. Clients can trust that the information they receive is accurate and that their interests are being protected, leading to informed decision-making.</p>
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
