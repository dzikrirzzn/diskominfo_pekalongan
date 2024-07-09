<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Layanan</title>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Upload Layanan') }}
            </h2>
        </x-slot>
        <div class="container mx-auto py-8">
            <h1 class="text-2xl font-bold mb-6 text-black">Tambah Layanan</h1>
            <form action="{{ route('layanans.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-gray-700">Judul:</label>
                    <input type="text" name="title" id="title" class="form-input mt-1 block w-full" required>
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-gray-700">Deskripsi:</label>
                    <textarea name="description" id="description" rows="5" class="form-textarea mt-1 block w-full"
                        required></textarea>
                </div>
                <div class="mb-4">
                    <label for="image" class="block text-gray-700">Gambar:</label>
                    <input type="file" name="image" id="image" class="form-input mt-1 block w-full" required>
                </div>
                <div class="mb-4">
                    <label for="link" class="block text-gray-700">Link:</label>
                    <input type="url" name="link" id="link" class="form-input mt-1 block w-full" required>
                </div>
                <div>
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                </div>
            </form>
        </div>
    </x-app-layout>
</body>

</html>