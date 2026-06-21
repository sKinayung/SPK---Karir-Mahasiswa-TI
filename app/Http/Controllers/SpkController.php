<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CareerPath;
use App\Models\Criterion;
use App\Models\CareerCriterion;

class SpkController extends Controller
{
    public function index()
    {
        $criteria = Criterion::all();
        return view('spk.form', compact('criteria'));
    }

    public function calculate(Request $request)
    {
        $criteria = Criterion::all();
        // 1. Ambil inputan mahasiswa sebagai Bobot (W)
        $weights = [];
        $totalWeight = 0;
        foreach ($criteria as $c) {
            $val = $request->input('criteria.' . $c->id);
            $weights[$c->id] = $val;
            $totalWeight += $val;
        }

        // Normalisasi Bobot agar totalnya 1 (Opsional, tapi membuat hasil lebih proporsional)
        foreach ($weights as $key => $val) {
            $weights[$key] = $val / $totalWeight;
        }

        // 2. Cari nilai Max/Min untuk Normalisasi Matriks (R)
        $maxValues = [];
        foreach ($criteria as $c) {
            $maxValues[$c->id] = CareerCriterion::where('criterion_id', $c->id)->max('value');
        }

        // 3. Hitung Nilai Preferensi (V) untuk setiap Karier
        $careers = CareerPath::all();
        $results = [];

        foreach ($careers as $career) {
            $totalScore = 0;
            $matrixValues = CareerCriterion::where('career_path_id', $career->id)->get();

            foreach ($matrixValues as $mv) {
                // Normalisasi R_ij (Asumsi semua kriteria adalah Benefit)
                $normalizedR = $mv->value / $maxValues[$mv->criterion_id];

                // V_i = W_j * R_ij
                $totalScore += $weights[$mv->criterion_id] * $normalizedR;
            }

            $results[] = [
                'name' => $career->name,
                'score' => round($totalScore * 100, 2), // Jadikan persentase
                'description' => $career->description
            ];
        }

        // 4. Ranking otomatis berdasarkan skor tertinggi
        usort($results, function ($a, $b) {
            return $b['score'] <=> $a['score'];
        });

        return view('spk.result', compact('results'));
    }
}
