<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juz extends Model
{
    use HasFactory;

    protected $fillable = [
        'juz',
    ];

    public function surats()
    {
        return $this->hasMany(Surat::class);
    }

    public function hafalans()
    {
        return $this->hasMany(Hafalan::class);
    }
}
