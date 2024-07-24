<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Content</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Admin Content') }}
            </h2>
        </x-slot>

        <div>
            <h1>Add Content Page</h1>
            <form action="{{ route('content.store') }}" method="POST">
                @csrf
                <div>
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" required>
                </div>
                <div>
                    <label for="content">Content</label>
                    <textarea name="content" id="content" required></textarea>
                </div>
                <button type="submit">Save</button>
            </form>
        </div>

    </x-app-layout>
</body>

</html>