<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class CheckBookingController extends Controller
{
    public function index()
    {
        return view('booking.check');
    }

    public function check(Request $request)
    {
        $validated = $request->validate([
            'booking_code' => [
                'required',
                'string',
            ],
        ]);

        $booking = Booking::with([
            'customer',
            'barber',
            'service',
        ])
            ->where(
                'booking_code',
                strtoupper(
                    trim($validated['booking_code'])
                )
            )
            ->first();

        if (!$booking) {
            return back()
                ->withInput()
                ->withErrors([
                    'booking_code' =>
                        'Booking tidak ditemukan.'
                ]);
        }

        return view(
            'booking.check',
            compact('booking')
        );
    }
}