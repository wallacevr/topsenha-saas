<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fila extends Model
{
    use HasFactory;
    
    protected $fillable = ['nome', 'prefixo', 'campos','proxima_fila_id'];

    protected $casts = [
        'campos' => 'array',
    ];

    public function filas()
    {
        return $this->belongsToMany(Fila::class);
    }


    public function guiches()
    {
        return $this->belongsToMany(Guiche::class);
    }

    public function senhas()
    {
        return $this->hasMany(Senha::class);
    }
    
    public function proximaFila()
    {
        return $this->belongsTo(Fila::class, 'proxima_fila_id');
    }
}
