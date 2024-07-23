<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Navbar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Admin Navbar') }}
            </h2>
        </x-slot>
        <div>
            <h1>Navbar Items</h1>
            <a href="{{ route('admin.navbar.create') }}">Add New Item</a>
            <ul>
                @foreach ($navbarItems as $item)
                <li>
                    {{ $item->title }}
                    <a href="{{ route('admin.navbar.edit', $item) }}">Edit</a>
                    <form action="{{ route('admin.navbar.destroy', $item) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                    @if ($item->children->count())
                    <ul>
                        @foreach ($item->children as $child)
                        <li>
                            {{ $child->title }}
                            <a href="{{ route('admin.navbar.edit', $child) }}">Edit</a>
                            <form action="{{ route('admin.navbar.destroy', $child) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </li>
                @endforeach
            </ul>
        </div>
    </x-app-layout>
</body>

</html>