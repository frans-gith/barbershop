{{-- resources/views/home/index.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BARBER. — Grooming Studio</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root{
            --cream:#f7f4ed;
            --paper:#fffdfa;
            --ink:#171717;
            --muted:#77736c;
            --gold:#bd842b;
            --gold2:#d8a54a;
            --line:#e7e0d4;
            --soft:#efe8dc;
        }

        *{box-sizing:border-box}
        html{scroll-behavior:smooth}
        body{
            margin:0;
            background:var(--cream);
            color:var(--ink);
            font-family:'DM Sans',sans-serif;
            overflow-x:hidden;
        }

        h1,h2,h3,h4{
            font-family:'Manrope',sans-serif;
            letter-spacing:-.045em;
        }

        a{text-decoration:none;color:inherit}

        .container{
            width:min(1180px,calc(100% - 40px));
            margin:auto;
        }

        .top-line{
            height:3px;
            background:linear-gradient(90deg,#b87b1e,#e1b45d,#b87b1e);
        }

        .nav{
            position:fixed;
            top:3px;
            left:0;
            width:100%;
            z-index:50;
            transition:.35s ease;
            border-bottom:1px solid transparent;
        }

        .nav.scrolled{
            background:rgba(247,244,237,.9);
            backdrop-filter:blur(18px);
            border-color:rgba(189,132,43,.12);
            box-shadow:0 12px 35px rgba(43,32,17,.06);
        }

        .nav-inner{
            height:76px;
            display:flex;
            align-items:center;
            justify-content:space-between;
        }

        .brand{
            display:flex;
            align-items:center;
            gap:11px;
            font-weight:800;
            letter-spacing:-.04em;
        }

        .brand-mark{
            width:38px;
            height:38px;
            border-radius:12px;
            display:grid;
            place-items:center;
            color:#fff;
            background:linear-gradient(145deg,#dca94f,#ae7320);
            box-shadow:0 8px 22px rgba(174,115,32,.22);
        }

        .brand small{
            display:block;
            margin-top:-2px;
            font-size:7px;
            letter-spacing:.24em;
            color:#8d877e;
        }

        .nav-links{
            display:flex;
            align-items:center;
            gap:30px;
            color:#625e57;
            font-size:12px;
            font-weight:600;
        }

        .nav-links a{
            position:relative;
            padding:28px 0;
        }

        .nav-links a:after{
            content:"";
            position:absolute;
            left:0;
            right:0;
            bottom:18px;
            height:2px;
            transform:scaleX(0);
            transform-origin:center;
            background:var(--gold);
            transition:.3s;
        }

        .nav-links a:hover:after,
        .nav-links a.active:after{transform:scaleX(1)}

        .gold-btn{
            display:inline-flex;
            align-items:center;
            justify-content:center;
            gap:10px;
            background:linear-gradient(135deg,#d29a39,#ae7420);
            color:white;
            padding:14px 20px;
            border-radius:12px;
            font-size:12px;
            font-weight:700;
            box-shadow:0 12px 26px rgba(173,115,31,.18);
            transition:.35s ease;
        }

        .gold-btn:hover{
            transform:translateY(-3px);
            box-shadow:0 17px 32px rgba(173,115,31,.25);
        }

        .outline-btn{
            display:inline-flex;
            align-items:center;
            gap:9px;
            padding:13px 18px;
            border:1px solid #d9d1c5;
            background:rgba(255,255,255,.55);
            border-radius:12px;
            font-size:12px;
            font-weight:700;
            transition:.3s;
        }

        .outline-btn:hover{
            border-color:var(--gold);
            background:#fff;
            transform:translateY(-2px);
        }

        .mobile-menu-btn{display:none}

        /* HERO */
        .hero{
            min-height:760px;
            padding-top:120px;
            position:relative;
            display:flex;
            align-items:center;
            overflow:hidden;
            background:
                radial-gradient(circle at 7% 48%,rgba(202,151,65,.12),transparent 28%),
                radial-gradient(circle at 89% 35%,rgba(210,171,104,.12),transparent 30%),
                var(--cream);
        }

        .hero:before{
            content:"";
            position:absolute;
            inset:0;
            pointer-events:none;
            opacity:.38;
            background-image:
                linear-gradient(rgba(80,62,34,.035) 1px,transparent 1px),
                linear-gradient(90deg,rgba(80,62,34,.035) 1px,transparent 1px);
            background-size:42px 42px;
            mask-image:linear-gradient(to bottom,black,transparent 90%);
        }

        .hero-grid{
            position:relative;
            z-index:2;
            display:grid;
            grid-template-columns:1fr 1fr;
            align-items:center;
            gap:70px;
        }

        .eyebrow{
            display:flex;
            align-items:center;
            gap:12px;
            color:#a56f22;
            font-size:9px;
            letter-spacing:.25em;
            font-weight:800;
            text-transform:uppercase;
            margin-bottom:23px;
        }

        .eyebrow span{
            width:34px;
            height:1px;
            background:#bd842b;
        }

        .hero h1{
            font-size:clamp(58px,6.3vw,92px);
            line-height:.94;
            max-width:690px;
            margin:0;
            font-weight:800;
        }

        .hero h1 em{
            color:#bc8129;
            font-style:normal;
        }

        .hero-copy{
            max-width:560px;
            margin-top:25px;
            color:#77736d;
            font-size:14px;
            line-height:1.8;
        }

        .hero-actions{
            display:flex;
            gap:10px;
            margin-top:30px;
            flex-wrap:wrap;
        }

        .hero-stats{
            display:flex;
            gap:28px;
            margin-top:38px;
            flex-wrap:wrap;
        }

        .stat{
            display:flex;
            align-items:center;
            gap:10px;
        }

        .stat-icon{
            width:34px;
            height:34px;
            border-radius:10px;
            display:grid;
            place-items:center;
            color:#a87224;
            border:1px solid #e5d6bb;
            background:#fffdf8;
        }

        .stat strong{
            display:block;
            font-size:13px;
        }

        .stat small{
            display:block;
            color:#99938a;
            font-size:8px;
            margin-top:2px;
        }

        /* HERO VISUAL */
        .hero-visual{
            min-height:510px;
            position:relative;
            display:flex;
            justify-content:center;
            align-items:center;
        }

        .hero-photo{
            width:min(390px,78%);
            height:500px;
            object-fit:cover;
            border-radius:32px;
            box-shadow:
                0 35px 80px rgba(58,42,20,.15),
                0 0 0 1px rgba(169,125,56,.12);
            filter:saturate(.9) contrast(.96);
            transform:rotate(2deg);
            transition:transform .8s cubic-bezier(.2,.8,.2,1);
        }

        .hero-photo:hover{transform:rotate(0deg) scale(1.025)}

        .photo-frame{
            position:absolute;
            width:min(390px,78%);
            height:500px;
            border:1px solid rgba(189,132,43,.28);
            border-radius:32px;
            transform:rotate(-4deg) translate(8px,10px);
            pointer-events:none;
        }

        .floating-card{
            position:absolute;
            z-index:5;
            background:rgba(255,255,255,.94);
            backdrop-filter:blur(15px);
            border:1px solid rgba(215,205,189,.75);
            box-shadow:0 20px 45px rgba(64,48,26,.13);
            border-radius:16px;
            padding:15px 17px;
            animation:float 5s ease-in-out infinite;
        }

        .floating-card.top{top:35px;right:2%}
        .floating-card.bottom{bottom:38px;left:0;animation-delay:-2s}

        .floating-card .mini-label{
            font-size:8px;
            color:#a29a8e;
            letter-spacing:.12em;
            text-transform:uppercase;
        }

        .floating-card strong{
            display:block;
            font-size:13px;
            margin-top:4px;
        }

        .floating-card.gold{
            border-left:3px solid var(--gold);
        }

        @keyframes float{
            0%,100%{transform:translateY(0)}
            50%{transform:translateY(-10px)}
        }

        .orbit{
            position:absolute;
            width:500px;
            height:500px;
            border:1px solid rgba(189,132,43,.14);
            border-radius:50%;
            animation:spin 22s linear infinite;
        }

        .orbit:before{
            content:"";
            position:absolute;
            width:7px;
            height:7px;
            border-radius:50%;
            background:#c78c30;
            top:22px;
            left:50%;
            box-shadow:0 0 18px rgba(199,140,48,.8);
        }

        .orbit.two{
            width:420px;
            height:420px;
            animation-duration:16s;
            animation-direction:reverse;
            border-color:rgba(189,132,43,.09);
        }

        @keyframes spin{to{transform:rotate(360deg)}}

        /* SECTIONS */
        section{position:relative}

        .section{
            padding:120px 0;
        }

        .section-head{
            display:flex;
            align-items:end;
            justify-content:space-between;
            gap:30px;
            margin-bottom:45px;
        }

        .section-number{
            color:#bb7c27;
            font-size:9px;
            font-weight:800;
            letter-spacing:.24em;
            text-transform:uppercase;
        }

        .section-title{
            margin:9px 0 0;
            font-size:clamp(38px,4.3vw,62px);
            line-height:1;
        }

        .section-title span{color:#c48228}

        .section-desc{
            max-width:440px;
            color:#817b72;
            font-size:13px;
            line-height:1.75;
        }

        /* SERVICES */
        .services-wrap{
            background:#fbf9f5;
            border-top:1px solid #ebe4d8;
            border-bottom:1px solid #ebe4d8;
        }

        .service-grid{
            display:grid;
            grid-template-columns:repeat(3,1fr);
            gap:16px;
        }

        .service-card{
            position:relative;
            min-height:360px;
            padding:28px;
            border-radius:22px;
            background:#fff;
            border:1px solid #e9e2d7;
            box-shadow:0 10px 35px rgba(61,48,29,.04);
            overflow:hidden;
            transition:.45s cubic-bezier(.2,.8,.2,1);
        }

        .service-card:before{
            content:"";
            position:absolute;
            width:160px;
            height:160px;
            right:-70px;
            top:-70px;
            border-radius:50%;
            background:rgba(202,150,66,.09);
            transition:.45s;
        }

        .service-card:hover{
            transform:translateY(-9px);
            border-color:#d9bd88;
            box-shadow:0 25px 55px rgba(72,53,26,.1);
        }

        .service-card:hover:before{
            transform:scale(1.35);
        }

        .service-number{
            position:absolute;
            right:23px;
            top:23px;
            width:31px;
            height:31px;
            border-radius:50%;
            display:grid;
            place-items:center;
            font-size:9px;
            font-weight:800;
            color:#8f877d;
            background:#f5f1e9;
        }

        .service-icon{
            width:52px;
            height:52px;
            border-radius:15px;
            display:grid;
            place-items:center;
            color:#a97020;
            background:#fbf0d7;
            margin-bottom:58px;
        }

        .service-card h3{
            font-size:23px;
            margin:0;
        }

        .service-card p{
            min-height:54px;
            color:#878077;
            font-size:12px;
            line-height:1.65;
            margin:12px 0 22px;
        }

        .service-meta{
            display:flex;
            justify-content:space-between;
            align-items:end;
            border-top:1px solid #ebe4d8;
            padding-top:17px;
        }

        .service-meta small{
            display:block;
            color:#9b9489;
            font-size:8px;
            letter-spacing:.13em;
            text-transform:uppercase;
        }

        .service-price{
            font-size:21px;
            font-weight:800;
            margin-top:4px;
        }

        .service-duration{
            color:#817b72;
            font-size:10px;
        }

        .service-action{
            display:block;
            text-align:center;
            margin-top:18px;
            padding:11px;
            border-radius:10px;
            background:#171717;
            color:#fff;
            font-size:10px;
            font-weight:700;
            transition:.3s;
        }

        .service-action:hover{
            background:#bd842b;
        }

        /* EXPERIENCE */
        .experience{
            background:#171717;
            color:#fff;
            overflow:hidden;
        }

        .experience:before{
            content:"";
            position:absolute;
            width:650px;
            height:650px;
            border:1px solid rgba(214,164,75,.13);
            border-radius:50%;
            right:-250px;
            top:-300px;
        }

        .experience-grid{
            display:grid;
            grid-template-columns:.9fr 1.1fr;
            gap:90px;
            align-items:center;
        }

        .experience .section-number{color:#d4a34c}
        .experience h2{font-size:clamp(42px,5vw,70px);line-height:1}
        .experience h2 span{color:#d4a34c}
        .experience p{color:#a9a39b;font-size:13px;line-height:1.8;max-width:480px}

        .steps{
            display:grid;
            gap:0;
        }

        .step{
            display:grid;
            grid-template-columns:70px 1fr;
            gap:24px;
            padding:25px 0;
            border-bottom:1px solid rgba(255,255,255,.09);
            transition:.35s;
        }

        .step:first-child{border-top:1px solid rgba(255,255,255,.09)}

        .step:hover{padding-left:12px}

        .step-num{
            font-family:'Manrope';
            font-size:12px;
            color:#d4a34c;
            padding-top:3px;
        }

        .step h3{font-size:20px;margin:0 0 7px}
        .step p{margin:0;color:#8e8982;font-size:11px;line-height:1.6}

        /* BARBERS */
        .barber-grid{
            display:grid;
            grid-template-columns:repeat(3,1fr);
            gap:18px;
        }

        .barber-card{
            background:#fff;
            border:1px solid #e7dfd3;
            border-radius:22px;
            overflow:hidden;
            transition:.45s cubic-bezier(.2,.8,.2,1);
        }

        .barber-card:hover{
            transform:translateY(-8px);
            box-shadow:0 24px 50px rgba(61,45,24,.11);
        }

        .barber-photo{
            height:360px;
            position:relative;
            overflow:hidden;
            background:
                radial-gradient(circle at 50% 30%,rgba(207,160,83,.25),transparent 30%),
                linear-gradient(145deg,#e8dfd0,#cfc2ae);
        }

        .barber-photo img{
            width:100%;
            height:100%;
            object-fit:cover;
            transition:.7s;
        }

        .barber-card:hover .barber-photo img{transform:scale(1.06)}

        .barber-tag{
            position:absolute;
            top:15px;
            left:15px;
            padding:7px 10px;
            border-radius:999px;
            background:rgba(255,255,255,.9);
            font-size:8px;
            font-weight:800;
            color:#6d665d;
            backdrop-filter:blur(10px);
        }

        .barber-info{padding:20px}

        .barber-info h3{
            font-size:22px;
            margin:0;
        }

        .barber-role{
            color:#9b948a;
            font-size:10px;
            margin-top:4px;
        }

        .barber-bottom{
            display:flex;
            align-items:center;
            justify-content:space-between;
            margin-top:18px;
        }

        .rating{
            font-size:10px;
            color:#a56f20;
            font-weight:700;
        }

        .mini-btn{
            padding:9px 12px;
            border-radius:9px;
            background:#171717;
            color:white;
            font-size:9px;
            font-weight:700;
        }

        /* CTA */
        .cta{
            padding:110px 0;
            background:
                radial-gradient(circle at 50% 0%,rgba(196,137,42,.18),transparent 34%),
                #f0eadf;
            text-align:center;
            overflow:hidden;
        }

        .cta h2{
            max-width:760px;
            margin:10px auto 15px;
            font-size:clamp(45px,6vw,78px);
            line-height:.98;
        }

        .cta p{
            color:#7d766c;
            max-width:500px;
            margin:0 auto 28px;
            font-size:13px;
            line-height:1.7;
        }

        /* FAQ */
        .faq{
            max-width:850px;
            margin:auto;
        }

        .faq-item{
            border-top:1px solid #ded6ca;
        }

        .faq-item:last-child{border-bottom:1px solid #ded6ca}

        .faq-q{
            width:100%;
            border:0;
            background:none;
            padding:23px 0;
            display:flex;
            justify-content:space-between;
            align-items:center;
            cursor:pointer;
            text-align:left;
            font-family:'Manrope';
            font-size:16px;
            font-weight:700;
        }

        .faq-icon{
            width:28px;
            height:28px;
            border:1px solid #d6cbbb;
            border-radius:50%;
            display:grid;
            place-items:center;
            transition:.3s;
            flex:none;
        }

        .faq-answer{
            max-height:0;
            overflow:hidden;
            transition:.4s ease;
            color:#817a70;
            font-size:12px;
            line-height:1.75;
        }

        .faq-answer div{padding:0 40px 22px 0}

        .faq-item.open .faq-answer{max-height:160px}
        .faq-item.open .faq-icon{transform:rotate(45deg);background:#bd842b;color:#fff;border-color:#bd842b}

        /* FOOTER */
        footer{
            background:#171717;
            color:#fff;
            padding:70px 0 28px;
        }

        .footer-grid{
            display:grid;
            grid-template-columns:1.5fr 1fr 1fr 1fr;
            gap:50px;
        }

        .footer-brand p{
            max-width:310px;
            color:#8f8b84;
            font-size:11px;
            line-height:1.8;
            margin-top:15px;
        }

        footer h4{
            font-size:11px;
            letter-spacing:.08em;
            margin:0 0 18px;
        }

        footer a{
            display:block;
            color:#8f8b84;
            font-size:10px;
            margin:10px 0;
            transition:.25s;
        }

        footer a:hover{color:#d3a04a}

        .copyright{
            border-top:1px solid rgba(255,255,255,.09);
            margin-top:55px;
            padding-top:20px;
            display:flex;
            justify-content:space-between;
            gap:20px;
            color:#6e6b65;
            font-size:9px;
        }

        /* REVEAL */
        .reveal{
            opacity:0;
            transform:translateY(30px);
            transition:opacity .8s ease,transform .8s cubic-bezier(.2,.8,.2,1);
        }

        .reveal.show{
            opacity:1;
            transform:none;
        }

        .delay-1{transition-delay:.08s}
        .delay-2{transition-delay:.16s}
        .delay-3{transition-delay:.24s}

        .cursor-glow{
            position:fixed;
            width:280px;
            height:280px;
            border-radius:50%;
            pointer-events:none;
            z-index:0;
            background:radial-gradient(circle,rgba(207,158,77,.09),transparent 65%);
            transform:translate(-50%,-50%);
        }

        .mobile-book{
            display:none;
        }

        @media(max-width:900px){
            .nav-links{display:none}
            .nav .gold-btn{display:none}
            .mobile-menu-btn{
                display:block;
                border:1px solid #ddd4c7;
                background:#fff;
                border-radius:10px;
                padding:9px 11px;
            }

            .hero{min-height:auto;padding:140px 0 90px}
            .hero-grid{grid-template-columns:1fr;gap:50px}
            .hero-visual{min-height:460px}
            .hero-photo,.photo-frame{height:450px}

            .service-grid{grid-template-columns:1fr 1fr}
            .barber-grid{grid-template-columns:1fr 1fr}
            .experience-grid{grid-template-columns:1fr;gap:45px}
            .footer-grid{grid-template-columns:1fr 1fr}
        }

        @media(max-width:620px){
            .container{width:min(100% - 28px,1180px)}
            .nav-inner{height:66px}
            .hero{padding-top:115px}
            .hero h1{font-size:53px}
            .hero-copy{font-size:12px}
            .hero-visual{min-height:400px}
            .hero-photo,.photo-frame{width:76%;height:390px}
            .orbit{width:370px;height:370px}
            .orbit.two{width:315px;height:315px}
            .floating-card.top{right:0;top:15px}
            .floating-card.bottom{left:0;bottom:10px}

            .section{padding:80px 0}
            .section-head{display:block}
            .section-head .outline-btn{margin-top:22px}
            .service-grid,.barber-grid{grid-template-columns:1fr}
            .service-card{min-height:330px}
            .barber-photo{height:390px}

            .hero-stats{gap:17px}
            .stat{min-width:140px}

            .footer-grid{grid-template-columns:1fr 1fr;gap:30px}
            .footer-brand{grid-column:1/-1}
            .copyright{display:block}
            .copyright div+div{margin-top:8px}

            .mobile-book{
                display:flex;
                position:fixed;
                z-index:60;
                bottom:15px;
                left:14px;
                right:14px;
                justify-content:center;
                padding:15px;
                border-radius:15px;
                background:linear-gradient(135deg,#d39b3d,#ad741f);
                color:white;
                font-size:11px;
                font-weight:800;
                box-shadow:0 15px 35px rgba(80,53,18,.3);
            }

            .cursor-glow{display:none}
        }

        @media(prefers-reduced-motion:reduce){
            *,*:before,*:after{
                animation-duration:.01ms!important;
                animation-iteration-count:1!important;
                scroll-behavior:auto!important;
                transition-duration:.01ms!important;
            }
            .reveal{opacity:1;transform:none}
        }
    </style>
</head>

<body>

<div class="top-line"></div>

<div class="cursor-glow" id="cursorGlow"></div>

<header class="nav" id="navbar">
    <div class="container nav-inner">
        <a href="{{ route('home') }}" class="brand">
            <div class="brand-mark">✂</div>
            <div>
                BARBER.
                <small>GROOMING STUDIO</small>
            </div>
        </a>

        <nav class="nav-links">
            <a href="#home" class="active">Home</a>
            <a href="#layanan">Layanan</a>
            <a href="#barber">Barber</a>
            <a href="#cara-booking">Cara Booking</a>
            <a href="#tentang">Tentang</a>
            <a href="#testimoni">Testimoni</a>
            <a href="#faq">FAQ</a>
        </nav>

        <a href="{{ route('booking.index') }}" class="gold-btn">
            Booking Sekarang <span>→</span>
        </a>

        <button class="mobile-menu-btn" id="menuBtn" aria-label="Menu">☰</button>
    </div>

    <div id="mobileNav" class="hidden bg-[#f7f4ed] border-t border-[#e7e0d4]">
        <div class="container py-4">
            <a class="block py-2 text-sm" href="#home">Home</a>
            <a class="block py-2 text-sm" href="#layanan">Layanan</a>
            <a class="block py-2 text-sm" href="#barber">Barber</a>
            <a class="block py-2 text-sm" href="#cara-booking">Cara Booking</a>
            <a class="block py-2 text-sm" href="#tentang">Tentang</a>
            <a class="block py-2 text-sm" href="#testimoni">Testimoni</a>
            <a class="block py-2 text-sm" href="#faq">FAQ</a>
            <a href="{{ route('booking.index') }}" class="gold-btn mt-3 w-full">Booking Sekarang →</a>
        </div>
    </div>
</header>


{{-- =========================================================
     HERO
========================================================= --}}
<section id="home" class="hero">
    <div class="container hero-grid">

        <div class="reveal">
            <div class="eyebrow">
                Premium service for your best style <span></span>
            </div>

            <h1>
                Gaya terbaik<br>
                <em>dimulai dari</em><br>
                sini.
            </h1>

            <p class="hero-copy">
                Nikmati layanan grooming premium dengan sentuhan profesional
                untuk penampilan terbaik setiap hari. Pilih layanan, barber,
                dan waktu yang paling nyaman untuk kamu.
            </p>

            <div class="hero-actions">
                <a href="{{ route('booking.index') }}" class="gold-btn">
                    Booking Sekarang <span>→</span>
                </a>

                <a href="#layanan" class="outline-btn">
                    Lihat Semua Layanan <span>→</span>
                </a>
            </div>

            <div class="hero-stats">
                <div class="stat">
                    <div class="stat-icon">✓</div>
                    <div>
                        <strong>100%</strong>
                        <small>Hasil Memuaskan</small>
                    </div>
                </div>

                <div class="stat">
                    <div class="stat-icon">♟</div>
                    <div>
                        <strong>{{ isset($barbers) ? $barbers->count() : 0 }}+</strong>
                        <small>Barber Profesional</small>
                    </div>
                </div>

                <div class="stat">
                    <div class="stat-icon">✂</div>
                    <div>
                        <strong>{{ isset($services) ? $services->count() : 0 }}+</strong>
                        <small>Layanan Grooming</small>
                    </div>
                </div>

                <div class="stat">
                    <div class="stat-icon">★</div>
                    <div>
                        <strong>Premium</strong>
                        <small>Produk Berkualitas</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="hero-visual reveal delay-2">
            <div class="orbit"></div>
            <div class="orbit two"></div>

            <div class="photo-frame"></div>

            {{-- FOTO YANG SUDAH ADA DI storage/app/public/barbers/barber.png --}}
            <img
                src="{{ asset('storage/barbers/barber.png') }}"
                alt="Barber Grooming Studio"
                class="hero-photo"
                onerror="this.style.display='none';document.getElementById('heroFallback').style.display='flex';"
            >

            <div id="heroFallback"
                 style="display:none"
                 class="hero-photo items-center justify-center text-center bg-gradient-to-br from-[#e9e0d1] to-[#cfc1ad]">
                <div>
                    <div class="mx-auto mb-4 grid h-20 w-20 place-items-center rounded-full bg-white text-3xl text-[#bd842b] shadow-lg">✂</div>
                    <strong class="text-lg">BARBER. GROOMING STUDIO</strong>
                    <p class="mt-2 text-xs text-[#81786d]">Premium grooming experience</p>
                </div>
            </div>

            <div class="floating-card top">
                <div class="mini-label">Buka setiap hari</div>
                <strong>08.00 — 21.00</strong>
            </div>

            <div class="floating-card bottom gold">
                <div class="mini-label">Pelanggan puas</div>
                <strong>500+ Customer</strong>
            </div>
        </div>

    </div>
</section>


{{-- =========================================================
     SERVICES
========================================================= --}}
<section id="layanan" class="section services-wrap">
    <div class="container">

        <div class="section-head reveal">
            <div>
                <div class="section-number">01 / Layanan kami</div>
                <h2 class="section-title">
                    Berbagai layanan <span>untuk<br>gaya terbaikmu.</span>
                </h2>
            </div>

            <div>
                <p class="section-desc">
                    Pilih layanan yang kamu butuhkan. Harga ditampilkan sebelum
                    booking supaya semuanya jelas sejak awal.
                </p>
                <a href="{{ route('booking.index') }}" class="outline-btn mt-4">
                    Lihat Semua Layanan →
                </a>
            </div>
        </div>

        @if(isset($services) && $services->count())
            <div class="service-grid">
                @foreach($services as $index => $service)
                    <article class="service-card reveal delay-{{ ($index % 3) + 1 }}">
                        <div class="service-number">
                            {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                        </div>

                        <div class="service-icon">✂</div>

                        <div class="section-number" style="font-size:8px;margin-bottom:8px">
                            Barber Service
                        </div>

                        <h3>{{ $service->name }}</h3>

                        <p>
                            {{ $service->description ?: 'Layanan grooming profesional dengan hasil rapi dan nyaman.' }}
                        </p>

                        <div class="service-meta">
                            <div>
                                <small>Mulai dari</small>
                                <div class="service-price">
                                    Rp {{ number_format($service->price ?? 0, 0, ',', '.') }}
                                </div>
                            </div>

                            <div class="service-duration">
                                ◷ {{ $service->duration ?? 0 }} menit
                            </div>
                        </div>

                        <a href="{{ route('booking.index') }}" class="service-action">
                            Pilih Layanan&nbsp; ↗
                        </a>
                    </article>
                @endforeach
            </div>
        @else
            <div class="rounded-[22px] border border-[#e5ddd0] bg-white py-24 text-center shadow-sm">
                <div class="text-4xl">✂</div>
                <h3 class="mt-4 text-xl font-bold">Layanan belum tersedia</h3>
                <p class="mt-2 text-sm text-[#888078]">
                    Data layanan akan muncul di sini.
                </p>
            </div>
        @endif

    </div>
</section>


{{-- =========================================================
     EXPERIENCE / CARA BOOKING
========================================================= --}}
<section id="cara-booking" class="section experience">
    <div class="container experience-grid">

        <div class="reveal">
            <div class="section-number">02 / Pengalaman mudah</div>

            <h2 class="mt-4">
                Booking tanpa<br>
                <span>ribet.</span>
            </h2>

            <p class="mt-6">
                Tidak perlu datang dan menunggu tanpa kepastian.
                Tentukan pilihanmu dari rumah, lalu datang sesuai jadwal.
            </p>

            <a href="{{ route('booking.index') }}" class="gold-btn mt-7">
                Mulai Booking →
            </a>
        </div>

        <div class="steps reveal delay-2">

            <div class="step">
                <div class="step-num">01</div>
                <div>
                    <h3>Pilih layanan</h3>
                    <p>Tentukan haircut atau grooming yang paling sesuai dengan kebutuhanmu.</p>
                </div>
            </div>

            <div class="step">
                <div class="step-num">02</div>
                <div>
                    <h3>Pilih barber & waktu</h3>
                    <p>Pilih barber favorit dan jadwal yang tersedia sesuai kenyamananmu.</p>
                </div>
            </div>

            <div class="step">
                <div class="step-num">03</div>
                <div>
                    <h3>Datang sesuai jadwal</h3>
                    <p>Tunjukkan detail booking dan nikmati layanan tanpa perlu menunggu lama.</p>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- =========================================================
     BARBERS
========================================================= --}}
<section id="barber" class="section">
    <div class="container">

        <div class="section-head reveal">
            <div>
                <div class="section-number">03 / Barber profesional</div>
                <h2 class="section-title">
                    Kenalan dengan <span>barber kami.</span>
                </h2>
            </div>

            <p class="section-desc">
                Pilih barber yang kamu percaya untuk membuat gaya kamu
                menjadi lebih rapi dan percaya diri.
            </p>
        </div>

        @if(isset($barbers) && $barbers->count())
            <div class="barber-grid">
                @foreach($barbers as $index => $barber)
                    <article class="barber-card reveal delay-{{ ($index % 3) + 1 }}">

                        <div class="barber-photo">
                            @if(!empty($barber->photo))
                                <img
                                    src="{{ asset('storage/' . $barber->photo) }}"
                                    alt="{{ $barber->name }}"
                                    onerror="this.style.display='none';this.nextElementSibling.style.display='flex';"
                                >
                                <div class="hidden h-full w-full items-center justify-center text-6xl text-[#a7762e]">
                                    ✂
                                </div>
                            @else
                                <div class="flex h-full w-full items-center justify-center text-6xl text-[#a7762e]">
                                    ✂
                                </div>
                            @endif

                            <div class="barber-tag">
                                BARBER {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                            </div>
                        </div>

                        <div class="barber-info">
                            <h3>{{ $barber->name }}</h3>
                            <div class="barber-role">Professional Barber</div>

                            <div class="barber-bottom">
                                <div class="rating">★ 5.0 / Professional</div>

                                <a href="{{ route('booking.index') }}" class="mini-btn">
                                    Booking →
                                </a>
                            </div>
                        </div>

                    </article>
                @endforeach
            </div>
        @else
            <div class="rounded-[22px] border border-[#e5ddd0] bg-white py-24 text-center">
                <div class="text-4xl">✂</div>
                <h3 class="mt-4 text-xl font-bold">Barber belum tersedia</h3>
                <p class="mt-2 text-sm text-[#888078]">
                    Data barber aktif akan muncul di sini.
                </p>
            </div>
        @endif

    </div>
</section>


{{-- =========================================================
     TENTANG
========================================================= --}}
<section id="tentang" class="section bg-[#f0eadf]">
    <div class="container">
        <div class="grid items-center gap-14 md:grid-cols-2">

            <div class="reveal">
                <div class="section-number">04 / Tentang kami</div>

                <h2 class="section-title mt-3">
                    Lebih dari sekadar<br>
                    <span>potong rambut.</span>
                </h2>
            </div>

            <div class="reveal delay-2">
                <p class="text-sm leading-8 text-[#777168]">
                    BARBER. Grooming Studio hadir untuk memberikan pengalaman
                    grooming yang nyaman, profesional, dan mudah. Kami percaya
                    penampilan yang rapi bukan hanya soal rambut, tetapi juga
                    tentang rasa percaya diri.
                </p>

                <div class="mt-7 grid grid-cols-2 gap-3">
                    <div class="rounded-2xl border border-[#dfd4c3] bg-white/70 p-5">
                        <div class="text-2xl font-extrabold">500+</div>
                        <div class="mt-1 text-[10px] text-[#91897d]">Pelanggan puas</div>
                    </div>

                    <div class="rounded-2xl border border-[#dfd4c3] bg-white/70 p-5">
                        <div class="text-2xl font-extrabold">{{ isset($barbers) ? $barbers->count() : 0 }}+</div>
                        <div class="mt-1 text-[10px] text-[#91897d]">Barber profesional</div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- =========================================================
     TESTIMONI
========================================================= --}}
<section id="testimoni" class="section">
    <div class="container">

        <div class="section-head reveal">
            <div>
                <div class="section-number">05 / Testimoni</div>
                <h2 class="section-title">
                    Mereka sudah <span>coba.</span>
                </h2>
            </div>

            <p class="section-desc">
                Pengalaman pelanggan adalah bagian penting dari standar layanan kami.
            </p>
        </div>

        <div class="grid gap-4 md:grid-cols-3">

            <div class="reveal rounded-[22px] border border-[#e7dfd3] bg-white p-7">
                <div class="text-[#b77b25]">★★★★★</div>
                <p class="mt-5 text-sm leading-7 text-[#716b63]">
                    “Booking-nya gampang banget. Tinggal pilih layanan,
                    barber, dan jam. Datang langsung dilayani.”
                </p>
                <div class="mt-7 text-xs font-bold">Andi Pratama</div>
                <div class="mt-1 text-[9px] text-[#9a9287]">Customer</div>
            </div>

            <div class="reveal delay-1 rounded-[22px] border border-[#e7dfd3] bg-white p-7">
                <div class="text-[#b77b25]">★★★★★</div>
                <p class="mt-5 text-sm leading-7 text-[#716b63]">
                    “Barber-nya profesional dan hasil fade-nya sesuai
                    request. Tempatnya juga nyaman.”
                </p>
                <div class="mt-7 text-xs font-bold">Dimas Saputra</div>
                <div class="mt-1 text-[9px] text-[#9a9287]">Customer</div>
            </div>

            <div class="reveal delay-2 rounded-[22px] border border-[#e7dfd3] bg-white p-7">
                <div class="text-[#b77b25]">★★★★★</div>
                <p class="mt-5 text-sm leading-7 text-[#716b63]">
                    “Harga jelas dari awal dan proses booking cepat.
                    Cocok buat yang tidak suka antre lama.”
                </p>
                <div class="mt-7 text-xs font-bold">Raka Wijaya</div>
                <div class="mt-1 text-[9px] text-[#9a9287]">Customer</div>
            </div>

        </div>
    </div>
</section>


{{-- =========================================================
     FAQ
========================================================= --}}
<section id="faq" class="section bg-[#fbf9f5]">
    <div class="container">

        <div class="mx-auto max-w-2xl text-center reveal">
            <div class="section-number">06 / FAQ</div>
            <h2 class="section-title mt-3">Pertanyaan <span>umum.</span></h2>
            <p class="mx-auto mt-4 max-w-xl text-sm leading-7 text-[#817a70]">
                Beberapa hal yang paling sering ditanyakan sebelum booking.
            </p>
        </div>

        <div class="faq mt-12">

            <div class="faq-item reveal">
                <button class="faq-q">
                    Apakah saya harus booking terlebih dahulu?
                    <span class="faq-icon">+</span>
                </button>
                <div class="faq-answer">
                    <div>
                        Sebaiknya booking terlebih dahulu agar kamu bisa mendapatkan
                        jadwal dan barber sesuai pilihan tanpa harus menunggu lama.
                    </div>
                </div>
            </div>

            <div class="faq-item reveal">
                <button class="faq-q">
                    Bagaimana cara memilih barber?
                    <span class="faq-icon">+</span>
                </button>
                <div class="faq-answer">
                    <div>
                        Saat proses booking, kamu dapat memilih barber yang tersedia
                        dan menyesuaikannya dengan jadwal yang kamu inginkan.
                    </div>
                </div>
            </div>

            <div class="faq-item reveal">
                <button class="faq-q">
                    Apakah harga sudah terlihat sebelum booking?
                    <span class="faq-icon">+</span>
                </button>
                <div class="faq-answer">
                    <div>
                        Ya. Harga setiap layanan ditampilkan pada halaman ini dan
                        akan terlihat sebelum kamu menyelesaikan booking.
                    </div>
                </div>
            </div>

            <div class="faq-item reveal">
                <button class="faq-q">
                    Bagaimana cara mengecek booking saya?
                    <span class="faq-icon">+</span>
                </button>
                <div class="faq-answer">
                    <div>
                        Gunakan menu Cek Booking untuk melihat detail booking yang
                        sudah dibuat.
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- =========================================================
     FINAL CTA
========================================================= --}}
<section class="cta">
    <div class="container reveal">
        <div class="section-number">Ready for your next look?</div>

        <h2>
            Saatnya tampil lebih <span class="text-[#bd842b]">rapi.</span>
        </h2>

        <p>
            Pilih layanan, tentukan barber, atur waktu.
            Sisanya biarkan kami yang mengurus.
        </p>

        <a href="{{ route('booking.index') }}" class="gold-btn">
            Booking Sekarang <span>→</span>
        </a>
    </div>
</section>


{{-- =========================================================
     FOOTER
========================================================= --}}
<footer>
    <div class="container">

        <div class="footer-grid">

            <div class="footer-brand">
                <a href="{{ route('home') }}" class="brand">
                    <div class="brand-mark">✂</div>
                    <div>
                        BARBER.
                        <small style="color:#777">GROOMING STUDIO</small>
                    </div>
                </a>

                <p>
                    Premium grooming experience untuk penampilan terbaik
                    setiap hari. Booking lebih mudah, datang lebih tenang.
                </p>
            </div>

            <div>
                <h4>Navigation</h4>
                <a href="#home">Home</a>
                <a href="#layanan">Layanan</a>
                <a href="#barber">Barber</a>
                <a href="#tentang">Tentang</a>
            </div>

            <div>
                <h4>Booking</h4>
                <a href="{{ route('booking.index') }}">Booking Sekarang</a>
                <a href="{{ route('booking.check') }}">Cek Booking</a>
                <a href="#cara-booking">Cara Booking</a>
                <a href="#faq">FAQ</a>
            </div>

            <div>
                <h4>Contact</h4>
                <a href="#">08xx-xxxx-xxxx</a>
                <a href="#">Instagram</a>
                <a href="#">WhatsApp</a>
                <a href="#">Purwokerto</a>
            </div>

        </div>

        <div class="copyright">
            <div>© {{ date('Y') }} BARBER. Grooming Studio. All rights reserved.</div>
            <div>Book your style. Own your look.</div>
        </div>

    </div>
</footer>


<a href="{{ route('booking.index') }}" class="mobile-book">
    ✂ &nbsp; Booking Sekarang &nbsp; →
</a>


<script>
    /* NAVBAR */
    const navbar = document.getElementById('navbar');

    window.addEventListener('scroll', () => {
        navbar.classList.toggle('scrolled', window.scrollY > 25);
    });

    /* MOBILE MENU */
    const menuBtn = document.getElementById('menuBtn');
    const mobileNav = document.getElementById('mobileNav');

    menuBtn.addEventListener('click', () => {
        mobileNav.classList.toggle('hidden');
    });

    mobileNav.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            mobileNav.classList.add('hidden');
        });
    });

    /* FAQ */
    document.querySelectorAll('.faq-q').forEach(button => {
        button.addEventListener('click', () => {
            const item = button.closest('.faq-item');

            document.querySelectorAll('.faq-item').forEach(other => {
                if (other !== item) other.classList.remove('open');
            });

            item.classList.toggle('open');
        });
    });

    /* SCROLL REVEAL */
    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('show');
                revealObserver.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.12
    });

    document.querySelectorAll('.reveal').forEach(el => {
        revealObserver.observe(el);
    });

    /* CURSOR GLOW */
    const cursorGlow = document.getElementById('cursorGlow');

    if (cursorGlow && window.matchMedia('(pointer:fine)').matches) {
        window.addEventListener('mousemove', e => {
            cursorGlow.style.left = e.clientX + 'px';
            cursorGlow.style.top = e.clientY + 'px';
        });
    }

    /* HERO PARALLAX */
    const heroPhoto = document.querySelector('.hero-photo');

    if (heroPhoto && window.matchMedia('(pointer:fine)').matches) {
        const visual = document.querySelector('.hero-visual');

        visual.addEventListener('mousemove', e => {
            const rect = visual.getBoundingClientRect();
            const x = (e.clientX - rect.left) / rect.width - .5;
            const y = (e.clientY - rect.top) / rect.height - .5;

            heroPhoto.style.transform =
                `rotate(${2 + x * 3}deg) translate(${x * 8}px, ${y * 8}px)`;
        });

        visual.addEventListener('mouseleave', () => {
            heroPhoto.style.transform = 'rotate(2deg)';
        });
    }
</script>

</body>
</html>
