<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="{{ asset('Front/css/slick.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('Front/css/slick-theme.css')}}"/>
    <link rel="stylesheet" href="{{ asset('Front/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Front/css/style.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link href="http://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" rel="stylesheet">

    <title>SquarFeet : Property Listing</title>
</head>
<body>

    <header class="topbar">
    <nav class="navbar-expand-lg">
        <div class="container"> 
        <div class="row align-items-center">
            <div class="col-5 col-sm-3 col-md-3">
            <a class="navbar-brand" href="{{ route('front.index') }}">
                <img src="{{ asset('Front/images/SquareFeets.png')}}" class="logo" alt="">
            </a>
            <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> -->
            </div>
            <div class="col-7 col-sm-9 col-md-9">
            <ul class="topbar__login text-right">
                
                <!-- <li class="user__dropdown dropdown">
                <a class="dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    My Account
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#"><img src="images/user-dark.svg">My Profile</a>
                    <a class="dropdown-item" href="#"><img src="images/edit.svg">Edit Profile</a>
                    <a class="dropdown-item" href="#"><img src="images/booking-dark.svg">My Booking</a>
                    <a class="dropdown-item" href="#"><img src="images/comment-dark.svg">Sesh Chat</a>
                    <a class="dropdown-item" href="#"><img src="images/logout.svg">Log Out</a>
                </div>
                </li> -->
            </ul>
            <a href="javascript:void(0);" class="toggle__btn"><i class="fas fa-bars"></i></a>
            <ul class="topbar__menu text-right d-none d-md-block">
                <li class="active">
                    <a class="" href="{{ route('front.index') }}">Home</a>
                </li>
                <!-- <li class="">
                <a class="" href="{{ route('front.about_us') }}">About Us</a>
                </li>
                <li class="">
                <a class="" href="{{ route('front.blogs') }}">Blogs</a>
                </li>
                <li class="">
                <a class="" href="{{ route('front.news') }}">News</a>
                </li> -->
                <li class="">
                    <a class="" href="{{ route('front.why_us') }}">Why Us</a>
                </li>
                <li class="">
                    <a class="" href="{{ route('front.sectors') }}">Sectors</a>
                </li>
                <li class="">
                    <a class="" href="{{ route('front.property_buying') }}">Our Services</a>

                    <ul>
                        <li><a class="" href="{{ route('front.property_buying') }}">Property Buying</a></li>
                        <li><a class="" href="{{ route('front.property_selling') }}">Property Selling</a></li>
                        <li><a class="" href="{{ route('front.property_leasing') }}">Property Leasing & Renting</a></li>
                    </ul>
                </li>
                <li class="">
                    <a class="" href="{{ route('front.property.listing') }}">BROWSE PROPERTIES</a>
                </li>
                <li class="">
                    <a class="" href="{{ route('front.contact_us') }}">Contact Us</a>
                </li>
                <?php /* ?>
                @if (!Auth::guard('web')->user())
                    <li class="">
                        <a class="topbar__item--border" href="{{ route('user.login') }}">Login / Register</a>
                    </li>
                    @endif
                    @if (Auth::guard('web')->user())
                    <li class="">
                        <a class="topbar__item--border" href="{{ route('user.login') }}">{{ Auth::guard('web')->user()->name; }}</a>
                    </li>
                    <li class="">
                        <a class="" href="{{ route('admin.logout') }}">LogOut</a>
                    </li>
                @endif
                <?php */ ?>
            </ul>
            </div>
            <div class="col-12">
            <ul id="mobile__nav" class="topbar__menu text-right d-none">
                <li class="">
                    <a class="" href="{ route('front.index') }}">Home</a>
                </li>
                <li class="">
                    <a class="" href="{{ route('front.why_us') }}">Why Us</a>
                </li>
                <li class="">
                    <a class="" href="{{ route('front.sectors') }}">Sectors</a>
                </li>
                <li class="">
                    <a class="" href="#">Our Services</a>

                    <ul>
                        <li><a class="" href="{{ route('front.sectors') }}">Property Buying</a></li>
                        <li><a class="" href="{{ route('front.sectors') }}">Property Selling</a></li>
                        <li><a class="" href="{{ route('front.sectors') }}">Property Leasing & Renting</a></li>
                    </ul>
                </li>
                <li class="">
                    <a class="" href="{{ route('front.contact_us') }}">Contact Us</a>
                </li>
                <?php /* ?>
                @if (!Auth::guard('web')->user())
                <li class="">
                <a class="topbar__item--border" href="{{ route('user.login') }}">Login / Register</a>
                </li>
                @endif
                @if (Auth::guard('web')->user())
                <li class="">
                <a class="topbar__item--border" href="{{ route('user.login') }}">{{ Auth::guard('web')->user()->name; }}</a>
                </li>
                <li class="">
                <a class="" href="{{ route('admin.logout') }}">LogOut</a>
                </li>
                @endif
                <?php */ ?>
            </ul>
            </div>
        </div>
        </div>
    </nav>

    @yield('styles')
    @stack('styles')

    </header>

    @yield('content')

    <footer class="footer__sec">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12">
                    <ul class="footer_link">
                        <li><a href="{{route('front.privacy_policy')}}">Privacy Policy</a></li>
                        <li><a href="{{route('front.terms_conditions')}}">Terms & Conditions</a></li>
                        <!--<li><a href="#">Privacy Policy</a></li>-->
                    </ul>
                </div>
                <div class="col-12 col-md-12">
                    <div class="footer__copyrights">
                        <p><a href="#"><img src="{{ asset('Front/images/facebook.svg')}}"></a>
                        <a href="#"><img src="{{ asset('Front/images/instagram.svg')}}"></a>
                        <a href="#"><img src="{{ asset('Front/images/linkedin.svg')}}"></a></p>
                        <p>© 2023 All Rights Reserved</p>
                    </div>
                </div>
            </div>
            <div class="click-to-call-widget">
                <a href="tel:+16502158551" class="call-button">
                    <i class="fas fa-phone-alt"></i>
                </a>
            </div>


            <a href="https://wa.me/<PHONE_NUMBER>?text=Hello%20I%20have%20an%20inquiry%20about%20your%20property" target="_blank" class="btn btn-success">
                <i class="fab fa-whatsapp"></i> Chat on WhatsApp
                </a>

        </div>
    </footer>
    

    @yield('script')
    @stack('script')
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="{{ asset('Front/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="{{ asset('Front/js/slick.min.js') }}"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
        $('.toggle__btn').click(function(){
            $('#mobile__nav').toggleClass('d-none');
        });
        $('.space__list').slick({
            margin: 32,
            infinite: true,
            slidesToScroll: 4,
            slidesToShow: 4,
            autoplay: false,
            lazyLoad: 'ondemand',
            arrows: true,
            adaptiveHeight: true,
            responsive: [
            {
                breakpoint: 992,
                settings: {
                arrows: true,
                centerMode: false,
                centerPadding: '10px',
                slidesToShow: 2
                }
            },
            {
                breakpoint: 768,
                settings: {
                arrows: false,
                centerMode: false,
                centerPadding: '10px',
                slidesToShow: 1
                }
            }
            ]
        });
        $('.testimonial__list').slick({
            margin: 32,
            infinite: true,
            slidesToScroll: 1,
            slidesToShow: 1,
            autoplay: true,
            arrows: true,
            adaptiveHeight: true,
            responsive: [
            {
                breakpoint: 768,
                settings: {
                arrows: false,
                centerMode: false,
                centerPadding: '40px',
                slidesToShow: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                arrows: false,
                centerMode: false,
                centerPadding: '10px',
                slidesToShow: 1
                }
            }
            ]
        });
        $(document).on('click', '.filter-option a', function(){
            $('.filter-option a').removeClass('active');
            $(this).addClass('active');

            var cat = $(this).attr('data-category');
            if(cat !== 'all'){
                $('.space__list').slick('slickUnfilter');
                $('.space__list li').each(function(){
                $(this).removeClass('slide-shown');
                });
                $('.space__list li[data-match='+ cat +']').addClass('slide-shown');
                $('.space__list').slick('slickFilter', '.slide-shown');
            }
        
            else{
                $('.space__list li').each(function(){
                $(this).removeClass('slide-shown');
                });
                $('.space__list').slick('slickUnfilter');
            }
            });
        });
    </script>
    <script type="text/javascript">
        var x, i, j, selElmnt, a, b, c;
        /*look for any elements with the class "customselect":*/
        x = document.getElementsByClassName("customselect");
        for (i = 0; i < x.length; i++) {
        selElmnt = x[i].getElementsByTagName("select")[0];
        /*for each element, create a new DIV that will act as the selected item:*/
        a = document.createElement("DIV");
        a.setAttribute("class", "select-selected");
        a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
        x[i].appendChild(a);
        /*for each element, create a new DIV that will contain the option list:*/
        b = document.createElement("DIV");
        b.setAttribute("class", "select-items select-hide");
        for (j = 1; j < selElmnt.length; j++) {
            /*for each option in the original select element,
            create a new DIV that will act as an option item:*/
            c = document.createElement("DIV");
            c.innerHTML = selElmnt.options[j].innerHTML;
            c.addEventListener("click", function(e) {
                /*when an item is clicked, update the original select box,
                and the selected item:*/
                var y, i, k, s, h;
                s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                h = this.parentNode.previousSibling;
                for (i = 0; i < s.length; i++) {
                if (s.options[i].innerHTML == this.innerHTML) {
                    s.selectedIndex = i;
                    h.innerHTML = this.innerHTML;
                    y = this.parentNode.getElementsByClassName("same-as-selected");
                    for (k = 0; k < y.length; k++) {
                    y[k].removeAttribute("class");
                    }
                    this.setAttribute("class", "same-as-selected");
                    break;
                }
                }
                h.click();
            });
            b.appendChild(c);
        }
        x[i].appendChild(b);
        a.addEventListener("click", function(e) {
            /*when the select box is clicked, close any other select boxes,
            and open/close the current select box:*/
            e.stopPropagation();
            closeAllSelect(this);
            this.nextSibling.classList.toggle("select-hide");
            this.classList.toggle("select-arrow-active");
            });
        }
        function closeAllSelect(elmnt) {
        /*a function that will close all select boxes in the document,
        except the current select box:*/
        var x, y, i, arrNo = [];
        x = document.getElementsByClassName("select-items");
        y = document.getElementsByClassName("select-selected");
        for (i = 0; i < y.length; i++) {
            if (elmnt == y[i]) {
            arrNo.push(i)
            } else {
            y[i].classList.remove("select-arrow-active");
            }
        }
        for (i = 0; i < x.length; i++) {
            if (arrNo.indexOf(i)) {
            x[i].classList.add("select-hide");
            }
        }
        }
        /*if the user clicks anywhere outside the select box,
        then close all select boxes:*/
        document.addEventListener("click", closeAllSelect);
    </script>

</body>
</html>