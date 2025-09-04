@extends('layout.app')

@section('content')
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
                        <h1 class="bd-breadcrumb__title mb-20">Blog Details</h1>
                        <div class="bd-breadcrumb__list">
                            <span><a href="{{url('/')}}">home</a></span>
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
{{-- <body class="container pt-100 mt-4">

    <div class="media-container">
        <h2>{{ $media->title }}</h2>
        <p>{{ $media->description }}</p>

        @if($media->image_path)
            <img src="{{ asset('storage/' . $media->image_path) }}" class="media-image mb-3" alt="Media Image">
        @endif

        @if($media->video_url && Str::contains($media->video_url, 'youtube.com'))
            <div class="ratio ratio-16x9 mb-3">
                <iframe class="video-frame"
                        src="{{ Str::replace('watch?v=', 'embed/', $media->video_url) }}"
                        frameborder="0"
                        allowfullscreen></iframe>
            </div>
        @elseif($media->video_url)
            <p><a href="{{ $media->video_url }}" target="_blank">View Video</a></p>
        @endif

        <div class="d-flex justify-content-between mt-4">
            @if($previous)
                <a href="{{ route('media.show', $previous->id) }}" class="btn btn-outline-primary">&laquo; Previous</a>
            @else
                <span></span>
            @endif

            @if($next)
                <a href="{{ route('media.show', $next->id) }}" class="btn btn-outline-primary">Next &raquo;</a>
            @endif
        </div>
    </div>

</body> --}}
 <section class="bd-blog-3-details-area x-clip pb-60">
        <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="bd-blog-3-details-wrapper mb-60">
                    <div class="row">
                    <div class="col-12">
                        <div class="bd-blog-3-details mb-50">
                            <div class="bd-blog-3-details-thumb">
                               @if($media->image_path)
                                    <img src="{{ asset($media->image_path) }}" class="media-image mb-3" alt="Media Image">
                                @endif
                                {{-- <img src="{{asset('img/blog/blog1.jpg')}}" alt="blog image"> --}}
                            </div>
                            <div class="bd-blog-3-details-meta">
                                {{-- <span><i class="fas fa-user"></i> by <a href="{{url('/blog')}}">Jhon</a></span> --}}
                                <span><i class="fas fa-calendar-days"></i> {{ $media->created_at->format('F j, Y') }}</span>
                                <span><i class="fa-solid fa-comment-dots"></i><a href="{{url('/blog-details')}}">0
                                    Comments</a></span>
                            </div>
                            <div class="bd-blog-3-details-content">
                                <h3 class="bd-blog-3-details-title mt-5 mb-15">{{ $media->title }}</h3>
                                {{-- <p>{{ $media->description }}</p> --}}
                                @foreach(preg_split("/\r\n|\n|\r/", trim($media->description)) as $paragraph)
                                    <p>{{ $paragraph }}</p>
                                @endforeach
                                {{-- {!! nl2br(e($media->description)) !!} --}}




                            </div>
                            <div class="bd-blog-3-details-quote">
                                <blockquote class="bd-blog-3-quote">
                                <div class="bd-blog-3-quote-icon">
                                    <i class="flaticon-quote"></i>
                                </div>
                                <div class="bd-blog-3-quote-content">
                                    <p>Always keep a positive mindset, it will improve
                                        your outlook on the world.</p>
                                    <span>Roald Dahl</span>
                                </div>
                                </blockquote>
                            </div>
                            {{-- <p>The guest experience doesn’t begin at check-in anymore; with
                                engaging blog
                                content, hotels can start offering value to guests before they even start
                                thinking about booking a room. By the time these guests start considering
                                which
                                property to book at, you’ve already got a leg up on the competition. </p> --}}
                            <div class="bd-blog-3-topic">
                                {{-- <h4 class="bd-blog-3-topic-title">Know More About Royel</h4>
                                <p>A 21st-century hotel must have a website, social media profiles, and a blog
                                -
                                right? Not so fast. Though a blog might seem like a necessary part of a
                                hotel’s online presence, no benefit comes from blogging for blogging’s
                                sake.
                                In fact, cranking out a multitude of posts may do more harm than good
                                without
                                carefully choosing topics and producing high-quality content. When it comes
                                to
                                hotel blogs, choose quality over quantity - or choose not to have a blog at
                                all, such as the Maven Hotel in Denver.</p> --}}
                                <div class="bd-blog-3-topic-video mt-30 mb-35">
                                {{-- <div class="bd-blog-3-topic-thumb">
                                    <img src="{{asset('img/roombg.jpg')}}" alt="img not found!">
                                </div> --}}

                                        @php
    preg_match('/(?:\?v=|\/embed\/|\.be\/)([^\s&]+)/', $media->video_url, $matches);
    $videoId = $matches[1] ?? null;
@endphp

@if($videoId)
    <!-- YouTube Thumbnail -->
    <div class="bd-blog-3-topic-thumb">
    <div class="video-container" id="video-container-{{ $media->id }}">
        <div class="video-thumbnail position-relative" style="cursor: pointer;" onclick="playVideo('{{ $media->id }}', '{{ $videoId }}')">
            <img src="https://img.youtube.com/vi/{{ $videoId }}/hqdefault.jpg" class="img-fluid" alt="Video Thumbnail">

            <!-- Optional Play Icon Overlay -->
            <div class="position-absolute top-50 start-50 translate-middle play-icon">
                ▶
            </div>
        </div>
    </div>
     </div>
                                        @elseif($media->video_url)
                                            <p><a href="{{ $media->video_url }}" target="_blank">View Video</a></p>
                                        @endif
                                {{-- <div class="bd-blog-3-topic-video-btn bd-pulse-btn">
                                    <a href="{{url('https://www.youtube.com/watch?v=4K6Sh1tsAW4')}}" class="popup-video"><i
                                            class="fa-solid fa-play"></i></a>
                                </div> --}}
                                </div>
                                {{-- <div class="bd-blog-3-topic-list theme-bg-2">
                                <ul>
                                    <li>Hoteliers see many faces come through their hotels, which is great
                                        because it’s a sign of steady business. </li>
                                    <li>The downside is that it can make it harder to remember who your
                                        repeat
                                        guests are.</li>
                                    <li>How can you, as an independent hotelier on trivago, increase traffic
                                        to
                                        your website to boost direct bookings</li>
                                    <li>There are different ways they can be implemented according to your
                                        management
                                        plan</li>
                                </ul>
                                </div> --}}
                            </div>
                            {{-- <div class="bd-blog-3-topic">
                                <h4 class="bd-blog-3-topic-title">Conclusion of This Blog</h4>
                                <p>But creating a blog is only half of the journey; partnering with a digital
                                marketing agency like NextGuest Digital will provide the expertise and
                                exposure necessary to put your blog in front of the right readers. A hotel
                                digital marketing agency like NextGuest will even help develop content for
                                your website that is purpose built to bring in prospective guests.</p>
                            </div> --}}
                            <div class="bd-blog-3-share d-flex justify-content-between align-items-center flex-wrap">
                                <div class="bd-blog-3-tag">
                                <ul>
                                    <li>Luxury</li>
                                    <li>Deals</li>
                                    <li>Booking</li>
                                </ul>
                                </div>
                                <div class="bd-blog-3-social">
                                <ul>
                                    <li><a target="_blank" href="{{url('https://www.facebook.com/')}}"><i
                                            class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a target="_blank" href="{{url('https://twitter.com/')}}"><i
                                            class="fa-brands fa-twitter"></i></a></li>
                                    <li><a target="_blank" href="{{url('https://www.youtube.com/')}}"><i
                                            class="fa-brands fa-youtube"></i></a>
                                    </li>
                                </ul>
                                </div>
                            </div>
                            <br>
                            <div class="bd-blog-3-details-nav">
                                <div class="bd-blog-3-details-nav-prev">

                               @if($previous)
                                    <a href="{{ route('media.show', $previous->id) }}" class="btn btn-outline-primary">&laquo; Previous</a>
                                @else
                                    <span></span>
                                @endif
                                    {{-- <a href="{{url('/blog-details')}}"> <i class="fa-regular fa-angle-left"></i></a>
                                <a href="{{url('/blog-details')}}">Previous
                                    Post</a> --}}
                                </div>
                                <span class="d-none d-md-block"><i class="flaticon-menu"></i></span>
                                <div class="bd-blog-3-details-nav-next">
                               @if($next)
                                    <a href="{{ route('media.show', $next->id) }}" class="btn btn-outline-primary">Next &raquo;</a>
                                @endif
                                    {{-- <a href="{{url('/blog-details')}}">Next Post</a>
                                <a href="{{url('/blog-details')}}"><i class="fa-regular fa-angle-right"></i></a> --}}
                                </div>
                            </div>
                        </div>
                        {{-- <div class="bd-blog-3-comment-wrap theme-bg-2">
                            <div class="bd-blog-3-comment">
                                <h4 class="bd-blog-3-comment-title mb-30">Comments</h4>
                                <ul>
                                <li>
                                    <div class="bd-blog-3-comment-box">
                                        <div class="bd-blog-3-comment-info mb-15">
                                            <div class="bd-blog-3-comment-thumb-wrap">
                                            <div class="bd-blog-3-comment-thumb">
                                                <img src="assets/img/blog/comment-1.png" alt="img not found!">
                                            </div>
                                            <div class="bd-blog-3-comment-author">
                                                <h5>Allen D.</h5>
                                                <span>27 Oct 2022 at 2:09pm</span>
                                            </div>
                                            </div>
                                            <div class="bd-blog-3-comment-replay-btn">
                                            <a href="#"><i class="fa-regular fa-reply"></i></a>
                                            </div>
                                        </div>
                                        <div class="bd-blog-3-comment-text">
                                            <p>The room. And also the stuff were amazing and friendly. They
                                            offered me a whole suit which was exceeded my expectations. The
                                            room was spacious, you can play cricket. </p>
                                        </div>
                                    </div>
                                </li>
                                </ul>
                            </div>
                            <div class="bd-comment-form">
                                <h3 class="bd-contact-form-title mb-25">Leave a replay</h3>
                                <form action="#">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="bd-contact-input mb-20">
                                            <label for="textarea">Comments <sup><i
                                                    class="fa-solid fa-star-of-life"></i></sup></label>
                                            <textarea name="textarea" id="textarea" class="theme-bg-2"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="bd-contact-input mb-30">
                                            <label for="name">Name <sup><i
                                                    class="fa-solid fa-star-of-life"></i></sup></label>
                                            <input id="name" type="text" class="theme-bg-2">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="bd-contact-input mb-30">
                                            <label for="email">Email <sup><i
                                                    class="fa-solid fa-star-of-life"></i></sup></label>
                                            <input id="email" type="text" class="theme-bg-2">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-30">
                                        <div class="bd-contact-agree d-flex align-items-center">
                                            <input class="ryl-cp" type="checkbox" id="check-agree">
                                            <label class="check-label ryl-cp" for="check-agree">Save Data for
                                            Next
                                            Comment</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="bd-blog__btn mb-15">
                                            <button type="submit" class="bd-btn">
                                            Post Comment <span><i class="fa-regular fa-arrow-right-long"></i></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div> --}}
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="bd-blog-3-sidebar-wrapper mb-60">
                    {{-- <div class="bd-blog-3-sidebar mb-50">
                    <h5 class="bd-blog-3-sidebar-title">Search</h5>
                    <div class="bd-blog-3-sidebar-content">
                        <div class="bd-blog-3-search">
                            <form action="#">
                                <div class="bd-blog-3-search-input-2">
                                <input type="text" placeholder="Type here..." id="bd-blog-3-search-input-label">
                                <div class="bd-blog-3-search-submit">
                                    <button type="submit"><i class="fa-regular fa-magnifying-glass"></i></button>
                                </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    </div> --}}
                    <div class="bd-blog-3-sidebar mb-50">
                    <h5 class="bd-blog-3-sidebar-title">Latest Blog</h5>
                    <div class="bd-blog-3-latest">
                        <ul>
                            {{-- @foreach($media as $post)
                            <li>
                                <div class="bd-blog-3-latest-content">
                                <div class="bd-blog-3-latest-thumb">
                                    <a href="{{url('/blog/view/'. $post->id)}}">
                                <img src="{{ asset('storage/' . $post->image_path) }}" class="media-image mb-3" alt="Media Image">
                               </a>
                                </div>
                                <div class="bd-blog-3-latest-title-wrap">
                                    <h6 class="bd-blog-3-latest-title"><a href="{{url('/blog/view/'. $post->id)}}">hey have
                                            {{ $post->title }}</a></h6>
                                    <div class="bd-blog-3-latest-meta">
                                        <i class="fa-solid fa-calendar-days"></i><span>{{ $post->created_at->format('d','M','y') }}</span>
                                    </div>
                                </div>
                                </div>
                            </li>
                            @endforeach --}}
                            {{-- <li>
                                <div class="bd-blog-3-latest-content">
                                <div class="bd-blog-3-latest-thumb">
                                    <a href="{{url('/blog-details')}}"><img src="{{asset('img/blog/blog3.jpg')}}"
                                            alt="img not found!"></a>
                                </div>
                                <div class="bd-blog-3-latest-title-wrap">
                                    <h6 class="bd-blog-3-latest-title"><a href="{{url('/blog-details')}}">We're
                                            changing the
                                            future of travel, Watch the
                                            steps </a></h6>
                                    <div class="bd-blog-3-latest-meta">
                                        <i class="fa-solid fa-calendar-days"></i><span>27 Oct 2022</span>
                                    </div>
                                </div>
                                </div>
                            </li>
                            <li>
                                <div class="bd-blog-3-latest-content">
                                <div class="bd-blog-3-latest-thumb">
                                    <a href="{{url('/blog-details')}}"><img src="{{asset('img/blog/blog4.jpg')}}"
                                            alt="img not found!"></a>
                                </div>
                                <div class="bd-blog-3-latest-title-wrap">
                                    <h6 class="bd-blog-3-latest-title"><a href="{{url('/blog-details')}}">Best
                                            hotel
                                            blogs
                                            and how to succeed with yours
                                            hotel </a></h6>
                                    <div class="bd-blog-3-latest-meta">
                                        <i class="fa-solid fa-calendar-days"></i><span>27 Oct 2022</span>
                                    </div>
                                </div>
                                </div>
                            </li> --}}
                        </ul>
                    </div>
                    </div>
                    <div class="bd-blog-3-sidebar mb-50">
                    <h5 class="bd-blog-3-sidebar-title">Categories</h5>
                    <div class="bd-blog-3-sidebar-cat">
                        <ul>
                            <li>
                                <a href="{{url('/dining')}}">
                                <span>Restaurant</span>
                                <span>(04)</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('/blog')}}">
                                <span>Hotel</span>
                                <span>(03)</span>
                                </a>

                            </li>
                            <li>
                                <a href="{{url('/event')}}">
                                <span>Event</span>
                                <span>(02)</span>
                                </a>
                            </li>
                            {{-- <li>
                                <a href="{{url('/')}}">
                                <span>Pool</span>
                                <span>(04)</span>
                                </a>
                            </li> --}}
                        </ul>
                    </div>
                    </div>
                    <div class="bd-blog-3-sidebar mb-50">
                    <h5 class="bd-blog-3-sidebar-title">Tags</h5>
                    <div class="bd-blog-3-sidebar-content">
                        <div class="bd-blog-3-sidebar-tag">
                            <ul>
                                <li><a href="{{url('/blog')}}">luxury</a></li>
                                <li> <a href="{{url('/blog')}}">deals</a></li>
                                <li><a href="{{url('/room')}}">booking</a></li>
                                <li><a href="{{url('/blog')}}">motel</a></li>
                                <li><a href="{{url('/blog')}}">cheap</a></li>
                                <li><a href="{{url('/dining')}}">Restaurant</a></li>
                                <li><a href="{{url('/blog')}}">Popular</a></li>
                            </ul>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>


@endsection
