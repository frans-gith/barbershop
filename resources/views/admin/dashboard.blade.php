@extends('layouts.admin')

@section('title', 'Dashboard')

@section('header', 'Dashboard')


@section('content')

<div class="space-y-8">


    {{-- =====================================================
        WELCOME
    ====================================================== --}}

    <div
        class="relative overflow-hidden
               rounded-3xl
               bg-zinc-950
               px-7 py-8
               lg:px-10 lg:py-9
               text-white">

        <div class="relative z-10">

            <p class="text-xs uppercase tracking-[0.25em] text-zinc-500 mb-3">
                BARBERSHOP MANAGEMENT
            </p>

            <h1 class="text-2xl lg:text-3xl font-bold mb-3">
                Selamat datang,
                {{ auth()->user()->name ?? 'Administrator' }} 👋
            </h1>

            <p class="text-zinc-400 max-w-xl leading-relaxed">
                Kelola operasional barbershop mulai dari barber,
                layanan, jadwal, pelanggan hingga booking
                melalui satu dashboard.
            </p>

        </div>


        {{-- DECORATION --}}
        <div
            class="absolute -right-20 -top-24
                   w-72 h-72
                   rounded-full
                   border-[40px]
                   border-zinc-800/50">
        </div>

        <div
            class="absolute right-20 -bottom-28
                   w-56 h-56
                   rounded-full
                   border-[30px]
                   border-zinc-800/30">
        </div>

    </div>



    {{-- =====================================================
        STATISTICS
    ====================================================== --}}

    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5">


        {{-- BOOKING --}}
        <div
            class="bg-white rounded-2xl border border-zinc-200
                   p-6 hover:shadow-lg transition">

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-sm text-zinc-500 mb-2">
                        Total Booking
                    </p>

                    <h3 class="text-3xl font-bold">
                        {{ $totalBookings ?? 0 }}
                    </h3>

                </div>

                <div
                    class="w-11 h-11 rounded-xl
                           bg-zinc-100
                           flex items-center justify-center
                           text-xl">

                    ▤

                </div>

            </div>

            <div class="mt-5 text-xs text-zinc-400">

                Semua booking

            </div>

        </div>


        {{-- BARBER --}}
        <div
            class="bg-white rounded-2xl border border-zinc-200
                   p-6 hover:shadow-lg transition">

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-sm text-zinc-500 mb-2">
                        Total Barber
                    </p>

                    <h3 class="text-3xl font-bold">
                        {{ $totalBarbers ?? 0 }}
                    </h3>

                </div>

                <div
                    class="w-11 h-11 rounded-xl
                           bg-zinc-100
                           flex items-center justify-center
                           text-xl">

                    ✂

                </div>

            </div>

            <div class="mt-5 text-xs text-zinc-400">

                Barber aktif

            </div>

        </div>


        {{-- SERVICES --}}
        <div
            class="bg-white rounded-2xl border border-zinc-200
                   p-6 hover:shadow-lg transition">

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-sm text-zinc-500 mb-2">
                        Total Layanan
                    </p>

                    <h3 class="text-3xl font-bold">
                        {{ $totalServices ?? 0 }}
                    </h3>

                </div>

                <div
                    class="w-11 h-11 rounded-xl
                           bg-zinc-100
                           flex items-center justify-center
                           text-xl">

                    ▣

                </div>

            </div>

            <div class="mt-5 text-xs text-zinc-400">

                Layanan tersedia

            </div>

        </div>


        {{-- CUSTOMERS --}}
        <div
            class="bg-white rounded-2xl border border-zinc-200
                   p-6 hover:shadow-lg transition">

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-sm text-zinc-500 mb-2">
                        Total Pelanggan
                    </p>

                    <h3 class="text-3xl font-bold">
                        {{ $totalCustomers ?? 0 }}
                    </h3>

                </div>

                <div
                    class="w-11 h-11 rounded-xl
                           bg-zinc-100
                           flex items-center justify-center
                           text-xl">

                    ♙

                </div>

            </div>

            <div class="mt-5 text-xs text-zinc-400">

                Data pelanggan

            </div>

        </div>

    </div>



    {{-- =====================================================
        SECOND ROW
    ====================================================== --}}

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">


        {{-- BOOKING STATUS --}}
        <div
            class="xl:col-span-2
                   bg-white rounded-2xl
                   border border-zinc-200
                   p-7">

            <div class="flex items-center justify-between mb-7">

                <div>

                    <h3 class="font-semibold text-lg">
                        Ringkasan Booking
                    </h3>

                    <p class="text-sm text-zinc-400 mt-1">
                        Status booking saat ini
                    </p>

                </div>

                <a
                    href="{{ route('admin.bookings.index') }}"
                    class="text-sm font-medium
                           text-zinc-500
                           hover:text-black">

                    Lihat semua →

                </a>

            </div>


            <div class="grid sm:grid-cols-3 gap-4">


                {{-- PENDING --}}
                <div
                    class="rounded-2xl
                           bg-amber-50
                           border border-amber-100
                           p-5">

                    <div
                        class="w-9 h-9 rounded-lg
                               bg-amber-100
                               flex items-center justify-center
                               mb-4">

                        ⏳

                    </div>

                    <p class="text-sm text-amber-700">
                        Menunggu
                    </p>

                    <p class="text-3xl font-bold text-amber-900 mt-1">
                        {{ $pendingBookings ?? 0 }}
                    </p>

                </div>


                {{-- COMPLETED --}}
                <div
                    class="rounded-2xl
                           bg-emerald-50
                           border border-emerald-100
                           p-5">

                    <div
                        class="w-9 h-9 rounded-lg
                               bg-emerald-100
                               flex items-center justify-center
                               mb-4">

                        ✓

                    </div>

                    <p class="text-sm text-emerald-700">
                        Selesai
                    </p>

                    <p class="text-3xl font-bold text-emerald-900 mt-1">
                        {{ $completedBookings ?? 0 }}
                    </p>

                </div>


                {{-- TOTAL --}}
                <div
                    class="rounded-2xl
                           bg-zinc-100
                           border border-zinc-200
                           p-5">

                    <div
                        class="w-9 h-9 rounded-lg
                               bg-zinc-200
                               flex items-center justify-center
                               mb-4">

                        #

                    </div>

                    <p class="text-sm text-zinc-600">
                        Total
                    </p>

                    <p class="text-3xl font-bold text-zinc-900 mt-1">
                        {{ $totalBookings ?? 0 }}
                    </p>

                </div>

            </div>

        </div>



        {{-- QUICK ACTION --}}
        <div
            class="bg-white rounded-2xl
                   border border-zinc-200
                   p-7">

            <h3 class="font-semibold text-lg">
                Aksi Cepat
            </h3>

            <p class="text-sm text-zinc-400 mt-1 mb-6">
                Kelola data barbershop
            </p>


            <div class="space-y-3">


                <a
                    href="{{ route('admin.barbers.create') }}"
                    class="flex items-center gap-4
                           rounded-xl
                           border border-zinc-200
                           p-4
                           hover:bg-zinc-50
                           transition">

                    <div
                        class="w-10 h-10 rounded-lg
                               bg-zinc-950 text-white
                               flex items-center justify-center">

                        ✂

                    </div>

                    <div>

                        <p class="font-medium text-sm">
                            Tambah Barber
                        </p>

                        <p class="text-xs text-zinc-400">
                            Tambahkan barber baru
                        </p>

                    </div>

                </a>


                <a
                    href="{{ route('admin.services.create') }}"
                    class="flex items-center gap-4
                           rounded-xl
                           border border-zinc-200
                           p-4
                           hover:bg-zinc-50
                           transition">

                    <div
                        class="w-10 h-10 rounded-lg
                               bg-zinc-950 text-white
                               flex items-center justify-center">

                        +

                    </div>

                    <div>

                        <p class="font-medium text-sm">
                            Tambah Layanan
                        </p>

                        <p class="text-xs text-zinc-400">
                            Buat layanan baru
                        </p>

                    </div>

                </a>


                <a
                    href="{{ route('admin.schedules.create') }}"
                    class="flex items-center gap-4
                           rounded-xl
                           border border-zinc-200
                           p-4
                           hover:bg-zinc-50
                           transition">

                    <div
                        class="w-10 h-10 rounded-lg
                               bg-zinc-950 text-white
                               flex items-center justify-center">

                        ◷

                    </div>

                    <div>

                        <p class="font-medium text-sm">
                            Atur Jadwal
                        </p>

                        <p class="text-xs text-zinc-400">
                            Tambahkan jadwal barber
                        </p>

                    </div>

                </a>


            </div>

        </div>

    </div>



    {{-- =====================================================
        INFO
    ====================================================== --}}

    <div
        class="bg-white rounded-2xl
               border border-zinc-200
               px-6 py-5
               flex flex-col sm:flex-row
               sm:items-center
               justify-between gap-4">

        <div>

            <p class="font-medium">
                Sistem Barbershop
            </p>

            <p class="text-sm text-zinc-400 mt-1">
                Kelola operasional barbershop dengan lebih mudah.
            </p>

        </div>

        <div class="text-sm text-zinc-400">

            {{ date('d F Y') }}

        </div>

    </div>


</div>

@endsection