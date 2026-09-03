<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Menampilkan daftar customer.
     */
    public function index()
    {
        $customers = Customer::withCount('bookings')
            ->withMax('bookings', 'booking_date')
            ->latest()
            ->paginate(10);

        return view('admin.customers.index', compact('customers'));
    }

    /**
     * Menampilkan detail customer.
     */
    public function show(Customer $customer)
    {
        $customer->load([
            'bookings' => function ($query) {
                $query->with([
                    'barber',
                    'service',
                ])
                ->latest('booking_date')
                ->latest('booking_time');
            }
        ]);

        return view(
            'admin.customers.show',
            compact('customer')
        );
    }
}