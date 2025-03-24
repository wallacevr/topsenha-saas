<div wire:poll="atualizarPainel">
    <h2 class="text-2xl font-bold text-center mb-4">Painel de Senhas</h2>

    <ul>
        @foreach($senhasChamadas as $senha)
            <li class="p-4 bg-gray-100 border-b">
                <strong>Senha:</strong> {{ $senha->senha }} - 
                <strong>Guichê:</strong> {{ $senha->guiche->nome }}
            </li>
        @endforeach
    </ul>
</div>

<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('senhaChamada', senha => {
            let msg = new SpeechSynthesisUtterance('Senha ' + senha);
            window.speechSynthesis.speak(msg);
        });
    });
</script>
