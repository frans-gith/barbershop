<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * ==========================================================
     * DAFTAR BOOKING
     * ==========================================================
     */
    public function index(Request $request)
    {
        $query = Booking::with([
            'customer',
            'barber',
            'service',
        ]);

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('date')) {
            $query->whereDate('booking_date', $request->date);
        }

        $bookings = $query
            ->orderByDesc('booking_date')
            ->orderBy('booking_time')
            ->paginate(15)
            ->withQueryString();

        return view(
            'admin.booking.index',
            compact('bookings')
        );
    }

    /**
     * ==========================================================
     * DETAIL BOOKING
     * ==========================================================
     */
    public function show(Booking $booking)
    {
        $booking->load([
            'customer',
            'barber',
            'service',
        ]);

        return view(
            'admin.booking.show',
            compact('booking')
        );
    }

    /**
     * ==========================================================
     * UPDATE STATUS BOOKING
     * ==========================================================
     */
    public function updateStatus(
        Request $request,
        Booking $booking
    ) {
        $validated = $request->validate([
            'status' => [
                'required',
                'in:pending,confirmed,completed,cancelled,rejected',
            ],
        ]);

        $booking->update([
            'status' => $validated['status'],
        ]);

        return back()->with(
            'success',
            'Status booking berhasil diperbarui.'
        );
    }

    /**
     * ==========================================================
     * HAPUS BOOKING
     * ==========================================================
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()
            ->route('admin.bookings.index')
            ->with(
                'success',
                'Booking berhasil dihapus.'
            );
    }
}