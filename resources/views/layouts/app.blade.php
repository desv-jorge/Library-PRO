<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Library PRO') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen flex">
        
        <aside class="w-64 bg-indigo-900 text-white flex flex-col min-h-screen fixed left-0 top-0 z-50">
            <div class="p-6 text-2xl font-bold border-b border-indigo-800 flex items-center gap-2">
                <span>📚</span> Library PRO
            </div>
                <nav class="flex-1 px-4 py-6 space-y-2">
                    <a href="{{ route('dashboard') }}" 
                    class="flex items-center gap-3 px-4 py-3 rounded transition hover:bg-indigo-700 {{ request()->routeIs('dashboard') ? 'bg-indigo-700' : '' }}">
                    <span>📊</span> Dashboard
                    </a>
                    
                    <a href="{{ route('authors.index') }}" 
                    class="flex items-center gap-3 px-4 py-3 rounded transition hover:bg-indigo-700 {{ request()->routeIs('authors.*') ? 'bg-indigo-700' : '' }}">
                    <span>✍️</span> Autores
                    </a>

                    <a href="{{ route('books.index') }}" 
                    class="flex items-center gap-3 px-4 py-3 rounded transition hover:bg-indigo-700 {{ request()->routeIs('books.*') ? 'bg-indigo-700' : '' }}">
                    <span>📖</span> Livros
                    </a>

                    <form method="POST" action="{{ route('logout') }}" class="mt-8 border-t border-indigo-800 pt-4">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 hover:bg-red-600 rounded text-red-200 hover:text-white transition flex items-center gap-3">
                            <span>🚪</span> Sair
                        </button>
                    </form>
                </nav>
        </aside>

        <div class="flex-1 ml-64 flex flex-col min-h-screen w-full">
            <header class="bg-white shadow p-4 flex justify-between items-center sticky top-0 z-40">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ $header ?? 'Painel Administrativo' }}
                </h2>
                <div class="text-gray-600 text-sm flex items-center gap-2">
                    <div class="bg-indigo-100 text-indigo-700 rounded-full w-8 h-8 flex items-center justify-center font-bold">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                    <span>Olá, {{ Auth::user()->name }}</span>
                </div>
            </header>

            <main class="p-6 flex-1 overflow-y-auto">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>
</html>