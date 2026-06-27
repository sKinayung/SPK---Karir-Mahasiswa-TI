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
        // === 1. DATA KRITERIA ===
        // Hard Skills (Nilai Akademis/Kemampuan Dasar)
        $c1 = Criterion::create(['code' => 'C1', 'name' => 'Pemrograman & Algoritma', 'type' => 'benefit', 'category' => 'hard_skill']);
        $c2 = Criterion::create(['code' => 'C2', 'name' => 'Jaringan & Infrastruktur', 'type' => 'benefit', 'category' => 'hard_skill']);
        $c3 = Criterion::create(['code' => 'C3', 'name' => 'Desain Grafis / Antarmuka', 'type' => 'benefit', 'category' => 'hard_skill']);

        // No 2: Minat / Passion (Self-Assessment)
        $c4 = Criterion::create(['code' => 'C4', 'name' => 'Ketertarikan Membuat Aplikasi', 'type' => 'benefit', 'category' => 'interest']);
        $c5 = Criterion::create(['code' => 'C5', 'name' => 'Ketertarikan Mengulik Konfigurasi & Server', 'type' => 'benefit', 'category' => 'interest']);
        $c6 = Criterion::create(['code' => 'C6', 'name' => 'Ketertarikan pada Aspek Estetika & Seni Visual', 'type' => 'benefit', 'category' => 'interest']);

        // No 3: Soft Skills & Gaya Kerja
        $c7 = Criterion::create(['code' => 'C7', 'name' => 'Problem Solving / Analisis Masalah', 'type' => 'benefit', 'category' => 'soft_skill']);
        $c8 = Criterion::create(['code' => 'C8', 'name' => 'Kolaborasi & Kerja Sama Tim', 'type' => 'benefit', 'category' => 'soft_skill']);


        // === 2. DATA JALUR KARIER ===
        $se = CareerPath::create(['name' => 'Software Engineer', 'description' => 'Fokus pada pembuatan sistem, logika pemrograman, dan arsitektur kode aplikasi. Hardcore coding dan analisis masalah tingkat tinggi sangat dibutuhkan di sini.']);
        $ne = CareerPath::create(['name' => 'Network Engineer', 'description' => 'Berfokus pada pengelolaan infrastruktur jaringan, server lokal, keamanan sistem, dan memastikan kelancaran komunikasi data antarperangkat.']);
        $ui = CareerPath::create(['name' => 'UI/UX Designer', 'description' => 'Bertanggung jawab merancang pengalaman pengguna yang nyaman dan tampilan visual aplikasi yang menarik. Lebih condong ke empati pengguna dan seni desain digital.']);


        // === 3. MATRIKS KEPENTINGAN KARIER (Skala 1 - 5) ===
        // Relasi untuk Software Engineer
        CareerCriterion::create(['career_path_id' => $se->id, 'criterion_id' => $c1->id, 'value' => 5]); // Pasti butuh koding kuat
        CareerCriterion::create(['career_path_id' => $se->id, 'criterion_id' => $c2->id, 'value' => 2]);
        CareerCriterion::create(['career_path_id' => $se->id, 'criterion_id' => $c3->id, 'value' => 3]);
        CareerCriterion::create(['career_path_id' => $se->id, 'criterion_id' => $c4->id, 'value' => 5]); // Harus punya minat bikin app tinggi
        CareerCriterion::create(['career_path_id' => $se->id, 'criterion_id' => $c5->id, 'value' => 2]);
        CareerCriterion::create(['career_path_id' => $se->id, 'criterion_id' => $c6->id, 'value' => 2]);
        CareerCriterion::create(['career_path_id' => $se->id, 'criterion_id' => $c7->id, 'value' => 5]); // Soft skill problem solving krusial
        CareerCriterion::create(['career_path_id' => $se->id, 'criterion_id' => $c8->id, 'value' => 4]);

        // Relasi untuk Network Engineer
        CareerCriterion::create(['career_path_id' => $ne->id, 'criterion_id' => $c1->id, 'value' => 2]);
        CareerCriterion::create(['career_path_id' => $ne->id, 'criterion_id' => $c2->id, 'value' => 5]); // Harus paham jaringan
        CareerCriterion::create(['career_path_id' => $ne->id, 'criterion_id' => $c3->id, 'value' => 1]);
        CareerCriterion::create(['career_path_id' => $ne->id, 'criterion_id' => $c4->id, 'value' => 1]);
        CareerCriterion::create(['career_path_id' => $ne->id, 'criterion_id' => $c5->id, 'value' => 5]); // Minat utak-atik server wajib
        CareerCriterion::create(['career_path_id' => $ne->id, 'criterion_id' => $c6->id, 'value' => 1]);
        CareerCriterion::create(['career_path_id' => $ne->id, 'criterion_id' => $c7->id, 'value' => 4]);
        CareerCriterion::create(['career_path_id' => $ne->id, 'criterion_id' => $c8->id, 'value' => 3]);

        // Relasi untuk UI/UX Designer
        CareerCriterion::create(['career_path_id' => $ui->id, 'criterion_id' => $c1->id, 'value' => 2]);
        CareerCriterion::create(['career_path_id' => $ui->id, 'criterion_id' => $c2->id, 'value' => 1]);
        CareerCriterion::create(['career_path_id' => $ui->id, 'criterion_id' => $c3->id, 'value' => 5]); // Harus jago desain visual
        CareerCriterion::create(['career_path_id' => $ui->id, 'criterion_id' => $c4->id, 'value' => 2]);
        CareerCriterion::create(['career_path_id' => $ui->id, 'criterion_id' => $c5->id, 'value' => 1]);
        CareerCriterion::create(['career_path_id' => $ui->id, 'criterion_id' => $c6->id, 'value' => 5]); // Minat seni estetika wajib
        CareerCriterion::create(['career_path_id' => $ui->id, 'criterion_id' => $c7->id, 'value' => 3]);
        CareerCriterion::create(['career_path_id' => $ui->id, 'criterion_id' => $c8->id, 'value' => 5]); // Harus sering komunikasi/kolaborasi dgn user & dev
    }
}
