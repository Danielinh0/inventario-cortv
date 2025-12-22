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

    public function claves()
    {
        return $this->belongsToMany(Clave::class);
    }

    public function registro()
    {
        return $this->belongsToMany(Registro::class);
    }
}
