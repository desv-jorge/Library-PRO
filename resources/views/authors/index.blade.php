<x-app-layout>
    <x-slot name="header">
        Gerenciar Autores
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 border-b border-gray-200 flex justify-between items-center">
            <h3 class="text-gray-700 font-bold text-lg">Listagem Completa</h3>
            <a href="{{ route('authors.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 text-sm font-medium transition shadow">
                + Novo Autor
            </a>
        </div>

        @if(session('message'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 m-6" role="alert">
                <p>{{ session('message') }}</p>
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full text-left text-sm whitespace-nowrap">
                <thead class="uppercase tracking-wider border-b-2 border-gray-200 bg-gray-50 text-gray-600 font-semibold">
                    <tr>
                        <th scope="col" class="px-6 py-4">ID</th>
                        <th scope="col" class="px-6 py-4">Nome</th>
                        <th scope="col" class="px-6 py-4">Nascimento</th>
                        <th scope="col" class="px-6 py-4 text-right">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($authors as $author)
                        <tr class="border-b hover:bg-gray-50 transition">
                            <td class="px-6 py-4 text-gray-500">#{{ $author->id }}</td>
                            <td class="px-6 py-4 font-medium text-gray-900">{{ $author->name }}</td>
                            <td class="px-6 py-4 text-gray-600">{{ $author->birth_date->format('d/m/Y') }}</td>
                            <td class="px-6 py-4 text-right flex justify-end gap-4">
                                <a href="{{ route('authors.edit', $author->id) }}" class="text-indigo-600 hover:text-indigo-900 font-medium">
                                    Editar
                                </a>

                                <form action="{{ route('authors.destroy', $author->id) }}" method="POST" 
                                    onsubmit="return confirm('Tem certeza que deseja excluir este autor? Todos os livros dele também serão apagados.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 font-medium">
                                        Excluir
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr class="border-b hover:bg-gray-50 transition">
                            <td colspan="4" class="px-6 py-10 text-center text-gray-500">
                                <div class="flex flex-col items-center justify-center">
                                    <span class="text-2xl mb-2">✍️</span>
                                    <p class="text-lg font-medium">Nenhum Autor cadastrado ainda.</p>
                                    <p class="text-sm">Comece cadastrando um novo Autor ao acervo.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-gray-100">
            {{ $authors->links() }}
        </div>
    </div>
</x-app-layout>