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
                           <h1 class="bd-breadcrumb__title mb-20">Event Details</h1>
                           <div class="bd-breadcrumb__list">
                              <span><a href="{{url('/')}}">home</a></span>
                              <span>Event Details</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- breadcrumb area end here  -->

      <!-- event details area start here  -->
      <section class="gl-event-details-area x-clip pb-90">
         <div class="container">
            <div class="row">
               <div class="col-xl-8 col-lg-7">
                  <div class="bd-event-details-wrapper mb-45">
                     <div class="bd-event-details-thumb img-hover mb-50 revealed">
                        <img src="{{asset('img/event/event.jpg')}}" alt="event img">
                     </div>
                     <div class="bd-event-details-content mb-50">
                        <h3 class="bd-event-details-title  mb-30">This Royel Wedding Was Described
                           As “Summer Camp For Adults”</h3>
                        <p class="bd-event-details-desc mb-50">Having your very own wedding hashtag
                           is a fun and creative way to celebrate your upcoming union. Not only does your clever
                           hashtag look great when displayed throughout your venue, but these wedding hashtags
                           also have various practical uses in the digital space. Getting your guests to use your
                           wedding hashtag when they post their favorite memories from the evening will, in turn,
                           keep all these fun photos and videos organized on social media for you to look back on
                           and enjoy for years to come.</p>
                        <div class="bd-event-details-imagbox">
                           <div class="bd-event-thumb img-hover mb-30">
                              <img src="{{asset('img/event/e12.jpg')}}" alt="image not found">
                           </div>
                           <div class="bd-event-thumb img-hover mb-30">
                              <img src="{{asset('img/event/e11.jpg')}}" alt="image not found">
                           </div>
                        </div>
                        <p class="bd-event-details-desc mb-50">Think of your wedding hashtag as the
                           perfect way to
                           create a digitized wedding photo album with all the best memories organized under one
                           convenient tag.Curious about how you and your partner can create the perfect wedding
                           hashtag? Fear no more, as we have all the top tips for crafting a one-of-a-kind wedding
                           hashtag personalized to your unique relationship!
                        </p>

                        <div class="bd-event-details__widget pb-30 mb-50">
                           <h4 class="bd-event-details__widget-title mb-20">Popular Event Flow</h4>
                           <div class="bd-event-details__list mb-15">
                              <ul>
                                 <li><i class="flaticon-check-circle"></i>Guest Arrive</li>
                                 <li><i class="flaticon-check-circle"></i>Guests Seated</li>
                                 <li><i class="flaticon-check-circle"></i>Loyal Toast</li>
                                 <li><i class="flaticon-check-circle"></i>Grace</li>
                                 <li><i class="flaticon-check-circle"></i>Breakfast Served</li>
                                 <li><i class="flaticon-check-circle"></i>Telegrams Read</li>
                                 <li><i class="flaticon-check-circle"></i>Cutting of the cake</li>
                                 <li><i class="flaticon-check-circle"></i>Bridal Waltz</li>
                                 <li><i class="flaticon-check-circle"></i>Going away ritual</li>
                                 <li><i class="flaticon-check-circle"></i>Coffee served</li>
                                 <li><i class="flaticon-check-circle"></i>Family join</li>
                                 <li><i class="flaticon-check-circle"></i>Goodbye</li>
                              </ul>
                           </div>
                        </div>
                        <ul class="bd-event-details-info-list">
                           <li class="">
                              <div class="icon">
                                 <i class="far fa-clock"></i>
                              </div>
                              <div class="content">
                                 <small class="event-title">Event Time</small>
                                 <h4 class="event-date">7.00 pm - 12.00 pm</h4>
                              </div>
                           </li>
                           <li class="">
                              <div class="icon">
                                 <i class="far fa-calendar-alt"></i>
                              </div>
                              <div class="content">
                                 <small class="event-title">Event Date</small>
                                 <h4 class="event-date">25 December, 2022</h4>
                              </div>
                           </li>
                           <li class="">
                              <div class="icon">
                                 <i class="far fa-map-marker-alt"></i>
                              </div>
                              <div class="content">
                                 <small class="event-title">Event Location</small>
                                 <h4 class="event-date">Glorio Restaurant</h4>
                              </div>
                           </li>
                        </ul>
                     </div>
                     <div class="bd-event-line mb-50"></div>
                     <div class="bd-event-social d-flex flex-wrap align-items-center">
                        <h4 class="mb-10">Share with:</h4>
                        <ul class="mb-10">
                           <li>
                              <a href="#"><i class="fab fa-facebook-f"></i></a>
                           </li>
                           <li>
                              <a href="#"><i class="fab fa-twitter"></i></a>
                           </li>
                           <li>
                              <a href="#"><i class="fab fa-linkedin"></i></a>
                           </li>
                           <li>
                              <a href="#"><i class="fab fa-behance"></i></a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="bd-sidebar__wrap">
                     {{-- <div class="bd-booking-3 mb-40">
                        <div class="bd-booking-3__content">
                           <h3 class="bd-booking-3__title mb-35">Reserve Your Seat</h3>
                           <div class="bd-booking-3__price">
                              <p>
                                 <i class="flaticon-group"></i>
                                 <span>For 2 Adults</span>
                              </p>
                              <p>
                                 <span><del>$299</del>$199</span>/ Program
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
                           <form>
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
                     </div> --}}
                     <div class="bd-booking-3-info mb-40">
                        <h3 class="bd-booking-3__title">Extra Services</h3>
                        <div class="bd-booking-3__list">
                           <ul>
                              <li><i class="flaticon-check-circle"></i>Room Cleaning</li>
                              <li><i class="flaticon-check-circle"></i>Evening Party Manage</li>
                              <li><i class="flaticon-check-circle"></i>Iron & loundry</li>
                              <li><i class="flaticon-check-circle"></i>Spa & Message</li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- event details area end here  -->

      <!-- gallery area start here  -->
      @include('components.moments_feedback')
      <!-- gallery area end here  -->

@endsection


