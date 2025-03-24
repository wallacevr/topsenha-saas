<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Senha;
use Illuminate\Support\Carbon;

class PainelSenhas extends Component
{
    public $senhasChamadas;

    protected $listeners = ['senhaChamada' => 'atualizarPainel'];

    public function mount()
    {
        $this->atualizarPainel();
    }

    public function atualizarPainel()
    {
        $this->senhasChamadas = Senha::where('status', 'chamado')
            ->orderBy('updated_at', 'desc')
            ->take(10)
            ->get();
    }

    public function render()
    {
        return view('livewire.painel-senhas');
    }
}
