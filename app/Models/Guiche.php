<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Stancl\Tenancy\Database\Concerns\UsesTenantConnection;
class Guiche extends Model
{
    use HasFactory;
    use UsesTenantConnection;
    protected $fillable = ['nome'];

    public function filas()
    {
        return $this->belongsToMany(Fila::class, 'guiche_fila');
    }
}

