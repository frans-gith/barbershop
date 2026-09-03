<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Invoice Booking - BARBER.</title>
</head>

<body style="
    margin:0;
    padding:0;
    background:#f3f0ea;
    font-family:Arial, Helvetica, sans-serif;
    color:#191714;
">

<div style="
    width:100%;
    padding:40px 15px;
    box-sizing:border-box;
">

    <div style="
        max-width:620px;
        margin:0 auto;
        background:#ffffff;
        border-radius:20px;
        overflow:hidden;
        box-shadow:0 15px 50px rgba(0,0,0,.08);
    ">

        {{-- ========================================= --}}
        {{-- HEADER --}}
        {{-- ========================================= --}}

        <div style="
            background:#171614;
            padding:32px;
            color:#ffffff;
        ">

            <div style="
                font-size:11px;
                letter-spacing:3px;
                color:#d0a04d;
                font-weight:bold;
            ">
                GROOMING STUDIO
            </div>

            <div style="
                margin-top:8px;
                font-size:30px;
                font-weight:bold;
                letter-spacing:-1px;
            ">
                BARBER.
            </div>

            <div style="
                margin-top:22px;
                font-size:13px;
                color:#c8c3bb;
            ">
                Invoice Booking
            </div>

        </div>


        {{-- ========================================= --}}
        {{-- SUCCESS --}}
        {{-- ========================================= --}}

        <div style="
            padding:32px;
            border-bottom:1px solid #eee8df;
        ">

            <div style="
                display:inline-block;
                padding:8px 13px;
                background:#effaf3;
                color:#087443;
                border-radius:30px;
                font-size:10px;
                font-weight:bold;
                letter-spacing:.5px;
            ">
                ✓ BOOKING BERHASIL
            </div>

            <h1 style="
                margin:18px 0 8px;
                font-size:25px;
                line-height:1.3;
            ">
                Halo,
                {{ $booking->customer->name ?? 'Pelanggan' }}!
            </h1>

            <p style="
                margin:0;
                color:#817b72;
                font-size:13px;
                line-height:1.7;
            ">
                Terima kasih telah melakukan booking
                di BARBER. Berikut adalah detail
                booking kamu.
            </p>

        </div>


        {{-- ========================================= --}}
        {{-- BOOKING CODE --}}
        {{-- ========================================= --}}

        <div style="
            padding:25px 32px;
            background:#fbf8f3;
            border-bottom:1px solid #eee8df;
        ">

            <div style="
                font-size:10px;
                color:#91897f;
                letter-spacing:2px;
                font-weight:bold;
            ">
                KODE BOOKING
            </div>

            <div style="
                margin-top:8px;
                font-size:23px;
                font-weight:bold;
                letter-spacing:1px;
                color:#171614;
            ">
                {{ $booking->booking_code }}
            </div>

        </div>


        {{-- ========================================= --}}
        {{-- DETAIL BOOKING --}}
        {{-- ========================================= --}}

        <div style="
            padding:30px 32px;
        ">

            <div style="
                font-size:10px;
                color:#9a9288;
                letter-spacing:2px;
                font-weight:bold;
                margin-bottom:18px;
            ">
                DETAIL BOOKING
            </div>


            {{-- LAYANAN --}}

            <table width="100%"
                   cellpadding="0"
                   cellspacing="0"
                   style="margin-bottom:12px;">

                <tr>

                    <td style="
                        color:#8b847b;
                        font-size:12px;
                        padding:8px 0;
                    ">
                        Layanan
                    </td>

                    <td align="right"
                        style="
                            font-size:13px;
                            font-weight:bold;
                            padding:8px 0;
                        ">

                        {{ $booking->service->name ?? '-' }}

                    </td>

                </tr>

            </table>


            {{-- BARBER --}}

            <table width="100%"
                   cellpadding="0"
                   cellspacing="0"
                   style="margin-bottom:12px;">

                <tr>

                    <td style="
                        color:#8b847b;
                        font-size:12px;
                        padding:8px 0;
                    ">
                        Barber
                    </td>

                    <td align="right"
                        style="
                            font-size:13px;
                            font-weight:bold;
                            padding:8px 0;
                        ">

                        {{ $booking->barber->name ?? '-' }}

                    </td>

                </tr>

            </table>


            {{-- TANGGAL --}}

            <table width="100%"
                   cellpadding="0"
                   cellspacing="0"
                   style="margin-bottom:12px;">

                <tr>

                    <td style="
                        color:#8b847b;
                        font-size:12px;
                        padding:8px 0;
                    ">
                        Tanggal
                    </td>

                    <td align="right"
                        style="
                            font-size:13px;
                            font-weight:bold;
                            padding:8px 0;
                        ">

                        {{ $booking->booking_date?->format('d F Y') }}

                    </td>

                </tr>

            </table>


            {{-- JAM --}}

            <table width="100%"
                   cellpadding="0"
                   cellspacing="0"
                   style="margin-bottom:12px;">

                <tr>

                    <td style="
                        color:#8b847b;
                        font-size:12px;
                        padding:8px 0;
                    ">
                        Jam
                    </td>

                    <td align="right"
                        style="
                            font-size:13px;
                            font-weight:bold;
                            padding:8px 0;
                        ">

                        {{ $booking->booking_time?->format('H:i') }} WIB

                    </td>

                </tr>

            </table>


            {{-- STATUS --}}

            <table width="100%"
                   cellpadding="0"
                   cellspacing="0"
                   style="margin-bottom:22px;">

                <tr>

                    <td style="
                        color:#8b847b;
                        font-size:12px;
                        padding:8px 0;
                    ">
                        Status
                    </td>

                    <td align="right"
                        style="
                            padding:8px 0;
                        ">

                        <span style="
                            display:inline-block;
                            padding:6px 11px;
                            background:#fff5df;
                            color:#a36f23;
                            border-radius:20px;
                            font-size:10px;
                            font-weight:bold;
                            text-transform:uppercase;
                        ">
                            {{ $booking->status }}
                        </span>

                    </td>

                </tr>

            </table>


            {{-- TOTAL --}}

            <div style="
                border-top:1px solid #e8e1d7;
                padding-top:20px;
            ">

                <table width="100%"
                       cellpadding="0"
                       cellspacing="0">

                    <tr>

                        <td style="
                            font-size:13px;
                            font-weight:bold;
                        ">
                            Total Booking
                        </td>

                        <td align="right"
                            style="
                                font-size:21px;
                                font-weight:bold;
                                color:#a97327;
                            ">

                            Rp {{ number_format($booking->total_price, 0, ',', '.') }}

                        </td>

                    </tr>

                </table>

            </div>

        </div>


        {{-- ========================================= --}}
        {{-- CATATAN --}}
        {{-- ========================================= --}}

        @if ($booking->notes)

            <div style="
                margin:0 32px 30px;
                padding:18px;
                background:#fbf8f3;
                border-radius:13px;
            ">

                <div style="
                    font-size:10px;
                    color:#9a9288;
                    letter-spacing:1.5px;
                    font-weight:bold;
                    margin-bottom:8px;
                ">
                    CATATAN
                </div>

                <div style="
                    font-size:12px;
                    color:#514b44;
                    line-height:1.6;
                ">
                    {{ $booking->notes }}
                </div>

            </div>

        @endif


        {{-- ========================================= --}}
        {{-- REMINDER --}}
        {{-- ========================================= --}}

        <div style="
            margin:0 32px 30px;
            padding:18px;
            border:1px solid #e8e1d7;
            border-radius:13px;
            background:#fffdf9;
        ">

            <div style="
                font-size:11px;
                font-weight:bold;
                margin-bottom:7px;
            ">
                Informasi
            </div>

            <div style="
                font-size:11px;
                color:#817b72;
                line-height:1.7;
            ">
                Mohon datang sesuai tanggal dan jam
                booking. Tunjukkan kode booking ini
                kepada barber saat melakukan kunjungan.
            </div>

        </div>


        {{-- ========================================= --}}
        {{-- FOOTER --}}
        {{-- ========================================= --}}

        <div style="
            padding:28px 32px;
            background:#171614;
            color:#ffffff;
            text-align:center;
        ">

            <div style="
                font-size:19px;
                font-weight:bold;
            ">
                BARBER.
            </div>

            <div style="
                margin-top:8px;
                color:#9d978f;
                font-size:10px;
                line-height:1.7;
            ">
                Professional grooming experience.
                <br>
                Simpan email ini sebagai bukti booking kamu.
            </div>

            <div style="
                margin-top:18px;
                color:#706b64;
                font-size:9px;
            ">
                © {{ date('Y') }} BARBER. Grooming Studio
            </div>

        </div>

    </div>

</div>

</body>
</html>