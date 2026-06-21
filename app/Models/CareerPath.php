<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CareerPath extends Model
{
    public function criteria()
    {
        // Relasi ke kriteria melalui tabel pivot career_criteria
        return $this->belongsToMany(Criterion::class, 'career_criteria')
            ->withPivot('value');
    }
}
