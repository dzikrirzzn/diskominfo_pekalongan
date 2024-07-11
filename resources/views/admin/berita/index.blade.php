<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Berita</title>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Daftar Berita') }}
            </h2>
        </x-slot>
        <div class="container">
            <h1>List Berita</h1>
            <a href="{{ route('admin.berita.create') }}" class="btn btn-primary">Tambah Berita</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Subtitle</th>
                        <th>Author</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($allBerita as $berita)
                    <tr>
                        <td>{{ $berita->title }}</td>
                        <td>{{ $berita->subtitle }}</td>
                        <td>{{ $berita->author }}</td>
                        <td>{{ $berita->date }}</td>
                        <td>
                            <a href="{{ route('admin.berita.edit', $berita->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </x-app-layout>
</body>

</html>