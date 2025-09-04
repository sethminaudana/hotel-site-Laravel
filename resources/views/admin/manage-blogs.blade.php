@extends('admin.dashboard')
@section('content')

    <div class="blog-management">
        <div class="container">
            <!-- Top Header -->
            <header class="top-header">
                <div class="header-content">
                    <h1 class="header-title">Manage Blogs</h1>
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
                    <div class="stat-number">{{ count($results) }}</div>
                    <div class="stat-label">Total Blogs</div>
                </div>
                <div class="bd-blog-3-search">


                    <span>
                        @auth
                            @if(Auth::user()->role && Auth::user()->role->access === 'full')
                                <span>

                                    <button type="button" class="bd-btn fill-btn" onclick="openBlogModal()">
                                        <i class="fas fa-plus me-2"></i>Add Blog
                                    </button>
                                </span>
                            @else

                            @endif
                        @else
                        @endauth
                    </span>



                </div>
            </div>

            <!-- Blog Grid -->
            <div class="blog-grid">
                @foreach($results as $post)
                    <div class="bd-blog-2">
                        <div class="bd-blog-2__thumb">
                            @if($post->image_path)
                                <img src="{{ asset($post->image_path) }}" alt="{{ $post->title }}">
                            @else
                                <div style="height: 100%; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); display: flex; align-items: center; justify-content: center; color: white; font-size: 3rem;">
                                    <i class="fas fa-image"></i>
                                </div>
                            @endif
                        </div>
                        <div class="bd-blog-2__content">
                            <div class="bd-blog-2__meta">
                                <a href="/blog">
                                    {{ $post->created_at->format('d') }}<br>{{ $post->created_at->format('M') }}
                                </a>
                            </div>
                            <h4 class="bd-blog-2__title">
                                <a href="{{url('/blog/view/'. $post->id)}}">
                                    {{ Str::limit($post->title, 60) }}
                                </a>
                            </h4>
                            @if($post->description)
                                <p style="color: #666; margin-top: 1rem; line-height: 1.6;">
                                    {{ Str::limit($post->description, 120) }}
                                </p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Modal -->
            <div id="mediaModal" class="blog-modal hidden">
                <div class="blog-modal-overlay">

                    <div class="blog-dialog">
                        <form action="{{ url('/manage-blogs/store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="blog-modal-header">
                                <h5 class="modal-title">
                                    <i class="fas fa-plus-circle me-2"></i>Add New Blog
                                </h5>
                                <button type="button" class="blog-close-btn" onclick="closeBlogModal()">&times;</button>
                            </div>

                            <div class="modal-body">
                                <!-- Title -->
                                <div class="mb-4">
                                    <label for="title" class="form-label">
                                        <i class="fas fa-heading me-2"></i>Title <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="title" name="title" required placeholder="Enter blog title...">
                                </div>

                                <!-- Description -->
                                <div class="mb-4">
                                    <label for="description" class="form-label">
                                        <i class="fas fa-align-left me-2"></i>Description
                                    </label>
                                    <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter blog description..."></textarea>
                                </div>

                                <!-- Video URL -->
                                <div class="mb-4">
                                    <label for="video_url" class="form-label">
                                        <i class="fas fa-video me-2"></i>Video URL
                                    </label>
                                    <input type="url" class="form-control" id="video_url" name="video_url" placeholder="https://example.com/video">
                                </div>

                                <!-- Image Upload -->
                                <div class="mb-4">
                                    <label for="image" class="form-label">
                                        <i class="fas fa-image me-2"></i>Upload Image
                                    </label>
                                    <input class="form-control" type="file" id="image" name="image" accept="image/*" required onchange="validateFileSize(this)">
                                    {{-- <div class="form-text">Supported formats: JPG, PNG, GIF (Max size: 3MB)</div> --}}
                                    <small id="image-error" style="color: red"></small>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" onclick="closeBlogModal()">
                                    <i class="fas fa-times me-2"></i>Cancel
                                </button>
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save me-2"></i>Save Blog
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        function openBlogModal() {
            document.getElementById('mediaModal').classList.remove('hidden');
        }

        function closeBlogModal() {
            document.getElementById('mediaModal').classList.add('hidden');
        }

        function validateFileSize(input){
            const errorEl = document.getElementById("image-error");

            if(!input.files || input.files.length === 0){
                errorEl.textContent = "No file selected";
                return;
            }

            const file = input.files[0];


            if(file && file.size > 3 * 1024 * 1024){ //3MB
                errorEl.textContent = "Image must be less than 3MB";
                input.value = ""; // reset input
            }
            else{
                errorEl.textContent = "";
            }
        }
    </script>



@endsection