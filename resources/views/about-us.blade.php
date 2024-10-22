@extends('layout.app')
@section('content')

    <section class="about__banner" style="background-image: url({{ asset('Front/images/banner3.png') }});">
      <div class="about__banner_content">
        <h1 class="banner__caption">
          How Studiosesh Connects You
        </h1>
        <p class="banner__subcaption subcaption--mod">We are an ambitious startup that is trying to change the way the creative industry collaborates. It takes a variety of different people and resources to make projects happen — we aim to make it easier to bring those dreams to life. At Studiosesh our top priority is connecting people in an efficient and sustainable way.</p>
        
        <!-- <p class="banner__subcaption subcaption--mod">If you want to join our community, sign up for the mailing list or follow us on social media, to get notified when we launch in your area. </p> -->
      </div>
    </section>

    <section class="service">
      <div class="container">
        <div class="row">
          <div class="col-12 col-sm-6 col-md-6 col-lg-4">
            <div class="service__list">
              <div class="service__icon">
                <img src="{{ asset('Front/images/connect1.svg')}}">
              </div>
              <h5>We Expand Your Network</h5>
              <p>It's almost impossible to grow as an artist without the help of your network. Grow your network with likeminded individuals and establishments.</p>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-6 col-lg-4">
            <div class="service__list">
              <div class="service__icon">
                <img src="{{ asset('Front/images/connect2.svg')}}">
              </div>
              <h5>We Help You Discover</h5>
              <p>Discover new artists, new locations, and connect with others within and outside of your home city!</p>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-6 col-lg-4">
            <div class="service__list">
              <div class="service__icon">
                <img src="{{ asset('Front/images/connect3.svg')}}">
              </div>
              <h5>We Simplify Booking</h5>
              <p>We know that booking space can be difficult and time consuming, let us streamline the process so you can focus on what matters most.</p>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-6 col-lg-4">
            <div class="service__list">
              <div class="service__icon">
                <img src="{{ asset('Front/images/connect4.svg')}}">
              </div>
              <h5>We Value Your Opinion</h5>
              <p>Review the people and places that you've worked with before. Let others know about your experience.</p>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-6 col-lg-4">
            <div class="service__list">
              <div class="service__icon">
                <img src="{{ asset('Front/images/connect5.svg')}}">
              </div>
              <h5>We Introduce You</h5>
              <p>Meeting people at the right place at the right time is hard. Create a stunning portfolio that showcases who you are so that we can connect you.</p>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-6 col-lg-4">
            <div class="service__list">
              <div class="service__icon">
                <img src="{{ asset('Front/images/connect6.svg')}}">
              </div>
              <h5>So That You Can Grow</h5>
              <p>Get your name and your business out there. When we work together, everybody wins.</p>
            </div>
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
