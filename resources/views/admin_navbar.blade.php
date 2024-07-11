<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Navbar</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Upload Navbar') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h2 class="text-2xl font-bold mb-4">Add/Edit Navigation Item</h2>

                        <form action="{{ route('navItems.store') }}" method="POST" x-data="{ isDropdown: false }">
                            @csrf

                            <div class="mb-4">
                                <label for="title" class="block text-gray-700">Title</label>
                                <input type="text" name="title" id="title"
                                    class="w-full p-2 border border-gray-300 rounded" required>
                            </div>

                            <div class="mb-4">
                                <label for="url" class="block text-gray-700">URL or File Path</label>
                                <input type="text" name="url" id="url" class="w-full p-2 border border-gray-300 rounded"
                                    required>
                            </div>

                            <div class="mb-4">
                                <label class="block text-gray-700">
                                    <input type="checkbox" name="is_dropdown" x-model="isDropdown" class="mr-2">
                                    Is Dropdown
                                </label>
                            </div>

                            <div x-show="!isDropdown" class="mb-4">
                                <label for="parent_id" class="block text-gray-700">Parent Item (optional)</label>
                                <select name="parent_id" id="parent_id"
                                    class="w-full p-2 border border-gray-300 rounded">
                                    <option value="">-- Select Parent Item --</option>
                                    @foreach($navItems as $navItem)
                                    @if($navItem->is_dropdown)
                                    <option value="{{ $navItem->id }}">{{ $navItem->title }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-4">
                                <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Add/Update Item
                                </button>
                            </div>
                        </form>

                        <hr class="my-8">

                        <h2 class="text-2xl font-bold mb-4">Current Navigation Items</h2>

                        <ul class="list-disc pl-5">
                            @foreach($navItems as $item)
                            <li class="mb-2">
                                <strong>{{ $item->title }}</strong>
                                ({{ $item->is_dropdown ? 'Dropdown' : 'Link' }}: {{ $item->url }})
                                <a href="{{ route('navItems.edit', $item->id) }}" class="text-blue-500 ml-2">Edit</a>
                                <form action="{{ route('navItems.destroy', $item->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 ml-2">Delete</button>
                                </form>
                                @if($item->is_dropdown && $item->children->count() > 0)
                                <ul class="list-circle pl-5 mt-2">
                                    @foreach($item->children as $child)
                                    <li>
                                        {{ $child->title }} ({{ $child->url }})
                                        <a href="{{ route('navItems.edit', $child->id) }}"
                                            class="text-blue-500 ml-2">Edit</a>
                                        <form action="{{ route('navItems.destroy', $child->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 ml-2">Delete</button>
                                        </form>
                                    </li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>

</html>