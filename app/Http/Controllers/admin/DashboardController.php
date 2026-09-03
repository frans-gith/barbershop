<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Customer;
use App\Models\Barber;
use App\Models\Service;

class DashboardController extends Controller
{
    /**
     * ==========================================================
     * DASHBOARD ADMIN
     * ==========================================================
     */
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | TOTAL BOOKING
        |--------------------------------------------------------------------------
        */

        $totalBookings = Booking::count();


        /*
        |--------------------------------------------------------------------------
        | BOOKING MENUNGGU
        |--------------------------------------------------------------------------
        */

        $pendingBookings = Booking::where(
            'status',
            'pending'
        )->count();


        /*
        |--------------------------------------------------------------------------
        | BOOKING SELESAI
        |--------------------------------------------------------------------------
        */

        $completedBookings = Booking::where(
            'status',
            'completed'
        )->count();


        /*
        |--------------------------------------------------------------------------
        | BOOKING DIKONFIRMASI
        |--------------------------------------------------------------------------
        */

        $confirmedBookings = Booking::where(
            'status',
            'confirmed'
        )->count();


        /*
        |--------------------------------------------------------------------------
        | BOOKING DIBATALKAN
        |--------------------------------------------------------------------------
        */

        $cancelledBookings = Booking::where(
            'status',
            'cancelled'
        )->count();


        /*
        |--------------------------------------------------------------------------
        | TOTAL PELANGGAN
        |--------------------------------------------------------------------------
        */

        $totalCustomers = Customer::count();


        /*
        |--------------------------------------------------------------------------
        | TOTAL BARBER AKTIF
        |--------------------------------------------------------------------------
        */

        $totalBarbers = Barber::where(
            'status',
            'active'
        )->count();


        /*
        |--------------------------------------------------------------------------
        | TOTAL LAYANAN AKTIF
        |--------------------------------------------------------------------------
        */

        $totalServices = Service::where(
            'status',
            'active'
        )->count();


        /*
        |--------------------------------------------------------------------------
        | PENDAPATAN
        |--------------------------------------------------------------------------
        |
        | Hanya booking dengan status completed.
        |
        */

        $totalRevenue = Booking::where(
            'status',
            'completed'
        )->sum('total_price');


        /*
        |--------------------------------------------------------------------------
        | BOOKING TERBARU
        |--------------------------------------------------------------------------
        */

        $latestBookings = Booking::with([
            'customer',
            'barber',
            'service',
        ])
            ->latest()
            ->take(10)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | KIRIM DATA KE DASHBOARD
        |--------------------------------------------------------------------------
        */

        return view(
            'admin.dashboard',
            compact(
                'totalBookings',
                'pendingBookings',
                'completedBookings',
                'confirmedBookings',
                'cancelledBookings',
                'totalCustomers',
                'totalBarbers',
                'totalServices',
                'totalRevenue',
                'latestBookings'
            )
        );
    }
}