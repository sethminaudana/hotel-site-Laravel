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
                           <h1 class="bd-breadcrumb__title mb-20">You & Me</h1>
                           <div class="bd-breadcrumb__list">
                              <span><a href="index.html">home</a></span>
                              <span>offers</span>
                              <span>You & Me</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- breadcrumb area end here  -->

      <!-- offer details slider area start here  -->
      <div class="bd-offer-details-area fix">
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-lg-8 col-12">
                  <div class="bd-offer-details__wrap p-relative">
                     <div class="swiper-container bd-offer-details-active mb-65">
                        <div class="swiper-wrapper">
                           <div class="swiper-slide">
                              <div class="bd-offer-details__thumb">
                                 <img src="{{asset('img/offer/sale1.jpg')}}" alt="image not found">
                              </div>
                           </div>
                           <div class="swiper-slide">
                              <div class="bd-offer-details__thumb">
                                 <img src="{{asset('img/offer/sale2.jpg')}}" alt="image not found">
                              </div>
                           </div>
                           <div class="swiper-slide">
                              <div class="bd-offer-details__thumb">
                                 <img src="{{asset('img/offer/sale3.jpg')}}" alt="image not found">
                              </div>
                           </div>
                           <div class="swiper-slide">
                              <div class="bd-offer-details__thumb">
                                 <img src="{{asset('img/offer/sale4.jpg')}}" alt="image not found">
                              </div>
                           </div>
                           <div class="swiper-slide">
                              <div class="bd-offer-details__thumb">
                                 <img src="{{asset('img/offer/sale5.jpg')}}" alt="image not found">
                              </div>
                           </div>
                           <div class="swiper-slide">
                              <div class="bd-offer-details__thumb">
                                 <img src="{{asset('img/offer/sale3.jpg')}}" alt="image not found">
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="bd-offer-navigation">
                        <button class="bd-offerdetails-prev">
                           <i class="fa-regular fa-arrow-left"></i>
                        </button>
                        <button class="bd-offerdetails-next">
                           <i class="fa-regular fa-arrow-right"></i>
                        </button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- offer details slider area end here  -->

      <!-- offer details area start here  -->
      <section class="bd-offer-details-area x-clip">
         <div class="container">
            <div class="row">
               <div class="col-lg-8">
                  <div class="bd-offer-details__wrap">
                     <div class="bd-offer-details__content mb-75">
                        <h3 class="bd-offer-details__title  mb-30">About Royel queen diluxe Beach Resort
                           room
                        </h3>
                        <p class="bdFadeUp">No time to lose, next year is almost here. And a good plan isn’t made
                           overnight.
                           How
                           far are
                           you with your targets, budget, and plan of attack for next year? What REVPAR and
                           GOPPAR
                           do
                           you need to achieve? Is your plan for next year complete, and does it describe
                           all
                           actions in
                           detail? Does everyone on the team know what the objectives are and which steps to
                           take
                           to get
                           there?</p>
                        <p class="bdFadeUp"> We begin 2023 with a jam packed January, with stay, food and beverage
                           offers
                           across
                           our
                           hotels. We also welcome the newest branch in the Lemon Tree - Lemon Tree Hotel,
                           Mukteshwar.
                        </p>
                        <div class="bd-offer-details__widget mt-65 pb-30 mb-30">
                           <h4 class="bd-offer-details__widget-title mb-20">Room Amenities</h4>
                           <div class="bd-offer-details__list">
                              <ul>
                                 <li><i class="flaticon-check-circle"></i>Work Desk</li>
                                 <li><i class="flaticon-check-circle"></i>Bathtub</li>
                                 <li><i class="flaticon-check-circle"></i>Balcony</li>
                              </ul>
                           </div>
                        </div>
                        <div class="bd-offer-details__widget pb-30 mb-30">
                           <h4 class="bd-offer-details__widget-title mb-20">Popular with Guests</h4>
                           <div class="bd-offer-details__list">
                              <ul>
                                 <li><i class="flaticon-check-circle"></i>Free Wi-Fi</li>
                                 <li><i class="flaticon-check-circle"></i>Interconnected Room</li>
                                 <li><i class="flaticon-check-circle"></i>Electric Kettle</li>
                                 <li><i class="flaticon-check-circle"></i>Iron/Ironing Board</li>
                                 <li><i class="flaticon-check-circle"></i>24-hour Room Service</li>
                                 <li><i class="flaticon-check-circle"></i>Daily Housekeeping</li>
                                 <li><i class="flaticon-check-circle"></i>Bathroom</li>
                                 <li><i class="flaticon-check-circle"></i>24-hour In-room Dining</li>
                                 <li><i class="flaticon-check-circle"></i>Laundry Service</li>
                                 <li><i class="flaticon-check-circle"></i>Air Conditioning</li>
                                 <li><i class="flaticon-check-circle"></i>Mineral Water</li>
                                 <li><i class="flaticon-check-circle"></i>Balcony</li>
                              </ul>
                           </div>
                        </div>
                        <p class="bdFadeUp">Donec sollicitudin nulla risus, eget luctus ipsum facilisis dictum.
                           Integer
                           ultricies
                           sapien
                           libero, sed congue ligula hendrerit quis. Vivamus dolor mauris, mollis nec
                           accumsan
                           sed,
                           pulvinar id nisl. Aliquam vulputate ante purus, quis sollicitudin augue euismod
                           sit
                           amet.
                           Aliquam vehicula mi sit amet suscipit tincidunt. Quisque sed lobortis metus,
                           vitae
                           efficitur
                           felis.</p>
                     </div>
                     <div class="bd-offer-details__widget border-0 mt-60 mb-40">
                        <h4 class="bd-offer-details__widget-title mb-30">House Rules</h4>
                        <div class="bd-offer-details__list-2">
                           <ul>
                              <li>-Pets are allowed with a fee.</li>
                              <li>-Check-in time from 3 PM, check-out by 1 PM.</li>
                           </ul>
                        </div>
                     </div>
                     <div class="bd-offer-details__widget pb-45 mb-45">
                        <h4 class="bd-offer-details__widget-title mb-30">Cancellation</h4>
                        <p>No time to lose, next year is almost here. And a good plan isn’t made overnight.
                           How
                           far are
                           you with your targets, budget, and plan of attack for next year? What REVPAR and
                           GOPPAR
                           do
                           you need to achieve? Is your plan for next year complete, and does it describe
                           all
                           actions in
                           detail? Does everyone on the team know what the objectives are and which steps to
                           take
                           to get
                           there.</p>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="bd-sidebar__wrap mmt-30">
                     <div class="bd-booking-3">
                        <div class="bd-booking-3__content">
                           <h3 class="bd-booking-3__title mb-35">Reserve Your Room</h3>
                           <div class="bd-booking-3__price">
                              <p>
                                 <i class="flaticon-group"></i>
                                 <span>For 2 Adults</span>
                              </p>
                              <p>
                                 <span><del>$299</del>$199</span>/ NIGHT
                              </p>
                           </div>
                           <div class="bd-booking-3__tax">
                              <p>
                                 <span><i class="fa-light fa-times"></i> Non-Refundable</span>
                                 +$49 taxes & fees
                              </p>
                           </div>
                        </div>
                        <div class="bd-booking-3__form">
                           <form action="#">
                              <div class="bd-booking-3__input-wrap">
                                 <div class="bd-booking-3__input">
                                    <label for="checkIn">CHECK-IN</label>
                                    <div class="bd-booking-3__input-inner p-relative">
                                       <i class="flaticon-calendar-2"></i>
                                       <input type="text" id="checkIn" class="bd-date-picker" placeholder="check in">
                                    </div>
                                 </div>
                                 <div class="bd-booking-3__input">
                                    <label for="checkOut">CHECK-OUT</label>
                                    <div class="bd-booking-3__input-inner p-relative">
                                       <i class="flaticon-calendar-2"></i>
                                       <input type="text" id="checkOut" class="bd-date-picker" placeholder="check out">
                                    </div>
                                 </div>
                                 <div class="bd-booking-3__input">
                                    <label for="totalGuest">GUESTS</label>
                                    <select class="bd-nice-select mb-20" id="totalGuest">
                                       <option>01</option>
                                       <option>02</option>
                                       <option>03</option>
                                       <option>04</option>
                                       <option>05</option>
                                    </select>
                                 </div>
                                 <div class="bd-booking-3__input">
                                    <label for="extraService">EXTRA SERVICE</label>
                                    <select class="bd-nice-select" id="extraService">
                                       <option>Spa & Massage</option>
                                       <option>Restaurant Service</option>
                                       <option>Swimming Coach</option>
                                       <option>Cultural Food</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="bd-booking-3__submit mt-65">
                                 <button type="submit">BOOK NOW<i class="fa-regular fa-arrow-right-long"></i></button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- offer details area end here  -->

      <!-- gallery area start here  -->
     @include('components.moments_feedback')
      <!-- testimonial area end here  -->
 @endsection
