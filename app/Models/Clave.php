<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clave extends Model
{
    //
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'claves';
    protected $primaryKey = 'id_clave';

    public function area()
    {
        return $this->belongsTo(Area::class, 'id_area', 'id_area');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto', 'id_producto');
    }
    
}
