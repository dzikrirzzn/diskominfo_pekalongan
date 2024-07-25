<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Galeri</title>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Upload Galeri') }}
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
                        <form method="POST" action="{{ route('admin.galeri.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4">
                                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                                <input type="text" id="title" name="title"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    required>
                            </div>
                            <div class="mb-4">
                                <label for="subtitle"
                                    class="block text-gray-700 text-sm font-bold mb-2">Subtitle:</label>
                                <input type="text" id="subtitle" name="subtitle"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    required>
                            </div>
                            <div class="mb-4">
                                <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Content:</label>
                                <textarea id="content" name="content" rows="5"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    required></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="author" class="block text-gray-700 text-sm font-bold mb-2">Author:</label>
                                <input type="text" id="author" name="author" value="{{Auth::user()->name}}" readonly
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    required>
                            </div>
                            <div class="mb-4">
                                <label for="date" class="block text-gray-700 text-sm font-bold mb-2">Date:</label>
                                <input type="date" id="date" name="date"
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
                                    <span id="file-chosen" class="ml-2 text-gray-700">No file chosen</span>
                                </div>
                                <input type="file" accept="image/jpeg,image/png,image/jpg" id="image" name="image" class="hidden">
                            </div>
                            <div class="mb-4">
                                <label for="link" class="block text-gray-700 text-sm font-bold mb-2">Link:</label>
                                <input type="url" id="link" name="link"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    required>
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
        CKEDITOR.replace('content');

        const imageInput = document.getElementById('image');
        const fileChosen = document.getElementById('file-chosen');

        imageInput.addEventListener('change', function() {
            fileChosen.textContent = this.files[0].name;
        });
        </script>
    </x-app-layout>

</body>

</html>