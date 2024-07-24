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

    <h1>Add New Event</h1>

    <form action="{{ route('admin.event.store') }}" method="POST">
        @csrf
        <label for="event_date">Event Date:</label>
        <input type="date" name="event_date" required>
        
        <label for="title">Title:</label>
        <input type="text" name="title" required>
        
        <label for="description">Description:</label>
        <textarea name="description" required></textarea>

        <button type="submit">Add Event</button>
    </form>

    <a href="{{ route('admin.event.index') }}">Back to Events</a>
    </x-app-layout>
</body>

</html>
