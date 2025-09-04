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
                            <img src="assets/img/breadcrumb/breadcrumb-bg.png" alt="breadcrumb img">
                            </div>
                            <div class="bd-breadcrumb__content text-center">
                            <h1 class="bd-breadcrumb__title mb-20">Pricing Plan</h1>
                            <div class="bd-breadcrumb__list">
                                <span><a href="{{url('/')}}">home</a></span>
                                <span>Pricing Plan</span>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb area end here  -->

        <!-- pricing plan area start here -->
        @include('components.pricing_plan')
        <!-- pricing plan area end here -->

        <!-- service area start here  -->
       @include('components.services')
        <!-- service area end here  -->
@endsection

