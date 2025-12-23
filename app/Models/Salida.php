<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Salida extends Model
{
    use HasFactory;
    protected $table = 'salidas';
    protected $primaryKey = 'id_salida';

    public function registro()
    {
        return $this->belongsTo(Registro::class, 'id_salida', 'id_registro');
    }
}
