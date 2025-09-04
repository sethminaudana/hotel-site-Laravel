@extends('admin.dashboard')
@section('content')


<!-- Top Header -->
<header class="top-header">
    <div class="header-content">
        <h1 class="header-title">Admin Reservations</h1>
    </div>
</header>


<div class="reservation-container">
    <!-- Room Selection Section -->
    <div class="room-selection">
        <h1>Select A Room</h1>
        <div>
            <h2 class="available-rooms-title">Available Rooms</h2>
            <div class="rooms-grid">

                @foreach($availableRooms as $room)
                    <div class="room-card" onclick="selectedRoom(this)" data-room-id="{{$room->id}}" data-room-name="{{$room->room_name}}">
                        <h2>{{$room->room_name}}</h2>
                        <p>{{$room->details->adult ?? 'N/A'}} Adults</p>
                        <p>{{$room->details->child ?? 'N/A'}} Children</p>
                        <p class="price">LKR {{$room->price}}</p>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    <!-- Booking Form -->
    <div class="booking form">
        <form id="booking-form" method="POST" action="{{route('admin.book.submit', $room->id)}}" class="mb-5">
            @csrf
            <h2 class="responsive-heading">Book Room:<span id="selected-room-name"></span></h2>
            <input type="hidden" name="room_id" id="room_id" value="">

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" class="form-control" name="first_name" id="first_name" required pattern="[A-Za-z\s]+" title="Only letters and spaces allowed">
                    <div class="invalid-feedback">Please enter a valid first name (letters only).</div>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" name="last_name" id="last_name" required pattern="[A-Za-z\s]+" title="Only letters and spaces allowed">
                    <div class="invalid-feedback">Please enter a valid last name (letters only).</div>
                </div>
            </div>

            <div class="mb-3">
                <label for="nic" class="form-label">Your NIC number</label>
                <input type="text" class="form-control" name="nic" id="nic" required pattern="^\d{9}[vVxX]|\d{12}$">
                <div class="invalid-feedback">Please enter a valid NIC (e.g., 123456789V or 200012345678).</div>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Your Email</label>
                <input type="email" class="form-control" name="email" id="email" required>
                <div class="invalid-feedback">Please enter a valid email address.</div>
            </div>

            <div class="mb-3">
                <label for="contact" class="form-label">Your Contact number</label>
                <input type="tel" class="form-control" id="contact" name="contact" required pattern="^0\d{9}$">
                <div class="invalid-feedback">Contact must be 10 digits starting with 0.</div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="checkin_datetime" class="form-label">Check-in Date & Time</label>
                    <input 
                        type="datetime-local" 
                        id="checkin_datetime" 
                        name="checkin_datetime" 
                        class="form-control" 
                        required 
                        value="{{ old('checkin_datetime') }}"
                    >
                    <div class="invalid-feedback">Check-in date is required.</div>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="checkout_datetime" class="form-label">Check-out Date & Time</label>
                    <input 
                        type="datetime-local" 
                        id="checkout_datetime" 
                        name="checkout_datetime" 
                        class="form-control" 
                        required 
                        value="{{ old('checkout_datetime') }}"
                    >
                    <div class="invalid-feedback">Check-out must be after check-in.</div>
                </div>
            </div>


            <div class="row">
                <!-- Adults -->
                <div class="col-md-6 mb-3">
                    <label for="adults" class="form-label">Adults</label>
                    <input type="number" class="form-control" name="adults" id="adults" min="1" value="1" required>
                    <div class="invalid-feedback">At least one adult is required. Total guests (adults + children) must be less than 10.</div>
                </div>

                <!-- Children -->
                <div class="col-md-6 mb-3">
                    <label for="children" class="form-label">Children</label>
                    <input type="number" class="form-control" name="children" id="children" min="0" value="0" required>
                    <div class="invalid-feedback">Total guests (adults + children) must be less than 10.</div>
                </div>
            </div>

            <!-- Meal Plan Section -->
            <div class="meal-plan-section mb-3">
                <label class="form-label">Meal Plan</label>
                
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
                    <label class="form-check-label" for="mealSpecialDinner">Special Dinner (Rs. 1,200)</label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="meals[]" value="kids_meal" id="mealKidsMeal">
                    <label class="form-check-label" for="mealKidsMeal">Kids Meal (Rs. 400)</label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit Booking</button>
        </form>
    </div>
</div>


<script>

    function selectedRoom(element) {
        const roomId = element.getAttribute('data-room-id');
        const roomName = element.getAttribute('data-room-name');

        // Set values in form
        document.getElementById('room_id').value = roomId;
        document.getElementById('selected-room-name').textContent = roomName;

        // Scroll to the form smoothly
        document.querySelector('.booking.form').scrollIntoView({
            behavior: 'smooth'
        });

        document.querySelectorAll('.room-card').forEach(card => card.classList.remove('selected'));
        element.classList.add('selected');
    }




</script>


@endsection