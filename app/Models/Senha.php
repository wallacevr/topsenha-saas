<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Stancl\Tenancy\Database\Concerns\UsesTenantConnection;
class Senha extends Model
{
    use HasFactory;
    use UsesTenantConnection;
    protected $fillable = ['fila_id', 'senha', 'prioritaria', 'status', 'inicio_atendimento', 'fim_atendimento','campos','guiche_id'];

    protected $casts = [
        'inicio_atendimento' => 'datetime',
        'fim_atendimento' => 'datetime',
        'campos' => 'array'
    ];

    public function fila()
    {
        return $this->belongsTo(Fila::class);
    }
    public function guiche()
    {
        return $this->belongsTo(Guiche::class);
    }
    public function iniciarAtendimento($guiche_id)
    {
        $this->update(['inicio_atendimento' => now(), 'status' => 'chamado','guiche_id'=>$guiche_id]);
    }

    public function finalizarAtendimento()
    {
        $this->update(['fim_atendimento' => now(), 'status' => 'atendido']);
    }

    public function encaminharParaProximaFila()
    {
      
        if ($this->fila->proximaFila) {
           
            $this->create([
                'fila_id' => $this->fila->proximaFila->id,
                'senha'=>$this->senha,
                'campos' => $this->campos,
                'status' => 'pendente',
                'inicio_atendimento' => null,
                'fim_atendimento' => null,
            ]);
            $senha = Senha::all();
            $this->finalizarAtendimento();
           
        }else{
            $this->finalizarAtendimento();
        }
    }
}
