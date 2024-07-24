<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar with Correct Dropdown Structure</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
</head>

<body>
    <!-- footer -->
    <footer class="bg-yellow-500 py-4 relative z-50">
        <div class="container mx-auto px-4 md:px-16">
            <!-- Upper Section with Logos -->
            <div class="mb-4 flex flex-wrap justify-center md:justify-between items-center">
                <div class="flex items-center justify-center md:justify-start mb-4 md:mb-0">
                    <img src="{{ asset('img/pklbunga.png') }}" alt="Logo" class="h-26 max-w-full">
                </div>
                <div class="flex flex-wrap items-center space-x-2 justify-center md:justify-end">
                    <img src="https://pekalongankota.go.id/template/frontend/img/widget/logo-evp.png" alt="Logo EVP"
                        class="h-12 md:h-16 max-w-full mx-2">
                    <img src="https://pekalongankota.go.id/template/frontend/img/widget/logo-berakhlak.png"
                        alt="Logo Berakhlak" class="h-12 md:h-16 max-w-full mx-2">
                    <img src="https://api-pse.layanan.go.id/storage/badge/badge_643.png" alt="Logo Kominfo"
                        class="h-12 md:h-16 max-w-full mx-2">
                </div>
            </div>
            <!-- Middle Section with Address and Contact Info -->
            <div class="pt-4">
                <div class="flex flex-col md:flex-row justify-center md:justify-between">
                    <!-- Address Section -->
                    <div class="text-center md:text-left mb-4 md:mb-0 w-full md:w-1/2 px-4">
                        <h2 class="text-lg font-semibold mb-2">DISKOMINFO Kota Pekalongan</h2>
                        <ul class="space-y-1">
                            <li class="text-black flex items-center justify-center md:justify-start">

                                Jl. Mataram No.1, Podosugih, Kec. Pekalongan Bar., Kota Pekalongan, Jawa Tengah 51111
                            </li>
                            <li class="text-black flex items-center justify-center md:justify-start">
                                (0285) 421093
                            </li>
                            <li class="text-black flex items-center justify-center md:justify-start">

                                <a href="mailto:setda@pekalongankota.go.id"
                                    class="hover:text-gray-300">setda@pekalongankota.go.id</a>
                            </li>
                        </ul>
                        <!-- Social Media Icons -->
                        <div class="flex justify-center md:justify-start space-x-2 mt-2">
                            <a href="#"><img src="{{ asset('img/fb.png') }}" alt="Facebook" class="h-8"></a>
                            <a href="#"><img src="{{ asset('img/twt.png') }}" alt="Twitter" class="h-8"></a>
                            <a href="#"><img src="{{ asset('img/yt.png') }}" alt="YouTube" class="h-8"></a>
                            <a href="#"><img src="{{ asset('img/ig.png') }}" alt="Instagram" class="h-8"></a>
                        </div>
                    </div>
                    <!-- Link Terkait Section -->
                    <div class="text-center md:text-right w-full md:w-1/2 px-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 md:gap-4">
                            <h2 class="text-black font-semibold mb-4 text-xl col-span-1 sm:col-span-2">Link Terkait</h2>
                            <ul class="space-y-1">
                                <li><a href="https://www.menpan.go.id/site/"
                                        class="text-black hover:text-gray-300">KEMENPAN</a></li>
                                <li><a href="https://www.kemendagri.go.id/"
                                        class="text-black hover:text-gray-300">KEMENDAGRI</a></li>
                                <li><a href="https://jatengprov.go.id/" class="text-black hover:text-gray-300">PEMPROV
                                        JATENG</a></li>
                            </ul>
                            <ul class="space-y-1">
                                <li><a href="http://kipjateng.jatengprov.go.id/"
                                        class="text-black hover:text-gray-300">KIP JATENG</a></li>
                                <li><a href="https://data.go.id/" class="text-black hover:text-gray-300">PORTAL SATU
                                        DATA</a></li>
                                <li><a href="https://pekalongankota.go.id/halaman/kebijakan-privasi.html"
                                        class="text-black hover:text-gray-300">KEBIJAKAN PRIVASI</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Diskominfo Section -->
            <div class="mt-4 text-center px-4">
                <p>&copy; {{ date('Y') }} Dinas Komunikasi dan Informatika Kota Pekalongan. All Rights Reserved.</p>
            </div>
        </div>
    </footer>
</body>

</html>