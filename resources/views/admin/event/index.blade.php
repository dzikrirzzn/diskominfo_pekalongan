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

    <h1>Events Calendar</h1>
    <div id="calendar"></div>

    <h2>All Events</h2>
    <ul>
        @foreach ($events as $event)
            <li>{{ $event->event_date }}: <a href="{{ route('admin.event.show', $event) }}">{{ $event->title }}</a></li>
        @endforeach
    </ul>

    <a href="{{ route('admin.event.create') }}">Add New Event</a>

    <script>
        // Example to show how events can be fetched via AJAX and displayed
        document.addEventListener('DOMContentLoaded', function() {
            fetch('/events')
                .then(response => response.json())
                .then(events => {
                    // Use the events data to populate your calendar
                    console.log(events);
                });
        });
    </script>
</x-app-layout>
</body>

</html>

