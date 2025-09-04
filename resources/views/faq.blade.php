@extends('layout.app')
@section('content')


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
                           <h1 class="bd-breadcrumb__title mb-20">Faq</h1>
                           <div class="bd-breadcrumb__list">
                              <span><a href="index.html">home</a></span>
                              <span>Faq</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- breadcrumb area end here  -->


      <!-- faq area start here -->
      <section class="bd-faq-area pt-150 pb-150 theme-bg-3">
         <div class="container">
            <div class="bd-faq bd-faq-2">
               <div class="accordion ryl-accordion-space" id="accordionExample">
                  <div class="row">
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
                        <div class="accordion-item">
                           <h2 class="accordion-header" id="headingFour">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                 data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                 What are the room amenities provided by the hotel?
                              </button>
                           </h2>
                           <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                              data-bs-parent="#accordionExample">
                              <div class="accordion-body">
                                 <p>Our rooms are equipped with air conditioning, free Wi-Fi, flat-screen TV,
                                    and a private bathroom.</p>
                              </div>
                           </div>
                        </div>
                        <div class="accordion-item">
                           <h2 class="accordion-header" id="headingFive">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                 data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                 When you book direct, you’ll get the lowest price?
                              </button>
                           </h2>
                           <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                              data-bs-parent="#accordionExample">
                              <div class="accordion-body">
                                 <p>Whether you are at home or away, world-class Four Seasons property
                                    management
                                    protects, secures and maintains your residence for you.</p>
                              </div>
                           </div>
                        </div>
                        <div class="accordion-item">
                           <h2 class="accordion-header" id="headingSix">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                 data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                 Do you offer laundry and ironing services for guests?
                              </button>
                           </h2>
                           <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                              data-bs-parent="#accordionExample">
                              <div class="accordion-body">
                                 <p>Yes, we offer laundry and ironing services for an additional fee. Please
                                    contact us for further details.</p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="accordion-item">
                           <h2 class="accordion-header" id="headingEight">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                 data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                 Can I prebook your royel hotel?
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
                        <div class="accordion-item">
                           <h2 class="accordion-header" id="headingEleven">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                 data-bs-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                                 Is there Wi-Fi access throughout the hotel?
                              </button>
                           </h2>
                           <div id="collapseEleven" class="accordion-collapse collapse" aria-labelledby="headingEleven"
                              data-bs-parent="#accordionExample">
                              <div class="accordion-body">
                                 <p>Yes, we provide free Wi-Fi access throughout the hotel and in all guest
                                    rooms.</p>
                              </div>
                           </div>
                        </div>
                        <div class="accordion-item">
                           <h2 class="accordion-header" id="headingTwelve">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                 data-bs-target="#collapseTwelve" aria-expanded="false" aria-controls="collapseTwelve">
                                 Get a free night starting at just 7,500 points.
                              </button>
                           </h2>
                           <div id="collapseTwelve" class="accordion-collapse collapse" aria-labelledby="headingTwelve"
                              data-bs-parent="#accordionExample">
                              <div class="accordion-body">
                                 <p>Whether you are at home or away, world-class Four Seasons property
                                    management
                                    protects, secures and maintains your residence for you.</p>
                              </div>
                           </div>
                        </div>
                        <div class="accordion-item">
                           <h2 class="accordion-header" id="headingTharteen">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                 data-bs-target="#collapseTharteen" aria-expanded="false"
                                 aria-controls="collapseTharteen">
                                 Is there any kids zone in royel hotel?
                              </button>
                           </h2>
                           <div id="collapseTharteen" class="accordion-collapse collapse"
                              aria-labelledby="headingTharteen" data-bs-parent="#accordionExample">
                              <div class="accordion-body">
                                 <p>yes, we have a very great condition kids zone in out hotel with 24 hours
                                    monitoring service</p>
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

      <!-- testimonial area start here  -->
      <section class="bd-testimonial-area-2 p-relative pt-150 pb-150">
         <div class="bd-testimonial-2__bg" data-background="{{asset('img/bg/testimonial-bg.jpg')}}"></div>
         <div class="container">
            <div class="bd-testimonial-2__section-title mb-35">
               <div class="row align-items-center">
                  <div class="col-lg-9">
                     <div class="bd-section__title-wrapper is-white ">
                        <p class="bd-section__subtitle mb-20">testimonials</p>
                        <h2 class=" bd-section__title mb-40 mmb-10">What our customers
                           <br>are saying
                        </h2>
                     </div>
                  </div>
                  <div class="col-lg-3">
                     <div class="bd-testimonial__btn mb-60">
                        <a href="contact.html" class="bd-btn-2 is-white">View all review <i
                              class="fa-regular fa-arrow-right-long"></i></a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-12">
               <div class="bd-testimonial-2__slider p-relative">
                  <div class="bd-testimonial-2-active">
                     <div class="bd-testimonial-2">
                        <div class="row justify-content-between align-items-center">
                           <div class="col-xl-6 col-lg-7">
                              <div class="bd-testimonial-2__content">
                                 <div class="bd-testimonial-2__quote mb-30">
                                    <img src="{{asset('img/icon/quote.svg')}}" alt="image not found">
                                 </div>
                                 <p>Sweeply gives a real-time overview of the hotels, making it easy to organize
                                    the work
                                    and
                                    track progress. Information about what to do is clear</p>
                                 <hr>
                                 <div
                                    class="bd-testimonial-2__author d-flex justify-content-between align-items-sm-center">
                                    <div
                                       class="bd-testimonial-2__thumb-wrap d-flex align-items-sm-center flex-column gap-3">
                                       <div class="bd-testimonial-2__thumb-2 d-lg-none">
                                          <img src="{{asset('img/testimonials/user-1.jpg')}}" alt="image not found">
                                       </div>
                                       <div class="bd-testimonial-2__title-wrap">
                                          <h3 class="bd-testimonial-2__title">elden smith</h3>
                                          <span class="bd-testimonial-2__des">Operations manager</span>
                                       </div>
                                    </div>
                                    <div class="bd-testimonial-2__rating d-flex">
                                       <i class="fa-solid fa-star"></i>
                                       <i class="fa-solid fa-star"></i>
                                       <i class="fa-solid fa-star"></i>
                                       <i class="fa-solid fa-star"></i>
                                       <i class="fa-solid fa-star"></i>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-xl-4 col-lg-4">
                              <div class="bd-testimonial-2__thumb d-none d-lg-block">
                                 <img src="{{asset('img/testimonials/user-1.jpg')}}" alt="image not found">
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="bd-testimonial-2">
                        <div class="row justify-content-between align-items-center">
                           <div class="col-xl-6 col-lg-7">
                              <div class="bd-testimonial-2__content">
                                 <div class="bd-testimonial-2__quote mb-30">
                                    <img src="{{asset('img/icon/quote.svg')}}" alt="image not found">
                                 </div>
                                 <p>The impeccable service and hospitality of your staff made our retreat most
                                    enjoyable. We were very impressed by the responsiveness.</p>
                                 <hr>
                                 <div
                                    class="bd-testimonial-2__author d-flex justify-content-between align-items-sm-center">
                                    <div
                                       class="bd-testimonial-2__thumb-wrap d-flex align-items-sm-center flex-column gap-3">
                                       <div class="bd-testimonial-2__thumb-2 d-lg-none">
                                          <img src="{{asset('img/testimonials/user-3.jpg')}}" alt="image not found">
                                       </div>
                                       <div class="bd-testimonial-2__title-wrap">
                                          <h3 class="bd-testimonial-2__title">Christopher smith</h3>
                                          <span class="bd-testimonial-2__des">Web Programmer</span>
                                       </div>
                                    </div>
                                    <div class="bd-testimonial-2__rating d-flex">
                                       <i class="fa-solid fa-star"></i>
                                       <i class="fa-solid fa-star"></i>
                                       <i class="fa-solid fa-star"></i>
                                       <i class="fa-solid fa-star"></i>
                                       <i class="fa-solid fa-star"></i>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-xl-4 col-lg-4">
                              <div class="bd-testimonial-2__thumb d-none d-lg-block">
                                 <img src="{{asset('img/testimonials/user-3.jpg')}}" alt="image not found">
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="bd-testimonial-2">
                        <div class="row justify-content-between align-items-center">
                           <div class="col-xl-6 col-lg-7">
                              <div class="bd-testimonial-2__content">
                                 <div class="bd-testimonial-2__quote mb-30">
                                    <img src="{{asset('img/icon/quote.svg')}}" alt="image not found">
                                 </div>
                                 <p>Friendly staff, nice design, good food. Staff are friendly, the foods are
                                    yummy. Comfortable bed I love it and sure will go again for sure, great
                                    place. </p>
                                 <hr>
                                 <div
                                    class="bd-testimonial-2__author d-flex justify-content-between align-items-sm-center">
                                    <div
                                       class="bd-testimonial-2__thumb-wrap d-flex align-items-sm-center flex-column gap-3">
                                       <div class="bd-testimonial-2__thumb-2 d-lg-none">
                                          <img src="{{asset('img/testimonials/user-4.jpg')}}" alt="image not found">
                                       </div>
                                       <div class="bd-testimonial-2__title-wrap">
                                          <h3 class="bd-testimonial-2__title">Benjamin arn N.</h3>
                                          <span class="bd-testimonial-2__des">Ceo & Founder</span>
                                       </div>
                                    </div>
                                    <div class="bd-testimonial-2__rating d-flex">
                                       <i class="fa-solid fa-star"></i>
                                       <i class="fa-solid fa-star"></i>
                                       <i class="fa-solid fa-star"></i>
                                       <i class="fa-solid fa-star"></i>
                                       <i class="fa-solid fa-star"></i>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-xl-4 col-lg-4">
                              <div class="bd-testimonial-2__thumb d-none d-lg-block">
                                 <img src="{{asset('img/testimonials/user-4.jpg')}}" alt="image not found">
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- testimonial area end here  -->

      <!-- service area start here  -->
      <section class="bd-service-area fix pt-135 pb-150">
         <div class="container">
            <div class="row align-items-end">
               <div class="col-xl-8 col-lg-8">
                  <div class="bd-section__title-wrapper ">
                     <p class="bd-section__subtitle mb-20">special features & facilities</p>
                     <h2 class="bd-section__title mb-55  mb-30 mmb-20">Explore Special Services
                        And Facilities List
                     </h2>
                  </div>
               </div>
               <div class="col-xl-4 col-lg-4">
                  <div class="bd-service__pagination-wrap d-flex justify-content-lg-end mb-25">
                     <div class="bd-service-pagination bd-swiper-pagination"></div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-12">
                  <div class="swiper bd-service-active">
                     <div class="swiper-wrapper">
                        <div class="swiper-slide">
                           <div class="bd-service">
                              <div class="bd-service__bg" data-background="{{asset('img/service/1.jpg')}}"></div>
                              <div class="bd-service__content">
                                 <h4 class="bd-service__title"><a href="service-details.html">Airline
                                       reservation</a></h4>
                                 <span class="bd-service__price">$259</span>
                              </div>
                           </div>
                        </div>
                        <div class="swiper-slide">
                           <div class="bd-service active">
                              <div class="bd-service__bg" data-background="{{asset('img/service/2.jpg')}}"></div>
                              <div class="bd-service__content">
                                 <h4 class="bd-service__title"><a href="service-details.html">spa & Massages</a>
                                 </h4>
                                 <span class="bd-service__price">$399</span>
                              </div>
                           </div>
                        </div>
                        <div class="swiper-slide">
                           <div class="bd-service">
                              <div class="bd-service__bg" data-background="{{asset('img/service/4.jpg')}}"></div>
                              <div class="bd-service__content">
                                 <h4 class="bd-service__title"><a href="service-details.html">ironing &
                                       laundry</a></h4>
                                 <span class="bd-service__price">$159</span>
                              </div>
                           </div>
                        </div>
                        <div class="swiper-slide">
                           <div class="bd-service">
                              <div class="bd-service__bg" data-background="{{asset('img/service/5.jpg')}}"></div>
                              <div class="bd-service__content">
                                 <h4 class="bd-service__title"><a href="service-details.html">room service</a>
                                 </h4>
                                 <span class="bd-service__price">$266</span>
                              </div>
                           </div>
                        </div>
                        <div class="swiper-slide">
                           <div class="bd-service">
                              <div class="bd-service__bg" data-background="{{asset('img/service/6.jpg')}}"></div>
                              <div class="bd-service__content">
                                 <h4 class="bd-service__title"><a href="service-details.html">car service</a></h4>
                                 <span class="bd-service__price">$266</span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- service area end here  -->

@endsection

