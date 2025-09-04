
        {{-- Single Booking by Booking Code --}}
        {{-- @if(request('booking_code') && $booking)
            <div class="result-box">
                <h3>Booking Details</h3>
                <p><strong>Booking Code:</strong> {{ $booking->booking_code }}</p>
                <p><strong>Room:</strong> {{ $booking->room->name ?? 'N/A' }}</p>
                <p><strong>Status:</strong> {{ $booking->payment_status }}</p>
                <p><strong>Date:</strong> {{ $booking->created_at->toFormattedDateString() }}</p>
            </div>
        @elseif(request('booking_code') && !$booking)
            <p class="error-text">No booking found with this booking code.</p>
        @endif


        @if(request('nic') && !$booking)
            @if($reservations && count($reservations->count()))
                <div class="result-box">
                    <h3>All Reservations for NIC: {{ request('nic') }}</h3>
                    <ul>
                        <pre>{{ dd($reservations) }}</pre>
                        @foreach($reservations as $res)
                            <li style="margin-bottom: 10px;">
                                <strong>Code:</strong> {{ $res->booking_code }} |
                                <strong>Room:</strong> {{ $res->room->name ?? 'N/A' }} |
                                <strong>Status:</strong> {{ $res->payment_status }} |
                                <strong>Date:</strong> {{ $res->created_at->toFormattedDateString() }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @else
                <p class="error-text">No reservations found for this NIC.</p>
            @endif
        @endif --}}


@if($booking)
    <div class="result-box card shadow-sm mb-4">
        <div class="card-body">
       <h4 class="card-title text-success mb-3">Booking Details</h4>
        <p class="mb-2"><strong>Booking Code:</strong> {{ $booking->booking_code }}</p>
        <p class="mb-2"><strong>Room:</strong> {{ $booking->room->room_name ?? 'N/A' }}</p>
        <p class="mb-2"><strong>Status:</strong> {{ $booking->payment_status }}</p>
        <p class="mb-2"><strong>Date:</strong> {{ $booking->created_at->toFormattedDateString() }}</p>
        </div>
    </div>
@elseif($reservations && $reservations->count())
    <div class="result-box card shadow-sm mb-4">
        <div class="card-body">
         <h4 class="card-title text-primary mb-3">All Reservations for NIC</h4>
        <ul class="list-group list-group-flush">
            @foreach($reservations as $res)

                <li class="list-group-item d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                    <strong>Code:</strong> {{ $res->booking_code }}
                    <strong>Room:</strong> {{ $res->room->room_name ?? 'N/A' }}
                    <strong>Status:</strong> {{ $res->payment_status }}
                    <strong>Date:</strong> {{ $res->created_at->toFormattedDateString() }}
                </li>
                <br>
            @endforeach
        </ul>
        </div>
    </div>
@else
    <div class="alert alert-danger text-center mt-3">
        No bookings or reservations found.
    </div>
@endif
