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
                           <h1 class="bd-breadcrumb__title mb-20">Event</h1>
                           <div class="bd-breadcrumb__list">
                              <span><a href="index.html">home</a></span>
                              <span>Event</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- breadcrumb area end here  -->

      <!-- event section start here  -->
      <section class="bd-event-area bg-grey-4 pb-90">
         <div class="container">
            <div class="row wow fadeInUp" data-wow-delay=".5s">
               <div class="col-xl-4 col-md-6">
                  <div class="bd-event-item pb-60">
                     <a href="/event-details">
                        <div class="bd-event-thumb img-hover overlay">
                           <img src="{{asset('img/event/e1.jpg')}}" alt="img not found">
                        </div>
                     </a>
                     <div class="bd-event-content static">
                        <span class="bd-event-date">25 Dec, 2022</span>
                        <h3 class="bd-event-title"><a href="/event-details">Elevate Your Senses</a></h3>
                        <p class="bd-event-desc">A cocktail party that
                           engages all senses, from the drinks to
                           the music and decor.</p>
                        <div class="bd-event-btn">
                           <a href="/event-details" class="bd-btn-2">View more<i
                                 class="fa-regular fa-arrow-right-long"></i></a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-4 col-md-6">
                  <div class="bd-event-item pb-60">
                     <a href="/event-details">
                        <div class="bd-event-thumb img-hover overlay">
                           <img src="{{asset('img/event/e2.jpg')}}" alt="img not found">
                        </div>
                     </a>
                     <div class="bd-event-content static">
                        <span class="bd-event-date">21 August, 2022</span>
                        <h3 class="bd-event-title"><a href="/event-details">Green Living Expo</a></h3>
                        <p class="bd-event-desc">A conference that
                           showcases eco-friendly practices, from
                           reducing waste.
                        </p>
                        <div class="bd-event-btn">
                           <a href="/event-details" class="bd-btn-2">View more<i
                                 class="fa-regular fa-arrow-right-long"></i></a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-4 col-md-6">
                  <div class="bd-event-item pb-60">
                     <a href="/event-details">
                        <div class="bd-event-thumb img-hover overlay">
                           <img src="{{asset('img/event/e3.jpg')}}" alt="img not found">
                        </div>
                     </a>
                     <div class="bd-event-content static">
                        <span class="bd-event-date">15 Jun, 2022</span>
                        <h3 class="bd-event-title"><a href="/event-details">Business Boost</a></h3>
                        <p class="bd-event-desc">A networking event
                           designed to provide small business
                           owners with resources.
                        </p>
                        <div class="bd-event-btn">
                           <a href="/event-details" class="bd-btn-2">View more<i
                                 class="fa-regular fa-arrow-right-long"></i></a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-4 col-md-6">
                  <div class="bd-event-item pb-60">
                     <a href="/event-details">
                        <div class="bd-event-thumb img-hover overlay">
                           <img src="{{asset('img/event/e4.jpg')}}" alt="img not found">
                        </div>
                     </a>
                     <div class="bd-event-content static">
                        <span class="bd-event-date">13 Feb, 2022</span>
                        <h3 class="bd-event-title"><a href="/event-details">Fitness Frenzy</a></h3>
                        <p class="bd-event-desc">An event that encourages
                           wellness, with fitness classes, healthy
                           food, and tips from experts.</p>
                        <div class="bd-event-btn">
                           <a href="/event-details" class="bd-btn-2">View more<i
                                 class="fa-regular fa-arrow-right-long"></i></a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-4 col-md-6">
                  <div class="bd-event-item pb-60">
                     <a href="/event-details">
                        <div class="bd-event-thumb img-hover overlay">
                           <img src="{{asset('img/event/e5.jpg')}}" alt="img not found">
                        </div>
                     </a>
                     <div class="bd-event-content static">
                        <span class="bd-event-date">07 August, 2022</span>
                        <h3 class="bd-event-title"><a href="/event-details">Sunset Soiree</a></h3>
                        <p class="bd-event-desc">A rooftop party with
                           stunning views, signature cocktails, and
                           live entertainment.</p>
                        <div class="bd-event-btn">
                           <a href="/event-details" class="bd-btn-2">View more<i
                                 class="fa-regular fa-arrow-right-long"></i></a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-4 col-md-6">
                  <div class="bd-event-item pb-60">
                     <a href="/event-details">
                        <div class="bd-event-thumb img-hover overlay">
                           <img src="{{asset('img/event/e6.jpg')}}" alt="img not found">
                        </div>
                     </a>
                     <div class="bd-event-content static">
                        <span class="bd-event-date">25 August, 2022</span>
                        <h3 class="bd-event-title"><a href="/event-details">Family Fun Day</a></h3>
                        <p class="bd-event-desc"> An all-day event for
                           families, with games, crafts, face
                           painting, and a kids’ menu.</p>
                        <div class="bd-event-btn">
                           <a href="/event-details" class="bd-btn-2">View more<i
                                 class="fa-regular fa-arrow-right-long"></i></a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- event section end here  -->

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
@endsection

