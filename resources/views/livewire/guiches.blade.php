<div class="container mx-auto max-w-3xl p-6 bg-white shadow-lg rounded-lg mt-10">
    <h2 class="text-2xl font-bold text-center mb-6">Gerenciar Guichês</h2>

    <!-- Formulário de Criação -->
    <div class="mb-6 space-y-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700 font-semibold">Nome do Guichê</label>
                <input type="text" wire:model="nome" class="w-full border p-2 rounded text-sm" placeholder="Nome do guichê">
            </div>
            
            <div>
                <label class="block text-gray-700 font-semibold">Filas Vinculadas</label>
                <select wire:model="selectedFilas" multiple class="w-full border p-2 rounded text-sm">
                    @foreach($filas as $fila)
                        <option value="{{ $fila->id }}">{{ $fila->nome }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <button wire:click="create" class="btn btn-success">Criar Guichê</button>
    </div>

    <!-- Listagem de Guichês -->
    <h3 class="text-lg font-bold mt-6 text-center">Guichês Cadastrados</h3>
    <ul class="mt-4 space-y-3">
        @foreach($guiches as $guiche)
            <li class="bg-gray-100 p-4 rounded flex justify-between items-center text-sm">
                <div>
                    <span class="font-semibold">{{ $guiche->nome }}</span>
                    <small class="text-gray-600">
                        Filas: {{ implode(', ', $guiche->filas->pluck('nome')->toArray()) }}
                    </small>
                </div>
                <div class="flex gap-2">
                    <button wire:click="edit({{ $guiche->id }})" class="btn btn-secondary">Editar</button>
                    <button wire:click="confirmDelete({{ $guiche->id }})" class="btn btn-danger">Excluir</button>
                </div>
            </li>
        @endforeach
    </ul>

    <!-- Modal de Edição -->
    <div x-data="{ open: @entangle('modalEdit') }">
        <div x-show="open" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50">
            <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                <h2 class="text-xl font-bold mb-4">Editar Guichê</h2>

                <div class="space-y-2">
                    <label class="block text-gray-700 font-semibold">Nome</label>
                    <input type="text" wire:model="nome" class="w-full border p-2 rounded text-sm">

                    <label class="block text-gray-700 font-semibold">Filas Vinculadas</label>
                    <select wire:model="selectedFilas" multiple class="w-full border p-2 rounded text-sm">
                        @foreach($filas as $fila)
                            <option value="{{ $fila->id }}">{{ $fila->nome }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-4 flex justify-end gap-2">
                    <button @click="open = false" wire:click="resetInput" class="btn btn-secondary">Cancelar</button>
                    <button wire:click="update" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </div>
    </div>
</div>
