

<div class="container mx-auto max-w-3xl p-6 bg-white shadow-lg rounded-lg mt-10">
    <h2 class="text-2xl font-bold text-center mb-6">Gerenciar Filas</h2>

    <!-- Formulário de Criação -->
    <div class="mb-6 space-y-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700 font-semibold">Nome da Fila</label>
                <input type="text" wire:model="nome" class="w-full border p-2 rounded text-sm" placeholder="Nome da fila">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold">Prefixo</label>
                <input type="text" wire:model="prefixo" class="w-full border p-2 rounded text-sm" placeholder="Prefixo">
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <h3 class="text-lg font-semibold">Próxima Fila (Opcional)</h3>
                <select wire:model="proxima_fila_id" class="w-full border p-2 rounded text-sm">
                    <option value="">Nenhuma</option>
                    @foreach($todasFilas as $fila)
                        <option value="{{ $fila->id }}">{{ $fila->nome }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <h3 class="text-lg font-semibold">Campos Personalizados</h3>
                <div class="flex gap-2">
                    <input type="text" wire:model="novoCampo" class="border p-2 rounded text-sm flex-1" placeholder="Nome do campo">
                    <button  wire:click="addCampo" class="btn btn-primary">+</button>
                </div>
                <ul class="mt-2">
                    @foreach($campos as $index => $campo)
                        <li class="flex justify-between bg-gray-100 p-2 mt-1 rounded text-sm">
                            {{ $campo }} 
                            <button type="button" wire:click="removeCampo({{ $index }})" class="text-red-500 hover:underline">Remover</button>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>

        <button wire:click="create" class="btn btn-success ">Criar Fila</button>
    </div>

    <!-- Listagem de Filas -->
    <h3 class="text-lg font-bold mt-6 text-center">Filas Cadastradas</h3>
    <ul class="mt-4 space-y-3">
        @foreach($filas as $fila)
            <li class="bg-gray-100 p-4 rounded flex justify-between items-center text-sm">
                <div>
                    <span class="font-semibold">{{ $fila->nome }} ({{ $fila->prefixo }})</span> 
                    <small class="text-gray-600">
                        Campos: {{ implode(', ', json_decode($fila->campos, true) ?? []) }} 
                    </small>
                    @if($fila->proximaFila)
                        <small class="text-blue-500"> → Próxima: {{ $fila->proximaFila->nome }}</small>
                    @endif
                </div>
                <div class="flex gap-2">
                    <button wire:click="edit({{ $fila->id }})" class="btn btn-secondary">Editar</button>
                    <button wire:click="confirmDelete({{ $fila->id }})" class="btn btn-danger">Excluir</button>
                </div>
            </li>
        @endforeach
    </ul>

    <!-- Modal de Edição -->
    <div x-data="{ open: @entangle('modalEdit') }">
        <div x-show="open" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50">
            <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                <h2 class="text-xl font-bold mb-4">Editar Fila</h2>

                <div class="space-y-2">
                    <label class="block text-gray-700 font-semibold">Nome</label>
                    <input type="text" wire:model="nome" class="w-full border p-2 rounded text-sm">

                    <label class="block text-gray-700 font-semibold">Prefixo</label>
                    <input type="text" wire:model="prefixo" class="w-full border p-2 rounded text-sm">
                </div>

                <h3 class="text-lg font-semibold mt-4">Campos Personalizados</h3>
                <div class="flex gap-2">
                    <input type="text" wire:model="novoCampo" class="w-full border p-2 rounded text-sm">
                    <button wire:click="addCampo" class="btn btn-primary">+</button>
                </div>

                <ul class="mt-2">
                    @foreach($campos as $index => $campo)
                        <li class="flex justify-between bg-gray-100 p-2 mt-1 rounded text-sm">
                            {{ $campo }} 
                            <button wire:click="removeCampo({{ $index }})" class="btn btn-danger">Remover</button>
                        </li>
                    @endforeach
                </ul>

                <h3 class="text-lg font-semibold mt-4">Próxima Fila</h3>
                <select wire:model="proxima_fila_id" class="w-full border p-2 rounded text-sm">
                    <option value="">Nenhuma</option>
                    @foreach($todasFilas as $fila)
                        <option value="{{ $fila->id }}">{{ $fila->nome }}</option>
                    @endforeach
                </select>

                <div class="mt-4 flex justify-end gap-2">
                    <button @click="open = false" wire:click="resetInput" class="btn btn-secondary">Cancelar</button>
                    <button wire:click="saveEdit" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </div>
    </div>

</div>

