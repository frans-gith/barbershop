<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Barber;
use Illuminate\Http\Request;

class BarberController extends Controller
{
    public function index()
    {
        $barbers = Barber::latest()->paginate(10);

        return view(
            'admin.barbers.index',
            compact('barbers')
        );
    }

    public function create()
    {
        return view('admin.barbers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'phone' => ['nullable', 'string', 'max:20'],
            'specialization' => ['nullable', 'string', 'max:100'],
            'description' => ['nullable', 'string'],
            'photo' => ['nullable', 'image', 'max:2048'],
            'status' => ['required', 'in:active,inactive'],
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] =
                $request->file('photo')
                    ->store('barbers', 'public');
        }

        Barber::create($validated);

        return redirect()
            ->route('admin.barbers.index')
            ->with(
                'success',
                'Barber berhasil ditambahkan.'
            );
    }

    public function edit(Barber $barber)
    {
        return view(
            'admin.barbers.edit',
            compact('barber')
        );
    }

    public function update(
        Request $request,
        Barber $barber
    ) {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'phone' => ['nullable', 'string', 'max:20'],
            'specialization' => ['nullable', 'string', 'max:100'],
            'description' => ['nullable', 'string'],
            'photo' => ['nullable', 'image', 'max:2048'],
            'status' => ['required', 'in:active,inactive'],
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] =
                $request->file('photo')
                    ->store('barbers', 'public');
        }

        $barber->update($validated);

        return redirect()
            ->route('admin.barbers.index')
            ->with(
                'success',
                'Barber berhasil diperbarui.'
            );
    }

    public function destroy(Barber $barber)
    {
        $barber->delete();

        return redirect()
            ->route('admin.barbers.index')
            ->with(
                'success',
                'Barber berhasil dihapus.'
            );
    }
}