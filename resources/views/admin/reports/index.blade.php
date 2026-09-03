@extends('layouts.admin')

@section('title', 'Laporan')

@section('content')

<div class="space-y-7">

    {{-- HEADER --}}
    <div>
        <p class="text-[10px] uppercase tracking-[0.25em] text-zinc-400">
            Business Report
        </p>

        <div class="mt-2 flex flex-col gap-5 lg:flex-row lg:items-end lg:justify-between">

            <div>
                <h1 class="text-2xl font-semibold tracking-tight text-zinc-950">
                    Laporan
                </h1>

                <p class="mt-1 text-sm text-zinc-500">
                    Ringkasan aktivitas dan performa barbershop.
                </p>
            </div>


            {{-- FILTER --}}
            <form
                action="{{ route('admin.reports.index') }}"
                method="GET"
                class="flex flex-col sm:flex-row gap-2"
            >

                <div>
                    <label class="mb-1 block text-[10px] uppercase tracking-wider text-zinc-400">
                        Mulai
                    </label>

                    <input
                        type="date"
                        name="start_date"
                        value="{{ $startDate->format('Y-m-d') }}"
                        class="h-10 w-full rounded-xl border border-zinc-200 bg-white px-3 text-xs text-zinc-700 outline-none focus:border-zinc-900"
                    >
                </div>


                <div>
                    <label class="mb-1 block text-[10px] uppercase tracking-wider text-zinc-400">
                        Sampai
                    </label>

                    <input
                        type="date"
                        name="end_date"
                        value="{{ $endDate->format('Y-m-d') }}"
                        class="h-10 w-full rounded-xl border border-zinc-200 bg-white px-3 text-xs text-zinc-700 outline-none focus:border-zinc-900"
                    >
                </div>


                <button
                    type="submit"
                    class="h-10 self-end rounded-xl bg-zinc-950 px-5 text-xs font-medium text-white transition hover:bg-zinc-800"
                >
                    Tampilkan
                </button>

            </form>

        </div>
    </div>


    {{-- PERIODE --}}
    <div class="rounded-2xl border border-zinc-200 bg-white px-5 py-4">

        <div class="flex items-center gap-3">

            <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-zinc-100 text-zinc-700">
                ◷
            </div>

            <div>
                <p class="text-[10px] uppercase tracking-wider text-zinc-400">
                    Periode
                </p>

                <p class="mt-0.5 text-sm font-medium text-zinc-800">
                    {{ $startDate->format('d M Y') }}
                    <span class="mx-1 text-zinc-300">—</span>
                    {{ $endDate->format('d M Y') }}
                </p>
            </div>

        </div>

    </div>


    {{-- STATISTIK --}}
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">


        {{-- TOTAL --}}
        <div class="rounded-2xl border border-zinc-200 bg-white p-5">

            <div class="flex items-start justify-between">

                <div>
                    <p class="text-xs text-zinc-400">
                        Total Booking
                    </p>

                    <p class="mt-2 text-2xl font-semibold text-zinc-950">
                        {{ number_format($totalBooking) }}
                    </p>
                </div>

                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-zinc-100 text-sm text-zinc-700">
                    #
                </div>

            </div>

            <p class="mt-4 text-[11px] text-zinc-400">
                Seluruh booking
            </p>

        </div>


        {{-- SELESAI --}}
        <div class="rounded-2xl border border-zinc-200 bg-white p-5">

            <div class="flex items-start justify-between">

                <div>
                    <p class="text-xs text-zinc-400">
                        Selesai
                    </p>

                    <p class="mt-2 text-2xl font-semibold text-zinc-950">
                        {{ number_format($bookingSelesai) }}
                    </p>
                </div>

                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">
                    ✓
                </div>

            </div>

            <p class="mt-4 text-[11px] text-zinc-400">
                Booking selesai
            </p>

        </div>


        {{-- MENUNGGU --}}
        <div class="rounded-2xl border border-zinc-200 bg-white p-5">

            <div class="flex items-start justify-between">

                <div>
                    <p class="text-xs text-zinc-400">
                        Menunggu
                    </p>

                    <p class="mt-2 text-2xl font-semibold text-zinc-950">
                        {{ number_format($bookingMenunggu) }}
                    </p>
                </div>

                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-amber-50 text-amber-600">
                    ◷
                </div>

            </div>

            <p class="mt-4 text-[11px] text-zinc-400">
                Perlu ditangani
            </p>

        </div>


        {{-- PENDAPATAN --}}
        <div class="rounded-2xl bg-zinc-950 p-5 text-white">

            <div class="flex items-start justify-between">

                <div>
                    <p class="text-xs text-zinc-400">
                        Pendapatan
                    </p>

                    <p class="mt-2 text-xl font-semibold">
                        Rp {{ number_format($totalPendapatan, 0, ',', '.') }}
                    </p>
                </div>

                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-white/10 text-xs">
                    Rp
                </div>

            </div>

            <p class="mt-4 text-[11px] text-zinc-500">
                Booking yang selesai
            </p>

        </div>

    </div>


    {{-- ANALISIS --}}
    <div class="grid grid-cols-1 gap-5 xl:grid-cols-2">


        {{-- LAYANAN --}}
        <div class="overflow-hidden rounded-2xl border border-zinc-200 bg-white">

            <div class="border-b border-zinc-100 px-5 py-5">

                <h2 class="text-sm font-semibold text-zinc-900">
                    Layanan Terpopuler
                </h2>

                <p class="mt-1 text-xs text-zinc-400">
                    Layanan yang paling banyak dipesan.
                </p>

            </div>


            <div class="px-5">

                @forelse($popularServices as $item)

                    <div class="flex items-center justify-between border-b border-zinc-100 py-4 last:border-0">

                        <div class="flex items-center gap-3">

                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-zinc-100 text-xs font-semibold text-zinc-700">
                                {{ $loop->iteration }}
                            </div>

                            <div>
                                <p class="text-sm font-medium text-zinc-800">
                                    {{ $item->service->name ?? 'Layanan dihapus' }}
                                </p>

                                <p class="mt-0.5 text-[11px] text-zinc-400">
                                    {{ $item->total }} booking
                                </p>
                            </div>

                        </div>

                        <span class="text-xs font-medium text-zinc-500">
                            {{ $item->total }}
                        </span>

                    </div>

                @empty

                    <div class="py-12 text-center text-sm text-zinc-400">
                        Belum ada data.
                    </div>

                @endforelse

            </div>

        </div>


        {{-- BARBER --}}
        <div class="overflow-hidden rounded-2xl border border-zinc-200 bg-white">

            <div class="border-b border-zinc-100 px-5 py-5">

                <h2 class="text-sm font-semibold text-zinc-900">
                    Performa Barber
                </h2>

                <p class="mt-1 text-xs text-zinc-400">
                    Barber berdasarkan jumlah booking.
                </p>

            </div>


            <div class="px-5">

                @forelse($popularBarbers as $item)

                    <div class="flex items-center justify-between border-b border-zinc-100 py-4 last:border-0">

                        <div class="flex items-center gap-3">

                            @if($item->barber && $item->barber->photo)

                                <img
                                    src="{{ asset('storage/' . $item->barber->photo) }}"
                                    alt="{{ $item->barber->name }}"
                                    class="h-9 w-9 rounded-lg object-cover"
                                >

                            @else

                                <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-zinc-950 text-xs font-semibold text-white">
                                    {{ strtoupper(substr($item->barber->name ?? 'B', 0, 1)) }}
                                </div>

                            @endif


                            <div>

                                <p class="text-sm font-medium text-zinc-800">
                                    {{ $item->barber->name ?? 'Barber dihapus' }}
                                </p>

                                <p class="mt-0.5 text-[11px] text-zinc-400">
                                    {{ $item->total }} booking
                                </p>

                            </div>

                        </div>

                        <span class="text-xs font-medium text-zinc-500">
                            {{ $item->total }}
                        </span>

                    </div>

                @empty

                    <div class="py-12 text-center text-sm text-zinc-400">
                        Belum ada data.
                    </div>

                @endforelse

            </div>

        </div>

    </div>


    {{-- RIWAYAT BOOKING --}}
    <div class="overflow-hidden rounded-2xl border border-zinc-200 bg-white">

        <div class="flex items-center justify-between border-b border-zinc-100 px-5 py-5">

            <div>
                <h2 class="text-sm font-semibold text-zinc-900">
                    Riwayat Booking
                </h2>

                <p class="mt-1 text-xs text-zinc-400">
                    Daftar booking pada periode yang dipilih.
                </p>
            </div>

            <span class="text-xs text-zinc-400">
                {{ $bookings->total() }} data
            </span>

        </div>


        <div class="overflow-x-auto">

            <table class="w-full">

                <thead>

                    <tr class="border-b border-zinc-100">

                        <th class="px-5 py-4 text-left text-[10px] font-medium uppercase tracking-wider text-zinc-400">
                            Pelanggan
                        </th>

                        <th class="px-5 py-4 text-left text-[10px] font-medium uppercase tracking-wider text-zinc-400">
                            Barber
                        </th>

                        <th class="px-5 py-4 text-left text-[10px] font-medium uppercase tracking-wider text-zinc-400">
                            Layanan
                        </th>

                        <th class="px-5 py-4 text-left text-[10px] font-medium uppercase tracking-wider text-zinc-400">
                            Tanggal
                        </th>

                        <th class="px-5 py-4 text-left text-[10px] font-medium uppercase tracking-wider text-zinc-400">
                            Jam
                        </th>

                        <th class="px-5 py-4 text-left text-[10px] font-medium uppercase tracking-wider text-zinc-400">
                            Status
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($bookings as $booking)

                        @php

                            $statusClass = match($booking->status) {

                                'completed' =>
                                    'bg-emerald-50 text-emerald-700',

                                'pending' =>
                                    'bg-amber-50 text-amber-700',

                                'cancelled' =>
                                    'bg-red-50 text-red-600',

                                default =>
                                    'bg-zinc-100 text-zinc-600',

                            };

                            $statusLabel = match($booking->status) {

                                'completed' => 'Selesai',

                                'pending' => 'Menunggu',

                                'cancelled' => 'Dibatalkan',

                                default => ucfirst($booking->status),

                            };

                        @endphp


                        <tr class="border-b border-zinc-100 last:border-0 hover:bg-zinc-50 transition">


                            {{-- CUSTOMER --}}
                            <td class="px-5 py-4">

                                <p class="text-sm font-medium text-zinc-800">
                                    {{ $booking->customer->name ?? '-' }}
                                </p>

                                <p class="mt-0.5 text-[11px] text-zinc-400">
                                    {{ $booking->customer->phone ?? '-' }}
                                </p>

                            </td>


                            {{-- BARBER --}}
                            <td class="px-5 py-4 text-sm text-zinc-600">
                                {{ $booking->barber->name ?? '-' }}
                            </td>


                            {{-- SERVICE --}}
                            <td class="px-5 py-4">

                                <span class="rounded-lg bg-zinc-100 px-2.5 py-1 text-xs text-zinc-600">
                                    {{ $booking->service->name ?? '-' }}
                                </span>

                            </td>


                            {{-- DATE --}}
                            <td class="px-5 py-4 text-xs text-zinc-600">

                                {{ \Carbon\Carbon::parse($booking->booking_date)->format('d M Y') }}

                            </td>


                            {{-- TIME --}}
                            <td class="px-5 py-4 text-xs text-zinc-600">

                                {{ \Carbon\Carbon::parse($booking->booking_time)->format('H:i') }}

                            </td>


                            {{-- STATUS --}}
                            <td class="px-5 py-4">

                                <span class="inline-flex items-center gap-1.5 rounded-full px-2.5 py-1 text-[11px] font-medium {{ $statusClass }}">

                                    <span class="h-1.5 w-1.5 rounded-full bg-current"></span>

                                    {{ $statusLabel }}

                                </span>

                            </td>

                        </tr>


                    @empty

                        <tr>

                            <td colspan="6" class="px-5 py-14 text-center">

                                <p class="text-sm font-medium text-zinc-600">
                                    Belum ada booking
                                </p>

                                <p class="mt-1 text-xs text-zinc-400">
                                    Tidak ada data pada periode yang dipilih.
                                </p>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- PAGINATION --}}
        @if($bookings->hasPages())

            <div class="border-t border-zinc-100 px-5 py-4">

                {{ $bookings->links() }}

            </div>

        @endif

    </div>

</div>

@endsection