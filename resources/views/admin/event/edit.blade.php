<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kalender</title>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Kalender') }}
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

                        <!-- Update the route and method for editing -->
                        <form method="POST" action="{{ route('admin.event.update', $events->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <!-- Indicates that this is a PUT request -->

                            <!-- Prepopulate fields with existing event data -->
                            <div class="mb-4">
                                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                                <input type="text" id="title" name="title" value="{{ $events->title }}"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    required>
                            </div>
                            <div class="mb-4">
                                <label for="subtitle"
                                    class="block text-gray-700 text-sm font-bold mb-2">Subtitle:</label>
                                <input type="text" id="subtitle" name="subtitle" value="{{ $events->subtitle }}"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    required>
                            </div>
                            <div class="mb-4">
                                <label for="description"
                                    class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                                <textarea id="description" name="description" rows="5"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    required>{{ $events->description }}</textarea>
                            </div>
                            <div class="mb-4">
                                <label for="location"
                                    class="block text-gray-700 text-sm font-bold mb-2">Location:</label>
                                <input type="text" id="location" name="location" value="{{ $events->location }}"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    required>
                            </div>
                            <div class="mb-4">
                                <label for="event_date" class="block text-gray-700 text-sm font-bold mb-2">Date:</label>
                                <input type="date" name="event_date" class="form-control"
                                    value="{{ old('event_date', $events->event_date ? $events->event_date->format('Y-m-d') : '') }}">
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
                                <input type="file" id="image" name="image" class="hidden">
                                @if($events->image)
                                <img src="{{ asset('storage/' . $events->image) }}" alt="Current Image" width="100">
                                @endif
                            </div>
                            <div class="mb-4">
                                <label for="link" class="block text-gray-700 text-sm font-bold mb-2">Link:</label>
                                <input type="url" id="link" name="link" value="{{ $events->link }}"
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
        CKEDITOR.replace('description');

        const imageInput = document.getElementById('image');
        const fileChosen = document.getElementById('file-chosen');

        imageInput.addEventListener('change', function() {
            fileChosen.textContent = this.files[0].name;
        });
        </script>
    </x-app-layout>

</body>

</html>