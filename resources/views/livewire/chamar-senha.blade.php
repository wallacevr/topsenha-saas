<div class="container mx-auto max-w-4xl p-6 bg-white shadow-lg rounded-lg mt-10 flex gap-6" wire:poll>
    <!-- Seção Principal -->
    <div class="w-2/3">
        <h2 class="text-2xl font-bold text-center mb-6">Chamar Próxima Senha</h2>

        <!-- Seleção do Guichê -->
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold">Selecione o Guichê</label>
            <select wire:model="guiche_id" class="w-full border p-2 rounded text-sm">
                <option value="">Selecione...</option>
                @foreach($guiches as $guiche)
                    <option value="{{ $guiche->id }}">{{ $guiche->nome }}</option>
                @endforeach
            </select>
        </div>

        <!-- Seleção da Fila -->
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold">Selecione a Fila</label>
            <select wire:model="fila_id" class="w-full border p-2 rounded text-sm">
                <option value="">Selecione...</option>
                @foreach($filasDisponiveis as $fila)
                    <option value="{{ $fila->id }}">{{ $fila->nome }}</option>
                @endforeach
            </select>
        </div>

        <!-- Botões -->
        <div class="flex gap-4">
            <button wire:click="chamarProximaSenha" class="btn btn-primary flex-1">
                Chamar Próxima Senha
            </button>

            @if ($senhaAtual)
                <button wire:click="finalizarAtendimento" class="btn btn-danger flex-1">
                    Finalizar Atendimento
                </button>
            @endif
        </div>

        <!-- Exibir Senha Atual -->
        @if ($senhaAtual)
            <div class="mt-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                <strong>Senha Atual:</strong> {{ $senhaAtual->senha }}
                <br>
                <strong>Início Atendimento:</strong> {{ $senhaAtual->inicio_atendimento->format('H:i:s') }}
            </div>
        @endif
    </div>

    <!-- Seção Lateral - Próximas Senhas -->
    <div class="w-1/3 p-2 bg-gray-100 rounded-lg">
        <h3 class="text-lg font-bold mb-3 text-center">Próximas Senhas</h3>
        <ul class="space-y-2">
            @forelse($proximasSenhas as $senha)
                <li class="p-2  border rounded">{{ $senha->senha }} ({{ $senha->fila->nome }})
               <br>
             
               @if(collect((array) $senha->campos)->filter(function($valor) {
                    return !is_null($valor) && trim($valor) !== '';
                })->isNotEmpty())
                    @foreach($senha->campos as $chave => $valor)
                       {{ $chave }} :{{ $valor }}
                    @endforeach
                 @endif
                </li>
            @empty
                <li class="text-gray-500">Nenhuma senha na fila</li>
            @endforelse
        </ul>
    </div>
</div>

