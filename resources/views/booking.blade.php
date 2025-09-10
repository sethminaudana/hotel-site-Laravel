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
                            <h1 class="bd-breadcrumb__title mb-20">Booking form</h1>
                            <div class="bd-breadcrumb__list">
                                <span><a href="{{url('/')}}">home</a></span>
                                <span>Booking form</span>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb area end here  -->
       @php
       //dd($lastCheckout);
       $now = now()->format('Y-m-d H:i');
    //    dd($now);
        //     $minDate = $lastCheckout
        // ? date('Y-m-d H:i', strtotime($lastCheckout ))
        // : date('Y-m-d H:i'); // fallback: now
        // dd($lastCheckout);
        $minDate = ($lastCheckout && $lastCheckout > $now)
        ? date('Y-m-d H:i', strtotime($lastCheckout))
        : $now;
        // dd($minDate);
        if($selectedDate){
            $inDate=date('Y-m-d', strtotime($selectedDate ));
        }
        else{
            $inDate=$now;
        }

           @endphp


        <section class="bd-breadcrumb-area p-relative">
            @if(session('success'))
                    <div id="success-message" class="alert alert-success">
                        {{ session('success') }}
                    </div>
            @endif
            <div class="container">
                 {{-- {{$lastCheckout}} --}}

                {{-- <h2 class="fs-md-5 fs-lg-3">Book Room: {{ $room->room_name }}</h2> --}}
                <h2 class="responsive-heading">Book Room: {{ $room->room_name }}</h2>

               
    <form id="booking-form" method="POST" action="{{ route('rooms.book.submit', $room->id) }}" class="mb-5">
        @csrf

        <input type="hidden" name="room_id" value="{{ $room->id }}">

<div class="bd-booking-4__form">

<div class="bd-booking-4__input mb-15">
    <label for="first_name" class="form-label">First Name</label>
    <input type="text" name="first_name" id="first_name"
           value="{{ old('first_name') }}" required pattern="[A-Za-z\s]+"
           title="Only letters and spaces allowed">
    <div class="invalid-feedback">Please enter a valid first name (letters only).</div>
</div>


<div class="bd-booking-4__input mb-15">
    <label for="last_name" class="form-label">Last Name</label>
    <input type="text" name="last_name" id="last_name"
           value="{{ old('last_name') }}" required pattern="[A-Za-z\s]+"
           title="Only letters and spaces allowed">
    <div class="invalid-feedback">Please enter a valid last name (letters only).</div>
</div>


<div class="bd-booking-4__input mb-15">
    <label for="nic" class="form-label">Your NIC number</label>
    <input type="text" name="nic" id="nic"
           value="{{ old('nic') }}" required pattern="^\d{9}[vVxX]|\d{12}$">
    <div class="invalid-feedback">Please enter a valid NIC (e.g., 123456789V or 200012345678).</div>
</div>


<div class="bd-booking-4__input mb-15">
    <label for="email" class="form-label">Your Email</label>
    <input type="email" name="email" id="email"
           value="{{ old('email') }}" required>
    <div class="invalid-feedback">Please enter a valid email address.</div>
</div>





<div class="bd-booking-4__input mb-15">
    <label for="contact" class="form-label">Your Contact number</label>
    <input type="tel" id="contact"
          name="contact" value="{{ old('contact') }}" required pattern="^0\d{9}$">
    <div class="invalid-feedback">Contact must be 10 digits starting with 0.</div>
</div>

<br>
<div class="bd-booking-4__input mb-15">
    <label for="checkin_datetime" class="form-label">Check-in Date & Time</label>
    <input type="text"
       id="checkin_picker"

       data-mindate="{{ $minDate }}"
       placeholder="Select check-in date & time" name="checkin_datetime"
       value="{{ old('checkin_datetime', $booking_date ?? $inDate ) }}"
       required>
    <div class="invalid-feedback">Check-in date is required.</div>
</div>

{{-- {{$inDate}} --}}
<div class="bd-booking-4__input mb-15">
    <label for="checkout_datetime" class="form-label">Check-out Date & Time</label>
    <input type="text"
       id="checkin_picker"

       data-mindate="{{ $minDate }}"
       placeholder="Select check-out date & time" name="checkout_datetime"
       value="{{ old('checkout_datetime', $checkout_date ) }}"
       required>
    <div class="invalid-feedback">Check-out must be after check-in.</div>
</div>

<!-- Adults -->
<div class="bd-booking-4__input p-relative mb-15">
    <label for="adults" class="form-label">Adults</label>
    <select class="bd-nice-select" name="adults" id="adults" required>
        @for ($i = 1; $i <= 9; $i++)
            <option value="{{ $i }}" {{ (isset($adults) && $adults == $i) ? 'selected' : '' }}>
                {{ $i }}
            </option>
        @endfor
    </select>
    <div class="invalid-feedback">
        At least one adult is required. Total guests (adults + children) must be less than 10.
    </div>
</div>

<!-- Children -->
<div class="bd-booking-4__input p-relative mb-15">
    <label for="children" class="form-label">Children</label>
    <select class="bd-nice-select" name="children" id="children" required>
        @for ($i = 0; $i <= 9; $i++)
            <option value="{{ $i }}" {{ (isset($children) && $children == $i) ? 'selected' : '' }}>
                {{ $i }}
            </option>
        @endfor
    </select>
    <div class="invalid-feedback">
        Total guests (adults + children) must be less than 10.
    </div>
</div>

       <div class="mb-3">
    <label class="form-label">Meal Plan</label>
    <div class="row">
        <div class="col-md-6">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="meals[]" value="breakfast" id="mealBreakfast">
                <label class="form-check-label" for="mealBreakfast">Breakfast (Rs. 500)</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="meals[]" value="lunch" id="mealLunch">
                <label class="form-check-label" for="mealLunch">Lunch (Rs. 800)</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="meals[]" value="dinner" id="mealDinner">
                <label class="form-check-label" for="mealDinner">Dinner (Rs. 900)</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="meals[]" value="tea" id="mealTea">
                <label class="form-check-label" for="mealTea">Evening Tea (Rs. 300)</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="meals[]" value="snacks" id="mealSnacks">
                <label class="form-check-label" for="mealSnacks">Snacks (Rs. 350)</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="meals[]" value="juice" id="mealJuice">
                <label class="form-check-label" for="mealJuice">Juice (Rs. 250)</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="meals[]" value="high_tea" id="mealHighTea">
                <label class="form-check-label" for="mealHighTea">High Tea (Rs. 600)</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="meals[]" value="special_dinner" id="mealSpecialDinner">
                <label class="form-check-label" for="mealSpecialDinner">Special Dinner (Rs. 1200)</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="meals[]" value="kids_meal" id="mealKidsMeal">
                <label class="form-check-label" for="mealKidsMeal">Kids Meal (Rs. 400)</label>
            </div>
        </div>
    </div>
</div>
    <br>

    <div class="glo-booking-btn">
        <button type="submit" class="bd-btn dark-btn">Submit Booking</button>
        {{-- <span><i class="fa-regular fa-arrow-right-long"></i></span> --}}
    </div>
    </form>

    <br/>



            
            </div>
    </div>
        </section>


        <!-- room view area start  -->
        <div class="bd-roomview-area-2 p-relative">
            <div class="swiper-container bd-roomview-active">
                <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="bd-roomview__slider-wrap p-relative">
                        <div class="bd-roomview__bg-2" data-background="{{asset('img/room/room1.jpg')}}"></div>
                        <div class="container">
                            <div class="row">
                            <div class="col-12">
                                <div class="bd-roomview__content-2">
                                    <div class="bd-roomview__price-wrap d-flex justify-content-center">
                                        <div class="bd-roomview__price mt-65">
                                        <p><span>$399</span>/<br>Night</p>
                                        </div>
                                    </div>
                                    <div class="bd-roomview__slider-number d-inline-flex p-absolute">
                                        <span class="current">1</span>
                                        <span class="divider">/</span>
                                        <span class="total">6</span>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="bd-roomview__slider-wrap p-relative">
                        <div class="bd-roomview__bg-2" data-background="{{asset('img/room/room2.jpg')}}"></div>
                        <div class="container">
                            <div class="row">
                            <div class="col-12">
                                <div class="bd-roomview__content-2">
                                    <div class="bd-roomview__price-wrap d-flex justify-content-center">
                                        <div class="bd-roomview__price mt-65">
                                        <p><span>$185</span>/<br>Night</p>
                                        </div>
                                    </div>
                                    <div class="bd-roomview__slider-number d-inline-flex p-absolute">
                                        <span class="current">2</span>
                                        <span class="divider">/</span>
                                        <span class="total">6</span>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="bd-roomview__slider-wrap p-relative">
                        <div class="bd-roomview__bg-2" data-background="{{asset('img/room/room3.jpg')}}"></div>
                        <div class="container">
                            <div class="row">
                            <div class="col-12">
                                <div class="bd-roomview__content-2">
                                    <div class="bd-roomview__price-wrap d-flex justify-content-center">
                                        <div class="bd-roomview__price mt-65">
                                        <p><span>$259</span>/<br>Night</p>
                                        </div>
                                    </div>
                                    <div class="bd-roomview__slider-number d-inline-flex p-absolute">
                                        <span class="current">3</span>
                                        <span class="divider">/</span>
                                        <span class="total">6</span>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="bd-roomview__slider-wrap p-relative">
                        <div class="bd-roomview__bg-2" data-background="{{asset('img/room/room4.jpg')}}"></div>
                        <div class="container">
                            <div class="row">
                            <div class="col-12">
                                <div class="bd-roomview__content-2">
                                    <div class="bd-roomview__price-wrap d-flex justify-content-center">
                                        <div class="bd-roomview__price mt-65">
                                        <p><span>$339</span>/<br>Night</p>
                                        </div>
                                    </div>
                                    <div class="bd-roomview__slider-number d-inline-flex p-absolute">
                                        <span class="current">4</span>
                                        <span class="divider">/</span>
                                        <span class="total">6</span>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="bd-roomview__slider-wrap p-relative">
                        <div class="bd-roomview__bg-2" data-background="{{asset('img/room/room5.jpg')}}"></div>
                        <div class="container">
                            <div class="row">
                            <div class="col-12">
                                <div class="bd-roomview__content-2">
                                    <div class="bd-roomview__price-wrap d-flex justify-content-center">
                                        <div class="bd-roomview__price mt-65">
                                        <p><span>$357</span>/<br>Night</p>
                                        </div>
                                    </div>
                                    <div class="bd-roomview__slider-number d-inline-flex p-absolute">
                                        <span class="current">5</span>
                                        <span class="divider">/</span>
                                        <span class="total">6</span>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="bd-roomview__slider-wrap p-relative">
                        <div class="bd-roomview__bg-2" data-background="{{asset('img/room/room6.jpg')}}"></div>
                        <div class="container">
                            <div class="row">
                            <div class="col-12">
                                <div class="bd-roomview__content-2">
                                    <div class="bd-roomview__price-wrap d-flex justify-content-center">
                                        <div class="bd-roomview__price mt-65">
                                        <p><span>$385</span>/<br>Night</p>
                                        </div>
                                    </div>
                                    <div class="bd-roomview__slider-number d-inline-flex p-absolute">
                                        <span class="current">6</span>
                                        <span class="divider">/</span>
                                        <span class="total">6</span>
                                    </div>
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
                    <div class="bd-roomview__pagination-wrap">
                        <div class="bd-roomview__pagination"></div>
                    </div>
                </div>
                </div>
            </div>
            <div class="bd-roomview__line">
                <span class="bd-roomview__line-1"></span>
                <span class="bd-roomview__line-2"></span>
            </div>
            <div class="bd-swiper-navigation">
                <button class="bd-roomview-prev">
                <i class="fa-regular fa-arrow-left"></i>
                </button>
                <button class="bd-roomview-next">
                <i class="fa-regular fa-arrow-right"></i>
                </button>
            </div>
        </div>
        <!-- room view area end  -->
        <!-- feature area start here  -->
        <div class="bd-feature theme-bg-2 p-relative pb-90">
            <div class="container">
                <div class="bd-feature__list pt-145">
                <div class="row">
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
       @endsection




