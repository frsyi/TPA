<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iqra extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id',
        'pengajar_id',
        'jilid',
        'halaman',
        'nilai',
        'catatan',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
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
