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
    <div class="container mx-auto py-8 px-4">
        <h1 class="text-2xl font-bold mb-6 text-black">{{ $layanan->title }}</h1>
        <div class="w-full max-w-md rounded overflow-hidden shadow-lg bg-white h-64 flex flex-col">
            <img class="w-full h-32 object-cover" src="{{ asset('storage/' . $layanan->image) }}"
                alt="{{ $layanan->title }}">
            <div class="px-6 py-4 flex flex-col justify-between flex-grow">
                <div>
                    <p class="text-gray-700 text-base">{{ $layanan->description }}</p>
                </div>
                <a href="{{ $layanan->link }}"
                    class="text-blue-500 hover:underline mt-2 inline-block">Selengkapnya..</a>
            </div>
        </div>
    </div>
</body>

</html>