<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Senha;
use Illuminate\Support\Carbon;

class PainelSenhas extends Component
{
    public $senhasChamadas;
    public $ultimachamada;
    protected $listeners = ['senhaChamada' => 'atualizarPainel'];

    public function mount()
    {
        $this->atualizarPainel();
    }

    public function atualizarPainel()
    {
        $this->senhasChamadas = Senha::where('status', 'chamado')
            ->orWhere('status', 'atendido')
            ->orderBy('inicio_atendimento', 'desc')
            ->take(10)
            ->get();
        if($this->senhasChamadas[0]->id != $this->ultimachamada){
             $this->ultimachamada = $this->senhasChamadas[0]->id;
             $this->dispatch('tocar-som');
        }
    }

    public function render()
    {
        return view('livewire.painel-senhas')
        ->layout('layouts.painel');
    }
}
