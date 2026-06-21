<!DOCTYPE html>
<html>

<head>
    <title>SPK Jalur Karier TI</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-10">
    <div class="max-w-2xl mx-auto bg-white p-8 rounded shadow">
        <h2 class="text-2xl font-bold mb-6">Input Nilai / Kompetensi Mahasiswa</h2>
        <form action="/calculate" method="POST">
            @csrf
            @foreach($criteria as $c)
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">{{ $c->name }} (0 - 100)</label>
                <input type="number" name="criteria[{{ $c->id }}]" min="0" max="100" required
                    class="w-full px-3 py-2 border rounded">
            </div>
            @endforeach
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Hitung Rekomendasi
            </button>
        </form>
    </div>
</body>

</html>