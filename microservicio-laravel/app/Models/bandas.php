<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bandas extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'genero_id'];

    public function genero()
    {
        return $this->belongsTo(Generos::class, 'genero_id');
    }
}
