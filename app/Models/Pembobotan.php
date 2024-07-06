<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembobotan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_supplier',
        'id_kriteria',
        'nilai',
    ];

    public function alternative()
    {
        return $this->belongsTo(Alternative::class, 'id_supplier', 'id_supplier');
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'id_kriteria', 'id_kriteria');
    }
}
