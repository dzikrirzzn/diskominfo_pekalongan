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
                    class="bg-slate-100 hover:text-yellow-500 hover:text-white font-bold rounded-full w-12 h-12 shadow flex justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-10 h-10 opacity-25">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button @click="activeSlide = activeSlide === slides.length ? 1 : activeSlide + 1"
                    class="bg-slate-100 hover:text-yellow-500 hover:text-white font-bold rounded-full w-12 h-12 shadow flex justify-center items-center">
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

        <!-- Berita & Pengumuman -->
        <div class="container mx-auto py-8 px-4 h-screen">
    <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4 h-full">
        <!-- Berita Section -->
        <div class="flex-[3] bg-yellow-500 rounded-lg p-4 h-full flex flex-col">
            <h2 class="text-xl font-semibold mb-4">Berita</h2>
            <div class="flex space-x-4 mb-4">
                <!-- Image Box -->
                <div class="flex gap-2">
                    <div class="flex-1 bg-white rounded-lg shadow overflow-hidden relative">
                        <img class="w-full h-full object-cover transform hover:scale-110 transition-transform duration-300" src="https://awsimages.detik.net.id/community/media/visual/2024/04/16/puluhan-balon-tambat-yang-akan-dipamerkan-saat-festival-balon-tambat-2024-di-pekalongan-2_169.jpeg?w=1200" alt="Pekalongan Balloon Festival">
                        <div class="absolute bottom-0 w-full p-2 bg-black bg-opacity-50 text-white text-center">
                            <h3 class="text-lg font-bold hover:text-yellow-500 transition-colors duration-300">Pekalongan Balloon Festival</h3>
                        </div>
                    </div>
                    <div class="flex-1 bg-white rounded-lg shadow overflow-hidden relative">
                        <img class="w-full h-full object-cover transform hover:scale-110 transition-transform duration-300" src="https://cdn.antaranews.com/cache/1200x800/2017/10/20171009antarafoto-pawai-pekan-batik-pekalongan-071017-hpp-5.jpg" alt="Another Festival Image">
                        <div class="absolute bottom-0 w-full p-2 bg-black bg-opacity-50 text-white text-center">
                            <h3 class="text-lg font-bold hover:text-yellow-500 transition-colors duration-300">Festival Batik Pekalongan</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-md p-4 overflow-y-scroll flex-1 mb-1">
                <div class="flex justify-between mb-2">
                    <span class="font-semibold">Terbaru</span>
                    <span class="font-semibold">Populer</span>
                </div>
                <ul class="space-y-2">
                    <li class="flex justify-between text-sm">
                        <span class="hover:text-yellow-500">35 Ton Sampah Telah Dibersihkan Di Kawasan Kota</span>
                        <span class="text-gray-500">Lintas Kota | 23/06/2024 10:35</span>
                    </li>
                    <li class="flex justify-between text-sm">
                        <span class="hover:text-yellow-500">15 Ribu Pelari Meriahkan 2024</span>
                        <span class="text-gray-500">Pekalongan Hari Ini | 23/06/2024 09:57</span>
                    </li>
                    <li class="flex justify-between text-sm">
                        <span class="hover:text-yellow-500">Pekalongan Cerah Sepanjang Hari Ini</span>
                        <span class="text-gray-500">Pekalongan Hari Ini | 23/06/2024 07:09</span>
                    </li>
                    <li class="flex justify-between text-sm">
                        <span class="hover:text-yellow-500">Malam Jaya Raya Sukses Pukau Pengunjung Pekalongan</span>
                        <span class="text-gray-500">Wisata | 23/06/2024 01:05</span>
                    </li>
                    <li class="flex justify-between text-sm">
                        <span class="hover:text-yellow-500">Festival Musik di Pantai Mendapat Sambutan Meriah</span>
                        <span class="text-gray-500">Hiburan | 22/06/2024 18:45</span>
                    </li>
                    <li class="flex justify-between text-sm">
                        <span class="hover:text-yellow-500">Kampanye Hijau di Bagian Selatan</span>
                        <span class="text-gray-500">Lingkungan | 22/06/2024 14:30</span>
                    </li>
                    <li class="flex justify-between text-sm">
                        <span class="hover:text-yellow-500">Peluncuran Buku Baru di Perpustakaan Kota</span>
                        <span class="text-gray-500">Literatur | 22/06/2024 11:20</span>
                    </li>
                    <li class="flex justify-between text-sm">
                        <span class="hover:text-yellow-500">Pameran Seni Rupa di Galeri Batik</span>
                        <span class="text-gray-500">Seni | 22/06/2024/09:00</span>
                    </li>
                    <li class="flex justify-between text-sm">
                        <span class="hover:text-yellow-500">Pawai Budaya di Pusat Kota</span>
                        <span class="text-gray-500">Budaya | 22/06/2024/07:00</span>
                    </li>
                    <li class="flex justify-between text-sm">
                        <span class="hover:text-yellow-500">Lomba Masak di Taman Kota</span>
                        <span class="text-gray-500">Kuliner | 21/06/2024 16:45</span>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Pengumuman Section -->
        <div class="flex-[1] bg-yellow-500 rounded-lg p-4 h-full flex flex-col">
    <h2 class="text-xl font-semibold mb-4">Pengumuman</h2>
    <div class="bg-white rounded-lg shadow-md p-4 overflow-y-scroll flex-1">
        <ul class="space-y-2">
            <li class="flex justify-between text-sm">
                <span class="hover:text-yellow-500">35 Ton Sampah Telah Dibersihkan Di Kawasan Alun-Alun</span>
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
                <span class="hover:text-yellow-500">Malam Jaya Raya Sukses Pukau Pengunjung Pekalongan</span>
                <span class="text-gray-500 text-right">Wisata | 23/06/2024 01:05</span>
            </li>
            <li class="flex justify-between text-sm">
                <span class="hover:text-yellow-500">Pemadaman Listrik Terjadwal di Wilayah Degayu</span>
                <span class="text-gray-500 text-right">Pengumuman | 23/06/2024 12:00</span>
            </li>
            <li class="flex justify-between text-sm">
                <span class="hover:text-yellow-500">Perubahan Jadwal KRL Pekalongan</span>
                <span class="text-gray-500 text-right">Pengumuman | 23/06/2024 11:00</span>
            </li>
            <li class="flex justify-between text-sm">
                <span class="hover:text-yellow-500">Pengalihan Arus Lalu Lintas di Area Alun-Alun</span>
                <span class="text-gray-500 text-right">Pengumuman | 23/06/2024 10:00</span>
            </li>
            <li class="flex justify-between text-sm">
                <span class="hover:text-yellow-500">Peringatan Hari Kemerdekaan di Alun-Alun Pekalongan</span>
                <span class="text-gray-500 text-right">Pengumuman | 23/06/2024 09:00</span>
            </li>
            <li class="flex justify-between text-sm">
                <span class="hover:text-yellow-500">Pameran Buku Pekalongan di Toko Buku Salemba</span>
                <span class="text-gray-500 text-right">Pengumuman | 23/06/2024 08:00</span>
            </li>
            <li class="flex justify-between text-sm">
                <span class="hover:text-yellow-500">Perbaikan Jalan di Tol Pekalongan-Batang</span>
                <span class="text-gray-500 text-right">Pengumuman | 23/06/2024 07:00</span>
            </li>
            <li class="flex justify-between text-sm">
                <span class="hover:text-yellow-500">Penutupan Sementara Beberapa Jalan di Pusat Kota</span>
                <span class="text-gray-500 text-right">Pengumuman | 22/06/2024 18:30</span>
            </li>
            <li class="flex justify-between text-sm">
                <span class="hover:text-yellow-500">Pengumuman Pelatihan Kerja di Balai Latihan Kerja</span>
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
