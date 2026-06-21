<!DOCTYPE html>
<html>

<head>
    <title>Hasil Rekomendasi Karier</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-gray-100 p-10">
    <div class="max-w-4xl mx-auto bg-white p-8 rounded shadow">
        <h2 class="text-2xl font-bold mb-6 text-center">Hasil Rekomendasi Jalur Karier</h2>

        <div class="mb-8 relative h-64 w-full">
            <canvas id="resultChart"></canvas>
        </div>

        <h3 class="text-xl font-bold mt-8 mb-4">Ranking Karier Anda:</h3>
        <ul class="space-y-4">
            @foreach($results as $index => $result)
            <li class="p-4 border rounded {{ $index == 0 ? 'bg-green-50 border-green-400' : '' }}">
                <div class="flex justify-between items-center mb-2">
                    <h4 class="font-bold text-lg">#{{ $index + 1 }} {{ $result['name'] }}</h4>
                    <span class="bg-blue-100 text-blue-800 py-1 px-3 rounded-full text-sm">
                        Skor: {{ $result['score'] }}
                    </span>
                </div>
                <p class="text-gray-600 text-sm">{{ $result['description'] }}</p>
            </li>
            @endforeach
        </ul>

        <div class="mt-6">
            <a href="/" class="text-blue-500 hover:underline">&larr; Kembali ke Form Input</a>
        </div>
    </div>

    <script>
        const ctx = document.getElementById('resultChart').getContext('2d');
        const labels = {
            !!json_encode(array_column($results, 'name')) !!
        };
        const dataScores = {
            !!json_encode(array_column($results, 'score')) !!
        };

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Skor Kecocokan (%)',
                    data: dataScores,
                    backgroundColor: 'rgba(59, 130, 246, 0.6)',
                    borderColor: 'rgba(59, 130, 246, 1)',
                    borderWidth: 1,
                    borderRadius: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100
                    }
                }
            }
        });
    </script>
</body>

</html>