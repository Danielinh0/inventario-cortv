<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;
    //
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'registros';
    protected $primaryKey = 'id_registro';

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'persona_id', 'id_persona');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id', 'id_producto');
    }
    public function entrada()
    {
        return $this->hasOne(Entrada::class, 'id_entrada', 'id_registro');
    }
    public function salida()
    {
        return $this->hasOne(Salida::class, 'id_salida', 'id_registro');
    }
    public function scopeSearch($query, $value)
    {
        $query->where('id_registro', 'like', '%' . $value . '%')
            ->orWhere('created_at', 'like', '%' . $value . '%')
            ->orWhere('cantidad_registro', 'like', '%' . $value . '%')
            ;
    }
}
