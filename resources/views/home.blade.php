<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemerintah Kota Pekalongan</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <!-- CSS Internal -->
    <style>
        /* Styling for overflow scroll box */
        .overflow-y-auto {
            overflow-y: auto;
        }

        /* Adjust height as needed */
        .h-80 {
            height: 20rem; /* Adjust height for both berita & pengumuman scroll boxes */
        }
    </style>
</head>

<body class="flex flex-col min-h-screen bg-gray-100">
    <nav class="bg-yellow-600 p-4" x-data="{ isOpen: false }">
        <!-- Navigation Bar Content -->
    </nav>

    <main class="flex-1">
        <!-- Slide section -->
        <!-- Berita & Pengumuman section -->
        <div class="container mx-auto py-8 px-4">
            <div class="flex flex-col md:flex-row">
                <div class="bg-white shadow-md rounded-lg p-6 md:w-1/2">
                    <h2 class="text-xl font-semibold mb-4">Berita</h2>
                    <div class="overflow-y-auto h-80">
                        <!-- Contoh berita -->
                        <div class="mb-4">
                            <h3 class="font-semibold">Judul Berita 1</h3>
                            <p class="text-gray-600">Deskripsi singkat berita 1.</p>
                        </div>
                        <div class="mb-4">
                            <h3 class="font-semibold">Judul Berita 2</h3>
                            <p class="text-gray-600">Deskripsi singkat berita 2.</p>
                        </div>
                        <div class="mb-4">
                            <h3 class="font-semibold">Judul Berita 3</h3>
                            <p class="text-gray-600">Deskripsi singkat berita 3.</p>
                        </div>
                        <!-- Tambahkan berita lain sesuai kebutuhan -->
                    </div>
                </div>
                <div class="bg-white shadow-md rounded-lg p-6 md:w-1/2 ml-0 md:ml-4 mt-4 md:mt-0">
                    <h2 class="text-xl font-semibold mb-4">Pengumuman</h2>
                    <div class="overflow-y-auto h-80">
                        <!-- Contoh pengumuman -->
                        <div class="mb-4">
                            <h3 class="font-semibold">Judul Pengumuman 1</h3>
                            <p class="text-gray-600">Deskripsi singkat pengumuman 1.</p>
                        </div>
                        <div class="mb-4">
                            <h3 class="font-semibold">Judul Pengumuman 2</h3>
                            <p class="text-gray-600">Deskripsi singkat pengumuman 2.</p>
                        </div>
                        <div class="mb-4">
                            <h3 class="font-semibold">Judul Pengumuman 3</h3>
                            <p class="text-gray-600">Deskripsi singkat pengumuman 3.</p>
                        </div>
                        <!-- Tambahkan pengumuman lain sesuai kebutuhan -->
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-gradient-to-b from-white to-yellow-600 text-gray-800 py-10 mt-auto">
        <!-- Footer Content -->
    </footer>

    <script>
        // JavaScript Code
    </script>
</body>

</html>
