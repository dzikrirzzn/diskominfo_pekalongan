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
            <h1>Content Pages</h1>
            <a href="{{ route('content.create') }}">Add New Page</a>
            <ul>
                @foreach ($contentPages as $page)
                <li>
                    {{ $page->title }}
                    <a href="{{ route('content.edit', $page) }}">Edit</a>
                    <form action="{{ route('content.destroy', $page) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </li>
                @endforeach
            </ul>
        </div>
    </x-app-layout>
</body>

</html>