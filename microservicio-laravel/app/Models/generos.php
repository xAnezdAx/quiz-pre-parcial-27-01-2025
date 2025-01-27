<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class generos extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    public function bandas()
    {
        return $this->hasMany(Bandas::class, 'genero_id');
    }
}
