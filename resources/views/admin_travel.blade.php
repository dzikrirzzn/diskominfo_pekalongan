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
                {{ __('Upload Travel') }}
            </h2>
        </x-slot>

        <div class="container">
            <h1>Add Travel Recommendation</h1>
            <form action="{{ route('admin.travel_recommendations.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="file" name="image" id="image" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="judul">Title:</label>
                    <input type="text" name="judul" id="judul" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="sub_judul">Subtitle:</label>
                    <input type="text" name="sub_judul" id="sub_judul" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="isi">Content:</label>
                    <textarea name="isi" id="isi" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="map">Map:</label>
                    <input type="text" name="map" id="map" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="author">Author:</label>
                    <input type="text" name="author" id="author" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="date">Date:</label>
                    <input type="date" name="date" id="date" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </x-app-layout>
</body>

</html>