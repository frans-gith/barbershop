<?php

namespace App\Http\Controllers;

use App\Mail\BookingInvoiceMail;
use App\Models\Barber;
use App\Models\Booking;
use App\Models\Customer;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    /**
     * ==========================================================
     * HALAMAN BOOKING PELANGGAN
     * ==========================================================
     */
    public function index()
    {
        $services = Service::where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->get();

        $barbers = Barber::where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('booking.index', compact(
            'services',
            'barbers'
        ));
    }


    /**
     * ==========================================================
     * SIMPAN BOOKING
     * ==========================================================
     */
    public function store(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | VALIDASI
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:100',
            ],

            'phone' => [
                'required',
                'string',
                'max:20',
            ],

            // EMAIL WAJIB karena invoice akan dikirim ke customer
            'email' => [
                'required',
                'email',
                'max:100',
            ],

            'service_id' => [
                'required',
                'exists:services,id',
            ],

            'barber_id' => [
                'required',
                'exists:barbers,id',
            ],

            'booking_date' => [
                'required',
                'date',
                'after_or_equal:today',
            ],

            'booking_time' => [
                'required',
                'date_format:H:i',
            ],

            'notes' => [
                'nullable',
                'string',
                'max:500',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | AMBIL LAYANAN
        |--------------------------------------------------------------------------
        */

        $service = Service::findOrFail(
            $validated['service_id']
        );


        /*
        |--------------------------------------------------------------------------
        | AMBIL BARBER
        |--------------------------------------------------------------------------
        */

        $barber = Barber::findOrFail(
            $validated['barber_id']
        );


        /*
        |--------------------------------------------------------------------------
        | CEK BARBER AKTIF
        |--------------------------------------------------------------------------
        */

        if ($barber->status !== 'active') {
            return back()
                ->withInput()
                ->withErrors([
                    'barber_id' => 'Barber tidak tersedia.',
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | CEK TANGGAL
        |--------------------------------------------------------------------------
        */

        $date = Carbon::parse(
            $validated['booking_date']
        );


        /*
        |--------------------------------------------------------------------------
        | KONVERSI HARI INGGRIS → INDONESIA
        |--------------------------------------------------------------------------
        */

        $dayMap = [
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu',
            'Sunday' => 'Minggu',
        ];

        $day = $dayMap[$date->format('l')];


        /*
        |--------------------------------------------------------------------------
        | CEK JADWAL BARBER
        |--------------------------------------------------------------------------
        |
        | Menggunakan kolom "status" karena tabel schedules
        | menggunakan status active/inactive.
        |
        */

        $schedule = $barber->schedules()
            ->where('day', $day)
              ->where('is_active', true)
            ->first();


        if (!$schedule) {
            return back()
                ->withInput()
                ->withErrors([
                    'booking_date' =>
                        'Barber tidak bekerja pada hari tersebut.',
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | CEK JAM KERJA BARBER
        |--------------------------------------------------------------------------
        */

        $bookingTime = Carbon::createFromFormat(
            'H:i',
            $validated['booking_time']
        )->format('H:i');

        $startTime = Carbon::parse(
            $schedule->start_time
        )->format('H:i');

        $endTime = Carbon::parse(
            $schedule->end_time
        )->format('H:i');


        if (
            $bookingTime < $startTime ||
            $bookingTime >= $endTime
        ) {
            return back()
                ->withInput()
                ->withErrors([
                    'booking_time' =>
                        'Jam booking berada di luar jadwal barber.',
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | CEK DOUBLE BOOKING
        |--------------------------------------------------------------------------
        */

        $alreadyBooked = Booking::where(
            'barber_id',
            $validated['barber_id']
        )
            ->whereDate(
                'booking_date',
                $validated['booking_date']
            )
            ->where(
                'booking_time',
                $bookingTime
            )
            ->whereIn('status', [
                'pending',
                'confirmed',
            ])
            ->exists();


        if ($alreadyBooked) {
            return back()
                ->withInput()
                ->withErrors([
                    'booking_time' =>
                        'Jam tersebut sudah dibooking. Silakan pilih jam lain.',
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | CARI / BUAT CUSTOMER
        |--------------------------------------------------------------------------
        */

        $customer = Customer::updateOrCreate(
            [
                'phone' => $validated['phone'],
            ],
            [
                'name' => $validated['name'],
                'email' => $validated['email'],
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | GENERATE KODE BOOKING
        |--------------------------------------------------------------------------
        */

        do {
            $bookingCode =
                'BRB-' .
                now()->format('ymd') .
                '-' .
                strtoupper(Str::random(5));

        } while (
            Booking::where(
                'booking_code',
                $bookingCode
            )->exists()
        );


        /*
        |--------------------------------------------------------------------------
        | SIMPAN BOOKING
        |--------------------------------------------------------------------------
        */

        $booking = Booking::create([
            'booking_code' => $bookingCode,

            'customer_id' => $customer->id,

            'barber_id' => $barber->id,

            'service_id' => $service->id,

            'booking_date' => $validated['booking_date'],

            'booking_time' => $bookingTime,

            'notes' => $validated['notes'] ?? null,

            'total_price' => $service->price,

            'status' => 'pending',
        ]);


        /*
        |--------------------------------------------------------------------------
        | LOAD RELASI UNTUK INVOICE
        |--------------------------------------------------------------------------
        */

        $booking->load([
            'customer',
            'barber',
            'service',
        ]);


        /*
        |--------------------------------------------------------------------------
        | KIRIM INVOICE KE EMAIL CUSTOMER
        |--------------------------------------------------------------------------
        */

        Mail::to($customer->email)
            ->send(
                new BookingInvoiceMail($booking)
            );


        /*
        |--------------------------------------------------------------------------
        | REDIRECT KE HALAMAN SUCCESS
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('booking.success')
            ->with('booking', $booking->booking_code);
    }


    /**
     * ==========================================================
     * HALAMAN BOOKING BERHASIL
     * ==========================================================
     */
    public function success()
    {
        /*
        |--------------------------------------------------------------------------
        | AMBIL KODE BOOKING DARI SESSION
        |--------------------------------------------------------------------------
        */

        $bookingCode = session('booking');


        /*
        |--------------------------------------------------------------------------
        | JIKA TIDAK ADA SESSION
        |--------------------------------------------------------------------------
        */

        if (!$bookingCode) {
            return redirect()
                ->route('booking.index');
        }


        /*
        |--------------------------------------------------------------------------
        | AMBIL DATA BOOKING
        |--------------------------------------------------------------------------
        */

        $booking = Booking::with([
            'customer',
            'barber',
            'service',
        ])
            ->where(
                'booking_code',
                $bookingCode
            )
            ->first();


        /*
        |--------------------------------------------------------------------------
        | JIKA BOOKING TIDAK DITEMUKAN
        |--------------------------------------------------------------------------
        */

        if (!$booking) {
            return redirect()
                ->route('booking.index')
                ->withErrors([
                    'booking' =>
                        'Data booking tidak ditemukan.',
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | TAMPILKAN SUCCESS PAGE
        |--------------------------------------------------------------------------
        */

        return view(
            'booking.success',
            compact('booking')
        );
    }
}