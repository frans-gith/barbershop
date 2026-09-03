@extends('layouts.admin')

@section('title', 'Layanan')

@section('header', 'Layanan')

@section('content')

<div class="space-y-6">

    {{-- HEADER --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">

        <div>

            <p class="text-[11px] uppercase tracking-[0.22em] text-zinc-400">
                SERVICE MANAGEMENT
            </p>

            <h1 class="mt-1 text-2xl font-semibold text-zinc-950">
                Layanan
            </h1>

            <p class="mt-1 text-sm text-zinc-500">
                Kelola layanan dan harga yang tersedia di barbershop.
            </p>

        </div>

        <a
            href="{{ route('admin.services.create') }}"
            class="inline-flex items-center justify-center gap-2
                   rounded-xl bg-zinc-950 px-5 py-3
                   text-xs font-medium text-white
                   transition hover:bg-zinc-800">

            <span class="text-base leading-none">+</span>

            Tambah Layanan

        </a>

    </div>


    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))

        <div class="flex items-center gap-3 rounded-xl
                    border border-emerald-200
                    bg-emerald-50 px-4 py-3">

            <div class="flex h-8 w-8 items-center justify-center
                        rounded-full bg-emerald-100
                        text-emerald-600">

                ✓

            </div>

            <p class="text-sm text-emerald-800">
                {{ session('success') }}
            </p>

        </div>

    @endif


    {{-- ERROR MESSAGE --}}
    @if($errors->any())

        <div class="rounded-xl border border-red-200
                    bg-red-50 px-4 py-4">

            <p class="text-sm font-medium text-red-800">
                Terdapat kesalahan:
            </p>

            <ul class="mt-2 list-inside list-disc text-xs text-red-600">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- TABLE --}}
    <div class="overflow-hidden rounded-2xl
                border border-zinc-200 bg-white">

        {{-- TABLE HEADER --}}
        <div class="border-b border-zinc-200 px-6 py-5">

            <h2 class="text-sm font-semibold text-zinc-900">
                Daftar Layanan
            </h2>

            <p class="mt-1 text-xs text-zinc-400">

                {{ $services->total() }} layanan terdaftar.

            </p>

        </div>


        {{-- TABLE --}}
        <div class="overflow-x-auto">

            <table class="w-full text-left">

                <thead>

                    <tr class="border-b border-zinc-200">

                        <th class="px-6 py-4 text-[11px]
                                   font-medium uppercase
                                   tracking-wider text-zinc-400">

                            Layanan

                        </th>

                        <th class="px-6 py-4 text-[11px]
                                   font-medium uppercase
                                   tracking-wider text-zinc-400">

                            Harga

                        </th>

                        <th class="px-6 py-4 text-[11px]
                                   font-medium uppercase
                                   tracking-wider text-zinc-400">

                            Durasi

                        </th>

                        <th class="px-6 py-4 text-[11px]
                                   font-medium uppercase
                                   tracking-wider text-zinc-400">

                            Status

                        </th>

                        <th class="px-6 py-4 text-right
                                   text-[11px]
                                   font-medium uppercase
                                   tracking-wider text-zinc-400">

                            Aksi

                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-zinc-100">

                    @forelse($services as $service)

                        <tr class="transition hover:bg-zinc-50">


                            {{-- NAMA --}}
                            <td class="px-6 py-5">

                                <div>

                                    <p class="text-sm font-medium text-zinc-900">

                                        {{ $service->name }}

                                    </p>

                                    @if($service->description)

                                        <p class="mt-1 max-w-md truncate
                                                  text-xs text-zinc-400">

                                            {{ $service->description }}

                                        </p>

                                    @else

                                        <p class="mt-1 text-xs text-zinc-400">

                                            Tidak ada deskripsi

                                        </p>

                                    @endif

                                </div>

                            </td>


                            {{-- HARGA --}}
                            <td class="px-6 py-5">

                                <span class="text-sm font-semibold text-zinc-900">

                                    Rp {{ number_format($service->price, 0, ',', '.') }}

                                </span>

                            </td>


                            {{-- DURASI --}}
                            <td class="px-6 py-5">

                                <span class="inline-flex items-center
                                             rounded-lg bg-zinc-100
                                             px-3 py-1.5 text-xs
                                             text-zinc-600">

                                    {{ $service->duration }} menit

                                </span>

                            </td>


                            {{-- STATUS --}}
                            <td class="px-6 py-5">

                                @if($service->status === 'active')

                                    <span class="inline-flex items-center gap-2
                                                 rounded-full bg-emerald-50
                                                 px-3 py-1.5
                                                 text-xs font-medium
                                                 text-emerald-700">

                                        <span class="h-1.5 w-1.5 rounded-full
                                                     bg-emerald-500"></span>

                                        Aktif

                                    </span>

                                @else

                                    <span class="inline-flex items-center gap-2
                                                 rounded-full bg-zinc-100
                                                 px-3 py-1.5
                                                 text-xs font-medium
                                                 text-zinc-500">

                                        <span class="h-1.5 w-1.5 rounded-full
                                                     bg-zinc-400"></span>

                                        Tidak Aktif

                                    </span>

                                @endif

                            </td>


                            {{-- AKSI --}}
                            <td class="px-6 py-5">

                                <div class="flex justify-end gap-2">

                                    <a
                                        href="{{ route('admin.services.edit', $service) }}"
                                        class="rounded-lg border
                                               border-zinc-200
                                               px-3 py-2
                                               text-xs text-zinc-600
                                               transition
                                               hover:bg-zinc-50">

                                        Edit

                                    </a>


                                    <form
                                        action="{{ route('admin.services.destroy', $service) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus layanan ini?')">

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="rounded-lg border
                                                   border-red-200
                                                   px-3 py-2
                                                   text-xs text-red-500
                                                   transition
                                                   hover:bg-red-50">

                                            Hapus

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5" class="px-6 py-16 text-center">

                                <div class="mx-auto flex h-12 w-12
                                            items-center justify-center
                                            rounded-xl bg-zinc-100
                                            text-zinc-400">

                                    ✂

                                </div>

                                <p class="mt-4 text-sm font-medium text-zinc-700">

                                    Belum ada layanan

                                </p>

                                <p class="mt-1 text-xs text-zinc-400">

                                    Tambahkan layanan pertama
                                    untuk barbershop.

                                </p>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- PAGINATION --}}
        @if($services->hasPages())

            <div class="border-t border-zinc-200 px-6 py-4">

                {{ $services->links() }}

            </div>

        @endif

    </div>

</div>

@endsection