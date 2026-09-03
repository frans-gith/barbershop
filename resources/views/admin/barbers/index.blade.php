@extends('layouts.admin')

@section('title', 'Barber')

@section('header', 'Barber')

@section('content')

<div class="space-y-6">

    {{-- HEADER --}}
    <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4">

        <div>
            <p class="text-xs uppercase tracking-[0.2em] text-zinc-500 mb-2">
                TEAM MANAGEMENT
            </p>

            <h1 class="text-2xl font-semibold text-zinc-900">
                Daftar Barber
            </h1>

            <p class="text-sm text-zinc-500 mt-1">
                Kelola barber yang tersedia di barbershop.
            </p>
        </div>

        <a
            href="{{ route('admin.barbers.create') }}"
            class="inline-flex items-center justify-center gap-2
                   rounded-xl bg-zinc-950 px-5 py-3
                   text-sm font-medium text-white
                   hover:bg-zinc-800 transition">

            <span class="text-lg leading-none">+</span>

            Tambah Barber

        </a>

    </div>


    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))

        <div
            class="flex items-center gap-3
                   rounded-xl border border-emerald-200
                   bg-emerald-50 px-4 py-3">

            <div
                class="flex h-8 w-8 shrink-0 items-center justify-center
                       rounded-full bg-emerald-100 text-emerald-700">

                ✓

            </div>

            <p class="text-sm text-emerald-800">
                {{ session('success') }}
            </p>

        </div>

    @endif


    {{-- ERROR --}}
    @if($errors->any())

        <div
            class="rounded-xl border border-red-200
                   bg-red-50 px-5 py-4">

            <p class="font-medium text-red-800 mb-2">
                Terjadi kesalahan:
            </p>

            <ul class="list-disc list-inside text-sm text-red-700 space-y-1">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- STAT --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">

        <div
            class="rounded-2xl border border-zinc-200
                   bg-white p-5">

            <p class="text-xs uppercase tracking-wider text-zinc-400">
                Total Barber
            </p>

            <p class="text-2xl font-semibold mt-2">
                {{ $barbers->total() }}
            </p>

        </div>


        <div
            class="rounded-2xl border border-zinc-200
                   bg-white p-5">

            <p class="text-xs uppercase tracking-wider text-zinc-400">
                Barber Aktif
            </p>

            <p class="text-2xl font-semibold mt-2">

                {{ \App\Models\Barber::where('status', 'active')->count() }}

            </p>

        </div>


        <div
            class="rounded-2xl border border-zinc-200
                   bg-white p-5">

            <p class="text-xs uppercase tracking-wider text-zinc-400">
                Tidak Aktif
            </p>

            <p class="text-2xl font-semibold mt-2">

                {{ \App\Models\Barber::where('status', 'inactive')->count() }}

            </p>

        </div>

    </div>


    {{-- TABLE --}}
    <div
        class="overflow-hidden rounded-2xl
               border border-zinc-200 bg-white">

        {{-- TABLE HEADER --}}
        <div
            class="flex flex-col sm:flex-row
                   sm:items-center sm:justify-between
                   gap-3 px-6 py-5
                   border-b border-zinc-200">

            <div>

                <h2 class="font-semibold text-zinc-900">
                    Semua Barber
                </h2>

                <p class="text-xs text-zinc-400 mt-1">
                    Data barber yang terdaftar.
                </p>

            </div>

            <div class="text-xs text-zinc-400">
                {{ $barbers->firstItem() ?? 0 }} -
                {{ $barbers->lastItem() ?? 0 }}
                dari {{ $barbers->total() }}
            </div>

        </div>


        @if($barbers->count())

            {{-- DESKTOP TABLE --}}
            <div class="hidden md:block overflow-x-auto">

                <table class="w-full">

                    <thead>

                        <tr
                            class="border-b border-zinc-100
                                   bg-zinc-50/70">

                            <th
                                class="px-6 py-4 text-left
                                       text-xs font-medium uppercase
                                       tracking-wider text-zinc-400">

                                Barber

                            </th>

                            <th
                                class="px-6 py-4 text-left
                                       text-xs font-medium uppercase
                                       tracking-wider text-zinc-400">

                                Kontak

                            </th>

                            <th
                                class="px-6 py-4 text-left
                                       text-xs font-medium uppercase
                                       tracking-wider text-zinc-400">

                                Spesialisasi

                            </th>

                            <th
                                class="px-6 py-4 text-left
                                       text-xs font-medium uppercase
                                       tracking-wider text-zinc-400">

                                Status

                            </th>

                            <th
                                class="px-6 py-4 text-right
                                       text-xs font-medium uppercase
                                       tracking-wider text-zinc-400">

                                Aksi

                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-zinc-100">

                        @foreach($barbers as $barber)

                            <tr class="hover:bg-zinc-50/70 transition">

                                {{-- BARBER --}}
                                <td class="px-6 py-5">

                                    <div class="flex items-center gap-4">

                                        @if($barber->photo)

                                            <img
                                                src="{{ asset('storage/' . $barber->photo) }}"
                                                alt="{{ $barber->name }}"
                                                class="h-12 w-12 rounded-xl
                                                       object-cover
                                                       border border-zinc-200">

                                        @else

                                            <div
                                                class="h-12 w-12 rounded-xl
                                                       bg-zinc-950 text-white
                                                       flex items-center justify-center
                                                       font-semibold">

                                                {{ strtoupper(substr($barber->name, 0, 1)) }}

                                            </div>

                                        @endif


                                        <div>

                                            <p class="font-medium text-zinc-900">
                                                {{ $barber->name }}
                                            </p>

                                            <p class="text-xs text-zinc-400 mt-1">
                                                Barber
                                            </p>

                                        </div>

                                    </div>

                                </td>


                                {{-- PHONE --}}
                                <td class="px-6 py-5">

                                    @if($barber->phone)

                                        <p class="text-sm text-zinc-700">
                                            {{ $barber->phone }}
                                        </p>

                                    @else

                                        <span class="text-sm text-zinc-400">
                                            -
                                        </span>

                                    @endif

                                </td>


                                {{-- SPECIALIZATION --}}
                                <td class="px-6 py-5">

                                    @if($barber->specialization)

                                        <span
                                            class="inline-flex rounded-lg
                                                   bg-zinc-100 px-3 py-1.5
                                                   text-xs font-medium
                                                   text-zinc-700">

                                            {{ $barber->specialization }}

                                        </span>

                                    @else

                                        <span class="text-sm text-zinc-400">
                                            -
                                        </span>

                                    @endif

                                </td>


                                {{-- STATUS --}}
                                <td class="px-6 py-5">

                                    @if($barber->status === 'active')

                                        <span
                                            class="inline-flex items-center gap-2
                                                   rounded-full
                                                   bg-emerald-50
                                                   px-3 py-1.5
                                                   text-xs font-medium
                                                   text-emerald-700">

                                            <span
                                                class="h-1.5 w-1.5 rounded-full
                                                       bg-emerald-500">
                                            </span>

                                            Aktif

                                        </span>

                                    @else

                                        <span
                                            class="inline-flex items-center gap-2
                                                   rounded-full
                                                   bg-zinc-100
                                                   px-3 py-1.5
                                                   text-xs font-medium
                                                   text-zinc-500">

                                            <span
                                                class="h-1.5 w-1.5 rounded-full
                                                       bg-zinc-400">
                                            </span>

                                            Tidak Aktif

                                        </span>

                                    @endif

                                </td>


                                {{-- ACTION --}}
                                <td class="px-6 py-5">

                                    <div
                                        class="flex items-center justify-end gap-2">

                                        <a
                                            href="{{ route('admin.barbers.edit', $barber) }}"
                                            class="rounded-lg border border-zinc-200
                                                   px-3 py-2
                                                   text-xs font-medium
                                                   text-zinc-600
                                                   hover:bg-zinc-950
                                                   hover:text-white
                                                   hover:border-zinc-950
                                                   transition">

                                            Edit

                                        </a>


                                        <form
                                            action="{{ route('admin.barbers.destroy', $barber) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus barber ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="rounded-lg border border-red-100
                                                       px-3 py-2
                                                       text-xs font-medium
                                                       text-red-500
                                                       hover:bg-red-500
                                                       hover:text-white
                                                       transition">

                                                Hapus

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>


            {{-- MOBILE --}}
            <div class="md:hidden divide-y divide-zinc-100">

                @foreach($barbers as $barber)

                    <div class="p-5">

                        <div class="flex items-start justify-between gap-4">

                            <div class="flex items-center gap-3">

                                @if($barber->photo)

                                    <img
                                        src="{{ asset('storage/' . $barber->photo) }}"
                                        class="h-12 w-12 rounded-xl object-cover">

                                @else

                                    <div
                                        class="h-12 w-12 rounded-xl
                                               bg-zinc-950 text-white
                                               flex items-center justify-center
                                               font-semibold">

                                        {{ strtoupper(substr($barber->name, 0, 1)) }}

                                    </div>

                                @endif


                                <div>

                                    <p class="font-medium">
                                        {{ $barber->name }}
                                    </p>

                                    <p class="text-xs text-zinc-400 mt-1">
                                        {{ $barber->specialization ?: 'Barber' }}
                                    </p>

                                </div>

                            </div>


                            @if($barber->status === 'active')

                                <span
                                    class="rounded-full bg-emerald-50
                                           px-2.5 py-1 text-xs
                                           text-emerald-700">

                                    Aktif

                                </span>

                            @else

                                <span
                                    class="rounded-full bg-zinc-100
                                           px-2.5 py-1 text-xs
                                           text-zinc-500">

                                    Tidak Aktif

                                </span>

                            @endif

                        </div>


                        <div class="mt-4 text-sm text-zinc-500">

                            {{ $barber->phone ?: 'Nomor telepon belum diisi.' }}

                        </div>


                        <div class="flex gap-2 mt-4">

                            <a
                                href="{{ route('admin.barbers.edit', $barber) }}"
                                class="flex-1 text-center rounded-lg
                                       border border-zinc-200
                                       px-3 py-2 text-xs
                                       font-medium hover:bg-zinc-50">

                                Edit

                            </a>

                            <form
                                action="{{ route('admin.barbers.destroy', $barber) }}"
                                method="POST"
                                class="flex-1"
                                onsubmit="return confirm('Yakin ingin menghapus barber ini?')">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="w-full rounded-lg
                                           border border-red-100
                                           px-3 py-2 text-xs
                                           font-medium text-red-500">

                                    Hapus

                                </button>

                            </form>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            {{-- EMPTY --}}
            <div class="px-6 py-20 text-center">

                <div
                    class="mx-auto h-16 w-16 rounded-2xl
                           bg-zinc-100
                           flex items-center justify-center
                           text-2xl">

                    ✂

                </div>

                <h3 class="mt-5 font-semibold">
                    Belum ada barber
                </h3>

                <p class="mt-2 text-sm text-zinc-400">
                    Tambahkan barber pertama untuk mulai mengelola tim.
                </p>

                <a
                    href="{{ route('admin.barbers.create') }}"
                    class="inline-flex mt-6 rounded-xl
                           bg-zinc-950 px-5 py-3
                           text-sm font-medium text-white
                           hover:bg-zinc-800 transition">

                    + Tambah Barber

                </a>

            </div>

        @endif


        {{-- PAGINATION --}}
        @if($barbers->hasPages())

            <div class="border-t border-zinc-200 px-6 py-4">

                {{ $barbers->links() }}

            </div>

        @endif

    </div>

</div>

@endsection