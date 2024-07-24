<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>Admin Dashboard</h1>
    
    <h2>Kunjungan Bulanan</h2>
    <canvas id="visitChart"></canvas>

    <h2>Statistik Per Halaman</h2>
    <table>
        <thead>
            <tr>
                <th>URL</th>
                <th>Jumlah Kunjungan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pageStats as $stat)
            <tr>
                <td>{{ $stat->url }}</td>
                <td>{{ $stat->count }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        var ctx = document.getElementById('visitChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($labels),
                datasets: [{
                    label: 'Jumlah Pengunjung Unik',
                    data: @json($data),
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
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