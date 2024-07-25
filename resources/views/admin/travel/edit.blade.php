<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Travel</title>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Travel') }}
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
                        <form method="POST" action="{{ route('admin.travel.update', $travelRecommendation->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="judul" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                                <input type="text" id="judul" name="judul" value="{{ $travelRecommendation->judul }}"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    required>
                            </div>
                            <div class="mb-4">
                                <label for="sub_judul"
                                    class="block text-gray-700 text-sm font-bold mb-2">Subtitle:</label>
                                <input type="text" id="sub_judul" name="sub_judul"
                                    value="{{ $travelRecommendation->sub_judul }}"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    required>
                            </div>
                            <div class="mb-4">
                                <label for="isi" class="block text-gray-700 text-sm font-bold mb-2">Content:</label>
                                <textarea id="isi" name="isi" rows="5"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    required>{{ $travelRecommendation->isi }}</textarea>
                            </div>
                            <div class="mb-4">
                                <label for="author" class="block text-gray-700 text-sm font-bold mb-2">Author:</label>
                                <input type="text" id="author" name="author" value="{{ $travelRecommendation->author }}"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    required>
                            </div>
                            <div class="mb-4">
                                <label for="date" class="block text-gray-700 text-sm font-bold mb-2">Date:</label>
                                <input type="date" id="date" name="date" value="{{ $travelRecommendation->date }}"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline datepicker"
                                    required>
                            </div>
                            <div class="mb-4">
                                <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Gambar :</label>
                                <div class="flex items-center">
                                    <label for="image"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline cursor-pointer">
                                        Pilih File
                                    </label>
                                    <span id="file-chosen"
                                        class="ml-2 text-gray-700">{{ $travelRecommendation->image ?? 'No file chosen' }}</span>
                                </div>
                                <input type="file" id="image" name="image" class="hidden">
                            </div>
                            <div class="mb-4">
                                <label for="map_location"
                                    class="block text-gray-700 text-sm font-bold mb-2">Map:</label>
                                <input type="text" id="map_location" name="map_location"
                                    value="{{ $travelRecommendation->map_location }}"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    required>
                            </div>
                            <div class="mb-4">
                                <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    Update
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

        const imageInput = document.getElementById('image');
        const fileChosen = document.getElementById('file-chosen');

        imageInput.addEventListener('change', function() {
            fileChosen.textContent = this.files[0].name;
        });
        </script>
    </x-app-layout>

</body>

</html>