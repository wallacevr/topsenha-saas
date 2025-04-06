<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Senha;
use App\Models\Guiche;
use Illuminate\Support\Carbon;

class ChamarSenha extends Component
{
    public $guiche_id;
    public $fila_id;
    public $senhaChamada;
    public $senhaAtual;
    public $filasDisponiveis = [];
    public $proximasSenhas;
    public function mount(){
      $senha=Senha::all();
      //dd($senha);
        
    }

    public function updatedGuicheId()
    {
        $guiche = Guiche::with('filas')->find($this->guiche_id);
        $this->filasDisponiveis = $guiche ? $guiche->filas : [];
        $this->fila_id = null;

        $senha = Senha::where('guiche_id', $this->guiche_id)
        ->where('status', 'chamado')
        ->whereDate('created_at',Carbon::now())
        ->orderByRaw("prioritaria DESC, created_at ASC")
        ->first();
        $this->senhaAtual = $senha;
      
    }

    public function chamarProximaSenha()
    {
    
       
        if (!$this->guiche_id || !$this->fila_id) {
            session()->flash('error', 'Selecione um guichê e uma fila primeiro.');
            return;
        }



        // Obtém a próxima senha (alternando entre normal e prioritária)
        $senha = Senha::where('guiche_id', $this->guiche_id)
            ->where('status', 'chamado')
            ->first();

       
            
        if($senha) {
            $senha->encaminharParaProximaFila();
            $senha = Senha::where('fila_id', $this->fila_id)
            ->where('status', 'pendente')
            ->orderByRaw("prioritaria DESC, created_at ASC")
            ->first();
            if($senha) {
                $senha->iniciarAtendimento($this->guiche_id);
            }else{
                session()->flash('error', 'Nenhuma senha disponível nesta fila.');
            }
            
        } else {
            $senha = Senha::where('fila_id', $this->fila_id)
            ->where('status', 'pendente')
            ->orderByRaw("prioritaria DESC, created_at ASC")
            ->first();
            if($senha) {
                $senha->iniciarAtendimento($this->guiche_id);
            }else{
                session()->flash('error', 'Nenhuma senha disponível nesta fila.');
            }
        }
       
    }

    public function finalizarAtendimento()
    {
        if ($this->senhaAtual) {
            $this->senhaAtual->encaminharParaProximaFila();
            $this->senhaAtual = null;
        }
    }

    public function render()
    {
        
        $this->senhaAtual = Senha::where('guiche_id',$this->guiche_id)->where('status','chamado')->first();
       if($this->filasDisponiveis!=[]){
            $filasIds = $this->filasDisponiveis->pluck('id')->toArray(); // Pega apenas os IDs
            $this->proximasSenhas  = Senha::whereIn('fila_id', $filasIds)
            ->where('status','pendente')
            ->whereDate('created_at',Carbon::now())
            ->orderBy('created_at')
            ->limit(10)
            ->get();
       }else{
            $this->proximasSenhas =[];
       }
      
        return view('livewire.chamar-senha', [
            'guiches' => Guiche::all()
        ]);
    }
}
