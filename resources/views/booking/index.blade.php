<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Booking | BARBER. Grooming Studio</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@500;600;700;800&display=swap');

        :root {
            --cream: #f7f4ee;
            --paper: #fffdf9;
            --white: #ffffff;
            --ink: #171614;
            --muted: #817b72;
            --line: #e8e1d7;
            --gold: #bd8734;
            --gold-dark: #9f6e27;
            --gold-soft: #f6ead4;
            --danger: #b42318;
            --success: #087443;
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            background:
                radial-gradient(
                    circle at 10% 12%,
                    rgba(189, 135, 52, .10),
                    transparent 24%
                ),
                radial-gradient(
                    circle at 90% 35%,
                    rgba(189, 135, 52, .08),
                    transparent 24%
                ),
                var(--cream);
            color: var(--ink);
            font-family: "DM Sans", Arial, sans-serif;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button,
        input,
        select,
        textarea {
            font: inherit;
        }

        /* =====================================================
           TOP BAR
        ===================================================== */

        .top-line {
            height: 3px;
            background:
                linear-gradient(
                    90deg,
                    #8e6020,
                    #d3a14e,
                    #a97327
                );
        }

        /* =====================================================
           NAVBAR
        ===================================================== */

        .navbar {
            position: sticky;
            top: 0;
            z-index: 50;
            background: rgba(255, 253, 249, .90);
            backdrop-filter: blur(18px);
            border-bottom: 1px solid rgba(220, 211, 198, .85);
        }

        .nav-inner {
            width: min(1180px, calc(100% - 40px));
            min-height: 74px;
            margin: auto;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 30px;
        }

        .brand {
            display: inline-flex;
            align-items: center;
            gap: 12px;
        }

        .brand-mark {
            width: 42px;
            height: 42px;

            border-radius: 13px;

            display: grid;
            place-items: center;

            color: #fff;

            background:
                linear-gradient(
                    145deg,
                    #d09b45,
                    #a86e20
                );

            box-shadow:
                0 8px 24px rgba(161, 109, 34, .22);

            font-size: 19px;
        }

        .brand-name {
            font-family: Manrope, sans-serif;
            font-weight: 800;
            letter-spacing: -.04em;
            font-size: 17px;
        }

        .brand-sub {
            display: block;
            margin-top: 1px;

            color: #999187;

            font-size: 8px;
            letter-spacing: .25em;
            font-weight: 700;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 30px;

            font-size: 12px;
            color: #706a62;
        }

        .nav-links a {
            position: relative;
            padding: 28px 0;

            transition:
                color .25s ease;
        }

        .nav-links a:hover,
        .nav-links a.active {
            color: var(--ink);
        }

        .nav-links a.active::after {
            content: "";

            position: absolute;

            left: 0;
            right: 0;
            bottom: 18px;

            height: 2px;

            border-radius: 99px;

            background: var(--gold);
        }

        .nav-cta {
            display: inline-flex;
            align-items: center;
            gap: 9px;

            padding: 13px 19px;

            border-radius: 12px;

            color: #fff;

            background:
                linear-gradient(
                    135deg,
                    #c28b35,
                    #a97024
                );

            box-shadow:
                0 10px 24px rgba(167, 112, 35, .20);

            font-size: 11px;
            font-weight: 700;

            transition:
                transform .25s ease,
                box-shadow .25s ease;
        }

        .nav-cta:hover {
            transform: translateY(-2px);

            box-shadow:
                0 14px 30px rgba(167, 112, 35, .28);
        }

        /* =====================================================
           HERO
        ===================================================== */

        .hero {
            position: relative;
            overflow: hidden;

            padding: 76px 0 58px;
        }

        .hero::before {
            content: "";

            position: absolute;

            width: 430px;
            height: 430px;

            border-radius: 50%;

            background: rgba(210, 167, 92, .13);

            filter: blur(70px);

            right: -170px;
            top: -150px;

            pointer-events: none;
        }

        .container {
            width: min(1180px, calc(100% - 40px));
            margin: auto;
        }

        .hero-grid {
            display: grid;

            grid-template-columns: 1fr 370px;

            gap: 70px;

            align-items: end;
        }

        .eyebrow {
            display: flex;
            align-items: center;
            gap: 10px;

            color: var(--gold-dark);

            font-size: 9px;
            font-weight: 800;

            letter-spacing: .25em;

            text-transform: uppercase;
        }

        .eyebrow::after {
            content: "";

            width: 38px;
            height: 1px;

            background: var(--gold);
        }

        h1 {
            margin: 16px 0 17px;

            max-width: 680px;

            font-family: Manrope, sans-serif;

            font-size: clamp(42px, 6vw, 76px);

            line-height: .98;

            letter-spacing: -.065em;

            font-weight: 800;
        }

        h1 span {
            color: var(--gold);
        }

        .hero-copy {
            max-width: 600px;

            color: var(--muted);

            font-size: 14px;

            line-height: 1.8;
        }

        .hero-badge {
            padding: 22px;

            border: 1px solid rgba(226, 216, 201, .9);

            border-radius: 24px;

            background: rgba(255, 255, 255, .72);

            box-shadow:
                0 24px 70px rgba(65, 48, 27, .09);

            animation:
                floatCard 5s ease-in-out infinite;
        }

        .badge-top {
            display: flex;
            justify-content: space-between;
            align-items: center;

            color: #91897f;

            font-size: 9px;

            letter-spacing: .16em;

            text-transform: uppercase;

            font-weight: 800;
        }

        .badge-dot {
            width: 9px;
            height: 9px;

            border-radius: 50%;

            background: #82b642;

            box-shadow:
                0 0 0 5px rgba(130, 182, 66, .10);
        }

        .badge-title {
            margin-top: 28px;

            font-family: Manrope, sans-serif;

            font-size: 25px;

            font-weight: 800;

            letter-spacing: -.04em;
        }

        .badge-sub {
            margin-top: 8px;

            color: var(--muted);

            font-size: 11px;

            line-height: 1.7;
        }

        .badge-rule {
            height: 1px;

            margin: 20px 0;

            background: var(--line);
        }

        .badge-row {
            display: flex;

            justify-content: space-between;
            align-items: center;

            font-size: 11px;
        }

        .badge-row strong {
            font-family: Manrope, sans-serif;
        }

        @keyframes floatCard {

            0%,
            100% {
                transform: translateY(0) rotate(0);
            }

            50% {
                transform: translateY(-8px) rotate(.4deg);
            }
        }

        /* =====================================================
           BOOKING
        ===================================================== */

        .booking-wrap {
            padding-bottom: 100px;
        }

        .booking-grid {
            display: grid;

            grid-template-columns:
                minmax(0, 1fr) 330px;

            gap: 24px;

            align-items: start;
        }

        .panel {
            background: rgba(255, 255, 255, .90);

            border: 1px solid var(--line);

            border-radius: 26px;

            box-shadow:
                0 25px 75px rgba(57, 43, 25, .08);

            overflow: hidden;
        }

        .panel-head {
            padding: 28px 32px;

            border-bottom:
                1px solid var(--line);
        }

        .section-label {
            color: var(--gold-dark);

            font-size: 9px;

            letter-spacing: .22em;

            text-transform: uppercase;

            font-weight: 800;
        }

        .panel-head h2 {
            margin: 8px 0 5px;

            font-family: Manrope, sans-serif;

            font-size: 25px;

            letter-spacing: -.04em;
        }

        .panel-head p {
            margin: 0;

            color: var(--muted);

            font-size: 12px;
        }

        /* =====================================================
           ALERT
        ===================================================== */

        .alert {
            margin: 24px 32px 0;

            padding: 15px 17px;

            border-radius: 16px;

            font-size: 12px;
        }

        .alert.error {
            color: var(--danger);

            background: #fff2f0;

            border:
                1px solid #ffd4cf;
        }

        .alert.success {
            color: var(--success);

            background: #effbf4;

            border:
                1px solid #c9ecd8;
        }

        .alert ul {
            margin: 8px 0 0 17px;
            padding: 0;
        }

        /* =====================================================
           FORM
        ===================================================== */

        form {
            padding: 30px 32px 0;
        }

        .form-section {
            padding: 0 0 28px;

            margin-bottom: 28px;

            border-bottom:
                1px solid #eee8df;
        }

        .form-section:last-of-type {
            margin-bottom: 0;
        }

        .form-title {
            margin-bottom: 18px;

            color: #81796e;

            font-size: 9px;

            font-weight: 800;

            letter-spacing: .2em;

            text-transform: uppercase;
        }

        .form-grid {
            display: grid;

            grid-template-columns:
                repeat(2, minmax(0, 1fr));

            gap: 18px;
        }

        .field.full {
            grid-column: 1 / -1;
        }

        label {
            display: block;

            margin-bottom: 8px;

            color: #3e3933;

            font-size: 12px;

            font-weight: 700;
        }

        label span {
            color: #c0392b;
        }

        input,
        select,
        textarea {
            width: 100%;

            border:
                1px solid #ded7cc;

            border-radius: 13px;

            outline: none;

            color: var(--ink);

            background: #fffefa;

            transition:
                border-color .22s ease,
                box-shadow .22s ease,
                transform .22s ease;
        }

        input,
        select {
            height: 49px;

            padding: 0 14px;
        }

        textarea {
            min-height: 112px;

            padding: 13px 14px;

            resize: vertical;

            line-height: 1.6;
        }

        input::placeholder,
        textarea::placeholder {
            color: #b0a99f;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #c18b37;

            box-shadow:
                0 0 0 4px rgba(193, 139, 55, .10);

            transform: translateY(-1px);
        }

        .help {
            margin: 7px 0 0;

            color: #a39b90;

            font-size: 10px;
        }

        .error-text {
            margin: 6px 0 0;

            color: #c0392b;

            font-size: 10px;
        }

        /* =====================================================
           EMAIL SPECIAL
        ===================================================== */

        .email-note {
            display: flex;
            align-items: center;
            gap: 8px;

            margin-top: 7px;

            color: #9b9287;

            font-size: 10px;
            line-height: 1.5;
        }

        .email-note-icon {
            width: 18px;
            height: 18px;

            flex: 0 0 auto;

            display: grid;
            place-items: center;

            border-radius: 50%;

            color: #a97327;

            background: #f8ecd9;

            font-size: 9px;
        }

        /* =====================================================
           SUBMIT
        ===================================================== */

        .submit-bar {
            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 20px;

            margin: 0 -32px;

            padding: 22px 32px;

            background: #fbf8f3;

            border-top:
                1px solid var(--line);
        }

        .submit-note {
            color: #999188;

            font-size: 10px;

            line-height: 1.5;
        }

        .submit {
            border: 0;

            min-height: 48px;

            padding: 0 24px;

            border-radius: 13px;

            color: #fff;

            background:
                linear-gradient(
                    135deg,
                    #171614,
                    #312c26
                );

            cursor: pointer;

            font-size: 12px;

            font-weight: 800;

            box-shadow:
                0 10px 25px rgba(20, 18, 15, .15);

            transition:
                transform .22s ease,
                box-shadow .22s ease;
        }

        .submit:hover {
            transform: translateY(-2px);

            box-shadow:
                0 15px 32px rgba(20, 18, 15, .20);
        }

        .submit:active {
            transform: translateY(0);
        }

        /* =====================================================
           SIDE
        ===================================================== */

        .side {
            position: sticky;
            top: 100px;
        }

        .side-card {
            position: relative;

            overflow: hidden;

            padding: 30px;

            border-radius: 26px;

            color: #fff;

            background:
                radial-gradient(
                    circle at 90% 10%,
                    rgba(205, 157, 76, .28),
                    transparent 30%
                ),
                linear-gradient(
                    145deg,
                    #24211d,
                    #11100e
                );

            box-shadow:
                0 25px 65px rgba(30, 23, 16, .17);
        }

        .side-card::after {
            content: "✂";

            position: absolute;

            right: -15px;
            bottom: -45px;

            color: rgba(255, 255, 255, .035);

            font-size: 180px;

            transform: rotate(-18deg);
        }

        .side-title {
            margin: 10px 0;

            max-width: 230px;

            font-family: Manrope, sans-serif;

            font-size: 25px;

            line-height: 1.1;

            letter-spacing: -.04em;
        }

        .side-copy {
            color: #a9a39b;

            font-size: 11px;

            line-height: 1.7;
        }

        .steps {
            position: relative;

            margin-top: 30px;

            display: grid;

            gap: 22px;
        }

        .step {
            position: relative;

            z-index: 2;

            display: flex;

            gap: 13px;
        }

        .step-number {
            flex: 0 0 auto;

            width: 35px;
            height: 35px;

            display: grid;
            place-items: center;

            border-radius: 11px;

            color: #f3cf91;

            background:
                rgba(255, 255, 255, .07);

            border:
                1px solid rgba(255, 255, 255, .08);

            font-size: 10px;

            font-weight: 800;
        }

        .step h3 {
            margin: 2px 0 4px;

            font-size: 12px;
        }

        .step p {
            margin: 0;

            color: #8f8981;

            font-size: 10px;

            line-height: 1.6;
        }

        .check-link {
            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 12px;

            margin-top: 28px;

            padding-top: 20px;

            border-top:
                1px solid rgba(255, 255, 255, .09);

            color: #d6d0c8;

            font-size: 11px;

            font-weight: 700;
        }

        .check-link span {
            color: #d0a04d;

            font-size: 16px;
        }

        /* =====================================================
           FOOTER
        ===================================================== */

        footer {
            padding: 28px 0;

            border-top:
                1px solid var(--line);

            background:
                rgba(255, 255, 255, .60);
        }

        .footer-inner {
            width: min(1180px, calc(100% - 40px));

            margin: auto;

            display: flex;

            justify-content: space-between;

            gap: 20px;

            color: #928b82;

            font-size: 10px;
        }

        .footer-brand {
            color: var(--ink);

            font-family: Manrope, sans-serif;

            font-weight: 800;
        }

        /* =====================================================
           ANIMATION
        ===================================================== */

        .reveal {
            opacity: 0;

            transform: translateY(18px);

            animation:
                reveal .7s cubic-bezier(.2, .8, .2, 1)
                forwards;
        }

        .delay-1 {
            animation-delay: .08s;
        }

        .delay-2 {
            animation-delay: .16s;
        }

        .delay-3 {
            animation-delay: .24s;
        }

        @keyframes reveal {

            to {
                opacity: 1;
                transform: translateY(0);
            }

        }

        /* =====================================================
           MOBILE
        ===================================================== */

        @media (max-width: 900px) {

            .nav-links {
                display: none;
            }

            .hero-grid,
            .booking-grid {
                grid-template-columns: 1fr;
            }

            .hero {
                padding-top: 55px;
            }

            .hero-badge {
                max-width: 500px;
            }

            .side {
                position: static;
            }

        }

        @media (max-width: 650px) {

            .container,
            .nav-inner,
            .footer-inner {
                width: min(100% - 28px, 1180px);
            }

            .nav-inner {
                min-height: 66px;
            }

            .nav-cta {
                padding: 11px 13px;

                font-size: 10px;
            }

            .brand-mark {
                width: 37px;
                height: 37px;
            }

            .hero {
                padding: 48px 0 35px;
            }

            h1 {
                font-size: 47px;
            }

            .hero-copy {
                font-size: 12px;
            }

            .panel-head {
                padding: 23px 20px;
            }

            form {
                padding: 24px 20px 0;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .field.full {
                grid-column: auto;
            }

            .submit-bar {
                align-items: stretch;

                flex-direction: column;

                margin: 0 -20px;

                padding: 18px 20px;
            }

            .submit {
                width: 100%;
            }

            .side-card {
                padding: 24px;
            }

            .footer-inner {
                flex-direction: column;
            }

            .alert {
                margin-left: 20px;
                margin-right: 20px;
            }

        }

        @media (prefers-reduced-motion: reduce) {

            *,
            *::before,
            *::after {
                animation-duration: .01ms !important;

                animation-iteration-count: 1 !important;

                scroll-behavior: auto !important;

                transition-duration: .01ms !important;
            }

        }
    </style>
</head>

<body>

    <div class="top-line"></div>

    {{-- =====================================================
         NAVBAR
    ====================================================== --}}

    <header class="navbar">

        <div class="nav-inner">

            <a href="{{ route('home') }}" class="brand">

                <div class="brand-mark">
                    ✂
                </div>

                <div>

                    <div class="brand-name">
                        BARBER.
                    </div>

                    <span class="brand-sub">
                        GROOMING STUDIO
                    </span>

                </div>

            </a>


            <nav class="nav-links">

                <a href="{{ route('home') }}">
                    Beranda
                </a>

                <a href="{{ route('booking.index') }}"
                   class="active">
                    Booking
                </a>

                <a href="{{ route('booking.check') }}">
                    Cek Booking
                </a>

            </nav>


            <a href="{{ route('booking.check') }}"
               class="nav-cta">

                Cek Booking

                <span>
                    →
                </span>

            </a>

        </div>

    </header>


    <main>

        {{-- =====================================================
             HERO
        ====================================================== --}}

        <section class="hero">

            <div class="container hero-grid">

                <div class="reveal">

                    <div class="eyebrow">
                        Premium appointment
                    </div>

                    <h1>

                        Jadwalkan

                        <br>

                        <span>
                            gaya terbaikmu.
                        </span>

                    </h1>

                    <p class="hero-copy">

                        Pilih layanan, barber favorit,
                        serta waktu kunjunganmu.
                        Datang sesuai jadwal tanpa perlu
                        antre lama.

                    </p>

                </div>


                <div class="hero-badge reveal delay-2">

                    <div class="badge-top">

                        <span>
                            Barber appointment
                        </span>

                        <i class="badge-dot"></i>

                    </div>

                    <div class="badge-title">

                        Satu langkah menuju

                        <br>

                        look yang lebih rapi.

                    </div>

                    <div class="badge-sub">

                        Booking online • Pilih barber • Tentukan waktu

                    </div>

                    <div class="badge-rule"></div>

                    <div class="badge-row">

                        <span>
                            Pengalaman grooming
                        </span>

                        <strong>
                            Premium
                        </strong>

                    </div>

                </div>

            </div>

        </section>


        {{-- =====================================================
             BOOKING SECTION
        ====================================================== --}}

        <section class="booking-wrap">

            <div class="container booking-grid">


                {{-- =================================================
                     FORM PANEL
                ================================================== --}}

                <div class="panel reveal delay-1">


                    <div class="panel-head">

                        <div class="section-label">
                            Appointment
                        </div>

                        <h2>
                            Detail Booking
                        </h2>

                        <p>
                            Isi data berikut dengan benar
                            sebelum melakukan konfirmasi.
                        </p>

                    </div>


                    {{-- ERROR VALIDATION --}}

                    @if ($errors->any())

                        <div class="alert error">

                            <strong>
                                Booking belum dapat diproses.
                            </strong>

                            <ul>

                                @foreach ($errors->all() as $error)

                                    <li>
                                        {{ $error }}
                                    </li>

                                @endforeach

                            </ul>

                        </div>

                    @endif


                    {{-- SUCCESS MESSAGE --}}

                    @if (session('success'))

                        <div class="alert success">

                            {{ session('success') }}

                        </div>

                    @endif


                    {{-- =================================================
                         FORM
                    ================================================== --}}

                    <form
                        action="{{ route('booking.store') }}"
                        method="POST"
                    >

                        @csrf


                        {{-- =================================================
                             01 DATA PELANGGAN
                        ================================================== --}}

                        <div class="form-section">

                            <div class="form-title">
                                01 / Data Pelanggan
                            </div>


                            <div class="form-grid">


                                {{-- NAMA --}}

                                <div class="field">

                                    <label for="name">

                                        Nama Lengkap

                                        <span>
                                            *
                                        </span>

                                    </label>


                                    <input
                                        type="text"
                                        id="name"
                                        name="name"
                                        value="{{ old('name') }}"
                                        placeholder="Masukkan nama lengkap"
                                        autocomplete="name"
                                        required
                                    >


                                    @error('name')

                                        <p class="error-text">
                                            {{ $message }}
                                        </p>

                                    @enderror

                                </div>


                                {{-- WHATSAPP --}}

                                <div class="field">

                                    <label for="phone">

                                        Nomor WhatsApp

                                        <span>
                                            *
                                        </span>

                                    </label>


                                    <input
                                        type="tel"
                                        id="phone"
                                        name="phone"
                                        value="{{ old('phone') }}"
                                        placeholder="081234567890"
                                        autocomplete="tel"
                                        required
                                    >


                                    <p class="help">

                                        Nomor digunakan
                                        untuk informasi booking.

                                    </p>


                                    @error('phone')

                                        <p class="error-text">
                                            {{ $message }}
                                        </p>

                                    @enderror

                                </div>


                                {{-- EMAIL --}}

                                <div class="field full">

                                    <label for="email">

                                        Email

                                        <span>
                                            *
                                        </span>

                                    </label>


                                    <input
                                        type="email"
                                        id="email"
                                        name="email"
                                        value="{{ old('email') }}"
                                        placeholder="nama@email.com"
                                        autocomplete="email"
                                        required
                                    >


                                    <div class="email-note">

                                        <span class="email-note-icon">
                                            ✉
                                        </span>

                                        <span>
                                            Invoice booking akan
                                            otomatis dikirim ke email ini
                                            setelah booking berhasil.
                                        </span>

                                    </div>


                                    @error('email')

                                        <p class="error-text">
                                            {{ $message }}
                                        </p>

                                    @enderror

                                </div>

                            </div>

                        </div>


                        {{-- =================================================
                             02 PILIHAN GROOMING
                        ================================================== --}}

                        <div class="form-section">

                            <div class="form-title">
                                02 / Pilihan Grooming
                            </div>


                            <div class="form-grid">


                                {{-- LAYANAN --}}

                                <div class="field">

                                    <label for="service_id">

                                        Layanan

                                        <span>
                                            *
                                        </span>

                                    </label>


                                    <select
                                        id="service_id"
                                        name="service_id"
                                        required
                                    >

                                        <option value="">
                                            Pilih layanan
                                        </option>


                                        @foreach ($services as $service)

                                            <option
                                                value="{{ $service->id }}"
                                                {{ old('service_id') == $service->id ? 'selected' : '' }}
                                            >

                                                {{ $service->name }}

                                                —

                                                Rp
                                                {{ number_format($service->price, 0, ',', '.') }}

                                            </option>

                                        @endforeach

                                    </select>


                                    @error('service_id')

                                        <p class="error-text">
                                            {{ $message }}
                                        </p>

                                    @enderror

                                </div>


                                {{-- BARBER --}}

                                <div class="field">

                                    <label for="barber_id">

                                        Barber

                                        <span>
                                            *
                                        </span>

                                    </label>


                                    <select
                                        id="barber_id"
                                        name="barber_id"
                                        required
                                    >

                                        <option value="">
                                            Pilih barber
                                        </option>


                                        @foreach ($barbers as $barber)

                                            <option
                                                value="{{ $barber->id }}"
                                                {{ old('barber_id') == $barber->id ? 'selected' : '' }}
                                            >

                                                {{ $barber->name }}

                                                @if ($barber->specialization)

                                                    —
                                                    {{ $barber->specialization }}

                                                @endif

                                            </option>

                                        @endforeach

                                    </select>


                                    @error('barber_id')

                                        <p class="error-text">
                                            {{ $message }}
                                        </p>

                                    @enderror

                                </div>

                            </div>

                        </div>


                        {{-- =================================================
                             03 WAKTU KUNJUNGAN
                        ================================================== --}}

                        <div class="form-section">

                            <div class="form-title">
                                03 / Waktu Kunjungan
                            </div>


                            <div class="form-grid">


                                {{-- TANGGAL --}}

                                <div class="field">

                                    <label for="booking_date">

                                        Tanggal

                                        <span>
                                            *
                                        </span>

                                    </label>


                                    <input
                                        type="date"
                                        id="booking_date"
                                        name="booking_date"
                                        value="{{ old('booking_date') }}"
                                        min="{{ date('Y-m-d') }}"
                                        required
                                    >


                                    @error('booking_date')

                                        <p class="error-text">
                                            {{ $message }}
                                        </p>

                                    @enderror

                                </div>


                                {{-- JAM --}}

                                <div class="field">

                                    <label for="booking_time">

                                        Jam

                                        <span>
                                            *
                                        </span>

                                    </label>


                                    <input
                                        type="time"
                                        id="booking_time"
                                        name="booking_time"
                                        value="{{ old('booking_time') }}"
                                        required
                                    >


                                    @error('booking_time')

                                        <p class="error-text">
                                            {{ $message }}
                                        </p>

                                    @enderror

                                </div>

                            </div>

                        </div>


                        {{-- =================================================
                             04 CATATAN
                        ================================================== --}}

                        <div class="form-section">

                            <div class="form-title">
                                04 / Catatan
                            </div>


                            <div class="field">

                                <label for="notes">

                                    Catatan

                                    <small style="
                                        color:#a39b90;
                                        font-weight:500;
                                    ">
                                        (Opsional)
                                    </small>

                                </label>


                                <textarea
                                    id="notes"
                                    name="notes"
                                    maxlength="1000"
                                    placeholder="Contoh: ingin potongan fade dengan bagian atas tetap panjang..."
                                >{{ old('notes') }}</textarea>


                                @error('notes')

                                    <p class="error-text">
                                        {{ $message }}
                                    </p>

                                @enderror

                            </div>

                        </div>


                        {{-- =================================================
                             SUBMIT
                        ================================================== --}}

                        <div class="submit-bar">

                            <div class="submit-note">

                                Pastikan layanan, barber,
                                tanggal, jam, dan email
                                sudah sesuai.

                            </div>


                            <button
                                type="submit"
                                class="submit"
                            >

                                Konfirmasi Booking

                                &nbsp;→

                            </button>

                        </div>

                    </form>

                </div>


                {{-- =====================================================
                     SIDE CARD
                ====================================================== --}}

                <aside class="side reveal delay-2">

                    <div class="side-card">


                        <div
                            class="section-label"
                            style="color:#d1a45b;"
                        >

                            How it works

                        </div>


                        <h2 class="side-title">

                            Booking lebih mudah,
                            tanpa antre lama.

                        </h2>


                        <p class="side-copy">

                            Tentukan pilihanmu sebelum
                            datang ke BARBER.

                        </p>


                        <div class="steps">


                            {{-- STEP 01 --}}

                            <div class="step">

                                <div class="step-number">
                                    01
                                </div>

                                <div>

                                    <h3>
                                        Pilih layanan
                                    </h3>

                                    <p>
                                        Tentukan jenis grooming
                                        sesuai kebutuhanmu.
                                    </p>

                                </div>

                            </div>


                            {{-- STEP 02 --}}

                            <div class="step">

                                <div class="step-number">
                                    02
                                </div>

                                <div>

                                    <h3>
                                        Pilih barber
                                    </h3>

                                    <p>
                                        Pilih barber yang paling
                                        sesuai dengan gayamu.
                                    </p>

                                </div>

                            </div>


                            {{-- STEP 03 --}}

                            <div class="step">

                                <div class="step-number">
                                    03
                                </div>

                                <div>

                                    <h3>
                                        Tentukan waktu
                                    </h3>

                                    <p>
                                        Pilih tanggal dan jam
                                        yang nyaman untukmu.
                                    </p>

                                </div>

                            </div>


                            {{-- STEP 04 --}}

                            <div class="step">

                                <div class="step-number">
                                    04
                                </div>

                                <div>

                                    <h3>
                                        Konfirmasi
                                    </h3>

                                    <p>
                                        Invoice akan dikirim
                                        otomatis ke email kamu.
                                    </p>

                                </div>

                            </div>

                        </div>


                        {{-- CEK BOOKING --}}

                        <a
                            href="{{ route('booking.check') }}"
                            class="check-link"
                        >

                            <span
                                style="
                                    color:#aaa39b;
                                    font-weight:500;
                                "
                            >

                                Sudah punya booking?

                            </span>


                            <span>
                                →
                            </span>

                        </a>

                    </div>

                </aside>

            </div>

        </section>

    </main>


    {{-- =====================================================
         FOOTER
    ====================================================== --}}

    <footer>

        <div class="footer-inner">

            <div>

                <span class="footer-brand">
                    BARBER.
                </span>

                &nbsp;

                Professional grooming experience.

            </div>


            <div>

                © {{ date('Y') }}
                BARBER. Grooming Studio

            </div>

        </div>

    </footer>

</body>

</html>