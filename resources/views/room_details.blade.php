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
                                <img src="assets/img/breadcrumb/breadcrumb-bg.png" alt="breadcrumb img">
                                </div>
                                <div class="bd-breadcrumb__content text-center">
                                <h1 class="bd-breadcrumb__title mb-20">{{$room->room_name}}</h1>
                                <div class="bd-breadcrumb__list">
                                    <span><a href="/">home</a></span>
                                    <span>{{$room->room_name}}</span>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </section>
            <!-- breadcrumb area end here  -->

    {{-- @if($bookingDate)
        <div class="alert alert-info">
            You selected check-in: <strong>{{ $bookingDate }}</strong>,
            check-out: <strong>{{ $checkout_date }}</strong>,
            Adults: <strong>{{ $adults }}</strong>,
            Children: <strong>{{ $children }}</strong>
        </div>
    @endif --}}
            <section class="bd-room-details-area">
                <div class="container">
                    <div class="row">
                    <div class="col-lg-9">
                        <div class="bd-room-details__wrap mb-60">
                            <div class="bd-room-details__thumb-wrap mb-10">
                                <div class="row">
                                <div class="col-md-8">
                                    <div class="bd-room-details__thumb mb-30 is-lg">
                                        @php
                                            $imagePath = public_path($room->image_path);
                                            $imageUrl = file_exists($imagePath)
                                                ? asset($room->image_path)
                                                : asset('img/roombg.jpg');
                                    @endphp
                                        <img src="{{$imageUrl}}" alt="image not found">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    {{-- <div class="bd-room-details__thumb mb-30">
                                        <img src="{{$room->image_path}}" alt="image not found">
                                    </div> --}}
                                    {{-- <div class="bd-room-details__thumb mb-30">
                                        <img src="{{asset('img/room/room3.jpg')}}" alt="image not found">
                                    </div> --}}
                                </div>
                                </div>
                            </div>
                            <div class="bd-room-details__content mb-75">
                                <h3 class="bd-room-details__title  mb-30">About {{$room->room_name}}
                                </h3>
                                <p class="bdFadeUp">
                                    {{$room->details->description}}
                                </p>
                                <div class="bd-room-details__widget mt-65 pb-30 mb-30">
                                <h4 class="bd-room-details__widget-title mb-20">Room Amenities</h4>
                                <div class="bd-room-details__list">
                                    <ul>
                                        @forelse($room->details->amenities as $feature)
                                            <li><i class="flaticon-check-circle"></i>{{$feature->feature_name}}</li>
                                        @empty
                                            <li>No amenities listed.</li>
                                        @endforelse
                                    </ul>
                                </div>
                                </div>
                                <div class="bd-room-details__widget pb-30 mb-30">
                                <h4 class="bd-room-details__widget-title mb-20">Popular with Guests</h4>
                                <div class="bd-room-details__list">
                                    <ul>
                                        @forelse($room->details->popularFeatures as $feature)
                                            <li><i class="flaticon-check-circle"></i>{{$feature->feature_name}}</li>
                                        @empty
                                            <li>No Popular with Geusts</li>
                                        @endforelse
                                    </ul>
                                </div>
                                </div>
                                <div class="bd-room-details__widget pb-30 mb-30">
                                <h4 class="bd-room-details__widget-title mb-20">Room Features</h4>
                                <div class="bd-room-details__list">
                                    <ul>
                                        @forelse($room->details->features as $feature)
                                            <li><i class="flaticon-check-circle"></i>{{$feature->feature_name}}</li>
                                        @empty
                                            <li>No room features here</li>
                                        @endforelse
                                    </ul>
                                </div>
                                </div>
                                <div class="bd-room-details__widget pb-30 mb-30">
                                <h4 class="bd-room-details__widget-title mb-20">Beds and Blanket</h4>
                                <div class="bd-room-details__list">
                                    <ul>
                                        @forelse($room->details->bedsAndBlankets as $feature)
                                            <li><i class="flaticon-check-circle"></i>{{$feature->feature_name}}</li>
                                        @empty
                                            <li>No Beds and blackets</li>
                                        @endforelse
                                    </ul>
                                </div>
                                </div>
                                <div class="bd-room-details__widget pb-30 mb-30">
                                <h4 class="bd-room-details__widget-title mb-20">Food and Drinks</h4>
                                <div class="bd-room-details__list">
                                    <ul>
                                        @forelse($room->details->foodsAndDrinks as $feature)
                                            <li><i class="flaticon-check-circle"></i>{{$feature->feature_name}}</li>
                                        @empty
                                            <li>No Foods and drinks</li>
                                        @endforelse
                                    </ul>
                                </div>
                                </div>
                                <div class="bd-room-details__widget pb-30 mb-30">
                                <h4 class="bd-room-details__widget-title mb-20">Safety and Security</h4>
                                <div class="bd-room-details__list">
                                    <ul>
                                        @forelse($room->details->safetyAndSecurity as $feature)
                                            <li><i class="flaticon-check-circle"></i>{{$feature->feature_name}}</li>
                                        @empty
                                            <li>No safety and security here</li>
                                        @endforelse
                                    </ul>
                                </div>
                                </div>
                                <div class="bd-room-details__widget pb-30 mb-30">
                                <h4 class="bd-room-details__widget-title mb-20">Media and Entertainment</h4>
                                <div class="bd-room-details__list">
                                    <ul>
                                        @forelse($room->details->media as $feature)
                                            <li><i class="flaticon-check-circle"></i>{{$feature->feature_name}}</li>
                                        @empty
                                            <li>No media here</li>
                                        @endforelse
                                    </ul>
                                </div>
                                </div>
                                <div class="bd-room-details__widget pb-30 mb-30">
                                <h4 class="bd-room-details__widget-title mb-20">Bathroom</h4>
                                <div class="bd-room-details__list">
                                    <ul>
                                        @forelse($room->details->bathroom as $feature)
                                            <li><i class="flaticon-check-circle"></i>{{$feature->feature_name}}</li>
                                        @empty
                                            <li>No bathroom here</li>
                                        @endforelse
                                    </ul>
                                </div>
                                </div>

                                {{-- <div class="bd-room-details__widget pb-30 mb-30">
                                <h4 class="bd-room-details__widget-title mb-20">Bathroom</h4>
                                <div class="bd-room-details__list">
                                    <ul>
                                        @forelse($room->details->bedsAndBlankets as $feature)
                                            <li><i class="flaticon-check-circle"></i>{{$feature->feature_name}}</li>
                                        @empty
                                            <li>No Beds and blackets</li>
                                        @endforelse
                                    </ul>
                                </div>
                                </div> --}}
                                <div class="bd-room-details__widget pb-30 mb-30">
                                <h4 class="bd-room-details__widget-title mb-20">Other Facilities</h4>
                                <div class="bd-room-details__list">
                                    <ul>
                                        @forelse($room->details->other as $feature)
                                            <li><i class="flaticon-check-circle"></i>{{$feature->feature_name}}</li>
                                        @empty
                                            <li>No other facility here</li>
                                        @endforelse
                                    </ul>
                                </div>

                                </div>

                            </div>

                        </div>
                        {{-- <div class="bd-booking-3__submit mt-15">
                                <button type="button" class="mb-3" data-bs-toggle="modal" data-bs-target="#bookingModal">
                                    <span  class="fs-4">Book Now</span> <i class="fa-regular fa-arrow-right-long"></i>
                               </button>
                                </div> --}}
                         @if($bookingDate)
                        {{-- <div class="bd-room__btn mb-4"> --}}
                            <div class="bd-booking-3__submit mt-15">
                                  <a href="{{ route('rooms.book', ['id' => $room->id, 'date' => $bookingDate, 'checkout' => $checkout_date, 'adults' => $adults, 'children' => $children]) }}">

                            <span class="fs-4">Book Now</span><i class="fa-regular fa-arrow-right-long"></i> </a>
                               </div> <br>
                               @else
                               <div class="bd-booking-3__submit mt-15">
                                <button type="button" class="mb-3" data-bs-toggle="modal" data-bs-target="#bookingModal">
                                    <span  class="fs-4">Book Now</span> <i class="fa-regular fa-arrow-right-long"></i>
                               </button>
                                </div>
                               {{-- <div class="bd-room__btn mb-4">
                                <button type="button" class="" data-bs-toggle="modal" data-bs-target="#bookingModal">
                                    <span>book now</span> <i class="fa-regular fa-arrow-right-long"></i>

                                </button>
                            </div> --}}

                        @endif

                    </div>
                     @php
                        $today = \Carbon\Carbon::today()->toDateString();
                    @endphp
 <!-- Booking Modal -->
<div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content bg-dark text-white">
      <div class="modal-header">
        <h5 class="modal-title text-light" id="bookingModalLabel">Book Your Room</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="searchForm" class="row" method="GET" action="{{ route('rooms.bookingmodel.submit', ['id' => $room->id]) }}">
          <div class="col-md-6 align-items-end">
            <div class="col-md-10 mb-3">
              <label for="adults" class="form-label text-white">Number of Adults:</label><br>
              <input type="number" name="adults" id="adults"
               value="{{ request('adults') }}"
                     class="form-control bg-secondary text-white border-0" min="1" max="{{ $room->details->adult }}" required>
                     <span class="text-danger">max {{ $room->details->adult }} Adults</span>
            </div>
            <div class="col-md-10 mb-3">
              <label for="children" class="form-label text-white">Number of Children:</label>
              <input type="number" name="children" id="children"
              value="{{ request('children') }}"
                     class="form-control bg-secondary text-white border-0" min="0" max="{{$room->details->child}}" required>
                     <span class="text-danger">max {{$room->details->child}} children</span>
            </div>
          </div>
          <div class="col-md-6 align-items-end">
            <div class="col-md-10 mb-3">
              <label for="booking_date" class="form-label text-white">Select Check-in Date:</label>
              <input type="text" name="booking_date" id="booking_date"
              value="{{ request('booking_date') }}"
                     class="form-control bg-secondary text-white border-0"
                     min="{{ $today }}"
                     required>
            </div>
            <br>
            <div class="col-md-10 mb-3">
              <label for="checkout_date" class="form-label text-white">Select Check-out Date:</label>
              <input type="text" name="checkout_date" id="checkout_date"
              value="{{ request('checkout_date') }}"
                     class="form-control bg-secondary text-white border-0"
                     min="{{ $today }}"
                     required>
            </div>
          </div>
          <div class="bd-booking-3__submit mt-15">
                                <button type="submit" class="mb-3">
                                    <span  class="fs-4">Book Now</span> <i class="fa-regular fa-arrow-right-long"></i>
                               </button>
                                </div>
          {{-- <div class="col-12 text-center mt-3">
            <button type="submit" class="btn btn-primary">Booking</button>
          </div> --}}
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  // Option 1: Clear when page loads
  window.addEventListener('DOMContentLoaded', function () {
    document.getElementById('searchForm').reset();
  });
</script>
  <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        const bookedDates = @json($bookedDates); // ["2025-07-24 13:00", "2025-07-25 09:00"]

function isDateTimeDisabled(date) {
    const y = date.getFullYear();
    const m = String(date.getMonth() + 1).padStart(2, '0');
    const d = String(date.getDate()).padStart(2, '0');
    const hr = String(date.getHours()).padStart(2, '0');
    const min = String(date.getMinutes()).padStart(2, '0');
    const formatted = `${y}-${m}-${d} ${hr}:${min}`;

    return bookedDates.includes(formatted);
}
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
            disable: [isDateTimeDisabled],
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

                    <div class="col-lg-3">
                            <div class="p-1 mb-4">
                                <div id="calendar" class="mb-3"></div>
                            </div>
                        {{-- <input type="text" id="calendar" class="form-control"> --}}

                        {{-- <div class="bd-sidebar__wrap mb-60"> --}}


                            @php
    //dd($lastCheckout);
    $minDate = $lastCheckout
        ? date('Y-m-d', strtotime($lastCheckout))
        : date('Y-m-d'); // fallback: now
    //dd($minDate)
    $startDate = $lastCheckin
        ? date('Y-m-d', strtotime($lastCheckin))
        : date('Y-m-d');
    // dd($startDate)
    // Ensure $startDate <= $minDate
    $start = new DateTime($startDate);
    $end = new DateTime($minDate);
    $dates = [];
    while ($start < $end) {
        $dates[] = $start->format('Y-m-d');
        $start->modify('+1 day');

    }
    //  dd($dates);
                                @endphp

                                {{-- @php
        $redDates = [
            '2025-07-10',
            '2025-07-14',
            '2025-07-19',
        ];
        $lastDate = end($redDates); // get the last date
    @endphp --}}
        {{-- <script src="{{ asset('js/flatpicker.js') }}"></script> --}}

    {{-- I put this into js file then not working --}}
    @php
    $blockedDatesarr = array_map(function($date) {
        return \Carbon\Carbon::parse($date)->format('Y-m-d');
    }, $bookedDates);
@endphp
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const minDate  = "{{ $minDate  }}";
            const startDate  = "{{ $startDate  }}";
            const blockedDates = @json($blockedDatesarr);
            blockedDates.pop();
            // console.log(minDate);


             function formatLocalDate(dateObj) {
                const y = dateObj.getFullYear();
                const m = String(dateObj.getMonth() + 1).padStart(2, '0');
                const d = String(dateObj.getDate()).padStart(2, '0');
                return `${y}-${m}-${d}`;
            }


            flatpickr("#calendar", {
                inline: true,
                clickOpens: false,
                 monthSelectorType: 'dropdown',
                onDayCreate: function (dObj, dStr, fp, dayElem) {
                    const date = formatLocalDate(dayElem.dateObj);
                    console.log(date);
                     const today = new Date();
                     const todayStr = formatLocalDate(today);
                    //   today.setHours(0, 0, 0, 0);
                    //   console.log(today);
                     const dayStr = formatLocalDate(dayElem.dateObj);
                     const dayDate = new Date(dayElem.dateObj); // actual date from calendar
                    // console.log(today);
                     const isBlockedDates = blockedDates.includes(dayStr);
                    if (date === minDate) {
                        dayElem.classList.add('orange-day'); // exact $minDate
                    } else if (date > startDate && date < minDate) {
                        dayElem.classList.add('red-day'); // between startDate and minDate
                    } else if (date > minDate ) {
                        dayElem.classList.add('green-day'); // after minDate
                    }else if (isBlockedDates) {
                        dayElem.classList.add('red-day'); // between startDate and minDate
                    }else if (date >= todayStr){
                        dayElem.classList.add('green-day'); // after minDate
                    }
                    //  dayElem.addEventListener('click', function () {
                    //     const bookingUrl = `/booking/{{ $room->id }}?date=${encodeURIComponent(date)}`;
                    //     window.location.href = bookingUrl;
                    // });
                     // Make only green-day and future dates clickable
        // Make only green-day and future dates clickable
                        const isPastDate = dayDate < today;
            const isBlockedDate = blockedDates.includes(dayStr);
        if (
           !isBlockedDate && !isPastDate

        ) {
            // console.log(dayStr, blockedDates.includes(dayStr));
            dayElem.style.cursor = 'pointer';
            dayElem.addEventListener('click', function () {
                const bookingUrl = `/booking/{{ $room->id }}?date=${encodeURIComponent(dayStr)}`;
                window.location.href = bookingUrl;
            });
        } else {
            // Make unclickable
            dayElem.style.pointerEvents = 'none';
            dayElem.style.opacity = '0.4';
        }
        // console.log(dayStr, blockedDates.includes(dayStr));

                }
            });
        });

    </script>

                            <div class="bd-booking-3 mb-40 ">
                                <div class="bd-booking-3__content">
                                <h3 class="bd-booking-3__title mb-15">{{$room->room_name}}</h3>
                                <div class="bd-booking-3__price">
                                    <p>
                                        <i class="flaticon-group"></i>
                                        <span>For {{$room->details->adult}} Adults</span>
                                        <span>And {{$room->details->child}} Child</span>
                                    </p>
                                    <br>
                                    <p>
                                        <span>{{$room->price}}</span>/ NIGHT
                                    </p>
                                </div>
                                <div class="bd-booking-3__tax">
                                    <p>
                                        <span><i class="fa-light fa-times"></i> Non-Refundable</span>
                                        +$49 taxes & fees
                                    </p>
                                </div>
                                </div>
                                <div class="bd-booking-3__list">
                                <ul>
                                    <li><i class="flaticon-check-circle"></i>1 King bed or 2 Twin Bed(s)</li>
                                    <li><i class="flaticon-check-circle"></i>538 sq.ft</li>
                                    <li><i class="flaticon-check-circle"></i>Garden View</li>
                                </ul>
                                </div>
                                 @if($bookingDate)
                                    <div class="bd-booking-3__submit mt-15">
                                <button type="submit"><a href="{{ route('rooms.book', ['id' => $room->id, 'date' => $bookingDate, 'checkout' => $checkout_date, 'adults' => $adults, 'children' => $children]) }}">BOOK NOW </a><i class="fa-regular fa-arrow-right-long"></i></button>
                                </div>
                            </div>
                                @else
                                {{-- <div class="bd-room__btn mb-4">
                                <button type="button" class="" data-bs-toggle="modal" data-bs-target="#bookingModal">
                                    <span>book now</span> <i class="fa-regular fa-arrow-right-long"></i>

                                </button> --}}
                            </div>
                            <div class="bd-booking-3__submit mt-15">
                                <button type="button" class="mb-3" data-bs-toggle="modal" data-bs-target="#bookingModal">
                                    <span>book now</span> <i class="fa-regular fa-arrow-right-long"></i>
                                    {{-- <span><h4>book now</h4></span> --}}
                                </button>
                                {{-- <button type="submit"><a href="{{ route('rooms.book', $room->id) }}">BOOK NOW </a><i class="fa-regular fa-arrow-right-long"></i></button> --}}
                                </div>
                            </div>


                        @endif

                            <div class="bd-booking-3-info ">
                                <h3 class="bd-booking-3__title">Extra Services</h3>
                                <div class="bd-booking-3__list">
                                <ul>
                                    @forelse($room->details->extraService as $feature)
                                        <li><i class="flaticon-check-circle"></i>{{$feature->service}}</li>
                                    @empty
                                        <li>No extra service here</li>
                                    @endforelse
                                </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </section>

            <!-- gallery area start here  -->
           @include('components.moments_feedback')
            <!-- testimonial area end here  -->

            <!-- room area start here  -->

            <section class="bd-room-area p-relative theme-bg-2 pt-150 pb-120">
                <div class="container">
                    <div class="row">
                    <div class="col-xl-8 col-lg-8">
                        <div class="bd-section__title-wrapper ">
                            <p class="bd-section__subtitle mb-20">you may also like</p>
                            <h2 class="bd-section__title mb-55 ">Similar Properties
                            </h2>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                        @include('components.room_cards', ['rooms' => $roomsfilter])
                    {{-- <div class="col-xxl-4 col-xl-6 col-lg-6">
                        <div class="bd-room mb-30">
                            <div class="bd-room__content">
                                <h4 class="bd-room__title mb-20"><a href="room-details.html">Queen Deluxe room</a></h4>
                                <div class="bd-room__price mb-30">
                                <p>$399 <span>/NIGHT</span></p>
                                </div>
                                <div class="bd-room__thumb-wrap mb-30">
                                <div class="bd-room__thumb">
                                    <img src="{{asset('img/room/room5.jpg')}}" alt="room image">
                                </div>
                                <div class="bd-room__details">
                                    <p>The Gage Hotel offers unforgettable food and drink options. A memorable stay with
                                        delicious breakfast Join us.</p>
                                    <div class="bd-room__list">
                                        <div class="bd-room__list-item">
                                            <i class="flaticon-taxi"></i>
                                            <p>Pick Up & Drop</p>
                                        </div>
                                        <div class="bd-room__list-item">
                                            <i class="flaticon-garage"></i>
                                            <p>Parking Space</p>
                                        </div>
                                        <div class="bd-room__list-item">
                                            <i class="flaticon-breakfast"></i>
                                            <p>Breakfast</p>
                                        </div>
                                        <div class="bd-room__list-item">
                                            <i class="flaticon-swimming-pool"></i>
                                            <p>Swimming Pool</p>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="bd-room__btn">
                                <a href="room-details.html"><span>book now</span> <i
                                        class="fa-regular fa-arrow-right-long"></i></a>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div class="col-xxl-4 col-xl-6 col-lg-6">
                        <div class="bd-room mb-30">
                            <div class="bd-room__content">
                                <h4 class="bd-room__title mb-20"><a href="room-details.html">Couple sea view Room</a></h4>
                                <div class="bd-room__price mb-30">
                                <p>$599 <span>/NIGHT</span></p>
                                </div>
                                <div class="bd-room__thumb-wrap mb-30">
                                <div class="bd-room__thumb">
                                    <img src="{{asset('img/room/room6.jpg')}}" alt="room image">
                                </div>
                                <div class="bd-room__details">
                                    <p>The Gage Hotel offers unforgettable food and drink options. A memorable stay with
                                        delicious breakfast Join us.</p>
                                    <div class="bd-room__list">
                                        <div class="bd-room__list-item">
                                            <i class="flaticon-taxi"></i>
                                            <p>Pick Up & Drop</p>
                                        </div>
                                        <div class="bd-room__list-item">
                                            <i class="flaticon-garage"></i>
                                            <p>Parking Space</p>
                                        </div>
                                        <div class="bd-room__list-item">
                                            <i class="flaticon-breakfast"></i>
                                            <p>Breakfast</p>
                                        </div>
                                        <div class="bd-room__list-item">
                                            <i class="flaticon-swimming-pool"></i>
                                            <p>Swimming Pool</p>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="bd-room__btn">
                                <a href="room-details.html"><span>book now</span> <i
                                        class="fa-regular fa-arrow-right-long"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-xl-6 col-lg-6">
                        <div class="bd-room mb-30">
                            <div class="bd-room__content">
                                <h4 class="bd-room__title mb-20"><a href="room-details.html">Junior Suites room</a></h4>
                                <div class="bd-room__price mb-30">
                                <p>$299 <span>/NIGHT</span></p>
                                </div>
                                <div class="bd-room__thumb-wrap mb-30">
                                <div class="bd-room__thumb">
                                    <img src="{{asset('img/room/room4.jpg')}}" alt="room image">
                                </div>
                                <div class="bd-room__details">
                                    <p>The Gage Hotel offers unforgettable food and drink options. A memorable stay with
                                        delicious breakfast Join us.</p>
                                    <div class="bd-room__list">
                                        <div class="bd-room__list-item">
                                            <i class="flaticon-taxi"></i>
                                            <p>Pick Up & Drop</p>
                                        </div>
                                        <div class="bd-room__list-item">
                                            <i class="flaticon-garage"></i>
                                            <p>Parking Space</p>
                                        </div>
                                        <div class="bd-room__list-item">
                                            <i class="flaticon-breakfast"></i>
                                            <p>Breakfast</p>
                                        </div>
                                        <div class="bd-room__list-item">
                                            <i class="flaticon-swimming-pool"></i>
                                            <p>Swimming Pool</p>
                                        </div>
                                    </div>
                                </div>
                                </div>
                               <div class="bd-room__btn">
                                 <a href="room-details.html"><span>book now</span> <i
                                        class="fa-regular fa-arrow-right-long"></i></a>
                                </div>



                            </div>
                        </div>
                    </div> --}}
                    {{-- See More Button --}}
                <div class="text-center mt-4">
                    <a href="{{ route('rooms.all') }}" class="btn btn-outline-secondary text-dark">See More Rooms...</a>
                </div>
                    </div>
                </div>
            </section>
            <!-- room area end here  -->
@endsection
