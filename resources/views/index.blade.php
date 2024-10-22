@extends('layout.app')
@section('content')
    
    <section class="banner">
        @foreach ($Banner as $Banners)
            
        <div class="banner-img">
            <img src="{{ asset($Banners->image) }}" alt="{{ $Banners->image }}" class="img-fluid">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="banner__item">
                        <h1 class="banner__caption">
                            {{ $Banners->title }}
                        </h1>
                        <p class="banner__subcaption">{{ strip_tags($Banners->description) }}</p>
                    </div>
                </div>
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
        @endforeach
    </section>

    <section class="banner__area">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="banner__places">
                        <ul class="banner__item">
                            <li class="banner__list">
                                <img src="{{ asset('Front/images/graph.png') }}">
                                <div class="banner__title">
                                    <h3>Sales</h3>
                                    <p>1500+ Sales</p>
                                </div>
                            </li>
                            <li class="banner__list">
                                <img src="{{ asset('Front/images/apartments.png') }}">
                                <div class="banner__title">
                                    <h3>Properties</h3>
                                    <p>3000+ Listings</p>
                                </div>
                            </li>
                            <li class="banner__list">
                                <img src="{{ asset('Front/images/customers.png') }}">
                                <div class="banner__title">
                                    <h3>Customers</h3>
                                    <p>200+ Happy Customers</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php /* ?>
    <section class="rated__cities">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="rated__content">
                        <h2 class="title1">Top Listing Places</h2>
                        <p class="subtitle1">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="rated__img">
                        <a href="{{ route('front.property.listing.city', $Locality[0]->name) }}"><img src="{{ asset($Locality[0]->image) }}" height="560"></a>
                        <div class="rated__img__caption">
                            <p class="caption__name">{{ $Locality[0]->name }}</p>
                            <div class="caption__listing">
                                @php
                                    $listing_in_this_city = \App\Models\Property::where('location', $Locality[0]->name)->count();
                                @endphp
                                <p class="list__name">{{ $listing_in_this_city }} Listing</p>
                                <p><img src="{{ asset('Front/images/star.svg')}}">8.6</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="row">
                        <div class="col-6 col-md-6">
                            <div class="rated__img">
                                <a href="{{ route('front.property.listing.city', $Locality[1]->name) }}"><img src="{{ asset($Locality[1]->image) }}"></a>
                                <div class="rated__img__caption">
                                    <p class="caption__name">{{ $Locality[1]->name }}</p>
                                    <div class="caption__listing">
                                        @php
                                            $listing_in_this_city = \App\Models\Property::where('location', $Locality[1]->name)->count();
                                        @endphp
                                        <p class="list__name">{{ $listing_in_this_city }} Listing</p>
                                        <p><img src="{{ asset('Front/images/star.svg') }}">7.5</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-6">
                            <div class="rated__img">
                                <a href="{{ route('front.property.listing.city', $Locality[2]->name) }}"><img src="{{ asset($Locality[2]->image) }}" class="img-fluid"></a>
                                <div class="rated__img__caption">
                                    <p class="caption__name">{{ $Locality[2]->name }}</p>
                                    <div class="caption__listing">
                                        @php
                                            $listing_in_this_city = \App\Models\Property::where('location', $Locality[2]->name)->count();
                                        @endphp
                                        <p class="list__name">{{ $listing_in_this_city }} Listing</p>
                                        <p><img src="{{ asset('Front/images/star.svg') }}">6.5</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-6">
                            <div class="rated__img">
                                <a href="{{ route('front.property.listing.city', $Locality[3]->name) }}"><img src="{{ asset($Locality[3]->image) }}" class="img-fluid"></a>
                                <div class="rated__img__caption">
                                    <p class="caption__name">{{ $Locality[3]->name }}</p>
                                    <div class="caption__listing">
                                        @php
                                            $listing_in_this_city = \App\Models\Property::where('location', $Locality[3]->name)->count();
                                        @endphp
                                        <p class="list__name">{{ $listing_in_this_city }} Listing</p>
                                        <p><img src="{{ asset('Front/images/star.svg') }}">4.6</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-6">
                            <div class="rated__img">
                                <a href="{{ route('front.property.listing.city', $Locality[4]->name) }}"><img src="{{ asset($Locality[4]->image) }}" class="img-fluid"></a>
                                <div class="rated__img__caption">
                                    <p class="caption__name">{{ $Locality[4]->name }}</p>
                                    <div class="caption__listing">
                                        @php
                                            $listing_in_this_city = \App\Models\Property::where('location', $Locality[4]->name)->count();
                                        @endphp
                                        <p class="list__name">{{ $listing_in_this_city }} Listing</p>
                                        <p><img src="{{ asset('Front/images/star.svg') }}">5.3</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php */ ?>
    <section class="explore__space">
        <nav class="explore__tab__banner">
            <div class="container">
                <div class="explore__tab__content">
                    <h2 class="title2">Explore Properties</h2>
                    <p class="subtitle2">Latest exclusive listings in our directory</p>
                </div>
            </div>
            <div class="explore_tab">
                <div class="container">
                    <div class="nav nav-tabs filter-option" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" href="javaScript:void(0)" data-category="all">All Categories
                        </a>
                        <a class="nav-item nav-link" href="javaScript:void(0)" data-category="villas">Villas</a>
                        <a class="nav-item nav-link" href="javaScript:void(0)" data-category="apartments">Apartments</a>
                        <a class="nav-item nav-link" href="javaScript:void(0)" data-category="deplux">Deplux Houses</a>
                    </div>
                </div>
            </div>
        </nav>
        <div class="tab__content">
            <div class="container-fluid">
                <ul class="space__list">
                    
                                @foreach ($Villas_Property as $Property)
                                
                                    <li data-match="villas">
                                        <div class="space__list__details">
                                          <img src="{{ asset($Property->image) }}">
                                          <div class="list__caption">
                                              <a class="view__btn" href="{{ route('front.property.details', $Property->id) }}"><h5>{{ $Property->title }}</h5></a>
                                                <h6><img src="{{ asset('Front/images/map-pin.svg') }}">
                                                    {{ $Property->location }} </h6>
                                                <ul>
                                                    <li><i class="fas fa-arrows-alt"></i> {{ $Property->property_Area }}
                                                    </li>
                                                    <li><i class="fas fa-bed"></i> {{ $Property->No_of_bedroom }} BedRoom
                                                    </li>
                                                    <li><i class="fas fa-utensils"></i> {{ $Property->No_of_kitchen }}
                                                        Kitchen</li>
                                                    <li><i class="fas fa-bath"></i> {{ $Property->No_of_bathroom }}
                                                        BathRoom</li>
                                                    <li><i class="fas fa-parking"></i> {{ $Property->No_of_parking }}
                                                        Parking</li>
                                                </ul>
                                                {{-- <p>{!! $Property->discriprion !!}</p> --}}

                                                        <div class="list__footer">
                                                            <h2>₹{{ $Property->price }}</h2>
                                                            <a class="view__btn" href="{{ route('front.property.details', $Property->id) }}">View Details</a>
                                                        </div>
                                            </div>
                                    </li>
                                
                                @endforeach

                                @foreach ($Apartments_Property as $Property)
                                
                                    <li data-match="apartments">
                                        <div class="space__list__details">
                                          <img src="{{ asset($Property->image) }}">
                                          <div class="list__caption">
                                              <a class="view__btn" href="{{ route('front.property.details', $Property->id) }}"><h5>{{ $Property->title }}</h5></a>
                                                <h6><img src="{{ asset('Front/images/map-pin.svg') }}">
                                                    {{ $Property->location }} </h6>
                                                <ul>
                                                    <li><i class="fas fa-arrows-alt"></i> {{ $Property->property_Area }}
                                                    </li>
                                                    <li><i class="fas fa-bed"></i> {{ $Property->No_of_bedroom }} BedRoom
                                                    </li>
                                                    <li><i class="fas fa-utensils"></i> {{ $Property->No_of_kitchen }}
                                                        Kitchen</li>
                                                    <li><i class="fas fa-bath"></i> {{ $Property->No_of_bathroom }}
                                                        BathRoom</li>
                                                    <li><i class="fas fa-parking"></i> {{ $Property->No_of_parking }}
                                                        Parking</li>
                                                </ul>
                                                {{-- <p>{!! $Property->discriprion !!}</p> --}}

                                                        <div class="list__footer">
                                                            <h2>₹{{ $Property->price }}</h2>
                                                            <a class="view__btn" href="{{ route('front.property.details', $Property->id) }}">View Details</a>
                                                        </div>
                                            </div>
                                        </div>
                                    </li>
                                
                                @endforeach

                                @foreach ($Deplux_Property as $Property)
                                
                                    <li data-match="deplux">
                                        <div class="space__list__details">
                                            <img src="{{ asset($Property->image) }}">
                                            <div class="list__caption">
                                                <a class="view__btn" href="{{ route('front.property.details', $Property->id) }}"><h5>{{ $Property->title }}</h5></a>
                                                <h6><img src="{{ asset('Front/images/map-pin.svg') }}">
                                                    {{ $Property->location }} </h6>
                                                <ul>
                                                    <li><i class="fas fa-arrows-alt"></i> {{ $Property->property_Area }}
                                                    </li>
                                                    <li><i class="fas fa-bed"></i> {{ $Property->No_of_bedroom }} BedRoom
                                                    </li>
                                                    <li><i class="fas fa-utensils"></i> {{ $Property->No_of_kitchen }}
                                                        Kitchen</li>
                                                    <li><i class="fas fa-bath"></i> {{ $Property->No_of_bathroom }}
                                                        BathRoom</li>
                                                    <li><i class="fas fa-parking"></i> {{ $Property->No_of_parking }}
                                                        Parking</li>
                                                </ul>
                                                {{-- <p>{!! $Property->discriprion !!}</p> --}}

                                                        <div class="list__footer">
                                                            <h2>₹{{ $Property->price }}</h2>
                                                            <a class="view__btn" href="{{ route('front.property.details', $Property->id) }}">View Details</a>
                                                        </div>
                                            </div>
                                        </div>
                                    </li>
                                
                                @endforeach
                            

                </ul>
            </div>
        </div>
    </section>

    <!--<section class="rated__cities pt-0">-->
    <!--    <div class="container">-->
    <!--        <div class="row">-->
    <!--            <div class="col-12 col-md-12">-->
    <!--                <div class="rated__content">-->
    <!--                    <h2 class="title1">Our Latest News</h2>-->
    <!--                    <p class="subtitle1">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>-->
    <!--                </div>-->
    <!--            </div>-->

    <!--            <div class="col-12">-->
    <!--                <div class="row">-->
    <!--                    @foreach ($News as $News_list)-->
    <!--                        <div class="col-12 col-md-6">-->
    <!--                            <div class="rated__img">-->
    <!--                                <a href="{{ route('front.news.details', $News_list->id) }}"><img src="{{ asset($News_list->image) }}"></a>-->
    <!--                                <div class="rated__img__caption">-->
    <!--                                    <p class="caption__name">{{ $News_list->title }}</p>-->
    <!--                                    <div class="caption__listing">-->
    <!--                                        <p class="list__name"><i class="fas fa-calendar-day"></i>-->
    <!--                                            {{date('d M, Y', strtotime($News_list->created_at))}}</p>-->
                                            <!-- <p><img src="images/star.svg">7.5</p> -->
    <!--                                    </div>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    @endforeach-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->

    <?php /* ?>
    <section class="rated__cities pt-0">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="rated__content">
                        <h2 class="title1">Our Latest Blogs</h2>
                        <p class="subtitle1">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                    </div>
                </div>

                <div class="col-12">
                    <div class="row">
                        @foreach ($Blog as $Blog_list)
                            <div class="col-md-4">
                                <div class="space__list__details">
                                    <img src="{{ asset($Blog_list->image) }}">
                                    <div class="list__caption">
                                        <a href="{{ route('front.blogs.details', $Blog_list->id) }}"><h5>{{ $Blog_list->title }}</h5></a>
                                        {{-- <p>{!! $Blog_list->discription !!}</p> --}}

                                        <div class="list__footer">
                                            <h4><i class="fas fa-calendar-day"></i>{{date('d M, Y', strtotime($Blog_list->created_at))}}</h4>
                                            <a class="view__btn" href="{{ route('front.blogs.details', $Blog_list->id) }}">View Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php */ ?>

    <section class="developer_section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-12">
                    <h2 class="title1">Some Developers that we work with</h2>
                </div>

                <div class="col-6 col-sm-2 mt-2 mt-sm-5 text-center">
                    <img src="{{ asset('Front/images/logo_1.png')}}">
                </div>
                <div class="col-6 col-sm-2 mt-2 mt-sm-5 text-center">
                    <img src="{{ asset('Front/images/logo_2.webp')}}">
                </div>
                <div class="col-6 col-sm-2 mt-2 mt-sm-5 text-center">
                    <img src="{{ asset('Front/images/logo_3.png')}}">
                </div>
                <div class="col-6 col-sm-2 mt-2 mt-sm-5 text-center">
                    <img src="{{ asset('Front/images/logo_4.png')}}">
                </div>
                <div class="col-6 col-sm-2 mt-2 mt-sm-5 text-center">
                    <img src="{{ asset('Front/images/logo_5.png')}}">
                </div>
                <div class="col-6 col-sm-2 mt-2 mt-sm-5 text-center">
                    <img src="{{ asset('Front/images/logo_6.png')}}">
                </div>
                <div class="col-6 col-sm-2 mt-2 mt-sm-5 text-center">
                    <img src="{{ asset('Front/images/logo_7.png')}}">
                </div>
                <div class="col-6 col-sm-2 mt-2 mt-sm-5 text-center">
                    <img src="{{ asset('Front/images/logo_8.webp')}}">
                </div>
                <div class="col-6 col-sm-2 mt-2 mt-sm-5 text-center">
                    <img src="{{ asset('Front/images/logo_9.png')}}">
                </div>
                <div class="col-6 col-sm-2 mt-2 mt-sm-5 text-center">
                    <img src="{{ asset('Front/images/logo_10.png')}}">
                </div>
                <div class="col-6 col-sm-2 mt-2 mt-sm-5 text-center">
                    <img src="{{ asset('Front/images/logo_11.webp')}}">
                </div>
                <div class="col-6 col-sm-2 mt-2 mt-sm-5 text-center">
                    <img src="{{ asset('Front/images/logo_12.png')}}">
                </div>
                <div class="col-6 col-sm-2 mt-2 mt-sm-5 text-center">
                    <img src="{{ asset('Front/images/logo_13.png')}}">
                </div>
            </div>
        </div>
    </section>

    <section class="testimonial">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-12">
                    <h2 class="title1">Testimonials</h2>
                    <p class="subtitle1">See what our clients say about us</p>
                </div>
                <div class="col-12 col-md-8">
                    <div class="testimonial__list">
                      @foreach ($Review as $Reviews)
                        <div class="testimonial__deatils">
                            <div class="testi__img">
                                <img src="{{ asset($Reviews->image) }}">
                                <div class="testi__img__before">
                                    <img src="{{ asset('Front/images/coma.svg')}}">
                                </div>
                            </div>
                            <div class="testi__cont">
                                <h5>{{ $Reviews->name }}</h5>
                                <p>{{ $Reviews->message }}</p>
                            </div>
                        </div>
                      @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="subscription">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12">
                    <h2 class="title1">Stay tuned for meaningful Real Estate news from across the country</h2>
                    <div class="subscription_box">
                        
                        <div class="subscription_banner">
                            <img src="{{ asset('Front/images/form_img.png')}}">
                        </div>
                        <div class="subscription_form">
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
    {{-- <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <script>
      var swiper = new Swiper(".swiper-explore-slide", {
        slidesPerView: 4,
        paginationClickable: true,
        spaceBetween: 20,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });
    </script> --}}
    
@endsection
