<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Log extends Model
{
    use HasFactory;
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function scopeSearch($query, $value)
    {
        $query->where('id', 'like', '%' . $value . '%')
            ->orWhere('action', 'like', '%' . $value . '%')
            ->orWhere('created_at', 'like', '%' . $value . '%');
    }
}
