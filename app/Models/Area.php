<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    //
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'areas';
    protected $primaryKey = 'id_area';

    public function claves()
    {
        return $this->hasMany(Clave::class, 'id_area', 'id_area');
    }
}
