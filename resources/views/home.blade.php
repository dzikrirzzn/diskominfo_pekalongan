<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemerintah Kota Pekalongan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
</head>

<body class="bg-gray-100">
    <nav class="bg-yellow-600 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-black font-bold flex items-center">
                <img src="img/logopkl.png" alt="Logo" class="h-16 mr-3">
                <div class="flex flex-col">
                    <div class="text-lg">Pemerintah</div>
                    <div class="text-lg">Kota Pekalongan</div>
                </div>
            </div>
            <button class="lg:hidden text-black focus:outline-none">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16" />
                    <path class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <div class="w-full lg:flex lg:items-center lg:w-auto">
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

    <main>
        <div class="relative overflow-hidden h-[88vh]">
            <div class="absolute inset-0 flex items-center justify-center">
                <div class="mx-auto p-8 bg-slate-500 text-white">
                    <h2 class="font-bold text-3xl mb-4">Hello</h2>
                    <p class="text-lg">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
            </div>
        </div>

        <div class="container mx-auto py-8">
            <div class="bg-white shadow-md rounded-lg p-6 flex flex-col md:flex-row">
                <div id="map" class="h-96 md:h-[500px] w-full md:w-1/2 relative z-0">
                    <button id="focusButton"
                        class="absolute bottom-4 left-4 z-10 bg-yellow-500 text-white px-4 py-2 rounded">Fokus ke
                        Pekalongan</button>
                </div>
                <div class="mt-4 md:mt-0 md:ml-4 flex flex-col items-center md:w-1/2">
                    <img src="img/logopkl.png" alt="Image beside the map" class="w-24 mb-4">
                    <h2 class="text-xl font-semibold mb-2">Pemerintah Kota Pekalongan</h2>
                    <p class="text-gray-600 text-justify">Kota Pekalongan adalah salah satu kota di pesisir pantai utara
                        Provinsi Jawa Tengah. Kota ini berbatasan dengan laut Jawa di utara, Kabupaten Pekalongan di
                        sebelah selatan dan barat dan Kabupaten Batang di timur. Kota Pekalongan terdiri atas 4
                        kecamatan, yakni Pekalongan Utara, Pekalongan Barat, Pekalongan Selatan dan Pekalongan Timur. Kota
                        Pekalongan terletak di antara 6°50’42” - 6°55’44” LS dan 109°37’55” - 109°42’19” BT. Jarak Kota
                        Pekalongan ke ibukota Provinsi Jawa Tengah sekitar 100 km sebelah barat Semarang. Kota Pekalongan
                        mendapat julukan kota batik. Hal ini tidak terlepas dari sejarah bahwa sejak puluhan dan ratusan
                        tahun lampau hingga sekarang, sebagian besar proses produksi batik Indonesia dihasilkan di kota
                        Pekalongan.</p>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-gradient-to-b from-white to-yellow-600 text-gray-800 py-10">
        <div class="container mx-auto max-w-screen-lg px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="flex flex-col items-start">
                    <img src="img/pklbunga.png" alt="Logo" class="h-32 mb-4">
                    <div class="flex space-x-4 mt-4">
                        <a href="#"><img src="img/fb.png" alt="Facebook" class="h-8"></a>
                        <a href="#"><img src="img/twt.png" alt="Twitter" class="h-8"></a>
                        <a href="#"><img src="img/ig.png" alt="Instagram" class="h-8"></a>
                        <a href="#"><img src="img/yt.png" alt="YouTube" class="h-8"></a>
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
                        <li><a href="http://kipjateng.jatengprov.go.id/"
                                class="text-black hover:text-gray-300">KIP
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
                            <img src="img/alamat.png" alt="Alamat" class="h-4 mr-2">
                            Jl. Mataram No.1, Podosugih, Kec. Pekalongan Bar., Kota Pekalongan, Jawa Tengah 51111
                        </li>
                        <li class="text-black flex items-center">
                            <img src="img/telp.png" alt="Telepon" class="h-4 mr-2"> (0285) 421093
                        </li>
                        <li class="text-black flex items-center">
                            <img src="img/pesan.png" alt="Email" class="h-4 mr-2">
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

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var map = L.map('map').setView([-6.8915, 109.6753], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            var pointsOfInterest = [{
                coords: [-6.887, 109.675],
                name: 'Kota Pekalongan'
            }];

            pointsOfInterest.forEach(function (point) {
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

            document.getElementById('focusButton').addEventListener('click', function () {
                map.setView([-6.888, 109.675], 13);
            });
        });
    </script>
</body>

</html>
