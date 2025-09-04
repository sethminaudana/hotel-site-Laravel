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

                {{-- @php
                    $lastCheckout = $room->reservations()
                        // ->where('status', 'confirmed')
                        ->orderByDesc('checkout_datetime')
                        ->value('checkout_datetime');
                @endphp
                {{$lastCheckout}} --}}
{{-- ----------------form------------------- --}}
{{-- <h4>Booking Details</h4>
<ul>
    <li>Check-in: {{ $bookingDate }}</li>
    <li>Check-out: {{ $checkoutDate }}</li>
    <li>Adults: {{ $adults }}</li>
    <li>Children: {{ $children }}</li>
</ul> --}}
{{-- <div class="container mt-5">
    <h2>Booking Confirmation</h2>
    <p><strong>Adults:</strong> {{ $adults }}</p>
    <p><strong>Children:</strong> {{ $children }}</p>
    <p><strong>Check-in Date:</strong> {{ $booking_date }}</p>
    <p><strong>Check-out Date:</strong> {{ $checkout_date }}</p>


</div> --}}
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



{{-- {{ $minDate }}
<input type="text"
       id="checkin_picker"
       class="form-control"
       data-mindate="{{ $minDate }}"
       placeholder="Select check-in date & time"> --}}
{{-- <script>
document.addEventListener('DOMContentLoaded', function () {
    flatpickr("#checkin_picker", {
      enableTime: true,
      dateFormat: "Y-m-d H:i K",
      //minDate: new Date(), // or use a PHP-injected min date
      minDate: document.getElementById('checkin_picker').dataset.mindate,
      time_24hr: false,
      theme: "dark" // only applies if you include dark.css
    });
  });

</script> --}}

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



            <!-- Top Booking Section -->
            {{-- <div class="booking-header">
                <div class="booking-field">
                    <label><i class="fas fa-users"></i> Guests</label>
                    <input type="text" class="booking-input" id="guestsInput" value="1 adult, 0 children" readonly>
                    <div class="dropdown guest-dropdown" id="guestDropdown">
                        <div class="guest-row">
                            <div class="guest-info">
                                <h4>Adults</h4>
                                <span>Ages 13+</span>
                            </div>
                            <div class="counter-controls">
                                <button class="counter-btn" id="adultsDown">-</button>
                                <span class="counter-value" id="adultsCount">1</span>
                                <button class="counter-btn" id="adultsUp">+</button>
                            </div>
                        </div>
                        <div class="guest-row">
                            <div class="guest-info">
                                <h4>Children</h4>
                                <span>Ages 2-12</span>
                            </div>
                            <div class="counter-controls">
                                <button class="counter-btn" id="childrenDown">-</button>
                                <span class="counter-value" id="childrenCount">0</span>
                                <button class="counter-btn" id="childrenUp">+</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="booking-field">
                    <label><i class="fas fa-calendar"></i> Check-in</label>
                    <input type="text" class="booking-input" id="checkinInput" value="Sun, Sep 14, 2025" readonly>
                    <div class="dropdown calendar-dropdown" id="checkinCalendar">
                        <div class="calendar-header">
                            <button class="calendar-nav" id="checkinPrev">&lt;</button>
                            <span class="calendar-month" id="checkinMonth"></span>
                            <button class="calendar-nav" id="checkinNext">&gt;</button>
                        </div>
                        <div class="calendar-grid" id="checkinGrid"></div>
                    </div>
                </div>

                <div class="booking-field">
                    <label><i class="fas fa-calendar"></i> Check-out</label>
                    <input type="text" class="booking-input" id="checkoutInput" value="Wed, Sep 17, 2025" readonly>
                    <div class="dropdown calendar-dropdown" id="checkoutCalendar">
                        <div class="calendar-header">
                            <button class="calendar-nav" id="checkoutPrev">&lt;</button>
                            <span class="calendar-month" id="checkoutMonth"></span>
                            <button class="calendar-nav" id="checkoutNext">&gt;</button>
                        </div>
                        <div class="calendar-grid" id="checkoutGrid"></div>
                    </div>
                </div>

                <div>
                    <a href="#" class="special-codes">
                        Special Codes or Rates <i class="fas fa-chevron-down"></i>
                    </a>
                </div>

                <div class="cart-info">
                    <div>YOUR CART: 0 ITEMS</div>
                    <div class="cart-total">Total $0.00</div>
                </div>
            </div>

            <div class="main-content">
                <div class="room-section">
                    <h2>Select a Room</h2> --}}

                    <!-- Meal Plans -->
                    {{-- <div class="meal-plans">
                        <h3>Available Meal Plans</h3>
                        <div class="meal-plans-container">
                            <button class="meal-nav" id="mealPrev">&lt;</button>
                            <div class="meal-options">
                                <div class="meal-option">
                                    <h4>Breakfast</h4>
                                    <div class="price">from $150</div>
                                </div>
                                <div class="meal-option active">
                                    <h4>Half Board</h4>
                                    <div class="price">from $197</div>
                                </div>
                                <div class="meal-option">
                                    <h4>All Inclusive</h4>
                                    <div class="price">from $240</div>
                                </div>
                            </div>
                            <button class="meal-nav" id="mealNext">&gt;</button>
                        </div>
                        <div class="meal-disclaimer">Prices are avg. daily rate excluding taxes and fees</div>
                    </div> --}}

                    <!-- Filter Controls -->
                    {{-- <div class="filter-controls">
                        <div class="filter-row">
                            <div class="accessible-checkbox">
                                <input type="checkbox" id="accessible">
                                <label for="accessible">Accessible <i class="fas fa-wheelchair"></i></label>
                            </div>
                            <select class="filter-select">
                                <option>View By: Rooms</option>
                                <option>View By: Suites</option>
                            </select>
                            <select class="filter-select">
                                <option>Sort By: Lowest Price</option>
                                <option>Sort By: Highest Price</option>
                                <option>Sort By: Room Size</option>
                            </select>
                            <select class="filter-select">
                                <option>Filters</option>
                                <option>Ocean View</option>
                                <option>Beach Access</option>
                            </select>
                        </div>
                    </div> --}}

                    <!-- Room Card -->
                    {{-- <div class="room-card">
                        <div class="room-content">
                            <div class="room-image">
                                <img src="https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?w=400&h=250&fit=crop" alt="Superior Beach Loft">
                                <div class="image-overlay">
                                    <i class="fas fa-images"></i>
                                </div>
                            </div>

                            <div class="room-details">
                                <h3 class="room-title">Superior Beach Loft</h3>
                                <div class="room-status">3 people looking right now</div>
                                <div class="room-specs">
                                    <span>1 King bed</span> • <span>Sleeps 3</span> • <span>79 sq m</span>
                                </div>
                                <div class="room-description">
                                    Our Superior Beach Loft offers a stunning view of the blue ocean and white beach.
                                </div>
                                <a href="#" class="room-details-link">Room Details</a>

                                <div class="room-amenities">
                                    <div class="amenity">
                                        <i class="fas fa-wifi"></i>
                                        <span>Free Wifi</span>
                                    </div>
                                    <div class="amenity">
                                        <i class="fas fa-wind"></i>
                                        <span>Hair Dryer</span>
                                    </div>
                                    <div class="amenity">
                                        <i class="fas fa-snowflake"></i>
                                        <span>Air Conditioning</span>
                                    </div>
                                    <div class="amenity">
                                        <i class="fas fa-shower"></i>
                                        <span>Separate Shower</span>
                                    </div>
                                </div>
                            </div>

                            <div class="room-pricing">
                                <div class="rate-info">
                                    <div class="rate-label">Half Board - CINNAMON DISCOVERY Member Rate</div>
                                    <div class="member-rate">MEMBER RATE</div>
                                </div>

                                <div class="pricing-details">
                                    <div class="original-price">$217</div>
                                    <div class="current-price">$197</div>
                                    <div class="price-details">
                                        Per Night<br>
                                        Excluding taxes and fees
                                    </div>
                                </div>

                                <div class="benefits-list">
                                    <div class="benefit-item">
                                        <i class="fas fa-check"></i>
                                        <span>Free cancellation up to 7 days before arrival</span>
                                    </div>
                                    <div class="benefit-item">
                                        <i class="fas fa-utensils"></i>
                                        <span>Breakfast and Dinner Included</span>
                                    </div>
                                    <div class="benefit-item">
                                        <i class="fas fa-ship"></i>
                                        <span>FREE Return Speedboat Transfers | Book from 1st Apr to 31st Oct 2025 for stays from 1st May 25 to 31st Oct 2026 (Min 4 Nights) + 20% Off F&B & Spa + Cinnamon DISCOVERY Benefits + Book Direct Benefits</span>
                                    </div>
                                </div>

                                <button class="book-btn">Book Now</button>
                                <button class="compare-btn">Compare Prices<br><small>You are getting 9 perks</small></button>
                            </div>
                        </div>
                    </div>
                </div> --}}

                <!-- Sidebar -->
                {{-- <div class="sidebar">
                    <img src="https://images.unsplash.com/photo-1571896349842-33c89424de2d?w=350&h=200&fit=crop" alt="Cinnamon Discovery" class="sidebar-image">
                    <div class="sidebar-content">
                        <h3 class="sidebar-title">Cinnamon</h3>
                        <h2 class="sidebar-subtitle">Discovery</h2>
                        <p class="sidebar-description">
                            Looking to upgrade your stay? Enjoy very exclusive benefits available only to Cinnamon DISCOVERY members.
                        </p>
                        <ul class="sidebar-features">
                            <li><i class="fas fa-star"></i> Exclusive Member Benefits</li>
                            <li><i class="fas fa-gift"></i> Room upgrades</li>
                            <li><i class="fas fa-clock"></i> Early check-in, late check-out</li>
                        </ul>
                        <a href="#" class="sidebar-cta">Join for Free</a>
                    </div>
                </div> --}}
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



    {{-- <script>
    // Guest counter functionality
    let adults = 1, children = 0;

    function updateGuestDisplay() {
        const text = `${adults} adult${adults !== 1 ? 's' : ''}, ${children} child${children !== 1 ? 'ren' : ''}`;
        document.getElementById('guestsInput').value = text;
    }

    function setupGuestCounters() {
        document.getElementById('adultsUp').addEventListener('click', () => {
            adults++;
            document.getElementById('adultsCount').textContent = adults;
            updateGuestDisplay();
            updateCounterButtons();
        });

        document.getElementById('adultsDown').addEventListener('click', () => {
            if (adults > 1) {
                adults--;
                document.getElementById('adultsCount').textContent = adults;
                updateGuestDisplay();
                updateCounterButtons();
            }
        });

        document.getElementById('childrenUp').addEventListener('click', () => {
            children++;
            document.getElementById('childrenCount').textContent = children;
            updateGuestDisplay();
            updateCounterButtons();
        });

        document.getElementById('childrenDown').addEventListener('click', () => {
            if (children > 0) {
                children--;
                document.getElementById('childrenCount').textContent = children;
                updateGuestDisplay();
                updateCounterButtons();
            }
        });
    }

    function updateCounterButtons() {
        document.getElementById('adultsDown').disabled = adults <= 1;
        document.getElementById('childrenDown').disabled = children <= 0;
    }

    // Calendar functionality
    const months = ['January', 'February', 'March', 'April', 'May', 'June',
                    'July', 'August', 'September', 'October', 'November', 'December'];
    const weekdays = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

    let checkinDate = new Date(2025, 8, 14); // Sep 14, 2025
    let checkoutDate = new Date(2025, 8, 17); // Sep 17, 2025
    let activeCalendar = null;

    function generateCalendar(date, gridId, monthId) {
        const grid = document.getElementById(gridId);
        const monthSpan = document.getElementById(monthId);

        grid.innerHTML = '';
        monthSpan.textContent = `${months[date.getMonth()]} ${date.getFullYear()}`;

        weekdays.forEach(day => {
            const dayEl = document.createElement('div');
            dayEl.className = 'calendar-weekday';
            dayEl.textContent = day;
            grid.appendChild(dayEl);
        });

        const firstDay = new Date(date.getFullYear(), date.getMonth(), 1).getDay();
        const totalDays = new Date(date.getFullYear(), date.getMonth() + 1, 0).getDate();

        for (let i = 0; i < firstDay; i++) {
            const emptyCell = document.createElement('div');
            emptyCell.className = 'calendar-empty';
            grid.appendChild(emptyCell);
        }

        for (let d = 1; d <= totalDays; d++) {
            const dateEl = document.createElement('div');
            dateEl.className = 'calendar-day';
            dateEl.textContent = d;

            const fullDate = new Date(date.getFullYear(), date.getMonth(), d);
            dateEl.addEventListener('click', () => {
                if (gridId === 'checkinGrid') {
                    checkinDate = fullDate;
                    document.getElementById('checkinInput').value = fullDate.toDateString();
                    document.getElementById('checkinCalendar').style.display = 'none';
                } else {
                    checkoutDate = fullDate;
                    document.getElementById('checkoutInput').value = fullDate.toDateString();
                    document.getElementById('checkoutCalendar').style.display = 'none';
                }
            });

            grid.appendChild(dateEl);
        }
    }

    function setupCalendar(date, gridId, monthId, prevBtnId, nextBtnId) {
        let currentDate = new Date(date.getFullYear(), date.getMonth(), 1);

        function render() {
            generateCalendar(currentDate, gridId, monthId);
        }

        document.getElementById(prevBtnId).addEventListener('click', () => {
            currentDate.setMonth(currentDate.getMonth() - 1);
            render();
        });

        document.getElementById(nextBtnId).addEventListener('click', () => {
            currentDate.setMonth(currentDate.getMonth() + 1);
            render();
        });

        render();
    }

    // Dropdown toggles
    function setupDropdownToggles() {
        const guestInput = document.getElementById('guestsInput');
        const guestDropdown = document.getElementById('guestDropdown');

        guestInput.addEventListener('click', () => {
            guestDropdown.style.display = guestDropdown.style.display === 'block' ? 'none' : 'block';
        });

        const checkinInput = document.getElementById('checkinInput');
        const checkinCalendar = document.getElementById('checkinCalendar');
        checkinInput.addEventListener('click', () => {
            checkinCalendar.style.display = checkinCalendar.style.display === 'block' ? 'none' : 'block';
        });

        const checkoutInput = document.getElementById('checkoutInput');
        const checkoutCalendar = document.getElementById('checkoutCalendar');
        checkoutInput.addEventListener('click', () => {
            checkoutCalendar.style.display = checkoutCalendar.style.display === 'block' ? 'none' : 'block';
        });

        document.addEventListener('click', (e) => {
            if (!guestInput.contains(e.target) && !guestDropdown.contains(e.target)) {
                guestDropdown.style.display = 'none';
            }
            if (!checkinInput.contains(e.target) && !checkinCalendar.contains(e.target)) {
                checkinCalendar.style.display = 'none';
            }
            if (!checkoutInput.contains(e.target) && !checkoutCalendar.contains(e.target)) {
                checkoutCalendar.style.display = 'none';
            }
        });
    }

    // Initialize everything
    document.addEventListener('DOMContentLoaded', () => {
        updateGuestDisplay();
        updateCounterButtons();
        setupGuestCounters();
        setupDropdownToggles();
        setupCalendar(checkinDate, 'checkinGrid', 'checkinMonth', 'checkinPrev', 'checkinNext');
        setupCalendar(checkoutDate, 'checkoutGrid', 'checkoutMonth', 'checkoutPrev', 'checkoutNext');
    });
</script> --}}

