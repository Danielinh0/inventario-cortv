<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Livewire\Attributes\{Validate, Computed};
class Producto extends Model
{
    //
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'productos';
    protected $primaryKey = 'id_producto';
    protected $fillable = [
        'nombre_producto',
        'descripcion_producto',
        'unidad_producto'
    ];

    
    public function clave()
    {
        return $this->hasOne(Clave::class, 'id_producto', 'id_producto');
    }

    public function registro()
    {
        return $this->belongsToMany(Registro::class);
    }

    


    public function scopeSearch($query, $value)
    {
        $query->where('nombre_producto', 'like', '%' . $value . '%')
            ->orWhere('id_producto', 'like', '%' . $value . '%')
            ->orWhere('cantidad_producto', 'like', '%' . $value . '%')
            ;
    }
}
