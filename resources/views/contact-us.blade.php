@extends('layout.app')
@section('content')

    <section class="contact__banner" style="background-image: url({{ asset('Front/images/contact_banner.png')}});">
      <div class="contact__banner_content">
        <h1 class="banner__caption">
          Contact Us
        </h1>
        <p class="banner__subcaption subcaption--mod">You can send us a message through here!</p>
      </div>
    </section>

    <section class="contact__form">
      <div class="container">
        <div class="row">
          <div class="col-12 col-md-12">
            <div class="contact__area">
              <div class="contact__address">
                <img src="{{ asset('Front/images/contact_logo.svg')}}">
                <h4 class="contact__title">Get in touch</h4>
                <ul class="contact__list">
                  <li>
                    <span><img src="{{ asset('Front/images/location.svg')}}"></span>
                    <p>San Francisco, California</p>
                  </li>
                  <li>
                    <span><img src="{{ asset('Front/images/mail-black-envelope.svg')}}"></span>
                    <p>studioseshsf@gmail.com</p>
                  </li>
                  <li>
                    <span><img src="{{ asset('Front/images/call_icon.svg')}}"></span>
                    <p>(650) 215-8551</p>
                  </li>
                </ul>
              </div>
              <div class="contact__formfield">
                <form action="{{ route('front.store.lead') }}" method="post">
                  @csrf
                  <div class="studio__form">
                      <input type="text" name="name" placeholder="Name">
                      <span class="icon icon--mod"><img src="{{ asset('Front/images/user.svg')}}"></span>
                  </div>
                  <div class="studio__form">
                      <input type="email" name="email" placeholder="Email">
                      <span class="icon icon--mod"><img src="{{ asset('Front/images/mail-black-envelope-symbol.svg')}}"></span>
                  </div>
                  <div class="studio__form">
                      <input type="text" name="phone_no" placeholder="Phone Number">
                      <span class="icon icon--mod"><img src="{{ asset('Front/images/call_icon.svg')}}"></span>
                  </div>
                  <div class="studio__form">
                      <textarea rows="3" name="message" placeholder="Type your message"></textarea>
                      <span class="icon icon--mod"><img src="{{ asset('Front/images/comment.svg')}}"></span>
                  </div>
                  <div class="submit__sec">
                      <button type="submit" class="btn btn-success btn__contact">Submit</button>
                  </div>
              </form>
              </div>
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