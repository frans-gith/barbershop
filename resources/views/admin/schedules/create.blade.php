@extends('layouts.admin')

@section('title', 'Tambah Jadwal')

@section('content')

<div class="min-h-screen bg-[#f5f5f6]">

    {{-- HEADER --}}
    <div class="border-b border-gray-200 bg-white">
        <div class="px-8 py-5">

            <div class="text-xs text-gray-400 mb-1">
                Admin Panel
            </div>

            <h1 class="text-xl font-semibold text-gray-900">
                Tambah Jadwal
            </h1>

        </div>
    </div>


    {{-- CONTENT --}}
    <main class="px-8 py-10 pb-16">

        {{-- BACK --}}
        <div class="mb-8">
            <a href="{{ route('admin.schedules.index') }}"
               class="inline-flex items-center gap-1 text-sm text-gray-500 hover:text-gray-900 transition">

                <span>←</span>
                <span>Kembali ke Jadwal</span>

            </a>
        </div>


        {{-- TITLE --}}
        <div class="mb-8">

            <div class="text-xs tracking-[0.25em] text-gray-400 uppercase mb-3">
                Schedule Management
            </div>

            <h2 class="text-2xl font-semibold text-gray-900">
                Tambah Jadwal
            </h2>

            <p class="mt-2 text-sm text-gray-500">
                Tambahkan jadwal kerja baru untuk barber.
            </p>

        </div>


        {{-- FORM CARD --}}
        <div class="w-full max-w-4xl">

            <form
                action="{{ route('admin.schedules.store') }}"
                method="POST"
                class="bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm"
            >

                @csrf


                {{-- CARD HEADER --}}
                <div class="px-7 py-6 border-b border-gray-200">

                    <h3 class="text-base font-semibold text-gray-900">
                        Informasi Jadwal
                    </h3>

                    <p class="text-sm text-gray-400 mt-1">
                        Isi informasi jadwal dengan lengkap.
                    </p>

                </div>


                {{-- FORM BODY --}}
                <div class="px-7 py-7 space-y-6">


                    {{-- BARBER --}}
                    <div>

                        <label
                            for="barber_id"
                            class="block text-sm font-medium text-gray-800 mb-2"
                        >
                            Barber <span class="text-red-500">*</span>
                        </label>

                        <select
                            id="barber_id"
                            name="barber_id"
                            required
                            class="w-full h-12 px-4 rounded-xl border border-gray-200
                                   bg-white text-sm text-gray-900
                                   focus:outline-none focus:ring-2 focus:ring-gray-900/10
                                   focus:border-gray-400 transition"
                        >

                            <option value="">
                                Pilih barber
                            </option>

                            @foreach($barbers as $barber)

                                <option
                                    value="{{ $barber->id }}"
                                    {{ old('barber_id') == $barber->id ? 'selected' : '' }}
                                >
                                    {{ $barber->name }}
                                </option>

                            @endforeach

                        </select>

                        @error('barber_id')
                            <p class="mt-2 text-xs text-red-500">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- HARI --}}
                    <div>

                        <label
                            for="day"
                            class="block text-sm font-medium text-gray-800 mb-2"
                        >
                            Hari <span class="text-red-500">*</span>
                        </label>

                        <select
                            id="day"
                            name="day"
                            required
                            class="w-full h-12 px-4 rounded-xl border border-gray-200
                                   bg-white text-sm text-gray-900
                                   focus:outline-none focus:ring-2 focus:ring-gray-900/10
                                   focus:border-gray-400 transition"
                        >

                            <option value="">
                                Pilih hari
                            </option>

                            <option value="Senin" {{ old('day') == 'Senin' ? 'selected' : '' }}>
                                Senin
                            </option>

                            <option value="Selasa" {{ old('day') == 'Selasa' ? 'selected' : '' }}>
                                Selasa
                            </option>

                            <option value="Rabu" {{ old('day') == 'Rabu' ? 'selected' : '' }}>
                                Rabu
                            </option>

                            <option value="Kamis" {{ old('day') == 'Kamis' ? 'selected' : '' }}>
                                Kamis
                            </option>

                            <option value="Jumat" {{ old('day') == 'Jumat' ? 'selected' : '' }}>
                                Jumat
                            </option>

                            <option value="Sabtu" {{ old('day') == 'Sabtu' ? 'selected' : '' }}>
                                Sabtu
                            </option>

                            <option value="Minggu" {{ old('day') == 'Minggu' ? 'selected' : '' }}>
                                Minggu
                            </option>

                        </select>

                        @error('day')
                            <p class="mt-2 text-xs text-red-500">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- JAM --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        {{-- JAM MULAI --}}
                        <div>

                            <label
                                for="start_time"
                                class="block text-sm font-medium text-gray-800 mb-2"
                            >
                                Jam Mulai <span class="text-red-500">*</span>
                            </label>

                            <input
                                type="time"
                                id="start_time"
                                name="start_time"
                                value="{{ old('start_time') }}"
                                required
                                class="w-full h-12 px-4 rounded-xl border border-gray-200
                                       bg-white text-sm text-gray-900
                                       focus:outline-none focus:ring-2 focus:ring-gray-900/10
                                       focus:border-gray-400 transition"
                            >

                            @error('start_time')
                                <p class="mt-2 text-xs text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        {{-- JAM SELESAI --}}
                        <div>

                            <label
                                for="end_time"
                                class="block text-sm font-medium text-gray-800 mb-2"
                            >
                                Jam Selesai <span class="text-red-500">*</span>
                            </label>

                            <input
                                type="time"
                                id="end_time"
                                name="end_time"
                                value="{{ old('end_time') }}"
                                required
                                class="w-full h-12 px-4 rounded-xl border border-gray-200
                                       bg-white text-sm text-gray-900
                                       focus:outline-none focus:ring-2 focus:ring-gray-900/10
                                       focus:border-gray-400 transition"
                            >

                            @error('end_time')
                                <p class="mt-2 text-xs text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                    </div>


                    {{-- STATUS --}}
                    <div>

                        <label
                            for="status"
                            class="block text-sm font-medium text-gray-800 mb-2"
                        >
                            Status <span class="text-red-500">*</span>
                        </label>

                        <select
                            id="status"
                            name="status"
                            required
                            class="w-full h-12 px-4 rounded-xl border border-gray-200
                                   bg-white text-sm text-gray-900
                                   focus:outline-none focus:ring-2 focus:ring-gray-900/10
                                   focus:border-gray-400 transition"
                        >

                            <option value="active"
                                {{ old('status', 'active') == 'active' ? 'selected' : '' }}>
                                Aktif
                            </option>

                            <option value="inactive"
                                {{ old('status') == 'inactive' ? 'selected' : '' }}>
                                Tidak Aktif
                            </option>

                        </select>

                        @error('status')
                            <p class="mt-2 text-xs text-red-500">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                </div>


                {{-- FOOTER --}}
                <div class="px-7 py-5 border-t border-gray-200 bg-gray-50/50">

                    <div class="flex flex-col-reverse sm:flex-row sm:justify-end gap-3">

                        <a
                            href="{{ route('admin.schedules.index') }}"
                            class="inline-flex items-center justify-center
                                   h-11 px-6 rounded-xl
                                   border border-gray-200
                                   bg-white text-sm font-medium text-gray-700
                                   hover:bg-gray-50 transition"
                        >
                            Batal
                        </a>

                        <button
                            type="submit"
                            class="inline-flex items-center justify-center
                                   h-11 px-6 rounded-xl
                                   bg-[#09090b] text-white
                                   text-sm font-medium
                                   hover:bg-gray-800 transition
                                   shadow-sm"
                        >
                            Simpan Jadwal
                        </button>

                    </div>

                </div>

            </form>

        </div>

    </main>

</div>

@endsection