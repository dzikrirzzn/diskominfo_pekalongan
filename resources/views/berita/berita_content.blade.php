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

    <!-- Halaman Berita -->
    <!-- Banner -->
    <div class="relative h-48 sm:h-72 md:h-72 lg:h-48 bg-cover"
        style="background-image: url('{{ asset('img/batik.png') }}');">
        <div class="absolute inset-0 bg-gray-500 opacity-20"></div>
    </div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 -mt-5 relative z-10">
        <div class="flex flex-wrap md:flex-nowrap">
            <!-- Main Content -->
            <div class="bg-white p-6 rounded-lg shadow-lg md:mb-0 w-full md:w-8/12 md:mr-4"
                style="min-height: 500px; margin-top: -5rem;">
                <div class="mx-2">
                <h1 class="text-4xl font-bold mb-2">{{ $berita->title }}</h1>
                <div class="text-gray-600 text-sm mb-4">
                    <span>Ditulis oleh {{ $berita->author }}</span> | <span>{{ $berita->date }}</span> | <span>2449
                        views</span>
                </div>
                <img class="max-h-80 max-w-96 rounded-lg mb-4 content-center" src="{{ asset('storage/' . $berita->image) }}"
                    alt="{{ $berita->title }}">
                <p class="leading-7 mb-4 text-justify">{{ $berita->subtitle }}</p>
                <p class="leading-7 mb-4 text-justify">{!! $berita->content !!}</p>
</div>
            </div>

            <!-- Sidebar -->
            <div class="w-full md:w-4/12 bg-white p-6 rounded-lg shadow-lg -mt-20"
                style="max-height: 500px; overflow-y: auto;">
                <h2 class="text-2xl font-bold mb-6 border-gray-400 border-b-2 mr-1">Berita Lainnya</h2>
                <ul class="space-y-4">
                    @foreach ($otherBerita as $berita)
                    <li class="flex items-center">
                        <a href="{{ route('berita.show', ['id' => $berita->id]) }}"
                            class="flex justify-between w-full no-underline text-black">
                            <img class="w-16 h-16 object-cover rounded-lg mr-4"
                                src="{{ asset('storage/' . $berita->image) }}" alt="{{ $berita->title }}">
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold">{{ $berita->title }}</h3>
                                <p class="text-gray-600 text-sm">{{ $berita->date }}</p>
                            </div>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
</div>

        <footer class="bg-yellow-500 py-12 relative z-50 rounded-t-lg mt-12">
    <div class="container mx-auto px-4 max-w-screen-lg">
        <div class="flex flex-col md:grid md:grid-cols-3 gap-8">
            <!-- Logo Column -->
            <div class="flex flex-col items-start md:justify-self-start">
                <img src="{{ asset('img/pklbunga.png') }}" alt="Logo" class="h-32 mb-6">
                <div class="flex space-x-4 mt-4">
                    <a href="#"><img src="{{ asset('img/fb.png') }}" alt="Facebook" class="h-8"></a>
                    <a href="#"><img src="{{ asset('img/twt.png') }}" alt="Twitter" class="h-8"></a>
                    <a href="#"><img src="{{ asset('img/ig.png') }}" alt="Instagram" class="h-8"></a>
                    <a href="#"><img src="{{ asset('img/yt.png') }}" alt="YouTube" class="h-8"></a>
                </div>
            </div>
            <!-- Link Terkait Column -->
            <div class="order-3 md:order-none md:text-left">
                <h2 class="text-black font-semibold mb-6 text-xl">Link Terkait</h2>
                <ul class="space-y-2">
                    <li><a href="https://www.menpan.go.id/site/" class="text-black hover:text-gray-300">KEMENPAN</a></li>
                    <li><a href="https://www.kemendagri.go.id/" class="text-black hover:text-gray-300">KEMENDAGRI</a></li>
                    <li><a href="https://jatengprov.go.id/" class="text-black hover:text-gray-300">PEMPROV JATENG</a></li>
                    <li><a href="http://kipjateng.jatengprov.go.id/" class="text-black hover:text-gray-300">KIP JATENG</a></li>
                    <li><a href="https://data.go.id/" class="text-black hover:text-gray-300">PORTAL SATU DATA</a></li>
                    <li><a href="https://pekalongankota.go.id/halaman/kebijakan-privasi.html" class="text-black hover:text-gray-300">KEBIJAKAN PRIVASI</a></li>
                </ul>
            </div>
            <!-- Alamat Column -->
            <div class="order-2 md:order-none text-left md:text-sm md:justify-self-end">
                <h2 class="text-black font-semibold mb-4 text-xl">Alamat</h2>
                <ul class="space-y-1">
                    <li class="text-black flex items-center">
                        <img src="{{ asset('img/alamat.png') }}" alt="Alamat" class="h-3 mr-1">
                        Jl. Mataram No.1, Podosugih, Kec. Pekalongan Bar., Kota Pekalongan, Jawa Tengah 51111
                    </li>
                    <li class="text-black flex items-center">
                        <img src="{{ asset('img/telp.png') }}" alt="Telepon" class="h-3 mr-1"> (0285) 421093
                    </li>
                    <li class="text-black flex items-center">
                        <img src="{{ asset('img/pesan.png') }}" alt="Email" class="h-3 mr-1">
                        <a href="mailto:setda@pekalongankota.go.id" class="hover:text-gray-300">setda@pekalongankota.go.id</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="text-center mt-4 md:mt-8 text-black text-lg mb-4">
            &copy; {{ date('Y') }} Dinas Komunikasi dan Informatika Kota Pekalongan. All Rights Reserved.
        </div>
    </div>
</footer>

</body>

</html>