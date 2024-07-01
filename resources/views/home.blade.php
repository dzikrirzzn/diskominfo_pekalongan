<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemerintah Kota Pekalongan</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
        }

        .bg-yellow-600 {
            background-color: #ffc107;
        }

        .text-black {
            color: #000;
        }

        .hover\:text-gray-200:hover {
            color: #e2e8f0;
        }

        .flex {
            display: flex;
        }

        .flex-col {
            flex-direction: column;
        }

        .items-center {
            align-items: center;
        }

        .justify-between {
            justify-content: space-between;
        }

        .lg\:hidden {
            display: none;
        }

        .w-full {
            width: 100%;
        }

        .h-16 {
            height: 4rem;
        }

        .rounded-lg {
            border-radius: 0.5rem;
        }

        .shadow-lg {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -4px rgba(0, 0, 0, 0.1);
        }

        .container {
            width: 100%;
            margin-right: auto;
            margin-left: auto;
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto;
        }

        .bg-gray-100 {
            background-color: #f7fafc;
        }

        .p-4 {
            padding: 1rem;
        }

        .rounded {
            border-radius: 0.25rem;
        }

        .text-lg {
            font-size: 1.125rem;
        }

        .font-bold {
            font-weight: 700;
        }

        .hover\:text-gray-300:hover {
            color: #e2e8f0;
        }

        .overflow-hidden {
            overflow: hidden;
        }

        .h-full {
            height: 100%;
        }

        .text-white {
            color: #fff;
        }

        .bg-white {
            background-color: #fff;
        }

        .relative {
            position: relative;
        }

        .absolute {
            position: absolute;
        }

        .top-1\/2 {
            top: 50%;
        }

        .left-2 {
            left: 0.5rem;
        }

        .right-2 {
            right: 0.5rem;
        }

        .bg-gray-200 {
            background-color: #edf2f7;
        }

        .bg-blue-500 {
            background-color: #3b82f6;
        }

        .hover\:bg-blue-500:hover {
            background-color: #3b82f6;
        }

        .text-xl {
            font-size: 1.25rem;
        }

        .font-semibold {
            font-weight: 600;
        }

        .text-gray-600 {
            color: #718096;
        }

        .hover\:bg-slate-600:hover {
            background-color: #1e293b;
        }

        .hover\:text-white:hover {
            color: #fff;
        }

        .rounded-full {
            border-radius: 9999px;
        }

        .bg-slate-500 {
            background-color: #6b7280;
        }

        .object-cover {
            object-fit: cover;
        }

        .mb-4 {
            margin-bottom: 1rem;
        }

        .transition-colors {
            transition-property: color, background-color, border-color, text-decoration-color, fill, stroke;
        }

        .duration-200 {
            transition-duration: 200ms;
        }

        .ease-out {
            transition-timing-function: ease-out;
        }

        .hover\:shadow-lg:hover {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -4px rgba(0, 0, 0, 0.1);
        }

        .shadow-md {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        .hover\:bg-slate-600:hover {
            background-color: #1e293b;
        }

        .hover\:text-white:hover {
            color: #fff;
        }

        .text-gray-500 {
            color: #6b7280;
        }

        .text-sm {
            font-size: 0.875rem;
        }

        .px-4 {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .py-2 {
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }

        .my-4 {
            margin-top: 1rem;
            margin-bottom: 1rem;
        }

        .md\:my-8 {
            margin-top: 2rem;
            margin-bottom: 2rem;
        }

        .md\:py-8 {
            padding-top: 2rem;
            padding-bottom: 2rem;
        }

        .container {
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .space-y-2> :not(template)~ :not(template) {
            --tw-space-y-reverse: 0;
            margin-top: calc(0.5rem * calc(1 - var(--tw-space-y-reverse)));
            margin-bottom: calc(0.5rem * var(--tw-space-y-reverse));
        }

        .space-x-4> :not(template)~ :not(template) {
            --tw-space-x-reverse: 0;
            margin-right: calc(1rem * var(--tw-space-x-reverse));
            margin-left: calc(1rem * calc(1 - var(--tw-space-x-reverse)));
        }

        .space-y-4> :not(template)~ :not(template) {
            --tw-space-y-reverse: 0;
            margin-top: calc(1rem * calc(1 - var(--tw-space-y-reverse)));
            margin-bottom: calc(1rem * var(--tw-space-y-reverse));
        }

        .grid {
            display: grid;
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr));
        }

        .md\:grid-cols-3 {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }

        .gap-8 {
            grid-gap: 2rem;
        }

        .h-4 {
            height: 1rem;
        }

        .mt-auto {
            margin-top: auto;
        }

        .mb-2 {
            margin-bottom: 0.5rem;
        }

        .max-w-screen-lg {
            max-width: 1024px;
        }

        .bg-gray-300 {
            background-color: #d1d5db;
        }

        .w-8 {
            width: 2rem;
        }

        .h-8 {
            height: 2rem;
        }

        .bg-slate-100 {
            background-color: #f8fafc;
        }

        .h-40 {
            height: 10rem;
        }

        .text-justify {
            text-align: justify;
        }
    </style>
</head>

<body class="flex flex-col min-h-screen bg-gray-100">
    <nav class="bg-yellow-600 p-4" x-data="{ isOpen: false }">
        <div class="container mx-auto flex justify-between items-center flex-wrap">
            <div class="text-black font-bold flex items-center">
                <img src="{{ asset('img/logopkl.png') }}" alt="Logo" class="h-16 mr-3">
                <div class="flex flex-col">
                    <div class="text-lg">Pemerintah</div>
                    <div class="text-lg">Kota Pekalongan</div>
                </div>
            </div>
            <button @click="isOpen = !isOpen" class="lg:hidden text-black focus:outline-none">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path :class="{'hidden': isOpen, 'inline-flex': !isOpen }" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{'hidden': !isOpen, 'inline-flex': isOpen }" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <div :class="{'hidden': !isOpen}" class="w-full lg:flex lg:items-center lg:w-auto">
                <ul class="lg:flex space-y-2 lg:space-y-0 lg:space-x-10">
                    <li><a href="#" class="block text-black hover:text-gray-200">Beranda</a></li>
                    <li><a href="#" class="block text-black hover:text-gray-200">Sekilas</a></li>
                    <li><a href="#" class="block text-black hover:text-gray-200">Instansi</a></li>
                    <li><a href="#" class="block text-black hover:text-gray-200">Berita</a></li>
                    <li><a href="#" class="block text-black hover:text-gray-200">Galeri</a></li>
                    <li><a href="#" class="block text-black hover:text-gray-200">Informasi</a></li>
                    <li><a href="#" class="block text-black hover:text-gray-200">Link</a></li>
                    <li><a href="#" class="block text-black hover:text-gray-200">Kip / PPID</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="flex-1">
        <div class="relative overflow-hidden h-[88vh]" x-data="{
            activeSlide: 1,
            slides: [
                { id: 1, title: 'Hello 1', body: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.' },
                { id: 2, title: 'Hello 2', body: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.' },
                { id: 3, title: 'Hello 3', body: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.' },
                { id: 4, title: 'Hello 4', body: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.' },
                { id: 5, title: 'Hello 5', body: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.' }
            ],
            loop() {
                setInterval(() => {
                    this.activeSlide = this.activeSlide === 5 ? 1 : this.activeSlide + 1
                }, 5000)
            }
        }" x-init="loop">
            <template x-for="slide in slides" :key="slide.id">
                <div x-show="activeSlide === slide.id"
                    class="w-full h-full flex items-center bg-slate-500 text-white absolute inset-0">
                    <div class="mx-auto p-8">
                        <h2 class="font-bold text-3xl mb-4" x-text="slide.title"></h2>
                        <p x-text="slide.body" class="text-lg"></p>
                    </div>
                </div>
            </template>
            <div class="absolute inset-y-0 flex items-center justify-between w-full px-4">
                <button @click="activeSlide = activeSlide === 1 ? slides.length : activeSlide - 1"
                    class="bg-slate-100 hover:bg-blue-500 hover:text-white font-bold rounded-full w-12 h-12 shadow flex justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-10 h-10 opacity-25">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button @click="activeSlide = activeSlide === slides.length ? 1 : activeSlide + 1"
                    class="bg-slate-100 hover:bg-blue-500 hover:text-white font-bold rounded-full w-12 h-12 shadow flex justify-center items-center">
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
                        :class="{ 'bg-blue-600': activeSlide === slide.id, 'bg-slate-300': activeSlide !== slide.id }"
                        @click="activeSlide = slide.id"></button>
                </template>
            </div>
        </div>

        <div class="relative bg-batik-pattern bg-repeat py-4 md:py-8">
            <div class="relative w-full max-w-6xl mx-auto my-4 md:my-8" x-data="{
        activeSlide: 1,
        slides: [
            { id: 1, image: '{{ asset('img/balon_pekalongan.png') }}', logo: '{{ asset('img/pklbunga.png') }}', title: 'Pekalongan Balloon Festival', description: 'You can make summer plans for unforgettable experiences in the nation\'s capital. Check out the dozens of free things to do, including Smithsonian museums, the National Mall and an array of outdoor activities. Explore wondrous neighborhoods, a dining scene filled with Michelin-approved restaurants, rooftop bars and beer gardens. Get ready for an exciting summer in.' },
            { id:2, image: '{{ asset('img/balon_pekalongan.png') }}', logo: '{{ asset('img/pklbunga.png') }}', title: 'Pekalongan Balloon Festival', description: 'You can make summer plans for unforgettable experiences in the nation\'s capital. Check out the dozens of free things to do, including Smithsonian museums, the National Mall and an array of outdoor activities. Explore wondrous neighborhoods, a dining scene filled with Michelin-approved restaurants, rooftop bars and beer gardens. Get ready for an exciting summer in.' },
        ]
    }">
                <div class="overflow-hidden rounded-lg shadow-lg">
                    <div class="flex transition-transform duration-300 ease-in-out"
                        :style="{ transform: translateX(-${(activeSlide - 1) * 100}%) }">
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
                                            class="h-12 w-auto mb-4 mx-auto md:mx-0">
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

        <!-- Add the News and Announcement sections here -->
        <div class="container mx-auto py-8 px-4">
            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="flex flex-col md:flex-row">
                    <div class="flex-1">
                        <div class="p-4">
                            <h2 class="text-xl font-semibold mb-4">Berita</h2>
                            <div class="bg-gray-100 rounded-lg p-4 mb-4">
                                <img src="your_image_url_here" alt="Pekalongan Balloon Festival"
                                    class="w-full h-40 object-cover rounded-lg mb-4">
                                <h3 class="text-lg font-bold">Pekalongan Balloon Festival</h3>
                            </div>
                            <div class="bg-gray-100 rounded-lg p-4">
                                <div class="flex justify-between mb-2">
                                    <span class="font-semibold">Terbaru</span>
                                    <span class="font-semibold">Populer</span>
                                </div>
                                <ul class="space-y-2">
                                    <li class="flex justify-between">
                                        <span>35 Ton Sampah Telah Dibersihkan Di Kawasan Monas</span>
                                        <span class="text-gray-500">Lintas Kota | 23 06 2024 10:35</span>
                                    </li>
                                    <li class="flex justify-between">
                                        <span>15 Ribu Pelari Meriahkan JAKIM 2024</span>
                                        <span class="text-gray-500">Jakarta Hari Ini | 23 06 2024 09:57</span>
                                    </li>
                                    <li class="flex justify-between">
                                        <span>Jakarta Cerah Sepanjang Hari Ini</span>
                                        <span class="text-gray-500">Jakarta Hari Ini | 23 06 2024 07:09</span>
                                    </li>
                                    <li class="flex justify-between">
                                        <span>Malam Jaya Raya Sukses Pukau Pengunjung Monas</span>
                                        <span class="text-gray-500">Wisata | 23 06 2024 01:05</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="flex-1 mt-4 md:mt-0 md:ml-4">
                        <div class="p-4">
                            <h2 class="text-xl font-semibold mb-4">Pengumuman</h2>
                            <div class="bg-gray-100 rounded-lg p-4">
                                <ul class="space-y-2">
                                    <li class="flex justify-between">
                                        <span>35 Ton Sampah Telah Dibersihkan Di Kawasan Monas</span>
                                        <span class="text-gray-500">Lintas Kota | 23 06 2024 10:35</span>
                                    </li>
                                    <li class="flex justify-between">
                                        <span>15 Ribu Pelari Meriahkan JAKIM 2024</span>
                                        <span class="text-gray-500">Jakarta Hari Ini | 23 06 2024 09:57</span>
                                    </li>
                                    <li class="flex justify-between">
                                        <span>Jakarta Cerah Sepanjang Hari Ini</span>
                                        <span class="text-gray-500">Jakarta Hari Ini | 23 06 2024 07:09</span>
                                    </li>
                                    <li class="flex justify-between">
                                        <span>Malam Jaya Raya Sukses Pukau Pengunjung Monas</span>
                                        <span class="text-gray-500">Wisata | 23 06 2024 01:05</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                        <h2 class="text-xl font-semibold mb-2">Pemerintah Kota Pekalongan</h2>
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
        </div>
    </main>

    <footer class="bg-gradient-to-b from-white to-yellow-600 text-gray-800 py-10 mt-auto">
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
                    <h2 class="text-black font-semibold mb-4">Link Terkait</h2>
                    <ul class="space-y-2">
                        <li><a href="https://www.menpan.go.id/site/" class="text-black hover:text-gray-300">KEMENPAN</a>
                        </li>
                        <li><a href="https://www.kemendagri.go.id/"
                                class="text-black hover:text-gray-300">KEMENDAGRI</a></li>
                        <li><a href="https://jatengprov.go.id/" class="text-black hover:text-gray-300">PEMPROV
                                JATENG</a></li>
                        <li><a href="http://kipjateng.jatengprov.go.id/" class="text-black hover:text-gray-300">KIP
                                JATENG</a></li>
                        <li><a href="https://data.go.id/" class="text-black hover:text-gray-300">PORTAL SATU DATA</a>
                        </li>
                        <li><a href="https://pekalongankota.go.id/halaman/kebijakan-privasi.html"
                                class="text-black hover:text-gray-300">KEBIJAKAN PRIVASI</a></li>
                    </ul>
                </div>
                <div class="text-left">
                    <h2 class="text-black font-semibold mb-4">Alamat</h2>
                    <ul class="space-y-2">
                        <li class="text-black flex items-center">
                            <img src="{{ asset('img/alamat.png') }}" alt="Alamat" class="h-4 mr-2">
                            Jl. Mataram No.1, Podosugih, Kec. Pekalongan Bar., Kota Pekalongan, Jawa Tengah 51111
                        </li>
                        <li class="text-black flex items-center">
                            <img src="{{ asset('img/telp.png') }}" alt="Telepon" class="h-4 mr-2"> (0285) 421093
                        </li>
                        <li class="text-black flex items-center">
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
