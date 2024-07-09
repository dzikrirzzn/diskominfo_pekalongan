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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<style>
#map {
    height: 400px;
}

#focusButton {
    position: absolute;
    bottom: 10px;
    left: 10px;
    z-index: 1000;
    background-color: #fbbf24;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.cursor-grabbing {
    cursor: grabbing;
}

.cursor-grab {
    cursor: grab;
}

.half-circle {
    clip-path: ellipse(100% 80% at 0% 50%);
}
</style>

<body class="flex flex-col min-h-screen bg-white">
    <nav x-data="{ isOpen: false, scrolled: false, showNav: true, lastScrollY: 0, timeout: null }" x-init="window.addEventListener('scroll', () => {
             clearTimeout(timeout);
             if (window.scrollY > lastScrollY) {
                 showNav = false;
             } else {
                 showNav = true;
             }
             lastScrollY = window.scrollY;
             scrolled = window.scrollY > 0;
             timeout = setTimeout(() => {
                 showNav = true;
             }, 300); // Adjust the timeout duration as needed
         })"
        :class="{'bg-yellow-500': scrolled, 'bg-transparent': !scrolled, 'transform -translate-y-full': !showNav, 'transform translate-y-0': showNav}"
        class="fixed w-full z-50 py-2 transition-transform duration-500 ease-in-out">
        <div class="container mx-auto flex justify-between items-center flex-wrap">
            <a href="{{ route('home') }}">
                <div class="text-black font-bold flex items-center">
                    <img src="{{ asset('img/logopkl.png') }}" alt="Logo" class="h-10 mr-2">
                    <div class="flex flex-col">
                        <div class="text-xs">Pemerintah</div>
                        <div class="text-xs">Kota Pekalongan</div>
                    </div>
                </div>
            </a>
            <button @click="isOpen = !isOpen" class="block lg:hidden">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path :class="{'hidden': isOpen, 'inline-flex': !isOpen }" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{'hidden': !isOpen, 'inline-flex': isOpen }" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <div :class="{'hidden': !isOpen, 'block': isOpen}" class="w-full lg:flex lg:items-center lg:w-auto">
                <ul class="lg:flex space-y-2 lg:space-y-0 lg:space-x-4">
                    <li><a href="#" class="block text-black hover:text-gray-200 text-sm">Sekilas</a></li>
                    <li><a href="#" class="block text-black hover:text-gray-200 text-sm">Instansi</a></li>
                    <li><a href="#" class="block text-black hover:text-gray-200 text-sm">Berita</a></li>
                    <li><a href="#" class="block text-black hover:text-gray-200 text-sm">Informasi</a></li>
                    <li><a href="#" class="block text-black hover:text-gray-200 text-sm">Kip / PPID</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Rest of your page content -->

    <main class="flex-1 relative z-0 pt-16">
        <!-- Main content -->
        <div class="flex h-screen">
            <!-- Left side (yellow section) -->
            <div class="w-full lg:w-1/2 bg-yellow-500 text-white p-12 lg:p-24 flex flex-col justify-center half-circle">
                <h1 class="text-5xl lg:text-7xl font-bold mb-8">Welcome to<br>City of<br>Pekalongan</h1>
                <p class="mb-8 text-xl lg:text-2xl">World City of Batik</p>
                <div class="relative">
                    <input type="text" placeholder="How can we help?"
                        class="w-full p-4 pr-12 rounded-full text-black text-xl">
                    <button class="absolute right-4 top-1/2 transform -translate-y-1/2">
                        <svg class="w-8 h-8 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <!-- Right side (image) -->
            <div class="w-full lg:w-1/2 relative">
                <img src="{{ asset('img/pemkot.png') }}" alt="foto wali dan walikota pekalongan"
                    class="w-full h-full object-cover">
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    <script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('navbar', () => ({
            isOpen: false,
            scrolled: false,
            init() {
                window.addEventListener('scroll', () => {
                    this.scrolled = window.scrollY > 50;
                });
            },
        }));
    });
    </script>

    <div class="relative py-4 md:py-8 bg-no-repeat bg-left-top">
        <div class="relative w-full max-w-6xl mx-auto my-4 md:my-8" x-data="{
        activeSlide: 1,
        slides: [
            @foreach ($travelRecommendations as $recommendation)
                { id: {{ $recommendation->id }}, image: '{{ asset('storage/' . $recommendation->image) }}', logo: '{{ asset('img/pklbunga.png') }}', title: '{{ $recommendation->judul }}', description: '{{ $recommendation->isi }}' },
            @endforeach
        ]
    }">
            <div class="overflow-hidden rounded-lg shadow-lg">
                <div class="flex transition-transform duration-300 ease-in-out"
                    :style="{ transform: `translateX(-${(activeSlide - 1) * 100}%)` }">
                    <template x-for="slide in slides" :key="slide.id">
                        <div class="flex-none w-full">
                            <div class="flex flex-col md:flex-row h-full">
                                <!-- Left side - Image -->
                                <div class="w-full md:w-1/2 h-64 md:h-96 relative">
                                    <img :src="slide.image" :alt="slide.title" class="w-full h-full object-cover">
                                </div>
                                <!-- Right side - Content -->
                                <div class="w-full md:w-1/2 bg-white p-4 md:p-6 flex flex-col justify-start relative">
                                    <img :src="slide.logo" :alt="slide.title + ' Logo'"
                                        class="h-24 w-auto mb-2 absolute top-4 left-4 object-contain">
                                    <h2 class="text-xl md:text-2xl font-bold mb-2 text-black mt-10 md:mt-20"
                                        x-text="slide.title"></h2>
                                    <p class="text-sm md:text-base text-gray-700 overflow-hidden overflow-ellipsis"
                                        x-text="slide.description"></p>
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
            <div class="absolute inset-0 bg-gray-500 opacity-60"></div>
        </div>
        <!-- Content Container -->
        <div class="container mx-auto py-8 px-4 h-full relative z-10">
            <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4 h-full px-4 md:px-20">
                <!-- Berita Section -->
                <div class="flex-1 md:flex-[3] bg-transparent rounded-lg p-4 h-full flex flex-col">
                    <h2 class="text-2xl md:text-3xl font-semibold mb-4 text-white border-b-2 border-gray-300">Berita
                        Kota</h2>
                    <div class="flex flex-col md:flex-row space-x-0 md:space-x-4 mb-4">
                        <!-- Image Box -->
                        <div class="flex flex-wrap gap-2">
                            @foreach ($headlineBerita->take(2) as $berita)
                            <a href="{{ route('berita.show', ['id' => $berita->id]) }}"
                                class="block no-underline text-black w-1/2">
                                <div
                                    class="w-full md:flex-1 rounded-lg shadow overflow-hidden relative transform hover:scale-90 hover:brightness-75 transition-transform duration-700">
                                    <img class="w-full h-full object-cover"
                                        src="{{ asset('storage/' . $berita->image) }}" alt="{{ $berita->title }}"
                                        style="object-fit: cover;">
                                    <div
                                        class="absolute bottom-0 w-full p-2 bg-black bg-opacity-50 text-white text-center">
                                        <h3
                                            class="text-lg font-bold hover:text-gray-400 transition-colors duration-300">
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
                            <span class="font-semibold text-black">Berita Lainnya</span>
                            <span class="font-semibold"></span>
                        </div>
                        <ul class="space-y-2">
                            @foreach ($otherBerita as $berita)
                            <li class="flex justify-between text-sm border-b border-gray-300 pb-2">
                                <a href="{{ route('berita.show', ['id' => $berita->id]) }}"
                                    class="flex justify-between w-full no-underline">
                                    <span class="hover:text-yellow-500">{{ $berita->title }}</span>
                                    <span class="text-gray-500">| {{ $berita->date }}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- Pengumuman Section -->
                <div class="flex-1 md:flex-[1] bg-transparent rounded-lg p-4 h-full flex flex-col">
                    <h2 class="text-2xl md:text-3xl font-semibold mb-4 text-left text-white border-b-2 border-gray-300">
                        Pengumuman</h2>
                    <div class="bg-white rounded-lg shadow-md p-4 overflow-y-scroll flex-1">
                        <ul class="space-y-2">
                            @foreach ($pengumuman as $item)
                            <li class="flex justify-between text-sm border-b border-gray-300 pb-2">
                                <a href="{{ route('pengumuman.show', ['id' => $item->id]) }}"
                                    class="flex justify-between w-full no-underline">
                                    <span class="hover:text-yellow-500">{{ $item->judul }}</span>
                                    <span class="text-gray-500 text-right"> | {{ $item->tanggal }}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto py-8 px-4">
        <h1 class="text-2xl font-bold mb-6 text-black">Galeri Kota Pekalongan</h1>
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
    <div class="container mx-auto p-4 flex flex-col lg:flex-row lg:justify-between space-y-4 lg:space-y-0 lg:space-x-4">
        <div class="flex flex-col space-y-4 w-full lg:w-1/3">
            <!-- Top placeholder image -->
            <div class="bg-white border border-gray-300 rounded-lg shadow-md p-4 flex items-center justify-center h-48">
                <span class="text-gray-500">Top Placeholder Image</span>
            </div>
            <!-- Bottom placeholder image -->
            <div class="bg-white border border-gray-300 rounded-lg shadow-md p-4 flex items-center justify-center h-48">
                <span class="text-gray-500">Bottom Placeholder Image</span>
            </div>
        </div>
        <!-- Twitter feed for @pemkotpkl -->
        <div class="bg-white border border-gray-300 rounded-lg shadow-md p-4 w-full lg:w-1/3 h-96 overflow-hidden">
            <div class="font-bold mb-4">Postingan dari @pemkotpkl</div>
            <div class="h-full overflow-y-scroll">
                <a class="twitter-timeline" href="https://twitter.com/pemkotpkl" data-tweet-limit="5">Tweets by Pemkot
                    Pekalongan</a>
            </div>
            <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>
        <!-- Twitter feed for @officialbatiktv -->
        <div class="bg-white border border-gray-300 rounded-lg shadow-md p-4 w-full lg:w-1/3 h-96 overflow-hidden">
            <div class="font-bold mb-4">Postingan dari @officialbatiktv</div>
            <div class="h-full overflow-y-scroll">
                <a class="twitter-timeline" href="https://twitter.com/officialbatiktv" data-tweet-limit="5">Tweets by
                    BATIK TV</a>
            </div>
            <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>
    </div>
    <div class="container mx-auto p-2 lg:p-4">
        <div class="flex flex-col lg:flex-row lg:space-x-4">
            <!-- Left Column -->
            <div class="flex flex-col lg:w-1/2 space-y-4">
                <!-- Calendar Section -->
                <div class="bg-white border border-gray-300 rounded-lg shadow-md p-4">
                    <div class="flex items-center justify-between mb-2">
                        <button class="focus:outline-none">
                            <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7">
                                </path>
                            </svg>
                        </button>
                        <h2 class="text-lg font-bold text-gray-700">April 2024</h2>
                        <button class="focus:outline-none">
                            <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </button>
                    </div>
                    <div class="grid grid-cols-7 gap-2 text-center text-gray-700">
                        <div>Mon</div>
                        <div>Tue</div>
                        <div>Wed</div>
                        <div>Thu</div>
                        <div>Fri</div>
                        <div>Sat</div>
                        <div>Sun</div>
                        <!-- Repeat for days of the month -->
                        <div class="col-span-7 border-t border-gray-300"></div>
                        <div class="py-1">1</div>
                        <div class="py-1">2</div>
                        <div class="py-1">3</div>
                        <div class="py-1">4</div>
                        <div class="py-1">5</div>
                        <div class="py-1">6</div>
                        <div class="py-1">7</div>
                        <div class="py-1">8</div>
                        <div class="py-1">9</div>
                        <div class="py-1">10</div>
                        <div class="py-1 bg-yellow-300 rounded-full">11</div>
                        <div class="py-1">12</div>
                        <div class="py-1">13</div>
                        <div class="py-1">14</div>
                        <div class="py-1">15</div>
                        <div class="py-1">16</div>
                        <div class="py-1">17</div>
                        <div class="py-1">18</div>
                        <div class="py-1">19</div>
                        <div class="py-1">20</div>
                        <div class="py-1">21</div>
                        <div class="py-1">22</div>
                        <div class="py-1 bg-yellow-300 rounded-full">23</div>
                        <div class="py-1 bg-yellow-300 rounded-full">24</div>
                        <div class="py-1">25</div>
                        <div class="py-1 bg-yellow-300 rounded-full">26</div>
                        <div class="py-1">27</div>
                        <div class="py-1">28</div>
                        <div class="py-1">29</div>
                        <div class="py-1 bg-yellow-300 rounded-full">30</div>
                    </div>
                </div>

                <!-- Events Section -->
                <div class="bg-white border border-gray-300 rounded-lg shadow-md p-4">
                    <ul class="space-y-2">
                        <li class="flex items-start space-x-2">
                            <div class="flex-shrink-0">
                                <div
                                    class="bg-black text-white rounded-lg w-12 h-12 flex flex-col items-center justify-center">
                                    <span class="text-lg font-bold">24</span>
                                    <span class="text-xs">SEP</span>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-md font-semibold">EXHIBITION</h3>
                                <p class="text-gray-600 text-sm">Here Today: Posters from 120 SPE, Los Angeles</p>
                            </div>
                        </li>
                        <li class="flex items-start space-x-2">
                            <div class="flex-shrink-0">
                                <div
                                    class="bg-black text-white rounded-lg w-12 h-12 flex flex-col items-center justify-center">
                                    <span class="text-lg font-bold">25</span>
                                    <span class="text-xs">SEP</span>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-md font-semibold">SEMINAR</h3>
                                <p class="text-gray-600 text-sm">HPC-AI Summer Seminar Series - "AI for Social Good" -
                                    Leveraging AI to Solve Problems for Human Kind</p>
                            </div>
                        </li>
                        <li class="flex items-start space-x-2">
                            <div class="flex-shrink-0">
                                <div
                                    class="bg-black text-white rounded-lg w-12 h-12 flex flex-col items-center justify-center">
                                    <span class="text-lg font-bold">26</span>
                                    <span class="text-xs">SEP</span>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-md font-semibold">LECTURE</h3>
                                <p class="text-gray-600 text-sm">Webinar: Presenting and Managing Migraines Without
                                    Chemical Treatment</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Right Column -->
            <div class="lg:w-1/2 mt-8 lg:mt-0 lg:flex lg:flex-col">
                <div class="bg-white border border-gray-300 rounded-lg shadow-md p-4 flex-grow">
                    <img src="https://via.placeholder.com/150" alt="Event Image"
                        class="w-full h-64 object-cover rounded-md mb-4">
                    <h2 class="text-xl font-bold mb-2">PERIKLINDO ELECTRIC VEHICLE SHOW (PEVS) 2024</h2>
                    <p class="text-gray-700 text-sm mb-2">
                        Jakarta International Expo Kemayoran, 30 April - 5 Mei 2024
                    </p>
                    <p class="text-gray-700 text-sm mb-2">
                        Perkumpulan Industri Kendaraan Listrik Indonesia (PERIKLINDO) bersama Dyandra Promosindo akan
                        kembali menyelenggarakan pameran mobil listrik dan otomotif turunannya PERIKLINDO Electric
                        Vehicle Show (PEVS) 2024. PEVS hadir sebagai wadah untuk menggencarkan kendaraan listrik di
                        Indonesia. Acara ini diharapkan dapat memberikan peluang bagi pengunjung untuk mendapatkan
                        wawasan mendalam tentang tren terbaru dalam kendaraan listrik, solusi pengisian daya, dan
                        berbagai aspek terkait lainnya.
                    </p>
                    <a href="#" class="text-blue-500 text-sm hover:underline">Selengkapnya...</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto py-8 px-4 overflow-hidden">
        <h1 class="text-2xl font-bold mb-6 text-black">Layanan Kota Pekalongan</h1>
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach($layanans as $layanan)
                <a href="{{ $layanan->link }}">
                    <div class="swiper-slide bg-white">
                        <div
                            class="w-full max-w-md rounded overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 border-2 border-transparent hover:border-yellow-500 h-64 flex flex-col">
                            <img class="w-16 h-16 mt-4 ml-4 object-contain"
                                src="{{ asset('storage/' . $layanan->image) }}" alt="{{ $layanan->title }}">
                            <div class="px-6 py-4 flex flex-col justify-between flex-grow">
                                <div>
                                    <div class="font-bold text-xl mb-2">{{ $layanan->title }}</div>
                                    <p class="text-gray-700 text-base">{{ $layanan->description }}</p>
                                </div>
                                <a href="{{ $layanan->link }}"
                                    class="text-blue-500 hover:underline mt-2 inline-block">Selengkapnya..</a>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
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
            loop: true,
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
    <div class="container mx-auto py-8 px-4">
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="flex flex-col md:flex-row">
                <div id="map" class="h-96 md:h-[500px] w-full md:w-1/2 relative z-0">
                    <button id="focusButton">Fokus ke Pekalongan</button>
                </div>
                <div class="mt-4 md:mt-0 md:ml-4 flex flex-col items-center md:w-1/2">
                    <img src="img/logopkl.png" alt="Image beside the map" class="w-24 mb-4">
                    <h2 class="text-xl font-semibold mb-2 text-black">Kota Pekalongan</h2>
                    <p class="text-gray-600 text-justify">Kota Pekalongan adalah salah satu kota di pesisir
                        pantai
                        utara Provinsi Jawa Tengah. Kota ini berbatasan dengan laut Jawa di utara, Kabupaten
                        Pekalongan di
                        sebelah selatan dan barat dan Kabupaten Batang di timur. Kota Pekalongan terdiri
                        atas 4 kecamatan, yakni Pekalongan Utara, Pekalongan Barat, Pekalongan Selatan dan
                        Pekalongan
                        Timur. Kota Pekalongan terletak di antara 6°50’42” - 6°55’44” LS dan 109°37’55” -
                        109°42’19” BT. Jarak Kota Pekalongan ke ibukota Provinsi Jawa Tengah sekitar 100 km
                        sebelah
                        barat Semarang. Kota Pekalongan mendapat julukan kota batik. Hal ini tidak terlepas dari
                        sejarah
                        bahwa sejak puluhan dan ratusan tahun lampau hingga sekarang, sebagian besar proses
                        produksi
                        batik Indonesia dihasilkan di kota Pekalongan.</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
    const map = L.map('map').setView([-6.8883, 109.6753], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Menambahkan marker pada peta
    L.marker([-6.8883, 109.6753]).addTo(map)
        .bindPopup('Kota Pekalongan')
        .openPopup();

    document.getElementById('focusButton').addEventListener('click', () => {
        map.setView([-6.8883, 109.6753], 13);
    });
    </script>

    </main>

    <footer class="bg-customYellow py-12 relative z-50 rounded-t-lg">
        <div class="container mx-auto px-4 max-w-screen-lg">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="flex flex-col items-start">
                    <img src="{{ asset('img/pklbunga.png') }}" alt="Logo" class="h-32 mb-6">
                    <div class="flex space-x-4 mt-4">
                        <a href="#"><img src="{{ asset('img/fb.png') }}" alt="Facebook" class="h-8"></a>
                        <a href="#"><img src="{{ asset('img/twt.png') }}" alt="Twitter" class="h-8"></a>
                        <a href="#"><img src="{{ asset('img/ig.png') }}" alt="Instagram" class="h-8"></a>
                        <a href="#"><img src="{{ asset('img/yt.png') }}" alt="YouTube" class="h-8"></a>
                    </div>
                </div>
                <div class="text-left">
                    <h2 class="text-black font-semibold mb-6">Link Terkait</h2>
                    <ul class="space-y-2">
                        <li><a href="https://www.menpan.go.id/site/" class="text-black hover:text-gray-300">KEMENPAN</a>
                        </li>
                        <li><a href="https://www.kemendagri.go.id/"
                                class="text-black hover:text-gray-300">KEMENDAGRI</a>
                        </li>
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
                    <h2 class="text-black font-semibold mb-6">Alamat</h2>
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
            <div class="text-center mt-8 text-black">
                &copy; {{ date('Y') }} Dinas Komunikasi dan Informatika Kota Pekalongan. All Rights Reserved.
            </div>
        </div>
    </footer>


</body>

</html>