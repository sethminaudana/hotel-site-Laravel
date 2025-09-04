
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>NISALA HOTEL | LeoSpree</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"> --}}
    {{-- styles --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- Optional Theme (e.g. dark) -->
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/dark.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/swiper-bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nouislider.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backtotop.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flaticon_royel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome-pro.css') }}">
    <link rel="stylesheet" href="{{ asset('css/spacing.css') }}">
    <link rel="stylesheet" href="{{ asset('css/odometer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/login.css') }}"> --}}

    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('css/cus_css.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('css/admin.css')}}"> --}}
     <!-- Flatpickr CSS -->
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css"> --}}


    @livewireStyles
</head>




<body>
    <div class="mouseCursor cursor-outer"></div>
    <div class="mouseCursor cursor-inner"><span>Drag</span></div>

    <!-- pre loader area start -->
    <div id="loading">
        <div id="preloader">
            <div class="preloader-thumb-wrap">
                <div class="preloader-thumb">
                <div class="preloader-border"></div>
                <img src="{{ asset('img/logo/Nisala Hotel Gold Logo@4x.png') }}" alt="img not found!">
                </div>
            </div>
        </div>
    </div>
    <!-- pre loader area end -->


   <!-- back to top start -->
   <div class="progress-wrap">
      <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
         <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
      </svg>
   </div>
   <!-- back to top end -->

    <!-- header area start -->
    <header>
        {{-- @auth
            @if(Auth::user()->role && Auth::user()->role->role_name === 'admin')
                <p>Welcome ADMIN</p>
            @else
                <p>Welcome user!</p>
            @endif
        @else
            <p>Welcome Guest! Please log in..</p>
        @endauth --}}

        <div class="bd-header transparent-header">

            <!-- header bottom area start -->
            <div id="header-sticky" class="bd-header-3 is-transparent">
                <div class="container">
                <div class="mega-menu-wrapper p-relative">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="bd-header__bottom-left">
                            <div class="bd-header__logo">
                            <a href="/">@if(Route::currentRouteName() === 'home')
                                            <img src="{{ asset('img/logo/Nisala Hotel Gold Logo@4x.png') }}" alt="Home Logo">
                                        @else
                                            <img src="{{ asset('img/logo/Nisala Hotel Black Logo@4x.png') }}" alt="Site Logo">
                                        @endif
                                {{-- <img src="{{asset('img/logo/Nisala Hotel Black Logo@4x.png')}}" alt="image not found"> --}}
                            </a>
                            </div>
                        </div>
                        <div class="bd-main-menu d-none d-lg-flex align-items-center is-white">
                            <nav id="mobile-menu">

                            <ul>

                                <li>
                                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{url('/')}}">Home</a>
                                </li>

                                <li>
                                    <a class="nav-link {{ Request::is('room') ? 'active' : '' }}" href="{{url('/room')}}">rooms & suites</a>
                                </li>
                                {{-- <li class="has-dropdown has-mega-menu">
                                    <a href="#">Pages</a>
                                    <ul class="mega-menu">
                                        <li><a href="javasript:void(0);" class="mega-menu-title">Page Layout 1</a>
                                        <ul>
                                            <li> <a href="offers.html">Offer</a></li>
                                            <li><a href="offer-details.html">Offer Details</a></li>
                                            <li><a href="booking-form.html">Bookinig Form</a></li>
                                            <li><a href="error-404.html">error page</a></li>
                                            <li><a href="gallery.html">Gallery</a></li>
                                            <li><a href="dining.html">DINING</a></li>
                                        </ul>
                                        </li>
                                        <li><a href="javasript:void(0);" class="mega-menu-title">Page Layout 2</a>
                                        <ul>
                                            <li><a href="event.html">Event</a></li>
                                            <li><a href="event-details.html">Event details</a></li>
                                            <li><a href="faq.html">FAQ</a></li>
                                            <li><a href="service.html">Service</a></li>
                                            <li><a href="service-details.html">Service Details</a></li>
                                        </ul>
                                        </li>
                                        <li><a href="javasript:void(0);" class="mega-menu-title">Page Layout 3</a>
                                        <ul>
                                            <li><a href="pricing.html">Pricing Plan</a></li>
                                            <li><a href="blog.html">Blog Main</a></li>
                                            <li><a href="blog-sidebar.html">Blog Sidebar</a></li>
                                            <li><a href="blog-classic.html">Blog Classic</a></li>
                                            <li><a href="blog-details.html">Blog Details</a></li>
                                        </ul>
                                        </li>
                                    </ul>
                                </li> --}}
                                <li>
                                    <a class="nav-link {{ Request::is('dining') ? 'active' : '' }}" href="{{url('/dining')}}">Dining</a>
                                </li>
                                <li>
                                    <a class="nav-link {{ Request::is('blog') ? 'active' : '' }}" href="{{url('/blog')}}">Blog</a>
                                </li>
                                 <li>
                                    <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="{{ url('/about') }}">About Us</a>
                                </li>
                                <li>
                                    <a class="nav-link {{ Request::is('contact') ? 'active' : '' }}" href="{{url('/contact')}}">contact us</a>
                                </li>

                            </ul>
                            </nav>
                        </div>
                        {{-- <div>
                            @if (Route::has('login'))
                                <nav class="flex items-center justify-end gap-4">
                                    @auth
                                        <a
                                            href="{{ url('/dashboard') }}"
                                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                                        >
                                            Dashboard
                                        </a>
                                    @else
                                        <a
                                            href="{{ route('login') }}"
                                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
                                        >
                                            Log in
                                        </a>

                                        @if (Route::has('register'))
                                            <a
                                                href="{{ route('register') }}"
                                                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                                                Register
                                            </a>
                                        @endif
                                    @endauth
                                </nav>
                            @endif
                        </div> --}}
                        <div class="bd-header__bottom-right d-flex justify-content-end align-items-center">
                            <div class="bd-header-top-btn mr-30 d-none d-md-flex">
                                <a href="{{url('/room')}}" class="bd-btn fill-btn">
                                    book now <span><i class="fa-regular fa-arrow-right-long"></i></span>
                                </a>
                            </div>
                        </div>
                        {{-- <div class="bd-header__bottom-right d-flex justify-content-end align-items-center">
                            <div class="bd-header-top-btn mr-30 d-none d-md-flex">
                                <div >
                                    @auth
                                        @php
                                            $userInitial = strtoupper(Auth::user()->name[0]);
                                        @endphp --}}

                                        {{-- user circle dropdown --}}
                                        {{-- <div class="drop">
                                            <button class="rounded-full" type="button" data-bs-toggle="dropdown" aria-expanded="true">
                                                {{$userInitial}}
                                            </button>

                                            <ul class="dropdown-menu dropdown-menu-end mt-2">
                                                <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                                                <li>
                                                    <form method="POST" action="{{ route('logout') }}">
                                                        @csrf
                                                        <button class="dropdown-item" type="submit">Logout</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div> --}}
                                        {{-- <a
                                            href="{{ url('/dashboard') }}"
                                            class="bd-btn register-btn"
                                        >
                                        Dashboard
                                        <span><i class="fa-regular fa-arrow-right-long"></i></span>
                                        </a> --}}
                                    {{-- @else --}}
                                        <!-- Show Login Button if not logged in -->
                                        {{-- <a href="{{ route('login') }}" class="bd-btn register-btn">
                                            Log In
                                            <span><i class="fa-regular fa-arrow-right-long"></i></span>
                                        </a> --}}
                                        {{-- <a
                                            href="{{ route('login') }}"
                                            class="bd-btn register-btn"
                                        >
                                        Log In
                                        <span><i class="fa-regular fa-arrow-right-long"></i></span>
                                        </a> --}}
                                    {{-- @endauth
                                </div>
                            </div>
                        </div> --}}

                        <div class="bd-header-hamburger offcanvas-open-btn d-xl-none">
                            <span></span>
                            <span></span>
                            <span></span>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <!-- header bottom area end -->
        </div>
    </header>
    <!-- header area end here -->

    <div>
        @yield('content')
    </div>


    <!-- footer area start -->
    <footer class="bd-footer footer-bg">
        <div class="bd-footer-top pt-100 pb-30">
            <div class="container">
                <div class="row justify-content-between">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="bd-footer-widget-wrapper mb-60">
                        <div class="bd-footer-widget-title">
                            <h5>Useful Links</h5>
                        </div>
                        <div class="bd-footer-link">
                            <ul>
                            <li><a href="/room">Accommodation</a></li>
                            <li><a href="/about">About Hotel</a></li>
                            <li><a href="/dining">Dining</a></li>
                            <li><a href="/contact">Location</a></li>
                            <li><a href="/about">Experience</a></li>
                            {{-- <li><a href="#">Jobs &amp; Career</a></li> --}}
                            <li><a href="/event">Occasions</a></li>
                            <li><a href="/contact">Get In Touch</a></li>
                            <li><a href="/about#faqarea">FAQ</a></li>
                            <li><a href="/event">Events</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="bd-footer-widget-wrapper bd-footer-contact-wrapper mb-60">
                        <div class="bd-footer-widget-title">
                            <h5>Get in Touch</h5>
                        </div>
                        <div class="bd-footer-contact">
                            <ul>
                            <li><i class="fas fa-paper-plane"></i> Reception:<a href="tel:94 xxxx"> +94 xxxxx
                                    </a></li>
                            <li><i class="fas fa-phone"></i>Office: <a href="tel:94 xxxxx"> +94 xxxxxx</a></li>
                            <li><i class="fas fa-envelope"></i> E-mail: <a href="mailto:info@xxxxx.lk">
                                    info@xxxxxx.lk</a></li>
                            <li><i class="fas fa-map-marker-alt"></i> Address: Colombo</li>
                            </ul>
                        </div>
                        <div class="bd-footer-btn">
                            <a href="{{url('/room')}}" class="bd-btn fill-btn">
                            Reserve Now <span><i class="fa-regular fa-arrow-right-long"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-12">
                    <div class="bd-footer-widget-wrapper mb-60">
                        <div class="bd-footer-widget-title">
                            <h5>Subscribe Newsletter</h5>
                        </div>
                        <div class="bd-footer-newsletter__form">
                            {{-- <form action="{{ route('subscribe') }}" method="POST">
                                @csrf
                            <div class="bd-footer-newsletter__input is-black">

                                <input type="email" name="email" placeholder="Your Email" required>
                                <button type="submit">subscribe now <i
                                        class="fa-regular fa-arrow-right-long"></i></button>
                                        @if ($errors->has('email'))
                                            <div class="alert alert-danger mt-2">
                                                {{ $errors->first('email') }}
                                            </div>
                                        @endif
                                        @if(session('success'))
                                            <div class="alert alert-success mt-2">
                                                {{ session('success') }}
                                            </div>
                                        @endif

                            </div>
                            </form> --}}
                            @livewire('subscribe-form')
                        </div>
                        <div class="payment-methods mt-30">
                            <strong>We accept</strong>
                            <div class="payment-methods-icons">
                            <span><i class="fa-brands fa-cc-paypal"></i></span>
                            <span><i class="fa-brands fa-cc-mastercard"></i></span>
                            <span><i class="fa-brands fa-cc-visa"></i></span>
                            <span><i class="fa-brands fa-cc-amex"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="bd-footer-bottom d-flex align-items-center">
            <div class="container">
                <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="bd-footer-copyright">
                        <p>Copyright &amp; Design By <span>© <a
                                href="">LeoSpree</a></span> - 2025</p>
                    </div>
                </div>
                <div class="col-md-6 text-md-end">
                    <div class="bd-footer__list">
                        <div class="bd-footer__social-wrapper justify-content-center justify-content-md-end">
                            <div class="bd-footer__social is-black">
                            <a href="https://www.facebook.com/senirakasun?mibextid=wwXIfr&mibextid=wwXIfr" target="_blank"><i
                                    class="fa-brands fa-facebook-f"></i></a>
                            </div>
                            {{-- <div class="bd-footer__social is-black">
                            <a href="https://twitter.com/" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                            </div> --}}
                            <div class="bd-footer__social is-black">
                            <a href="https://youtube.com/" target="_blank"><i class="fa-brands fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer area end -->

    <!-- offcanvas area start -->
    <div class="offcanvas__area">
        <div class="offcanvas__wrapper">
            <div class="offcanvas__content">
                <div class="offcanvas__top mb-40 d-flex justify-content-between align-items-center">
                <div class="offcanvas__logo logo">
                    <a href="{{url('/')}}">
                        <img src="{{ asset('img/logo/Nisala Hotel Black Logo@4x.png') }}" alt="logo">
                    </a>
                </div>
                <div class="offcanvas__close">
                    <button class="offcanvas__close-btn">
                        <i class="fa-thin fa-times"></i>
                    </button>
                </div>
                </div>
                {{-- <div class="offcanvas__search mb-0">
                <form action="#">
                    <button type="submit"><i class="fa-regular fa-magnifying-glass"></i></button>
                    <input type="text" placeholder="Search here">
                </form>
                </div> --}}

                                <a href="{{url('/room')}}" class="bd-btn fill-btn">
                                    book now <span><i class="fa-regular fa-arrow-right-long"></i></span>
                                </a>
                                <br>
                                {{-- @auth
                                        @php
                                            $userInitial = strtoupper(Auth::user()->name[0]);
                                        @endphp --}}

                                        {{-- user circle dropdown --}}
                                        {{-- <div class="drop">
                                            <button class="rounded-full" type="button" data-bs-toggle="dropdown" aria-expanded="true">
                                                {{$userInitial}}
                                            </button>

                                            <ul class="dropdown-menu dropdown-menu-end mt-2">
                                                <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                                                <li>
                                                    <form method="POST" action="{{ route('logout') }}">
                                                        @csrf
                                                        <button class="dropdown-item" type="submit">Logout</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div> --}}
                                        {{-- <a
                                            href="{{ url('/dashboard') }}"
                                            class="bd-btn register-btn"
                                        >
                                        Dashboard
                                        <span><i class="fa-regular fa-arrow-right-long"></i></span>
                                        </a> --}}
                                    {{-- @else --}}
                                        <!-- Show Login Button if not logged in -->
                                        {{-- <a href="{{ route('login') }}" class="bd-btn register-btn">
                                            Log In
                                            <span><i class="fa-regular fa-arrow-right-long"></i></span>
                                        </a> --}}
                                        {{-- <a
                                            href="{{ route('login') }}"
                                            class="bd-btn register-btn"
                                        >
                                        Log In
                                        <span><i class="fa-regular fa-arrow-right-long"></i></span>
                                        </a> --}}
                                    {{-- @endauth --}}

                <div class="mobile-menu fix mt-40"></div>
                <div class="offcanvas__about d-none d-lg-block mt-30 mb-30">
                <h4>About Nisala Hotel</h4>
                <p>Experience legendary service in the heart of Nisala Hotel. The new generation of luxury. A Haven of Comfort
                    and Elegance</p>
                </div>
                <div class="offcanvas__contact mt-30 mb-30">
                <h4>Contact Info</h4>
                <ul>
                    <li class="d-flex align-items-center gap-2">
                        <div class="offcanvas__contact-icon">
                            <a target="_blank"
                            href="contact">
                            <i class="fal fa-map-marker-alt"></i></a>
                        </div>
                        <div class="offcanvas__contact-text">
                            <a target="_blank"
                            href="contact">
                             Colombo</a>
                        </div>
                    </li>
                    <li class="d-flex align-items-center gap-2">
                        <div class="offcanvas__contact-icon">
                            <a href="tel:94 xxxxx"><i class="far fa-phone"></i></a>
                        </div>
                        <div class="offcanvas__contact-text">
                            <a href="tel:94 xxxxxx">+94 xxxxxx </a>
                        </div>
                    </li>
                    <li class="d-flex align-items-center gap-2">
                        <div class="offcanvas__contact-icon">
                            <a href="mailto:info@xxxxx.lk"><i class="fal fa-envelope"></i></a>
                        </div>
                        <div class="offcanvas__contact-text">
                            <a href="mailto:info@xxxxxx.lk">info@nisalahotel.lk</a>
                        </div>
                    </li>
                </ul>
                </div>
                <div class="offcanvas__social">
                <ul>
                    <li><a target="_blank" href="https://www.facebook.com/senirakasun?mibextid=wwXIfr&mibextid=wwXIfr"><i class="fa-brands fa-facebook-f"></i></a>
                    </li>
                    {{-- <li><a target="_blank" href="https://twitter.com/"><i class="fa-brands fa-twitter"></i></a></li> --}}
                    <li><a target="_blank" href="https://www.youtube.com/"><i class="fa-brands fa-youtube"></i></a>
                    </li>
                </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="body-overlay"></div>
    <!-- offcanvas area end -->

    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script> --}}

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/meanmenu.js') }}"></script>
    <script src="{{ asset('js/bootstrap-bundle.js') }}"></script>

    <script src="{{ asset('js/swiper-bundle.js') }}"></script>
    <script src="{{ asset('js/slick.js') }}"></script>
    <script src="{{ asset('js/magnific-popup.js') }}"></script>
    <script src="{{ asset('js/backtotop.js') }}"></script>
    <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('js/nice-select.js') }}"></script>
    <script src="{{ asset('js/sidebar.js') }}"></script>
    <script src="{{ asset('js/isotope-pkgd.js') }}"></script>
    <script src="{{ asset('js/imagesloaded-pkgd.js') }}"></script>
    {{-- <script src="{{ asset('js/imagesloaded.pkdg.js') }}"></script> --}}
    <script src="{{ asset('js/ajax-form.js') }}"></script>


    {{-- firebase sdk --}}
    <!-- Firebase SDK -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- <script src="{{asset('js/firebase.js')}}"></script> --}}
    {{-- end of the firebase sdk imports --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('js/settings.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/jquery.appear.js') }}"></script>
    <script src="{{ asset('js/waypoints.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    {{-- <script src="{{ asset('js/login.js') }}"></script> --}}
    <script src="{{ asset('js/sample.js') }}"></script>
    {{-- <script src="{{ asset('js/flatpicker.js') }}"></script> --}}
        @stack('scripts')
  <script>
    let page = "{{ Request::path() }}";  // e.g. "about", "rooms", "dining"

    if (page !== "/") { // Laravel "/" returns empty string here
        const style = document.createElement('style');
        style.innerHTML = `
            .is-white #mobile-menu ul li a {
                color: black;
            }

            #header-sticky {
                background-color: #EEC78C;
                height: 130px;
            }

            .bd-btn.fill-btn {
                background-color: white;
            }

            .bd-btn.fill-btn:hover {
                background-color: black;
                color: white;
            }

            .rounded-full{
                background-color: black;
                color: #fff;
                font-weight: bold;
                font-size:x-large;
                width: 100%;
                padding: 14px 20px 14px 20px;
                border-radius: 50%;
            }

            .rounded-full:hover{
                background-color: #fff;
                color: #000;
            }

            .header-sticky .rounded-full{
                background-color:;
            }

            .bd-btn.register-btn{
                background-color:black;
                color:#fff;
            }
            .bd-btn.register-btn:hover{
                background-color:#fff;
                color:#000;
            }
        `;
        document.head.appendChild(style);
    }
</script>
    @livewireScripts
    {{-- <script>
        console.log(typeof jQuery); // should log "function"

        $(window).on('scroll', function () {

            var scroll = $(window).scrollTop();
            if (scroll < 100) {
                $("#header-sticky").removeClass("header-sticky");
            } else {
                $("#header-sticky").addClass("header-sticky");
            }
        });




        $(document).ready(function() {
            $('[data-background]').each(function () {
                var background = $(this).data('background');
                $(this).css('background-image', 'url(' + background + ')');
            });
        });


         if (window.innerWidth < 992) {
            $(window).on('scroll', function () {
                var scroll = $(window).scrollTop();
                if (scroll < 100) {
                    $("#header-top_sticky").removeClass("header-sticky");
                } else {
                    $("#header-top_sticky").addClass("header-sticky");
                }
            });
        }



        $(document).ready(function() {
            $('[data-background]').each(function () {
                var background = $(this).data('background');
                $(this).css('background-image', 'url(' + background + ')');
            });
        });
        console.log(typeof jQuery); // should log "function"


    </script> --}}
    @stack('scripts')

</body>
</html>
