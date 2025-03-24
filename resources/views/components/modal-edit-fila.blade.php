<div x-data="{ open: @entangle($attributes->wire('model')).defer }">
    <div x-show="open" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96">
            <h2 class="text-xl font-bold mb-4">{{ $title }}</h2>
            <div>
                {{ $slot }}
            </div>
            <div class="mt-4 flex justify-end gap-2">
                <button @click="open = false" class="bg-gray-400 text-white px-3 py-2 rounded">Cancelar</button>
                <button wire:click="saveEdit" class="bg-blue-500 text-white px-3 py-2 rounded">Salvar</button>
            </div>
        </div>
    </div>
</div>