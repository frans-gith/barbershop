@extends('layouts.admin')

@section('title', 'Tambah Barber')

@section('header', 'Tambah Barber')

@section('content')

<div class="max-w-6xl">

    {{-- HEADER --}}
    <div class="mb-6">

        <a
            href="{{ route('admin.barbers.index') }}"
            class="inline-flex items-center gap-2 text-sm text-zinc-500
                   hover:text-zinc-900 transition mb-4">

            ← Kembali ke Barber

        </a>

        <div>
            <p class="text-[11px] uppercase tracking-[0.22em] text-zinc-400 mb-1">
                TEAM MANAGEMENT
            </p>

            <h1 class="text-2xl font-semibold text-zinc-950">
                Tambah Barber
            </h1>

            <p class="text-sm text-zinc-500 mt-1">
                Tambahkan anggota barber baru ke dalam sistem.
            </p>
        </div>

    </div>


    {{-- ERROR --}}
    @if($errors->any())

        <div class="mb-5 rounded-xl border border-red-200 bg-red-50 px-5 py-4">

            <div class="flex gap-3">

                <div
                    class="flex h-8 w-8 shrink-0 items-center justify-center
                           rounded-full bg-red-100 text-red-600 font-semibold">

                    !

                </div>

                <div>

                    <p class="text-sm font-medium text-red-800">
                        Data belum dapat disimpan.
                    </p>

                    <ul class="mt-1 space-y-1 text-xs text-red-600">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            </div>

        </div>

    @endif


    {{-- FORM --}}
    <form
        action="{{ route('admin.barbers.store') }}"
        method="POST"
        enctype="multipart/form-data">

        @csrf


        <div class="overflow-hidden rounded-2xl border border-zinc-200 bg-white">


            {{-- CARD HEADER --}}
            <div class="border-b border-zinc-200 px-6 py-5">

                <h2 class="text-sm font-semibold text-zinc-900">
                    Informasi Barber
                </h2>

                <p class="mt-1 text-xs text-zinc-400">
                    Isi informasi barber dengan lengkap dan benar.
                </p>

            </div>


            {{-- FORM CONTENT --}}
            <div class="grid grid-cols-1 lg:grid-cols-2">


                {{-- ========================================= --}}
                {{-- LEFT --}}
                {{-- ========================================= --}}

                <div class="p-6 lg:p-7">

                    <div class="space-y-5">


                        {{-- NAMA --}}
                        <div>

                            <label
                                for="name"
                                class="mb-2 block text-xs font-medium text-zinc-700">

                                Nama Barber
                                <span class="text-red-500">*</span>

                            </label>

                            <input
                                type="text"
                                id="name"
                                name="name"
                                value="{{ old('name') }}"
                                required
                                placeholder="Contoh: Bimo Pratama"
                                class="w-full rounded-xl border border-zinc-200
                                       bg-zinc-50/40 px-4 py-3
                                       text-sm text-zinc-900
                                       placeholder:text-zinc-400
                                       outline-none transition
                                       focus:border-zinc-900
                                       focus:bg-white
                                       focus:ring-2 focus:ring-zinc-100">

                            @error('name')

                                <p class="mt-1.5 text-xs text-red-500">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                        {{-- TELEPON --}}
                        <div>

                            <label
                                for="phone"
                                class="mb-2 block text-xs font-medium text-zinc-700">

                                Nomor Telepon

                            </label>

                            <input
                                type="text"
                                id="phone"
                                name="phone"
                                value="{{ old('phone') }}"
                                placeholder="08xxxxxxxxxx"
                                class="w-full rounded-xl border border-zinc-200
                                       bg-zinc-50/40 px-4 py-3
                                       text-sm text-zinc-900
                                       placeholder:text-zinc-400
                                       outline-none transition
                                       focus:border-zinc-900
                                       focus:bg-white
                                       focus:ring-2 focus:ring-zinc-100">

                            @error('phone')

                                <p class="mt-1.5 text-xs text-red-500">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                        {{-- SPESIALISASI --}}
                        <div>

                            <label
                                for="specialization"
                                class="mb-2 block text-xs font-medium text-zinc-700">

                                Spesialisasi

                            </label>

                            <input
                                type="text"
                                id="specialization"
                                name="specialization"
                                value="{{ old('specialization') }}"
                                placeholder="Contoh: Classic Cut, Fade, Beard"
                                class="w-full rounded-xl border border-zinc-200
                                       bg-zinc-50/40 px-4 py-3
                                       text-sm text-zinc-900
                                       placeholder:text-zinc-400
                                       outline-none transition
                                       focus:border-zinc-900
                                       focus:bg-white
                                       focus:ring-2 focus:ring-zinc-100">

                            @error('specialization')

                                <p class="mt-1.5 text-xs text-red-500">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                        {{-- STATUS --}}
                        <div>

                            <label
                                for="status"
                                class="mb-2 block text-xs font-medium text-zinc-700">

                                Status
                                <span class="text-red-500">*</span>

                            </label>

                            <select
                                id="status"
                                name="status"
                                required
                                class="w-full rounded-xl border border-zinc-200
                                       bg-zinc-50/40 px-4 py-3
                                       text-sm text-zinc-900
                                       outline-none transition
                                       focus:border-zinc-900
                                       focus:bg-white
                                       focus:ring-2 focus:ring-zinc-100">

                                <option
                                    value="active"
                                    {{ old('status', 'active') === 'active' ? 'selected' : '' }}>

                                    Aktif

                                </option>

                                <option
                                    value="inactive"
                                    {{ old('status') === 'inactive' ? 'selected' : '' }}>

                                    Tidak Aktif

                                </option>

                            </select>

                            @error('status')

                                <p class="mt-1.5 text-xs text-red-500">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                        {{-- DESKRIPSI --}}
                        <div>

                            <div class="mb-2 flex items-center justify-between">

                                <label
                                    for="description"
                                    class="block text-xs font-medium text-zinc-700">

                                    Deskripsi

                                </label>

                                <span
                                    id="descriptionCounter"
                                    class="text-[11px] text-zinc-400">

                                    0 / 500

                                </span>

                            </div>

                            <textarea
                                id="description"
                                name="description"
                                rows="5"
                                maxlength="500"
                                placeholder="Tuliskan pengalaman atau keahlian barber..."
                                class="w-full resize-none rounded-xl
                                       border border-zinc-200
                                       bg-zinc-50/40 px-4 py-3
                                       text-sm text-zinc-900
                                       placeholder:text-zinc-400
                                       outline-none transition
                                       focus:border-zinc-900
                                       focus:bg-white
                                       focus:ring-2 focus:ring-zinc-100">{{ old('description') }}</textarea>

                            @error('description')

                                <p class="mt-1.5 text-xs text-red-500">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>

                    </div>

                </div>


                {{-- ========================================= --}}
                {{-- RIGHT --}}
                {{-- ========================================= --}}

                <div
                    class="border-t border-zinc-200
                           bg-zinc-50/40 p-6 lg:border-l
                           lg:border-t-0 lg:p-7">

                    <p
                        class="mb-5 text-[11px] uppercase
                               tracking-[0.18em] text-zinc-400">

                        Foto Barber

                    </p>


                    {{-- PHOTO PREVIEW --}}
                    <div
                        id="photoPreviewContainer"
                        class="relative flex h-80 w-full items-center
                               justify-center overflow-hidden rounded-2xl
                               border-2 border-dashed border-zinc-200
                               bg-white transition
                               hover:border-zinc-400">

                        {{-- DEFAULT --}}
                        <div
                            id="uploadPlaceholder"
                            class="flex flex-col items-center text-center">

                            <div
                                class="mb-4 flex h-14 w-14 items-center
                                       justify-center rounded-xl
                                       bg-zinc-100 text-zinc-500">

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="h-7 w-7">

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.159 2.159M3.75 21h16.5a1.5 1.5 0 001.5-1.5V5.25A1.5 1.5 0 0020.25 3.75H3.75a1.5 1.5 0 00-1.5 1.5v15.75A1.5 1.5 0 003.75 21z" />

                                </svg>

                            </div>


                            <p class="text-sm font-medium text-zinc-700">

                                Pilih foto barber

                            </p>

                            <p class="mt-1 text-xs text-zinc-400">

                                JPG, JPEG, PNG · Maksimal 2 MB

                            </p>


                            <label
                                for="photo"
                                class="mt-5 cursor-pointer rounded-xl
                                       bg-zinc-950 px-5 py-2.5
                                       text-xs font-medium text-white
                                       transition hover:bg-zinc-800">

                                Pilih File

                            </label>


                            <p
                                id="fileName"
                                class="mt-3 max-w-[250px]
                                       truncate text-[11px]
                                       text-zinc-400">

                                Belum ada file dipilih

                            </p>

                        </div>


                        {{-- IMAGE PREVIEW --}}
                        <img
                            id="photoPreview"
                            src=""
                            alt="Preview foto"
                            class="hidden h-full w-full object-cover">

                    </div>


                    {{-- FILE INPUT --}}
                    <input
                        type="file"
                        id="photo"
                        name="photo"
                        accept="image/jpeg,image/jpg,image/png"
                        class="hidden">


                    @error('photo')

                        <p class="mt-2 text-xs text-red-500">
                            {{ $message }}
                        </p>

                    @enderror


                    {{-- TIPS --}}
                    <div
                        class="mt-5 rounded-2xl
                               border border-amber-200
                               bg-amber-50/70 p-5">

                        <div class="flex gap-3">

                            <div
                                class="flex h-9 w-9 shrink-0
                                       items-center justify-center
                                       rounded-full bg-amber-100
                                       text-amber-600">

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="h-5 w-5">

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M12 18v-5.25m0 0a6.75 6.75 0 001.5-13.25 6.75 6.75 0 00-3 0A6.75 6.75 0 009 12.75m3 0a6.75 6.75 0 01-1.5-13.25M12 18h.007v.008H12V18z" />

                                </svg>

                            </div>


                            <div>

                                <p class="text-xs font-semibold text-amber-900">
                                    Tips Foto
                                </p>

                                <ul
                                    class="mt-2 space-y-1
                                           text-[11px] leading-5
                                           text-amber-800">

                                    <li>
                                        • Gunakan foto dengan pencahayaan yang baik.
                                    </li>

                                    <li>
                                        • Wajah terlihat jelas.
                                    </li>

                                    <li>
                                        • Gunakan foto dengan posisi portrait.
                                    </li>

                                    <li>
                                        • Ukuran file maksimal 2 MB.
                                    </li>

                                </ul>

                            </div>

                        </div>

                    </div>


                    {{-- INFO STATUS --}}
                    <div
                        class="mt-4 rounded-2xl
                               border border-zinc-200
                               bg-white p-4">

                        <p class="text-xs font-medium text-zinc-700">
                            Status Barber
                        </p>

                        <p class="mt-1 text-[11px] leading-5 text-zinc-400">

                            Barber aktif dapat digunakan untuk jadwal
                            dan menerima booking pelanggan.

                        </p>

                    </div>

                </div>

            </div>


            {{-- ========================================= --}}
            {{-- FOOTER --}}
            {{-- ========================================= --}}

            <div
                class="flex flex-col gap-3
                       border-t border-zinc-200
                       bg-white px-6 py-4
                       sm:flex-row sm:items-center
                       sm:justify-between">

                <div>

                    <p class="text-[11px] text-zinc-400">

                        <span class="text-red-500">*</span>
                        Wajib diisi

                    </p>

                </div>


                <div class="flex flex-col-reverse gap-2 sm:flex-row">

                    <a
                        href="{{ route('admin.barbers.index') }}"
                        class="rounded-xl border border-zinc-200
                               bg-white px-5 py-2.5
                               text-center text-xs font-medium
                               text-zinc-600 transition
                               hover:bg-zinc-50">

                        Batal

                    </a>


                    <button
                        type="submit"
                        class="rounded-xl bg-zinc-950
                               px-6 py-2.5
                               text-xs font-medium text-white
                               transition hover:bg-zinc-800">

                        Simpan Barber

                    </button>

                </div>

            </div>

        </div>

    </form>

</div>


{{-- ========================================= --}}
{{-- JAVASCRIPT --}}
{{-- ========================================= --}}

<script>

document.addEventListener('DOMContentLoaded', function () {

    const photoInput = document.getElementById('photo');

    const photoPreview =
        document.getElementById('photoPreview');

    const placeholder =
        document.getElementById('uploadPlaceholder');

    const fileName =
        document.getElementById('fileName');

    const description =
        document.getElementById('description');

    const counter =
        document.getElementById('descriptionCounter');


    /*
    |--------------------------------------------------------------------------
    | PHOTO PREVIEW
    |--------------------------------------------------------------------------
    */

    photoInput.addEventListener('change', function () {

        const file = this.files[0];

        if (!file) {

            photoPreview.classList.add('hidden');

            placeholder.classList.remove('hidden');

            fileName.textContent =
                'Belum ada file dipilih';

            return;

        }


        // Validasi ukuran
        if (file.size > 2 * 1024 * 1024) {

            alert('Ukuran foto maksimal 2 MB.');

            this.value = '';

            photoPreview.classList.add('hidden');

            placeholder.classList.remove('hidden');

            fileName.textContent =
                'Belum ada file dipilih';

            return;

        }


        // Validasi tipe
        const allowedTypes = [
            'image/jpeg',
            'image/jpg',
            'image/png'
        ];

        if (!allowedTypes.includes(file.type)) {

            alert('Format foto harus JPG, JPEG, atau PNG.');

            this.value = '';

            return;

        }


        const reader = new FileReader();


        reader.onload = function (e) {

            photoPreview.src = e.target.result;

            photoPreview.classList.remove('hidden');

            placeholder.classList.add('hidden');

        };


        reader.readAsDataURL(file);


        fileName.textContent = file.name;

    });


    /*
    |--------------------------------------------------------------------------
    | DESCRIPTION COUNTER
    |--------------------------------------------------------------------------
    */

    function updateCounter()
    {
        const length = description.value.length;

        counter.textContent = length + ' / 500';
    }


    description.addEventListener(
        'input',
        updateCounter
    );


    updateCounter();

});

</script>

@endsection