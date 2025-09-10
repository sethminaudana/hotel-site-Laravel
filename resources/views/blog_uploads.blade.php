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
                            <div class="bd-blog-3-topic">
                                <div class="bd-blog-3-topic-video mt-30 mb-35">
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
                                
                            </div>
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
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="bd-blog-3-sidebar-wrapper mb-60">
                   
                    <div class="bd-blog-3-sidebar mb-50">
                    <h5 class="bd-blog-3-sidebar-title">Latest Blog</h5>
                    <div class="bd-blog-3-latest">
                        <ul>
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
