<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Pengumuman</title>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Upload Pengumuman') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        @if (session('success'))
                        <div class="bg-green-500 text-white p-4 rounded mb-4">
                            {{ session('success') }}
                        </div>
                        @endif

                        @if (session('error'))
                        <div class="bg-red-500 text-white p-4 rounded mb-4">
                            {{ session('error') }}
                        </div>
                        @endif
                        <form method="POST" action="{{ route('pengumuman.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4">
                                <label for="judul" class="block text-gray-700 text-sm font-bold mb-2">Judul:</label>
                                <input type="text" id="judul" name="judul"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    required>
                            </div>
                            <div class="mb-4">
                                <label for="tanggal" class="block text-gray-700 text-sm font-bold mb-2">Tanggal:</label>
                                <input type="text" id="tanggal" name="tanggal"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline datepicker"
                                    required>
                            </div>
                            <div class="mb-4">
                                <label for="penulis" class="block text-gray-700 text-sm font-bold mb-2">Penulis:</label>
                                <input type="text" id="penulis" name="penulis"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    required>
                            </div>
                            <div class="mb-4">
                                <label for="isi_pengumuman" class="block text-gray-700 text-sm font-bold mb-2">Isi
                                    Pengumuman:</label>
                                <textarea id="isi_pengumuman" name="isi_pengumuman" rows="5"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    required></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="gambar_pengumuman" class="block text-gray-700 text-sm font-bold mb-2">Gambar
                                    Pengumuman:</label>
                                <input type="file" id="gambar_pengumuman" name="gambar_pengumuman"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>
                            <div class="mb-4">
                                <label for="link_pdf_pengumuman" class="block text-gray-700 text-sm font-bold mb-2">Link
                                    PDF Pengumuman:</label>
                                <input type="file" id="link_pdf_pengumuman" name="link_pdf_pengumuman"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>
                            <div class="mb-4">
                                <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    Upload
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
        $(document).ready(function() {
            $('.datepicker').datepicker({
                dateFormat: 'yy-mm-dd'
            });
        });
        </script>
    </x-app-layout>
</body>

</html>
