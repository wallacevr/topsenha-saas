<div class="max-w-3xl mx-auto mt-10 bg-white shadow-lg rounded-lg p-6" wire:poll>
    <h2 class="text-3xl font-bold text-center mb-6">Gerar Senha</h2>

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Selecione a Fila</label>
        <select wire:model="fila_id" class="w-full border p-2 rounded text-sm">
            <option value="">Escolha uma fila</option>
            @foreach($filas as $fila)
                <option value="{{ $fila->id }}">{{ $fila->nome }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-4 flex items-center">
        <input type="checkbox" wire:model="prioritaria" class="mr-2">
        <label class="text-sm font-medium text-gray-700">Senha Prioritária</label>
    </div>

    <!-- ✅ Exibir os Campos Dinâmicos Corretamente -->
    @if (!empty($camposDinamicos))
        <div class="mt-4">
            <h3 class="text-lg font-semibold">Preencha os Campos</h3>
            @foreach ($camposDinamicos as $index => $campo)
                <div class="mt-2">
                    <label class="text-gray-700">{{ $campo }}</label>
                    <input type="text" wire:model.defer="inputsDinamicos.{{ $index }}" class="w-full border p-2 rounded text-sm">
                </div>
            @endforeach
        </div>
    @endif

    <button wire:click="generate"
        class="btn btn-primary my-2">
        Gerar Senha
    </button>

    @if ($ultimaSenha)
        <div class="mt-4 text-center bg-gray-200 p-4 rounded-lg text-xl font-bold">
            Senha: {{ $ultimaSenha->senha }}
        </div>
    @endif
</div>





