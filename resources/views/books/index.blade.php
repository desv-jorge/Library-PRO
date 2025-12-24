<x-app-layout>
    <x-slot name="header">Livros</x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <div class="flex justify-end mb-4">
                <a href="{{ route('books.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
                    + Novo Livro
                </a>
            </div>

            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Título</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Autor</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($books as $book)
                        <tr>
                            <td class="px-6 py-4">{{ $book->title }} <br> <span class="text-xs text-gray-500">{{ $book->isbn }}</span></td>
                            <td class="px-6 py-4">{{ $book->author->name }}</td>
                            <td class="px-6 py-4">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    {{ $book->status === \App\Enums\BookStatus::AVAILABLE ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                    {{ $book->status->label() }}
                                </span>
                            </td>
                                                        <td class="px-6 py-4 text-right flex justify-end gap-4">
                                <a href="{{ route('books.edit', $book->id) }}" class="text-indigo-600 hover:text-indigo-900 font-medium">
                                    Editar
                                </a>

                                <form action="{{ route('books.destroy', $book->id) }}" method="POST" 
                                    onsubmit="return confirm('Tem certeza que deseja excluir este livro?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 font-medium">
                                        Excluir
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-10 text-center text-gray-500">
                                <div class="flex flex-col items-center justify-center">
                                    <span class="text-2xl mb-2">📚</span>
                                    <p class="text-lg font-medium">Nenhum livro cadastrado ainda.</p>
                                    <p class="text-sm">Comece adicionando um novo livro ao acervo.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="mt-4">{{ $books->links() }}</div>
        </div>
    </div>
</x-app-layout>