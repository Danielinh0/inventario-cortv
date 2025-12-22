<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    //
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'personas';
    protected $primaryKey = 'id_persona';

    public function registro()
    {
        return $this->belongsToMany(Registro::class);
    }
}
