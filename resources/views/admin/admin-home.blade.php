@extends('admin.dashboard')
@section('content')
<!-- Main Content -->

<!-- Top Header -->
<header class="top-header">
    <div class="header-content">
        <h1 class="header-title">Dashboard</h1>
    </div>
        @auth
            @php
                $userInitial = strtoupper(Auth::user()->name[0]);
            @endphp

            {{-- user circle dropdown --}}
            <div class="drop">
                <button class="avatar-btn" type="button" data-bs-toggle="dropdown" id="userDropdown" aria-expanded="true">
                   <span class="user-initial"> {{$userInitial}} </span>
                </button>

                <ul class="dropdown-menu dropdown-menu-end mt-2" id="dropdownMenu">
                    <li><a class="dropdown-item" href="{{ url('/admin-profile') }}"><i class="fas fa-user"></i> Profile</a></li>
                    <div style="border-top: 1px solid rgba(0,0,0,0.1); margin: 8px 0;"></div>
                    <li>
                        <form id="logout-form" method="POST" action="{{ route('logout') }}" class="logout-form">
                            @csrf
                            <button class="dropdown-item logout-btn" id="logout-btn" type="submit"><i class="fas fa-sign-out-alt"></i>Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
            {{-- <a 
                href="{{ url('/dashboard') }}"
                class="bd-btn register-btn"
            >
            Dashboard
            <span><i class="fa-regular fa-arrow-right-long"></i></span>
            </a> --}}
        @endauth
</header>

<!-- Content Area -->
<div class="content-area">
    <div class="welcome-card">
        <div class="welcome-message">
            @php
                $adminName = strtoupper(Auth::user()->name);
            @endphp
            Hello {{$adminName}}! You're logged in!
        </div>
        <p style="color: #64748b;">Welcome to administrative dashboard. Manage your application from here.</p>
    </div>

    <!-- Stats Grid -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-number">{{$totalAdmins ?? 0}}</div>
            <div class="stat-label">Total Admins</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">{{$totalRooms ?? 0}}</div>
            <div class="stat-label">Total Rooms</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">{{$totalPendingReservations}}</div>
            <div class="stat-label">Pending Reservations</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">{{$totalPendingNotifications}}</div>
            <div class="stat-label">Unread Notifications</div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dropdownBtn = document.getElementById('userDropdown');
        const dropdownMenu = document.getElementById('dropdownMenu');
        let isOpen = false;

        // Toggle dropdown when clicking the avatar
        dropdownBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            toggleDropdown();
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!dropdownBtn.contains(e.target) && !dropdownMenu.contains(e.target)) {
                closeDropdown();
            }
        });

        // Prevent dropdown from closing when clicking inside it
        dropdownMenu.addEventListener('click', function(e) {
            e.stopPropagation();
        });

        // Handle keyboard navigation
        dropdownBtn.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                toggleDropdown();
            } else if (e.key === 'Escape') {
                closeDropdown();
            }
        });

        function toggleDropdown() {
            if (isOpen) {
                closeDropdown();
            } else {
                openDropdown();
            }
        }

        function openDropdown() {
            isOpen = true;
            dropdownBtn.classList.add('active');
            dropdownMenu.classList.add('show');
            dropdownBtn.setAttribute('aria-expanded', 'true');
            
            // Focus first menu item for accessibility
            const firstItem = dropdownMenu.querySelector('.dropdown-item');
            if (firstItem) {
                setTimeout(() => firstItem.focus(), 100);
            }
        }

        function closeDropdown() {
            isOpen = false;
            dropdownBtn.classList.remove('active');
            dropdownMenu.classList.remove('show');
            dropdownBtn.setAttribute('aria-expanded', 'false');
        }

        // Handle dropdown item navigation with arrow keys
        const dropdownItems = dropdownMenu.querySelectorAll('.dropdown-item');
        dropdownItems.forEach((item, index) => {
            item.addEventListener('keydown', function(e) {
                if (e.key === 'ArrowDown') {
                    e.preventDefault();
                    const nextIndex = (index + 1) % dropdownItems.length;
                    dropdownItems[nextIndex].focus();
                } else if (e.key === 'ArrowUp') {
                    e.preventDefault();
                    const prevIndex = index === 0 ? dropdownItems.length - 1 : index - 1;
                    dropdownItems[prevIndex].focus();
                } else if (e.key === 'Escape') {
                    closeDropdown();
                    dropdownBtn.focus();
                }
            });
        });



        // Demo: Handle profile link
        // const profileLink = document.querySelector('a[href="#profile"]');
        // profileLink.addEventListener('click', function(e) {
        //     e.preventDefault();
        //     alert('Profile clicked! In real app, this would navigate to profile page.');
        //     closeDropdown();
        // });


        document.getElementById('logout-btn').addEventListener('click', async function (params) {
            params.preventDefault();

            await removeFirebaseTokenOnLogout(); 
            document.getElementById('logout-form').submit();
        });


    });
</script>
@endsection
