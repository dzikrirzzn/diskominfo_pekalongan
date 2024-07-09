<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download Button Example</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-800">
    <nav class="bg-yellow-600 p-2">
        <div class="container mx-auto flex justify-between items-center">
            <a href="#">
                <div class="text-black font-bold flex items-center">
                    <img src="img/logopkl.png" alt="Logo" class="h-12 mr-3">
                    <div class="flex flex-col">
                        <div class="text-sm">Pemerintah</div>
                        <div class="text-sm">Kota Pekalongan</div>
                    </div>
                </div>
            </a>
            <button class="block lg:hidden">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <div class="w-full lg:flex lg:items-center lg:w-auto hidden lg:block">
                <ul class="lg:flex space-y-2 lg:space-y-0 lg:space-x-10">
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
    <div class="container mx-auto py-8 px-4">
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="flex flex-col md:flex-row">
                <div id="map" class="h-96 md:h-[500px] w-full md:w-1/2"></div>
                <div class="mt-4 md:mt-0 md:ml-4 flex flex-col items-center md:w-1/2">
                    <img src="img/logopkl.png" alt="Image beside the map" class="w-24 mb-4">
                    <h2 class="text-xl font-semibold mb-2">Kota Pekalongan</h2>
                    <p class="text-gray-600 text-justify">Kota Pekalongan adalah salah satu kota di pesisir pantai
                        utara Provinsi Jawa Tengah. Kota ini berbatasan dengan laut Jawa di utara, Kabupaten Pekalongan di
                        sebelah selatan dan barat dan Kabupaten Batang di timur. Kota Pekalongan terdiri
                        atas 4 kecamatan, yakni Pekalongan Utara, Pekalongan Barat, Pekalongan Selatan dan Pekalongan
                        Timur. Kota Pekalongan terletak di antara 6°50’42” - 6°55’44” LS dan 109°37’55” -
                        109°42’19” BT. Jarak Kota Pekalongan ke ibukota Provinsi Jawa Tengah sekitar 100 km sebelah
                        barat Semarang. Kota Pekalongan mendapat julukan kota batik. Hal ini tidak terlepas dari sejarah
                        bahwa sejak puluhan dan ratusan tahun lampau hingga sekarang, sebagian besar proses produksi
                        batik Indonesia dihasilkan di kota Pekalongan.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto p-4">
        <div class="flex flex-col md:flex-row md:space-x-4">
            <!-- Main Content -->
            <div class="flex-1">
                <div class="bg-white p-6 rounded-lg shadow-md mb-6">
                    <h1 class="text-3xl font-bold mb-2">Kepemerintahan Kota Pekalongan</h1>
                    <div class="text-gray-600 text-sm mb-4">
                        <span>Ditulis oleh Tim Komunikasi Publik</span> | |
                        <span>2449 views</span>
                    </div>
                    <img class="w-full h-auto rounded-lg mb-4" src="https://via.placeholder.com/800x400"
                        alt="Struktur Pemerintah Kota Pekalongan">
                    <p class="leading-7 mb-4 text-justify">
                    <p class="leading-7 mb-4 font-bold">Sejarah Singkat</p>
                    <p class="leading-7 mb-4 text-justify">Pekalongan adalah salah satu kota di pesisir pantai utara Provinsi Jawa Tengah. Kota ini berbatasan dengan laut jawa di utara, Kabupaten Pekalongan di sebelah selatan dan barat dan Kabupaten Batang di timur. Kota Pekalongan terdiri atas 4 kecamatan, yakni Pekalongan Utara, Pekalongan Barat, Pekalongan Selatan dan Pekalongan Timur. Kota Pekalongan terletak di jalur pantai Utara Jawa yang menghubungkan Jakarta-Semarang-Surabaya. Kota Pekalongan berjarak 384 km di timur Jakarta dan 101 km sebelah barat Semarang. Kota Pekalongan mendapat julukan kota batik. Hal ini tidak terlepas dari sejarah bahwa sejak puluhan dan ratusan tahun lampau hingga sekarang, sebagian besar proses produksi batik Pekalongan dikerjakan di rumah-rumah. Akibatnya batik Pekalongan menyatu erat dengan kehidupan masyarakat Pekalongan. Batik telah menjadi nafas penghidupan masyarakat Pekalongan dan terbukti tetap dapat eksis dan tidak menyerah pada pengaruh perkembangan jaman dan teknologi. Sampai saat ini, sebagian besar proses produksi batik Pekalongan dikerjakan di rumah-rumah. Akibatnya batik Pekalongan menyatu erat dengan kehidupan masyarakat Pekalongan.</p>
                    <h2 class="text-2xl font-bold mb-2">Struktur Pemerintah</h2>
                    <p class="leading-7 mb-4 text-justify">Walikota Pekalongan adalah pemimpin tertinggi dalam pemerintahan Kota Pekalongan. Berikut adalah struktur pemerintahan Kota Pekalongan:</p>
                    <ul class="list-disc list-inside mb-4">
                        <li>Walikota</li>
                        <li>Wakil Walikota</li>
                        <li>Sekretaris Daerah</li>
                        <li>Asisten Pemerintahan</li>
                        <li>Asisten Perekonomian dan Pembangunan</li>
                        <li>Asisten Administrasi Umum</li>
                    </ul>
                    <p class="leading-7 mb-4">Setiap bagian dalam struktur pemerintahan memiliki tugas dan tanggung jawab masing-masing dalam menjalankan roda pemerintahan dan pelayanan kepada masyarakat.</p>
                    <p class="leading-7 mb-4">Struktur pemerintahan di Kota Pekalongan juga didukung oleh berbagai dinas dan badan yang membantu pelaksanaan tugas dan fungsi pemerintah dalam berbagai bidang seperti pendidikan, kesehatan, perhubungan, pekerjaan umum, dan lain sebagainya. Selain itu, peran serta masyarakat dalam pembangunan juga sangat penting untuk mencapai tujuan bersama dalam mewujudkan Kota Pekalongan yang lebih baik.</p>
                    <img class="w-full h-auto rounded-lg mb-4" src="https://via.placeholder.com/800x400"
                        alt="Struktur Pemerintah Kota Pekalongan">
                </div>
            </div>

            <!-- Sidebar -->
            <aside class="md:w-1/4">
                <div class="bg-white p-4 rounded-lg shadow-md mb-6">
                    <h2 class="text-xl font-bold mb-4">Artikel Terbaru</h2>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-600 hover:text-black">Inovasi Batik Pekalongan di Era
                                Modern</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-black">Pameran Batik Internasional</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-black">Kerajinan Tangan Asli Pekalongan</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-black">Pariwisata di Kota Pekalongan</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-black">Kuliner Khas Pekalongan</a></li>
                    </ul>
                </div>

                <div class="bg-white p-4 rounded-lg shadow-md">
                    <h2 class="text-xl font-bold mb-4">Agenda</h2>
                    <ul class="space-y-2">
                        <li>
                            <p class="text-gray-600 text-sm">24 Jul 2024</p>
                            <a href="#" class="text-gray-600 hover:text-black">Festival Batik Pekalongan</a>
                        </li>
                        <li>
                            <p class="text-gray-600 text-sm">15 Aug 2024</p>
                            <a href="#" class="text-gray-600 hover:text-black">Pameran UKM Pekalongan</a>
                        </li>
                        <li>
                            <p class="text-gray-600 text-sm">10 Sep 2024</p>
                            <a href="#" class="text-gray-600 hover:text-black">Pertunjukan Seni Pekalongan</a>
                        </li>
                        <li>
                            <p class="text-gray-600 text-sm">30 Sep 2024</p>
                            <a href="#" class="text-gray-600 hover:text-black">Seminar Kebudayaan</a>
                        </li>
                    </ul>
                </div>
            </aside>
        </div>
    </div>

    <div class="container mx-auto py-8 px-4">
        <div class="bg-white shadow-md rounded-lg p-6 text-center">
            <h2 class="text-xl font-semibold mb-4">Unduh Dokumen</h2>
            <p class="mb-4 text-gray-600">Klik tombol di bawah ini untuk mengunduh dokumen terkait informasi tentang Kota Pekalongan.</p>
            <a href="path/to/your/document.pdf" download="Informasi_Pekalongan.pdf">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Unduh Dokumen
                </button>
            </a>
        </div>
    </div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        // Wait for the document to be fully loaded
        document.addEventListener('DOMContentLoaded', () => {
            console.log("Initializing map...");

            // Initialize the map and set its view to Pekalongan's coordinates
            const map = L.map('map').setView([-6.8896, 109.6745], 13);

            // Add OpenStreetMap tiles to the map
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 18,
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);
        });
    </script>
</body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalender Event</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .calendar td {
            height: 3rem;
            width: 3rem;
            text-align: center;
        }
    </style>
</head>
<body class="bg-gray-100 p-5">
    <div class="max-w-screen-lg mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="flex">
            <!-- Calendar Section -->
            <div class="w-1/3 bg-blue-900 text-white p-6">
                <div class="flex justify-between items-center mb-6">
                    <button id="prev-month" class="text-xl">&lt;</button>
                    <div id="month-year" class="text-2xl font-bold"></div>
                    <button id="next-month" class="text-xl">&gt;</button>
                </div>
                <table class="w-full text-center calendar">
                    <thead>
                        <tr>
                            <th class="py-2">Mon</th>
                            <th class="py-2">Tue</th>
                            <th class="py-2">Wed</th>
                            <th class="py-2">Thu</th>
                            <th class="py-2">Fri</th>
                            <th class="py-2">Sat</th>
                            <th class="py-2">Sun</th>
                        </tr>
                    </thead>
                    <tbody id="calendar-days"></tbody>
                </table>
                <div class="mt-6">
                    <div class="flex items-center mb-4">
                        <img src="path/to/flona.jpg" alt="Flona Jakarta 2024" class="w-12 h-12 mr-3">
                        <div>
                            <h4 class="text-lg font-semibold">Flona Jakarta 2024</h4>
                            <p class="text-sm">05 Jul - 02 Aug</p>
                        </div>
                    </div>
                    <div class="flex items-center mb-4">
                        <img src="path/to/jakarta_fair.jpg" alt="Jakarta Fair 2024" class="w-12 h-12 mr-3">
                        <div>
                            <h4 class="text-lg font-semibold">Jakarta Fair 2024</h4>
                            <p class="text-sm">12 Jun - 14 Jul</p>
                        </div>
                    </div>
                    <div class="flex items-center mb-4">
                        <img src="path/to/kumpul_bocah.jpg" alt="Kumpul Bocah" class="w-12 h-12 mr-3">
                        <div>
                            <h4 class="text-lg font-semibold">Kumpul Bocah</h4>
                            <p class="text-sm">01 Jul - 07 Jul</p>
                        </div>
                    </div>
                    <div class="flex items-center mb-4">
                        <img src="path/to/treasure_tour.jpg" alt="TREASURE Relay Tour" class="w-12 h-12 mr-3">
                        <div>
                            <h4 class="text-lg font-semibold">TREASURE Relay Tour [Reboot]</h4>
                            <p class="text-sm">29 Jun - 30 Jun</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Event Detail Section -->
            <div class="w-2/3 p-6">
                <img src="path/to/flona_poster.jpg" alt="Flona Jakarta 2024" class="w-full h-auto mb-6">
                <h2 class="text-2xl font-bold mb-4">Flona Jakarta 2024</h2>
                <p class="mb-4">Taman Lapangan Banteng, 5 Juli - 2 Agustus 2024</p>
                <p class="mb-4">Pameran tahunan FLONA (Flora dan Fauna) bertajuk Jakarta Global Hijau Mempesona akan berlangsung meriah di Taman Lapangan Banteng. Beragam jenis tanaman hias dan buah, hewan peliharaan hingga kuliner nusantara akan dihadirkan. Selain itu, pengunjung juga bisa menyaksikan show air mancur yang ada di Taman Lapangan Banteng. Tunggu apa lagi, catat jadwal acaranya ya!!</p>
                <a href="#" class="text-blue-900 hover:underline">Selengkapnya..</a>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const calendarDaysElement = document.getElementById('calendar-days');
            const monthYearElement = document.getElementById('month-year');
            let currentMonth = new Date().getMonth();
            let currentYear = new Date().getFullYear();

            const months = [
                "January", "February", "March", "April", "May", "June",
                "July", "August", "September", "October", "November", "December"
            ];

            function generateCalendar(month, year) {
                const firstDay = new Date(year, month, 1).getDay();
                const daysInMonth = new Date(year, month + 1, 0).getDate();
                calendarDaysElement.innerHTML = '';
                monthYearElement.innerHTML = `${months[month]} ${year}`;

                let date = 1;
                for (let i = 0; i < 6; i++) {
                    const row = document.createElement('tr');

                    for (let j = 0; j < 7; j++) {
                        const cell = document.createElement('td');
                        cell.classList.add('py-2');

                        if (i === 0 && j < (firstDay - 1)) {
                            cell.innerHTML = '';
                        } else if (date > daysInMonth) {
                            break;
                        } else {
                            cell.innerHTML = date;
                            date++;
                        }

                        row.appendChild(cell);
                    }

                    calendarDaysElement.appendChild(row);
                }
            }

            document.getElementById('prev-month').addEventListener('click', function () {
                currentMonth--;
                if (currentMonth < 0) {
                    currentMonth = 11;
                    currentYear--;
                }
                generateCalendar(currentMonth, currentYear);
            });

            document.getElementById('next-month').addEventListener('click', function () {
                currentMonth++;
                if (currentMonth > 11) {
                    currentMonth = 0;
                    currentYear++;
                }
                generateCalendar(currentMonth, currentYear);
            });

            generateCalendar(currentMonth, currentYear);
        });
    </script>
</body>
</html>
