<?php

use App\Http\Controllers\RoomController;
use App\Http\Controllers\UseController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Debug\VirtualRequestStack;

Route::get('/', [UseController::class, 'viewHome']);


Route::get('/about', function(){
    return view('about_us');
});

Route::get('/rooms', function(){
    return view('rooms');
});

Route::get('/dining', function(){
    return view('dining');
});

Route::get('/blog', function(){
    return view('blog');
});


Route::get('/contact', function(){
    return view('contact_us');
});


Route::get('/booking', function(){
    return view('booking');
});

Route::get('/pricing',function(){
    return view('pricing');
});

Route::get('/event',function(){
    return view('event');
});

Route::get('/event-details', function(){
    return view('event-details');
});

Route::get('/faq', function(){
    return view('faq');
});

Route::get('/offer-details', function(){
    return view('offer-details');
});

Route::get('/service-details', function(){
    return view('service-details');
});

Route::get('/room_details', function(){
    return view('room_details');
});

Route::get('/login', function(){
    return view('login');
});

Route::get('/rooms', [RoomController::class, 'getAllRooms']);

