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
                            <input type="submit" class="form__submit" value="Submit" name="">
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
                <span class="filter__icon"><img src="{{ asset('Front/images/filter.svg')}}"></span>
                <h6>Filter</h6>
              </div>
              <div class="filter__area">
                <div class="form__filter">
                  <input type="radio" name="filter" id="studio" checked="checked">
                  <label class="custom__filter" for="studio">
                    2BHK
                  </label>
                </div>
                <div class="form__filter">
                  <input type="radio" name="filter" id="gallery">
                  <label class="custom__filter" for="gallery">
                    Deplux
                  </label>
                </div>
                <div class="form__filter">
                  <input type="radio" name="filter" id="venue">
                  <label class="custom__filter" for="venue">
                    Colony
                  </label>
                </div>
              </div>
              <div class="select__list">
                <h6 class="filter__title--mod">Categories</h6>
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="customCheck1">
                  <label class="custom-control-label" for="customCheck1">New Post</label>
                </div>
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="customCheck2">
                  <label class="custom-control-label" for="customCheck2">Most Popular</label>
                </div>
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="customCheck3">
                  <label class="custom-control-label" for="customCheck3">Laws</label>
                </div>
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="customCheck4">
                  <label class="custom-control-label" for="customCheck4">Property</label>
                </div>
              </div>
            </div>
          </div> --}}
          <div class="col-12">
            <div class="property_listing">
              @foreach ($News as $News_list)
                <div class="list__details">
                  <div class="row">
                    <div class="col-12 col-md-5">
                      <div class="list__slider">
                        <img src="{{ asset($News_list->image) }}">
                      </div>
                    </div>
                    <div class="col-12 col-md-7">
                      <div class="list__content">
                        <h5 class="list__title">{{ $News_list->title }}
                        </h5>
                        <p class="list__overview__content">{{ $News_list->sub_title }}</p>
                        <div class="overview__listing">
                          <p class="overview__rating"><img src="{{ asset('Front/images/star.svg') }}">4.6</p>
                          <p class="overview__reviews"><span>(16 Reviews)</span>Excellent</p>
                        </div>
                        <hr>
                        <div class="pricing__area">
                          <h5><i class="fas fa-calendar-day"></i> {{date('d M, Y', strtotime($News_list->created_at))}}</h5>
                          <a href="{{ route('front.news.details', $News_list->id) }}" class="btn-view">View Details</a>
                        </div>
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

@endsection