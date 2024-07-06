<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternative extends Model
{
    use HasFactory;
    protected $table = 'alternative'; 
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_alternative',
        'C1',
        'C2',
        'C3',
        'C4',
        'C5',
        'C6',
        'kriteria_id'
    ];

    public function kriteria(){
        return $this->belongsTo(Kriteria::class, 'kriteria_id', 'id');
    }
}
