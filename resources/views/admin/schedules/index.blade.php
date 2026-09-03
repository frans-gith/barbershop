@extends('layouts.admin')

@section('title', 'Jadwal Barber')

@section('content')

<div class="space-y-8">

    {{-- HEADER --}}
    <div class="flex items-start justify-between">

        <div>
            <p class="text-xs tracking-[0.25em] text-gray-400 uppercase mb-2">
                Schedule Management
            </p>

            <h1 class="text-2xl font-semibold text-gray-900">
                Jadwal Barber
            </h1>

            <p class="mt-2 text-sm text-gray-500">
                Kelola jadwal kerja barber di barbershop.
            </p>
        </div>

        <a href="{{ route('admin.schedules.create') }}"
           class="inline-flex items-center gap-2 rounded-xl bg-black px-5 py-3
                  text-sm font-medium text-white transition hover:bg-gray-800">

            <span class="text-lg leading-none">+</span>

            Tambah Jadwal
        </a>

    </div>


    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))

        <div class="rounded-xl border border-green-200 bg-green-50 px-5 py-4">

            <div class="flex items-center gap-3">

                <div class="flex h-8 w-8 items-center justify-center rounded-full bg-green-100 text-green-700">
                    ✓
                </div>

                <p class="text-sm font-medium text-green-700">
                    {{ session('success') }}
                </p>

            </div>

        </div>

    @endif


    {{-- ERROR --}}
    @if($errors->any())

        <div class="rounded-xl border border-red-200 bg-red-50 px-5 py-4">

            <p class="mb-2 text-sm font-semibold text-red-700">
                Terjadi kesalahan:
            </p>

            <ul class="list-disc pl-5 text-sm text-red-600">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- MAIN CARD --}}
    <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white">

        {{-- CARD HEADER --}}
        <div class="flex items-center justify-between border-b border-gray-200 px-6 py-5">

            <div>

                <h2 class="text-base font-semibold text-gray-900">
                    Daftar Jadwal
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    Jadwal kerja seluruh barber.
                </p>

            </div>

            <div class="text-sm text-gray-400">
                {{ $schedules->total() }} jadwal
            </div>

        </div>


        {{-- TABLE --}}
        <div class="overflow-x-auto">

            <table class="w-full text-left">

                <thead class="border-b border-gray-200 bg-gray-50">

                    <tr>

                        <th class="px-6 py-4 text-xs font-medium uppercase tracking-wider text-gray-400">
                            BARBER
                        </th>

                        <th class="px-6 py-4 text-xs font-medium uppercase tracking-wider text-gray-400">
                            HARI
                        </th>

                        <th class="px-6 py-4 text-xs font-medium uppercase tracking-wider text-gray-400">
                            JAM KERJA
                        </th>

                        <th class="px-6 py-4 text-xs font-medium uppercase tracking-wider text-gray-400">
                            STATUS
                        </th>

                        <th class="px-6 py-4 text-right text-xs font-medium uppercase tracking-wider text-gray-400">
                            AKSI
                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-gray-100">

                    @forelse($schedules as $schedule)

                        <tr class="transition hover:bg-gray-50">

                            {{-- BARBER --}}
                            <td class="px-6 py-5">

                                <div class="flex items-center gap-3">

                                    {{-- FOTO --}}
                                    @if($schedule->barber && $schedule->barber->photo)

                                        <img
                                            src="{{ asset('storage/' . $schedule->barber->photo) }}"
                                            alt="{{ $schedule->barber->name }}"
                                            class="h-11 w-11 rounded-xl object-cover"
                                        >

                                    @else

                                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-black text-sm font-semibold text-white">

                                            {{ strtoupper(substr($schedule->barber->name ?? 'B', 0, 1)) }}

                                        </div>

                                    @endif


                                    <div>

                                        <p class="text-sm font-medium text-gray-900">
                                            {{ $schedule->barber->name ?? '-' }}
                                        </p>

                                        <p class="mt-1 text-xs text-gray-400">
                                            Barber
                                        </p>

                                    </div>

                                </div>

                            </td>


                            {{-- HARI --}}
                            <td class="px-6 py-5">

                                @php
                                    $days = [
                                        'monday' => 'Senin',
                                        'tuesday' => 'Selasa',
                                        'wednesday' => 'Rabu',
                                        'thursday' => 'Kamis',
                                        'friday' => 'Jumat',
                                        'saturday' => 'Sabtu',
                                        'sunday' => 'Minggu',
                                    ];

                                    $day = strtolower($schedule->day);
                                @endphp

                                <span class="inline-flex rounded-lg bg-gray-100 px-3 py-1.5 text-sm font-medium text-gray-700">

                                    {{ $days[$day] ?? ucfirst($schedule->day) }}

                                </span>

                            </td>


                            {{-- JAM --}}
                            <td class="px-6 py-5">

                                <div class="flex items-center gap-2 text-sm text-gray-700">

                                    <span>
                                        {{ \Carbon\Carbon::parse($schedule->start_time)->format('H:i') }}
                                    </span>

                                    <span class="text-gray-300">
                                        —
                                    </span>

                                    <span>
                                        {{ \Carbon\Carbon::parse($schedule->end_time)->format('H:i') }}
                                    </span>

                                </div>

                            </td>


                            {{-- STATUS --}}
                            <td class="px-6 py-5">

                                @if($schedule->status === 'active')

                                    <span class="inline-flex items-center gap-2 rounded-full bg-green-50 px-3 py-1.5 text-xs font-medium text-green-700">

                                        <span class="h-1.5 w-1.5 rounded-full bg-green-500"></span>

                                        Aktif

                                    </span>

                                @else

                                    <span class="inline-flex items-center gap-2 rounded-full bg-gray-100 px-3 py-1.5 text-xs font-medium text-gray-500">

                                        <span class="h-1.5 w-1.5 rounded-full bg-gray-400"></span>

                                        Tidak Aktif

                                    </span>

                                @endif

                            </td>


                            {{-- AKSI --}}
                            <td class="px-6 py-5">

                                <div class="flex justify-end gap-2">

                                    <a href="{{ route('admin.schedules.edit', $schedule) }}"
                                       class="rounded-lg border border-gray-200 px-4 py-2 text-xs font-medium text-gray-700 transition hover:border-gray-400 hover:bg-gray-50">

                                        Edit

                                    </a>


                                    <form
                                        action="{{ route('admin.schedules.destroy', $schedule) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus jadwal ini?')"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="rounded-lg border border-red-200 px-4 py-2 text-xs font-medium text-red-500 transition hover:bg-red-50"
                                        >

                                            Hapus

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5" class="px-6 py-16 text-center">

                                <div class="mx-auto max-w-sm">

                                    <div class="mx-auto mb-4 flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 text-xl">
                                        ◷
                                    </div>

                                    <h3 class="text-sm font-semibold text-gray-900">
                                        Belum ada jadwal
                                    </h3>

                                    <p class="mt-2 text-sm text-gray-500">
                                        Tambahkan jadwal kerja barber untuk mulai mengatur jadwal.
                                    </p>

                                    <a
                                        href="{{ route('admin.schedules.create') }}"
                                        class="mt-5 inline-flex rounded-lg bg-black px-4 py-2.5 text-sm font-medium text-white hover:bg-gray-800"
                                    >
                                        Tambah Jadwal
                                    </a>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- PAGINATION --}}
        @if($schedules->hasPages())

            <div class="border-t border-gray-200 px-6 py-4">

                {{ $schedules->links() }}

            </div>

        @endif

    </div>

</div>

@endsection