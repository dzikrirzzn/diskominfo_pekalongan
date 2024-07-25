<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Galeri</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Admin Galeri') }}
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

                        <div class="mb-4 flex justify-between">
                            <a href="{{ route('admin.galeri.create') }}"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Tambah Galeri
                            </a>
                            <button onclick="confirmDeleteSelected(event)"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Hapus yang Dipilih
                            </button>
                        </div>

                        <form id="delete-all-form" method="POST" action="{{ route('admin.galeri.destroyAll') }}">
                            @csrf
                            @method('DELETE')

                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            <input type="checkbox" id="select-all">
                                        </th>
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
                                            Link
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
                                    @foreach($galleries as $galeri)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <input type="checkbox" name="ids[]" value="{{ $galeri->id }}">
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap truncate max-w-xs"
                                            title="{{ $galeri->title }}">{{ $galeri->title }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap truncate max-w-xs"
                                            title="{{ $galeri->subtitle }}">{{ $galeri->subtitle }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $galeri->link }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $galeri->date }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap flex items-center">
                                            <a href="{{ route('admin.galeri.edit', $galeri->id) }}"
                                                class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                            <button type="button" onclick="confirmDelete(event, '{{ $galeri->id }}')"
                                                class="text-red-600 hover:text-red-900 ml-2">Delete</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </form>

                        <div id="delete-confirmation-modal"
                            class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50"
                            style="display: none;">
                            <div
                                class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all max-w-lg w-full">
                                <div class="p-6">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900">Delete Confirmation</h3>
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-500">Are you sure you want to delete selected items?
                                            This
                                            action cannot be undone.</p>
                                    </div>
                                </div>
                                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                    <form id="delete-single-form" method="POST" action="" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <button id="confirm-delete-button"
                                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                        Delete
                                    </button>
                                    <button onclick="closeModal()" type="button"
                                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </div>

                        <script>
                        document.getElementById('select-all').addEventListener('change', function() {
                            const checkboxes = document.querySelectorAll('input[name="ids[]"]');
                            checkboxes.forEach(checkbox => checkbox.checked = this.checked);
                        });

                        function confirmDeleteSelected(event) {
                            event.preventDefault();
                            const selected = document.querySelectorAll('input[name="ids[]"]:checked');
                            if (selected.length > 0) {
                                document.getElementById('delete-confirmation-modal').style.display = 'flex';
                                document.getElementById('confirm-delete-button').onclick = function() {
                                    document.getElementById('delete-all-form').submit();
                                }
                            } else {
                                alert('Pilih galeri yang ingin dihapus.');
                            }
                        }

                        function confirmDelete(event, id) {
                            event.preventDefault();
                            document.getElementById('delete-confirmation-modal').style.display = 'flex';
                            const deleteForm = document.getElementById('delete-single-form');
                            deleteForm.action = `/admin/galeri/${id}`;
                            deleteForm.style.display = 'block';
                            document.getElementById('confirm-delete-button').onclick = function() {
                                deleteForm.submit();
                            }
                        }

                        function closeModal() {
                            document.getElementById('delete-confirmation-modal').style.display = 'none';
                            document.getElementById('delete-single-form').style.display = 'none';
                        }
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>

</html>