@extends('layouts.admin')

@section('title', 'Tambah Layanan')

@section('content')

<div class="min-h-screen bg-[#f7f7f8]">

    {{-- HEADER --}}
    <div class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-6 lg:px-10 py-5">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-xs text-gray-400 mb-1">
                        Admin Panel
                    </p>

                    <h1 class="text-xl font-semibold text-gray-900">
                        Tambah Layanan
                    </h1>
                </div>

                <div class="flex items-center gap-4">

                    <div class="hidden sm:block text-right">
                        <p class="text-sm font-medium text-gray-900">
                            Administrator
                        </p>

                        <p class="text-xs text-gray-400">
                            Administrator
                        </p>
                    </div>

                    <div
                        class="w-10 h-10 rounded-full bg-black text-white flex items-center justify-center font-semibold"
                    >
                        A
                    </div>

                </div>

            </div>

        </div>
    </div>


    {{-- MAIN --}}
    <main class="max-w-7xl mx-auto px-6 lg:px-10 py-8">

        {{-- BACK --}}
        <a
            href="{{ route('admin.services.index') }}"
            class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-gray-900 transition mb-8"
        >
            ← Kembali ke Layanan
        </a>


        {{-- TITLE --}}
        <div class="mb-8">

            <p class="text-xs font-medium tracking-[0.2em] uppercase text-gray-400 mb-2">
                Service Management
            </p>

            <h2 class="text-3xl font-semibold tracking-tight text-gray-900">
                Tambah Layanan
            </h2>

            <p class="text-sm text-gray-500 mt-2">
                Tambahkan layanan baru yang tersedia di barbershop.
            </p>

        </div>


        {{-- FORM CARD --}}
        <div class="w-full max-w-5xl bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden">

            {{-- CARD HEADER --}}
            <div class="px-7 py-6 border-b border-gray-200">

                <h3 class="text-base font-semibold text-gray-900">
                    Informasi Layanan
                </h3>

                <p class="text-sm text-gray-400 mt-1">
                    Isi informasi layanan dengan lengkap.
                </p>

            </div>


            {{-- FORM --}}
            <form
                action="{{ route('admin.services.store') }}"
                method="POST"
            >

                @csrf

                <div class="px-7 py-7 space-y-7">

                    {{-- NAMA LAYANAN --}}
                    <div>

                        <label
                            for="name"
                            class="block text-sm font-medium text-gray-800 mb-2"
                        >
                            Nama Layanan
                            <span class="text-red-500">*</span>
                        </label>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="Contoh: Classic Haircut"
                            required
                            class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-900 placeholder-gray-400 outline-none transition focus:border-gray-900 focus:ring-2 focus:ring-gray-900/5"
                        >

                        @error('name')
                            <p class="mt-2 text-xs text-red-500">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- HARGA & DURASI --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        {{-- HARGA --}}
                        <div>

                            <label
                                for="price"
                                class="block text-sm font-medium text-gray-800 mb-2"
                            >
                                Harga
                                <span class="text-red-500">*</span>
                            </label>

                            <div class="relative">

                                <span
                                    class="absolute left-4 top-1/2 -translate-y-1/2 text-sm text-gray-400"
                                >
                                    Rp
                                </span>

                                <input
                                    type="number"
                                    id="price"
                                    name="price"
                                    value="{{ old('price') }}"
                                    min="0"
                                    required
                                    placeholder="35000"
                                    class="w-full rounded-xl border border-gray-200 bg-white pl-12 pr-4 py-3 text-sm text-gray-900 placeholder-gray-400 outline-none transition focus:border-gray-900 focus:ring-2 focus:ring-gray-900/5"
                                >

                            </div>

                            @error('price')
                                <p class="mt-2 text-xs text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        {{-- DURASI --}}
                        <div>

                            <label
                                for="duration"
                                class="block text-sm font-medium text-gray-800 mb-2"
                            >
                                Durasi
                                <span class="text-red-500">*</span>
                            </label>

                            <div class="relative">

                                <input
                                    type="number"
                                    id="duration"
                                    name="duration"
                                    value="{{ old('duration', 30) }}"
                                    min="1"
                                    required
                                    class="w-full rounded-xl border border-gray-200 bg-white px-4 pr-20 py-3 text-sm text-gray-900 outline-none transition focus:border-gray-900 focus:ring-2 focus:ring-gray-900/5"
                                >

                                <span
                                    class="absolute right-4 top-1/2 -translate-y-1/2 text-xs text-gray-400"
                                >
                                    menit
                                </span>

                            </div>

                            @error('duration')
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
                            Status
                            <span class="text-red-500">*</span>
                        </label>

                        <select
                            id="status"
                            name="status"
                            required
                            class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-900 outline-none transition focus:border-gray-900 focus:ring-2 focus:ring-gray-900/5"
                        >

                            <option
                                value="active"
                                {{ old('status', 'active') === 'active' ? 'selected' : '' }}
                            >
                                Aktif
                            </option>

                            <option
                                value="inactive"
                                {{ old('status') === 'inactive' ? 'selected' : '' }}
                            >
                                Tidak Aktif
                            </option>

                        </select>

                        @error('status')
                            <p class="mt-2 text-xs text-red-500">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- DESKRIPSI --}}
                    <div>

                        <div class="flex items-center justify-between mb-2">

                            <label
                                for="description"
                                class="block text-sm font-medium text-gray-800"
                            >
                                Deskripsi
                            </label>

                            <span
                                id="description-counter"
                                class="text-xs text-gray-400"
                            >
                                0 / 1000
                            </span>

                        </div>

                        <textarea
                            id="description"
                            name="description"
                            rows="6"
                            maxlength="1000"
                            placeholder="Contoh: Potong rambut dengan gaya klasik dan finishing rapi"
                            class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-900 placeholder-gray-400 outline-none resize-none transition focus:border-gray-900 focus:ring-2 focus:ring-gray-900/5"
                        >{{ old('description') }}</textarea>

                        @error('description')
                            <p class="mt-2 text-xs text-red-500">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                </div>


                {{-- FOOTER --}}
                <div class="px-7 py-5 border-t border-gray-200 bg-gray-50">

                    <div class="flex flex-col-reverse sm:flex-row sm:justify-end gap-3">

                        <a
                            href="{{ route('admin.services.index') }}"
                            class="inline-flex items-center justify-center px-6 py-3 rounded-xl border border-gray-200 bg-white text-sm font-medium text-gray-700 hover:bg-gray-100 transition"
                        >
                            Batal
                        </a>

                        <button
                            type="submit"
                            class="inline-flex items-center justify-center px-6 py-3 rounded-xl bg-black text-white text-sm font-medium hover:bg-gray-800 transition"
                        >
                            Simpan Layanan
                        </button>

                    </div>

                </div>

            </form>

        </div>

    </main>

</div>


{{-- COUNTER DESKRIPSI --}}
<script>

    const description = document.getElementById('description');
    const counter = document.getElementById('description-counter');

    if (description && counter) {

        const updateCounter = () => {
            counter.textContent =
                `${description.value.length} / 1000`;
        };

        description.addEventListener('input', updateCounter);

        updateCounter();
    }

</script>

@endsection