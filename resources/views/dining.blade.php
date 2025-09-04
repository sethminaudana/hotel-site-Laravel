@extends('layout.app')
@section('content')
<style>

</style>
        <!-- breadcrumb area start here  -->
        <section class="bd-breadcrumb-area p-relative">
            <div class="bd-breadcrumb__wrapper">
                <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="bd-breadcrumb d-flex align-items-center justify-content-center">
                            <div class="bd-breadcrumb__thumb">
                            <img src="{{asset('img/breadcrumb/breadcrumb-bg.png')}}" alt="breadcrumb img">
                            </div>
                            <div class="bd-breadcrumb__content text-center">
                            <h1 class="bd-breadcrumb__title mb-20">Dining / Restaurant</h1>
                            <div class="bd-breadcrumb__list">
                                <span><a href="{{url('/')}}">home</a></span>
                                <span>Dining</span>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb area end here  -->

        <!-- opening time area start here -->
        <section class="bd-restaurant-opening-area p-relative">
            <div class="bd-restaurant-opening__bg" data-background="{{'img/restaurant.jpg'}}"></div>
            <div class="container">
                <div class="row">
                <div class="col-lg-6">
                    <div class="bd-restaurant-opening__content pt-150 pb-150 wow fadeInUp" data-wow-delay=".5s">
                        <div class="bd-restaurant-opening__video-btn mb-40">
                            <a href="{{url('https://www.youtube.com/watch?v=RK4sRkIYHb4&pp=ygUMaG90ZWwgcmV2aWV3')}}" class="popup-video"><i
                                class="fa-sharp fa-solid fa-play"></i></a>
                        </div>
                        <div class="bd-section__title-wrapper is-white">
                            <p class="bd-section__subtitle mb-20">find desire foods</p>
                            <h2 class="bd-section__title mb-40">Fine Dining in Nisala Hotel
                            </h2>
                        </div>
                        <div class="bd-restaurant-opening__btn">
                            <a href="{{url('/room')}}" class="bd-btn">book our hotel now<span><i
                                    class="fa-regular fa-arrow-right-long"></i></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="bd-restaurant-opening theme-bg-2 pt-120 pb-120 wow fadeInUp" data-wow-delay=".5s">
                        <div class="bd-restaurant-opening__content-2">
                            <h3 class="bd-restaurant-opening__title mb-30">opening Hours - Always Open</h3>
                            <div class="bd-restaurant-opening__list">
                            <ul>
                                <li>
                                    <span><i class="flaticon-check-circle"></i>Breakfast</span>
                                    <span><i class="flaticon-check-circle"></i>7am - 11am</span>
                                </li>
                                <li>
                                    <span><i class="flaticon-check-circle"></i>All day dining</span>
                                    <span><i class="flaticon-check-circle"></i>12am - 12pm</span>
                                </li>
                                <li>
                                    <span><i class="flaticon-check-circle"></i>Afternoon tea</span>
                                    <span><i class="flaticon-check-circle"></i>2:30pm - 4:30pm</span>
                                </li>
                            </ul>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </section>
        <!-- opening time area  end here -->



        <!-- facility slider area start here  -->
        <section class="bd-facility-slider-area pt-150 pb-75 p-relative fix">
            <div class="bd-facility-side__shape-wrap">
                <div class="bd-facility-side__shape-1">
                <img src="{{asset('img/nature.jpg')}}" alt="image not found">
                </div>
                <div class="bd-facility-side__shape-2">
                <img src="{{asset('img/nature.jpg')}}" alt="image not found">
                </div>
            </div>
            <div class="bd-facility-slider__wrap p-relative">
                <div class="container">
                <div class="row wow fadeInUp" data-wow-delay=".5s">
                    <div class="col-12">
                        <div class="bd-facility-slider__nav-wrap p-relative">
                            <div class="bd-facility-slider__nav">
                            <div class="bd-facility-slider__paginaton"></div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="bd-facility-active swiper-container wow fadeInUp" data-wow-delay=".5s">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="container">
                            <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="bd-facility-slider__thumb-wrap mb-60">
                                    <div class="bd-facility-slider__thumb">
                                        <img src="{{asset('img/facility2.jpg')}}" alt="image not found">
                                    </div>
                                    <div class="bd-facility-slider__thumb-2 text-end">
                                        <img src="{{asset('img/facility1.jpg')}}" alt="image not found">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="bd-facility-2__content mb-160 mt-20">
                                    <div class="bd-section__title-wrapper">
                                        <span class="bd-section__subtitle mb-20">RESTAURANTS</span>
                                        <h2 class="bd-section__title bd-facility-title mb-30"><a
                                            href="{{url('/service-details')}}">Nisala Hotel
                                            Awesome food
                                            for Every Single Guest</a></h2>
                                    </div>
                                    <p><span>The three floors of the hotel contain 227 stylish and luxurious rooms
                                        made for an
                                        indulgent
                                        holiday, including 12 sumptuous suites with a sea view.</span></p>
                                    <p>The Nisala Hotel offers unforgettable food and drink options. A memorable stay
                                        with
                                        delicious
                                        breakfast Join us in celebrating the new year with a little special surprise
                                        from our
                                        end.
                                        Enjoy dinner at the award-winning</p>
                                    <div class="bd-facility-2__list mb-65">
                                        <ul>
                                        <li><i class="flaticon-check-circle"></i><span>Chinese Food</span></li>
                                        <li><i class="flaticon-check-circle"></i><span>Italian Food</span></li>
                                        <li><i class="flaticon-check-circle"></i><span>Japanese Food</span></li>
                                        <li><i class="flaticon-check-circle"></i><span>Indian Food</span></li>
                                        </ul>
                                    </div>
                                    <div class="bd-facility-slider__btn">
                                        <a href="{{url('/dining#diningSection')}}" class="bd-btn-2">View food menu<i
                                            class="fa-regular fa-arrow-right-long"></i></a>
                                        <div class="bd-facility-slider__btn-shape d-none d-lg-block">
                                        <img src="{{asset('img/shape/facility-btn.svg')}}" alt="image not found">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="container">
                            <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="bd-facility-slider__thumb-wrap mb-60">
                                    <div class="bd-facility-slider__thumb">
                                        <img src="{{asset('img/facility2.jpg')}}" alt="image not found">
                                    </div>
                                    <div class="bd-facility-slider__thumb-2 text-end">
                                        <img src="{{asset('img/nature.jpg')}}" alt="image not found">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="bd-facility-2__content">
                                    <div class="bd-section__title-wrapper">
                                        <span class="bd-section__subtitle mb-20">modern fitness center</span>
                                        <h2 class="bd-section__title bd-facility-title mb-30"><a
                                            href="{{url('/service-details')}}">royel-fitness club for
                                            health freak guest</a></h2>
                                    </div>
                                    <p><span>Spa center inilla duiman at elit finibus viverra nec a lacus themo the
                                        drudea
                                        seneoice misuscipit non sagie the fermen. </span></p>
                                    <p>The Nisala Hotel offers unforgettable food and drink options. A memorable stay
                                        with
                                        delicious breakfast Join us in celebrating the new year with a little special
                                        surprise
                                        from our end.
                                        Enjoy dinner at the award-winning</p>
                                    <div class="bd-facility-2__list mb-65">
                                        <ul>
                                        <li><i class="flaticon-check-circle"></i><span>smart gym centre</span></li>
                                        <li><i class="flaticon-check-circle"></i><span>women gym</span></li>
                                        <li><i class="flaticon-check-circle"></i><span>expert triner</span></li>
                                        <li><i class="flaticon-check-circle"></i><span>24/7</span></li>
                                        </ul>
                                    </div>
                                    <div class="bd-facility-slider__btn">
                                        <a href="{{url('/service-details')}}" class="bd-btn-2">View more<i
                                            class="fa-regular fa-arrow-right-long"></i></a>
                                        <div class="bd-facility-slider__btn-shape d-none d-lg-block">
                                        <img src="{{asset('img/shape/facility-btn.svg')}}" alt="image not found">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="container">
                            <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="bd-facility-slider__thumb-wrap mb-60">
                                    <div class="bd-facility-slider__thumb">
                                        <img src="{{asset('img/facility1.jpg')}}" alt="image not found">
                                    </div>
                                    <div class="bd-facility-slider__thumb-2 text-end">
                                        <img src="{{asset('img/nature.jpg')}}" alt="image not found">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="bd-facility-2__content">
                                    <div class="bd-section__title-wrapper">
                                        <span class="bd-section__subtitle mb-20">club & pool</span>
                                        <h2 class="bd-section__title bd-facility-title mb-30"><a
                                            href="{{url('/service-details')}}">The Health Club &
                                            Pool for smart guest</a></h2>
                                    </div>
                                    <p><span>Spa center inilla duiman at elit finibus viverra nec a lacus themo the
                                        drudea
                                        seneoice misuscipit non sagie the fermen. </span></p>
                                    <p>The Nisala Hotel offers unforgettable food and drink options. A memorable stay
                                        with
                                        delicious breakfast Join us in celebrating the new year with a little special
                                        surprise
                                        from our end.
                                        Enjoy dinner at the award-winning</p>
                                    <div class="bd-facility-2__list mb-65">
                                        <ul>
                                        <li><i class="flaticon-check-circle"></i><span>swimming pool</span></li>
                                        <li><i class="flaticon-check-circle"></i><span>Entertaiment</span></li>
                                        <li><i class="flaticon-check-circle"></i><span>party Club</span></li>
                                        <li><i class="flaticon-check-circle"></i><span>Health Checkup</span></li>
                                        </ul>
                                    </div>
                                    <div class="bd-facility-slider__btn">
                                        <a href="{{url('/service-details')}}" class="bd-btn-2">read more<i
                                            class="fa-regular fa-arrow-right-long"></i></a>
                                        <div class="bd-facility-slider__btn-shape d-none d-lg-block">
                                        <img src="{{asset('img/shape/facility-btn.svg')}}" alt="image not found">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </section>
        <!-- facility slider area end here  -->

        <!-- foodmenu area start here  -->
        @include('components.foodmenu')
        <!-- foodmenu area end here  -->

        <!-- testimonial area start here  -->
        {{-- <section class="bd-testimonial-area pt-135 pb-145">
            <div class="container">
                <div class="row justify-content-center wow fadeInUp" data-wow-delay=".5s">
                <div class="col-md-10">
                    <div class="swiper-container bd-testimonial-active">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                            <div class="bd-testimonial text-center">
                                <div class="bd-testimonial__content">
                                    <div class="bd-testimonial__quote">
                                        <i class="flaticon-quote"></i>
                                    </div>
                                    <p>This is one of the best decisions we have ever made.
                                        We bought a house but gained a family
                                        who supports.</p>
                                    <div class="bd-testimonial__quote-2">
                                        <i class="flaticon-quote"></i>
                                    </div>
                                    <div class="bd-testimonial__client">
                                        <h5 class="bd-testimonial__client-name">elden smith</h5>
                                        <span>(Residence Owner)</span>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="swiper-slide">
                            <div class="bd-testimonial text-center">
                                <div class="bd-testimonial__content">
                                    <div class="bd-testimonial__quote">
                                        <i class="flaticon-quote"></i>
                                    </div>
                                    <p>The best hotel I’ve ever been privileged enough to stay at. Gorgeous building,
                                        and it only gets more breath taking.</p>
                                    <div class="bd-testimonial__quote-2">
                                        <i class="flaticon-quote"></i>
                                    </div>
                                    <div class="bd-testimonial__client">
                                        <h5 class="bd-testimonial__client-name">Jhon Wick</h5>
                                        <span>(Product Designer)</span>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </section> --}}
        <!-- testimonial area end here  -->

        <!-- faq area start here -->
        <section class="bd-faq-area pt-150 pb-150 p-relative">
            <div class="bd-faq__bg" data-background="{{asset('img/faq.jpg')}}"></div>
            <div class="container">
                <div class="row wow fadeInUp" data-wow-delay=".5s">
                <div class="col-12">
                    <div class="bd-section__title-wrapper text-center ">
                        <p class="bd-section__subtitle mb-20">common question answer</p>
                        <h2 class="bd-section__title mb-25">frequently ask questions</h2>
                    </div>
                </div>
                </div>
                <div class="bd-faq bd-faq-2">
                <div class="accordion ryl-accordion-space" id="accordionExample">
                    <div class="row wow fadeInUp" data-wow-delay=".5s">
                        <div class="col-lg-6">
                            <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    What is your check-in and check-out time?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>Our check-in time is 3:00 PM and check-out time is 12:00 PM. Visis us you
                                        will never forget</p>
                                </div>
                            </div>
                            </div>
                            <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Do you offer free parking on your premises?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>yes, We provide free parking to our guests. We have an expert team to
                                        manage your car</p>
                                </div>
                            </div>
                            </div>
                            <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Do you provide airport shuttle service?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>Yes, we offer airport shuttle service for an additional fee. Please contact
                                        us for further details.</p>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="accordion-item">
                            <h2 class="accordion-header" id="headingEight">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                    Can I prebook your Nisala Hotel?
                                </button>
                            </h2>
                            <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>Whether you are at home or away, world-class Four Seasons property
                                        management
                                        protects, secures and maintains your residence for you.</p>
                                </div>
                            </div>
                            </div>
                            <div class="accordion-item">
                            <h2 class="accordion-header" id="headingNine">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                    Is there a fitness center or gym in the hotel?
                                </button>
                            </h2>
                            <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>Yes, we have a fitness center open to our guests.</p>
                                </div>
                            </div>
                            </div>
                            <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTen">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                    What are the nearby attractions and landmarks?
                                </button>
                            </h2>
                            <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>We are located near several attractions and landmarks such as the city
                                        center, museums, and parks.</p>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </section>
        <!-- faq area end here -->

        <!-- brand area start here  -->
        @include('components.brands')
        <!-- brand area end here  -->
@endsection


