<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemerintah Kota Pekalongan</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
</head>

<body class="flex flex-col min-h-screen bg-gray-100">
    <nav class="bg-yellow-600 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-white font-bold flex items-center">
                <img src="{{ asset('img/logopkl.png') }}" alt="Logo" class="h-16 mr-3">
                Pemerintah Kota Pekalongan
            </div>
            <ul class="flex space-x-10">
                <li><a href="#" class="text-white">Beranda</a></li>
                <li><a href="#" class="text-white">Sekilas</a></li>
                <li><a href="#" class="text-white">Instansi</a></li>
                <li><a href="#" class="text-white">Berita</a></li>
                <li><a href="#" class="text-white">Galeri</a></li>
                <li><a href="#" class="text-white">Informasi</a></li>
                <li><a href="#" class="text-white">Link</a></li>
                <li><a href="#" class="text-white">Kip / PPID</a></li>
            </ul>
        </div>
    </nav>
    <main class="flex-1">
        <div class="container mx-auto py-8">
            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-xl font-bold">Wali kota dan Wakil Wali kota Pekalongan Tinjau TPA Degayu</h1>
                        <p class="text-gray-600">Rencanakan Fasilitas Pengolahan Sampah</p>
                    </div>
                </div>
                <div class="mt-6">
                    <img src="path/to/image.jpg" alt="TPA Degayu" class="w-full h-64 object-cover rounded-lg">
                </div>
            </div>
        </div>
        <div class="p-16">
            <div class="max-w-4xl mx-auto relative" x-data="{
                activeSlide: 1,
                slides: [
                    { id: 1, title: 'Hello 1', body: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, magni a veniam minus nemo expedita eos veritatis vitae voluptate porro. Quo velit eius ea ipsam? Temporibus placeat dolore quisquam quod.'},
                    { id: 2, title: 'Hello 2', body: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, magni a veniam minus nemo expedita Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, molestias.'},
                    { id: 3, title: 'Hello 3', body: 'Lorem ipsum dolor Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, molestias.'},
                    { id: 4, title: 'Hello 4', body: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, magni a veniam minus Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, molestias.'},
                    { id: 5, title: 'Hello 5', body: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, molestias.'}
                ],
                loop(){
                    setInterval(() => {
                        this.activeSlide = this.activeSlide === 5 ? 1 : this.activeSlide + 1
                    }, 2000)
                }
            }" x-init="loop">
                <!-- Carousel -->
                <template x-for="slide in slides" :key="slide.id">
                    <div x-show="activeSlide === slide.id" class="p-24 h-80 flex items-center bg-slate-500 text-white rounded-lg">
                        <div>
                            <h2 class="font-bold text-2xl" x-text="slide.title"></h2>
                            <p x-text="slide.body" class="text-base"></p>
                        </div>
                    </div>
                </template>
                <!-- Back/Next Buttons -->
                <div class="absolute inset-0 flex">
                    <div class="flex items-center justify-end w-1/2">
                        <button x-on:click="activeSlide = activeSlide === 1 ? slides.length : activeSlide - 1" class="bg-slate-100 text-slate-500 hover:bg-blue-500 hover:text-white font-bold rounded-full w-12 h-12 shadow flex justify-center items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                            </svg>
                        </button>
                    </div>
                    <div class="flex items-center justify-start w-1/2">
                        <button x-on:click="activeSlide = activeSlide === slides.length ? 1 : activeSlide + 1" class="bg-slate-100 text-slate-500 hover:bg-blue-500 hover:text-white font-bold rounded-full w-12 h-12 shadow flex justify-center items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                            </svg>
                        </button>
                    </div>
                </div>
                <!-- Pagination Buttons -->
                <div class="absolute w-full flex items-center justify-center px-4">
                    <template x-for="slide in slides" :key="slide.id">
                        <button class="flex w-4 h-2 mt-4 mx-2 mb-2 rounded-full overflow-hidden transition colors duration-200 ease-out hover:bg-slate-600 hover:shadow-lg" :class="{
                        'bg-blue-600' : activeSlide === slide.id,
                        'bg-slate-300' : activeSlide !== slide.id,
                        }" x-on:click="activeSlide = slide.id"></button>
                    </template>
                </div>
            </div>
        </div>
        <!-- Add the map div here -->
        <div id="map" style="height: 400px; margin-top: 2rem;"></div>
    </main>
    <footer class="bg-yellow-600 text-gray-800 py-10">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="flex flex-col items-center md:items-start">
                    <img src="{{ asset('img/pklbunga.png') }}" alt="Logo" class="h-16 mb-2">
                    <p class="text-black">Pemerintah Kota Pekalongan</p>
                    <div class="flex space-x-4 mt-4">
                        <a href="#"><img src="{{ asset('img/fb.png') }}" alt="" class="h-6"></a>
                        <a href="#"><img src="{{ asset('img/twt.png') }}" alt="" class="h-6"></a>
                        <a href="#"><img src="{{ asset('img/ig.png') }}" alt="" class="h-6"></a>
                        <a href="#"><img src="{{ asset('img/yt.png') }}" alt="" class="h-6"></a>
                    </div>
                </div>
                <div class="text-center md:text-left">
                    <h2 class="text-black font-semibold mb-4">Navigasi</h2>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-black hover:text-gray-300">rumah</a></li>
                        <li><a href="#" class="text-black hover:text-gray-300">Sekilas</a></li>
                        <li><a href="#" class="text-black hover:text-gray-300">Instansi</a></li>
                        <li><a href="#" class="text-black hover:text-gray-300">Berita</a></li>
                        <li><a href="#" class="text-black hover:text-gray-300">Galeri</a></li>
                        <li><a href="#" class="text-black hover:text-gray-300">Informasi</a></li>
                        <li><a href="#" class="text-black hover:text-gray-300">Link</a></li>
                        <li><a href="#" class="text-black hover:text-gray-300">Kip / PPID</a></li>
                    </ul>
                </div>
                <div class="text-center md:text-left">
                    <h2 class="text-black font-semibold mb-4">Kontak Kami</h2>
                    <ul class="space-y-2">
                        <li class="text-black"><img src="{{ asset('img/alamat.png') }}" alt="" class="h-6">Alamat: Jl.
                            Nusantara No. 1, Pekalongan</li>
                        <li class="text-black"><img src="{{ asset('img/telp.png') }}" alt="" class="h-6">Telepon: (0285)
                            123456</li>
                        <li class="text-black"><img src="{{ asset('img/pesan.png') }}" alt="" class="h-6">Email:
                            info@pekalongan.go.id</li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    @vite('resources/js/app.js')
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        // Initialize the map
        var map = L.map('map').setView([-6.888, 109.675], 13); // Coordinates for Pekalongan

        // Add the OpenStreetMap tiles
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Add a marker for Pekalongan
        L.marker([-6.888, 109.675]).addTo(map)
            .bindPopup('Pekalongan')
            .openPopup();
    </script>
</body>

</html>