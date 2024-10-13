<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'pengajar_id',
        'activity',
        'hafalan_id',
        'iqra_id',
    ];

    public function pengajar()
    {
        return $this->belongsTo(User::class, 'pengajar_id');
    }

    public function hafalan()
    {
        return $this->belongsTo(Hafalan::class, 'hafalan_id');
    }

    public function iqra()
    {
        return $this->belongsTo(Iqra::class, 'iqra_id');
    }
}
