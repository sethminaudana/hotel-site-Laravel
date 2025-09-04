@extends('admin.dashboard')
@section('content')

    <!-- Top Header -->
    <header class="top-header">
        <div class="header-content">
            <h1 class="header-title">Notifications</h1>
            <div class="header-actions">
                <button class="clear-read-btn" onclick="clearReadNotifications()">
                    Clear Read (24h+)
                </button>
            </div>
        </div>
    </header>

    <!-- Stats Grid -->
    <div class="stats-grid">
        <div class="stat-card unread">
            <div class="stat-icon">🔔</div>
            <div class="stat-content">
                <div class="stat-number">{{$unreadCount}}</div>
                <div class="stat-label">Unread Notifications</div>
            </div>
        </div>
        <div class="stat-card read">
            <div class="stat-icon">✅</div>
            <div class="stat-content">
                <div class="stat-number">{{$readCount}}</div>
                <div class="stat-label">Read Notifications</div>
            </div>
        </div>
        <div class="stat-card total">
            <div class="stat-icon">📊</div>
            <div class="stat-content">
                <div class="stat-number">{{$totalCount}}</div>
                <div class="stat-label">Total Notifications</div>
            </div>
        </div>
    </div>

    <!-- Notification Sections -->
    <div class="notifications-container">
        <!-- Unread Notifications -->
        <div class="notification-section unread-section">
            <div class="section-header">
                <h3 class="section-title">
                    <span class="section-icon">🔔</span>
                    Unread Notifications
                    @if($unreadCount > 0)
                        <span class="count-badge">{{$unreadCount}}</span>
                    @endif
                </h3>
            </div>
            
            <div class="notification-list" id="unreadNotifications">
                @forelse($unreadNotifications as $notification)

                 <div class="notification-item unread" data-id="{{$notification['id']}}"
                        onclick="markAsReadAndRedirect({{$notification['id']}}, '/manage-reservations')">
                        <div class="notification-content">
                            <div class="notification-icon">
                                <div class="icon-circle new">📋</div>
                            </div>
                            <div class="notification-details">
                                <div class="notification-title">New Reservation</div>
                                <div class="notification-message">
                                    New reservation by <strong>{{$notification['booking_code'] ?? 'guest'}}</strong>
                                </div>
                                <div class="notification-time">{{$notification['created_at']->diffForHumans()}}</div>
                            </div>
                        </div>
                        <div class="notification-actions">
                            <button class="action-btn view-btn" title="View Details">👁️</button>
                        </div>
                        <div class="unread-indicator"></div>
                    </div>
                @empty
                    <div class="empty-state">
                        <div class="empty-icon">🎉</div>
                        <div class="empty-title">All caught up!</div>
                        <div class="empty-message">No unread notifications</div>
                    </div>
                @endforelse


                {{-- @forelse($unreadNotifications as $notification)
                    <div class="notification-item unread" data-id="{{ $notification->id }}" onclick="markAsReadAndRedirect({{ $notification->id }}, '{{ url('manage-reservations') }}')">
                        @csrf
                        <div class="notification-content">
                            <div class="notification-icon">
                                <div class="icon-circle new">📋</div>
                            </div>
                            <div class="notification-details">
                                <div class="notification-title">New Reservation</div>
                                <div class="notification-message">
                                    New reservation by <strong>{{$notification['booking_code'] ?? 'guest'}}</strong>
                                </div>
                                <div class="notification-time">Just now</div>
                            </div>
                        </div>
                        <div class="notification-actions">
                            <button class="action-btn view-btn" title="View Details">👁️</button>
                        </div>
                        <div class="unread-indicator"></div>
                    </div>
                @empty
                    <div class="empty-state">
                        <div class="empty-icon">🎉</div>
                        <div class="empty-title">All caught up!</div>
                        <div class="empty-message">No unread notifications</div>
                    </div>
                @endforelse
                
            </div>
        </div>

        <!-- Read Notifications -->
        <div class="notification-section read-section">
            <div class="section-header">
                <h3 class="section-title">
                    <span class="section-icon">✅</span>
                    Read Notifications
                    @if($readCount > 0)
                        <span class="count-badge read">{{$readCount}}</span>
                    @endif
                </h3>
            </div>

            <div class="notification-list" id="readNotifications">
                @forelse($readNotifications as $notification)
                    <div class="notification-item read" data-id="{{ $notification->id }}">
                        <div class="notification-content">
                            <div class="notification-icon">
                                <div class="icon-circle read">
                                    ✓
                                </div>
                            </div>
                            <div class="notification-details">
                                <div class="notification-title">Reservation Viewed</div>
                                <div class="notification-message">
                                    Reservation by <strong>{{ $notification->customer_name ?? 'Guest' }}</strong> - Already seen
                                </div>
                                <div class="notification-time">
                                    Read {{ $notification->read_at ? \Carbon\Carbon::parse($notification->read_at)->diffForHumans() : 'recently' }}
                                </div>
                            </div>
                        </div>
                        <div class="notification-actions">
                            {{-- <button class="action-btn delete-btn" onclick="deleteNotification({{ $notification->id }})" title="Delete">
                                🗑️
                            </button> --}}
                        </div>
                    </div>
                @empty
                    <div class="empty-state">
                        <div class="empty-icon">📭</div>
                        <div class="empty-title">No read notifications</div>
                        <div class="empty-message">Read notifications will appear here</div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <script>
        // Mark single notification as read and redirect
        function markAsReadAndRedirect(notificationId, redirectUrl) {
            console.log("hello",notificationId);
            fetch(`/notifications/read/${notificationId}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Redirect to the specified URL
                    window.location.href = redirectUrl;
                } else {
                    console.error('Failed to mark notification as read');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                // Still redirect even if marking as read fails
                // window.location.href = redirectUrl;
            });
        }



        // Clear read notifications older than 24 hours
        function clearReadNotifications() {
            if (confirm('Delete all read notifications older than 24 hours?')) {
                fetch('/notifications/clear-old-read', {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showAlert(`Deleted ${data.count} old notifications`, 'success');
                        setTimeout(() => {
                            location.reload();
                        }, 1000);
                    } else {
                        showAlert('Failed to clear old notifications', 'error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showAlert('An error occurred', 'error');
                });
            }
        }

        // Delete single notification
        function deleteNotification(notificationId) {
            event.stopPropagation(); // Prevent triggering parent click

            if (confirm('Delete this notification?')) {
                fetch(`/notifications/${notificationId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Remove the notification item from DOM
                        const notificationItem = document.querySelector(`[data-id="${notificationId}"]`);
                        if (notificationItem) {
                            notificationItem.style.animation = 'slideOut 0.3s ease';
                            setTimeout(() => {
                                notificationItem.remove();
                                updateCounts();
                            }, 300);
                        }
                        showAlert('Notification deleted', 'success');
                    } else {
                        showAlert('Failed to delete notification', 'error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showAlert('An error occurred', 'error');
                });
            }
        }

        // Show alert messages
        function showAlert(message, type) {
            const alertDiv = document.createElement('div');
            alertDiv.className = `alert alert-${type}`;
            alertDiv.textContent = message;

            // Insert at the top of the content
            const content = document.querySelector('.notifications-container');
            content.parentNode.insertBefore(alertDiv, content);

            // Remove after 3 seconds
            setTimeout(() => {
                alertDiv.remove();
            }, 3000);
        }

        // Update notification counts
        function updateCounts() {
            const unreadCount = document.querySelectorAll('.notification-item.unread').length;
            const readCount = document.querySelectorAll('.notification-item.read').length;
            const totalCount = unreadCount + readCount;

            // Update stat cards
            document.querySelector('.stat-card.unread .stat-number').textContent = unreadCount;
            document.querySelector('.stat-card.read .stat-number').textContent = readCount;
            document.querySelector('.stat-card.total .stat-number').textContent = totalCount;

            // Update section badges
            const unreadBadge = document.querySelector('.unread-section .count-badge');
            const readBadge = document.querySelector('.read-section .count-badge');

            if (unreadBadge) {
                unreadBadge.textContent = unreadCount;
                if (unreadCount === 0) unreadBadge.style.display = 'none';
            }

            if (readBadge) {
                readBadge.textContent = readCount;
                if (readCount === 0) readBadge.style.display = 'none';
            }
        }

        // Add slide out animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes slideOut {
                from {
                    opacity: 1;
                    transform: translateX(0);
                }
                to {
                    opacity: 0;
                    transform: translateX(100%);
                }
            }
        `;
        document.head.appendChild(style);

        function updateCounts(){
            const unreadCount = document.querySelectorAll('#unreadNotifications .notification-item.unread').length;
            const readCount = document.querySelectorAll('#readNotifications .notification-item.read').length;
            const totalCount = unreadCount + readCount;

            // Update stat cards
            document.querySelector('.stat-card.unread .stat-number').textContent = unreadCount;
            document.querySelector('.stat-card.read .stat-number').textContent = readCount;
            document.querySelector('.stat-card.total .stat-number').textContent = totalCount;

            // Update section badges
            const unreadBadge = document.querySelector('.unread-section .count-badge');
            const readBadge = document.querySelector('.read-section .count-badge');

            if (unreadBadge) {
                unreadBadge.textContent = unreadCount;
                unreadBadge.style.display = unreadCount === 0 ? 'none' : 'inline-block';
            }

            if (readBadge) {
                readBadge.textContent = readCount;
                readBadge.style.display = readCount === 0 ? 'none' : 'inline-block';
            }
        }



        window.handleFirebaseMessage = function(payload){          
            const data = JSON.parse(payload.data.dataArray);

            //parse required data
            const id = data.id || '1';
            const name = data.first_name || 'Guest';
            const nic = data.nic || 'not found';
            const contact = data.contact || 'not found';
            const email = data.email || 'not found';
            const checkIn = data.checkin_datatime || '';
            const checkOut = data.checkout_datetime || '';

            console.log(id);


            const newHtml = `
                <div class="notification-item unread" data-id="${id}"
                    onclick="markAsReadAndRedirect(${id}, '/manage-reservations')">
                    <div class="notification-content">
                        <div class="notification-icon">
                            <div class="icon-circle new">📋</div>
                        </div>
                        <div class="notification-details">
                            <div class="notification-title">New Reservation</div>
                            <div class="notification-message">
                                New reservation by <strong>${name}</strong><br>
                                Name: ${name}<br>
                                Check-in: ${checkIn}<br>
                                Check-out: ${checkOut}<br>
                            </div>
                            <div class="notification-time">Just now</div>
                        </div>
                    </div>
                    <div class="notification-actions">
                        <button class="action-btn view-btn" title="View Details">👁️</button>
                    </div>
                    <div class="unread-indicator"></div>
                </div>

            `;


            const container = document.getElementById('unreadNotifications');
            container.innerHTML = newHtml + container.innerHTML;


            updateCounts();

            
            

        }







    </script>

@endsection



