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

    <h1>{{ $event->title }}</h1>
    <p>{{ $event->event_date }}</p>
    <p>{{ $event->description }}</p>

    <a href="{{ route('admin.event.edit', $event) }}">Edit Event</a>

    <form action="{{ route('admin.event.destroy', $event) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete Event</button>
    </form>

    <a href="{{ route('admin.event.index') }}">Back to Events</a>
    </x-app-layout>
</body>

</html>
