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
        return $this->hasMany(Area::class);
    }

    public function producto()
    {
        return $this->hasMany(Producto::class);
    }
    
}
