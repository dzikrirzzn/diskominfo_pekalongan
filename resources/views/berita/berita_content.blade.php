<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Berita - Pemerintah Kota Pekalongan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 text-gray-800">
    <nav class="bg-yellow-600 p-2" x-data="{ isOpen: false }">
        <div class="container mx-auto flex justify-between items-center flex-wrap">
            <a href="{{ route('home') }}">
                <div class="text-black font-bold flex items-center">
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

    <div class="container mx-auto p-4">
        <div class="flex flex-col md:flex-row md:space-x-4">
            <!-- Main Content -->
            <div class="flex-1">
                <div class="bg-white p-6 rounded-lg shadow-md mb-6">
                    @foreach ($allBerita as $berita)
                    @if ($berita instanceof \App\Models\HeadlineBerita)
                    <h1 class="text-3xl font-bold mb-2">{{ $berita->title }}
                    </h1>
                    <div class="text-gray-600 text-sm mb-4">
                        <span>Ditulis oleh {{ $berita->author }}</span> | <span> {{ $berita->date }}</span> |
                        <span>2449 views</span>
                    </div>
                    <img class="w-full h-auto rounded-lg mb-4" src="https://via.placeholder.com/800x400"
                        alt="Warga Terdampak Banjir di Pengungsian">
                    <p class="leading-7 mb-4">{{ $berita->subtitle }}</p>
                    <p class="leading-7 mb-4">{{ $berita->content }}</p>
                    @endif
                    @endforeach
                </div>
            </div>
            <!-- Sidebar -->
            <div class="w-full md:w-1/3">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-2xl font-bold mb-4">Berita Populer</h2>
                    <ul class="space-y-4">
                        <li class="flex items-center">
                            <img class="w-16 h-16 object-cover rounded-lg mr-4" src="https://via.placeholder.com/60"
                                alt="Popular News 1">
                            <div>
                                <h3 class="text-lg font-semibold">Kerja Bakti Bersama, Gotong Royong Peduli Lingkungan
                                    Terus Digalakkan</h3>
                                <p class="text-gray-600 text-sm">16 Maret 2020</p>
                            </div>
                        </li>
                        <li class="flex items-center">
                            <img class="w-16 h-16 object-cover rounded-lg mr-4" src="https://via.placeholder.com/60"
                                alt="Popular News 2">
                            <div>
                                <h3 class="text-lg font-semibold">Guru Kreatif, Pembelajaran Daring Dibuat Menyenangkan
                                </h3>
                                <p class="text-gray-600 text-sm">1 April 2020</p>
                            </div>
                        </li>
                        <li class="flex items-center">
                            <img class="w-16 h-16 object-cover rounded-lg mr-4" src="https://via.placeholder.com/60"
                                alt="Popular News 3">
                            <div>
                                <h3 class="text-lg font-semibold">Tangkis Virus Corona Dengan Terapkan Germas</h3>
                                <p class="text-gray-600 text-sm">5 Maret 2020</p>
                            </div>
                        </li>
                        <li class="flex items-center">
                            <img class="w-16 h-16 object-cover rounded-lg mr-4" src="https://via.placeholder.com/60"
                                alt="Popular News 4">
                            <div>
                                <h3 class="text-lg font-semibold">Cegah Manipulasi Suara, KPU Manfaatkan Aplikasi
                                    Sirekap</h3>
                                <p class="text-gray-600 text-sm">18 Desember 2023</p>
                            </div>
                        </li>
                        <li class="flex items-center">
                            <img class="w-16 h-16 object-cover rounded-lg mr-4" src="https://via.placeholder.com/60"
                                alt="Popular News 5">
                            <div>
                                <h3 class="text-lg font-semibold">Inovasi Guru Mengajar Yang Kreatif dan Menyenangkan
                                    Diperlukan Siswa Selama Belajar Dari Rumah</h3>
                                <p class="text-gray-600 text-sm">13 Agustus 2020</p>
                            </div>
                        </li>
                        <!-- Add more popular news items as needed -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
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

</body>

</html>