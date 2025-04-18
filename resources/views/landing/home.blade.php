@extends('layouts.central')

@section('title', 'Bem-vindo à TopSenha')

@section('content')
<section class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h1 class="text-4xl font-bold text-gray-900 mb-4">Gerencie filas com praticidade e modernidade</h1>
        <p class="text-lg text-gray-600 mb-8">
            Com a <strong>TopSenha</strong>, você oferece atendimento organizado, com autoatendimento, senhas eletrônicas e controle total dos guichês.
        </p>
        <a href="{{ route('cadastro') }}" class="px-6 py-3 bg-indigo-600 text-white rounded-md text-lg hover:bg-indigo-700">
            Comece agora
        </a>
    </div>
</section>

<section class="bg-gray-50 py-16">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-12">Benefícios da TopSenha</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Card 1 -->
            <div class="bg-white shadow-lg rounded-lg p-6 text-center">
                <img src="https://www.svgrepo.com/show/433250/qr-code-scan.svg" alt="QR Code" class="h-16 mx-auto mb-4">
                <h3 class="text-xl font-semibold mb-2">Autoatendimento com QR Code</h3>
                <p class="text-gray-600">Seus clientes emitem senhas com autonomia via totens ou celular.</p>
            </div>

            <!-- Card 2 -->
            <div class="bg-white shadow-lg rounded-lg p-6 text-center">
                <img src="https://www.svgrepo.com/show/382568/dashboard.svg" alt="Painel" class="h-16 mx-auto mb-4">
                <h3 class="text-xl font-semibold mb-2">Painel de Chamadas</h3>
                <p class="text-gray-600">Monitores exibem senhas chamadas com som e direcionamento.</p>
            </div>

            <!-- Card 3 -->
            <div class="bg-white shadow-lg rounded-lg p-6 text-center">
                <img src="https://www.svgrepo.com/show/430682/data-analytics.svg" alt="Analytics" class="h-16 mx-auto mb-4">
                <h3 class="text-xl font-semibold mb-2">Relatórios e Controle</h3>
                <p class="text-gray-600">Tenha acesso a dados de atendimento em tempo real e relatórios gerenciais.</p>
            </div>
        </div>
    </div>
</section>
@endsection
