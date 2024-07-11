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
    </head>

    <body class="bg-gray-100">
        <div class="container mx-auto p-6">
            <h1 class="text-3xl font-bold mb-6">Admin Dashboard</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-xl font-bold">Total Access</h2>
                    <p class="text-3xl">{{ $totalAccess }}</p>
                </div>
                @foreach($accessLogs as $log)
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-xl font-bold">{{ ucfirst($log->page) }} Access</h2>
                    <p class="text-3xl">{{ $log->access_count }}</p>
                </div>
                @endforeach
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <canvas id="accessChart"></canvas>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            // JSON-encoded data in a script tag
            const accessLogs = JSON.parse(@json($accessLogs - > toJson()));

            // Extracting labels and data
            const labels = accessLogs.map(log => log.page);
            const data = accessLogs.map(log => log.access_count);

            const ctx = document.getElementById('accessChart').getContext('2d');
            const accessChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Access Count',
                        data: data,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    </body>

    </html>


</x-app-layout>