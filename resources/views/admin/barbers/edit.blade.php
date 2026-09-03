@extends('layouts.admin')

@section('title', 'Edit Barber')

@section('header', 'Edit Barber')

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
                Edit Barber
            </h1>

            <p class="text-sm text-zinc-500 mt-1">
                Perbarui informasi {{ $barber->name }}.
            </p>
        </div>

    </div>


    {{-- ERROR --}}
    @if($errors->any())

        <div class="mb-5 rounded-xl border border-red-200 bg-red-50 px-5 py-4">

            <div class="flex gap-3">

                <div
                    class="flex h-8 w-8 shrink-0 items-center justify-center
                           rounded-full bg-red-100 text-red-600">

                    !

                </div>

                <div>

                    <p class="text-sm font-medium text-red-800">
                        Periksa kembali data yang dimasukkan.
                    </p>

                    <ul class="mt-1 text-xs text-red-600 space-y-1">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            </div>

        </div>

    @endif


    {{-- MAIN FORM --}}
    <form
        action="{{ route('admin.barbers.update', $barber) }}"
        method="POST"
        enctype="multipart/form-data">

        @csrf
        @method('PUT')


        <div class="rounded-2xl border border-zinc-200 bg-white overflow-hidden">


            {{-- CARD HEADER --}}
            <div class="px-6 py-5 border-b border-zinc-200">

                <div class="flex items-center justify-between">

                    <div>

                        <h2 class="text-sm font-semibold text-zinc-900">
                            Informasi Barber
                        </h2>

                        <p class="text-xs text-zinc-400 mt-1">
                            Kelola data dan profil barber.
                        </p>

                    </div>

                    <div
                        class="hidden sm:flex items-center gap-2
                               rounded-full bg-zinc-50
                               px-3 py-1.5
                               text-[11px] text-zinc-500">

                        ID #{{ $barber->id }}

                    </div>

                </div>

            </div>


            {{-- CONTENT --}}
            <div class="grid grid-cols-1 lg:grid-cols-3">


                {{-- LEFT : FORM --}}
                <div class="lg:col-span-2 p-6 lg:p-7">

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">


                        {{-- NAME --}}
                        <div class="sm:col-span-2">

                            <label
                                for="name"
                                class="block text-xs font-medium text-zinc-700 mb-2">

                                Nama Barber
                                <span class="text-red-500">*</span>

                            </label>

                            <input
                                type="text"
                                id="name"
                                name="name"
                                value="{{ old('name', $barber->name) }}"
                                required
                                class="w-full rounded-xl
                                       border border-zinc-200
                                       bg-zinc-50/40
                                       px-4 py-3
                                       text-sm text-zinc-900
                                       outline-none
                                       transition
                                       focus:bg-white
                                       focus:border-zinc-900
                                       focus:ring-2 focus:ring-zinc-100">

                            @error('name')

                                <p class="mt-1.5 text-xs text-red-500">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                        {{-- PHONE --}}
                        <div>

                            <label
                                for="phone"
                                class="block text-xs font-medium text-zinc-700 mb-2">

                                Nomor Telepon

                            </label>

                            <input
                                type="text"
                                id="phone"
                                name="phone"
                                value="{{ old('phone', $barber->phone) }}"
                                placeholder="08xxxxxxxxxx"
                                class="w-full rounded-xl
                                       border border-zinc-200
                                       bg-zinc-50/40
                                       px-4 py-3
                                       text-sm
                                       outline-none
                                       transition
                                       focus:bg-white
                                       focus:border-zinc-900
                                       focus:ring-2 focus:ring-zinc-100">

                            @error('phone')

                                <p class="mt-1.5 text-xs text-red-500">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                        {{-- SPECIALIZATION --}}
                        <div>

                            <label
                                for="specialization"
                                class="block text-xs font-medium text-zinc-700 mb-2">

                                Spesialisasi

                            </label>

                            <input
                                type="text"
                                id="specialization"
                                name="specialization"
                                value="{{ old('specialization', $barber->specialization) }}"
                                placeholder="Contoh: Fade"
                                class="w-full rounded-xl
                                       border border-zinc-200
                                       bg-zinc-50/40
                                       px-4 py-3
                                       text-sm
                                       outline-none
                                       transition
                                       focus:bg-white
                                       focus:border-zinc-900
                                       focus:ring-2 focus:ring-zinc-100">

                            @error('specialization')

                                <p class="mt-1.5 text-xs text-red-500">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                        {{-- DESCRIPTION --}}
                        <div class="sm:col-span-2">

                            <label
                                for="description"
                                class="block text-xs font-medium text-zinc-700 mb-2">

                                Deskripsi

                            </label>

                            <textarea
                                id="description"
                                name="description"
                                rows="4"
                                placeholder="Tuliskan pengalaman atau keahlian barber..."
                                class="w-full rounded-xl
                                       border border-zinc-200
                                       bg-zinc-50/40
                                       px-4 py-3
                                       text-sm
                                       outline-none
                                       resize-none
                                       transition
                                       focus:bg-white
                                       focus:border-zinc-900
                                       focus:ring-2 focus:ring-zinc-100">{{ old('description', $barber->description) }}</textarea>

                            @error('description')

                                <p class="mt-1.5 text-xs text-red-500">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                        {{-- PHOTO --}}
                        <div class="sm:col-span-2">

                            <label
                                for="photo"
                                class="block text-xs font-medium text-zinc-700 mb-2">

                                Ganti Foto

                            </label>

                            <input
                                type="file"
                                id="photo"
                                name="photo"
                                accept="image/*"
                                class="block w-full rounded-xl
                                       border border-zinc-200
                                       bg-white
                                       text-xs text-zinc-500
                                       file:mr-4
                                       file:border-0
                                       file:bg-zinc-950
                                       file:px-4
                                       file:py-2.5
                                       file:text-xs
                                       file:font-medium
                                       file:text-white
                                       hover:file:bg-zinc-800">

                            <p class="mt-1.5 text-[11px] text-zinc-400">
                                Kosongkan jika tidak ingin mengganti foto. Maksimal 2 MB.
                            </p>

                            @error('photo')

                                <p class="mt-1.5 text-xs text-red-500">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>

                    </div>

                </div>


                {{-- RIGHT : PROFILE --}}
                <div
                    class="border-t lg:border-t-0 lg:border-l
                           border-zinc-200
                           bg-zinc-50/50
                           p-6 lg:p-7">

                    <p
                        class="text-[11px] uppercase
                               tracking-[0.18em]
                               text-zinc-400 mb-5">

                        Profil Barber

                    </p>


                    {{-- PHOTO --}}
                    <div class="flex justify-center">

                        @if($barber->photo)

                            <img
                                src="{{ asset('storage/' . $barber->photo) }}"
                                alt="{{ $barber->name }}"
                                class="h-32 w-32 rounded-2xl
                                       object-cover
                                       border border-zinc-200
                                       shadow-sm">

                        @else

                            <div
                                class="h-32 w-32 rounded-2xl
                                       bg-zinc-950
                                       text-white
                                       flex items-center justify-center
                                       text-4xl font-semibold">

                                {{ strtoupper(substr($barber->name, 0, 1)) }}

                            </div>

                        @endif

                    </div>


                    {{-- NAME --}}
                    <div class="text-center mt-5">

                        <h3 class="font-semibold text-zinc-900">
                            {{ $barber->name }}
                        </h3>

                        <p class="text-xs text-zinc-400 mt-1">
                            {{ $barber->specialization ?: 'Barber' }}
                        </p>

                    </div>


                    {{-- STATUS --}}
                    <div class="mt-7">

                        <p class="text-[11px] uppercase tracking-wider text-zinc-400 mb-2">
                            Status Barber
                        </p>


                        <div class="rounded-xl border border-zinc-200 bg-white p-4">

                            <div class="flex items-center justify-between">

                                <span class="text-sm text-zinc-600">
                                    Status
                                </span>


                                <label class="relative inline-flex items-center cursor-pointer">

                                    <input
                                        type="checkbox"
                                        id="statusToggle"
                                        class="sr-only peer"
                                        {{ old('status', $barber->status) === 'active' ? 'checked' : '' }}
                                        onchange="document.getElementById('status').value = this.checked ? 'active' : 'inactive'">

                                    <div
                                        class="w-10 h-5
                                               bg-zinc-200
                                               rounded-full
                                               peer
                                               peer-checked:bg-zinc-950
                                               after:content-['']
                                               after:absolute
                                               after:top-[2px]
                                               after:left-[2px]
                                               after:bg-white
                                               after:rounded-full
                                               after:h-4
                                               after:w-4
                                               after:transition-all
                                               peer-checked:after:translate-x-5">
                                    </div>

                                </label>

                            </div>


                            <div class="mt-3">

                                <span
                                    id="statusText"
                                    class="inline-flex items-center gap-2
                                           text-xs font-medium
                                           {{ old('status', $barber->status) === 'active'
                                                ? 'text-emerald-600'
                                                : 'text-zinc-400' }}">

                                    <span
                                        class="h-1.5 w-1.5 rounded-full
                                               {{ old('status', $barber->status) === 'active'
                                                    ? 'bg-emerald-500'
                                                    : 'bg-zinc-400' }}">
                                    </span>

                                    <span id="statusLabel">
                                        {{ old('status', $barber->status) === 'active'
                                            ? 'Aktif'
                                            : 'Tidak Aktif' }}
                                    </span>

                                </span>

                            </div>

                        </div>

                        <input
                            type="hidden"
                            name="status"
                            id="status"
                            value="{{ old('status', $barber->status) }}">

                    </div>


                    {{-- INFO --}}
                    <div
                        class="mt-5 rounded-xl
                               border border-zinc-200
                               bg-white p-4">

                        <p class="text-xs font-medium text-zinc-700">
                            Informasi
                        </p>

                        <p class="text-[11px] leading-5 text-zinc-400 mt-1">
                            Barber yang dinonaktifkan tidak akan digunakan
                            untuk jadwal atau booking baru.
                        </p>

                    </div>

                </div>

            </div>


            {{-- FOOTER --}}
            <div
                class="flex flex-col sm:flex-row
                       sm:items-center
                       sm:justify-between
                       gap-3
                       border-t border-zinc-200
                       bg-white
                       px-6 py-4">

                {{-- DELETE --}}
                <button
                    type="button"
                    onclick="confirmDelete()"
                    class="rounded-xl
                           px-4 py-2.5
                           text-xs font-medium
                           text-red-500
                           hover:bg-red-50
                           transition">

                    Hapus Barber

                </button>


                <div class="flex flex-col-reverse sm:flex-row gap-2">

                    <a
                        href="{{ route('admin.barbers.index') }}"
                        class="rounded-xl
                               border border-zinc-200
                               bg-white
                               px-5 py-2.5
                               text-center
                               text-xs font-medium
                               text-zinc-600
                               hover:bg-zinc-50
                               transition">

                        Batal

                    </a>

                    <button
                        type="submit"
                        class="rounded-xl
                               bg-zinc-950
                               px-5 py-2.5
                               text-xs font-medium
                               text-white
                               hover:bg-zinc-800
                               transition">

                        Simpan Perubahan

                    </button>

                </div>

            </div>

        </div>

    </form>


    {{-- DELETE FORM TERPISAH --}}
    <form
        id="deleteBarberForm"
        action="{{ route('admin.barbers.destroy', $barber) }}"
        method="POST"
        class="hidden">

        @csrf
        @method('DELETE')

    </form>

</div>


<script>

function confirmDelete()
{
    if (confirm('Yakin ingin menghapus {{ $barber->name }}?')) {

        document
            .getElementById('deleteBarberForm')
            .submit();

    }
}


const statusToggle = document.getElementById('statusToggle');
const status = document.getElementById('status');
const statusLabel = document.getElementById('statusLabel');
const statusText = document.getElementById('statusText');

statusToggle.addEventListener('change', function () {

    if (this.checked) {

        status.value = 'active';

        statusLabel.textContent = 'Aktif';

        statusText.classList.remove(
            'text-zinc-400'
        );

        statusText.classList.add(
            'text-emerald-600'
        );

    } else {

        status.value = 'inactive';

        statusLabel.textContent = 'Tidak Aktif';

        statusText.classList.remove(
            'text-emerald-600'
        );

        statusText.classList.add(
            'text-zinc-400'
        );

    }

});

</script>

@endsection