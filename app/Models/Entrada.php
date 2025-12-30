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
    public function scopeSearch($query, $value)
    {
        $query->where('id_entrada', 'like', '%' . $value . '%')
            ->orWhere('created_at', 'like', '%' . $value . '%')
            ->orWhere('cantidad_entrada', 'like', '%' . $value . '%')
            ;
    }
}
