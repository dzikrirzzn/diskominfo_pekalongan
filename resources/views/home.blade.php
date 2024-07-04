<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Resmi Pemerintah Kota Pekalongan</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logopkl.png') }}" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js" defer></script>
</head>

<body class="flex flex-col min-h-screen bg-gray-100">
    <nav class="bg-yellow-600 p-2 relative z-50" x-data="{ isOpen: false, dropdownOpen: false }">
        <div class="container mx-auto flex justify-between items-center flex-wrap">
            <a href="{{ route('home') }}">
                <div class="text-white font-bold flex items-center">
                    <img src="{{ asset('img/logopkl.png') }}" alt="Logo" class="h-12 mr-3">
                    <div class="flex flex-col">
                        <div class="text-sm">Pemerintah</div>
                        <div class="text-sm">Kota Pekalongan</div>
                    </div>
                </div>
            </a>
            <button @click="isOpen = !isOpen" class="block lg:hidden">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path :class="{'hidden': isOpen, 'inline-flex': !isOpen }" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{'hidden': !isOpen, 'inline-flex': isOpen }" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <div :class="{'hidden': !isOpen, 'block': isOpen}" class="w-full lg:flex lg:items-center lg:w-auto">
                <ul class="lg:flex space-y-2 lg:space-y-0 lg:space-x-10">
                    <li class="relative group" x-data="{ open: false }">
                        <a href="#" class="block text-white hover:text-gray-200" @mouseenter="open = true"
                            @mouseleave="open = false">Sekilas</a>
                        <div x-show="open" @mouseenter="open = true" @mouseleave="open = false"
                            class="absolute left-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50"
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95">
                            <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    role="menuitem">Submenu 1</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    role="menuitem">Submenu 2</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    role="menuitem">Submenu 3</a>
                            </div>
                        </div>
                    </li>

                    <li><a href="#" class="block text-white hover:text-gray-200">Instansi</a></li>
                    <li><a href="#" class="block text-white hover:text-gray-200">Berita</a></li>
                    <li><a href="#" class="block text-white hover:text-gray-200">Informasi</a></li>
                    <li><a href="#" class="block text-white hover:text-gray-200">Kip / PPID</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="flex-1 relative z-0">
        <!-- Blade Template -->
        <div class="relative overflow-hidden h-[92vh]" x-data="{
        activeSlide: 1,
        slides: @json($headlineBerita),
        loop() {
            setInterval(() => {
                this.activeSlide = this.activeSlide === this.slides.length ? 1 : this.activeSlide + 1
            }, 5000)
        }
    }" x-init="loop()">
            <template x-for="slide in slides" :key="slide.id">
                <div x-show="activeSlide === slide.id"
                    class="w-full h-full flex items-center bg-slate-500 text-white absolute inset-0">
                    <div class="mx-auto p-8">
                        <h2 class="font-bold text-3xl mb-4" x-text="slide.title"></h2>
                        <p x-text="slide.subtitle" class="text-lg"></p>
                    </div>
                </div>
            </template>
            <div class="absolute inset-y-0 flex items-center justify-between w-full px-4">
                <button @click="activeSlide = activeSlide === 1 ? slides.length : activeSlide - 1"
                    class="bg-slate-100 hover:bg-yellow-500 hover:text-white font-bold rounded-full w-12 h-12 shadow flex justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-10 h-10 opacity-25">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button @click="activeSlide = activeSlide === slides.length ? 1 : activeSlide + 1"
                    class="bg-slate-100 hover:bg-yellow-500 hover:text-white font-bold rounded-full w-12 h-12 shadow flex justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-10 h-10 opacity-25">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
            <div class="absolute w-full flex items-center justify-center px-4 bottom-0">
                <template x-for="slide in slides" :key="slide.id">
                    <button
                        class="flex w-4 h-2 mt-4 mx-2 mb-2 rounded-full overflow-hidden transition-colors duration-200 ease-out hover:bg-slate-600 hover:shadow-lg"
                        :class="{ 'bg-yellow-600': activeSlide === slide.id, 'bg-slate-300': activeSlide !== slide.id }"
                        @click="activeSlide = slide.id"></button>
                </template>
            </div>
        </div>

        <div class="relative bg-batik-pattern py-4 md:py-8 ml-20 bg-no-repeat bg-left-top">
            <div class="relative w-full max-w-6xl mx-auto my-4 md:my-8" x-data="{
        activeSlide: 1,
        slides: [
            { id: 1, image: '{{ asset('img/balon_pekalongan.png') }}', logo: '{{ asset('img/pklbunga.png') }}', title: 'Pekalongan Balloon Festival', description: 'You can make summer plans for unforgettable experiences in the nation\'s capital. Check out the dozens of free things to do, including Smithsonian museums, the National Mall and an array of outdoor activities. Explore wondrous neighborhoods, a dining scene filled with Michelin-approved restaurants, rooftop bars and beer gardens. Get ready for an exciting summer in.' },
            { id:2, image: '{{ asset('img/balon_pekalongan.png') }}', logo: '{{ asset('img/pklbunga.png') }}', title: 'Pekalongan Balloon Festival', description: 'You can make summer plans for unforgettable experiences in the nation\'s capital. Check out the dozens of free things to do, including Smithsonian museums, the National Mall and an array of outdoor activities. Explore wondrous neighborhoods, a dining scene filled with Michelin-approved restaurants, rooftop bars and beer gardens. Get ready for an exciting summer in.' },
        ]
    }">
                <div class="overflow-hidden rounded-lg shadow-lg">
                    <div class="flex transition-transform duration-300 ease-in-out"
                        :style="{ transform: `translateX(-${(activeSlide - 1) * 100}%)` }">
                        <template x-for="slide in slides" :key="slide.id">
                            <div class="flex-none w-full">
                                <div class="flex flex-col md:flex-row">
                                    <!-- Left side - Image -->
                                    <div class="w-full md:w-1/2 h-64 md:h-auto">
                                        <img :src="slide.image" :alt="slide.title" class="w-full h-full object-cover">
                                    </div>
                                    <!-- Right side - Content -->
                                    <div class="w-full md:w-1/2 bg-white p-4 md:p-6">
                                        <img :src="slide.logo" :alt="slide.title + ' Logo'"
                                            class="h-24 w-auto mb-4 mx-auto md:mx-0">
                                        <h2 class="text-xl md:text-2xl font-bold mb-2 md:mb-4" x-text="slide.title">
                                        </h2>
                                        <p class="text-sm md:text-base text-gray-700" x-text="slide.description"></p>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
                <!-- Navigation buttons -->
                <button @click="activeSlide = activeSlide === 1 ? slides.length : activeSlide - 1"
                    class="absolute top-1/2 left-2 transform -translate-y-1/2 bg-white rounded-full p-1 md:p-2 shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="h-4 w-4 md:h-6 md:w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button @click="activeSlide = activeSlide === slides.length ? 1 : activeSlide + 1"
                    class="absolute top-1/2 right-2 transform -translate-y-1/2 bg-white rounded-full p-1 md:p-2 shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="h-4 w-4 md:h-6 md:w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
        </div>
        <!-- Berita & Pengumuman -->
        <div class="relative h-screen">
            <!-- Background Image Overlay -->
            <div class="absolute inset-0 bg-cover bg-center"
                style="background-image: url('https://asset.kompas.com/crops/AsZwJgbHv7GOQqeOdxo1cCZ64Ak=/167x95:965x627/750x500/data/photo/2022/10/01/633807f7d7d67.png');">
                <div class="absolute inset-0 bg-white opacity-60"></div>
            </div>
            <!-- Content Container -->
            <div class="container mx-auto py-8 px-4 h-full relative z-10">
                <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4 h-full">
                    <!-- Berita Section -->
                    <div class="flex-[3] bg-yellow-500 rounded-lg p-4 h-full flex flex-col">
                        <h2 class="text-xl font-semibold mb-4">Berita</h2>
                        <div class="flex space-x-4 mb-4">
                            <!-- Image Box -->
                            <div class="flex gap-2">
                                @foreach ($headlineBerita->take(2) as $berita)
                                <a href="{{ route('berita.show', ['id' => $berita->id]) }}"
                                    class="block no-underline text-black w-1/2">
                                    <div class="flex-1 bg-white rounded-lg shadow overflow-hidden relative"
                                        style="height: 300px;">
                                        <img class="w-full h-full object-cover transform hover:scale-110 transition-transform duration-300"
                                            src="{{ asset('storage/' . $berita->image) }}" alt="{{ $berita->title }}"
                                            style="object-fit: cover;">
                                        <div
                                            class="absolute bottom-0 w-full p-2 bg-black bg-opacity-50 text-white text-center">
                                            <h3
                                                class="text-lg font-bold hover:text-yellow-500 transition-colors duration-300">
                                                {{ $berita->title }}
                                            </h3>
                                        </div>
                                    </div>
                                </a>
                                @endforeach
                            </div>

                        </div>
                        <div class="bg-white rounded-lg shadow-md p-4 overflow-y-scroll flex-1 mb-1">
                            <div class="flex justify-between mb-2">
                                <span class="font-semibold">Berita Terbaru</span>
                            </div>
                            <ul class="space-y-2">
                                @foreach ($otherBerita as $berita)
                                <li class="flex justify-between text-sm">
                                    <a href="{{ route('berita.show', ['id' => $berita->id]) }}"
                                        class="flex justify-between w-full no-underline text-black">
                                        <span class="hover:text-yellow-500">{{ $berita->title }}</span>
                                        <span class="text-gray-500">| {{ $berita->date }}</span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                    <!-- Pengumuman Section -->
                    <div class="flex-[1] bg-yellow-500 rounded-lg p-4 h-full flex flex-col">
                        <h2 class="text-xl font-semibold mb-4">Pengumuman</h2>
                        <div class="bg-white rounded-lg shadow-md p-4 overflow-y-scroll flex-1">
                            <ul class="space-y-2">
                                <li class="flex justify-between text-sm">
                                    <span class="hover:text-yellow-500">35 Ton Sampah Telah Dibersihkan Di Kawasan
                                        Alun-Alun</span>
                                    <span class="text-gray-500 text-right">Lintas Kota | 23/06/2024 10:35</span>
                                </li>
                                <li class="flex justify-between text-sm">
                                    <span class="hover:text-yellow-500">15 Ribu Pelari Meriahkan 2024</span>
                                    <span class="text-gray-500 text-right">Pekalongan Hari Ini | 23/06/2024 09:57</span>
                                </li>
                                <li class="flex justify-between text-sm">
                                    <span class="hover:text-yellow-500">Pekalongan Cerah Sepanjang Hari Ini</span>
                                    <span class="text-gray-500 text-right">Berita Hari Ini | 23/06/2024 07:09</span>
                                </li>
                                <li class="flex justify-between text-sm">
                                    <span class="hover:text-yellow-500">Malam Jaya Raya Sukses Pukau Pengunjung
                                        Pekalongan</span>
                                    <span class="text-gray-500 text-right">Wisata | 23/06/2024 01:05</span>
                                </li>
                                <li class="flex justify-between text-sm">
                                    <span class="hover:text-yellow-500">Pemadaman Listrik Terjadwal di Wilayah
                                        Degayu</span>
                                    <span class="text-gray-500 text-right">Pengumuman | 23/06/2024 12:00</span>
                                </li>
                                <li class="flex justify-between text-sm">
                                    <span class="hover:text-yellow-500">Perubahan Jadwal KRL Pekalongan</span>
                                    <span class="text-gray-500 text-right">Pengumuman | 23/06/2024 11:00</span>
                                </li>
                                <li class="flex justify-between text-sm">
                                    <span class="hover:text-yellow-500">Pengalihan Arus Lalu Lintas di Area
                                        Alun-Alun</span>
                                    <span class="text-gray-500 text-right">Pengumuman | 23/06/2024 10:00</span>
                                </li>
                                <li class="flex justify-between text-sm">
                                    <span class="hover:text-yellow-500">Peringatan Hari Kemerdekaan di Alun-Alun
                                        Pekalongan</span>
                                    <span class="text-gray-500 text-right">Pengumuman | 23/06/2024 09:00</span>
                                </li>
                                <li class="flex justify-between text-sm">
                                    <span class="hover:text-yellow-500">Pameran Buku Pekalongan di Toko Buku
                                        Salemba</span>
                                    <span class="text-gray-500 text-right">Pengumuman | 23/06/2024 08:00</span>
                                </li>
                                <li class="flex justify-between text-sm">
                                    <span class="hover:text-yellow-500">Perbaikan Jalan di Tol Pekalongan-Batang</span>
                                    <span class="text-gray-500 text-right">Pengumuman | 23/06/2024 07:00</span>
                                </li>
                                <li class="flex justify-between text-sm">
                                    <span class="hover:text-yellow-500">Penutupan Sementara Beberapa Jalan di Pusat
                                        Kota</span>
                                    <span class="text-gray-500 text-right">Pengumuman | 22/06/2024 18:30</span>
                                </li>
                                <li class="flex justify-between text-sm">
                                    <span class="hover:text-yellow-500">Pengumuman Pelatihan Kerja di Balai Latihan
                                        Kerja</span>
                                    <span class="text-gray-500 text-right">Pengumuman | 22/06/2024 17:00</span>
                                </li>
                                <li class="flex justify-between text-sm">
                                    <span class="hover:text-yellow-500">Kegiatan Donor Darah di PMI</span>
                                    <span class="text-gray-500 text-right">Pengumuman | 22/06/2024 15:45</span>
                                </li>
                                <li class="flex justify-between text-sm">
                                    <span class="hover:text-yellow-500">Lomba Kebersihan Antar RW</span>
                                    <span class="text-gray-500 text-right">Pengumuman | 22/06/2024 14:00</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mx-auto py-8 px-4">
            <h1 class="text-2xl font-bold mb-6">Galeri Kota Pekalongan</h1>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                <div class="relative group rounded-lg overflow-hidden shadow-md">
                    <img src="https://via.placeholder.com/150" alt="Pemerintah Kota Bandung"
                        class="w-full h-32 object-cover">
                    <div
                        class="absolute inset-0 bg-yellow-500 opacity-70 group-hover:opacity-0 transition-opacity duration-300">
                    </div>
                    <div class="absolute inset-0 flex items-center justify-center text-white font-bold text-center">
                        Pemerintah Kota Pekalongan
                    </div>
                </div>
                <div class="relative group rounded-lg overflow-hidden shadow-md">
                    <img src="https://via.placeholder.com/150" alt="Pendidikan Dan Kebudayaan"
                        class="w-full h-32 object-cover">
                    <div
                        class="absolute inset-0 bg-yellow-500 opacity-70 group-hover:opacity-0 transition-opacity duration-300">
                    </div>
                    <div class="absolute inset-0 flex items-center justify-center text-white font-bold text-center">
                        Pendidikan Dan Kebudayaan
                    </div>
                </div>
                <div class="relative group rounded-lg overflow-hidden shadow-md">
                    <img src="https://via.placeholder.com/150" alt="Kesehatan" class="w-full h-32 object-cover">
                    <div
                        class="absolute inset-0 bg-yellow-500 opacity-70 group-hover:opacity-0 transition-opacity duration-300">
                    </div>
                    <div class="absolute inset-0 flex items-center justify-center text-white font-bold text-center">
                        Kesehatan
                    </div>
                </div>
                <div class="relative group rounded-lg overflow-hidden shadow-md">
                    <img src="https://via.placeholder.com/150" alt="Transportasi" class="w-full h-32 object-cover">
                    <div
                        class="absolute inset-0 bg-yellow-500 opacity-70 group-hover:opacity-0 transition-opacity duration-300">
                    </div>
                    <div class="absolute inset-0 flex items-center justify-center text-white font-bold text-center">
                        Transportasi
                    </div>
                </div>
                <div class="relative group rounded-lg overflow-hidden shadow-md">
                    <img src="https://via.placeholder.com/150" alt="Perumahan Dan Pemukiman"
                        class="w-full h-32 object-cover">
                    <div
                        class="absolute inset-0 bg-yellow-500 opacity-70 group-hover:opacity-0 transition-opacity duration-300">
                    </div>
                    <div class="absolute inset-0 flex items-center justify-center text-white font-bold text-center">
                        Perumahan Dan Pemukiman
                    </div>
                </div>
                <div class="relative group rounded-lg overflow-hidden shadow-md">
                    <img src="https://via.placeholder.com/150" alt="Pariwisata" class="w-full h-32 object-cover">
                    <div
                        class="absolute inset-0 bg-yellow-500 opacity-70 group-hover:opacity-0 transition-opacity duration-300">
                    </div>
                    <div class="absolute inset-0 flex items-center justify-center text-white font-bold text-center">
                        Pariwisata
                    </div>
                </div>
                <div class="relative group rounded-lg overflow-hidden shadow-md">
                    <img src="https://via.placeholder.com/150" alt="Pertanian" class="w-full h-32 object-cover">
                    <div
                        class="absolute inset-0 bg-yellow-500 opacity-70 group-hover:opacity-0 transition-opacity duration-300">
                    </div>
                    <div class="absolute inset-0 flex items-center justify-center text-white font-bold text-center">
                        Pertanian
                    </div>
                </div>
                <div class="relative group rounded-lg overflow-hidden shadow-md">
                    <img src="https://via.placeholder.com/150" alt="Olahraga" class="w-full h-32 object-cover">
                    <div
                        class="absolute inset-0 bg-yellow-500 opacity-70 group-hover:opacity-0 transition-opacity duration-300">
                    </div>
                    <div class="absolute inset-0 flex items-center justify-center text-white font-bold text-center">
                        Olahraga
                    </div>
                </div>
            </div>
        </div>

        <div
            class="container mx-auto p-4 flex flex-col lg:flex-row lg:justify-between space-y-4 lg:space-y-0 lg:space-x-4">
            <div class="flex flex-col space-y-4">
                <!-- Top placeholder image -->
                <div
                    class="bg-white border border-gray-300 rounded-lg shadow-md p-4 w-full lg:w-80 h-48 flex items-center justify-center">
                    <span class="text-gray-500">Top Placeholder Image</span>
                </div>
                <!-- Bottom placeholder image -->
                <div
                    class="bg-white border border-gray-300 rounded-lg shadow-md p-4 w-full lg:w-80 h-48 flex items-center justify-center">
                    <span class="text-gray-500">Bottom Placeholder Image</span>
                </div>
            </div>
            <!-- Twitter feed for @pemkotpkl -->
            <div class="bg-white border border-gray-300 rounded-lg shadow-md p-4 w-full lg:w-80">
                <div class="font-bold mb-4">Postingan dari @pemkotpkl</div>
                <a class="twitter-timeline" href="https://twitter.com/pemkotpkl" data-tweet-limit="1">Tweets by Pemkot
                    Pekalongan</a>
                <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
            <!-- Twitter feed for @officialbatiktv -->
            <div class="bg-white border border-gray-300 rounded-lg shadow-md p-4 w-full lg:w-80">
                <div class="font-bold mb-4">Postingan dari @officialbatiktv</div>
                <a class="twitter-timeline" href="https://twitter.com/officialbatiktv" data-tweet-limit="1">Tweets by
                    BATIK TV</a>
                <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
        </div>



        <div class="container mx-auto py-8 px-4 overflow-hidden">
            <h1 class="text-2xl font-bold mb-6">Layanan Kota Pekalongan</h1>
            <div class="swiper-container">
                <div class="swiper-wrapper ">
                    <!-- Slide 1 -->
                    <a href="#">
                        <div class="swiper-slide bg-white">
                            <div
                                class="w-full max-w-md rounded overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 border-2 border-transparent hover:border-yellow-500 h-64 flex flex-col">
                                <img class="w-16 h-16 mt-4 ml-4 object-contain" src="https://via.placeholder.com/64"
                                    alt="Placeholder Logo">
                                <div class="px-6 py-4 flex flex-col justify-between flex-grow">
                                    <div>
                                        <div class="font-bold text-xl mb-2">Berita Pekalongan</div>
                                        <p class="text-gray-700 text-base">
                                            Portal berita resmi Pemerintah Kota Pekalongan. Temukan informasi aktual dan
                                            akurat tentang Kota Pekalongan.
                                        </p>
                                    </div>
                                    <a href="#"
                                        class="text-blue-500 hover:underline mt-2 inline-block">Selengkapnya..</a>
                                </div>
                            </div>
                        </div>
                    </a>

                    <!-- Slide 2 -->
                    <div class="swiper-slide bg-white">
                        <div
                            class="w-full max-w-md rounded overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 border-2 border-transparent hover:border-yellow-500 h-64 flex flex-col">
                            <img class="w-16 h-16 mt-4 ml-4 object-contain" src="https://via.placeholder.com/64"
                                alt="Placeholder Logo">
                            <div class="px-6 py-4 flex flex-col justify-between flex-grow">
                                <div>
                                    <div class="font-bold text-xl mb-2">JDIH</div>
                                    <p class="text-gray-700 text-base">
                                        Jaringan Dokumentasi dan Informasi Hukum Provinsi DKI Jakarta.
                                    </p>
                                </div>
                                <a href="#" class="text-blue-500 hover:underline mt-2 inline-block">Selengkapnya..</a>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 3 -->
                    <div class="swiper-slide bg-white">
                        <div
                            class="w-full max-w-md rounded overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 border-2 border-transparent hover:border-yellow-500 h-64 flex flex-col">
                            <img class="w-16 h-16 mt-4 ml-4 object-contain" src="https://via.placeholder.com/64"
                                alt="Placeholder Logo">
                            <div class="px-6 py-4 flex flex-col justify-between flex-grow">
                                <div>
                                    <div class="font-bold text-xl mb-2">JDIH</div>
                                    <p class="text-gray-700 text-base">
                                        Jaringan Dokumentasi dan Informasi Hukum Provinsi DKI Jakarta.
                                    </p>
                                </div>
                                <a href="#" class="text-blue-500 hover:underline mt-2 inline-block">Selengkapnya..</a>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 4 -->
                    <div class="swiper-slide bg-white">
                        <div
                            class="w-full max-w-md rounded overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 border-2 border-transparent hover:border-yellow-500 h-64 flex flex-col">
                            <img class="w-16 h-16 mt-4 ml-4 object-contain" src="https://via.placeholder.com/64"
                                alt="Placeholder Logo">
                            <div class="px-6 py-4 flex flex-col justify-between flex-grow">
                                <div>
                                    <div class="font-bold text-xl mb-2">JDIH</div>
                                    <p class="text-gray-700 text-base">
                                        Jaringan Dokumentasi dan Informasi Hukum Provinsi DKI Jakarta.
                                    </p>
                                </div>
                                <a href="#" class="text-blue-500 hover:underline mt-2 inline-block">Selengkapnya..</a>
                            </div>
                        </div>
                    </div>
                    <!-- Add more slides as needed -->
                </div>
            </div>
        </div>


        <!-- Swiper JS -->
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

        <script>
        document.addEventListener('DOMContentLoaded', function() {
            var swiper = new Swiper('.swiper-container', {
                slidesPerView: 1,
                spaceBetween: 10,
                loop: true, // Enable loop mode
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                breakpoints: {
                    640: {
                        slidesPerView: 1,
                        spaceBetween: 20,
                    },
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 30,
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 40,
                    },
                },
            });
        });
        </script>

        <!-- Swiper CSS -->
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

        <div class="container mx-auto py-8 px-4">
            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="flex flex-col md:flex-row">
                    <div id="map" class="h-96 md:h-[500px] w-full md:w-1/2 relative z-0">
                        <button id="focusButton"
                            class="absolute bottom-4 left-4 z-10 bg-yellow-500 text-white px-4 py-2 rounded">Fokus
                            ke
                            Pekalongan</button>
                    </div>
                    <div class="mt-4 md:mt-0 md:ml-4 flex flex-col items-center md:w-1/2">
                        <img src="{{ asset('img/logopkl.png') }}" alt="Image beside the map" class="w-24 mb-4">
                        <h2 class="text-xl font-semibold mb-2">Kota Pekalongan</h2>
                        <p class="text-gray-600 text-justify">Kota Pekalongan adalah salah satu kota di pesisir
                            pantai
                            utara
                            Provinsi Jawa Tengah. Kota ini berbatasan dengan laut Jawa di utara, Kabupaten
                            Pekalongan di
                            sebelah selatan dan barat dan Kabupaten Batang di timur. Kota Pekalongan terdiri
                            atas 4
                            kecamatan, yakni Pekalongan Utara, Pekalongan Barat, Pekalongan Selatan dan
                            Pekalongan
                            Timur. Kota Pekalongan terletak di antara 6°50’42” - 6°55’44” LS dan 109°37’55” -
                            109°42’19”
                            BT. Jarak Kota Pekalongan ke ibukota Provinsi Jawa Tengah sekitar 100 km sebelah
                            barat
                            Semarang. Kota Pekalongan mendapat julukan kota batik. Hal ini tidak terlepas dari
                            sejarah
                            bahwa sejak puluhan dan ratusan tahun lampau hingga sekarang, sebagian besar proses
                            produksi
                            batik Indonesia dihasilkan di kota Pekalongan.</p>
                    </div>
                </div>
            </div>
    </main>

    <footer class="bg-yellow-600 p-2 relative z-50">
        <div class="container mx-auto px-4 max-w-screen-lg">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="flex flex-col items-start">
                    <img src="{{ asset('img/pklbunga.png') }}" alt="Logo" class="h-32 mb-4">
                    <div class="flex space-x-4 mt-4">
                        <a href="#"><img src="{{ asset('img/fb.png') }}" alt="Facebook" class="h-8"></a>
                        <a href="#"><img src="{{ asset('img/twt.png') }}" alt="Twitter" class="h-8"></a>
                        <a href="#"><img src="{{ asset('img/ig.png') }}" alt="Instagram" class="h-8"></a>
                        <a href="#"><img src="{{ asset('img/yt.png') }}" alt="YouTube" class="h-8"></a>
                    </div>
                </div>
                <div class="text-left">
                    <h2 class="text-white font-semibold mb-4">Link Terkait</h2>
                    <ul class="space-y-2">
                        <li><a href="https://www.menpan.go.id/site/" class="text-white hover:text-gray-300">KEMENPAN</a>
                        </li>
                        <li><a href="https://www.kemendagri.go.id/"
                                class="text-white hover:text-gray-300">KEMENDAGRI</a></li>
                        <li><a href="https://jatengprov.go.id/" class="text-white hover:text-gray-300">PEMPROV
                                JATENG</a></li>
                        <li><a href="http://kipjateng.jatengprov.go.id/" class="text-white hover:text-gray-300">KIP
                                JATENG</a></li>
                        <li><a href="https://data.go.id/" class="text-white hover:text-gray-300">PORTAL SATU DATA</a>
                        </li>
                        <li><a href="https://pekalongankota.go.id/halaman/kebijakan-privasi.html"
                                class="text-white hover:text-gray-300">KEBIJAKAN PRIVASI</a></li>
                    </ul>
                </div>
                <div class="text-left">
                    <h2 class="text-white font-semibold mb-4">Alamat</h2>
                    <ul class="space-y-2">
                        <li class="text-white flex items-center">
                            <img src="{{ asset('img/alamat.png') }}" alt="Alamat" class="h-4 mr-2">
                            Jl. Mataram No.1, Podosugih, Kec. Pekalongan Bar., Kota Pekalongan, Jawa Tengah 51111
                        </li>
                        <li class="text-white flex items-center">
                            <img src="{{ asset('img/telp.png') }}" alt="Telepon" class="h-4 mr-2"> (0285) 421093
                        </li>
                        <li class="text-white flex items-center">
                            <img src="{{ asset('img/pesan.png') }}" alt="Email" class="h-4 mr-2">
                            <a href="mailto:setda@pekalongankota.go.id"
                                class="hover:text-gray-300">setda@pekalongankota.go.id</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="text-center mt-8 text-white">
                &copy; {{ date('Y') }} Dinas Komunikasi dan Informatika Kota Pekalongan. All Rights Reserved.
            </div>
        </div>
    </footer>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var map = L.map('map').setView([-6.8915, 109.6753], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var pointsOfInterest = [{
            coords: [-6.887, 109.675],
            name: 'Kota Pekalongan'
        }];

        pointsOfInterest.forEach(function(point) {
            L.marker(point.coords).addTo(map)
                .bindPopup(point.name);
        });

        var boundaryCoords = [
            [-6.888, 109.665],
            [-6.878, 109.665],
            [-6.878, 109.685],
            [-6.888, 109.685],
            [-6.888, 109.665]
        ];
        var boundaryLine = L.polyline(boundaryCoords, {
            color: 'no color',
            weight: 2,
            opacity: 0.5,
            dashArray: '5, 5'
        }).addTo(map);

        var bounds = L.latLngBounds(boundaryCoords);
        map.fitBounds(bounds);

        document.getElementById('focusButton').addEventListener('click', function() {
            map.setView([-6.888, 109.675], 13);
        });
    });
    </script>
</body>

</html>