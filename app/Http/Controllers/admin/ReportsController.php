<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReportsController extends Controller
{
    public function index(Request $request)
    {
        // Filter tanggal
        $startDate = $request->filled('start_date')
            ? Carbon::parse($request->start_date)->startOfDay()
            : now()->startOfMonth();

        $endDate = $request->filled('end_date')
            ? Carbon::parse($request->end_date)->endOfDay()
            : now()->endOfDay();


        // Query utama booking
        $bookingQuery = Booking::with([
            'customer',
            'barber',
            'service'
        ])->whereBetween('booking_date', [
            $startDate->toDateString(),
            $endDate->toDateString()
        ]);


        // Statistik
        $totalBooking = (clone $bookingQuery)->count();

        $bookingSelesai = (clone $bookingQuery)
            ->where('status', 'completed')
            ->count();

        $bookingMenunggu = (clone $bookingQuery)
            ->where('status', 'pending')
            ->count();

        $bookingDibatalkan = (clone $bookingQuery)
            ->where('status', 'cancelled')
            ->count();


        // Pendapatan
     $totalPendapatan = (clone $bookingQuery)
    ->join(
        'services',
        'bookings.service_id',
        '=',
        'services.id'
    )
    ->where('bookings.status', 'completed')
    ->sum('services.price');


        // Riwayat booking
        $bookings = (clone $bookingQuery)
            ->orderByDesc('booking_date')
            ->orderByDesc('booking_time')
            ->paginate(10)
            ->withQueryString();


        // Layanan paling banyak dipesan
        $popularServices = Booking::query()
            ->select(
                'service_id',
                DB::raw('COUNT(*) as total')
            )
            ->whereBetween('booking_date', [
                $startDate->toDateString(),
                $endDate->toDateString()
            ])
            ->groupBy('service_id')
            ->orderByDesc('total')
            ->with('service')
            ->limit(5)
            ->get();


        // Barber paling banyak mendapatkan booking
        $popularBarbers = Booking::query()
            ->select(
                'barber_id',
                DB::raw('COUNT(*) as total')
            )
            ->whereBetween('booking_date', [
                $startDate->toDateString(),
                $endDate->toDateString()
            ])
            ->groupBy('barber_id')
            ->orderByDesc('total')
            ->with('barber')
            ->limit(5)
            ->get();


        return view('admin.reports.index', compact(
            'startDate',
            'endDate',
            'totalBooking',
            'bookingSelesai',
            'bookingMenunggu',
            'bookingDibatalkan',
            'totalPendapatan',
            'bookings',
            'popularServices',
            'popularBarbers'
        ));
    }
}