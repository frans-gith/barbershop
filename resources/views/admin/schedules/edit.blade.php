@extends('layouts.admin')

@section('title', 'Edit Jadwal')

@section('content')

<div class="min-h-screen bg-[#f5f5f6] px-5 py-8 md:px-8 lg:px-10">

    {{-- HEADER --}}
    <div class="max-w-5xl">

        {{-- Back --}}
        <a
            href="{{ route('admin.schedules.index') }}"
            class="inline-flex items-center gap-1 text-sm text-gray-500 hover:text-black transition mb-8"
        >
            ← Kembali ke Jadwal
        </a>

        {{-- Heading --}}
        <div class="mb-8">
            <p class="text-xs tracking-[0.28em] text-gray-400 uppercase mb-3">
                Schedule Management
            </p>

            <h1 class="text-2xl md:text-3xl font-semibold text-gray-900">
                Edit Jadwal
            </h1>

            <p class="mt-2 text-sm text-gray-500">
                Perbarui informasi jadwal
                {{ $schedule->barber->name ?? 'barber' }}.
            </p>
        </div>

        {{-- FORM CARD --}}
        <div class="w-full max-w-4xl bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm">

            {{-- CARD HEADER --}}
            <div class="px-6 md:px-7 py-6 border-b border-gray-200">
                <h2 class="text-base font-semibold text-gray-900">
                    Informasi Jadwal
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Perbarui informasi jadwal barber.
                </p>
            </div>

            {{-- FORM --}}
            <form
                action="{{ route('admin.schedules.update', $schedule) }}"
                method="POST"
            >

                @csrf
                @method('PUT')

                <div class="px-6 md:px-7 py-7 space-y-6">

                    {{-- ERROR --}}
                    @if ($errors->any())
                        <div class="rounded-xl border border-red-200 bg-red-50 px-4 py-3">
                            <p class="text-sm font-medium text-red-700 mb-1">
                                Terdapat kesalahan:
                            </p>

                            <ul class="text-sm text-red-600 list-disc ml-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- BARBER --}}
                    <div>
                        <label
                            for="barber_id"
                            class="block text-sm font-medium text-gray-700 mb-2"
                        >
                            Barber <span class="text-red-500">*</span>
                        </label>

                        <select
                            id="barber_id"
                            name="barber_id"
                            required
                            class="w-full h-11 px-4 rounded-xl border border-gray-200 bg-white text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-black/10 focus:border-gray-400 transition"
                        >
                            <option value="">Pilih barber</option>

                            @foreach ($barbers as $barber)
                                <option
                                    value="{{ $barber->id }}"
                                    {{ old('barber_id', $schedule->barber_id) == $barber->id ? 'selected' : '' }}
                                >
                                    {{ $barber->name }}
                                </option>
                            @endforeach
                        </select>

                        @error('barber_id')
                            <p class="mt-1 text-xs text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- HARI --}}
                    <div>
                        <label
                            for="day"
                            class="block text-sm font-medium text-gray-700 mb-2"
                        >
                            Hari <span class="text-red-500">*</span>
                        </label>

                        <select
                            id="day"
                            name="day"
                            required
                            class="w-full h-11 px-4 rounded-xl border border-gray-200 bg-white text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-black/10 focus:border-gray-400 transition"
                        >
                            @foreach ([
                                'Senin',
                                'Selasa',
                                'Rabu',
                                'Kamis',
                                'Jumat',
                                'Sabtu',
                                'Minggu'
                            ] as $day)
                                <option
                                    value="{{ $day }}"
                                    {{ old('day', $schedule->day) == $day ? 'selected' : '' }}
                                >
                                    {{ $day }}
                                </option>
                            @endforeach
                        </select>

                        @error('day')
                            <p class="mt-1 text-xs text-red-500">
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
                                class="block text-sm font-medium text-gray-700 mb-2"
                            >
                                Jam Mulai <span class="text-red-500">*</span>
                            </label>

                            <input
                                type="time"
                                id="start_time"
                                name="start_time"
                                value="{{ old('start_time', \Carbon\Carbon::parse($schedule->start_time)->format('H:i')) }}"
                                required
                                class="w-full h-11 px-4 rounded-xl border border-gray-200 bg-white text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-black/10 focus:border-gray-400 transition"
                            >

                            @error('start_time')
                                <p class="mt-1 text-xs text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- JAM SELESAI --}}
                        <div>
                            <label
                                for="end_time"
                                class="block text-sm font-medium text-gray-700 mb-2"
                            >
                                Jam Selesai <span class="text-red-500">*</span>
                            </label>

                            <input
                                type="time"
                                id="end_time"
                                name="end_time"
                                value="{{ old('end_time', \Carbon\Carbon::parse($schedule->end_time)->format('H:i')) }}"
                                required
                                class="w-full h-11 px-4 rounded-xl border border-gray-200 bg-white text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-black/10 focus:border-gray-400 transition"
                            >

                            @error('end_time')
                                <p class="mt-1 text-xs text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                    </div>

                    {{-- STATUS --}}
                    <div>
                        <label
                            for="status"
                            class="block text-sm font-medium text-gray-700 mb-2"
                        >
                            Status <span class="text-red-500">*</span>
                        </label>

                        <select
                            id="status"
                            name="status"
                            required
                            class="w-full h-11 px-4 rounded-xl border border-gray-200 bg-white text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-black/10 focus:border-gray-400 transition"
                        >
                            <option
                                value="active"
                                {{ old('status', $schedule->status) == 'active' ? 'selected' : '' }}
                            >
                                Aktif
                            </option>

                            <option
                                value="inactive"
                                {{ old('status', $schedule->status) == 'inactive' ? 'selected' : '' }}
                            >
                                Tidak Aktif
                            </option>
                        </select>

                        @error('status')
                            <p class="mt-1 text-xs text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                </div>

                {{-- FOOTER BUTTON --}}
                <div class="px-6 md:px-7 py-5 border-t border-gray-200 bg-gray-50/50 flex flex-col-reverse sm:flex-row sm:justify-end gap-3">

                    <a
                        href="{{ route('admin.schedules.index') }}"
                        class="inline-flex items-center justify-center h-11 px-6 rounded-xl border border-gray-200 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 transition"
                    >
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="inline-flex items-center justify-center h-11 px-7 rounded-xl bg-black text-white text-sm font-semibold hover:bg-gray-800 transition"
                    >
                        Simpan Perubahan
                    </button>

                </div>

            </form>

        </div>

        {{-- BOTTOM SPACE --}}
        <div class="h-16"></div>

    </div>

</div>

@endsection