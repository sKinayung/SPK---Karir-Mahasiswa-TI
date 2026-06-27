<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>SPK Pemilihan Jalur Karier TI</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 min-h-screen py-10 px-4">
    <div class="max-w-3xl mx-auto bg-white p-8 rounded-xl shadow-md border border-gray-100">
        <h2 class="text-3xl font-extrabold text-gray-800 text-center mb-2">Sistem Pendukung Keputusan</h2>
        <p class="text-center text-gray-500 mb-8">Rekomendasi Jalur Karier Mahasiswa Teknologi Informasi (Metode SAW)</p>

        <form action="/calculate" method="POST" class="space-y-8">
            @csrf

            <div>
                <h3 class="text-lg font-bold text-blue-600 border-b pb-2 mb-4">1. Kemampuan Akademis / Hard Skills</h3>
                <p class="text-xs text-gray-400 mb-4">Masukkan perkiraan nilai kompetensi mata kuliah Anda (Skala 0 - 100):</p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach($hardSkills as $hs)
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">{{ $hs->name }}</label>
                        <input type="number" name="criteria[{{ $hs->id }}]" min="0" max="100" placeholder="Contoh: 85" required
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
                    </div>
                    @endforeach
                </div>
            </div>

            <div>
                <h3 class="text-lg font-bold text-green-600 border-b pb-2 mb-4">2. Tingkat Ketertarikan / Passion (Self-Assessment)</h3>
                <p class="text-xs text-gray-400 mb-4">Geser slider sesuai dengan tingkat ketertarikan personal Anda secara sukarela:</p>
                <div class="space-y-4">
                    @foreach($interests as $it)
                    <div>
                        <div class="flex justify-between text-sm font-medium text-gray-700 mb-1">
                            <label>{{ $it->name }}</label>
                            <span class="text-green-600 font-bold" id="val-{{ $it->id }}">50</span>
                        </div>
                        <input type="range" name="criteria[{{ $it->id }}]" min="0" max="100" value="50"
                            oninput="document.getElementById('val-{{ $it->id }}').innerText = this.value"
                            class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-green-600">
                    </div>
                    @endforeach
                </div>
            </div>

            <div>
                <h3 class="text-lg font-bold text-purple-600 border-b pb-2 mb-4">3. Kesiapan Gaya Kerja & Soft Skills</h3>
                <p class="text-xs text-gray-400 mb-4">Pilih opsi situasi kerja yang paling menggambarkan kapasitas diri Anda:</p>
                <div class="space-y-4">
                    @foreach($softSkills as $ss)
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">{{ $ss->name }}</label>
                        <select name="criteria[{{ $ss->id }}]" required
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-purple-400 focus:outline-none bg-white">
                            <option value="" disabled selected>-- Pilih Tingkat Kemampuan --</option>
                            <option value="100">Sangat Menguasai / Sangat Suka</option>
                            <option value="80">Cukup Menguasai / Nyaman</option>
                            <option value="60">Biasa Saja / Standar</option>
                            <option value="40">Kurang Percaya Diri / Cenderung Menghindar</option>
                        </select>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="pt-4">
                <button type="submit" class="w-full bg-slate-800 text-white font-bold py-3 px-4 rounded-lg hover:bg-slate-900 transition shadow">
                    Analisis Jalur Karier Saya &rarr;
                </button>
            </div>
        </form>
    </div>
</body>

</html>