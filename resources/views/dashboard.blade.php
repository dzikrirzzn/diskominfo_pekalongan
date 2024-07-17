<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Dashboard</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-9T1QN8HQ3D"></script>
        <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-9T1QN8HQ3D');
        </script>
    </head>

    <!DOCTYPE html>
    <html>

    <head>
        <title>Dashboard</title>
    </head>

    <body>
        <h1>Analytics Data</h1>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Visitors</th>
                    <th>Page Views</th>
                </tr>
            </thead>
            <tbody>
                @foreach($analyticsData as $data)
                <tr>
                    <td>{{ $data['date']->format('Y-m-d') }}</td>
                    <td>{{ $data['visitors'] }}</td>
                    <td>{{ $data['pageViews'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>

    </html>


    </html>


</x-app-layout>