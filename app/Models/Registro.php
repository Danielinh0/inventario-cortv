<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
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
        return $this->belongsToMany(Persona::class);
    }

    public function producto()
    {
        return $this->belongsToMany(Producto::class);
    }
}
