@extends('admin.dashboard') 
@section('content') 
 
    <!-- Top Header --> 
    <header class="top-header"> 
        <div class="header-content"> 
            <h1 class="header-title register">Admin Registration</h1> 
        </div> 
    </header> 

    @if(session('success'))
        <div id="success-msg" class="alert alert-success">
            {{session('success')}}
        </div>
    @endif

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
            <div class="stat-number">{{$adminCount}}</div> 
            <div class="stat-label">Total Admin</div> 
        </div> 
        <div class="stat-card"> 
            <div class="stat-number">0</div> 
            <div class="stat-label">Managers</div> 
        </div> 
    </div> 
 
    <div class="active-admins"> 
        <div class="header"> 
            <h3>Admin</h3>
            <button class="add-admin-btn" onclick="openModal()">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M12 5v14M5 12h14"/>
                </svg>
                Add New Admin
            </button>
        </div> 
        
        <!-- Admin List Items -->
        @foreach ($adminUsers as $admin)
            <div class="admin-list"> 
                <div class="profile"> 
                    <p>{{strtoupper(substr($admin->name, 0 ,1))}}</p> 
                </div> 
                <div class="name"> 
                    <p>{{$admin->name}}</p> 
                </div> 
                <div class="email"> 
                    <p>{{$admin->email}}</p> 
                </div> 
                <div class="status" style="width: fit-content"> 
                    <p>{{$admin->role->status}}</p> 
                </div>
                {{-- <div class="editBtn"> 
                    <button type="submit" onclick="openModal()">Edit</button> 
                </div> --}}
                <div class="removeBtn"> 
                    <form action="{{ url('/remove', $admin->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to remove this admin?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Remove</button> 
                    </form>       
                </div> 
            </div>
        @endforeach
    </div> 
</div>

<!-- Add New Admin Modal -->
<div class="admin-modal-overlay" id="addAdminModal">
    <div class="admin-modal">
        <div class="modal-header">
            <h2 class="modal-title">Add Admin</h2>
            <button class="modal-close" onclick="closeModal()">×</button>
        </div>
        <div class="modal-body">
            <form id="addAdminForm" action="{{url('/new-admin-user')}}"  method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="adminName">Full Name</label>
                    <input type="text" id="adminName" name="name" class="form-input" placeholder="Enter full name" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="adminEmail">Email Address</label>
                    <input type="email" id="adminEmail" name="email" class="form-input" placeholder="Enter email address" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="roles">User Role</label>
                    <select name="role_name" id="roles">
                        <option value="admin">Admin</option>
                        <option value="manager">manager</option>
                        <option value="staff">Staff</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="radio" id="active" name="status" value="active">
                    <label for="active">Active</label><br>

                    <input type="radio" id="inactive" name="status" value="inActive">
                    <label for="inactive">Inactive</label><br>
                </div>
                <div class="form-group">
                    <label class="form-label" for="adminPassword">Password</label>
                    <input type="password" id="adminPassword" name="password" class="form-input" placeholder="Enter password" required>
                </div>

                {{-- <button type="button" class="btn-save" onclick="saveAdmin()">Save Admin</button> --}}
                <div class="modal-footer">
                    <input type="submit" class="btn-save">
                    <button type="button" class="btn-cancel" onclick="closeModal()">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal-overlay" id="editAdminModal">
    <div class="modal">
        <div class="modal-header">
            <h2 class="modal-title">Add a new Admin</h2>
            <button class="modal-close" onclick="closeModal()">×</button>
        </div>
        <div class="modal-body">
            <form id="addAdminForm" action="{{url('/new-admin-user')}}"  method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="adminName">Full Name</label>
                    <input type="text" id="adminName" name="name" class="form-input" placeholder="Enter full name" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="adminEmail">Email Address</label>
                    <input type="email" id="adminEmail" name="email" class="form-input" placeholder="Enter email address" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="roles">User Role</label>
                    <select name="role_name" id="roles">
                        <option value="admin">Admin</option>
                        <option value="manager">manager</option>
                        <option value="staff">Staff</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="radio" id="active" name="status" value="active">
                    <label for="active">Active</label><br>

                    <input type="radio" id="inactive" name="status" value="inActive">
                    <label for="inactive">Inactive</label><br>
                </div>
                <div class="form-group">
                    <label class="form-label" for="adminPassword">Password</label>
                    <input type="password" id="adminPassword" name="password" class="form-input" placeholder="Enter password" required>
                </div>

                {{-- <button type="button" class="btn-save" onclick="saveAdmin()">Save Admin</button> --}}
                <div class="modal-footer">
                    <input type="submit" class="btn-save">
                    <button type="button" class="btn-cancel" onclick="closeModal()">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function openModal() {
    document.getElementById('addAdminModal').classList.add('active');
    document.body.style.overflow = 'hidden';
}

// function openModal() {
//     document.getElementById('editAdminModal').classList.add('active');
//     document.body.style.overflow = 'hidden';
// }


function closeModal() {
    document.getElementById('addAdminModal').classList.remove('active');
    document.body.style.overflow = 'auto';
    // Reset form
    document.getElementById('addAdminForm').reset();
}

// function closeModal() {
//     document.getElementById('editAdminModal').classList.remove('active');
//     document.body.style.overflow = 'auto';
//     // Reset form
//     document.getElementById('addAdminForm').reset();
// }

// Close modal when clicking outside
document.getElementById('addAdminModal').addEventListener('click', function(e) {
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
</script>

@endsection