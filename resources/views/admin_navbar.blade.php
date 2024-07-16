<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Navbar</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
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
                        @if (session('success'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                            {{ session('success') }}
                        </div>
                        @endif

                        <h2 class="text-2xl font-bold mb-4">Add/Edit Navigation Item</h2>

                        <form
                            action="{{ isset($navItem) ? route('navItems.update', $navItem->id) : route('navItems.store') }}"
                            method="POST">
                            @csrf
                            @if(isset($navItem))
                            @method('PUT')
                            @endif

                            <div class="mb-4">
                                <label for="title" class="block text-gray-700">Title</label>
                                <input type="text" name="title" id="title"
                                    class="w-full p-2 border border-gray-300 rounded"
                                    value="{{ old('title', isset($navItem) ? $navItem->title : '') }}" required>
                                @error('title')
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="url" class="block text-gray-700">URL or File Path</label>
                                <input type="text" name="url" id="url" class="w-full p-2 border border-gray-300 rounded"
                                    value="{{ old('url', isset($navItem) ? $navItem->url : '') }}">
                                @error('url')
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="parent_id" class="block text-gray-700">Parent Item (optional)</label>
                                <select name="parent_id" id="parent_id"
                                    class="w-full p-2 border border-gray-300 rounded">
                                    <option value="">-- Select Parent Item --</option>
                                    @foreach($parentItems as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('parent_id', isset($navItem) && $navItem->parent_id == $item->id ? 'selected' : '') }}>
                                        {{ $item->title }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('parent_id')
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="block text-gray-700">
                                    <input type="checkbox" name="is_dropdown" class="mr-2"
                                        {{ old('is_dropdown', isset($navItem) && $navItem->is_dropdown ? 'checked' : '') }}>
                                    Is Dropdown
                                </label>
                            </div>

                            <div id="child-items-section" style="display: none;">
                                <h3 class="text-xl font-bold mb-4">Child Items</h3>
                                <template id="child-item-template">
                                    <div class="child-item mb-4 p-4 border rounded">
                                        <label class="block text-gray-700">Child Item Title</label>
                                        <input type="text" name="child_items[0][title]"
                                            class="w-full p-2 border border-gray-300 rounded" required>
                                        <label class="block text-gray-700 mt-2">Child Item URL</label>
                                        <input type="text" name="child_items[0][url]"
                                            class="w-full p-2 border border-gray-300 rounded">
                                        <button type="button"
                                            class="remove-child-item bg-red-500 text-white px-2 py-1 mt-2 rounded">Remove</button>
                                    </div>
                                </template>
                                <div id="child-items-container"></div>
                                <button type="button" id="add-child-item"
                                    class="bg-green-500 text-white px-4 py-2 rounded">Add Child Item</button>
                            </div>

                            <div class="mb-4 mt-4">
                                <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    {{ isset($navItem) ? 'Update' : 'Add' }} Item
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
                                <form action="{{ route('navItems.destroy', $item->id) }}" method="POST" class="inline"
                                    onsubmit="return confirm('Are you sure you want to delete this item?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 ml-2">Delete</button>
                                </form>
                                @if($item->is_dropdown)
                                <ul class="list-circle pl-5 mt-2">
                                    @foreach($item->children as $child)
                                    <li>
                                        {{ $child->title }} ({{ $child->url }})
                                        <a href="{{ route('navItems.edit', $child->id) }}"
                                            class="text-blue-500 ml-2">Edit</a>
                                        <form action="{{ route('navItems.destroy', $child->id) }}" method="POST"
                                            class="inline"
                                            onsubmit="return confirm('Are you sure you want to delete this item?');">
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

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const isDropdownCheckbox = document.querySelector('input[name="is_dropdown"]');
        const childItemsSection = document.getElementById('child-items-section');
        const addChildItemButton = document.getElementById('add-child-item');
        const childItemsContainer = document.getElementById('child-items-container');
        const childItemTemplate = document.getElementById('child-item-template').content;

        function toggleChildItemsSection() {
            if (isDropdownCheckbox.checked) {
                childItemsSection.style.display = 'block';
            } else {
                childItemsSection.style.display = 'none';
            }
        }

        isDropdownCheckbox.addEventListener('change', toggleChildItemsSection);
        toggleChildItemsSection();

        addChildItemButton.addEventListener('click', function() {
            const newChildItem = childItemTemplate.cloneNode(true);
            newChildItem.querySelector('.remove-child-item').addEventListener('click', function() {
                newChildItem.remove();
            });
            childItemsContainer.appendChild(newChildItem);
        });

        document.querySelectorAll('.remove-child-item').forEach(button => {
            button.addEventListener('click', function() {
                button.closest('.child-item').remove();
            });
        });
    });
    </script>
</body>

</html>