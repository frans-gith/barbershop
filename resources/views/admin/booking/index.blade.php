=@extends('layouts.admin')

@section('title', 'Booking')

@section('content')

<div class="space-y-8">

    {{-- =========================================================
        HEADER
    ========================================================== --}}
    <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4">

        <div>
            <p class="text-xs tracking-[0.25em] text-gray-400 uppercase mb-2">
                Booking Management
            </p>

            <h1 class="text-2xl font-semibold text-gray-900">
                Booking
            </h1>

            <p class="text-sm text-gray-500 mt-2">
                Kelola dan pantau seluruh booking pelanggan.
            </p>
        </div>

    </div>


    {{-- =========================================================
        FLASH SUCCESS
    ========================================================== --}}
    @if(session('success'))

        <div class="rounded-2xl border border-green-200 bg-green-50 px-5 py-4">

            <div class="flex items-start gap-3">

                <div class="w-9 h-9 rounded-xl bg-green-100
                            flex items-center justify-center
                            text-green-700 font-semibold">
                    ✓
                </div>

                <div>
                    <p class="text-sm font-semibold text-green-800">
                        Berhasil
                    </p>

                    <p class="text-sm text-green-700 mt-1">
                        {{ session('success') }}
                    </p>
                </div>

            </div>

        </div>

    @endif


    {{-- =========================================================
        FLASH ERROR
    ========================================================== --}}
    @if(session('error'))

        <div class="rounded-2xl border border-red-200 bg-red-50 px-5 py-4">

            <div class="flex items-start gap-3">

                <div class="w-9 h-9 rounded-xl bg-red-100
                            flex items-center justify-center
                            text-red-700 font-semibold">
                    !
                </div>

                <div>
                    <p class="text-sm font-semibold text-red-800">
                        Terjadi Kesalahan
                    </p>

                    <p class="text-sm text-red-700 mt-1">
                        {{ session('error') }}
                    </p>
                </div>

            </div>

        </div>

    @endif


    {{-- =========================================================
        FILTER
    ========================================================== --}}
    <div class="bg-white border border-gray-200 rounded-2xl p-5 shadow-sm">

        <form
            method="GET"
            action="{{ route('admin.bookings.index') }}"
            class="flex flex-col lg:flex-row gap-3"
        >

            {{-- SEARCH --}}
            <div class="flex-1 relative">

                <div class="absolute inset-y-0 left-0
                            flex items-center pl-4
                            pointer-events-none">

                    <svg
                        class="w-4 h-4 text-gray-400"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.8"
                            d="m21 21-4.35-4.35m1.35-5.65a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"
                        />
                    </svg>

                </div>

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari nama pelanggan atau nomor telepon..."
                    class="w-full rounded-xl border border-gray-200
                           bg-white pl-11 pr-4 py-3
                           text-sm text-gray-800
                           placeholder:text-gray-400
                           focus:border-gray-900
                           focus:ring-2 focus:ring-gray-900/10
                           outline-none transition"
                >

            </div>


            {{-- STATUS --}}
            <select
                name="status"
                class="rounded-xl border border-gray-200
                       bg-white px-4 py-3
                       text-sm text-gray-700
                       focus:border-gray-900
                       focus:ring-2 focus:ring-gray-900/10
                       outline-none transition"
            >

                <option value="">
                    Semua Status
                </option>

                <option
                    value="pending"
                    {{ request('status') === 'pending' ? 'selected' : '' }}
                >
                    Menunggu
                </option>

                <option
                    value="confirmed"
                    {{ request('status') === 'confirmed' ? 'selected' : '' }}
                >
                    Dikonfirmasi
                </option>

                <option
                    value="completed"
                    {{ request('status') === 'completed' ? 'selected' : '' }}
                >
                    Selesai
                </option>

                <option
                    value="cancelled"
                    {{ request('status') === 'cancelled' ? 'selected' : '' }}
                >
                    Dibatalkan
                </option>

            </select>


            {{-- FILTER BUTTON --}}
            <button
                type="submit"
                class="rounded-xl bg-gray-950
                       px-6 py-3
                       text-sm font-semibold text-white
                       hover:bg-gray-800
                       active:scale-[0.98]
                       transition"
            >
                Filter
            </button>


            {{-- RESET --}}
            @if(request()->hasAny(['search', 'status']))

                <a
                    href="{{ route('admin.bookings.index') }}"
                    class="rounded-xl border border-gray-200
                           px-6 py-3
                           text-sm font-medium text-gray-600
                           hover:bg-gray-50
                           transition
                           text-center"
                >
                    Reset
                </a>

            @endif

        </form>

    </div>


    {{-- =========================================================
        BOOKING TABLE
    ========================================================== --}}
    <div class="bg-white border border-gray-200
                rounded-2xl overflow-hidden shadow-sm">


        {{-- TABLE HEADER --}}
        <div class="px-6 py-5 border-b border-gray-200">

            <div class="flex flex-col sm:flex-row
                        sm:items-center
                        sm:justify-between gap-3">

                <div>

                    <h2 class="text-base font-semibold text-gray-900">
                        Daftar Booking
                    </h2>

                    <p class="text-sm text-gray-500 mt-1">
                        Data booking pelanggan yang masuk.
                    </p>

                </div>


                <div
                    class="inline-flex items-center
                           rounded-full bg-gray-50
                           border border-gray-200
                           px-3 py-1.5
                           text-xs font-medium text-gray-500"
                >

                    {{ $bookings->total() }}

                    <span class="ml-1">
                        booking
                    </span>

                </div>

            </div>

        </div>


        {{-- =====================================================
            TABLE
        ====================================================== --}}
        <div class="overflow-x-auto">

            <table class="w-full text-sm">

                {{-- HEADER --}}
                <thead class="bg-gray-50 border-b border-gray-200">

                    <tr
                        class="text-left
                               text-[11px]
                               uppercase
                               tracking-[0.12em]
                               text-gray-400"
                    >

                        <th class="px-6 py-4 font-semibold">
                            Pelanggan
                        </th>

                        <th class="px-6 py-4 font-semibold">
                            Layanan
                        </th>

                        <th class="px-6 py-4 font-semibold">
                            Barber
                        </th>

                        <th class="px-6 py-4 font-semibold">
                            Tanggal
                        </th>

                        <th class="px-6 py-4 font-semibold">
                            Jam
                        </th>

                        <th class="px-6 py-4 font-semibold">
                            Status
                        </th>

                        <th class="px-6 py-4 font-semibold text-right">
                            Aksi
                        </th>

                    </tr>

                </thead>


                {{-- BODY --}}
                <tbody class="divide-y divide-gray-100">

                    @forelse($bookings as $booking)

                        <tr
                            class="hover:bg-gray-50/80
                                   transition"
                        >

                            {{-- =================================================
                                PELANGGAN
                            ================================================== --}}
                            <td class="px-6 py-5">

                                <div class="flex items-center gap-3">

                                    {{-- AVATAR --}}
                                    <div
                                        class="w-10 h-10
                                               rounded-xl
                                               bg-gray-100
                                               border border-gray-200
                                               flex items-center
                                               justify-center
                                               text-sm font-semibold
                                               text-gray-600
                                               shrink-0"
                                    >
                                        {{ strtoupper(substr($booking->customer->name ?? 'P', 0, 1)) }}
                                    </div>


                                    <div class="min-w-0">

                                        <div
                                            class="font-semibold
                                                   text-gray-900
                                                   truncate"
                                        >
                                            {{ $booking->customer->name ?? '-' }}
                                        </div>

                                        <div
                                            class="text-xs
                                                   text-gray-400
                                                   mt-1"
                                        >
                                            {{ $booking->customer->phone ?? '-' }}
                                        </div>

                                        @if($booking->customer && $booking->customer->email)

                                            <div
                                                class="text-[11px]
                                                       text-gray-400
                                                       mt-0.5"
                                            >
                                                {{ $booking->customer->email }}
                                            </div>

                                        @endif

                                    </div>

                                </div>

                            </td>


                            {{-- =================================================
                                LAYANAN
                            ================================================== --}}
                            <td class="px-6 py-5">

                                @if($booking->service)

                                    <div class="font-medium text-gray-800">
                                        {{ $booking->service->name }}
                                    </div>

                                    @if(isset($booking->service->price))

                                        <div
                                            class="text-xs
                                                   text-gray-400
                                                   mt-1"
                                        >
                                            Rp
                                            {{ number_format($booking->service->price, 0, ',', '.') }}
                                        </div>

                                    @endif

                                @else

                                    <span class="text-gray-400">
                                        -
                                    </span>

                                @endif

                            </td>


                            {{-- =================================================
                                BARBER
                            ================================================== --}}
                            <td class="px-6 py-5">

                                @if($booking->barber)

                                    <div class="flex items-center gap-2">

                                        <div
                                            class="w-8 h-8
                                                   rounded-lg
                                                   bg-gray-100
                                                   flex items-center
                                                   justify-center
                                                   text-xs
                                                   font-semibold
                                                   text-gray-600"
                                        >
                                            {{ strtoupper(substr($booking->barber->name, 0, 1)) }}
                                        </div>

                                        <span class="text-gray-700">
                                            {{ $booking->barber->name }}
                                        </span>

                                    </div>

                                @else

                                    <span class="text-gray-400">
                                        -
                                    </span>

                                @endif

                            </td>


                            {{-- =================================================
                                TANGGAL
                            ================================================== --}}
                            <td class="px-6 py-5 whitespace-nowrap">

                                @if($booking->booking_date)

                                    <div class="font-medium text-gray-800">

                                        {{ \Carbon\Carbon::parse($booking->booking_date)->translatedFormat('d M Y') }}

                                    </div>

                                @else

                                    <span class="text-gray-400">
                                        -
                                    </span>

                                @endif

                            </td>


                            {{-- =================================================
                                JAM
                            ================================================== --}}
                            <td class="px-6 py-5 whitespace-nowrap">

                                @if($booking->booking_time)

                                    <div
                                        class="inline-flex
                                               items-center
                                               rounded-lg
                                               bg-gray-50
                                               border border-gray-200
                                               px-3 py-1.5
                                               font-medium
                                               text-gray-700"
                                    >

                                        <svg
                                            class="w-3.5 h-3.5 mr-1.5 text-gray-400"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="1.8"
                                                d="M12 7v5l3 2m6-2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
                                            />
                                        </svg>

                                        {{ \Carbon\Carbon::parse($booking->booking_time)->format('H:i') }}

                                    </div>

                                @else

                                    <span class="text-gray-400">
                                        -
                                    </span>

                                @endif

                            </td>


                            {{-- =================================================
                                STATUS
                            ================================================== --}}
                            <td class="px-6 py-5">

                                @php

                                    $status = strtolower(
                                        $booking->status ?? 'pending'
                                    );

                                    $statusClass = match($status) {

                                        'pending' =>
                                            'bg-amber-50 text-amber-700 border-amber-200',

                                        'confirmed' =>
                                            'bg-blue-50 text-blue-700 border-blue-200',

                                        'completed' =>
                                            'bg-green-50 text-green-700 border-green-200',

                                        'cancelled' =>
                                            'bg-red-50 text-red-700 border-red-200',

                                        default =>
                                            'bg-gray-50 text-gray-600 border-gray-200',

                                    };

                                    $statusText = match($status) {

                                        'pending' =>
                                            'Menunggu',

                                        'confirmed' =>
                                            'Dikonfirmasi',

                                        'completed' =>
                                            'Selesai',

                                        'cancelled' =>
                                            'Dibatalkan',

                                        default =>
                                            ucfirst($status),

                                    };

                                @endphp


                                <span
                                    class="inline-flex
                                           items-center gap-2
                                           rounded-full
                                           border
                                           px-3 py-1.5
                                           text-xs
                                           font-medium
                                           {{ $statusClass }}"
                                >

                                    <span
                                        class="w-1.5 h-1.5
                                               rounded-full
                                               bg-current"
                                    ></span>

                                    {{ $statusText }}

                                </span>

                            </td>


                            {{-- =================================================
                                AKSI
                            ================================================== --}}
                            <td class="px-6 py-5">

                                <div
                                    class="flex items-center
                                           justify-end gap-2"
                                >

                                    {{-- DETAIL --}}
                                    <a
                                        href="{{ route('admin.bookings.show', $booking) }}"
                                        class="inline-flex
                                               items-center
                                               gap-1.5
                                               rounded-lg
                                               border border-gray-200
                                               bg-white
                                               px-3 py-2
                                               text-xs
                                               font-medium
                                               text-gray-700
                                               hover:bg-gray-50
                                               hover:border-gray-300
                                               transition"
                                    >

                                        <svg
                                            class="w-3.5 h-3.5"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="1.8"
                                                d="M2.5 12s3.5-6 9.5-6 9.5 6 9.5 6-3.5 6-9.5 6-9.5-6-9.5-6Z"
                                            />

                                            <circle
                                                cx="12"
                                                cy="12"
                                                r="2.5"
                                                stroke-width="1.8"
                                            />
                                        </svg>

                                        Detail

                                    </a>


                                    {{-- HAPUS --}}
                                    <form
                                        action="{{ route('admin.bookings.destroy', $booking) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus booking ini?')"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="inline-flex
                                                   items-center
                                                   gap-1.5
                                                   rounded-lg
                                                   border border-red-200
                                                   bg-white
                                                   px-3 py-2
                                                   text-xs
                                                   font-medium
                                                   text-red-600
                                                   hover:bg-red-50
                                                   hover:border-red-300
                                                   transition"
                                        >

                                            <svg
                                                class="w-3.5 h-3.5"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="1.8"
                                                    d="M6 7h12M9 7V5h6v2m-7 0 1 13h6l1-13M10 11v5m4-5v5"
                                                />
                                            </svg>

                                            Hapus

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>


                    @empty

                        {{-- =================================================
                            EMPTY STATE
                        ================================================== --}}
                        <tr>

                            <td
                                colspan="7"
                                class="px-6 py-20 text-center"
                            >

                                <div
                                    class="flex flex-col
                                           items-center"
                                >

                                    <div
                                        class="w-14 h-14
                                               rounded-2xl
                                               bg-gray-100
                                               border border-gray-200
                                               flex items-center
                                               justify-center
                                               mb-4"
                                    >

                                        <svg
                                            class="w-6 h-6 text-gray-400"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="1.7"
                                                d="M8 7V4m8 3V4M5 10h14M6 6h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2Z"
                                            />
                                        </svg>

                                    </div>


                                    <h3
                                        class="text-sm
                                               font-semibold
                                               text-gray-900"
                                    >
                                        Belum ada booking
                                    </h3>


                                    <p
                                        class="text-sm
                                               text-gray-400
                                               mt-1"
                                    >
                                        Booking pelanggan akan muncul di sini.
                                    </p>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- =========================================================
            PAGINATION
        ========================================================== --}}
        @if($bookings->hasPages())

            <div
                class="px-6 py-5
                       border-t border-gray-200"
            >

                {{ $bookings->links() }}

            </div>

        @endif

    </div>

</div>

@endsection