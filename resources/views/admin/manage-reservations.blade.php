@extends('admin.dashboard')
@section('content')

    <!-- Top Header -->
    <header class="top-header">
        <div class="header-content">
            <h1 class="header-title">Manage Reservations</h1>
        </div>
    </header>

    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif

    <div class="container mt-4">
    <h3>Search Reservations</h3>
    <form method="GET" action="{{ route('admin.reservations.search') }}" class="row g-3 mb-4">
        <div class="col-md-4">
            <input type="text" name="booking_code" value="{{ request('booking_code') }}" class="form-control" placeholder="Booking Code">
        </div>
        <div class="col-md-4">
            <input type="text" name="nic" value="{{ request('nic') }}" class="form-control" placeholder="NIC">
        </div>
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary">Search</button>
            <a href="{{ url('/manage-reservations') }}" class="btn btn-secondary ms-2">Clear</a>
        </div>
    </form>


</div>


    <!-- Content Area -->
<div class="content-area">

    {{-- <div class="welcome-card">
        <div class="welcome-message">
            Hello ADMIN! You're logged in!
        </div>
        <p style="color: #64748b;">Welcome to your administrative dashboard. Manage your application from here.</p>
    </div> --}}

    <!-- Stats Grid -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-number">{{$pendingCount ?? 0}}</div>
            <div class="stat-label">Pending Reservations</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">{{$confirmedCount??0}}</div>
            <div class="stat-label">Confirmed Reservations</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">{{$totalCount ?? 0}}</div>
            <div class="stat-label">Total Reservations</div>
        </div>

    </div>



    <div class="reservations-container">
        @if(request()->has('booking_code') || request()->has('nic'))
            <div class="reservations-grid">
                @if(isset($reservations) && $reservations->isNotEmpty())
                    @foreach($reservations as $res)
                        <div class="reservation-card" onclick="openModal({{ $res->id }})">
                            <div class="reservation-summary">
                                <div class="room-name">{{ $res->room->room_name }}</div>
                                <div class="reservation-dates">
                                    {{ \Carbon\Carbon::parse($res->checkInDate)->format('M d, Y') }} -
                                    {{ \Carbon\Carbon::parse($res->checkOutDate)->format('M d, Y') }}
                                </div>
                                <div class="reservation-price">LKR {{ number_format($res->price, 2) }}</div>
                                <div class="reservation-guests">
                                    {{ $res->adult }} Adult{{ $res->adult > 1 ? 's' : '' }}
                                    @if($res->child > 0)
                                        , {{ $res->child }} Child{{ $res->child > 1 ? 'ren' : '' }}
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="alert alert-warning">No reservations found for your search.</div>
                @endif
            </div>
        @else



            {{-- PENDING RESERVATIONS --}}
            <div class="reservation-section">
                <div class="section-header pending">
                    <h2 class="section-title">Pending Reservations</h2>
                    <div class="status-badge pending">Pending</div>
                </div>
                <div class="reservations-grid">
                    @forelse($pendingReservations ?? [] as $reservation)
                        <div class="reservation-card" onclick="openModal({{ $reservation->id }})">
                            <div class="reservation-summary">
                                <div class="room-name">{{ $reservation->room->room_name }}</div>
                                 <div class="reservation-dates">{{$reservation->booking_code}}</div>
                                <div class="reservation-dates">
                                    {{ \Carbon\Carbon::parse($reservation->checkInDate)->format('M d, Y') }} -
                                    {{ \Carbon\Carbon::parse($reservation->checkOutDate)->format('M d, Y') }}
                                </div>
                                <div class="reservation-price">LKR {{ number_format($reservation->price, 2) }}</div>
                                <div class="reservation-guests">
                                    {{ $reservation->adult }} Adult{{ $reservation->adult > 1 ? 's' : '' }}
                                    @if($reservation->child > 0)
                                        , {{ $reservation->child }} Child{{ $reservation->child > 1 ? 'ren' : '' }}
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty


                        <div class="no-reservations">
                            <div class="no-reservations-icon">📅</div>
                            <p>No pending reservations</p>
                        </div>
                    @endforelse

                    
                    {{-- pagination --}}
                    <div id="paginationControls" class="pagination-controls"></div>
                </div>
            </div>

            {{-- CONFIRMED RESERVATIONS --}}
            <div class="reservation-section">
                <div class="section-header confirmed">
                    <h2 class="section-title">Confirmed Reservations</h2>
                    <div class="status-badge confirmed">Confirmed</div>
                </div>
                <div class="reservations-grid">
                    @forelse($confirmedReservations ?? [] as $reservation)
                        <div class="reservation-card" onclick="openModal({{ $reservation->id }})">
                            <div class="reservation-summary">
                                <div class="room-name">{{ $reservation->room->room_name }}</div>
                                <div class="reservation-dates">{{$reservation->booking_code}}</div>
                                <div class="reservation-dates">
                                    {{ \Carbon\Carbon::parse($reservation->checkInDate)->format('M d, Y') }} -
                                    {{ \Carbon\Carbon::parse($reservation->checkOutDate)->format('M d, Y') }}
                                </div>
                                <div class="reservation-price">LKR {{ number_format($reservation->price, 2) }}</div>
                                <div class="reservation-guests">
                                    {{ $reservation->adult }} Adult{{ $reservation->adult > 1 ? 's' : '' }}
                                    @if($reservation->child > 0)
                                        , {{ $reservation->child }} Child{{ $reservation->child > 1 ? 'ren' : '' }}
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="no-reservations">
                            <div class="no-reservations-icon">✅</div>
                            <p>No confirmed reservations</p>
                        </div>
                    @endforelse
                </div>
            </div>




        @endif
    </div>








</div>

<div class="reservation-modal-overlay" id="reservationModal">
    <div class="reservation-modal">
        <div class="modal-header">
            <h2 class="modal-title">Reservation Details</h2>
            <button class="close-btn" onclick="closeModal()">&times;</button>
        </div>
        <div class="modal-body" id="modalContent">
            <!-- Modal content will be populated dynamically -->
        </div>
    </div>
</div>

<script>
     // Modal functionality
    function openModal(reservationId) {
        // You can add AJAX call here to fetch reservation details
        // For now, just show the modal
        document.getElementById('reservationModal').classList.add('active');

        // You can populate modal content with reservation data
        // This is where you'd make an AJAX call to get full reservation details
        populateModal(reservationId);
    }

    function closeModal() {
        document.getElementById('reservationModal').classList.remove('active');
    }

    function populateModal(reservationId) {
        // const modalContent = document.getElementById('modalContent');
        fetch(`/manage-reservations/${reservationId}`)
            .then(response=>{
                if(!response.ok){
                    throw new Error("Failed to fetch reservation data");
                }
                return response.json();
            })
            .then(data => {
                const modalContent = document.getElementById('modalContent');

                modalContent.innerHTML = `
                                        <div class="detail-section">
                                            <h3>Booking Code</h3>
                                            <div class="detail-grid">
                                                <div class="detail-item">
                                                    <div class="detail-label">${data.booking_code}</div>
                                                    <div class="detail-value"></div>
                                                </div>

                                            </div>
                                            <h3>Room Information</h3>
                                            <div class="detail-grid">
                                                <div class="detail-item">
                                                    <div class="detail-label">Room Name</div>
                                                    <div class="detail-value">${data.room.room_name}</div>
                                                </div>
                                                <div class="detail-item">
                                                    <div class="detail-label">Total Price</div>
                                                    <div class="bill-row bill-item">
                                                        <span class="bill-label">Total Room Price(${data.numDays})</span>
                                                        <span class="bill-value">${data.roomPrice}</span>
                                                    </div> 
                                                    <div class="bill-row bill-item">
                                                        <span class="bill-label">Total Meal Price</span>
                                                        <span class="bill-value">${data.mealPrice}</span>
                                                    </div>
                                                    <div class="bill-row bill-total">
                                                        <span class="bill-label">Total Price</span>
                                                        <span class="bill-value">LKR ${Number(data.price).toFixed(2)}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="detail-section">
                                            <h3>Reservation Details</h3>
                                            <div class="detail-grid">
                                                <div class="detail-item">
                                                    <div class="detail-label">Check-in Date</div>
                                                    <div class="detail-value">${data.checkInDate}</div>
                                                </div>
                                                <div class="detail-item">
                                                    <div class="detail-label">Check-out Date</div>
                                                    <div class="detail-value">${data.checkOutDate}</div>
                                                </div>
                                                <div class="detail-item">
                                                    <div class="detail-label">Check-in Time</div>
                                                    <div class="detail-value">${data.checkInTime}</div>
                                                </div>
                                                <div class="detail-item">
                                                    <div class="detail-label">Check-out Time</div>
                                                    <div class="detail-value">${data.checkOutTime}</div>
                                                </div>
                                                <div class="detail-item">
                                                    <div class="detail-label">Adults</div>
                                                    <div class="detail-value">${data.adult}</div>
                                                </div>
                                                <div class="detail-item">
                                                    <div class="detail-label">Children</div>
                                                    <div class="detail-value">${data.child}</div>
                                                </div>
                                                <div class="detail-item">
                                                    <div class="detail-label">Meal Plan</div>
                                                    <div class="detail-value">${data.formatted_meal_plan}</div>
                                                </div>
                                                <div class="detail-item">
                                                    <div class="detail-label">Payment Status</div>
                                                    <div class="detail-value">${data.payment_status}</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="detail-section">
                                            <h3>Customer Information</h3>
                                            <div class="detail-grid">
                                                <div class="detail-item">
                                                    <div class="detail-label">Full Name</div>
                                                    <div class="detail-value">${data.user.fname} ${data.user.lname}</div>
                                                </div>
                                                <div class="detail-item">
                                                    <div class="detail-label">Email</div>
                                                    <div class="detail-value">${data.user.email}</div>
                                                </div>
                                                <div class="detail-item">
                                                    <div class="detail-label">Phone Number</div>
                                                    <div class="detail-value">${data.user.number}</div>
                                                </div>
                                                <div class="detail-item">
                                                    <div class="detail-label">NIC</div>
                                                    <div class="detail-value">${data.user.nic}</div>
                                                </div>
                                            </div>
                                        </div>


                                        <span>
                                            @auth
                                                @if(Auth::user()->role && Auth::user()->role->access === 'full')
                                                    <span>

                                                        <div class="detail-section">
                                                            <h3>Update Status</h3>
                                                            <div class="status-update">
                                                                <form method="POST" action="/manage-reservations/update-status">
                                                                    @csrf
                                                                    <h4>Status</h4>
                                                                    <input type="hidden" name="reservation_id" value="${reservationId}">
                                                                    <select name="status" class="status-select" required>
                                                                        <option value="pending">Pending</option>
                                                                        <option value="confirmed">Confirmed</option>
                                                                        <option value="cancelled">Cancel Reservation</option>
                                                                    </select>

                                                                    <h4>Payment Status</h4>
                                                                    <select name="payment_status" class="status-select" required>
                                                                        <option value="pending">Pending</option>
                                                                        <option value="paid">Paid</option>
                                                                    </select>
                                                                    <button type="submit" class="update-btn">Update Status</button>
                                                                </form>
                                                            </div>

                                                        </div>
                                                        
                                                    </span>
                                                @else

                                                @endif
                                            @else
                                            @endauth
                                        </span>


                                    `;
            })

    }

    // Close modal when clicking outside
    document.getElementById('reservationModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
        }
    });

    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeModal();
        }
    });





      const pageSize = 10; // cards per page
    let currentPage = 1;

    function paginateReservations() {
        const cards = document.querySelectorAll('.reservation-card');
        const totalPages = Math.ceil(cards.length / pageSize);

        // Show/hide cards based on current page
        cards.forEach((card, index) => {
            const start = (currentPage - 1) * pageSize;
            const end = currentPage * pageSize;
            card.style.display = (index >= start && index < end) ? 'block' : 'none';
        });

        // Render pagination buttons
        const paginationControls = document.getElementById('paginationControls');
        paginationControls.innerHTML = ''; // Clear previous buttons

        for (let i = 1; i <= totalPages; i++) {
            const btn = document.createElement('button');
            btn.innerText = i;
            btn.className = (i === currentPage) ? 'active-page' : '';
            btn.addEventListener('click', () => {
                currentPage = i;
                paginateReservations();
            });
            paginationControls.appendChild(btn);
        }
    }

    // Initial call after page load
    document.addEventListener('DOMContentLoaded', paginateReservations);
</script>

@endsection
