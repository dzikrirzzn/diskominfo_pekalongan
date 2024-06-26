<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemerintah Kota Pekalongan</title>
    @vite('resources/css/app.css')
</head>

<body class="flex flex-col min-h-screen bg-gray-100">
    <nav class="bg-yellow-600 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-white font-bold">
            <img src="{{ asset('img/logopkl.png') }}" alt="Logo" class="h-16">                Pemerintah Kota Pekalongan
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
                        <h1 class="text-xl font-bold">Wali kota dan Wakil Wali kota Pkl Tinjau TPA Degayu</h1>
                        <p class="text-gray-600">Rencanakan Fasilitas Pengolahan Sampah</p>
                    </div>
                </div>
                <div class="mt-6">
                    <img src="path/to/image.jpg" alt="TPA Degayu" class="w-full h-64 object-cover rounded-lg">
                </div>
            </div>
        </div>
    </main>
    <footer class="bg-gray-800 text-gray-300 py-4">
        <div class="container mx-auto text-center">
            &copy; {{ date('Y') }} Pemerintah Kota Pekalongan. All rights reserved.
        </div>
    </footer>

    @vite('resources/js/app.js')
</body>

</html>