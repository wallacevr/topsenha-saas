<?php

namespace App\Livewire;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;
use App\Models\Fila;

class Filas extends Component
{
    public $nome, $prefixo,  $novoCampo, $campos = [], $filas, $fila_id,$proxima_fila_id;
    public  $modalEdit = false, $filaId;
    public function mount()
    {
        $this->filas = Fila::all();
       
    }
    public function addCampo()
    {
        if (!empty($this->novoCampo)) {
            $this->campos[] = $this->novoCampo;
            $this->novoCampo = ''; // Limpa o campo
        }
    }

    public function removeCampo($index)
    {
        unset($this->campos[$index]);
        $this->campos = array_values($this->campos); // Reorganiza os índices
    }
    public function create()
    {
        $this->validate([
            'nome' => 'required|string',
            'prefixo' => 'required|string|max:3',
        ]);

        Fila::create([
            'nome' => $this->nome,
            'prefixo' => $this->prefixo,
            'campos' => json_encode($this->campos), // Salva os campos dinâmicos
            'proxima_fila_id' => $this->proxima_fila_id,
        ]);

        $this->resetInput();
        $this->filas = Fila::all();
    }

    public function confirmDelete($id){
        LivewireAlert::title('Deseja realmente deletar a fila?')
        ->withConfirmButton('Confirmar')
        ->onConfirm('delete', ['id' => $id])
        ->withCancelButton('Cancelar')
        ->onDismiss('resetInput')
        ->show();
    }


    public function delete($id)
    {
        Fila::findOrFail($id['id'])->delete();
        $this->filas = Fila::all();
    }

    public function render()
    {
        return view('livewire.filas', [
            'todasFilas' => Fila::all(), // Enviar todas as filas para o select de próxima fila
        ]);
    }

    public function resetInput()
    {
        $this->nome = '';
        $this->prefixo = '';
        $this->campos = [];
        $this->proxima_fila_id=null;
    }

    public function edit($id)
    {
        $fila = Fila::find($id);
        $this->filaId = $fila->id;
        $this->nome = $fila->nome;
        $this->prefixo = $fila->prefixo;
        $this->campos = json_decode($fila->campos, true) ?? [];
        $this->proxima_fila_id = $fila->proxima_fila_id;
        $this->modalEdit = true; // Abrir o modal
    }
    public function saveEdit()
    {
        if ($this->filaId) {
            $fila = Fila::find($this->filaId);
            $fila->update([
                'nome' => $this->nome,
                'prefixo' => $this->prefixo,
                'campos' => json_encode($this->campos),
                'proxima_fila_id' => $this->proxima_fila_id,
            ]);
        }

        $this->modalEdit = false; // Fechar o modal
        $this->reset(['filaId', 'nome', 'prefixo', 'campos', 'novoCampo', 'proxima_fila_id']);
        $this->filas = Fila::all();
    }
}
