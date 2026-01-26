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
    protected $fillable = [
        'user_id',
        'producto_id',
        'cantidad_registro',
        'tipo_registro' // true para entrada, false para salida
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'user_id', 'id_persona');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id', 'id_producto');
    }    
    public function scopeSearch($query, $value)
    {
        $query->where('id_registro', 'like', '%' . $value . '%')
            ->orWhere('created_at', 'like', '%' . $value . '%')
            ->orWhere('cantidad_registro', 'like', '%' . $value . '%')
            ;
    }
}
