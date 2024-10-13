<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hafalan extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id',
        'juz_id',
        'surat_id',
        'pengajar_id',
        'mulai_ayat',
        'akhir_ayat',
        'nilai',
        'catatan',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function juz()
    {
        return $this->belongsTo(Juz::class);
    }

    public function surat()
    {
        return $this->belongsTo(Surat::class);
    }

    public function pengajar()
    {
        return $this->belongsTo(User::class, 'pengajar_id');
    }

    public function activityLogs()
    {
        return $this->hasMany(ActivityLog::class);
    }
}
