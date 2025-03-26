
<div class="flex flex-col h-screen" wire:poll.1s="atualizarPainel"> 
    
    <div class="flex flex-1">
        <!-- Área da Senha (70%) -->
        <div class="w-7/10 bg-blue-500 text-white flex flex-col  p-8">
            @if($senhasChamadas->isNotEmpty())
                <div class="text-8xl font-bold">Senha</div>
                <div class=" font-extrabold" style="font-size: 12rem;">{{ $senhasChamadas->first()->senha}}</div>
                <div class="text-5xl mt-4">Guichê</div>
                <div class="text-8xl font-bold">{{ $senhasChamadas->first()->guiche->nome }}</div>
            @else
                <div class="text-4xl">Aguardando Chamadas...</div>
            @endif
        </div>

        <!-- Lista de Últimas Chamadas (30%) -->
        <div class="w-3/10 bg-gray-200 p-4">
            <h2 class="text-2xl font-bold mb-4 text-center">Últimas Chamadas</h2>
            <div class="grid grid-cols-2 gap-4">
                <div class="font-bold">Senha</div>
                <div class="font-bold">Guichê</div>

                @foreach($senhasChamadas->slice(1) as $senha)
                    <div class="text-xl">{{ $senha->senha }}</div>
                    <div class="text-xl">{{ $senha->guiche->nome }}</div>
                @endforeach
            </div>
        </div>
    </div>
</div>


@push('scripts')
<script>
    document.addEventListener('tocar-som', () => {
        const audio = new Audio('{{ asset('som/alerta.mp3') }}');
        audio.play().catch(e => console.error('Erro ao reproduzir som:', e));
    });
</script>
@endpush

