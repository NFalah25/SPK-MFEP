<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluasi extends Model
{
    use HasFactory;
    protected $table = 'evaluasi';
    protected $guarded = ['id'];

    public function alternatif()
    {
        return $this->hasMany(Alternatif::class);
    }
}
