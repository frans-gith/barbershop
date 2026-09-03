<?php

namespace App\Http\Controllers;

use App\Models\Barber;
use App\Models\Service;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::where('status', 'active')
            ->latest()
            ->get();

        $barbers = Barber::where('status', 'active')
            ->latest()
            ->get();

        return view('home.index', compact(
            'services',
            'barbers'
        ));
    }
}