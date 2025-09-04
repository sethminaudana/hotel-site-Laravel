<?php

use App\Events\ReservationCreated;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\AdminBlogController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UseController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminFoodController;
use App\Http\Controllers\AdminNotificationController;
use App\Http\Controllers\MediaController;
// use Illuminate\Queue\Console\RetryCommand;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminRoomController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\BookingApiController;
use App\Http\Controllers\RegisterAdminController;
use App\Models\Reservation;
//use App\Http\Controllers\ReservationController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\AdminBookingController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FcmController;
use App\Http\Controllers\RoomBookingController;
use App\Http\Controllers\SubscriberController;
use Illuminate\Queue\Console\RetryCommand;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpKernel\Debug\VirtualRequestStack;

Route::get('/', [UseController::class, 'viewHome'])->name('home');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/about', function(){
    return view('about_us');
});

// Route::get('/rooms', function(){
//     return view('rooms');
// });

Route::get('/dining', function(){
    return view('dining');
});

// Route::get('/blog', function(){
//     return view('blog');
// });
Route::get('/blog', [MediaController::class, 'showcard'])->name('media.showcard');



Route::get('/contact', function(){
    return view('contact_us');
});


// Route::get('/booking', function(){
//     return view('booking');
// });
Route::get('/booking/{id}', [RoomController::class, 'showRoomDetailsform'])->name('rooms.book');
Route::post('/booking/{id}', [ReservationController::class, 'submitForm'])->name('rooms.book.submit');
Route::get('/search-booking', [ReservationController::class, 'searchBooking'])->name('booking.search');

// Route::get('/booking/{id}', [BookingController::class,'']);

Route::get('/pricing',function(){
    return view('pricing');
});

Route::get('/event',function(){
    return view('event');
});

Route::get('/event-details', function(){
    return view('event-details');
});



// Route::get('/offer-details', function(){
//     return view('offer-details');
// });

Route::get('/service-details', function(){
    return view('service-details');
});

// Route::get('/room_details', function(){
//     return view('room_details');
// });

// Route::get('/login', function(){
//     return view('login');
// });

Route::get('/room', [RoomController::class, 'getAllRooms'])->name('rooms.all');
Route::get('/media/create', [MediaController::class, 'create'])->name('media.create');
Route::post('/media/store', [MediaController::class, 'store'])->name('media.store');
// Route::get('/media/list', [MediaController::class, 'index'])->name('media.index');
// Route::get('/room_details/{id}', [RoomController::class, 'showRoomDetails'])->name('room.show');

Route::get('/blog/view/{id}', [MediaController::class, 'show'])->name('media.show');
// Route::get('/blog/view/{id}', [MediaController::class, 'lblog'])->name('media.lbog');
Route::get('/blog', [MediaController::class, 'search'])->name('blog.search');
// Route::get('/blog', [MediaController::class, 'sortbydate'])->name('blog.sortbydate');

Route::get('/room_details/{id}', [RoomController::class, 'showRoomDetails'])->name('room.show');

Route::get('/dining',[FoodController::class,'showAllCategories']);
Route::get('/dining/items/{id}',[FoodController::class, 'getItemsByCategory']);


// admin panel routes ------------------------------------------------------------------------------

Route::middleware(['auth','is_admin'])->group(function(){ //middlware
    // Route::get('/dashboard', function () {
    //     return view('admin.dashboard');
    // });


    // Route::get('/admin-home',function(){
    //     return view('admin.admin-home');
    // });

    Route::get('/admin',[AdminDashboardController::class, 'dashboard']);

    // Route::get('/admin-profile',function(){
    //     return view('admin.profile');
    // });

    Route::get('/user-registration', function(){
        return view('admin.user-registration');
    });

    Route::get('/user-management', function(){
        return view('admin.user-management');
    });

    // Route::get('/manage-rooms', function(){
    //     return view('admin.manage-rooms');
    // });

    Route::get('/manage-foods', function() {
        return view('admin.manage-foods');
    });

    // Route::get('/manage-blogs', function(){
    //     return view('admin.manage-blogs');
    // });

    // Route::get('/manage-reservations', function(){
    //     return view('admin.manage-reservations');
    // });

    Route::get('/role-permission', function(){
        return view('admin.role-permission');
    });

    Route::get('/notifications', function(){
        return view('admin.notifications');
    });

    Route::get('/manage-contacts', function(){
        return view('admin.manage-contacts');
    });

    Route::get('/settings', function(){
        return view('admin.settings');
    });

    Route::get('/reports', function(){
        return view('admin.reports');
    });


    //admin reservations
    // Route::get('/admin-reservations', function(){
    //     return view('admin.admin-reservations');
    // });

    Route::get('/admin-reservations', [AdminBookingController::class, 'showAvailableRooms']);
    Route::post('/admin-reservations/{id}', [ReservationController::class, 'submitForm'])->name('admin.book.submit');

    Route::get('/user-registration', [AdminController::class, 'showAdminList'])->name('admin.user-registration');


    Route::post('/new-admin-user', [RegisterAdminController::class, 'store']);

    Route::delete('/remove/{id}',[AdminController::class, 'destroy'])->name('admin.user-registration');

    // admin manage reservation
    Route::get('/manage-reservations',[ReservationController::class, 'manageReservations'])->name('reservations.manageReservations');
    Route::post('/manage-reservations/update-status',[ReservationController::class,'updateStatus'])->name('reservations.updateStatus');
    Route::get('/manage-reservations/{id}',[ReservationController::class,'show'])->name('reservations.show');

    // admin manage rooms
    Route::get('/manage-rooms',[AdminRoomController::class,'manageRooms']);
    Route::post('/manage-rooms/store',[AdminRoomController::class,'storeRoomDetails'])->name('manage-rooms.manageRooms');
    Route::post('/manage-rooms/update-status', [AdminRoomController::class, 'updateStatus']);
    Route::get('/manage-rooms/{id}', [AdminRoomController::class, 'show'])->name('manage-rooms.show');
    Route::delete('/manage-rooms/delete/{id}', [AdminRoomController::class, 'destroy']);
    Route::get('/manage-rooms/edit/{id}', [AdminRoomController::class,'edit']);
    Route::post('/manage-rooms/update/{id}', [AdminRoomController::class,'update']);

    // Route::get('/rooms/search', [AdminRoomController::class, 'searchAvailableRooms'])->name('rooms.search');



    // Route::get('/manage-rooms',[AdminRoomController::class, 'showExitingFeatures']);

    //admin manage foods
    Route::get('/manage-foods',[AdminFoodController::class, 'showAllFoods']);
    Route::post('/manage-foods/store',[AdminFoodController::class, 'store']);
    Route::delete('/manage-foods/delete/{id}', [AdminFoodController::class, 'destroy']);

    //admin notification handler
    Route::get('/notifications', [AdminNotificationController::class, 'notifications']);
    Route::post('/notifications/read/{id}',[AdminNotificationController::class, 'markNotificationAsRead']);
    Route::get('/notifications/unread-latest',[AdminNotificationController::class,'getLatestUnread']);
    Route::delete('/notifications/clear-old-read', [AdminNotificationController::class, 'clearAllReadNotifications']);



    //admin blog routes
    Route::get('/manage-blogs', [AdminBlogController::class,'search']);
    Route::post('/manage-blogs/store',[AdminBlogController::class,'store']);

    Route::get('/notifications/unread-count', function(){
        $count = Reservation::where('is_read', false)->latest()->get();
        return response()->json(['count' => $count]);
    });

    //admin map controller
    Route::post('/admin/map', [SettingController::class, 'updateMap'])->name('admin.update.map');


    //admin profile controller
    Route::get('/admin-profile', [AdminProfileController::class, 'filter']);
    Route::get('admin-profile/edit/{id}', [AdminProfileController::class, 'edit']);
    Route::put('/admin-profile/{id}',[AdminProfileController::class,'update']);




});

//admin firebase controllers
Route::put('/update-device-token', [FcmController::class, 'updateDeviceToken'])->name('update-device-token');
Route::post('/send-fcm-notification', [FcmController::class,'sendFcmNotification'])->name('send-fcm-notification');
// Route::put('/remove-device-token' , [FcmController::class,'removeDeviceToken']);

Route::post('/subscribe-to-topic', [FcmController::class, 'subscribeToTopic']);
Route::post('/unsubscribe-from-topic',[FcmController::class, 'unsubscribeFromTopic']);


// admin manage rooms

// Route::get('/manage-rooms',[AdminRoomController::class,'manageRooms']);


Route::get('/admin/reservations/search', [ReservationController::class, 'search'])->name('admin.reservations.search');


Route::get('/manage-offers',[OfferController::class, 'index'])->name('manage-offers');
Route::post('/manage-offers/store', [OfferController::class, 'store'])->name('admin.offers.store');
// Optional: show single offer
Route::get('/manage-offers/{offer}', [OfferController::class, 'show'])->name('admin.offers.show');

// Optional: edit offer
Route::get('/manage-offers/{offer}/edit', [OfferController::class, 'edit'])->name('admin.offers.edit');

// Optional: update offer
Route::post('/manage-offers/{offer}/update', [OfferController::class, 'update'])->name('admin.offers.update');

// Optional: delete offer
Route::delete('/manage-offers/{id}/delete', [OfferController::class, 'destroy'])->name('offers.destroy');

// Route::get('/api/rooms/{room}/unavailable-dates',
//     [BookingApiController::class, 'unavailable']
// )->name('api.rooms.unavailable');


// Route::get('/booking/{id}', [BookingController::class, 'create'])->name('booking.create');


// contact us routes
Route::post('/contacts/store', [ContactController::class, 'store'])->name('contacts.store');

 Route::get('/admin/aboutusimage/update',function(){
        return view('admin.aboutus_settings');
    });
//Route::get('/admin/aboutusimage/update', [AboutUsController::class, 'updateImg'])->name('admin.aboutus.updateimg');
Route::post('/admin/aboutusimage/update', [AboutUsController::class, 'updateImg'])->name('admin.aboutus.updateimg');


Route::get('/rooms/bookingmodel/submit/{id}', [RoomController::class, 'bookingSubmit'])->name('rooms.bookingmodel.submit');

Route::post('/subscribe', [SubscriberController::class, 'store'])->name('subscribe');
