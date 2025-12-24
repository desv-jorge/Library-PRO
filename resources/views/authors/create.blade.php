<x-app-layout>
    <x-slot name="header">
        Novo Autor
    </x-slot>

    <div class="max-w-3xl mx-auto">
        <a href="{{ route('authors.index') }}" class="text-indigo-600 hover:text-indigo-800 mb-4 inline-block text-sm font-medium">
            &larr; Voltar para a lista
        </a>

        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="p-8">
                <div class="uppercase tracking-wide text-sm text-indigo-500 font-bold mb-6">Cadastro de Autor</div>
                
                <form method="POST" action="{{ route('authors.store') }}" class="space-y-6">
                    @csrf

                    <div>
                        <label for="name" class="block text-sm font-medium text-slate-700 mb-1">Nome Completo</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2 border">
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="bio" class="block text-sm font-medium text-slate-700 mb-1">Biografia</label>
                        <textarea name="bio" id="bio" rows="4"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2 border">{{ old('bio') }}</textarea>
                    </div>

                    <div>
                        <label for="birth_date" class="block text-sm font-medium text-slate-700 mb-1">Data de Nascimento</label>
                        <input type="date" name="birth_date" id="birth_date" required
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2 border">
                        @error('birth_date')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="pt-4">
                        <button type="submit" 
                            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-bold text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                            Salvar Autor
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>