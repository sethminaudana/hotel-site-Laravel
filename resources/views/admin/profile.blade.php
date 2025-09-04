@extends('admin.dashboard')
@section('content')

<!-- Top Header -->
<header class="top-header">
    <div class="header-content">
        <h1 class="header-title">Profile</h1>
    </div>
</header>

@if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif


<!-- Stats Grid -->
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-number">{{ $fullAccessCount ?? 0 }}</div>
        <div class="stat-label">Full Access Admins</div>
    </div>
    <div class="stat-card">
        <div class="stat-number">{{ $viewAccessCount ?? 0 }}</div>
        <div class="stat-label">View Only Admins</div>
    </div>
</div>

<br>

@php
    $user = Auth::user();
    $userId = $user->id;
@endphp

<div class="container">
    <!-- Profile Section -->
    <div class="profile-section">
        <div class="profile-header">
            <div class="profile-image-container">
                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=crop&w=1000&q=80" alt="Profile" class="profile-image">
            </div>
            <div class="profile-info">
                <h2>{{ strtoupper($user->name) }}</h2>
                <span class="status-badge status-active">Active</span>
                <div class="profile-email">{{ $user->email }}</div>
            </div>
        </div>
        <div class="profile-actions">
            <button class="profile-btn p-btn-primary" onclick="openEditModal({{ $userId }})">Edit Profile</button>
        </div>
    </div>

    <!-- Admin Lists -->
    <div class="access-sections">
        <!-- Full Access -->
        <h3 class="p-section-title">Full Access Admins</h3>
        <div class="admin-grid">
            @forelse ($fullAccess as $admin)
                <div class="admin-card">
                    <div class="admin-header">
                        <button class="admin-avatar">
                            <span class="user-initial">{{ strtoupper($admin->name[0]) }}</span>
                        </button>
                        <div class="admin-details">
                            <h4>{{ $admin->name }}</h4>
                            <p>{{ $admin->email }}</p>
                        </div>
                    </div>
                    <span class="access-level full-access">{{ $admin->role->access }}</span>
                    <div class="admin-actions">
                        <button class="profile-btn p-btn-primary btn-small" onclick="fetchAdminDetails({{ $admin->id }})">Edit</button>
                    </div>
                </div>
            @empty
                <p>No full access admins</p>
            @endforelse
        </div>

        <!-- View Access -->
        <h3 class="p-section-title">View Only Access</h3>
        <div class="admin-grid">
            @forelse ($viewAccess as $admin)
                <div class="admin-card">
                    <div class="admin-header">
                        <button class="admin-avatar">
                            <span class="user-initial">{{ strtoupper($admin->name[0]) }}</span>
                        </button>
                        <div class="admin-details">
                            <h4>{{ $admin->name }}</h4>
                            <p>{{ $admin->email }}</p>
                        </div>
                    </div>
                    <span class="access-level view-only">{{ $admin->role->access }}</span>
                    <div class="admin-actions">
                        <button class="profile-btn p-btn-primary btn-small" onclick="fetchAdminDetails({{ $admin->id }})">Edit</button>
                    </div>
                </div>
            @empty
                <div class="no-reservations">
                    <div class="no-reservations-icon">❌</div>
                    <p>No View Admins</p>
                </div>
            @endforelse
        </div>
    </div>
</div>

<!-- Profile Edit Modal -->
<div id="editModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title">Edit Profile</h3>
            <button class="close-btn" onclick="closeModal('editModal')">&times;</button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="editName">Full Name</label>
                <input type="text" id="editName">
            </div>
            <div class="form-group">
                <label for="editEmail">Email</label>
                <input type="email" id="editEmail">
            </div>
            <div class="form-group">
                <label for="editImage">Profile Image</label>
                <input type="file" id="editImage">
            </div>
            <div class="form-group">
                <label for="editStatus">Status</label>
                <select id="editStatus">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
        </div>
        <div class="modal-actions">
            <button class="profile-btn p-btn-secondary" onclick="closeModal('editModal')">Cancel</button>
            <button class="profile-btn p-btn-primary" id="saveProfileBtn">Save Changes</button>
        </div>
    </div>
</div>

<!-- Admin Edit Modal -->
<div id="adminEditModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title">Edit Admin Access</h3>
            <button class="close-btn" onclick="closeModal('adminEditModal')">&times;</button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="adminName">Full Name</label>
                <input type="text" id="adminName">
            </div>
            <div class="form-group">
                <label for="adminEmail">Email</label>
                <input type="email" id="adminEmail">
            </div>
            <div class="form-group">
                <label for="adminAccess">Access Level</label>
                <select id="adminAccess">
                    <option value="full">Full Access</option>
                    <option value="view">View Only</option>
                </select>
            </div>
            <div class="form-group">
                <label for="adminStatus">Status</label>
                <select id="adminStatus">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
        </div>
        <div class="modal-actions">
            <button class="profile-btn p-btn-secondary" onclick="closeModal('adminEditModal')">Cancel</button>
            <button class="profile-btn p-btn-primary" id="updateAdminBtn">Update Access</button>
        </div>
    </div>
</div>

<script>
    function openEditModal(userId) {
        fetch(`/admin-profile/edit/${userId}`)
            .then(res => res.json())
            .then(data => {
                document.getElementById('editName').value = data.name;
                document.getElementById('editEmail').value = data.email;
                document.getElementById('editStatus').value = data.status || 'active';
                document.getElementById('editModal').dataset.id = data.id;
                document.getElementById('editModal').classList.add('show');
            })
            .catch(error => console.error('Error:', error));
    }

    function fetchAdminDetails(adminId) {
        fetch(`/admin-profile/edit/${adminId}`)
            .then(res => res.json())
            .then(data => {
                document.getElementById('adminName').value = data.name;
                document.getElementById('adminEmail').value = data.email;
                document.getElementById('adminAccess').value = data.role.access;
                document.getElementById('adminStatus').value = data.status || 'active';
                document.getElementById('adminEditModal').dataset.id = data.id;
                document.getElementById('adminEditModal').classList.add('show');
            })
            .catch(error => console.error('Error:', error));
    }

    document.getElementById('saveProfileBtn').addEventListener('click', function () {
        const modal = document.getElementById('editModal');
        const userId = modal.dataset.id;

        const formData = {
            name: document.getElementById('editName').value,
            email: document.getElementById('editEmail').value,
            status: document.getElementById('editStatus').value,
            image : document.getElementById('editImage').value,
            _method: 'PUT',
            _token: '{{ csrf_token() }}'
        };

        fetch(`/admin-profile/${userId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify(formData)
        })
        .then(res => res.json())
        .then(response => {
            location.reload();
        })
        .catch(error => console.error('Update failed:', error));
    });

    document.getElementById('updateAdminBtn').addEventListener('click', function () {
        const modal = document.getElementById('adminEditModal');
        const adminId = modal.dataset.id;

        const formData = {
            name: document.getElementById('adminName').value,
            email: document.getElementById('adminEmail').value,
            access: document.getElementById('adminAccess').value,
            status: document.getElementById('adminStatus').value,
            _method: 'PUT',
            _token: '{{ csrf_token() }}'
        };

        fetch(`/admin-profile/${adminId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify(formData)
        })
        .then(res => res.json())
        .then(response => {
            location.reload();
        })
        .catch(error => console.error('Update failed:', error));
    });

    function closeModal(id) {
        document.getElementById(id).classList.remove('show');
    }

    window.onclick = function(event) {
        const modals = document.querySelectorAll('.modal');
        modals.forEach(modal => {
            if (event.target === modal) {
                modal.classList.remove('show');
            }
        });
    }
</script>

@endsection
