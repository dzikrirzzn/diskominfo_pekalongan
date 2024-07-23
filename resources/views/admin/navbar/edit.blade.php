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
            <h1>Edit Navbar Item</h1>
            <form action="{{ route('admin.navbar.update', $navbarItem) }}" method="POST">
                @csrf
                @method('PUT')
                <div>
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" value="{{ $navbarItem->title }}" required>
                </div>
                <div>
                    <label for="url">URL</label>
                    <input type="url" name="url" id="url" value="{{ $navbarItem->url }}">
                </div>
                <div>
                    <label for="parent_id">Parent</label>
                    <select name="parent_id" id="parent_id">
                        <option value="">None</option>
                        @foreach ($navbarItems as $item)
                        <option value="{{ $item->id }}" @if($navbarItem->parent_id == $item->id) selected
                            @endif>{{ $item->title }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit">Save</button>
            </form>
        </div>

    </x-app-layout>
</body>

</html>