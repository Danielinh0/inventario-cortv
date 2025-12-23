<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Entrada extends Model
{
    use HasFactory;
    protected $table = 'entradas';
    protected $primaryKey = 'id_entrada';

    public function registro()
    {
        return $this->belongsTo(Registro::class, 'id_entrada', 'id_registro');
    }
}
