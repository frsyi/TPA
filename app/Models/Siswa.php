<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'kelas',
    ];

    public function hafalans()
    {
        return $this->hasMany(Hafalan::class);
    }

    public function orangTua()
    {
        return $this->belongsTo(User::class, 'orangtua_id');
    }
}
