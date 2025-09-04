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
                           {{-- <img src="{{asset('img/contact.jpg')}}" alt="breadcrumb img"> --}}
                        </div>
                        <div class="bd-breadcrumb__content text-center">
                           <h1 class="bd-breadcrumb__title mb-20">Contact us</h1>
                           <div class="bd-breadcrumb__list">
                              <span><a href="/">home</a></span>
                              <span>contact us</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- breadcrumb area end here  -->
      @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
      @endif
      <!-- contact area start here  -->
      <section class="bd-contact-area x-clip pb-90">
         <div class="container">
            <div class="row">
               <div class="col-xl-6 mb-60">
                  <div class="bd-contact-form">
                     <h3 class="bd-contact-form-title mb-25">Contact Us Right Here</h3>
                     <form action="{{route('contacts.store')}}" method="POST">
                        @csrf
                        <div class="row">
                           <div class="col-md-6">
                              <div class="bd-contact-input mb-30">
                                 <label for="name">Name <sup><i class="fa-solid fa-star-of-life"></i></sup></label>
                                 <input id="name" type="text" name="name">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="bd-contact-input mb-30">
                                 <label for="email">Email <sup><i class="fa-solid fa-star-of-life"></i></sup></label>
                                 <input id="email" type="text" name="email">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="bd-contact-input mb-30">
                                 <label for="phone">Phone <sup><i class="fa-solid fa-star-of-life"></i></sup></label>
                                 <input id="phone" type="text" name="phone">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="bd-contact-input mb-30">
                                 <label for="subject">Subject</label>
                                 <input id="subject" type="text" name="subject">
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="bd-contact-input mb-20">
                                 <label for="textarea">Message <sup><i
                                          class="fa-solid fa-star-of-life"></i></sup></label>
                                 <textarea name="comment" id="textarea"></textarea>
                              </div>
                           </div>
                           {{-- <div class="col-md-12 mb-30">
                              <div class="bd-contact-agree d-flex align-items-center">
                                 <input class="ryl-cp" type="checkbox" id="check-agree">
                                 <label class="check-label ryl-cp" for="check-agree">Save Data for Next
                                    Comment</label>
                              </div>
                           </div> --}}
                           <div class="col-md-12">
                              <div class="bd-contact-agree-btn">
                                 <button type="submit" class="bd-btn">Send Now <span><i
                                          class="fa-regular fa-arrow-right-long"></i></span>
                                 </button>
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
               <div class="col-xl-6 mb-60">
                  <div class="bd-contact-map">
                    {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.523653521104!2d79.91047687373198!3d6.827635919556951!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae33b959729d713%3A0x59a6537f055ae25f!2sLeospree%20(Pvt)%20Ltd!5e0!3m2!1sen!2slk!4v1750391433866!5m2!1sen!2slk"
                    style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
                    <iframe src="{{ \App\Models\Setting::get('map_url', 'https://maps.google.com/...default-url-here...') }}"
                 style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                    {{-- <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14596.899807208923!2d90.3654215!3d23.8461445!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1673765392297!5m2!1sen!2sbd"
                        style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- contact area end here  -->

      <!-- testimonial area start here  -->
      <section class="bd-testimonial-area-2 p-relative pt-150 pb-150">
         <div class="bd-testimonial-2__bg" data-background="{{asset('img/contact.jpg')}}"></div>
         <div class="container">
            <div class="bd-testimonial-2__section-title mb-35 mmb-10">
               <div class="row align-items-center">
                  <div class="col-lg-9">
                     <div class="bd-section__title-wrapper is-white ">
                        <p class="bd-section__subtitle mb-20">testimonials</p>
                        <h2 class=" bd-section__title mb-40 mmb-10">What our customers
                           <br>are saying
                        </h2>
                     </div>
                  </div>
                  {{-- <div class="col-lg-3">
                     <div class="bd-testimonial__btn mb-60">
                        <a href="contact.html" class="bd-btn-2 is-white">View all review <i
                              class="fa-regular fa-arrow-right-long"></i></a>
                     </div>
                  </div> --}}
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
                                          <img src="{{asset('img/people1.jpg')}}" alt="image not found">
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
                                 <img src="{{asset('img/people1.jpg')}}" alt="image not found">
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
                                          <img src="{{asset('img/people2.jpg')}}" alt="image not found">
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
                                 <img src="{{asset('img/people2.jpg')}}" alt="image not found">
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
                                          <img src="{{asset('img/people3.jpg')}}" alt="image not found">
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
                                 <img src="{{asset('img/people3.jpg')}}" alt="image not found">
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

      <!-- brand area start here  -->
      @include('components.brands')
      <!-- brand area end here  -->
@endsection
