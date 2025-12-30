<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
        $query->where('id_producto', 'like', '%' . $value . '%')
            ->orWhere('nombre_producto', 'like', '%' . $value . '%')
            ->orWhere('cantidad_producto', 'like', '%' . $value . '%')
            ;
    }
}
