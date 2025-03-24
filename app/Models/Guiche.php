<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guiche extends Model
{
    use HasFactory;
    protected $fillable = ['nome'];

    public function filas()
    {
        return $this->belongsToMany(Fila::class, 'guiche_fila');
    }
}

