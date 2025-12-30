<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Persona extends Model
{
    use HasFactory;
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
