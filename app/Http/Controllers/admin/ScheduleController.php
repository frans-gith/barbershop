<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Barber;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Menampilkan semua jadwal.
     */
    public function index()
    {
        $schedules = Schedule::with('barber')
            ->orderByRaw("
                CASE day
                    WHEN 'Senin' THEN 1
                    WHEN 'Selasa' THEN 2
                    WHEN 'Rabu' THEN 3
                    WHEN 'Kamis' THEN 4
                    WHEN 'Jumat' THEN 5
                    WHEN 'Sabtu' THEN 6
                    WHEN 'Minggu' THEN 7
                    ELSE 8
                END
            ")
            ->orderBy('start_time')
            ->paginate(10);

        return view(
            'admin.schedules.index',
            compact('schedules')
        );
    }

    /**
     * Form tambah jadwal.
     */
    public function create()
    {
        $barbers = Barber::where('status', 'active')
            ->orderBy('name')
            ->get();

        return view(
            'admin.schedules.create',
            compact('barbers')
        );
    }

    /**
     * Simpan jadwal baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'barber_id' => [
                'required',
                'exists:barbers,id',
            ],

            'day' => [
                'required',
                'in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu',
            ],

            'start_time' => [
                'required',
                'date_format:H:i',
            ],

            'end_time' => [
                'required',
                'date_format:H:i',
                'after:start_time',
            ],

            'status' => [
                'required',
                'in:active,inactive',
            ],
        ], [
            'barber_id.required' => 'Barber wajib dipilih.',
            'barber_id.exists' => 'Barber tidak ditemukan.',

            'day.required' => 'Hari wajib dipilih.',
            'day.in' => 'Hari tidak valid.',

            'start_time.required' => 'Jam mulai wajib diisi.',
            'start_time.date_format' => 'Format jam mulai tidak valid.',

            'end_time.required' => 'Jam selesai wajib diisi.',
            'end_time.date_format' => 'Format jam selesai tidak valid.',
            'end_time.after' => 'Jam selesai harus lebih besar dari jam mulai.',

            'status.required' => 'Status wajib dipilih.',
            'status.in' => 'Status tidak valid.',
        ]);

        Schedule::create($validated);

        return redirect()
            ->route('admin.schedules.index')
            ->with(
                'success',
                'Jadwal berhasil ditambahkan.'
            );
    }

    /**
     * Menampilkan detail jadwal.
     */
    public function show(Schedule $schedule)
    {
        $schedule->load('barber');

        return view(
            'admin.schedules.show',
            compact('schedule')
        );
    }

    /**
     * Form edit jadwal.
     */
    public function edit(Schedule $schedule)
    {
        $barbers = Barber::where('status', 'active')
            ->orderBy('name')
            ->get();

        return view(
            'admin.schedules.edit',
            compact(
                'schedule',
                'barbers'
            )
        );
    }

    /**
     * Update jadwal.
     */
    public function update(
        Request $request,
        Schedule $schedule
    ) {
        $validated = $request->validate([
            'barber_id' => [
                'required',
                'exists:barbers,id',
            ],

            'day' => [
                'required',
                'in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu',
            ],

            'start_time' => [
                'required',
                'date_format:H:i',
            ],

            'end_time' => [
                'required',
                'date_format:H:i',
                'after:start_time',
            ],

            'status' => [
                'required',
                'in:active,inactive',
            ],
        ], [
            'barber_id.required' => 'Barber wajib dipilih.',
            'barber_id.exists' => 'Barber tidak ditemukan.',

            'day.required' => 'Hari wajib dipilih.',
            'day.in' => 'Hari tidak valid.',

            'start_time.required' => 'Jam mulai wajib diisi.',
            'start_time.date_format' => 'Format jam mulai tidak valid.',

            'end_time.required' => 'Jam selesai wajib diisi.',
            'end_time.date_format' => 'Format jam selesai tidak valid.',
            'end_time.after' => 'Jam selesai harus lebih besar dari jam mulai.',

            'status.required' => 'Status wajib dipilih.',
            'status.in' => 'Status tidak valid.',
        ]);

        $schedule->update($validated);

        return redirect()
            ->route('admin.schedules.index')
            ->with(
                'success',
                'Jadwal berhasil diperbarui.'
            );
    }

    /**
     * Hapus jadwal.
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();

        return redirect()
            ->route('admin.schedules.index')
            ->with(
                'success',
                'Jadwal berhasil dihapus.'
            );
    }
}