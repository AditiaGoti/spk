<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'alternatif_id',
        'nilai'
    ];

    public function Alternatif()
    {
        return $this->belongsTo(Alternatif::class);
    }
}
