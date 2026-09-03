<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Booking Berhasil | BARBER.</title>

    <style>
        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: Arial, Helvetica, sans-serif;
            color: #181715;
            background:
                radial-gradient(
                    circle at 10% 10%,
                    rgba(196, 145, 62, .12),
                    transparent 28%
                ),
                radial-gradient(
                    circle at 90% 85%,
                    rgba(196, 145, 62, .10),
                    transparent 30%
                ),
                #f6f3ed;
        }

        a {
            text-decoration: none;
        }

        .page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 45px 20px;
            overflow: hidden;
            position: relative;
        }

        .glow {
            position: absolute;
            width: 380px;
            height: 380px;
            border-radius: 50%;
            background: rgba(194, 138, 50, .08);
            filter: blur(70px);
            pointer-events: none;
            animation: floatGlow 7s ease-in-out infinite;
        }

        .glow.one {
            top: -150px;
            left: -120px;
        }

        .glow.two {
            right: -150px;
            bottom: -160px;
            animation-delay: -3s;
        }

        .container {
            width: 100%;
            max-width: 850px;
            position: relative;
            z-index: 2;
        }

        .brand {
            text-align: center;
            margin-bottom: 22px;
            animation: fadeDown .7s ease both;
        }

        .brand-name {
            font-size: 25px;
            font-weight: 900;
            letter-spacing: -.06em;
        }

        .brand-sub {
            display: block;
            margin-top: 3px;
            font-size: 8px;
            font-weight: 700;
            letter-spacing: .30em;
            color: #a98243;
        }

        .card {
            position: relative;
            overflow: hidden;
            background: rgba(255, 255, 255, .93);
            border: 1px solid #e6ddd0;
            border-radius: 30px;
            box-shadow:
                0 30px 80px rgba(53, 40, 23, .12),
                0 8px 25px rgba(53, 40, 23, .06);
            padding: 45px;
            animation: cardIn .8s cubic-bezier(.2,.8,.2,1) both;
        }

        .card::before {
            content: "";
            position: absolute;
            width: 240px;
            height: 240px;
            border-radius: 50%;
            background: rgba(194, 138, 50, .08);
            top: -150px;
            right: -100px;
        }

        .top-line {
            width: 100%;
            height: 3px;
            background: linear-gradient(
                90deg,
                #b77c20,
                #e2b765,
                #b77c20
            );
            position: absolute;
            left: 0;
            top: 0;
        }

        .success-icon {
            width: 78px;
            height: 78px;
            margin: 0 auto;
            border-radius: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 32px;
            font-weight: 800;
            background: linear-gradient(
                145deg,
                #c99542,
                #a96f1c
            );
            box-shadow:
                0 16px 35px rgba(169, 111, 28, .25),
                inset 0 1px rgba(255,255,255,.45);
            animation: successPop .8s cubic-bezier(.2,1.4,.4,1) .15s both;
        }

        .success-icon span {
            animation: check .5s ease .65s both;
        }

        .eyebrow {
            margin: 27px 0 0;
            text-align: center;
            color: #b07a25;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: .24em;
            text-transform: uppercase;
        }

        h1 {
            margin: 10px 0 0;
            text-align: center;
            font-size: clamp(31px, 5vw, 53px);
            line-height: 1.04;
            letter-spacing: -.055em;
        }

        .intro {
            max-width: 570px;
            margin: 16px auto 0;
            text-align: center;
            color: #777169;
            font-size: 14px;
            line-height: 1.8;
        }

        .divider {
            height: 1px;
            background: #ebe3d8;
            margin: 34px 0;
        }

        .booking-title {
            font-size: 11px;
            font-weight: 800;
            letter-spacing: .20em;
            color: #a98243;
            text-transform: uppercase;
            margin-bottom: 15px;
        }

        .details {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 13px;
        }

        .detail {
            border: 1px solid #e9e1d6;
            background: #faf8f4;
            border-radius: 19px;
            padding: 19px 20px;
            transition:
                transform .25s ease,
                box-shadow .25s ease,
                border-color .25s ease;
        }

        .detail:hover {
            transform: translateY(-4px);
            border-color: #d6b16d;
            box-shadow:
                0 12px 30px rgba(74, 51, 20, .08);
        }

        .label {
            color: #9b9286;
            font-size: 9px;
            font-weight: 800;
            letter-spacing: .18em;
            text-transform: uppercase;
        }

        .value {
            margin-top: 8px;
            font-size: 17px;
            font-weight: 800;
            color: #24221f;

            /*
             * Supaya email panjang tidak merusak layout
             */
            word-break: break-word;
            overflow-wrap: anywhere;
        }

        .booking-id {
            color: #b17820;
            font-size: 20px;
        }

        .email-value {
            font-size: 14px;
        }

        .status {
            margin-top: 17px;
            padding: 16px 18px;
            border-radius: 17px;
            background: #f7f1e5;
            border: 1px solid #ead7b7;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .status-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #c38a32;
            box-shadow:
                0 0 0 6px rgba(195, 138, 50, .12);
            flex: 0 0 auto;
            animation: pulse 2s infinite;
        }

        .status-text strong {
            display: block;
            font-size: 12px;
            margin-bottom: 3px;
        }

        .status-text span {
            color: #82796e;
            font-size: 11px;
            line-height: 1.6;
        }

        .actions {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-top: 30px;
        }

        .btn {
            min-height: 53px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            padding: 14px 20px;
            font-size: 12px;
            font-weight: 800;
            transition:
                transform .25s ease,
                box-shadow .25s ease,
                background .25s ease;
        }

        .btn:hover {
            transform: translateY(-3px);
        }

        .btn-primary {
            color: white;
            background: #171716;
            box-shadow:
                0 12px 25px rgba(23, 23, 22, .14);
        }

        .btn-primary:hover {
            background: #292826;
            box-shadow:
                0 16px 30px rgba(23, 23, 22, .20);
        }

        .btn-secondary {
            color: #292722;
            border: 1px solid #ddd4c8;
            background: #fff;
        }

        .btn-secondary:hover {
            background: #faf7f1;
            border-color: #caa263;
        }

        .footer-note {
            margin-top: 24px;
            text-align: center;
            color: #9a9186;
            font-size: 10px;
            letter-spacing: .03em;
        }

        @keyframes cardIn {
            from {
                opacity: 0;
                transform: translateY(30px) scale(.98);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @keyframes fadeDown {
            from {
                opacity: 0;
                transform: translateY(-15px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes successPop {
            0% {
                opacity: 0;
                transform: scale(.3) rotate(-12deg);
            }

            70% {
                transform: scale(1.08) rotate(2deg);
            }

            100% {
                opacity: 1;
                transform: scale(1) rotate(0);
            }
        }

        @keyframes check {
            from {
                opacity: 0;
                transform: scale(.3);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes floatGlow {
            0%, 100% {
                transform: translate3d(0, 0, 0);
            }

            50% {
                transform: translate3d(25px, -20px, 0);
            }
        }

        @keyframes pulse {
            0%, 100% {
                box-shadow:
                    0 0 0 5px rgba(195, 138, 50, .10);
            }

            50% {
                box-shadow:
                    0 0 0 9px rgba(195, 138, 50, .03);
            }
        }

        @media (max-width: 650px) {

            .page {
                padding: 25px 14px;
            }

            .card {
                padding: 31px 20px;
                border-radius: 24px;
            }

            .details {
                grid-template-columns: 1fr;
            }

            .actions {
                grid-template-columns: 1fr;
            }

            .success-icon {
                width: 68px;
                height: 68px;
                border-radius: 20px;
            }

            .intro {
                font-size: 13px;
            }

            .value {
                font-size: 16px;
            }

            .email-value {
                font-size: 13px;
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

<div class="page">

    <div class="glow one"></div>
    <div class="glow two"></div>

    <div class="container">

        {{-- BRAND --}}
        <div class="brand">
            <div class="brand-name">BARBER.</div>
            <span class="brand-sub">GROOMING STUDIO</span>
        </div>

        <section class="card">

            <div class="top-line"></div>

            {{-- SUCCESS ICON --}}
            <div class="success-icon">
                <span>✓</span>
            </div>

            <p class="eyebrow">
                Booking berhasil
            </p>

            <h1>
                Sampai jumpa di BARBER.
            </h1>

            <p class="intro">
                Booking kamu sudah berhasil dibuat.
                Simpan informasi berikut untuk mengecek status booking
                dan jangan lupa datang sesuai jadwal.
            </p>

            @if(isset($booking))

                <div class="divider"></div>

                <div class="booking-title">
                    Detail Appointment
                </div>

                <div class="details">

                    {{-- ID BOOKING --}}
                    <div class="detail">
                        <div class="label">
                            ID Booking
                        </div>

                        <div class="value booking-id">
                            #{{ $booking->id }}
                        </div>
                    </div>


                    {{-- PELANGGAN --}}
                    <div class="detail">
                        <div class="label">
                            Pelanggan
                        </div>

                        <div class="value">
                            {{ $booking->customer->name ?? '-' }}
                        </div>
                    </div>


                    {{-- EMAIL PELANGGAN --}}
                    <div class="detail">
                        <div class="label">
                            Email
                        </div>

                        <div class="value email-value">
                            {{ $booking->customer->email ?? '-' }}
                        </div>
                    </div>


                    {{-- TANGGAL --}}
                    <div class="detail">
                        <div class="label">
                            Tanggal
                        </div>

                        <div class="value">

                            @if($booking->booking_date)

                                {{ \Carbon\Carbon::parse($booking->booking_date)->format('d/m/Y') }}

                            @else

                                -

                            @endif

                        </div>
                    </div>


                    {{-- JAM --}}
                    <div class="detail">
                        <div class="label">
                            Jam
                        </div>

                        <div class="value">

                            @if($booking->booking_time)

                                {{ \Carbon\Carbon::parse($booking->booking_time)->format('H:i') }}
                                WIB

                            @else

                                -

                            @endif

                        </div>
                    </div>


                    {{-- LAYANAN --}}
                    <div class="detail">

                        <div class="label">
                            Layanan
                        </div>

                        <div class="value">
                            {{ $booking->service->name ?? '-' }}
                        </div>

                    </div>


                    {{-- BARBER --}}
                    <div class="detail">

                        <div class="label">
                            Barber
                        </div>

                        <div class="value">
                            {{ $booking->barber->name ?? '-' }}
                        </div>

                    </div>

                </div>


                {{-- STATUS --}}
                <div class="status">

                    <div class="status-dot"></div>

                    <div class="status-text">

                        <strong>
                            Booking tersimpan
                        </strong>

                        <span>
                            Invoice booking akan dikirim ke email
                            yang kamu masukkan saat melakukan booking.
                        </span>

                    </div>

                </div>

            @else

                <div class="divider"></div>

                <div class="status">

                    <div class="status-dot"></div>

                    <div class="status-text">

                        <strong>
                            Booking berhasil dibuat
                        </strong>

                        <span>
                            Detail booking tidak tersedia pada halaman ini.
                        </span>

                    </div>

                </div>

            @endif


            {{-- ACTIONS --}}
            <div class="actions">

                <a
                    href="{{ route('booking.check') }}"
                    class="btn btn-primary"
                >
                    <span>
                        Cek Status Booking
                    </span>

                    <span>
                        →
                    </span>
                </a>


                <a
                    href="{{ route('home') }}"
                    class="btn btn-secondary"
                >
                    <span>
                        Kembali ke Beranda
                    </span>

                    <span>
                        →
                    </span>
                </a>

            </div>


            {{-- FOOTER --}}
            <div class="footer-note">
                Terima kasih telah memilih BARBER.
                — Premium grooming experience.
            </div>

        </section>

    </div>

</div>

</body>
</html>