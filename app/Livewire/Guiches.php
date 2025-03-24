<?php

namespace App\Livewire;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;
use App\Models\Guiche;
use App\Models\Fila;

class Guiches extends Component
{
    public $nome, $guiches, $filas, $guiche_id, $selectedFilas = [];
    public $modalEdit = false;
    public function mount()
    {
        $this->guiches = Guiche::all();
        $this->filas = Fila::all();
    }

    public function create()
    {
        $this->validate(['nome' => 'required|string']);
        $guiche = Guiche::create(['nome' => $this->nome]);
        $guiche->filas()->attach($this->selectedFilas);
        $this->resetInput();
        $this->guiches = Guiche::all();
    }

    public function delete($id)
    {
        Guiche::findOrFail($id['id'])->delete();
        $this->guiches = Guiche::all();
    }

    public function render()
    {
        return view('livewire.guiches');
    }

    public function resetInput()
    {
        $this->nome = '';
        $this->selectedFilas = [];
    }

    public function edit($id)
    {
        $guiche = Guiche::findOrFail($id);
        $this->guiche_id = $guiche->id;
        $this->nome = $guiche->nome;
        $this->selectedFilas = $guiche->filas()->pluck('filas.id')->toArray();
        $this->modalEdit = true;
    }

    public function update()
    {
        $guiche = Guiche::findOrFail($this->guiche_id);
        $guiche->update(['nome' => $this->nome]);
        $guiche->filas()->sync($this->selectedFilas);
        $this->resetInput();
        $this->guiches = Guiche::with('filas')->get();
        $this->modalEdit = false;
    }

    public function confirmDelete($id){
        LivewireAlert::title('Deseja realmente deletar a guichê?')
        ->withConfirmButton('Confirmar')
        ->onConfirm('delete', ['id' => $id])
        ->withCancelButton('Cancelar')
        ->onDismiss('resetInput')
        ->show();
    }
}

