@forelse($unreadNotifications as $notification)
    <div class="notification-item unread" data-id="{{ $notification->id }}"
        onclick="markAsReadAndRedirect({{ $notification->id }}, '{{ url('manage-reservations') }}')">
        <div class="notification-content">
            <div class="notification-icon">
                <div class="icon-circle new">📋</div>
            </div>
            <div class="notification-details">
                <div class="notification-title">New Reservation</div>
                <div class="notification-message">
                    New reservation by <strong>{{ $notification->customer_name ?? 'Guest' }}</strong>
                </div>
                <div class="notification-time">
                    {{ $notification->created_at ? $notification->created_at->diffForHumans() : 'Just now' }}
                </div>
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
