<x-app-layout>
    <x-slot name="header">Editar Livro: {{ $book->name }}</x-slot>

    <div class="max-w-3xl mx-auto">
        <a href="{{ route('books.index') }}" class="text-indigo-600 hover:text-indigo-800 mb-4 inline-block text-sm font-medium">
            &larr; Voltar
        </a>
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="p-8">
                <form method="POST" action="{{ route('books.update', $book->id) }}" class="space-y-6">
                    @csrf
                    @method('PUT') <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
                        <input type="text" name="title" id="title" value="{{ old('name', $book->title) }}" required
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2 border">
                        @error('name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="author_id" class="block text-sm font-medium text-slate-700 mb-1">Autor</label>
                        <select name="author_id" id="author_id" class="w-full border-gray-300 rounded-md shadow-sm">
                            @foreach($authors as $author)
                                <option value="{{ $author->id }}"
                                    {{-- Lógica: Se o ID do loop for igual ao ID salvo no livro, marca como selecionado --}}
                                    {{ old('author_id', $book->author_id) == $author->id ? 'selected' : '' }}>
                                    {{ $author->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('author_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">ISBN</label>
                            <input type="text" name="isbn" value="{{ old('isbn', $book->isbn) }}" class="w-full border-gray-300 rounded-md shadow-sm" required>
                            @error('isbn') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Status</label>
                            <select name="status" class="w-full border-gray-300 rounded-md shadow-sm">
                                <option value="">{{ old('status', $book->status) }}</option>
                                @foreach($statuses as $status)
                                    {{ old('status', $book->status) == $book->status ? 'selected' : '' }}>
                                    <option value="{{ $status->value }}">{{ $status->label() }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="pt-4">
                        <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-bold text-white bg-indigo-600 hover:bg-indigo-700 transition-colors">
                            Atualizar Livro
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>