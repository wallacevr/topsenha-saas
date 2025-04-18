<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'TopSenha')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Flowbite & Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-50 text-gray-900 flex flex-col min-h-screen">

<!-- Header -->
<header class="bg-white shadow">
    <div class="max-w-screen-xl mx-auto flex flex-wrap items-center justify-between p-4">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('img/logo.png') }}" class="h-20 mt-2" alt="Logo TopSenha" />
        </a>

        <!-- Botão hamburguer -->
        <button 
            data-collapse-toggle="navbar-default" 
            type="button" 
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" 
            aria-controls="navbar-default" 
            aria-expanded="false"
        >
            <span class="sr-only">Abrir menu principal</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                      d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>

        <!-- Links do menu -->
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="font-medium flex flex-col md:flex-row md:space-x-8 rtl:space-x-reverse mt-4 md:mt-0">
                <li>
                    <a href="{{ route('home') }}" class="block py-2 px-3 text-gray-600 hover:text-indigo-600">Início</a>
                </li>
                <li>
                    <a href="{{ route('cadastro') }}" class="block py-2 px-3 text-gray-600 hover:text-indigo-600">Cadastro</a>
                </li>
                <li>
                    <a href="{{ route('quem-somos') }}" class="block py-2 px-3 text-gray-600 hover:text-indigo-600">Quem Somos</a>
                </li>
                <li>
                    <a href="{{ route('faq') }}" class="block py-2 px-3 text-gray-600 hover:text-indigo-600">Dúvidas Frequentes</a>
                </li>
            </ul>
        </div>
    </div>
</header>


    <!-- Main -->
    <main class="flex-1">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-100 border-t mt-10 text-sm text-gray-600">
        <div class="max-w-7xl mx-auto px-4 py-6 flex flex-col sm:flex-row justify-between items-center gap-3">
            <p>© {{ now()->year }} TopSenha. Todos os direitos reservados.</p>
            <div class="space-x-4">
                <a href="{{ route('quem-somos') }}" class="hover:text-indigo-600">Quem Somos</a>
                <a href="{{ route('faq') }}" class="hover:text-indigo-600">Dúvidas Frequentes</a>
                <a href="{{ route('cadastro') }}" class="hover:text-indigo-600">Cadastro</a>
            </div>
        </div>
    </footer>
<!-- Tailwind e Flowbite CSS -->
<link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />

<!-- Flowbite JS no final do body -->
<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

</body>
</html>
