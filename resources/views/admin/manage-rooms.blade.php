@extends('admin.dashboard')
@section('content')

    <!-- Top Header -->
    <header class="top-header">
        <div class="header-content">
            <h1 class="header-title">Manage Rooms</h1>
        </div>
    </header>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <!-- Stats Grid -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-number">{{$availableCount ?? 0}}</div>
            <div class="stat-label">Available Rooms</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">{{$unavailableCount ?? 0}}</div>
            <div class="stat-label">Unavailable Rooms</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">{{$totalCount ?? 0}}</div>
            <div class="stat-label">Total Rooms</div>
        </div>
    </div>

      <!-- Available Rooms Section -->
    <div class="room-section">
        <div class="section-header available">
            <h2 class="section-title">Available Rooms</h2>
            <div class="status-badge available">Available</div>
        </div>
        <div class="add-room-container">
            <span>
                @auth
                    @if(Auth::user()->role && Auth::user()->role->access === 'full')
                        <span>

                            <button class="add-room-btn" onclick="openAddRoomModal()">
                                <span class="add-icon">+</span>
                                Add New Room

                            </button>
                            
                        </span>
                    @else

                    @endif
                @endauth
            </span>

        </div>
        <div class="rooms-grid">
            {{-- Loop through available rooms --}}
            @forelse($availableRooms ?? [] as $room)
                <div class="room-card" onclick="openRoomModal({{ $room->id }})">
                    <div class="room-image">
                        @if($room->image_path)
                            <img src="{{ asset($room->image_path) }}" alt="{{ $room->room_name }}">
                        @else
                            <div class="no-image">No Image</div>
                        @endif
                    </div>
                    <div class="room-details">
                        <div class="room-name">{{ $room->room_name }}</div>
                        <div class="room-price">LKR {{ number_format($room->price, 2) }}</div>
                        <div class="room-description">{{ Str::limit($room->description, 100) }}</div>
                    </div>
                </div>
            @empty
                <div class="no-rooms">
                    <div class="no-rooms-icon">🏨</div>
                    <p>No available rooms</p>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Unavailable Rooms Section -->
    <div class="room-section">
        <div class="section-header unavailable">
            <h2 class="section-title">Unavailable Rooms</h2>
            <div class="status-badge unavailable">Unavailable</div>
        </div>
        <div class="rooms-grid">
            {{-- Loop through unavailable rooms --}}
            @forelse($unavailableRooms ?? [] as $room)
                <div class="room-card" onclick="openRoomModal({{ $room->id }})">
                    <div class="room-image">
                        @if($room->image_path)
                            <img src="{{ asset($room->image_path) }}" alt="{{ $room->room_name }}">
                        @else
                            <div class="no-image">No Image</div>
                        @endif
                    </div>
                    <div class="room-details">
                        <div class="room-name">{{ $room->room_name }}</div>
                        <div class="room-price">LKR {{ number_format($room->price, 2) }}</div>
                        <div class="room-description">{{ Str::limit($room->description, 100) }}</div>
                    </div>
                </div>
            @empty
                <div class="no-rooms">
                    <div class="no-rooms-icon">🚫</div>
                    <p>No unavailable rooms</p>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Room Details Modal -->
    <div class="details-modal-overlay" id="roomModal">
        <div class="details-modal">
            <div class="modal-header">
                <h2 class="modal-title">Room Details</h2>
                <button class="close-btn" onclick="closeModal()">&times;</button>
            </div>
            <div class="modal-body" id="roomModalContent">
                <!-- Room details will be populated here -->
            </div>
        </div>
    </div>

    <!-- Add New Room Modal -->
    <div class="room-modal-overlay" id="addRoomModal">
        <div class="room-modal">
            <div class="modal-header">
                <h2 class="modal-title add-new">Add New Room</h2>
                <button class="close-btn" onclick="closeAddRoomModal()">&times;</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/manage-rooms/store" enctype="multipart/form-data" class="room-form">
                    @csrf
                    <!-- Basic Room Information -->
                    <div class="form-section">
                        <h3>Basic Information</h3>
                        <div class="form-grid">
                            <div class="form-group">
                                <label for="room_name">Room Name</label>
                                <input type="text" id="room_name" name="room_name" required>
                            </div>
                            <div class="form-group">
                                <label for="price">Price (LKR)</label>
                                <input type="number" id="price" name="price" step="0.01" required>
                            </div>
                            <div class="form-group full-width">
                                <label for="description">Description</label>
                                <textarea id="description" name="description" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="person">Max Adults</label>
                                <input type="number" id="person" name="adult" required>
                            </div>
                            <div class="form-group">
                                <label for="person">Max Children</label>
                                <input type="number" id="person" name="child" required>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select id="status" name="status" required>
                                    <option value="available">Available</option>
                                    <option value="unavailable">Unavailable</option>
                                </select>
                            </div>
                            <div class="form-group full-width">
                                <label for="image_path">Room Image Path</label>
                                <input type="file" id="image_path" name="image_path" required onchange="validateFileSize(this)">
                                <small id="image-error" style="color: red"></small>
                            </div>
                            {{-- <div class="form-group full-width">
                                <label for="image_path">Room Image</label>
                                <input type="file" id="image_path" name="image_path" accept="image/*">
                            </div> --}}
                        </div>
                    </div>

                    <!-- Room Features -->
                    <div class="form-section">
                        <h3>Room Features</h3>
                        <div class="features-container">
                            <div class="feature-category">
                                <h4>General Features</h4>
                                <div class="feature-inputs" id="generalFeatures">
                                    <div class="feature-input-group">
                                        <input type="text" class="feature-autocomplete" data-feature-type="general" name="room_features[]" placeholder="Feature name">
                                        <div class="feature-dropdown"></div>
                                        <button type="button" onclick="addFeatureInput('generalFeatures','room_features[]',existingGeneralFeatures)">+</button>
                                    </div>
                                </div>
                            </div>

                            <div class="feature-category">
                                <h4>Popular Features</h4>
                                <div class="feature-inputs" id="popularFeatures">
                                    <div class="feature-input-group">
                                        <input type="text" class="feature-autocomplete" data-feature-type="popular" name="popular_features[]" placeholder="Popular feature">
                                        <div class="feature-dropdown"></div>
                                        <button type="button" onclick="addFeatureInput('popularFeatures','popular_features[]',existingPopularFeatures)">+</button>
                                    </div>
                                </div>
                            </div>

                            <div class="feature-category">
                                <h4>Beds & Blankets</h4>
                                <div class="feature-inputs" id="bedsFeatures">
                                    <div class="feature-input-group">
                                        <input type="text" class="feature-autocomplete" data-feature-type="bedsBlanket" name="beds_features[]" placeholder="Bed/Blanket feature">
                                        <div class="feature-dropdown"></div>
                                        <button type="button" onclick="addFeatureInput('bedsFeatures','beds_features[]',existingBedsBlanketFeatures)">+</button>
                                    </div>
                                </div>
                            </div>

                            <div class="feature-category">
                                <h4>Foods And Drinks</h4>
                                <div class="feature-inputs" id="foodsFeatures">
                                    <div class="feature-input-group">
                                        <input type="text" class="feature-autocomplete" data-feature-type="foods" name="foods_features[]" placeholder="Foods/Drinks feature">
                                        <div class="feature-dropdown"></div>
                                        <button type="button" onclick="addFeatureInput('foodsFeatures','foods_features[]',existingFoodsFeatures)">+</button>
                                    </div>
                                </div>
                            </div>

                            <div class="feature-category">
                                <h4>Safety & Security</h4>
                                <div class="feature-inputs" id="safetyFeatures">
                                    <div class="feature-input-group">
                                        <input type="text" class="feature-autocomplete" data-feature-type="safety" name="safety_features[]" placeholder="Safety feature">
                                        <div class="feature-dropdown"></div>
                                        <button type="button" onclick="addFeatureInput('safetyFeatures','safety_features[]',existingsafetyFeatures)">+</button>
                                    </div>
                                </div>
                            </div>

                            <div class="feature-category">
                                <h4>Media & Technology</h4>
                                <div class="feature-inputs" id="mediaFeatures">
                                    <div class="feature-input-group">
                                        <input type="text" class="feature-autocomplete" data-feature-type="media" name="media_features[]" placeholder="Media feature">
                                        <div class="feature-dropdown"></div>
                                        <button type="button" onclick="addFeatureInput('mediaFeatures','media_features[]',existingMediaFeatures)">+</button>
                                    </div>
                                </div>
                            </div>

                            <div class="feature-category">
                                <h4>Bathroom</h4>
                                <div class="feature-inputs" id="bathroomFeatures">
                                    <div class="feature-input-group">
                                        <input type="text" class="feature-autocomplete" data-feature-type="bathroom" name="bathroom_features[]" placeholder="Bathroom feature">
                                        <div class="feature-dropdown"></div>
                                        <button type="button" onclick="addFeatureInput('bathroomFeatures','bathroom_features[]',existingBathroomFeatures)">+</button>
                                    </div>
                                </div>
                            </div>

                            <div class="feature-category">
                                <h4>Amenities</h4>
                                <div class="feature-inputs" id="amenitiesFeatures">
                                    <div class="feature-input-group">
                                        <input type="text" class="feature-autocomplete" data-feature-type="amenity" name="amenities_features[]" placeholder="Amenity">
                                        <div class="feature-dropdown"></div>
                                        <button type="button" onclick="addFeatureInput('amenitiesFeatures','amenities_features[]',existingAmenityFeatures)">+</button>
                                    </div>
                                </div>
                            </div>

                            <div class="feature-category">
                                <h4>Extra Services</h4>
                                <div class="feature-inputs" id="serviceFeatures">
                                    <div class="feature-input-group">
                                        <input type="text" class="feature-autocomplete" data-feature-type="service" name="extra_services[]" placeholder="Extra Services">
                                        <div class="feature-dropdown"></div>
                                        <button type="button" onclick="addFeatureInput('extraServices','extra_services[]',existingExtraServiceFeatures)">+</button>
                                    </div>
                                </div>
                            </div>

                            <div class="feature-category">
                                <h4>Other Features</h4>
                                <div class="feature-inputs" id="otherFeatures">
                                    <div class="feature-input-group">
                                        <input type="text" class="feature-autocomplete" data-feature-type="other" name="other_features[]" placeholder="Other feature">
                                        <div class="feature-dropdown"></div>
                                        <button type="button" onclick="addFeatureInput('otherFeatures','other_features[]',existingOtherFeatures)">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="button" onclick="closeAddRoomModal()" class="cancel-btn">Cancel</button>
                        <button type="submit" class="save-btn">Save Room</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        let isEditMode = false;
        let editingRoomId = null;

        // Modal functionality
        function openRoomModal(id) {
            document.getElementById('roomModal').classList.add('active');
            populateRoomModal(id);
        }

        function closeModal() {
            document.getElementById('roomModal').classList.remove('active');
        }

        function openAddRoomModal(roomId = null) {

            isEditMode = roomId !== null;
            editingRoomId = roomId;

            const modal = document.getElementById('addRoomModal');
            const form = modal.querySelector('form');

            //Reset form
            form.reset();
            document.getElementById('image-error').innerText = '';
            modal.classList.add('active');

            if(isEditMode){
                modal.querySelector('.modal-title').innerText = 'Edit Room';
                modal.querySelector('.save-btn').innerText = 'Update Room';


                fetch(`/manage-rooms/${roomId}`)
                .then(res => res.json())
                .then(data => {
                    const room = data.room;
                    const details = data.details;

                    form.action = `/manage-rooms/update/${roomId}`;
                    form.querySelector('[name="room_name"]').value = room.room_name;
                    form.querySelector('[name="price"]').value = room.price;
                    form.querySelector('[name="description"]').value = room.description;
                    form.querySelector('[name="adult"]').value = details.adult;
                    form.querySelector('[name="child"]').value = details.child;
                    form.querySelector('[name="status"]').value = room.status;

                    form.querySelector('[name]"image_path"]').value = room.image_path;
                });


            }else{
                form.action = '/manage-rooms/store';
                modal.querySelector('.modal-title').innerText = 'Add New Room';
                modal.querySelector('.save-btn').innerText = 'Save Room';
            }
            //alert("1513");
            // document.getElementById('addRoomModal').classList.add('active');
        }

        function closeAddRoomModal() {
            document.getElementById('addRoomModal').classList.remove('active');
        }

        function populateRoomModal(id) {
            // You can implement AJAX call here to fetch room details
            const modalContent = document.getElementById('roomModalContent');
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            // modalContent.innerHTML = `<div class="loading">Loading room details...</div>`;

            fetch(`/manage-rooms/${id}`)
                .then(res => res.json())
                .then(data => {
                    const room = data.room;
                    const detail = data.details;
                    // const feature = data.features;

                    modalContent.innerHTML = `
                                                <!-- Room details structure - you can populate this with actual data -->
                                                <div class="room-detail-section">
                                                    <div class="detail-grid">
                                                        <div class="detail-item">
                                                            <div class="detail-label">Room Name</div>
                                                            <div class="detail-value">${room.room_name}</div>
                                                        </div>
                                                        <div class="detail-item">
                                                            <div class="detail-label">Price</div>
                                                            <div class="detail-value">${room.price}</div>
                                                        </div>
                                                        <div class="detail-item">
                                                            <div class="detail-label">Max Adults</div>
                                                            <div class="detail-value">${detail.adult}</div>
                                                        </div>
                                                        <div class="detail-item">
                                                            <div class="detail-label">Max Child</div>
                                                            <div class="detail-value">${detail.child}</div>
                                                        </div>

                                                        <div class="detail-item">
                                                            <div class="detail-label">Current Status</div>
                                                            <div class="detail-value">${room.status}</div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <span>
                                                    @auth
                                                        @if(Auth::user()->role && Auth::user()->role->access === 'full')
                                                            <span>


                                                                <div class="status-update-section">
                                                                    <h3>Update Room Status</h3>
                                                                    <form method="POST" action="manage-rooms/update-status" class="status-form">
                                                                        @csrf
                                                                        <input type="hidden" name="room_id" value="${id}">
                                                                        <div class="form-group">
                                                                            <label for="status">Status</label>
                                                                            <select name="status" required>
                                                                                <option value="available">Available</option>
                                                                                <option value="unavailable">Unavailable</option>
                                                                            </select>
                                                                        </div>
                                                                        <button type="submit">Update Status</button>
                                                                    </form>
                                                                </div>

                                                                <div class="room-actions">
                                                                    <button onclick="openAddRoomModal(${id})" class="edit-btn">Edit Room</button>
                                                                    <button onclick="deleteRoom(${id})" class="delete-btn">Delete Room</button>
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

        // function addFeatureInput(containerId, inputName, featureList) {
        //     const container = document.getElementById(containerId);
        //     const newInputGroup = document.createElement('div');
        //     newInputGroup.className = 'feature-input-group';

        //     const inputName = container.querySelector('input').name;

        //     newInputGroup.innerHTML = `
        //         <input type="text" name="${inputName}" placeholder="${container.querySelector('input').placeholder}">
        //         <button type="button" onclick="removeFeatureInput(this)">-</button>
        //     `;

        //     container.appendChild(newInputGroup);
        // }

        function addFeatureInput(containerId, inputName, featureList, featureType) {
            const container = document.getElementById(containerId);

            const newInputGroup = document.createElement('div');
            newInputGroup.className = 'feature-input-group';

            const input = document.createElement('input');
            input.type = 'text';
            input.name = inputName;
            input.placeholder = 'Feature name';
            input.className = 'feature-autocomplete';
            console.log(featureType);
            if (featureType) {
                input.dataset.featureType = featureType;
            }

            const dropdown = document.createElement('div');
            dropdown.className = 'feature-dropdown';

            const removeBtn = document.createElement('button');
            removeBtn.type = 'button';
            removeBtn.textContent = '-';
            removeBtn.onclick = () => newInputGroup.remove();

            newInputGroup.appendChild(input);
            newInputGroup.appendChild(dropdown);
            newInputGroup.appendChild(removeBtn);

            container.appendChild(newInputGroup);

            setupFeatureAutocomplete(input, featureList);
        }

        function removeFeatureInput(button) {
            button.parentElement.remove();
        }

        // function editRoom(id) {

        // }

        function deleteRoom(id) {
            if (confirm('Are you sure you want to delete this room?')) {
                fetch(`manage-rooms/delete/${id}`, {
                    method: 'DELETE',
                    headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Accept': 'application/json',
                            'Content-Type': 'application/json',
                    }
                })
                .then(response =>{
                    if(response.ok){
                        alert('Room deleted successfully');
                        location.reload(); // to refresh the page automatically
                    }else{
                        alert('failed to delete room');
                    }
                })
                .catch(error => {
                    console.log('Error',error);
                    alert('something went wrong');
                });
            }
        }

        // Close modals when clicking outside
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('modal-overlay')) {
                e.target.classList.remove('active');
            }
        });

        // Close modals with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                document.querySelectorAll('.modal-overlay').forEach(modal => {
                    modal.classList.remove('active');
                });
            }
        });


        // show existing features
        const existingGeneralFeatures = @json($generalFeatures);
        const existingPopularFeatures = @json($popularFeatures);
        const existingBedsBlanketFeatures = @json($bedsBlanketFeatures);
        const existingFoodsFeatures = @json($foodsFeatures);
        const existingsafetyFeatures = @json($safetyFeatures);
        const existingMediaFeatures = @json($mediaFeatures);
        const existingBathroomFeatures = @json($bathroomFeatures);
        const existingAmenityFeatures = @json($amenityFeatures);
        const existingExtraServiceFeatures = @json($extraServiceFeatures);
        const existingOtherFeatures = @json($otherFeatures);


         // 2. Setup autocomplete
        // function setupFeatureAutocomplete(inputEl, featureList) {
        //     const dropdown = inputEl.nextElementSibling;

        //     inputEl.addEventListener('input', function () {
        //         const value = this.value.toLowerCase();
        //         const filtered = featureList.filter(f => f.toLowerCase().includes(value));
        //         renderFeatureDropdown(filtered, this, dropdown);
        //     });

        //     inputEl.addEventListener('focus', function () {
        //         const value = this.value.toLowerCase();
        //         const filtered = featureList.filter(f => f.toLowerCase().includes(value));
        //         renderFeatureDropdown(filtered, this, dropdown);
        //     });

        //     document.addEventListener('click', function (e) {
        //         if (!e.target.closest('.feature-input-group')) {
        //             dropdown.style.display = 'none';
        //         }
        //     });
        // }

        function setupFeatureAutocomplete(inputEl, featureList) {
            const dropdown = inputEl.nextElementSibling;
            const container = inputEl.closest('.feature-inputs');

            const showDropdown = (value) => {
                const filtered = featureList.filter(f => f.toLowerCase().includes(value.toLowerCase()));
                renderFeatureDropdown(filtered, inputEl, dropdown);
            };

            inputEl.addEventListener('input', function () {
                const value = this.value.toLowerCase().trim();
                showDropdown(value);

                // === Duplicate check ===
                const allInputs = container.querySelectorAll('input');
                let count = 0;

                allInputs.forEach(input => {
                    if (input.value.toLowerCase().trim() === value && value !== '') {
                        count++;
                    }
                });

                if (count > 1) {
                    this.classList.add('input-error');
                    this.setCustomValidity('This feature is already added.');
                    this.reportValidity();
                } else {
                    this.classList.remove('input-error');
                    this.setCustomValidity('');
                }
            });

            inputEl.addEventListener('focus', function () {
                showDropdown(this.value.toLowerCase());
            });

            document.addEventListener('click', function (e) {
                if (!e.target.closest('.feature-input-group')) {
                    dropdown.style.display = 'none';
                }
            });
        }


            // 3. Render dropdown
        function renderFeatureDropdown(features, inputEl, dropdown) {
            dropdown.innerHTML = '';
            features.forEach(f => {
                const option = document.createElement('div');
                option.className = 'category-option';
                option.textContent = f;
                option.onclick = () => {
                    inputEl.value = f;
                    dropdown.style.display = 'none';
                    inputEl.dispatchEvent(new Event('input')); // Recheck for duplicate after selection
                };
                dropdown.appendChild(option);
            });
            dropdown.style.display = features.length > 0 ? 'block' : 'none';

            if (features.length || inputEl.value) {
                dropdown.style.display = 'block';
            } else {
                dropdown.style.display = 'none';
            }
        }


        document.addEventListener('DOMContentLoaded', function(){
            document.querySelectorAll('.feature-autocomplete').forEach(input=>{
                const type = input.dataset.featureType;
                let list = [];

                switch(type){
                    case 'general': list = existingGeneralFeatures; break;
                    case 'popular': list = existingPopularFeatures; break;
                    case 'bedsBlanket': list = existingBedsBlanketFeatures; break;
                    case 'foods': list = existingFoodsFeatures; break;
                    case 'safety' : list = existingsafetyFeatures; break;
                    case 'media': list = existingMediaFeatures; break;
                    case 'bathroom': list = existingBathroomFeatures; break;
                    case 'amenity': list = existingAmenityFeatures; break;
                    case 'service': list = existingExtraServiceFeatures; break;
                    case 'other': list = existingOtherFeatures; break;
                }

                setupFeatureAutocomplete(input, list);
            });
        });

        function openEditRoomModal(){
            document.getElementById('addRoomModal').classList.add('active');
        }

        function closeEditRoomModal() {
            document.getElementById('editRoomModal').classList.remove('active');
        }

        function editRoom(id) {
            openEditRoomModal();
            // populateEditRoomForm(id);
        }




        function validateFileSize(input){
            console.log("file");
            const errorEl = document.getElementById("image-error");

            if (!input.files || input.files.length === 0) {
                errorEl.textContent = "No file selected";
                return;
            }

            const file = input.files[0];

            if(file && file.size > 3 * 1024 * 1024){ //3MB
                errorEl.textContent = "Image must be less than 3 MB";
                input.value = ""; // reset input
            }
            else{
                errorEl.textContent = "";
                console.log("nothing");
            }
        }


    </script>

@endsection
