@extends('layouts.admin')

@section('title', 'Pelanggan')

@section('content')

<div class="space-y-8">

    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4">

        <div>

            <p class="text-xs tracking-[0.25em] uppercase text-gray-400 mb-2">
                CUSTOMER MANAGEMENT
            </p>

            <h1 class="text-3xl font-semibold tracking-tight text-gray-900">
                Pelanggan
            </h1>

            <p class="text-sm text-gray-500 mt-2">
                Kelola dan lihat informasi pelanggan barbershop.
            </p>

        </div>

    </div>


    {{-- SUCCESS --}}
    @if(session('success'))

        <div
            class="rounded-xl
                   border border-green-200
                   bg-green-50
                   px-5 py-4"
        >
            <p class="text-sm font-medium text-green-700">
                {{ session('success') }}
            </p>
        </div>

    @endif


    {{-- MAIN CARD --}}
    <div
        class="bg-white
               border border-gray-200
               rounded-2xl
               overflow-hidden"
    >

        {{-- CARD HEADER --}}
        <div
            class="px-7 py-5
                   border-b border-gray-200
                   flex flex-col md:flex-row
                   md:items-center
                   md:justify-between
                   gap-4"
        >

            <div>

                <h2 class="text-lg font-semibold text-gray-900">
                    Daftar Pelanggan
                </h2>

                <p class="text-sm text-gray-400 mt-1">
                    Semua pelanggan yang pernah melakukan booking.
                </p>

            </div>


            <div
                class="px-4 py-2
                       rounded-xl
                       bg-gray-50
                       border border-gray-200
                       text-sm text-gray-600"
            >

                Total:

                <span class="font-semibold text-gray-900">
                    {{ $customers->total() }}
                </span>

            </div>

        </div>


        {{-- TABLE --}}
        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-gray-50 border-b border-gray-200">

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
                            Pelanggan
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
                            Kontak
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
                            Booking
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
                            Bergabung
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

                    @forelse($customers as $customer)

                        <tr class="hover:bg-gray-50 transition">


                            {{-- CUSTOMER --}}
                            <td class="px-7 py-5">

                                <div class="flex items-center gap-4">

                                    <div
                                        class="w-11 h-11
                                               rounded-full
                                               bg-gray-900
                                               text-white
                                               flex items-center
                                               justify-center
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


                                    <div>

                                        <p
                                            class="font-medium
                                                   text-gray-900"
                                        >
                                            {{ $customer->name ?? '-' }}
                                        </p>

                                        <p
                                            class="text-xs
                                                   text-gray-400
                                                   mt-1"
                                        >
                                            ID #{{ $customer->id }}
                                        </p>

                                    </div>

                                </div>

                            </td>


                            {{-- KONTAK --}}
                            <td class="px-7 py-5">

                                <p
                                    class="text-sm
                                           font-medium
                                           text-gray-900"
                                >
                                    {{ $customer->phone ?? '-' }}
                                </p>

                                @if(!empty($customer->email))

                                    <p
                                        class="text-xs
                                               text-gray-400
                                               mt-1"
                                    >
                                        {{ $customer->email }}
                                    </p>

                                @endif

                            </td>


                            {{-- TOTAL BOOKING --}}
                            <td class="px-7 py-5">

                                @php

                                    $bookingCount =
                                        $customer->bookings_count
                                        ?? (
                                            isset($customer->bookings)
                                                ? $customer->bookings->count()
                                                : 0
                                        );

                                @endphp

                                <span
                                    class="inline-flex
                                           items-center
                                           px-3 py-1.5
                                           rounded-full
                                           bg-gray-100
                                           text-gray-700
                                           text-xs
                                           font-medium"
                                >
                                    {{ $bookingCount }} Booking
                                </span>

                            </td>


                            {{-- TANGGAL --}}
                            <td class="px-7 py-5">

                                <p class="text-sm text-gray-600">

                                    @if($customer->created_at)

                                        {{ $customer->created_at->format('d M Y') }}

                                    @else

                                        -

                                    @endif

                                </p>

                            </td>


                            {{-- ACTION --}}
                            <td class="px-7 py-5">

                                <div class="flex justify-end">

                                    <a
                                        href="{{ route(
                                            'admin.customers.show',
                                            $customer
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
                                colspan="5"
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
                                           text-gray-400
                                           text-xl"
                                >
                                    👤
                                </div>

                                <h3
                                    class="mt-4
                                           text-sm
                                           font-semibold
                                           text-gray-900"
                                >
                                    Belum ada pelanggan
                                </h3>

                                <p
                                    class="text-sm
                                           text-gray-400
                                           mt-1"
                                >
                                    Data pelanggan akan muncul setelah ada booking.
                                </p>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- PAGINATION --}}
        @if($customers->hasPages())

            <div
                class="px-7 py-5
                       border-t border-gray-200"
            >

                {{ $customers->links() }}

            </div>

        @endif

    </div>

</div>

@endsection