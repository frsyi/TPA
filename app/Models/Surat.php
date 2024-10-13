<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    protected $fillable = [
        'juz_id',
        'nama_surat',
        'mulai_ayat',
        'akhir_ayat',
    ];

    public function juz()
    {
        return $this->belongsTo(Juz::class);
    }

    public function hafalans()
    {
        return $this->hasMany(Hafalan::class);
    }
}
