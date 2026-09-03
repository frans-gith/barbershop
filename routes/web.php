<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| PUBLIC / PELANGGAN
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| HALAMAN UTAMA WEBSITE
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])
    ->name('home');


/*
|--------------------------------------------------------------------------
| BOOKING PELANGGAN
|--------------------------------------------------------------------------
|
| GET  /booking  = menampilkan form booking
| POST /booking  = memproses dan menyimpan booking
| GET  /booking/success = halaman setelah booking berhasil
|
*/

Route::get('/booking', [
    App\Http\Controllers\BookingController::class,
    'index'
])->name('booking.index');

Route::post('/booking', [
    App\Http\Controllers\BookingController::class,
    'store'
])->name('booking.store');

Route::get('/booking/success', [
    App\Http\Controllers\BookingController::class,
    'success'
])->name('booking.success');


/*
|--------------------------------------------------------------------------
| CEK BOOKING PELANGGAN
|--------------------------------------------------------------------------
*/

Route::get('/cek-booking', [
    App\Http\Controllers\CheckBookingController::class,
    'index'
])->name('booking.check');

Route::post('/cek-booking', [
    App\Http\Controllers\CheckBookingController::class,
    'check'
])->name('booking.check.submit');


/*
|--------------------------------------------------------------------------
| LOGIN ADMIN
|--------------------------------------------------------------------------
*/

Route::get('/login', [
    App\Http\Controllers\AuthController::class,
    'showLogin'
])->name('login');

Route::post('/login', [
    App\Http\Controllers\AuthController::class,
    'login'
])->name('login.process');

Route::post('/logout', [
    App\Http\Controllers\AuthController::class,
    'logout'
])->name('logout');


/*
|--------------------------------------------------------------------------
| ADMIN PANEL
|--------------------------------------------------------------------------
*/

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'admin'])
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | DASHBOARD ADMIN
        |--------------------------------------------------------------------------
        */

        Route::get('/dashboard', [
            App\Http\Controllers\Admin\DashboardController::class,
            'index'
        ])->name('dashboard');


        /*
        |--------------------------------------------------------------------------
        | BARBER
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'barbers',
            App\Http\Controllers\Admin\BarberController::class
        )->except(['show']);


        /*
        |--------------------------------------------------------------------------
        | LAYANAN
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'services',
            App\Http\Controllers\Admin\ServiceController::class
        )->except(['show']);


        /*
        |--------------------------------------------------------------------------
        | JADWAL BARBER
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'schedules',
            App\Http\Controllers\Admin\ScheduleController::class
        )->except(['show']);


        /*
        |--------------------------------------------------------------------------
        | BOOKING ADMIN
        |--------------------------------------------------------------------------
        */

        Route::get('/bookings', [
            App\Http\Controllers\Admin\BookingController::class,
            'index'
        ])->name('bookings.index');

        Route::get('/bookings/{booking}', [
            App\Http\Controllers\Admin\BookingController::class,
            'show'
        ])->name('bookings.show');

        Route::put('/bookings/{booking}/status', [
            App\Http\Controllers\Admin\BookingController::class,
            'updateStatus'
        ])->name('bookings.status');

        Route::delete('/bookings/{booking}', [
            App\Http\Controllers\Admin\BookingController::class,
            'destroy'
        ])->name('bookings.destroy');


        /*
        |--------------------------------------------------------------------------
        | CUSTOMER / PELANGGAN
        |--------------------------------------------------------------------------
        */

        Route::get('/customers', [
            App\Http\Controllers\Admin\CustomerController::class,
            'index'
        ])->name('customers.index');

        Route::get('/customers/{customer}', [
            App\Http\Controllers\Admin\CustomerController::class,
            'show'
        ])->name('customers.show');


        /*
        |--------------------------------------------------------------------------
        | LAPORAN
        |--------------------------------------------------------------------------
        */

        Route::get('/reports', [
            App\Http\Controllers\Admin\ReportsController::class,
            'index'
        ])->name('reports.index');

    });


/*
|--------------------------------------------------------------------------
| STORAGE
|--------------------------------------------------------------------------
|
| Untuk menampilkan file dari:
| storage/app/public
|
*/

Route::get('/storage/{path}', function ($path) {

    $filePath = storage_path('app/public/' . $path);

    if (!file_exists($filePath)) {
        abort(404);
    }

    return response()->file($filePath);

})->where('path', '.*')
  ->name('storage.local');