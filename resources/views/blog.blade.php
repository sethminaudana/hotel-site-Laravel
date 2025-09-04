@extends('layout.app')
@section('content')


        <!-- breadcrumb area start here  -->
        <section class="bd-breadcrumb-area p-relative">
            <div class="bd-breadcrumb__wrapper">
                <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="bd-breadcrumb d-flex align-items-center justify-content-center">
                            <div class="bd-breadcrumb__thumb">
                            <img src="{{asset('img/breadcrumb/breadcrumb-bg.png')}}" alt="breadcrumb img">
                            </div>
                            <div class="bd-breadcrumb__content text-center">
                            <h1 class="bd-breadcrumb__title mb-20">Blog</h1>
                            <div class="bd-breadcrumb__list">
                                <span><a href="/">home</a></span>
                                <span>Blog</span>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb area end here  -->

        <!-- blog area start here  -->
        <section class="bd-blog-3-area pb-150">
            <div class="container">
                <div class="bd-blog-3-menu-wrapper">
                <div class="row align-items-end">
                    <div class="col-xxl-6 col-xl-5 col-lg-4">
                        <div class="bd-blog-3-search mb-6">
                            <form action="{{ route('blog.search') }}"  method="GET">
                            <label for="bd-blog-3-search-input-label">Search by Keyword</label>
                            <div class="bd-blog-3-search-input">
                                <input type="text" name="query" placeholder="Type here..." id="bd-blog-3-search-input-label"  value="{{ request('query') }}">
                                <div class="bd-blog-3-search-submit">
                                    <button type="submit"><i class="fa-regular fa-magnifying-glass"></i></button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    {{-- @auth
                        @if(Auth::user()->role && Auth::user()->role->role_name === 'admin')
                            <div class="col-xxl-6 col-xl-5 col-lg-4">
                                <div class="bd-blog-3-search mb-6 ">
                                    <button type="button" class="bd-btn fill-btn" data-bs-toggle="modal" data-bs-target="#mediaModal">
                                    Add Blog
                                    </button>
                                </div>
                            </div>
                        @else
                            <p></p>
                        @endif
                    @else
                        <p></p>
                    @endauth --}}
                    {{-- <form method="GET" action="{{ route('blog.sortbydate') }}" class="mb-3">
                        <select name="sort" onchange="this.form.submit()" class="form-select w-auto">
                            <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Newest First</option>
                            <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Oldest First</option>
                        </select>
                    </form> --}}

                </div>
                </div>
                <!-- Trigger Button -->

                <br> @if(session('success'))
                        <div class="alert alert-success mt-3">{{ session('success') }}</div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger mt-3">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <br>

                <!-- Modal -->
                <div class="modal fade" id="mediaModal" tabindex="-1" aria-labelledby="mediaModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                    <form action="{{ route('media.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="modal-header">
                        <h5 class="modal-title" id="mediaModalLabel">Add Blog</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">

                        <!-- Title -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>

                        <!-- Video URL -->
                        <div class="mb-3">
                            <label for="video_url" class="form-label">Video URL</label>
                            <input type="url" class="form-control" id="video_url" name="video_url">
                        </div>

                        <!-- Image Upload -->
                        <div class="mb-3">
                            <label for="image" class="form-label">Upload Image</label>
                            <input class="form-control" type="file" id="image" name="image" accept="image/*">
                        </div>

                        </div>

                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save Blog</button>
                        </div>

                    </form>

                    </div>
                </div>
                </div>

                <div class="row">
                    @if($results->isEmpty())
                 {{-- @foreach($media as $post)
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="bd-blog-2 d-flex align-items-end mb-30">
                        <div class="bd-blog-2__thumb">


                                @if($post->image_path)
                                <img src="{{ asset('storage/' . $post->image_path) }}" class="media-image mb-3" alt="Media Image">
                                @endif --}}

                            {{-- <img src="{{asset('img/blog/blog1.jpg')}}" alt="image not found"> --}}
                        {{-- </div>
                        <div class="bd-blog-2__content">
                            <div class="bd-blog-2__meta">
                            <a href="/blog">
                                {{ $post->created_at->format('d') }}<br>{{ $post->created_at->format('M') }}
                            </a>
                            </div>
                            <h4 class="bd-blog-2__title"><a href="{{url('/blog/view/'. $post->id)}}">
                                {{ $post->title }} --}}
                                {{-- Take A Quick Rundown At This Guide For An Vacation! --}}
                            {{-- </a></h4>
                        </div>
                    </div>
                </div>
                 @endforeach --}}
                 @else

                  @foreach($results as $post)
                            <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="bd-blog-2 d-flex align-items-end mb-30">
                        <div class="bd-blog-2__thumb">


                                @if($post->image_path)
                                <img src="{{ asset($post->image_path) }}" class="media-image mb-3" alt="Media Image">
                                @endif

                            {{-- <img src="{{asset('img/blog/blog1.jpg')}}" alt="image not found"> --}}
                        </div>
                        <div class="bd-blog-2__content">
                            <div class="bd-blog-2__meta">
                            <a href="/blog">
                                {{ $post->created_at->format('d') }}<br>{{ $post->created_at->format('M') }}
                            </a>
                            </div>
                            <h4 class="bd-blog-2__title"><a href="{{url('/blog/view/'. $post->id)}}">
                                {{ $post->title }}
                                {{-- Take A Quick Rundown At This Guide For An Vacation! --}}
                            </a></h4>
                        </div>
                    </div>
                </div>
                        @endforeach

                    {{-- <a href="{{ url('/blog') }}" class="btn btn-link">← Back to All Blogs</a> --}}
                    @endif
                {{-- <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="bd-blog-2 d-flex align-items-end mb-30">
                        <div class="bd-blog-2__thumb">
                            <img src="{{asset('img/blog/blog3.jpg')}}" alt="image not found">
                        </div>
                        <div class="bd-blog-2__content">
                            <div class="bd-blog-2__meta">
                            <a href="blog.html">
                                12<br>nov
                            </a>
                            </div>
                            <h4 class="bd-blog-2__title"><a href="blog-details.html">
                                Best Places To Visit In Turkey In November
                            </a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="bd-blog-2 d-flex align-items-end mb-30">
                        <div class="bd-blog-2__thumb">
                            <img src="{{asset('img/blog/blog4.jpg')}}" alt="image not found">
                        </div>
                        <div class="bd-blog-2__content">
                            <div class="bd-blog-2__meta">
                            <a href="blog.html">
                                1<br>may
                            </a>
                            </div>
                            <h4 class="bd-blog-2__title"><a href="blog-details.html">
                                Details Of My Stay At Royel Hotel & Resort, switzerland
                            </a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="bd-blog-2 d-flex align-items-end mb-30">
                        <div class="bd-blog-2__thumb">
                            <img src="{{asset('img/blog/blog5.jpg')}}" alt="image not found">
                        </div>
                        <div class="bd-blog-2__content">
                            <div class="bd-blog-2__meta">
                            <a href="blog.html">
                                23<br>mar
                            </a>
                            </div>
                            <h4 class="bd-blog-2__title"><a href="blog-details.html">
                                Best hotel blogs and how to succeed with yours hotel
                            </a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="bd-blog-2 d-flex align-items-end mb-30">
                        <div class="bd-blog-2__thumb">
                            <img src="{{asset('img/blog/blog6.jpg')}}" alt="image not found">
                        </div>
                        <div class="bd-blog-2__content">
                            <div class="bd-blog-2__meta">
                            <a href="blog.html">
                                21<br>jun
                            </a>
                            </div>
                            <h4 class="bd-blog-2__title"><a href="blog-details.html">
                                We're changing the future of travel, Watch the steps
                            </a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="bd-blog-2 d-flex align-items-end mb-30">
                        <div class="bd-blog-2__thumb">
                            <img src="{{asset('img/blog/blog7.jpg')}}" alt="image not found">
                        </div>
                        <div class="bd-blog-2__content">
                            <div class="bd-blog-2__meta">
                            <a href="blog.html">
                                15<br>dec
                            </a>
                            </div>
                            <h4 class="bd-blog-2__title"><a href="blog-details.html">
                                They have specialized blogs in their different destinations.
                            </a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="bd-blog-2 d-flex align-items-end mb-30">
                        <div class="bd-blog-2__thumb">
                            <img src="{{asset('img/blog/blog8.jpg')}}" alt="image not found">
                        </div>
                        <div class="bd-blog-2__content">
                            <div class="bd-blog-2__meta">
                            <a href="blog.html">
                                25<br>jan
                            </a>
                            </div>
                            <h4 class="bd-blog-2__title"><a href="blog-details.html">
                                Some of the hill stations near Ramesh waram that one
                            </a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="bd-blog-2 d-flex align-items-end mb-30">
                        <div class="bd-blog-2__thumb">
                            <img src="{{asset('img/blog/blog9.jpg')}}" alt="image not found">
                        </div>
                        <div class="bd-blog-2__content">
                            <div class="bd-blog-2__meta">
                            <a href="blog.html">
                                15<br>jan
                            </a>
                            </div>
                            <h4 class="bd-blog-2__title"><a href="blog-details.html">
                                a real guide for those who are planning to travel to this country.
                            </a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="bd-blog-2 d-flex align-items-end mb-30">
                        <div class="bd-blog-2__thumb">
                            <img src="{{asset('img/blog/blog2.jpg')}}" alt="image not found">
                        </div>
                        <div class="bd-blog-2__content">
                            <div class="bd-blog-2__meta">
                            <a href="blog.html">
                                25<br>dec
                            </a>
                            </div>
                            <h4 class="bd-blog-2__title"><a href="blog-details.html">
                                Bye Bye Resort Fees - How to Fill Your
                                Pending Revenue Hole
                            </a></h4>
                        </div>
                    </div>
                </div> --}}
                </div>
                <div class="row">
                {{-- <div class="col-12">
                    <div class="bd-blog-pagination pt-20">
                        <ul class="justify-content-center">
                            <li><span aria-current="page" class="page-numbers current">01</span></li>
                            <li><a class="page-numbers" href="#">02</a></li>
                            <li><a class="next page-numbers" href="#">
                                <i class="fa-sharp fa-solid fa-angle-right"></i>
                            </a>
                            </li>
                        </ul>
                    </div>
                </div> --}}
                </div>
            </div>
        </section>
        <!-- blog area end here  -->

        <!-- brand area start here  -->

        @include('components.brands')
        <!-- brand area end here  -->

@endsection

