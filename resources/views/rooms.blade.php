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
                                <h1 class="bd-breadcrumb__title mb-20">Rooms & Suites</h1>
                                <div class="bd-breadcrumb__list">
                                    <span><a href="{{url('/')}}">home</a></span>
                                    <span>Rooms & Suites</span>
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
        $today = \Carbon\Carbon::today()->toDateString();
        $adults = old('adults') ?? request('adults');
    $adults = is_numeric($adults) ? $adults : 1;
    @endphp

    {{-- @include('components.booking_results') --}}
    <div class="search-container">
        <h2>Search Your Booking</h2>

        <form id="booking-search-form" action="{{ route('booking.search') }}" method="GET">
            <input id="booking-code-input" type="text" name="booking_code" placeholder="Enter Booking Code">
            <input id="nic-input" type="text" name="nic" placeholder="Enter NIC Number">

            <button type="submit" class="search-btn">Search</button>

            @if(request()->has('booking_code'))
                <button type="button" id="clear-btn" class="clear-btn">Clear</button>

            @endif
        </form>
    </div>
    <div id="booking-result">

    </div>




    <!-- room area end here  -->
    <section class="bd-room-area p-relative pt-150 pb-120">
        <div class="bd-room__bg" data-background="{{asset('img/roombg.jpg')}}"></div>
        <div class="">
            <form id="searchForm" class="row bg-light p-4 mb-3 align-items-center mx-auto">

                <div class="col-md-6" style="padding-left: 7%">
                    <div class="col-md-10 mb-3">
                        <label for="adults" class="form-label text-black">Number of Adults:</label><br>
                        <div class="form-floating">
                        <input type="number" name="adults" id="adults" value="{{ request('adults',1) }}"
                            class="form-control numberinput" min="1" max="10" >
                            <label for="adults" class="text-black">Adults (Ages 13 or above)</label>
                        </div>
                        </div>

                         {{-- <div class="bd-booking-4__input p-relative mb-15">
                              <select class="bd-nice-select">
                                 <option value="">Adult</option>
                                 <option value="">1 Adult</option>
                                 <option value="">2 Adult</option>
                                 <option value="">3 Adult</option>
                                 <option value="">4 Adult</option>
                                 <option value="">5 Adult</option>
                              </select>
                           </div> --}}
                    <div class="col-md-10 mb-3">
                    {{-- <select name="adults" id="adults" class="form-control" required>
                        <option value="">Select Adults</option>
                        @foreach (range(1, 10) as $i)
                            <option value="{{ $i }}" {{ old('adults', request('adults')) == $i ? 'selected' : '' }}>
                                {{ $i }}
                            </option>
                        @endforeach
                    </select> --}}
                    </div>
                    <div class="col-md-10 mb-3">
                        <label for="children" class="form-label text-black">Number of Children:</label><br>
                        <div class="form-floating">
                        <input type="number" name="children" id="children" value="{{ request('children',0) }}"
                            class="form-control numberinput" min="0" max="10">
                            <label for="adults" class="text-black">Children (Ages 12 or below)</label>
                        </div>
                        </div>
                </div>
                  <div class="col-md-6 align-items-end">
                    <div class="col-md-10 mb-3">
                        <label for="booking_date" class="form-label text-black">Select Check-in Date:</label> <br>
                        <div class="input-group">
            <span class="input-group-text bg-white text-black border-secondary p-3">
                <i class="fa fa-calendar text-black"></i>
            </span>
            <input type="text"
                   name="booking_date"
                   id="booking_date"
                   value="{{ request('booking_date') }}"
                   class="form-control border-secondary dateinput"
                   min="{{ $today }}"
                   placeholder="YYYY-MM-DD"
                   required>
        </div>
                    </div>
                    <div class="col-md-10 mb-3">
                        <label for="checkout_date" class="form-label text-black">Select Check-out Date:</label><br>
                        <div class="input-group">
                            <span class="input-group-text bg-white text-black border-secondary p-3">
                                <i class="fa fa-calendar text-black"></i>
                            </span>
                        <input type="text" name="checkout_date" id="checkout_date" value="{{ request('checkout_date',) }}"
                            class="form-control border-secondary dateinput" min="{{ $today }}" placeholder="YYYY-MM-DD">
                        </div>

                    </div>
                </div>
            </form>
        </div>
     {{-- <script>
        function changeCounter(type, change) {
            const input = document.getElementById(type);
            const display = document.getElementById(type + '-display');
            const currentValue = parseInt(input.value);
            const min = parseInt(input.min);
            const max = parseInt(input.max);

            const newValue = Math.max(min, Math.min(max, currentValue + change));

            input.value = newValue;
            display.textContent = newValue;

            updateButtonStates();
        }

        function updateButtonStates() {
            // Update adults buttons
            const adultsValue = parseInt(document.getElementById('adults').value);
            const adultsButtons = document.querySelectorAll('.counter-field:first-of-type .counter-btn');
            adultsButtons[0].style.opacity = adultsValue <= 1 ? '0.4' : '1';
            adultsButtons[0].style.cursor = adultsValue <= 1 ? 'not-allowed' : 'pointer';
            adultsButtons[1].style.opacity = adultsValue >= 10 ? '0.4' : '1';
            adultsButtons[1].style.cursor = adultsValue >= 10 ? 'not-allowed' : 'pointer';

            // Update children buttons
            const childrenValue = parseInt(document.getElementById('children').value);
            const childrenButtons = document.querySelectorAll('.counter-field:last-of-type .counter-btn');
            childrenButtons[0].style.opacity = childrenValue <= 0 ? '0.4' : '1';
            childrenButtons[0].style.cursor = childrenValue <= 0 ? 'not-allowed' : 'pointer';
            childrenButtons[1].style.opacity = childrenValue >= 10 ? '0.4' : '1';
            childrenButtons[1].style.cursor = childrenValue >= 10 ? 'not-allowed' : 'pointer';
        }

        // Initialize button states
        updateButtonStates();
    </script> --}}
        {{-- <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Dropdown button
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </div> --}}
        <div class="container">
            <div class="row wow fadeInUp" data-wow-delay=".5s" id="roomGrid">
                {{-- @if(isset($rooms, $date))
                <h3>Available Rooms on {{ $date }}</h3>
                @foreach($rooms as $room)
                <div class="room-card">
                    <h4>{{ $room->room_name }}</h4>

                    <!-- other room info -->
                </div>
                @endforeach

                @if($rooms->isEmpty())
                <p>No rooms available on that date.</p>
                @endif
                @endif --}}
                @include('components.room_cards', ['rooms' => $rooms])

            </div>
        </div>
    </section>
    <!-- room area end here  -->

    <!-- facility area start here -->
    <section class="bd-facility-area">
        <div class="bd-facility-area-wrap pt-150 pb-90">
            <div class="container">
                <div class="row wow fadeInUp" data-wow-delay=".5s">
                    <div class="col-12">
                        <div class="bd-section__title-wrapper text-center">
                            <h2 class="bd-section__title mb-55">
                                Nisala Hotel awesome facilities
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center wow fadeInUp" data-wow-delay=".5s">
                    <div class="col-xl-4 col-lg-4">
                        <div class="bd-facility mb-60">
                            <ul>
                                <li>
                                    <div class="bd-facility__content">
                                        <h4 class="bd-facility__title">Front desk [24-hour]</h4>
                                        <p>The Nisala Hotel offers unforgettable food and drink options. A memorable stay
                                            with
                                            delicious
                                            breakfast Join us.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="bd-facility__content">
                                        <h4 class="bd-facility__title">Free Wi-Fi in all rooms!</h4>
                                        <p>The Nisala Hotel offers unforgettable food and drink options. A memorable stay
                                            with
                                            delicious
                                            breakfast Join us.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="bd-facility__content">
                                        <h4 class="bd-facility__title">gym & Spa</h4>
                                        <p>The Nisala Hotel offers unforgettable food and drink options. A memorable stay
                                            with
                                            delicious
                                            breakfast Join us.</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <div class="bd-facility__thumb-wrap p-relative mb-60">
                            <div class="bd-facility__bg">
                                <img src="{{asset('img/facility2.jpg')}}" alt="image not found">
                            </div>
                            <div class="bd-facility__thumb" data-mask="{{asset('img/mask/mask-2.png')}}">
                                <img src="{{asset('img/facility1.jpg')}}" alt="image not found">
                            </div>
                        </div>
                    </div>
                    <div class="swimmingmt col-xl-4 col-lg-4 d-flex justify-content-xl-end">
                        <div class="bd-facility mb-60">
                            <ul>
                                <li>
                                    <div class="bd-facility__content">
                                        <h4 class="bd-facility__title">Swimming Pool</h4>
                                        <p>The Nisala Hotel offers unforgettable food and drink options. A memorable stay
                                            with
                                            delicious
                                            breakfast Join us.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="bd-facility__content">
                                        <h4 class="bd-facility__title">Luggage storage</h4>
                                        <p>The Nisala Hotel offers unforgettable food and drink options. A memorable stay
                                            with
                                            delicious
                                            breakfast Join us.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="bd-facility__content">
                                        <h4 class="bd-facility__title">Room Cleaning</h4>
                                        <p>The Nisala Hotel offers unforgettable food and drink options. A memorable stay
                                            with
                                            delicious
                                            breakfast Join us.</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- facility area end here -->

    <!-- pricing plan area start here -->
    @include('components.pricing_plan')
    <!-- pricing plan area end here -->

    <!-- feature area start here  -->
    <div class="bd-feature p-relative pb-90">
        <div class="container">
            <div class="bd-feature__list pt-145">
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
    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("#booking_date", {
            enableTime: true,
            dateFormat: "Y-m-d H:i", // Matches Laravel format
            minDate: "{{ now()->format('Y-m-d H:i') }}", // Disallow past
            time_24hr: true // Optional: use 24-hour time
            // onChange: function(selectedDates, dateStr) {
            //     if (selectedDates.length > 0) {
            //         checkoutPicker.set("minDate", selectedDates[0]);
            //     }
            // }
        });

        const bookingPicker = flatpickr("#booking_date", {
            enableTime: true,
            dateFormat:"Y-m-d H:i",
            minDate: "{{ now()->format('Y-m-d H:i') }}",
            time_24hr: true,
            onChange: function(selectedDates, dateStr){
                if(selectedDates.length > 0){
                    const checkinDate = selectedDates[0];

                    const minCheckoutDate = new Date(checkinDate.getTime() + 60 * 1000);

                    checkoutPicker.set("minDate", minCheckoutDate);
                }
            }
        });

        const checkoutPicker = flatpickr("#checkout_date", {
            enableTime: true,
            dateFormat: "Y-m-d H:i", // Matches Laravel format
            minDate: "{{ now()->format('Y-m-d H:i') }}", // Disallow past
            time_24hr: true // Optional: use 24-hour time
        });
    </script>

@endsection
