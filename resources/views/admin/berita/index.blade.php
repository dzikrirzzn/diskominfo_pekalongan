<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Berita</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Admin Berita') }}
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

                        <div class="mb-4">
                            <a href="{{ route('admin.berita.create') }}"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Tambah Berita
                            </a>
                        </div>

                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Title
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Subtitle
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Author
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Date
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($allBerita as $berita)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap truncate max-w-xs"
                                        title="{{ $berita->title }}">{{ $berita->title }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap truncate max-w-xs"
                                        title="{{ $berita->subtitle }}">{{ $berita->subtitle }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $berita->author }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $berita->date }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="{{ route('admin.berita.edit', $berita->id) }}"
                                            class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        <button onclick="confirmDelete(event)" data-id="{{ $berita->id }}"
                                            class="text-red-600 hover:text-red-900 ml-2">Delete</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div id="delete-confirmation-modal"
                            class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50"
                            style="display: none;">
                            <div
                                class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all max-w-lg w-full">
                                <div class="p-6">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900">Delete Confirmation</h3>
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-500">Are you sure you want to delete this item? This
                                            action cannot be undone.</p>
                                    </div>
                                </div>
                                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                    <form id="delete-form" method="POST" class="w-full">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                            Delete
                                        </button>
                                    </form>
                                    <button onclick="closeModal()" type="button"
                                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </div>

                        <script>
                        function confirmDelete(event) {
                            event.preventDefault();
                            const id = event.target.getAttribute('data-id');
                            const form = document.getElementById('delete-form');
                            form.action = `/admin/berita/${id}`;
                            document.getElementById('delete-confirmation-modal').style.display = 'flex';
                        }

                        function closeModal() {
                            document.getElementById('delete-confirmation-modal').style.display = 'none';
                        }
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>

</html>