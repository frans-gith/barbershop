<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Dashboard') - Barbershop
    </title>

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    @stack('styles')
</head>

<body class="bg-zinc-100 text-zinc-900">

    <div class="min-h-screen flex">


        {{-- =====================================================
            SIDEBAR
        ====================================================== --}}

        <aside
            class="fixed left-0 top-0 z-40 h-screen w-72
                   bg-zinc-950 text-white
                   border-r border-zinc-800
                   hidden lg:flex flex-col">

            {{-- LOGO --}}
            <div class="h-20 px-7 flex items-center border-b border-zinc-800">

                <div class="flex items-center gap-3">

                    <div
                        class="w-11 h-11 rounded-xl bg-white text-zinc-950
                               flex items-center justify-center
                               text-xl">
                        ✂
                    </div>

                    <div>

                        <h1 class="font-bold tracking-wide">
                            BARBERSHOP
                        </h1>

                        <p class="text-[10px] text-zinc-500 tracking-[0.25em]">
                            MANAGEMENT
                        </p>

                    </div>

                </div>

            </div>


            {{-- NAVIGATION --}}
            <nav class="flex-1 px-4 py-6 overflow-y-auto">

                <p class="px-3 mb-3 text-[10px] font-semibold
                          tracking-[0.2em] text-zinc-600 uppercase">
                    Menu Utama
                </p>


                {{-- DASHBOARD --}}
                <a
                    href="{{ route('admin.dashboard') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl mb-1
                    {{ request()->routeIs('admin.dashboard')
                        ? 'bg-white text-zinc-950'
                        : 'text-zinc-400 hover:bg-zinc-900 hover:text-white' }}
                    transition">

                    <span class="text-lg">⌂</span>

                    <span class="text-sm font-medium">
                        Dashboard
                    </span>

                </a>


                {{-- BARBER --}}
                <a
                    href="{{ route('admin.barbers.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl mb-1
                    {{ request()->routeIs('admin.barbers.*')
                        ? 'bg-white text-zinc-950'
                        : 'text-zinc-400 hover:bg-zinc-900 hover:text-white' }}
                    transition">

                    <span class="text-lg">✂</span>

                    <span class="text-sm font-medium">
                        Barber
                    </span>

                </a>


                {{-- SERVICES --}}
                <a
                    href="{{ route('admin.services.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl mb-1
                    {{ request()->routeIs('admin.services.*')
                        ? 'bg-white text-zinc-950'
                        : 'text-zinc-400 hover:bg-zinc-900 hover:text-white' }}
                    transition">

                    <span class="text-lg">▣</span>

                    <span class="text-sm font-medium">
                        Layanan
                    </span>

                </a>


                {{-- SCHEDULE --}}
                <a
                    href="{{ route('admin.schedules.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl mb-1
                    {{ request()->routeIs('admin.schedules.*')
                        ? 'bg-white text-zinc-950'
                        : 'text-zinc-400 hover:bg-zinc-900 hover:text-white' }}
                    transition">

                    <span class="text-lg">◷</span>

                    <span class="text-sm font-medium">
                        Jadwal
                    </span>

                </a>


                {{-- BOOKING --}}
                <a
                    href="{{ route('admin.bookings.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl mb-1
                    {{ request()->routeIs('admin.bookings.*')
                        ? 'bg-white text-zinc-950'
                        : 'text-zinc-400 hover:bg-zinc-900 hover:text-white' }}
                    transition">

                    <span class="text-lg">▤</span>

                    <span class="text-sm font-medium">
                        Booking
                    </span>

                </a>


                {{-- CUSTOMER --}}
                <a
                    href="{{ route('admin.customers.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl mb-1
                    {{ request()->routeIs('admin.customers.*')
                        ? 'bg-white text-zinc-950'
                        : 'text-zinc-400 hover:bg-zinc-900 hover:text-white' }}
                    transition">

                    <span class="text-lg">♙</span>

                    <span class="text-sm font-medium">
                        Pelanggan
                    </span>

                </a>


                <div class="my-6 border-t border-zinc-800"></div>


                <p class="px-3 mb-3 text-[10px] font-semibold
                          tracking-[0.2em] text-zinc-600 uppercase">
                    Laporan
                </p>


                {{-- REPORT --}}
                <a
                    href="{{ route('admin.reports.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl
                    {{ request()->routeIs('admin.reports.*')
                        ? 'bg-white text-zinc-950'
                        : 'text-zinc-400 hover:bg-zinc-900 hover:text-white' }}
                    transition">

                    <span class="text-lg">▥</span>

                    <span class="text-sm font-medium">
                        Laporan
                    </span>

                </a>

            </nav>


            {{-- USER / LOGOUT --}}
            <div class="border-t border-zinc-800 p-4">

                <div class="flex items-center gap-3 px-2 mb-4">

                    <div
                        class="w-10 h-10 rounded-full bg-zinc-800
                               flex items-center justify-center">

                        <span class="text-sm">
                            A
                        </span>

                    </div>

                    <div class="min-w-0">

                        <p class="text-sm font-medium truncate">
                            {{ auth()->user()->name ?? 'Administrator' }}
                        </p>

                        <p class="text-xs text-zinc-600">
                            Administrator
                        </p>

                    </div>

                </div>


                <form
                    action="{{ route('logout') }}"
                    method="POST">

                    @csrf

                    <button
                        type="submit"
                        class="w-full flex items-center gap-3
                               px-4 py-3 rounded-xl
                               text-zinc-500
                               hover:bg-red-950/40
                               hover:text-red-400
                               transition">

                        <span>
                            ↪
                        </span>

                        <span class="text-sm">
                            Keluar
                        </span>

                    </button>

                </form>

            </div>

        </aside>



        {{-- =====================================================
            MAIN
        ====================================================== --}}

        <main class="w-full lg:ml-72">


            {{-- TOPBAR --}}
            <header
                class="h-20 bg-white border-b border-zinc-200
                       flex items-center justify-between
                       px-6 lg:px-10">

                <div>

                    <p class="text-xs text-zinc-400">
                        Admin Panel
                    </p>

                    <h2 class="font-semibold text-lg">
                        @yield('header', 'Dashboard')
                    </h2>

                </div>


                <div class="flex items-center gap-4">

                    <div class="hidden sm:block text-right">

                        <p class="text-sm font-medium">
                            {{ auth()->user()->name ?? 'Administrator' }}
                        </p>

                        <p class="text-xs text-zinc-400">
                            Administrator
                        </p>

                    </div>


                    <div
                        class="w-10 h-10 rounded-full
                               bg-zinc-950 text-white
                               flex items-center justify-center
                               font-semibold">

                        {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}

                    </div>

                </div>

            </header>


            {{-- CONTENT --}}
            <div class="p-6 lg:p-10">

                @yield('content')

            </div>

        </main>

    </div>


    @stack('scripts')

</body>

</html>