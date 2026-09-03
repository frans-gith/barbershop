@extends('layouts.admin')

@section('title', 'Detail Pelanggan')

@section('content')

<div class="space-y-8">

    {{-- =========================================================
         HEADER
    ========================================================== --}}

    <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4">

        <div>

            <p class="text-xs tracking-[0.25em] uppercase text-gray-400 mb-2">
                CUSTOMER MANAGEMENT
            </p>

            <h1 class="text-3xl font-semibold tracking-tight text-gray-900">
                Detail Pelanggan
            </h1>

            <p class="text-sm text-gray-500 mt-2">
                Informasi pelanggan dan riwayat booking.
            </p>

        </div>


        <a
            href="{{ route('admin.customers.index') }}"
            class="inline-flex items-center justify-center
                   px-5 py-2.5 rounded-xl
                   border border-gray-200
                   bg-white
                   text-sm font-medium text-gray-700
                   hover:bg-gray-50 transition"
        >
            ← Kembali
        </a>

    </div>


    {{-- =========================================================
         PROFILE
    ========================================================== --}}

    <div
        class="bg-white
               border border-gray-200
               rounded-2xl
               overflow-hidden"
    >

        <div class="p-7">

            <div class="flex flex-col md:flex-row md:items-center gap-6">

                {{-- AVATAR --}}

                <div
                    class="w-20 h-20
                           rounded-2xl
                           bg-gray-900
                           text-white
                           flex items-center
                           justify-center
                           text-2xl
                           font-semibold
                           flex-shrink-0"
                >

                    {{ strtoupper(
                        substr(
                            $customer->name ?? 'P',
                            0,
                            1
                        )
                    ) }}

                </div>


                {{-- PROFILE INFO --}}

                <div class="flex-1">

                    <p
                        class="text-xs
                               uppercase
                               tracking-wide
                               text-gray-400
                               mb-2"
                    >
                        Pelanggan
                    </p>

                    <h2
                        class="text-2xl
                               font-semibold
                               text-gray-900"
                    >
                        {{ $customer->name ?? '-' }}
                    </h2>

                    <p
                        class="text-sm
                               text-gray-400
                               mt-1"
                    >
                        Customer ID #{{ $customer->id }}
                    </p>

                </div>


                {{-- TOTAL BOOKING --}}

                <div
                    class="rounded-xl
                           bg-gray-50
                           border border-gray-200
                           px-6 py-4
                           min-w-[150px]"
                >

                    <p
                        class="text-xs
                               uppercase
                               tracking-wide
                               text-gray-400"
                    >
                        Total Booking
                    </p>

                    <p
                        class="text-2xl
                               font-semibold
                               text-gray-900
                               mt-1"
                    >
                        {{ $customer->bookings->count() }}
                    </p>

                </div>

            </div>

        </div>

    </div>


    {{-- =========================================================
         CUSTOMER INFORMATION
    ========================================================== --}}

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">


        {{-- PHONE --}}

        <div
            class="bg-white
                   border border-gray-200
                   rounded-2xl
                   p-6"
        >

            <p
                class="text-xs
                       uppercase
                       tracking-wide
                       text-gray-400
                       mb-3"
            >
                Nomor Telepon
            </p>

            <p
                class="text-base
                       font-medium
                       text-gray-900"
            >
                {{ $customer->phone ?? '-' }}
            </p>

        </div>


        {{-- EMAIL --}}

        <div
            class="bg-white
                   border border-gray-200
                   rounded-2xl
                   p-6"
        >

            <p
                class="text-xs
                       uppercase
                       tracking-wide
                       text-gray-400
                       mb-3"
            >
                Email
            </p>

            <p
                class="text-base
                       font-medium
                       text-gray-900
                       break-all"
            >
                {{ $customer->email ?? '-' }}
            </p>

        </div>


        {{-- REGISTERED --}}

        <div
            class="bg-white
                   border border-gray-200
                   rounded-2xl
                   p-6"
        >

            <p
                class="text-xs
                       uppercase
                       tracking-wide
                       text-gray-400
                       mb-3"
            >
                Terdaftar Sejak
            </p>

            <p
                class="text-base
                       font-medium
                       text-gray-900"
            >

                @if($customer->created_at)

                    {{ $customer->created_at->format('d M Y') }}

                @else

                    -

                @endif

            </p>

        </div>

    </div>


    {{-- =========================================================
         BOOKING HISTORY
    ========================================================== --}}

    <div
        class="bg-white
               border border-gray-200
               rounded-2xl
               overflow-hidden"
    >

        {{-- HEADER --}}

        <div
            class="px-7 py-5
                   border-b border-gray-200
                   flex flex-col md:flex-row
                   md:items-center
                   md:justify-between
                   gap-3"
        >

            <div>

                <h2
                    class="text-lg
                           font-semibold
                           text-gray-900"
                >
                    Riwayat Booking
                </h2>

                <p
                    class="text-sm
                           text-gray-400
                           mt-1"
                >
                    Daftar booking yang pernah dilakukan pelanggan.
                </p>

            </div>


            <div
                class="inline-flex
                       items-center
                       px-3 py-1.5
                       rounded-full
                       bg-gray-100
                       text-xs
                       font-medium
                       text-gray-600"
            >

                {{ $customer->bookings->count() }} Booking

            </div>

        </div>


        {{-- TABLE --}}

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead
                    class="bg-gray-50
                           border-b border-gray-200"
                >

                    <tr>

                        <th
                            class="px-7 py-4
                                   text-left
                                   text-xs
                                   font-medium
                                   uppercase
                                   tracking-wide
                                   text-gray-400"
                        >
                            Tanggal
                        </th>


                        <th
                            class="px-7 py-4
                                   text-left
                                   text-xs
                                   font-medium
                                   uppercase
                                   tracking-wide
                                   text-gray-400"
                        >
                            Layanan
                        </th>


                        <th
                            class="px-7 py-4
                                   text-left
                                   text-xs
                                   font-medium
                                   uppercase
                                   tracking-wide
                                   text-gray-400"
                        >
                            Barber
                        </th>


                        <th
                            class="px-7 py-4
                                   text-left
                                   text-xs
                                   font-medium
                                   uppercase
                                   tracking-wide
                                   text-gray-400"
                        >
                            Jam
                        </th>


                        <th
                            class="px-7 py-4
                                   text-left
                                   text-xs
                                   font-medium
                                   uppercase
                                   tracking-wide
                                   text-gray-400"
                        >
                            Status
                        </th>


                        <th
                            class="px-7 py-4
                                   text-right
                                   text-xs
                                   font-medium
                                   uppercase
                                   tracking-wide
                                   text-gray-400"
                        >
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-gray-100">

                    @forelse($customer->bookings as $booking)

                        @php

                            $status = strtolower(
                                $booking->status ?? 'pending'
                            );

                        @endphp


                        <tr class="hover:bg-gray-50 transition">


                            {{-- TANGGAL --}}

                            <td class="px-7 py-5">

                                <p
                                    class="text-sm
                                           font-medium
                                           text-gray-900"
                                >

                                    @if($booking->booking_date)

                                        {{ \Carbon\Carbon::parse(
                                            $booking->booking_date
                                        )->format('d M Y') }}

                                    @else

                                        -

                                    @endif

                                </p>

                            </td>


                            {{-- LAYANAN --}}

                            <td class="px-7 py-5">

                                <p
                                    class="text-sm
                                           font-medium
                                           text-gray-900"
                                >
                                    {{ $booking->service->name ?? '-' }}
                                </p>

                                @if($booking->service)

                                    <p
                                        class="text-xs
                                               text-gray-400
                                               mt-1"
                                    >

                                        Rp
                                        {{ number_format(
                                            $booking->service->price ?? 0,
                                            0,
                                            ',',
                                            '.'
                                        ) }}

                                    </p>

                                @endif

                            </td>


                            {{-- BARBER --}}

                            <td class="px-7 py-5">

                                <p
                                    class="text-sm
                                           font-medium
                                           text-gray-900"
                                >
                                    {{ $booking->barber->name ?? '-' }}
                                </p>

                            </td>


                            {{-- JAM --}}

                            <td class="px-7 py-5">

                                <p
                                    class="text-sm
                                           text-gray-600"
                                >

                                    @if($booking->booking_time)

                                        {{ \Carbon\Carbon::parse(
                                            $booking->booking_time
                                        )->format('H:i') }}

                                    @else

                                        -

                                    @endif

                                </p>

                            </td>


                            {{-- STATUS --}}

                            <td class="px-7 py-5">

                                @if($status === 'confirmed')

                                    <span
                                        class="inline-flex
                                               items-center
                                               gap-2
                                               px-3 py-1.5
                                               rounded-full
                                               bg-green-50
                                               text-green-600
                                               text-xs
                                               font-medium"
                                    >

                                        <span
                                            class="w-1.5 h-1.5
                                                   rounded-full
                                                   bg-current"
                                        ></span>

                                        Dikonfirmasi

                                    </span>


                                @elseif($status === 'completed')

                                    <span
                                        class="inline-flex
                                               items-center
                                               gap-2
                                               px-3 py-1.5
                                               rounded-full
                                               bg-blue-50
                                               text-blue-600
                                               text-xs
                                               font-medium"
                                    >

                                        <span
                                            class="w-1.5 h-1.5
                                                   rounded-full
                                                   bg-current"
                                        ></span>

                                        Selesai

                                    </span>


                                @elseif(
                                    $status === 'cancelled' ||
                                    $status === 'canceled'
                                )

                                    <span
                                        class="inline-flex
                                               items-center
                                               gap-2
                                               px-3 py-1.5
                                               rounded-full
                                               bg-red-50
                                               text-red-600
                                               text-xs
                                               font-medium"
                                    >

                                        <span
                                            class="w-1.5 h-1.5
                                                   rounded-full
                                                   bg-current"
                                        ></span>

                                        Dibatalkan

                                    </span>


                                @elseif($status === 'rejected')

                                    <span
                                        class="inline-flex
                                               items-center
                                               gap-2
                                               px-3 py-1.5
                                               rounded-full
                                               bg-red-50
                                               text-red-600
                                               text-xs
                                               font-medium"
                                    >

                                        <span
                                            class="w-1.5 h-1.5
                                                   rounded-full
                                                   bg-current"
                                        ></span>

                                        Ditolak

                                    </span>


                                @else

                                    <span
                                        class="inline-flex
                                               items-center
                                               gap-2
                                               px-3 py-1.5
                                               rounded-full
                                               bg-yellow-50
                                               text-yellow-600
                                               text-xs
                                               font-medium"
                                    >

                                        <span
                                            class="w-1.5 h-1.5
                                                   rounded-full
                                                   bg-current"
                                        ></span>

                                        Menunggu

                                    </span>

                                @endif

                            </td>


                            {{-- AKSI --}}

                            <td class="px-7 py-5">

                                <div class="flex justify-end">

                                    <a
                                        href="{{ route(
                                            'admin.bookings.show',
                                            $booking
                                        ) }}"
                                        class="inline-flex
                                               items-center
                                               px-4 py-2
                                               rounded-lg
                                               bg-black
                                               text-white
                                               text-xs
                                               font-medium
                                               hover:bg-gray-800
                                               transition"
                                    >
                                        Detail
                                    </a>

                                </div>

                            </td>

                        </tr>


                    @empty

                        <tr>

                            <td
                                colspan="6"
                                class="px-7 py-16
                                       text-center"
                            >

                                <div
                                    class="w-14 h-14
                                           mx-auto
                                           rounded-full
                                           bg-gray-100
                                           flex items-center
                                           justify-center
                                           text-xl"
                                >
                                    📅
                                </div>


                                <h3
                                    class="mt-4
                                           text-sm
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
                                    Pelanggan ini belum memiliki riwayat booking.
                                </p>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection