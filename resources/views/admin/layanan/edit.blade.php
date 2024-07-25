<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Layanan</title>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Layanan') }}
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
                        <form method="POST" action="{{ route('admin.layanan.update', $layanan->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                                <input type="text" id="title" name="title" value="{{ $layanan->title }}"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    required>
                            </div>
                            <div class="mb-4">
                                <label for="description"
                                    class="block text-gray-700 text-sm font-bold mb-2">Content:</label>
                                <textarea id="description" name="description" rows="5"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    required>{{ $layanan->description }}</textarea>
                            </div>
                            <div class="mb-4">
                                <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Gambar :</label>
                                <div class="flex items-center">
                                    <label for="image"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline cursor-pointer">
                                        Pilih File
                                    </label>
                                    <span id="file-chosen"
                                        class="ml-2 text-gray-700">{{ $layanan->image ?? 'No file chosen' }}</span>
                                </div>
                                <input type="file" id="image" name="image" class="hidden">
                            </div>
                            <div class="mb-4">
                                <label for="link" class="block text-gray-700 text-sm font-bold mb-2">link:</label>
                                <input type="text" id="link" name="link" value="{{ $layanan->link }}"
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
        CKEDITOR.replace('isi');

        const imageInput = document.getElementById('image');
        const fileChosen = document.getElementById('file-chosen');

        imageInput.addEventListener('change', function() {
            fileChosen.textContent = this.files[0].name;
        });
        </script>
    </x-app-layout>

</body>

</html>