<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;
    protected $table = 'kriteria';
    protected $guarded = ['id_kriteria'];
    protected $primaryKey = 'id_kriteria';

    public function evaluasi()
    {
        return $this->belongsTo(Evaluasi::class);
    }
}
