@extends('layouts.admin')

@section('title', 'Detail Booking')

@section('content')

<div class="min-h-screen bg-gray-50 py-8 px-6">

    {{-- HEADER --}}
    <div class="flex items-start justify-between mb-8">

        <div>
            <h1 class="text-3xl font-bold text-gray-900">
                Detail Booking
            </h1>

            <p class="mt-2 text-sm text-gray-500">
                Informasi lengkap dan pengelolaan booking pelanggan.
            </p>
        </div>

        <a href="{{ route('admin.bookings.index') }}"
           class="inline-flex items-center px-5 py-3 bg-white border border-gray-200 rounded-xl text-sm text-gray-700 hover:bg-gray-50 transition">

            ← Kembali

        </a>

    </div>


    {{-- GRID UTAMA --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- ===================================================== --}}
        {{-- BAGIAN KIRI --}}
        {{-- ===================================================== --}}
        <div class="lg:col-span-2 space-y-6">


            {{-- ================================================= --}}
            {{-- INFORMASI PELANGGAN --}}
            {{-- ================================================= --}}
            <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden">

                <div class="px-7 py-6 border-b border-gray-200">

                    <h2 class="text-lg font-semibold text-gray-900">
                        Informasi Pelanggan
                    </h2>

                    <p class="mt-1 text-sm text-gray-400">
                        Data pelanggan yang melakukan booking.
                    </p>

                </div>


                <div class="px-7 py-7">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                        {{-- NAMA --}}
                        <div>

                            <p class="text-xs font-medium uppercase tracking-wide text-gray-400">
                                Nama Pelanggan
                            </p>

                            <p class="mt-3 text-base font-medium text-gray-900">
                                {{ optional($booking->customer)->name ?? '-' }}
                            </p>

                        </div>


                        {{-- TELEPON --}}
                        <div>

                            <p class="text-xs font-medium uppercase tracking-wide text-gray-400">
                                Nomor Telepon
                            </p>

                            <p class="mt-3 text-base font-medium text-gray-900">
                                {{ optional($booking->customer)->phone ?? '-' }}
                            </p>

                        </div>

                    </div>

                </div>

            </div>



            {{-- ================================================= --}}
            {{-- INFORMASI BOOKING --}}
            {{-- ================================================= --}}
            <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden">

                <div class="px-7 py-6 border-b border-gray-200">

                    <h2 class="text-lg font-semibold text-gray-900">
                        Informasi Booking
                    </h2>

                    <p class="mt-1 text-sm text-gray-400">
                        Detail layanan dan jadwal yang dipilih.
                    </p>

                </div>


                <div class="px-7 py-7">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-8">

                        {{-- ID BOOKING --}}
                        <div>

                            <p class="text-xs font-medium uppercase tracking-wide text-gray-400">
                                ID Booking
                            </p>

                            <p class="mt-3 text-base font-semibold text-gray-900">
                                #{{ $booking->id }}
                            </p>

                        </div>


                        {{-- LAYANAN --}}
                        <div>

                            <p class="text-xs font-medium uppercase tracking-wide text-gray-400">
                                Layanan
                            </p>

                            <p class="mt-3 text-base font-medium text-gray-900">
                                {{ optional($booking->service)->name ?? '-' }}
                            </p>

                        </div>


                        {{-- BARBER --}}
                        <div>

                            <p class="text-xs font-medium uppercase tracking-wide text-gray-400">
                                Barber
                            </p>

                            <p class="mt-3 text-base font-medium text-gray-900">
                                {{ optional($booking->barber)->name ?? '-' }}
                            </p>

                        </div>


                        {{-- TANGGAL --}}
                        <div>

                            <p class="text-xs font-medium uppercase tracking-wide text-gray-400">
                                Tanggal
                            </p>

                            <p class="mt-3 text-base font-medium text-gray-900">

                                @if($booking->booking_date)

                                    {{ \Carbon\Carbon::parse($booking->booking_date)->translatedFormat('d F Y') }}

                                @else

                                    -

                                @endif

                            </p>

                        </div>


                        {{-- JAM --}}
                        <div>

                            <p class="text-xs font-medium uppercase tracking-wide text-gray-400">
                                Jam
                            </p>

                            <p class="mt-3 text-base font-medium text-gray-900">

                                @if($booking->booking_time)

                                    {{ \Carbon\Carbon::parse($booking->booking_time)->format('H:i') }} WIB

                                @else

                                    -

                                @endif

                            </p>

                        </div>


                        {{-- HARGA --}}
                        <div>

                            <p class="text-xs font-medium uppercase tracking-wide text-gray-400">
                                Harga Layanan
                            </p>

                            <p class="mt-3 text-base font-semibold text-gray-900">

                                @if(optional($booking->service)->price !== null)

                                    Rp {{ number_format($booking->service->price, 0, ',', '.') }}

                                @else

                                    -

                                @endif

                            </p>

                        </div>

                    </div>


                    {{-- GARIS --}}
                    <div class="border-t border-gray-200 mt-8 pt-7">

                        <p class="text-xs font-medium uppercase tracking-wide text-gray-400">
                            Catatan Pelanggan
                        </p>

                        <div class="mt-3 bg-gray-50 border border-gray-200 rounded-xl px-5 py-4">

                            @if(!empty($booking->note))

                                <p class="text-sm text-gray-700">
                                    {{ $booking->note }}
                                </p>

                            @else

                                <p class="text-sm text-gray-600">
                                    Tidak ada catatan dari pelanggan.
                                </p>

                            @endif

                        </div>

                    </div>

                </div>

            </div>



            {{-- ================================================= --}}
            {{-- STATUS BOOKING --}}
            {{-- ================================================= --}}
            <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden">

                <div class="px-7 py-6 border-b border-gray-200">

                    <h2 class="text-lg font-semibold text-gray-900">
                        Status Booking
                    </h2>

                    <p class="mt-1 text-sm text-gray-400">
                        Perbarui status booking pelanggan.
                    </p>

                </div>


                <form action="{{ route('admin.bookings.status', $booking) }}"
                      method="POST">

                    @csrf
                    @method('PUT')

                    <div class="px-7 py-7">

                        <label class="block text-xs font-medium uppercase tracking-wide text-gray-400 mb-3">
                            Status
                        </label>

                        <select name="status"
                                class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm text-gray-900 focus:border-gray-400 focus:ring-0">

                            <option value="pending"
                                {{ $booking->status === 'pending' ? 'selected' : '' }}>
                                Menunggu
                            </option>

                            <option value="confirmed"
                                {{ $booking->status === 'confirmed' ? 'selected' : '' }}>
                                Dikonfirmasi
                            </option>

                            <option value="completed"
                                {{ $booking->status === 'completed' ? 'selected' : '' }}>
                                Selesai
                            </option>

                            <option value="cancelled"
                                {{ $booking->status === 'cancelled' ? 'selected' : '' }}>
                                Dibatalkan
                            </option>

                            <option value="rejected"
                                {{ $booking->status === 'rejected' ? 'selected' : '' }}>
                                Ditolak
                            </option>

                        </select>

                    </div>


                    <div class="px-7 py-5 border-t border-gray-200 flex justify-end">

                        <button type="submit"
                                class="px-6 py-3 bg-black text-white rounded-xl text-sm font-semibold hover:bg-gray-800 transition">

                            Simpan Status

                        </button>

                    </div>

                </form>

            </div>

        </div>



        {{-- ===================================================== --}}
        {{-- BAGIAN KANAN --}}
        {{-- ===================================================== --}}
        <div class="space-y-6">


            {{-- ================================================= --}}
            {{-- STATUS SAAT INI --}}
            {{-- ================================================= --}}
            <div class="bg-white border border-gray-200 rounded-2xl p-7">

                <p class="text-xs font-medium uppercase tracking-[0.25em] text-gray-400">
                    Status Saat Ini
                </p>


                @if($booking->status === 'confirmed')

                    <div class="mt-5 bg-green-50 border border-green-100 rounded-xl px-5 py-4">

                        <p class="text-sm font-semibold text-green-700">
                            Dikonfirmasi
                        </p>

                        <p class="mt-1 text-xs text-green-600">
                            Booking sudah dikonfirmasi oleh admin.
                        </p>

                    </div>

                @elseif($booking->status === 'pending')

                    <div class="mt-5 bg-yellow-50 border border-yellow-100 rounded-xl px-5 py-4">

                        <p class="text-sm font-semibold text-yellow-700">
                            Menunggu
                        </p>

                        <p class="mt-1 text-xs text-yellow-600">
                            Booking sedang menunggu konfirmasi admin.
                        </p>

                    </div>

                @elseif($booking->status === 'completed')

                    <div class="mt-5 bg-blue-50 border border-blue-100 rounded-xl px-5 py-4">

                        <p class="text-sm font-semibold text-blue-700">
                            Selesai
                        </p>

                        <p class="mt-1 text-xs text-blue-600">
                            Booking sudah selesai.
                        </p>

                    </div>

                @elseif($booking->status === 'cancelled')

                    <div class="mt-5 bg-red-50 border border-red-100 rounded-xl px-5 py-4">

                        <p class="text-sm font-semibold text-red-700">
                            Dibatalkan
                        </p>

                        <p class="mt-1 text-xs text-red-600">
                            Booking telah dibatalkan.
                        </p>

                    </div>

                @elseif($booking->status === 'rejected')

                    <div class="mt-5 bg-red-50 border border-red-100 rounded-xl px-5 py-4">

                        <p class="text-sm font-semibold text-red-700">
                            Ditolak
                        </p>

                        <p class="mt-1 text-xs text-red-600">
                            Booking ditolak oleh admin.
                        </p>

                    </div>

                @else

                    <div class="mt-5 bg-gray-50 border border-gray-200 rounded-xl px-5 py-4">

                        <p class="text-sm font-semibold text-gray-700">
                            {{ ucfirst($booking->status) }}
                        </p>

                    </div>

                @endif

            </div>



            {{-- ================================================= --}}
            {{-- RINGKASAN --}}
            {{-- ================================================= --}}
            <div class="bg-white border border-gray-200 rounded-2xl p-7">

                <p class="text-xs font-medium uppercase tracking-[0.25em] text-gray-400">
                    Ringkasan
                </p>


                <div class="mt-6 space-y-5">

                    {{-- PELANGGAN --}}
                    <div class="flex items-center justify-between gap-4">

                        <span class="text-sm text-gray-500">
                            Pelanggan
                        </span>

                        <span class="text-sm font-medium text-gray-900 text-right">
                            {{ optional($booking->customer)->name ?? '-' }}
                        </span>

                    </div>


                    {{-- LAYANAN --}}
                    <div class="flex items-center justify-between gap-4">

                        <span class="text-sm text-gray-500">
                            Layanan
                        </span>

                        <span class="text-sm font-medium text-gray-900 text-right">
                            {{ optional($booking->service)->name ?? '-' }}
                        </span>

                    </div>


                    {{-- BARBER --}}
                    <div class="flex items-center justify-between gap-4">

                        <span class="text-sm text-gray-500">
                            Barber
                        </span>

                        <span class="text-sm font-medium text-gray-900 text-right">
                            {{ optional($booking->barber)->name ?? '-' }}
                        </span>

                    </div>


                    {{-- TANGGAL --}}
                    <div class="flex items-center justify-between gap-4">

                        <span class="text-sm text-gray-500">
                            Tanggal
                        </span>

                        <span class="text-sm font-medium text-gray-900 text-right">

                            @if($booking->booking_date)

                                {{ \Carbon\Carbon::parse($booking->booking_date)->format('d/m/Y') }}

                            @else

                                -

                            @endif

                        </span>

                    </div>


                    {{-- JAM --}}
                    <div class="flex items-center justify-between gap-4">

                        <span class="text-sm text-gray-500">
                            Jam
                        </span>

                        <span class="text-sm font-medium text-gray-900 text-right">

                            @if($booking->booking_time)

                                {{ \Carbon\Carbon::parse($booking->booking_time)->format('H:i') }}

                            @else

                                -

                            @endif

                        </span>

                    </div>


                    {{-- GARIS --}}
                    <div class="border-t border-gray-200 pt-5">

                        <div class="flex items-center justify-between">

                            <span class="text-sm text-gray-500">
                                Total
                            </span>

                            <span class="text-lg font-bold text-gray-900">

                                @if(optional($booking->service)->price !== null)

                                    Rp {{ number_format($booking->service->price, 0, ',', '.') }}

                                @else

                                    Rp 0

                                @endif

                            </span>

                        </div>

                    </div>

                </div>

            </div>



            {{-- ================================================= --}}
            {{-- HAPUS BOOKING --}}
            {{-- ================================================= --}}
            <div class="bg-white border border-red-100 rounded-2xl p-7">

                <h3 class="text-base font-semibold text-gray-900">
                    Hapus Booking
                </h3>

                <p class="mt-2 text-xs text-gray-400">
                    Data booking yang dihapus tidak dapat dikembalikan.
                </p>


                <form action="{{ route('admin.bookings.destroy', $booking) }}"
                      method="POST"
                      class="mt-6"
                      onsubmit="return confirm('Yakin ingin menghapus booking ini?')">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="w-full border border-red-200 text-red-600 rounded-xl px-5 py-3 text-sm font-medium hover:bg-red-50 transition">

                        Hapus Booking

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection