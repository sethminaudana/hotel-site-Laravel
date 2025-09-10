@extends('layout.app')

@section('content')

        <!-- hero area start here  -->
        <section class="bd-hero-area p-relative fix">
            <div class="swiper-container bd-hero-active">
                <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="bd-hero-wrap-2 p-relative">
                        <div class="container">
                            <div class="row">
                            <div class="col-12">
                                <div class="bd-hero">
                                    <!-- hero area bg  -->
                                    <div class="bd-hero__bg bd-hero__bg-3" data-background="{{asset('img/lux1.jpg')}}">
                                    </div>
                                    <div class="bd-hero__content bd-hero__content-3 is-white">
                                        <div class="bd-hero__subtitle animate__animated" data-animation="fadeInUp"
                                        data-delay=".3s">
                                        <span>
                                            @auth
                                                @if(Auth::user()->role && Auth::user()->role->role_name === 'admin')
                                                    <span>Welcome </span>
                                                @else
                                                    <span>Welcome </span>
                                                @endif
                                            @else
                                                <span>Welcome </span>
                                            @endauth
                                        </span>
                                        </div>
                                        <div class="bd-hero__title-wrap p-relative">
                                        <h1 class="bd-hero__title mb-70 animate__animated" data-animation="fadeInUp"
                                            data-delay=".5s">Welcome to Nisala Hotel: <br> A Haven of Luxury and Serenity
                                        </h1>
                                        </div>
                                        <div class="bd-hero__btn d-inline-flex animate__animated" data-animation="fadeInUp"
                                        data-delay=".7s">
                                        <a href="{{url('/room')}}" class="bd-btn">
                                            Check Availability<span><i class="fa-regular fa-arrow-right-long"></i></span>
                                        </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="bd-hero__slider-number d-none d-lg-inline-flex p-absolute">
                                    <span class="current">1</span>
                                    <span class="divider">/</span>
                                    <span class="total">3</span>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="bd-hero-wrap-2 p-relative">
                        <div class="container">
                            <div class="row">
                            <div class="col-12">
                                <div class="bd-hero">
                                    <!-- hero area bg  -->
                                    <div class="bd-hero__bg bd-hero__bg-3" data-background="{{asset('img/lux2.jpg')}}">
                                    </div>
                                    <div class="bd-hero__content bd-hero__content-3 is-white">
                                        <div class="bd-hero__subtitle animate__animated" data-animation="fadeInUp"
                                        data-delay=".3s">
                                        <span>
                                            @auth
                                                @if(Auth::user()->role && Auth::user()->role->role_name === 'admin')
                                                    <span>Welcome </span>
                                                @else
                                                    <span>Welcome </span>
                                                @endif
                                            @else
                                                <span>Welcome </span>
                                            @endauth
                                        </span>
                                        </div>
                                        <div class="bd-hero__title-wrap p-relative">
                                        <h1 class="bd-hero__title mb-70 animate__animated" data-animation="fadeInUp"
                                            data-delay=".5s">Luxury Redefined: <br> Welcome to Nisala Hotel
                                        </h1>
                                        </div>
                                        <div class="bd-hero__btn d-inline-flex animate__animated" data-animation="fadeInUp"
                                        data-delay=".7s">
                                        <a href="{{url('room')}}" class="bd-btn">
                                            Check Availability<span><i class="fa-regular fa-arrow-right-long"></i></span>
                                        </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="bd-hero__slider-number d-none d-lg-inline-flex p-absolute">
                                    <span class="current">2</span>
                                    <span class="divider">/</span>
                                    <span class="total">3</span>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="bd-hero-wrap-2 p-relative">
                        <div class="container">
                            <div class="row">
                            <div class="col-12">
                                <div class="bd-hero">
                                    <!-- hero area bg  -->
                                    <div class="bd-hero__bg bd-hero__bg-3" data-background="{{asset('img/lux3.jpg')}}">
                                    </div>
                                    <div class="bd-hero__content bd-hero__content-3 is-white">
                                        <div class="bd-hero__subtitle animate__animated" data-animation="fadeInUp"
                                        data-delay=".3s">
                                            <span>
                                                @auth
                                                    @if(Auth::user()->role && Auth::user()->role->role_name === 'admin')
                                                        <span>Welcome </span>
                                                    @else
                                                        <span>Welcome </span>
                                                    @endif
                                                @else
                                                    <span>Welcome </span>
                                                @endauth
                                            </span>
                                        </div>
                                        <div class="bd-hero__title-wrap p-relative">
                                        <h1 class="bd-hero__title mb-70 animate__animated" data-animation="fadeInUp"
                                            data-delay=".5s">Experience the Ultimate in <br> Luxury at Nisala Hotel
                                        </h1>
                                        </div>
                                        <div class="bd-hero__btn d-inline-flex animate__animated" data-animation="fadeInUp"
                                        data-delay=".7s">
                                        <a href="{{url('/room')}}" class="bd-btn">
                                            Check Availability<span><i class="fa-regular fa-arrow-right-long"></i></span>
                                        </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="bd-hero__slider-number d-none d-lg-inline-flex p-absolute">
                                    <span class="current">3</span>
                                    <span class="divider">/</span>
                                    <span class="total">3</span>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                <div class="col-12">
                    <div class="bd-hero__slider-nav p-relative d-none d-sm-block">
                        <div class="bd-hero-pagination bd-swiper-pagination"></div>
                    </div>
                </div>
                </div>
            </div>
        </section>
        <!-- hero area end here  -->

        <!-- feature area start here  -->
        <div class="bd-feature theme-bg-2 pt-145 p-relative pb-90 mpt-80">
            <div class="container">
                <div class="bd-feature__list pt-0">
                <div class="row wow fadeInUp" data-wow-delay=".5s">
                    <div class="col-12">
                        <div class="bd-feature__list-content">
                            <div class="bd-feature__list-item ryl-up-down-anim mb-40">
                            <i class="flaticon-taxi"></i>
                            <p>Pick Up & Drop</p>
                            </div>
                            <div class="bd-feature__list-item ryl-up-down-anim mb-40">
                            <i class="flaticon-garage"></i>
                            <p>Parking Space</p>
                            </div>
                            <div class="bd-feature__list-item ryl-up-down-anim mb-40">
                            <i class="flaticon-breakfast"></i>
                            <p>Breakfast</p>
                            </div>
                            <div class="bd-feature__list-item ryl-up-down-anim mb-40">
                            <i class="flaticon-swimming-pool"></i>
                            <p>Swimming Pool</p>
                            </div>
                            <div class="bd-feature__list-item ryl-up-down-anim mb-40">
                            <i class="flaticon-wifi-router"></i>
                            <p>Fibre Internet</p>
                            </div>
                            <div class="bd-feature__list-item ryl-up-down-anim mb-40">
                            <i class="flaticon-bar-counter"></i>
                            <p>bar & bbq</p>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <!-- feature area end here  -->

        <!-- welcome area start here  -->
        <section class="bd-welcome-area theme-bg-2 fix p-relative pb-150">
            <div class="container">
                <div class="row">
                <div class="col-lg-6">
                    <div class="bd-welcome bg-white pt-140 wow fadeInUp" data-wow-delay=".5s">
                        <div class="bd-welcome__content mb-65 mmb-35">
                            <div class="bd-welcome__subtitle  mb-35">
                            <p class="hero__text_animation">{{--<span>5 STAR</span>--}} HOTEL IN Kurunegala, Sri Lanka</p>
                            </div>
                            <div class="bd-section__title-wrapper ">
                            <h2 class="bd-section__title mb-30">
                                welcome to the
                                <br>Nisala Hotel
                            </h2>
                            </div>
                            <p>The Nisala Hotel offers unforgettable food and drink options.
                            Enjoy dinner at the award-winning</p>
                        </div>
                         @php
                        $settings = \App\Models\AboutusImg::first();
                        @endphp
                     <div class="bd-welcome__thumb transform-none">
                        <img src="{{asset('welcome.jpg')}}" alt="image not found">
                     </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="bd-welcome__bg" data-background="{{asset('welcome2.jpg')}}">
                        <div class="bd-welcome__right p-relative">
                            <div class="bd-welcome__video-btn-2 wow fadeInUp" data-wow-delay=".5s">
                            <a href="https://www.youtube.com/watch?v=H_zTepNXDDg" class="popup-video">
                                <i class="fa-sharp fa-solid fa-play"></i>
                            </a>
                            </div>
                            <div class="bd-welcome__meta-wrap wow fadeInUp" data-wow-delay=".5s">
                            <div class="bd-welcome__meta">
                                <span>+94</span>
                                <p><a href="{{url('/room')}}">Big suites</a></p>
                            </div>
                            <div class="bd-welcome__meta-2">
                                <div class="bd-welcome__meta-content">
                                    <span>Reservation</span>
                                    <a href="tel:xxxx ">+94 xxxxxxxxxx </a>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </section>
        <!-- welcome area end here  -->

        <!-- room area end here  -->
        <section class="bd-room-area p-relative pt-150 pb-120 mt-5">
            <div class="bd-room__bg" data-background="{{asset('img/roombg.jpg')}}"></div>
            <div class="container">
                <div class="row align-items-end wow fadeInUp" data-wow-delay=".5s">
                    <div class="col-xl-12 col-lg-12">
                        <div class="bd-section__title-wrapper text-center is-white">
                            <p class="bd-section__subtitle mb-20">Rooms</p>
                            <h2 class=" bd-section__title mb-55 mmb-30">Our Rooms & Suites
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="row wow fadeInUp" data-wow-delay=".5s">


                    @include('components.room_cards', ['rooms' => $rooms])

                </div>
                {{-- See More Button --}}
                <div class="text-center mt-4">
                    <a href="{{ route('rooms.all') }}" class="bd-btn fill-btn">See More Rooms<span><i class="fa-regular fa-arrow-right-long"></i></span>
                                </a>
                </div>
            </div>
        </section>
        <!-- room area end here  -->

        <!-- amenities area start  -->
        <section class="amenities-area pt-150 pb-150">
            <div class="container">
                <div class="row justify-content-center wow fadeInUp" data-wow-delay=".5s"
                style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                <div class="col-lg-8">
                    <div class="bd-section__title-wrapper text-center">
                        <p class="bd-section__subtitle mb-20">book now</p>
                        <h2 class=" bd-section__title mb-75 mbs-30">Welcome To Nisala Hotel
                            <br> Book Your Stay Today.
                        </h2>
                    </div>
                </div>
                </div>
            </div>
            <div class="">
                <div class="swiper-container bd-amenities-slider wow fadeInUp" data-wow-delay=".5s">
                <div class="swiper-wrapper amenities-slider-wrapper">
                    <div class="swiper-slide">
                        <div class="amenities__box">
                            <div class="amenities__img">
                            <img src="{{asset('img/pool1.jpg')}}" alt="image not found">
                            </div>
                            <div class="amenities__desc">
                            <h4 class="amenities__title">Swimming Pool</h4>
                            <p class="amenities__meta-desc">These pools help hotels and resorts provide outstanding
                                entertainment experiences, which translates into customer satisfaction,loyalty to the
                                hotel
                                and emphasize the resort brand image...</p>
                            <div class="amenities__btn mt-35">
                                <a href="{{url('/contact')}}" class="bd-btn-2">get the service<i
                                        class="fa-regular fa-arrow-right-long"></i></a>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="amenities__box">
                            <div class="amenities__img">
                            <img src="{{asset('img/gym.jpg')}}" alt="image not found">
                            </div>
                            <div class="amenities__desc">
                            <h4 class="amenities__title">Fitness Center</h4>
                            <p class="amenities__meta-desc">These pools help hotels and resorts provide outstanding
                                entertainment experiences, which translates into customer satisfaction,loyalty to the
                                hotel
                                and emphasize the resort brand image...</p>
                            <div class="amenities__btn mt-35">
                                <a href="/contact" class="bd-btn-2">get the service<i
                                        class="fa-regular fa-arrow-right-long"></i></a>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="amenities__box">
                            <div class="amenities__img">
                            <img src="{{asset('img/sauna.jpg')}}"
                                    alt="image not found">
                            </div>
                            <div class="amenities__desc">
                            <h4 class="amenities__title">Sauna</h4>
                            <p class="amenities__meta-desc">These pools help hotels and resorts provide outstanding
                                entertainment experiences, which translates into customer satisfaction,loyalty to the
                                hotel
                                and emphasize the resort brand image...</p>
                            <div class="amenities__btn mt-35">
                                <a href="/contact" class="bd-btn-2">get the service<i
                                        class="fa-regular fa-arrow-right-long"></i></a>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="amenities__box">
                            <div class="amenities__img">
                            <img src="{{asset('img/steam.jpg')}}"
                                    alt="image not found">
                            </div>
                            <div class="amenities__desc">
                            <h4 class="amenities__title">Steam Room</h4>
                            <p class="amenities__meta-desc">These pools help hotels and resorts provide outstanding
                                entertainment experiences, which translates into customer satisfaction,loyalty to the
                                hotel
                                and emphasize the resort brand image...</p>
                            <div class="amenities__btn mt-35">
                                <a href="/contact" class="bd-btn-2">get the service<i
                                        class="fa-regular fa-arrow-right-long"></i></a>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="amenities__box">
                            <div class="amenities__img">
                            <img src="{{asset('img/golf.jpg')}}"
                                    alt="image not found">
                            </div>
                            <div class="amenities__desc">
                            <h4 class="amenities__title">Golf Course</h4>
                            <p class="amenities__meta-desc">These pools help hotels and resorts provide outstanding
                                entertainment experiences, which translates into customer satisfaction,loyalty to the
                                hotel
                                and emphasize the resort brand image...</p>
                            <div class="amenities__btn mt-35">
                                <a href="/contact" class="bd-btn-2">get the service<i
                                        class="fa-regular fa-arrow-right-long"></i></a>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="amenities__box">
                            <div class="amenities__img">
                            <img src="{{asset('img/tennis.jpg')}}"
                                    alt="image not found">
                            </div>
                            <div class="amenities__desc">
                            <h4 class="amenities__title">Tennis Court</h4>
                            <p class="amenities__meta-desc">These pools help hotels and resorts provide outstanding
                                entertainment experiences, which translates into customer satisfaction,loyalty to the
                                hotel
                                and emphasize the resort brand image...</p>
                            <div class="amenities__btn mt-35">
                                <a href="/contact" class="bd-btn-2">get the service<i
                                        class="fa-regular fa-arrow-right-long"></i></a>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>

                </div>
                <div class="bd-amenities-slider-nav mt-50 wow fadeInUp" data-wow-delay=".5s">
                <div class="bd-amenities-slider-prev square-nav"><i class="fa-light fa-angle-left"></i></div>
                <div class="bd-amenities-slider-next square-nav"><i class="fa-light fa-angle-right"></i></div>
                </div>
            </div>
        </section>
        <!-- amenities area end  -->


        <!-- foodmenu area start here  -->
        @include('components.foodmenu')
        <!-- foodmenu area end here  -->

        <!-- gallery area start  -->
        <section class="gallery-area pt-150 pb-130">
            <div class="container">
                <div class="row align-items-end wow fadeInUp" data-wow-delay=".5s">
                <div class="col-xl-12 col-lg-12">
                    <div class="bd-section__title-wrapper text-center">
                        <p class="bd-section__subtitle mb-20">Gallery</p>
                        <h2 class=" bd-section__title mb-55 mmb-30">Our Gallery
                        </h2>
                    </div>
                </div>
                </div>
                <div class="row wow fadeInUp" data-wow-delay=".5s">
                <div class="col-xl-12">
                    <div class="gallery__img-wrapper">
                        <div class="gallery__img">
                            <a href="{{asset('img/gallery/gal1.jpg')}}" class="popup-image"><img
                                src="{{asset('img/gallery/gal1.jpg')}}" alt="gallery-img"></a>
                        </div>
                        <div class="gallery__img">
                            <a href="{{asset('img/gallery/gal2.jpg')}}" class="popup-image"><img
                                src="{{asset('img/gallery/gal2.jpg')}}" alt="gallery-img"></a>
                        </div>
                        <div class="gallery__img">
                            <a href="{{asset('img/gallery/gal4.jpg')}}" class="popup-image"><img
                                src="{{asset('img/gallery/gal4.jpg')}}" alt="gallery-img"></a>
                        </div>
                        <div class="gallery__img">
                            <a href="{{asset('img/gallery/gal5.jpg')}}" class="popup-image"><img
                                src="{{asset('img/gallery/gal5.jpg')}}" alt="gallery-img"></a>
                        </div>
                        <div class="gallery__img">
                            <a href="{{asset('img/gallery/gal6.jpg')}}" class="popup-image"><img
                                src="{{asset('img/gallery/gal6.jpg')}}" alt="gallery-img"></a>
                        </div>
                        <div class="gallery__img">
                            <a href="{{asset('img/gallery/gal9.jpg')}}" class="popup-image"><img
                                src="{{asset('img/gallery/gal9.jpg')}}" alt="gallery-img"></a>
                        </div>
                        <div class="gallery__img">
                            <a href="{{asset('img/gallery/gal10.jpg')}}" class="popup-image"><img
                                src="{{asset('img/gallery/gal10.jpg')}}" alt="gallery-img"></a>
                        </div>
                        <div class="gallery__img">
                            <a href="{{asset('img/gallery/gal3.jpg')}}" class="popup-image"><img
                                src="{{asset('img/gallery/gal3.jpg')}}" alt="gallery-img"></a>
                        </div>
                        <div class="gallery__img">
                            <a href="{{asset('img/gallery/gal7.jpg')}}" class="popup-image"><img
                                src="{{asset('img/gallery/gal7.jpg')}}" alt="gallery-img"></a>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </section>
        <!-- gallery area end  -->

        <!-- offer area start here -->

                          @livewire('offers-slider')

                            {{-- <div class="swiper-slide">
                            <div class="bd-offer">
                                <div class="bd-offer__thumb p-relative">
                                    <img src="{{asset('img/offer/sale2.jpg')}}" alt="image not found">
                                    <div class="bd-offer__meta">
                                        <span>25% off</span>
                                    </div>
                                    <div class="bd-offer__content-visble">
                                        <h4 class="bd-offer__title-2"><a href="/offer-details">wellness
                                            recharge</a></h4>
                                    </div>
                                    <div class="bd-offer__content">
                                        <h4 class="bd-offer__title"><a href="/offer-details">wellness recharge</a>
                                        </h4>
                                        <p>The Nisala Hotel offers unforgettable food and drink options. A memorable
                                        stay with
                                        delicious
                                        </p>
                                        <div class="bd-offer__btn">
                                        <a href="booking-form.html">Book Now<i class="fa-regular fa-angle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="swiper-slide">
                            <div class="bd-offer">
                                <div class="bd-offer__thumb p-relative">
                                    <img src="{{asset('img/offer/sale3.jpg')}}" alt="offer">
                                    <div class="bd-offer__meta">
                                        <span>25% off</span>
                                    </div>
                                    <div class="bd-offer__content-visble">
                                        <h4 class="bd-offer__title-2"><a href="/offer-details">you & me</a></h4>
                                    </div>
                                    <div class="bd-offer__content">
                                        <h4 class="bd-offer__title"><a href="/offer-details">you & me</a></h4>
                                        <p>The Nisala Hotel offers unforgettable food and drink options. A memorable
                                        stay with
                                        delicious
                                        </p>
                                        <div class="bd-offer__btn">
                                        <a href="booking-form.html">Book Now<i class="fa-regular fa-angle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="swiper-slide">
                            <div class="bd-offer">
                                <div class="bd-offer__thumb p-relative">
                                    <img src="{{asset('img/offer/sale4.jpg')}}" alt="image not found">
                                    <div class="bd-offer__meta">
                                        <span>20% off</span>
                                    </div>
                                    <div class="bd-offer__content-visble">
                                        <h4 class="bd-offer__title-2"><a href="/offer-details">seaside getway</a>
                                        </h4>
                                    </div>
                                    <div class="bd-offer__content">
                                        <h4 class="bd-offer__title"><a href="/offer-details">seaside getway</a>
                                        </h4>
                                        <p>The Nisala Hotel offers unforgettable food and drink options. A memorable
                                        stay with
                                        delicious
                                        </p>
                                        <div class="bd-offer__btn">
                                        <a href="booking-form.html">Book Now<i class="fa-regular fa-angle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="swiper-slide">
                            <div class="bd-offer">
                                <div class="bd-offer__thumb p-relative">
                                    <img src="{{asset('img/offer/sale5.jpg')}}" alt="image not found">
                                    <div class="bd-offer__meta">
                                        <span>25% off</span>
                                    </div>
                                    <div class="bd-offer__content-visble">
                                        <h4 class="bd-offer__title-2"><a href="/offer-details">wellness
                                            recharge</a></h4>
                                    </div>
                                    <div class="bd-offer__content">
                                        <h4 class="bd-offer__title"><a href="/offer-details">wellness recharge</a>
                                        </h4>
                                        <p>The Nisala Hotel offers unforgettable food and drink options. A memorable
                                        stay with
                                        delicious
                                        </p>
                                        <div class="bd-offer__btn">
                                        <a href="{{url('/contact')}}">Book Now<i class="fa-regular fa-angle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div> --}}

    <script>
    $(document).ready(function () {
        $('.popup-video').magnificPopup({
            type: 'iframe',
            iframe: {
                patterns: {
                    youtube: {
                        index: 'youtube.com/',

                        id: function (url) {
                            var videoID = '';
                            var match = url.match(/[?&]v=([^?&]+)/);
                            if (match && match[1]) {
                                videoID = match[1];
                            }
                            return videoID;
                        },

                        src: 'https://www.youtube.com/embed/%id%?autoplay=1&rel=0'
                    }
                }
            }
        });
    });
</script>

        @endsection
        <!-- offer area end here -->



