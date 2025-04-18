<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Fila;
use App\Models\Senha;

class Senhas extends Component
{
    public $fila_id = null, $prioritaria = false, $filas = [], $camposDinamicos = [];
    public $inputsDinamicos = []; // Armazena os valores preenchidos pelo usuário
    public $ultimaSenha;
    
    public function mount()
    {
        $this->filas = Fila::all();
    }

    public function updatedFilaId()
    {
        $this->loadCamposDinamicos();
    }

    public function loadCamposDinamicos()
    {
        $fila = Fila::find($this->fila_id);
        if ($fila) {
            $this->camposDinamicos = json_decode($fila->campos, true) ?? [];
            $this->inputsDinamicos = array_fill_keys($this->camposDinamicos, '');
        } else {
            $this->camposDinamicos = [];
            $this->inputsDinamicos = [];
        }
    }

    public function generate()
    {
        try {
            $this->validate([
                'fila_id' => 'required|exists:filas,id',
               
            ]);
    
            $fila = Fila::findOrFail($this->fila_id);
            $numero = Senha::where('fila_id', $fila->id)
                ->whereDate('created_at', now())
                ->count() + 1;
            $codigo = "{$fila->prefixo}-" . str_pad($numero, 3, '0', STR_PAD_LEFT);
            $this->inputsDinamicos = collect($this->inputsDinamicos)->map(function ($valor) {
                return is_null($valor) || trim($valor) === '' ? '-' : $valor;
            })->toArray();
            $senha = Senha::create([
                'fila_id' => $fila->id,
                'senha' => $codigo,
                'prioritaria' => $this->prioritaria,
                'status' => 'pendente',
              'campos' => $this->inputsDinamicos
    
            ]);
    
            $this->ultimaSenha = $senha;
            $this->reset(['fila_id', 'prioritaria', 'inputsDinamicos']);
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
    }
    private function corrigirEstruturaInputs($inputs)
    {
        $dadosFormatados = [];
    
        foreach ($inputs as $chave => $valor) {
            // Garantir que a chave seja um texto válido e o valor não seja vazio
            if (!is_numeric($chave) && trim($valor) !== '') {
                $dadosFormatados[$chave] = $valor;
            }
        }
    
        return $dadosFormatados;
    }
    
    public function render()
    {
        return view('livewire.senhas');
    }
}
