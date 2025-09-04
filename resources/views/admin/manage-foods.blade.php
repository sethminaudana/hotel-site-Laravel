@extends('admin.dashboard')
@section('content')

    <!-- Top Header -->
    <header class="top-header">
        <div class="header-content">
            <h1 class="header-title">Manage Foods</h1>
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
            <div class="stat-number">{{$totalCategories ?? 1 }}</div>
            <div class="stat-label">Total Categories</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">{{$totalFoods ?? 1}}</div>
            <div class="stat-label">Total Foods</div>
        </div>
    </div>
<br>
    <div class="addNewBtn">

        <span>
            @auth
                @if(Auth::user()->role && Auth::user()->role->access === 'full')
                    <span>
                        <button onclick="openModal()">Add New Food</button>
                    </span>
                @else

                @endif
            @else
            @endauth
        </span>
        
    </div>

    @foreach($categories as $category)
        <div class="category-section {{ \Str::slug($category->category_name) }}">
            <h3>{{ $category->category_name }}</h3>
            <div class="items">
                @foreach($category->foods as $food)
                    <div class="item">
                        <div class="itemName">
                            <p>{{ $food->food_name }}</p>
                        </div>
                        <div class="itemDescripton">
                            <p>{{ $food->description }}</p>
                        </div>
                        <div class="price">
                            <p>LKR {{ number_format($food->price->price, 2) }}</p>
                        </div>
                        <div class="editBtn">
                            {{-- <button onclick="
                                editFood(@json([
                                    'id' => {{$food->id}},
                                    'name' => {{$food->food_name}},
                                    'description' => {{$food->description}},
                                    'price' => {{$food->price->price}},
                                    'category' => {{$category->category_name}},
                                    'image' => {{$food->image_path}},
                        ]))
                            ">Edit</button> --}}
                        </div>

                        <div class="deleteBtn">
                            <form method="POST"
                            action="{{url('/manage-foods/delete', $food->id)}}"
                            onsubmit="return confirm('Are you sure want to remove this ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach


    <!-- Modal for Adding New Food -->
    <div id="foodModal" class="food-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Add New Food Item</h2>
                <span class="close" onclick="closeModal()">&times;</span>
            </div>
            <div class="food-modal-body">
                <form id="addFoodForm" method="POST" action="{{url('/manage-foods/store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="foodName">Food Name *</label>
                        <input type="text" id="foodName" name="foodName" required>
                    </div>

                    <div class="form-group">
                        <label for="foodDescription">Description *</label>
                        <textarea id="foodDescription" name="foodDescription" rows="3" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="foodPrice">Price (LKR) *</label>
                        <input type="number" id="foodPrice" name="foodPrice" step="0.01" min="0" required>
                    </div>

                    <div class="form-group">
                        <label for="foodImage">Food Image</label>
                        <div class="file-input-wrapper">
                            <input type="file" id="foodImage" name="foodImage" accept="image/*" onchange="validateFileSize(this)" class="file-input">
                            <div class="file-input-display">
                                <span class="file-icon">📁</span>
                                <span class="file-text">Choose image file...</span>
                            </div>
                            <small id="image-error" style="color: red"></small>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="categoryInput">Category *</label>
                        <div class="category-input-group">
                            <input type="text" id="categoryInput" name="category" placeholder="Select existing category or enter new one" required>
                            <div id="categoryDropdown" class="category-dropdown"></div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="closeModal()">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add Food Item</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>


        function validateFileSize(input){
            console.log("file");
            const errorEl = document.getElementById("image-error");

            if (!input.files || input.files.length === 0) {
                errorEl.textContent = "No file selected";
                return;
            }

            const file = input.files[0];

            if(file && file.size > 6 * 1024 * 1024){ //3MB
                errorEl.textContent = "Image must be less than 3 MB";
                input.value = ""; // reset input
            }
            else{
                errorEl.textContent = "";
                console.log("nothing");
            }
        }


        // Categories from backend
        const existingCategories = @json($categories->pluck('category_name'));

        let selectedFileName = '';

        // Open Modal
        function openModal() {
            document.getElementById('foodModal').style.display = 'block';
            document.body.style.overflow = 'hidden';
        }

        // Close Modal
        function closeModal() {
            document.getElementById('foodModal').style.display = 'none';
            document.body.style.overflow = 'auto';
            document.getElementById('addFoodForm').reset();
            document.getElementById('categoryDropdown').style.display = 'none';
            selectedFileName = '';
            isEditMode = false;
            editingFoodId = null;
            updateFileDisplay();

            const methodField = document.getElementById('methodField');
            if (methodField) methodField.remove();
            document.getElementById('addFoodForm').action = '/manage-foods/store';

        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            const modal = document.getElementById('foodModal');
            if (event.target === modal) {
                closeModal();
            }
        }

        // File input preview
        const fileInput = document.getElementById('foodImage');
        fileInput.addEventListener('change', function () {
            selectedFileName = this.files[0] ? this.files[0].name : '';
            updateFileDisplay();
        });

        function updateFileDisplay() {
            const fileText = document.querySelector('.file-text');
            if (selectedFileName) {
                fileText.textContent = selectedFileName;
                fileText.style.color = '#667eea';
            } else {
                fileText.textContent = 'Choose image file...';
                fileText.style.color = '#666';
            }
        }

        // Category autocomplete
        const categoryInput = document.getElementById('categoryInput');
        const categoryDropdown = document.getElementById('categoryDropdown');

        categoryInput.addEventListener('input', function () {
            const inputValue = this.value.toLowerCase();
            const filtered = existingCategories.filter(cat =>
                cat.toLowerCase().includes(inputValue)
            );

            showCategoryDropdown(filtered, inputValue);
        });

        categoryInput.addEventListener('focus', function () {
            const inputValue = this.value.toLowerCase();
            const filtered = existingCategories.filter(cat =>
                cat.toLowerCase().includes(inputValue)
            );

            showCategoryDropdown(filtered, inputValue);
        });

        document.addEventListener('click', function (event) {
            if (!event.target.closest('.category-input-group')) {
                categoryDropdown.style.display = 'none';
            }
        });

        function showCategoryDropdown(categories, inputValue) {
            categoryDropdown.innerHTML = '';

            categories.forEach(category => {
                const option = document.createElement('div');
                option.className = 'category-option';
                option.textContent = category;
                option.addEventListener('click', function () {
                    categoryInput.value = category;
                    categoryDropdown.style.display = 'none';
                });
                categoryDropdown.appendChild(option);
            });

            if (
                inputValue &&
                !categories.some(cat => cat.toLowerCase() === inputValue)
            ) {
                const newOption = document.createElement('div');
                newOption.className = 'category-option new-category-option';
                newOption.textContent = `+ Add new category: "${categoryInput.value}"`;
                newOption.addEventListener('click', function () {
                    categoryDropdown.style.display = 'none';
                });
                categoryDropdown.appendChild(newOption);
            }

            categoryDropdown.style.display =
                categories.length > 0 || inputValue ? 'block' : 'none';
        }

        // Form submission - handled via Laravel POST
        document.getElementById('addFoodForm').addEventListener('submit', function (e) {
            // Let Laravel handle submission (not AJAX here)
        });


        function openEditModal(foodData){
            isEditMode = true;
            editingFoodId = foodData.id;

            document.querySelector('.modal-header h2').textContent = 'Edit Food Item';
            document.querySelector('.btn-primary').textContent = 'Update Food Item';

            // Populate form with existing data
            document.getElementById('foodName').value = foodData.name;
            document.getElementById('foodDescription').value = foodData.description;
            document.getElementById('foodPrice').value = foodData.price;
            document.getElementById('categoryInput').value = foodData.category;

            // Handle existing image
            if (foodData.image) {
                selectedFileName = foodData.image;
                updateFileDisplay();
            }

            // Update form action
            document.getElementById('addFoodForm').action = `/manage-foods/update/${foodData.id}`;

            // Add PUT method field
            const methodInput = document.createElement('input');
            methodInput.setAttribute('type','hidden');
            methodInput.setAttribute('name','_method');
            methodInput.setAttribute('value','PUT');
            methodInput.id = 'methodField';
            document.getElementById('addFoodForm').appendChild(methodInput);

            // Show modal
            document.getElementById('foodModal').style.display = 'block';
            document.body.style.overflow = 'hidden';
        }




        // Edit food function
        function editFood(foodData) {
            alert('hw');
            openEditModal(foodData);
        }

    </script>


@endsection
