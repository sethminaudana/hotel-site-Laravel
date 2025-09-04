<head>
    <!-- Bootstrap 5.3 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{url('css/admin.css')}}">
    <link rel="stylesheet" href="{{url('css/admin-reservations.css')}}">
    {{-- <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}"> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#3367D6">

</head>

<body>


    <div class="admin-container">
        <button class="mobile-menu-btn" id="mobile-btn" onclick="toggleSidebar()">
            <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path d="M3 12h18m-9 9l9-9-9-9" />
            </svg>
        </button>
        <!-- Sidebar -->
        <nav class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <span>
                    @auth
                        @if(Auth::user()->role && Auth::user()->role->access === 'full')
                            <span>

                                <h1>🔑 Super Admin Panel</h1>
                                <p>Management Dashboard</p>
                                
                            </span>
                        @else

                            <span>

                                <h1>🔒Limited Admin Panel</h1>
                                <p>Management Dashboard</p>

                            </span>

                        @endif
                    @else
                    @endauth
                </span>
                <header class="admin-header">
                    <div class="header-right">
                        <div id="notification-bell" class="notification-bell">
                            <a href="{{ url('/notifications') }}">
                                🔔
                                <span id="notification-badge" class="badge hidden">new</span></a>
                        </div>
                    </div>
                </header>
            </div>
            <div class="nav-menu">
                <span>
                    @auth
                        @if(Auth::user()->role && Auth::user()->role->access === 'full')
                            <span>
                                <div class="nav-item">
                                    <a href="{{ url('/admin') }}" class="nav-link {{ Request::is('admin') ? 'active' : '' }}">
                                        <svg class="nav-icon" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z" />
                                        </svg>
                                        Dashboard
                                    </a>
                                </div>

                                <div class="nav-item">
                                    <a href="{{ url('/admin-profile') }}"
                                        class="nav-link {{ Request::is('admin-profile') ? 'active' : '' }}">
                                        <svg class="nav-icon" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                                        </svg>
                                        Profile
                                    </a>
                                </div>

                                <div class="nav-item">
                                    <a href="{{ url('/user-registration') }}"
                                        class="nav-link {{ Request::is('user-registration') ? 'active' : '' }}">
                                        <svg class="nav-icon" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M16 4c0-1.11.89-2 2-2s2 .89 2 2-.89 2-2 2-2-.89-2-2zM4 18v-4h3v4h2v-7.5c0-.83.67-1.5 1.5-1.5S12 9.67 12 10.5V11h2v-1.5c0-1.93-1.57-3.5-3.5-3.5S7 7.57 7 9.5V11H4c-1.11 0-2 .89-2 2v5h2z" />
                                        </svg>
                                        Admin Registration
                                    </a>
                                </div>

                                <div class="nav-item">
                                    <a href="{{ url('/user-management') }}"
                                        class="nav-link {{ Request::is('user-management') ? 'active' : '' }}">
                                        <svg class="nav-icon" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M16 4c0-1.11.89-2 2-2s2 .89 2 2-.89 2-2 2-2-.89-2-2zM4 18v-4h3v4h2v-7.5c0-.83.67-1.5 1.5-1.5S12 9.67 12 10.5V11h2v-1.5c0-1.93-1.57-3.5-3.5-3.5S7 7.57 7 9.5V11H4c-1.11 0-2 .89-2 2v5h2z" />
                                        </svg>
                                        User Managements
                                    </a>
                                </div>

                                <div class="nav-item">
                                    <a href="{{ url('/manage-rooms') }}"
                                        class="nav-link {{ Request::is('manage-rooms') ? 'active' : '' }}">
                                        <svg class="nav-icon" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                        </svg>
                                        Manage Rooms
                                    </a>
                                </div>

                                <div class="nav-item">
                                    <a href="{{ url('/manage-foods') }}"
                                        class="nav-link {{ Request::is('manage-foods') ? 'active' : '' }}">
                                        <svg class="nav-icon" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M18.06 22.99h1.66c.84 0 1.53-.64 1.63-1.46L23 5.05h-5V1h-1.97v4.05h-4.97l.3 2.34c1.71.47 3.31 1.32 4.27 2.26 1.44 1.42 2.43 2.89 2.43 5.29v8.05zM1 21.99V21h15.03v.99c0 .55-.45 1-1.01 1H2.01c-.56 0-1.01-.45-1.01-1z" />
                                        </svg>
                                        Manage Foods
                                    </a>
                                </div>

                                <div class="nav-item">
                                    <a href="{{url('/manage-offers')}}" class="nav-link {{ Request::is('manage-offers') ? 'active' : '' }}">
                                        <svg class="nav-icon" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M20.59 13.41 11 3.83V3H4v7h.83l9.58 9.59a2 2 0 0 0 2.83 0l3.34-3.34a2 2 0 0 0 0-2.83ZM6 8V6h2v2H6Zm8.29 10.29-9-9L7.59 6H9v1.41l9 9-3.71 3.71ZM18 8a1 1 0 1 0 0-2 1 1 0 0 0 0 2Zm-9.71 7.29a1 1 0 1 0 1.42 1.42l6-6a1 1 0 0 0-1.42-1.42l-6 6Z"/>
                                        </svg>
                                        Manage Offers
                                    </a>
                                </div>

                                <div class="nav-item">
                                    <a href="{{url('/manage-blogs')}}" class="nav-link {{ Request::is('manage-blogs') ? 'active' : '' }}">
                                        <svg class="nav-icon" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 2 2h8c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z" />
                                        </svg>
                                        Manage Blogs
                                    </a>
                                </div>

                                <div class="nav-item">
                                    <a href="{{url('/admin-reservations')}}" class="nav-link {{ Request::is('admin-reservations') ? 'active' : '' }}">
                                        <svg class="nav-icon" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 2 2h8c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z" />
                                        </svg>
                                        Admin Reservations
                                    </a>
                                </div>




                                <div class="nav-item">
                                    <a href="{{ url('/manage-reservations') }}" class="nav-link {{ Request::is('manage-reservations') ? 'active' : '' }}">
                                        <svg class="nav-icon" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M19 3h-1V1h-2v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V8h14v11zM7 10h5v5H7z" />
                                        </svg>
                                        Manage Reservations
                                    </a>
                                </div>

                                <div class="nav-item">
                                    <a href="{{ url('/manage-contacts') }}"
                                        class="nav-link {{ Request::is('manage-contacts') ? 'active' : '' }}">
                                        <svg class="nav-icon" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
                                        </svg>
                                        Manage Contacts
                                    </a>
                                </div>

                                {{-- <div class="nav-item">
                                    <a href="{{url('/role-permission')}}" class="nav-link {{ Request::is('role-permission') ? 'active' : '' }}">
                                        <svg class="nav-icon" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M19 3h-1V1h-2v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V8h14v11zM7 10h5v5H7z"/>
                                        </svg>
                                        Role & Permission Manager
                                    </a>
                                </div>

                                --}}
                                <div class="nav-item">
                                    <a href="{{ url('/notifications') }}"
                                        class="nav-link {{ Request::is('notifications') ? 'active' : '' }}">
                                        <svg class="nav-icon" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.89 2 2 2zm6-6v-5c0-3.07-1.64-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.63 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2z" />
                                        </svg>
                                        Notifications
                                    </a>
                                </div>

                                <div class="nav-item">

                                {{-- <div class="nav-item">
                                    <a href="{{url('/reports')}}" class="nav-link {{ Request::is('reports') ? 'active' : '' }}">
                                        <svg class="nav-icon" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                                        </svg>
                                        Reports
                                    </a>
                                </div>


                                <div class="nav-item">
                                --}}

                                <div class="nav-item">
                                    <a href="{{url('/settings')}}" class="nav-link {{ Request::is('settings') ? 'active' : '' }}">
                                        <svg class="nav-icon" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M19.14,12.94c0.04-0.3,0.06-0.61,0.06-0.94c0-0.32-0.02-0.64-0.07-0.94l2.03-1.58c0.18-0.14,0.23-0.41,0.12-0.61 l-1.92-3.32c-0.12-0.22-0.37-0.29-0.59-0.22l-2.39,0.96c-0.5-0.38-1.03-0.7-1.62-0.94L14.4,2.81c-0.04-0.24-0.24-0.41-0.48-0.41 h-3.84c-0.24,0-0.43,0.17-0.47,0.41L9.25,5.35C8.66,5.59,8.12,5.92,7.63,6.29L5.24,5.33c-0.22-0.08-0.47,0-0.59,0.22L2.74,8.87 C2.62,9.08,2.66,9.34,2.86,9.48l2.03,1.58C4.84,11.36,4.8,11.69,4.8,12s0.02,0.64,0.07,0.94l-2.03,1.58 c-0.18,0.14-0.23,0.41-0.12,0.61l1.92,3.32c0.12,0.22,0.37,0.29,0.59,0.22l2.39-0.96c0.5,0.38,1.03,0.7,1.62,0.94l0.36,2.54 c0.05,0.24,0.24,0.41,0.48,0.41h3.84c0.24,0,0.44-0.17,0.47-0.41l0.36-2.54c0.59-0.24,1.13-0.56,1.62-0.94l2.39,0.96 c0.22,0.08,0.47,0,0.59-0.22l1.92-3.32c0.12-0.22,0.07-0.47-0.12-0.61L19.14,12.94z M12,15.6c-1.98,0-3.6-1.62-3.6-3.6 s1.62-3.6,3.6-3.6s3.6,1.62,3.6,3.6S13.98,15.6,12,15.6z" />
                                        </svg>
                                        Settings
                                    </a>
                                </div>

                                
                            </span>
                        @else
                            <span> 

                                <div class="nav-item">
                                    <a href="{{ url('/admin') }}" class="nav-link {{ Request::is('admin') ? 'active' : '' }}">
                                        <svg class="nav-icon" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z" />
                                        </svg>
                                        Dashboard
                                    </a>
                                </div>


                                <div class="nav-item">
                                    <a href="{{ url('/user-management') }}"
                                        class="nav-link {{ Request::is('user-management') ? 'active' : '' }}">
                                        <svg class="nav-icon" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M16 4c0-1.11.89-2 2-2s2 .89 2 2-.89 2-2 2-2-.89-2-2zM4 18v-4h3v4h2v-7.5c0-.83.67-1.5 1.5-1.5S12 9.67 12 10.5V11h2v-1.5c0-1.93-1.57-3.5-3.5-3.5S7 7.57 7 9.5V11H4c-1.11 0-2 .89-2 2v5h2z" />
                                        </svg>
                                        User Managements
                                    </a>
                                </div>

                                <div class="nav-item">
                                    <a href="{{ url('/manage-rooms') }}"
                                        class="nav-link {{ Request::is('manage-rooms') ? 'active' : '' }}">
                                        <svg class="nav-icon" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                        </svg>
                                        Manage Rooms
                                    </a>
                                </div>

                                <div class="nav-item">
                                    <a href="{{ url('/manage-foods') }}"
                                        class="nav-link {{ Request::is('manage-foods') ? 'active' : '' }}">
                                        <svg class="nav-icon" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M18.06 22.99h1.66c.84 0 1.53-.64 1.63-1.46L23 5.05h-5V1h-1.97v4.05h-4.97l.3 2.34c1.71.47 3.31 1.32 4.27 2.26 1.44 1.42 2.43 2.89 2.43 5.29v8.05zM1 21.99V21h15.03v.99c0 .55-.45 1-1.01 1H2.01c-.56 0-1.01-.45-1.01-1z" />
                                        </svg>
                                        Manage Foods
                                    </a>
                                </div>

                                <div class="nav-item">
                                    <a href="{{url('/manage-offers')}}" class="nav-link {{ Request::is('manage-offers') ? 'active' : '' }}">
                                        <svg class="nav-icon" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M20.59 13.41 11 3.83V3H4v7h.83l9.58 9.59a2 2 0 0 0 2.83 0l3.34-3.34a2 2 0 0 0 0-2.83ZM6 8V6h2v2H6Zm8.29 10.29-9-9L7.59 6H9v1.41l9 9-3.71 3.71ZM18 8a1 1 0 1 0 0-2 1 1 0 0 0 0 2Zm-9.71 7.29a1 1 0 1 0 1.42 1.42l6-6a1 1 0 0 0-1.42-1.42l-6 6Z"/>
                                        </svg>
                                        Manage Offers
                                    </a>
                                </div>

                                {{-- <div class="nav-item"> --}}

                                <div class="nav-item">
                                    <a href="{{url('/manage-blogs')}}" class="nav-link {{ Request::is('manage-blogs') ? 'active' : '' }}">
                                        <svg class="nav-icon" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 2 2h8c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z" />
                                        </svg>
                                        Manage Blogs
                                    </a>
                                </div>


                                <div class="nav-item">
                                    <a href="{{ url('/manage-reservations') }}"
                                        class="nav-link {{ Request::is('manage-reservations') ? 'active' : '' }}">
                                        <svg class="nav-icon" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M19 3h-1V1h-2v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V8h14v11zM7 10h5v5H7z" />
                                        </svg>
                                        Manage Reservations
                                    </a>
                                </div>

                                <div class="nav-item">
                                    <a href="{{ url('/manage-contacts') }}"
                                        class="nav-link {{ Request::is('manage-contacts') ? 'active' : '' }}">
                                        <svg class="nav-icon" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
                                        </svg>
                                        Manage Contacts
                                    </a>
                                </div>

                                {{-- <div class="nav-item">
                                    <a href="{{url('/role-permission')}}" class="nav-link {{ Request::is('role-permission') ? 'active' : '' }}">
                                        <svg class="nav-icon" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M19 3h-1V1h-2v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V8h14v11zM7 10h5v5H7z"/>
                                        </svg>
                                        Role & Permission Manager
                                    </a>
                                </div>

                                --}}
                                <div class="nav-item">
                                    <a href="{{ url('/notifications') }}"
                                        class="nav-link {{ Request::is('notifications') ? 'active' : '' }}">
                                        <svg class="nav-icon" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.89 2 2 2zm6-6v-5c0-3.07-1.64-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.63 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2z" />
                                        </svg>
                                        Notifications
                                    </a>
                                </div>

                                <div class="nav-item">

                                {{-- <div class="nav-item">
                                    <a href="{{url('/reports')}}" class="nav-link {{ Request::is('reports') ? 'active' : '' }}">
                                        <svg class="nav-icon" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                                        </svg>
                                        Reports
                                    </a>
                                </div>


                                <div class="nav-item">
                                --}}


                                
                            </span>
                        @endif
                    @else
                        <span>

                        </span>
                    @endauth
                </span>
            </div>
        </nav>
        <main class="main-content">
            <div>
                @yield('content')
            </div>
        </main>
    </div>
    <!-- Bootstrap 5.3 JS (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- firebase sdk --}}
    <!-- Firebase SDK -->
    <script src="https://www.gstatic.com/firebasejs/10.12.2/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/10.12.2/firebase-messaging-compat.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('js/websocket.js')}}"></script>
    {{-- <script src="{{asset('firebase-messaging-sw.js')}}"></script> --}}

    <script src="{{asset('js/firebase.js')}}"></script>
    <script src="{{asset('js/service-worker.js')}}"></script>
    <script src="{{asset('js/state.js')}}"></script>
    {{-- end of the firebase sdk imports --}}

    <script src="{{ asset('js/admin.js') }}"></script>
    <script src="{{ asset('js/bootstrap-bundle.js') }}"></script>
    <script src="{{ asset('js/websocket-config.js')}}"></script>

    <script>
        let lastCount = 0;

        let audioContext;
        let isPlaying = false;

        // Create context on first interaction
        document.addEventListener('click', () => {
            if (!audioContext) {
                audioContext = new(window.AudioContext || window.webkitAudioContext)();
            }
        }, {
            once: true
        });

        function createBellSound() {
            if (isPlaying || !audioContext) return;

            isPlaying = true;

            const frequencies = [800, 1000, 1200, 1600];
            const duration = 0.8;

            frequencies.forEach((freq, index) => {
                const oscillator = audioContext.createOscillator();
                const gainNode = audioContext.createGain();

                oscillator.connect(gainNode);
                gainNode.connect(audioContext.destination);

                oscillator.frequency.setValueAtTime(freq, audioContext.currentTime);
                oscillator.type = 'sine';

                gainNode.gain.setValueAtTime(0, audioContext.currentTime);
                gainNode.gain.linearRampToValueAtTime(0.1 / (index + 1), audioContext.currentTime + 0.01);
                gainNode.gain.exponentialRampToValueAtTime(0.001, audioContext.currentTime + duration);

                oscillator.start(audioContext.currentTime + index * 0.05);
                oscillator.stop(audioContext.currentTime + duration + index * 0.05);
            });

            setTimeout(() => {
                isPlaying = false;
            }, duration * 1000);
        }




        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('/js/service-worker.js')
                .then(reg => console.log('✅ Service worker registered:', reg))
                .catch(err => console.error('❌ Service worker error:', err));
        }
    </script>

</body>
