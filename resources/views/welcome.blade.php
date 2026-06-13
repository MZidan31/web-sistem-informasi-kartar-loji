<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIKT Karang Taruna Loji</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;700;900&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        display: ['"Outfit"', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            navy: '#0f172a',
                            orange: '#ea580c',
                            light: '#f8fafc',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body {
            background-color: #ffffff;
        }

        .wavy-underline {
            position: relative;
            display: inline-block;
        }

        .wavy-underline::after {
            content: '';
            position: absolute;
            left: 50%;
            bottom: -10px;
            transform: translateX(-50%);
            width: 100px;
            height: 10px;
            background: radial-gradient(circle at 10px 15px, transparent 12px, #ea580c 13px, #ea580c 15px, transparent 16px) repeat-x;
            background-size: 20px 20px;
            background-position: -10px -10px;
            opacity: 0.5;
        }

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>

<body class="text-brand-navy antialiased">

    <div class="fixed w-full top-0 z-40 pt-4 md:pt-6 px-4">
        <nav
            class="max-w-6xl mx-auto bg-white/95 backdrop-blur-lg shadow-xl shadow-gray-200/60 border border-gray-200/80 rounded-3xl md:rounded-full px-4 md:px-8 py-3 md:py-4 relative transition-all">
            <div class="flex items-center justify-between w-full">
                <div class="flex items-center gap-2 md:gap-3">
                    <a href="#"
                        class="flex items-center gap-2 md:gap-3 drop-shadow-sm hover:drop-shadow-md transition-all group">
                        <img src="{{ asset('logo-ipl.jpeg') }}" alt="Logo IPL Loji 005"
                            class="h-8 md:h-10 w-auto mix-blend-multiply group-hover:rotate-3 group-hover:scale-105 transition-all duration-300">
                        <div class="flex flex-col justify-center">
                            <span
                                class="text-base md:text-lg lg:text-xl font-display font-black tracking-tight text-brand-navy leading-none">SIKT</span>
                            <span
                                class="text-[8px] md:text-[10px] lg:text-xs font-bold text-brand-orange uppercase tracking-widest mt-0.5">Karang
                                Taruna</span>
                        </div>
                    </a>
                </div>

                <div class="hidden md:flex items-center gap-8 text-sm font-semibold">
                    <a href="#" class="text-brand-orange">Home</a>
                    <a href="#portfolio" class="text-gray-500 hover:text-brand-navy transition">Portfolio</a>
                    <a href="#about" class="text-gray-500 hover:text-brand-navy transition">About Us</a>
                </div>

                <div class="flex items-center gap-3">
                    <a href="/admin/login"
                        class="hidden md:inline-block bg-brand-navy text-white px-5 py-2.5 rounded-full hover:bg-brand-orange transition shadow-md text-sm font-semibold">
                        Login Pengurus
                    </a>

                    <button id="mobileMenuBtn"
                        class="md:hidden text-brand-navy p-2 focus:outline-none hover:bg-gray-100 rounded-xl transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <div id="mobileMenu" class="hidden md:hidden flex-col gap-4 pt-4 mt-4 border-t border-gray-100 pb-2">
                <a href="#" class="text-brand-orange font-bold text-sm">Home</a>
                <a href="#portfolio" class="text-gray-600 font-semibold hover:text-brand-navy text-sm">Portfolio</a>
                <a href="#about" class="text-gray-600 font-semibold hover:text-brand-navy text-sm">About Us</a>
                <a href="/admin/login"
                    class="bg-brand-navy text-white text-center px-4 py-2 rounded-full hover:bg-brand-orange transition shadow-md text-sm font-bold mt-2">
                    Login Pengurus
                </a>
            </div>
        </nav>
    </div>

    <section class="relative pt-28 pb-16 lg:pt-36 lg:pb-32 overflow-hidden">
        <div
            class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-center">
            <div class="relative z-10 text-center lg:text-left mt-4 lg:mt-0">
                <div class="inline-block bg-orange-50 border border-orange-100 px-4 py-1.5 rounded-full mb-4 md:mb-6">
                    <span class="text-brand-orange text-[10px] md:text-xs font-bold tracking-widest uppercase">Portal
                        Transparansi Publik</span>
                </div>
                <h1
                    class="text-4xl sm:text-5xl lg:text-6xl font-display font-black leading-[1.1] tracking-tight mb-4 md:mb-6 text-brand-navy">
                    Inovasi <span class="text-brand-orange">Masyarakat</span> <br class="hidden lg:block" /> & Kegiatan
                    Loji
                </h1>
                <p class="text-gray-500 text-base md:text-lg mb-8 max-w-lg mx-auto lg:mx-0 leading-relaxed font-medium">
                    Platform digital terpadu untuk mendata, memvalidasi, dan mempublikasikan seluruh pergerakan nyata
                    dari pemuda dan masyarakat Loji.
                </p>
                <div class="flex items-center justify-center lg:justify-start gap-4 mb-8">
                    <a href="#portfolio"
                        class="bg-brand-orange text-white px-6 md:px-8 py-3 rounded-full font-bold shadow-lg shadow-orange-500/30 hover:bg-orange-700 hover:-translate-y-1 transition-all text-sm md:text-base">
                        Eksplorasi Program
                    </a>
                </div>

                <div class="grid grid-cols-3 gap-2 sm:gap-4 lg:gap-6 border-t border-gray-100 pt-6 mt-4">
                    <div
                        class="bg-white/60 backdrop-blur-sm border border-gray-100 p-3 sm:p-5 rounded-2xl shadow-sm hover:shadow-md transition-all group flex flex-col items-center lg:items-start text-center lg:text-left">
                        <h3
                            class="text-2xl sm:text-4xl font-display font-black text-brand-navy group-hover:text-brand-orange transition-colors">
                            {{ $inovasis->count() + $kegiatans->count() }}
                        </h3>
                        <p
                            class="text-[8px] sm:text-[10px] text-gray-500 font-bold uppercase tracking-widest mt-1 sm:mt-2 flex items-center justify-center lg:justify-start gap-1 sm:gap-2">
                            <span
                                class="w-1.5 h-1.5 sm:w-2 sm:h-2 rounded-full bg-brand-navy group-hover:bg-brand-orange transition-colors"></span>
                            Total
                        </p>
                    </div>
                    <div
                        class="bg-white/60 backdrop-blur-sm border border-gray-100 p-3 sm:p-5 rounded-2xl shadow-sm hover:shadow-md transition-all group flex flex-col items-center lg:items-start text-center lg:text-left">
                        <h3
                            class="text-2xl sm:text-4xl font-display font-black text-brand-navy group-hover:text-brand-orange transition-colors">
                            {{ $inovasis->count() }}
                        </h3>
                        <p
                            class="text-[8px] sm:text-[10px] text-gray-500 font-bold uppercase tracking-widest mt-1 sm:mt-2 flex items-center justify-center lg:justify-start gap-1 sm:gap-2">
                            <span class="w-1.5 h-1.5 sm:w-2 sm:h-2 rounded-full bg-brand-orange"></span> Inovasi
                        </p>
                    </div>
                    <div
                        class="bg-white/60 backdrop-blur-sm border border-gray-100 p-3 sm:p-5 rounded-2xl shadow-sm hover:shadow-md transition-all group flex flex-col items-center lg:items-start text-center lg:text-left">
                        <h3
                            class="text-2xl sm:text-4xl font-display font-black text-brand-navy group-hover:text-brand-orange transition-colors">
                            {{ $kegiatans->count() }}
                        </h3>
                        <p
                            class="text-[8px] sm:text-[10px] text-gray-500 font-bold uppercase tracking-widest mt-1 sm:mt-2 flex items-center justify-center lg:justify-start gap-1 sm:gap-2">
                            <span class="w-1.5 h-1.5 sm:w-2 sm:h-2 rounded-full bg-green-500"></span> Kegiatan
                        </p>
                    </div>
                </div>
            </div>

            <div class="relative hidden lg:flex justify-center items-center">
                <div class="absolute w-[500px] h-[500px] bg-brand-orange/5 rounded-full blur-3xl -z-10"></div>
                <div
                    class="bg-white rounded-[2.5rem] shadow-2xl border border-gray-50 w-[380px] h-[380px] overflow-hidden transform rotate-2 hover:rotate-0 transition duration-500 group relative">
                    <img src="{{ asset('sikt-hub-img.jpg') }}" alt="SIKT Hub"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
            </div>
        </div>
    </section>

    <section id="portfolio" class="py-16 md:py-24 bg-gray-50/50 border-y border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 text-center mb-10 md:mb-16">
            <h2
                class="text-3xl md:text-4xl font-display font-black text-brand-navy wavy-underline pb-4 inline-block mb-8 md:mb-12">
                Program & Inovasi</h2>

            <div class="flex flex-wrap justify-center gap-2 md:gap-3 text-xs md:text-sm font-bold max-w-2xl mx-auto">
                <button onclick="filterSelection('all')" id="btn-all"
                    class="filter-btn text-white bg-brand-navy px-4 md:px-6 py-2 md:py-2.5 rounded-full shadow-md transition">Semua</button>
                <button onclick="filterSelection('inovasi')" id="btn-inovasi"
                    class="filter-btn text-brand-navy hover:bg-gray-200 bg-gray-100 px-4 md:px-6 py-2 md:py-2.5 rounded-full transition">Inovasi
                    Masyarakat</button>
                <button onclick="filterSelection('kegiatan')" id="btn-kegiatan"
                    class="filter-btn text-brand-navy hover:bg-gray-200 bg-gray-100 px-4 md:px-6 py-2 md:py-2.5 rounded-full transition">Kegiatan</button>
            </div>
        </div>

        <div
            class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">

            @forelse ($inovasis as $inovasi)
                @php
                    $adaFotoIno = $inovasi->fotoInovasis && $inovasi->fotoInovasis->count() > 0;
                    $imageUrlsInovasi = [];
                    if ($adaFotoIno) {
                        foreach ($inovasi->fotoInovasis as $foto) {
                            $imageUrlsInovasi[] = \Storage::url($foto->file_path);
                        }
                    } else {
                        $imageUrlsInovasi[] =
                            'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&q=80&w=600';
                    }
                    $jsonImagesIno = json_encode($imageUrlsInovasi);
                    $imgInovasi = $imageUrlsInovasi[0];
                @endphp
                <div class="portfolio-item inovasi bg-white rounded-3xl overflow-hidden shadow-sm border border-gray-200 hover:shadow-xl transition-all duration-300 cursor-pointer group flex flex-col"
                    onclick="openModal(this)" data-title="{{ $inovasi->judul }}"
                    data-desc="{{ $inovasi->deskripsi }}"
                    data-date="{{ \Carbon\Carbon::parse($inovasi->tanggal_diajukan)->format('d M Y') }}"
                    data-user="{{ $inovasi->user->name ?? 'Anonim' }}" data-type="INOVASI"
                    data-img="{{ $imgInovasi }}" data-images="{{ $jsonImagesIno }}">

                    <div class="h-48 overflow-hidden relative bg-brand-navy flex items-center justify-center">
                        <img src="{{ $imgInovasi }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition duration-700 {{ !$adaFotoIno ? 'opacity-60' : '' }}"
                            alt="Inovasi">
                        <p
                            class="absolute bottom-4 left-4 md:left-5 text-[10px] font-bold text-white bg-brand-orange px-3 py-1.5 rounded-md uppercase tracking-widest shadow-md">
                            INOVASI</p>
                    </div>

                    <div class="p-5 md:p-6 flex-grow flex flex-col">
                        <h3
                            class="text-lg md:text-xl font-display font-bold text-brand-navy mb-2 md:mb-3 line-clamp-2 group-hover:text-brand-orange transition">
                            {{ $inovasi->judul }}</h3>
                        <p class="text-xs md:text-sm text-gray-500 mb-4 md:mb-6 line-clamp-2 font-medium flex-grow">
                            {{ $inovasi->deskripsi }}</p>
                        <div class="border-t border-gray-100 pt-4 mt-auto text-xs text-gray-500 font-medium">
                            Pengusul: <span
                                class="font-bold text-brand-navy">{{ $inovasi->user->name ?? 'Anonim' }}</span>
                        </div>
                    </div>
                </div>
            @empty
            @endforelse

            @forelse ($kegiatans as $kegiatan)
                @php
                    $adaFotoKeg = $kegiatan->fotoKegiatans && $kegiatan->fotoKegiatans->count() > 0;
                    $imageUrlsKegiatan = [];
                    if ($adaFotoKeg) {
                        foreach ($kegiatan->fotoKegiatans as $foto) {
                            $imageUrlsKegiatan[] = \Storage::url($foto->file_path);
                        }
                    } else {
                        $imageUrlsKegiatan[] =
                            'https://images.unsplash.com/photo-1542810634-71277d95dc82?auto=format&fit=crop&q=80&w=600';
                    }
                    $jsonImagesKeg = json_encode($imageUrlsKegiatan);
                    $imgKegiatan = $imageUrlsKegiatan[0];
                @endphp
                <div class="portfolio-item kegiatan bg-white rounded-3xl overflow-hidden shadow-sm border border-gray-200 hover:shadow-xl transition-all duration-300 cursor-pointer group flex flex-col"
                    onclick="openModal(this)" data-title="{{ $kegiatan->judul }}"
                    data-desc="{{ $kegiatan->deskripsi }}"
                    data-date="{{ \Carbon\Carbon::parse($kegiatan->tanggal_berjalan)->format('d M Y') }}"
                    data-user="{{ $kegiatan->user->name ?? 'Anonim' }}" data-type="KEGIATAN"
                    data-img="{{ $imgKegiatan }}" data-images="{{ $jsonImagesKeg }}">

                    <div class="h-48 overflow-hidden relative bg-brand-navy flex items-center justify-center">
                        <img src="{{ $imgKegiatan }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition duration-700 {{ !$adaFotoKeg ? 'opacity-60' : '' }}"
                            alt="Kegiatan">
                        <p
                            class="absolute bottom-4 left-4 md:left-5 text-[10px] font-bold text-white bg-green-500 px-3 py-1.5 rounded-md uppercase tracking-widest shadow-md">
                            KEGIATAN</p>
                    </div>

                    <div class="p-5 md:p-6 flex-grow flex flex-col">
                        <h3
                            class="text-lg md:text-xl font-display font-bold text-brand-navy mb-2 md:mb-3 line-clamp-2 group-hover:text-green-600 transition">
                            {{ $kegiatan->judul }}</h3>
                        <p class="text-xs md:text-sm text-gray-500 mb-4 md:mb-6 line-clamp-2 font-medium flex-grow">
                            {{ $kegiatan->deskripsi }}</p>
                        <div
                            class="border-t border-gray-100 pt-4 mt-auto text-xs text-green-600 font-bold flex items-center gap-1.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 002-2H5a2 2 0 002-2V5a2 2 0 002 2H5V5v14a2 2 0 002 2z">
                                </path>
                            </svg>
                            {{ \Carbon\Carbon::parse($kegiatan->tanggal_berjalan)->format('d M Y') }}
                        </div>
                    </div>
                </div>
            @empty
            @endforelse
        </div>
    </section>

    <div id="detailModal"
        class="fixed inset-0 z-50 flex items-center justify-center hidden opacity-0 transition-opacity duration-300 px-4">
        <div class="absolute inset-0 bg-brand-navy/90 backdrop-blur-sm" onclick="closeModal()"></div>
        <div class="bg-white rounded-[2rem] shadow-2xl w-full max-w-3xl max-h-[85vh] md:max-h-[90vh] overflow-y-auto no-scrollbar relative z-10 transform scale-95 transition-transform duration-300 flex flex-col"
            id="modalContent">

            <button onclick="closeModal()"
                class="absolute top-4 right-4 bg-white/50 backdrop-blur-md text-brand-navy rounded-full p-2 shadow-lg hover:scale-110 transition z-20">
                <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>

            <div class="relative h-48 md:h-72 shrink-0">
                <img id="modalImg" src="" class="w-full h-full object-cover transition-all duration-300"
                    alt="Cover">
                <div class="absolute inset-x-0 bottom-0 h-1/3 bg-gradient-to-t from-white to-transparent"></div>
            </div>

            <div id="modalGallery"
                class="flex gap-2 md:gap-3 px-6 md:px-8 mt-[-1.5rem] relative z-30 overflow-x-auto no-scrollbar py-4 md:py-6 hidden items-center shrink-0">
            </div>

            <div class="px-6 md:px-8 pb-8 pt-2 relative z-10">
                <span id="modalType"
                    class="text-[10px] font-bold text-brand-orange bg-orange-50 border border-orange-100 px-3 py-1 rounded-md uppercase tracking-widest mb-3 md:mb-4 inline-block"></span>
                <h2 id="modalTitle"
                    class="text-2xl md:text-3xl font-display font-black text-brand-navy mb-4 leading-tight"></h2>

                <div
                    class="flex flex-col md:flex-row flex-wrap gap-2 md:gap-6 border-y border-gray-100 py-4 mb-5 md:mb-6 bg-gray-50/50 px-4 rounded-xl">
                    <div class="flex items-center gap-2 text-xs md:text-sm text-gray-600 font-bold">
                        <span class="text-gray-400 font-medium">Oleh:</span> <span id="modalUser"></span>
                    </div>
                    <div class="hidden md:block w-px h-4 bg-gray-300"></div>
                    <div class="flex items-center gap-2 text-xs md:text-sm text-gray-600 font-bold md:pl-0">
                        <span class="text-gray-400 font-medium">Tanggal:</span> <span id="modalDate"></span>
                    </div>
                </div>

                <p id="modalDesc"
                    class="text-sm md:text-base text-gray-600 leading-relaxed font-medium whitespace-pre-line text-justify">
                </p>
            </div>
        </div>
    </div>

    <section id="about" class="py-16 md:py-24 bg-white relative overflow-hidden">
        <div class="absolute w-[600px] h-[600px] bg-brand-orange/5 rounded-full blur-3xl -top-40 -right-40 -z-10">
        </div>
        <div
            class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-center">
            <div class="relative order-first lg:order-none mb-8 lg:mb-0">
                <div
                    class="absolute inset-0 bg-brand-orange/10 rounded-[2rem] lg:rounded-[3rem] transform rotate-3 scale-105 -z-10">
                </div>
                <img src="{{ asset('about-us-img.jpg') }}" alt="Tentang Kami"
                    class="rounded-[2rem] lg:rounded-[3rem] shadow-2xl object-cover h-[250px] sm:h-[350px] lg:h-[450px] w-full border-4 border-white">
            </div>
            <div class="text-center lg:text-left">
                <h2
                    class="text-3xl md:text-4xl font-display font-black text-brand-navy wavy-underline pb-4 inline-block mb-6 md:mb-8">
                    About Us</h2>
                <h3 class="text-2xl md:text-3xl font-bold text-brand-navy mb-4 md:mb-5 leading-tight">Penggerak
                    Perubahan <br class="hidden sm:block" /><span class="text-brand-orange">Karang Taruna Loji</span>
                </h3>
                <p class="text-sm md:text-base text-gray-600 font-medium leading-relaxed mb-4 md:mb-6 text-justify">
                    Berawal dari semangat kebersamaan di lapangan hijau, <strong>Ikatan Pemuda Loji (IPL)</strong> lahir dari tim sepak bola kebanggaan lokal RT 05, <strong>PLODETA (Pertigaan Loji Desa Tangkil)</strong>. Semangat sportivitas inilah yang menginspirasi kami untuk menyatukan pemuda di wilayah RT 05 guna menciptakan generasi yang kompak, positif, dan adaptif di era modern.
                </p>
                <p class="text-sm md:text-base text-gray-600 font-medium leading-relaxed mb-4 md:mb-6 text-justify">
                    Resmi terbentuk pada tahun 2019, IPL langsung bergerak aktif menciptakan inisiatif berdampak nyata. Mulai dari program edukasi bahaya narkotika, peringatan hari besar (PHBI & PHBN), hingga inovasi sosial seperti pemberdayaan <strong>UMKM Lokal</strong> dan <strong>Bank Sampah</strong>.
                </p>
                <p class="text-sm md:text-base text-gray-600 font-medium leading-relaxed mb-6 md:mb-8 text-justify">
                    Semua langkah ini kami lakukan dengan satu tujuan utama: mempererat solidaritas, mewujudkan lingkungan yang positif dan kondusif, serta berperan aktif dalam mensejahterakan masyarakat RT 05. <strong>Mari bersama memajukan Loji!</strong>
                </p>
                <div class="flex justify-center lg:justify-start">
                    <div
                        class="flex items-center gap-4 bg-gray-50 px-4 py-3 rounded-2xl border border-gray-100 w-full sm:w-auto">
                        <div
                            class="w-10 h-10 rounded-xl bg-brand-orange/10 flex items-center justify-center text-brand-orange shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                </path>
                            </svg>
                        </div>
                        <div class="text-left">
                            <h4 class="font-bold text-brand-navy text-sm">Solidaritas</h4>
                            <p class="text-[10px] text-gray-500 font-bold uppercase tracking-widest mt-0.5">Pemuda Loji
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer
        class="bg-brand-navy text-white pt-12 md:pt-20 pb-6 md:pb-8 border-t-[6px] md:border-t-[8px] border-brand-orange">
        <div
            class="max-w-7xl mx-auto px-6 lg:px-12 grid grid-cols-1 md:grid-cols-12 gap-8 md:gap-12 mb-10 md:mb-16 text-center md:text-left">

            <div class="md:col-span-5 flex flex-col items-center md:items-start">
                <div class="flex items-center gap-3 md:gap-4 mb-4 md:mb-6">
                    <div class="bg-white p-1.5 md:p-2 rounded-xl md:rounded-2xl shadow-lg">
                        <img src="{{ asset('logo-ipl.jpeg') }}" alt="Logo IPL Loji"
                            class="h-8 md:h-[3.25rem] w-auto object-contain mix-blend-multiply">
                    </div>
                    <h3 class="font-display font-black text-xl md:text-3xl tracking-tight m-0">SIKT <span
                            class="text-brand-orange">Loji</span></h3>
                </div>
                <p
                    class="text-gray-400 text-xs md:text-sm leading-relaxed mb-6 px-4 md:px-0 text-center md:text-justify font-medium">
                    Sistem Informasi Karang Taruna (SIKT) Loji RT 005 merupakan platform digital yang menjadi pusat
                    transparansi dan validasi program. Kami memfasilitasi inovasi masyarakat secara terpadu.
                </p>
                <a href="https://www.instagram.com/pemuda_loji_05" target="_blank"
                    class="inline-flex items-center gap-2 text-xs md:text-sm font-bold text-brand-orange hover:text-white transition bg-white/5 md:bg-transparent px-4 py-2 md:p-0 rounded-full">
                    <svg class="w-4 h-4 md:w-5 md:h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                    </svg>
                    Follow Instagram Kami
                </a>
            </div>

            <div class="md:col-span-3 md:col-start-7 pt-4 md:pt-0 border-t border-gray-800 md:border-0">
                <h4 class="text-sm md:text-lg font-bold mb-3 md:mb-6 text-white">Tautan Pintas</h4>
                <ul class="space-y-2 md:space-y-4 text-xs md:text-sm text-gray-400 font-medium">
                    <li><a href="#" class="hover:text-brand-orange transition">Beranda</a></li>
                    <li><a href="#portfolio" class="hover:text-brand-orange transition">Eksplorasi Program</a></li>
                    <li><a href="/admin/login" class="hover:text-brand-orange transition">Portal Pengurus</a></li>
                </ul>
            </div>

            <div class="md:col-span-3 pt-4 md:pt-0 border-t border-gray-800 md:border-0">
                <h4 class="text-sm md:text-lg font-bold mb-3 md:mb-6 text-white">Hubungi Kami</h4>
                <ul
                    class="space-y-2 md:space-y-4 text-xs md:text-sm text-gray-400 font-medium flex flex-col items-center md:items-start">
                    <li class="flex items-start gap-2">
                        <svg class="w-4 h-4 text-brand-orange shrink-0 mt-0.5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span class="text-center md:text-left">Kp. Loji RT 005/001 Ds. Tangkil<br class="hidden md:block"/> Kec. Caringin Kab. Bogor - 16730</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-brand-orange shrink-0" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                        <a href="mailto:pemudaloji@gmail.com" class="hover:text-brand-orange transition">pemudaloji@gmail.com</a>
                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-brand-orange shrink-0" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        <a href="https://wa.me/6285691938589" target="_blank" class="hover:text-brand-orange transition">085691938589</a>
                    </li>
                </ul>
            </div>
        </div>

        <div
            class="max-w-7xl mx-auto px-6 border-t border-gray-800 pt-5 md:pt-8 flex flex-col md:flex-row justify-between items-center gap-2">
            <p class="text-[9px] md:text-xs text-gray-500 font-medium">&copy; 2026 SIKT Karang Taruna Loji</p>
            <p class="text-[9px] md:text-xs text-gray-600 font-bold tracking-widest uppercase">#TransparanDanInovatif
            </p>
        </div>
    </footer>

    <script>
        function filterSelection(c) {
            let items = document.getElementsByClassName("portfolio-item");
            let btns = document.getElementsByClassName("filter-btn");

            for (let i = 0; i < btns.length; i++) {
                btns[i].className =
                    "filter-btn text-brand-navy bg-gray-100 hover:bg-gray-200 px-4 md:px-6 py-2 md:py-2.5 rounded-full transition font-bold text-xs md:text-sm";
            }
            document.getElementById('btn-' + c).className =
                "filter-btn text-white bg-brand-navy px-4 md:px-6 py-2 md:py-2.5 rounded-full shadow-md transition font-bold text-xs md:text-sm";

            for (let i = 0; i < items.length; i++) {
                items[i].style.display = "none";
                if (c == "all") items[i].style.display = "flex";
                if (items[i].className.indexOf(c) > -1) items[i].style.display = "flex";
            }
        }

        const modal = document.getElementById('detailModal');
        const modalContent = document.getElementById('modalContent');

        function openModal(element) {
            document.getElementById('modalTitle').innerText = element.getAttribute('data-title');
            document.getElementById('modalDesc').innerText = element.getAttribute('data-desc');
            document.getElementById('modalDate').innerText = element.getAttribute('data-date');
            document.getElementById('modalUser').innerText = element.getAttribute('data-user');
            document.getElementById('modalType').innerText = element.getAttribute('data-type');

            // Amanin gambar (antisipasi kalau gallery gagal parse)
            let imgUtama = element.getAttribute('data-img');
            document.getElementById('modalImg').src = imgUtama;

            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                modalContent.classList.remove('scale-95');
                modalContent.classList.add('scale-100');
            }, 10);
            document.body.style.overflow = 'hidden';

            const imagesStr = element.getAttribute('data-images');
            let images = [];
            try {
                images = JSON.parse(imagesStr);
            } catch (e) {
                images = [imgUtama];
            }

            const modalImg = document.getElementById('modalImg');
            const galleryContainer = document.getElementById('modalGallery');

            if (images.length > 0) modalImg.src = images[0];
            galleryContainer.innerHTML = '';

            if (images.length > 1) {
                galleryContainer.classList.remove('hidden');
                images.forEach((url, index) => {
                    const thumb = document.createElement('img');
                    thumb.src = url;
                    thumb.className =
                        `w-14 h-14 md:w-16 md:h-16 shrink-0 rounded-xl object-cover cursor-pointer border-2 shadow-md transition-all hover:scale-105 hover:opacity-100 ${index === 0 ? 'border-brand-orange opacity-100' : 'border-white opacity-60'}`;

                    thumb.onclick = () => {
                        modalImg.src = url;
                        Array.from(galleryContainer.children).forEach(c => {
                            c.classList.remove('border-brand-orange', 'opacity-100');
                            c.classList.add('border-white', 'opacity-60');
                        });
                        thumb.classList.remove('border-white', 'opacity-60');
                        thumb.classList.add('border-brand-orange', 'opacity-100');
                    };
                    galleryContainer.appendChild(thumb);
                });
            } else {
                galleryContainer.classList.add('hidden');
            }
        }

        function closeModal() {
            modal.classList.add('opacity-0');
            modalContent.classList.remove('scale-100');
            modalContent.classList.add('scale-95');
            setTimeout(() => {
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }, 300);
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const btn = document.getElementById('mobileMenuBtn');
            const menu = document.getElementById('mobileMenu');
            const links = menu.querySelectorAll('a');

            btn.addEventListener('click', function() {
                menu.classList.toggle('hidden');
                menu.classList.toggle('flex');
            });

            // Tutup menu otomatis kalau user ngeklik link (Home/Portfolio/About Us)
            links.forEach(link => {
                link.addEventListener('click', () => {
                    menu.classList.add('hidden');
                    menu.classList.remove('flex');
                });
            });
        });
    </script>
</body>

</html>
