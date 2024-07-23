<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Navigation Item</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Navigation Item') }}
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

                        <form method="POST" action="{{ route('admin.navbar.update', $navItem->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="mb-4">
                                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                                <input type="text" id="title" name="title" value="{{ $navItem->title }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            </div>

                            <div class="mb-4">
                                <label for="url" class="block text-gray-700 text-sm font-bold mb-2">URL:</label>
                                <input type="text" id="url" name="url" value="{{ $navItem->url }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>

                            <div class="mb-4">
                                <label for="parent_id" class="block text-gray-700 text-sm font-bold mb-2">Parent
                                    Item:</label>
                                <select name="parent_id" id="parent_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    <option value="">None</option>
                                    @foreach($parentItems as $parent)
                                    <option value="{{ $parent->id }}" @if($parent->id == $navItem->parent_id) selected
                                        @endif>{{ $parent->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="child_items" class="block text-gray-700 text-sm font-bold mb-2">Child
                                    Items:</label>
                                <div id="child_items_container">
                                    @foreach($navItem->children as $child)
                                    <div class="child-item mb-2">
                                        <input type="text" name="child_items[{{ $loop->index }}][title]" placeholder="Child Item Title" value="{{ $child->title }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-2">
                                        <input type="text" name="child_items[{{ $loop->index }}][url]" placeholder="Child Item URL" value="{{ $child->url }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    </div>
                                    @endforeach
                                </div>
                                <button type="button" onclick="addChildItem()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    Add Child Item
                                </button>
                            </div>

                            <div class="mb-4">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    Update
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

    <script>
        function addChildItem() {
            const container = document.getElementById('child_items_container');
            const index = container.children.length;
            const childItemHtml = `
                <div class="child-item mb-2">
                    <input type="text" name="child_items[${index}][title]" placeholder="Child Item Title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-2">
                    <input type="text" name="child_items[${index}][url]" placeholder="Child Item URL" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
            `;
            container.insertAdjacentHTML('beforeend', childItemHtml);
        }
    </script>
</body>

</html>