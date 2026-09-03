<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Admin | Barbershop</title>

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
</head>

<body class="min-h-screen bg-zinc-950 text-white">

    <div class="min-h-screen flex">

        {{-- LEFT SIDE --}}
        <div class="hidden lg:flex lg:w-1/2 relative overflow-hidden">

            <img
                src="https://images.unsplash.com/photo-1503951914875-452162b0f3f1?auto=format&fit=crop&w=1200&q=80"
                class="absolute inset-0 w-full h-full object-cover"
                alt="Barbershop">

            <div class="absolute inset-0 bg-black/70"></div>

            <div class="relative z-10 flex flex-col justify-between p-12 w-full">

                <div>
                    <div class="flex items-center gap-3">

                        <div class="w-11 h-11 rounded-xl bg-white text-black flex items-center justify-center">
                            ✂
                        </div>

                        <div>
                            <h1 class="font-bold text-xl">
                                BARBERSHOP
                            </h1>

                            <p class="text-xs text-zinc-400">
                                MANAGEMENT SYSTEM
                            </p>
                        </div>

                    </div>
                </div>

                <div class="max-w-lg">

                    <p class="text-sm uppercase tracking-[0.3em] text-zinc-400 mb-4">
                        Welcome Back
                    </p>

                    <h2 class="text-5xl font-bold leading-tight mb-6">
                        Kelola barbershop
                        <span class="text-zinc-400">
                            dengan lebih mudah.
                        </span>
                    </h2>

                    <p class="text-zinc-400 leading-relaxed">
                        Kelola barber, layanan, jadwal, booking,
                        pelanggan, dan laporan dalam satu dashboard.
                    </p>

                </div>

                <div class="text-sm text-zinc-500">
                    © {{ date('Y') }} Barbershop Management System
                </div>

            </div>

        </div>


        {{-- RIGHT SIDE --}}
        <div class="w-full lg:w-1/2 flex items-center justify-center p-6">

            <div class="w-full max-w-md">

                {{-- MOBILE LOGO --}}
                <div class="lg:hidden mb-10">

                    <div class="flex items-center gap-3">

                        <div class="w-11 h-11 rounded-xl bg-white text-black flex items-center justify-center">
                            ✂
                        </div>

                        <div>
                            <h1 class="font-bold text-xl">
                                BARBERSHOP
                            </h1>

                            <p class="text-xs text-zinc-500">
                                MANAGEMENT SYSTEM
                            </p>
                        </div>

                    </div>

                </div>


                {{-- HEADER --}}
                <div class="mb-8">

                    <p class="text-sm text-zinc-500 mb-2">
                        ADMIN PANEL
                    </p>

                    <h2 class="text-3xl font-bold">
                        Selamat datang kembali
                    </h2>

                    <p class="text-zinc-500 mt-2">
                        Masuk untuk mengelola barbershop.
                    </p>

                </div>


                {{-- ERROR --}}
                @if ($errors->any())

                    <div class="mb-6 rounded-xl border border-red-900 bg-red-950/40 px-4 py-3">

                        @foreach ($errors->all() as $error)

                            <p class="text-sm text-red-400">
                                {{ $error }}
                            </p>

                        @endforeach

                    </div>

                @endif


                {{-- LOGIN FORM --}}
                <form
                    action="{{ route('login.process') }}"
                    method="POST"
                    class="space-y-5">

                    @csrf


                    {{-- EMAIL --}}
                    <div>

                        <label
                            for="email"
                            class="block text-sm font-medium text-zinc-300 mb-2">
                            Email
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            placeholder="admin@barbershop.test"
                            class="w-full rounded-xl border border-zinc-800 bg-zinc-900 px-4 py-3.5 text-white outline-none transition focus:border-zinc-500 focus:ring-2 focus:ring-zinc-800">

                    </div>


                    {{-- PASSWORD --}}
                    <div>

                        <label
                            for="password"
                            class="block text-sm font-medium text-zinc-300 mb-2">
                            Password
                        </label>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            required
                            placeholder="Masukkan password"
                            class="w-full rounded-xl border border-zinc-800 bg-zinc-900 px-4 py-3.5 text-white outline-none transition focus:border-zinc-500 focus:ring-2 focus:ring-zinc-800">

                    </div>


                    {{-- REMEMBER INFO --}}
                    <div class="flex items-center justify-between text-sm">

                        <span class="text-zinc-600">
                            Akses khusus administrator
                        </span>

                    </div>


                    {{-- BUTTON --}}
                    <button
                        type="submit"
                        class="w-full rounded-xl bg-white py-3.5 font-semibold text-black transition hover:bg-zinc-200 active:scale-[0.99]">

                        Masuk ke Dashboard

                    </button>

                </form>


                {{-- FOOTER --}}
                <div class="mt-8 text-center">

                    <a
                        href="{{ route('home') }}"
                        class="text-sm text-zinc-500 hover:text-white transition">

                        ← Kembali ke website

                    </a>

                </div>

            </div>

        </div>

    </div>

</body>

</html>