@extends('layout.app')
@section('content')


      <!-- breadcrumb area start here  -->
      <section class="bd-breadcrumb-area p-relative">
         <div class="bd-breadcrumb__wrapper">
            <div class="container">
               <div class="row justify-content-center wow">
                  <div class="col-xl-10">
                     <div class="bd-breadcrumb d-flex align-items-center justify-content-center">
                        <div class="bd-breadcrumb__thumb">
                           <img src="{{ asset('img/breadcrumb/breadcrumb-bg.png') }}" alt="breadcrumb img">
                        </div>
                        <div class="bd-breadcrumb__content text-center">
                           <h1 class="bd-breadcrumb__title mb-20">About Us</h1>
                           <div class="bd-breadcrumb__list">
                              <span><a href="{{asset('/')}}">home</a></span>
                              <span>About Us</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- breadcrumb area end here  -->

      <!-- welcome area start here  -->
      <section class="bd-welcome-area theme-bg-2 fix p-relative">
         <div class="container">
            <div class="row">
               <div class="col-lg-6">
                  <div class="bd-welcome bg-white pt-140 wow fadeInUp" data-wow-delay=".5s">
                     <div class="bd-welcome__content mb-65 mmb-50">
                        <div class="bd-welcome__subtitle mb-35">
                           <p class="hero__text_animation">{{--<span>5 STAR</span>--}} HOTEL IN Colombo, Sri Lanka</p>
                        </div>
                        <div class="bd-section__title-wrapper">
                           <h2 class="bd-section__title mb-30">
                              welcome to the
                              <br>Nisala hotel
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
                        <div class="bd-welcome__video-btn-2 dark-btn wow fadeInUp" data-wow-delay=".5s">
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
                              <div class="bd-welcome__meta-icon">
                                 <i class="flaticon-phone-call"></i>
                              </div>
                              <div class="bd-welcome__meta-content">
                                 <span>Reservation</span>
                                 <a href="{{url('tel:xxxx')}}">+94 xxxxxx</a>
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

      <!-- award area start here -->
      <section class="bd-award-area pt-150 pb-150 p-relative">
         <div class="container">
            <div class="row align-items-center wow fadeInUp" data-wow-delay=".5s">
               <div class="col-md-8">
                  <div class="bd-section__title-wrapper">
                     <p class="bd-section__subtitle mb-20">the Nisala Hotel awards</p>
                     <h2 class="bd-section__title mb-60  mmb-30">The Nisala Hotel Recognition</h2>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="bd-award-pagination bd-swiper-pagination justify-content-md-end"></div>
               </div>
            </div>
            <div class="row wow fadeInUp" data-wow-delay=".5s">
               <div class="col-12">
                  <div class="swiper-container bd-award-active mmt-20">
                     <div class="swiper-wrapper">
                        <div class="swiper-slide">
                           <div class="bd-award">
                              <div class="bd-award__thumb mb-40">
                                 <img src="{{asset('img/award/1.png')}}" alt="image not found">
                              </div>
                              <div class="bd-award__content bd-award__content-2">
                                 <p>Editor’s Choice for Best Hotel Brand for Service</p>
                                 <span>2020</span>
                              </div>
                           </div>
                        </div>
                        <div class="swiper-slide">
                           <div class="bd-award">
                              <div class="bd-award__thumb mb-40">
                                 <img src="{{asset('img/award/2.png')}}" alt="image not found">
                              </div>
                              <div class="bd-award__content bd-award__content-2">
                                 <p>Best Hotel Brand in the World (Ranked 1st)</p>
                                 <span>2021</span>
                              </div>

                           </div>
                        </div>
                        <div class="swiper-slide">
                           <div class="bd-award">
                              <div class="bd-award__thumb mb-40">
                                 <img src="{{asset('img/award/3.png')}}" alt="image not found">
                              </div>
                              <div class="bd-award__content bd-award__content-2">
                                 <p>Best City Hotel in the Asia
                                    (Ranked 1st)</p>
                                 <span>2022</span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- award area end here -->

      <!-- pricing plan area start here -->
      @include('components.pricing_plan')
      <!-- pricing plan area end here -->


      <!-- hr-line start here  -->
      <div class="hr-line">
         <div class="container">
            <div class="row wow fadeInUp" data-wow-delay=".5s">
               <div class="col-12">
                  <hr>
               </div>
            </div>
         </div>
      </div>
      <!-- hr-line end here  -->

      <!-- service area start here  -->
      @include('components.services')
      <!-- service area end here  -->

      <!-- faq area start here -->
      <section class="bd-faq-area pt-150 pb-150 p-relative" id="faqarea">
         <div class="bd-faq__bg" data-background="{{asset('img/questions.jpg')}}"></div>
         <div class="container">
            <div class="row wow fadeInUp" data-wow-delay=".5s">
               <div class="col-12">
                  <div class="bd-section__title-wrapper text-center">
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


