<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Criterion;
use App\Models\CareerPath;
use App\Models\CareerCriterion;

class CareerSeeder extends Seeder
{
    public function run()
    {
        // 1. Input Kriteria (C1 - C5)
        $c1 = Criterion::create(['code' => 'C1', 'name' => 'Pemrograman', 'type' => 'benefit']);
        $c2 = Criterion::create(['code' => 'C2', 'name' => 'Matematika & Logika', 'type' => 'benefit']);
        $c3 = Criterion::create(['code' => 'C3', 'name' => 'Jaringan Komputer', 'type' => 'benefit']);
        $c4 = Criterion::create(['code' => 'C4', 'name' => 'Desain Grafis/HCI', 'type' => 'benefit']);
        $c5 = Criterion::create(['code' => 'C5', 'name' => 'Keamanan Informasi', 'type' => 'benefit']);

        // 2. Input Jalur Karier & Deskripsi
        $se = CareerPath::create([
            'name' => 'Software Engineer',
            'description' => 'Fokus pada pengembangan aplikasi, algoritma, dan struktur data.'
        ]);
        $ds = CareerPath::create([
            'name' => 'Data Scientist',
            'description' => 'Fokus pada pengolahan data, statistik, dan machine learning.'
        ]);
        $ui = CareerPath::create([
            'name' => 'UI/UX Designer',
            'description' => 'Fokus pada pengalaman pengguna dan keindahan antarmuka aplikasi.'
        ]);
        $ne = CareerPath::create([
            'name' => 'Network Engineer',
            'description' => 'Fokus pada infrastruktur jaringan, routing, dan switching.'
        ]);

        // 3. Matriks Kepentingan (Skala 1-5)
        // Software Engineer (Sangat butuh Coding, Logika sedang, lainnya rendah)
        CareerCriterion::create(['career_path_id' => $se->id, 'criterion_id' => $c1->id, 'value' => 5]);
        CareerCriterion::create(['career_path_id' => $se->id, 'criterion_id' => $c2->id, 'value' => 4]);
        CareerCriterion::create(['career_path_id' => $se->id, 'criterion_id' => $c3->id, 'value' => 2]);
        CareerCriterion::create(['career_path_id' => $se->id, 'criterion_id' => $c4->id, 'value' => 3]);
        CareerCriterion::create(['career_path_id' => $se->id, 'criterion_id' => $c5->id, 'value' => 2]);

        // UI/UX Designer (Sangat butuh Desain, Coding rendah)
        CareerCriterion::create(['career_path_id' => $ui->id, 'criterion_id' => $c1->id, 'value' => 2]);
        CareerCriterion::create(['career_path_id' => $ui->id, 'criterion_id' => $c2->id, 'value' => 2]);
        CareerCriterion::create(['career_path_id' => $ui->id, 'criterion_id' => $c3->id, 'value' => 1]);
        CareerCriterion::create(['career_path_id' => $ui->id, 'criterion_id' => $c4->id, 'value' => 5]);
        CareerCriterion::create(['career_path_id' => $ui->id, 'criterion_id' => $c5->id, 'value' => 1]);

        // Tambahkan untuk jalur karier lainnya dengan logika serupa...
    }
}
