<x-app-layout>
    <x-slot name="header">Novo Livro</x-slot>

    <div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow mt-6">
        <form action="{{ route('books.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700">Título</label>
                <input type="text" name="title" class="w-full border-gray-300 rounded-md shadow-sm" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Autor</label>
                <select name="author_id" class="w-full border-gray-300 rounded-md shadow-sm" >
                    <option value="">Selecione um autor...</option>
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}" >{{ $author->name }}</option>
                    @endforeach
                </select>
                @error('author_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">ISBN</label>
                    <input type="text" name="isbn" class="w-full border-gray-300 rounded-md shadow-sm" required>
                    @error('isbn') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Status</label>
                    <select name="status" class="w-full border-gray-300 rounded-md shadow-sm">
                        @foreach($statuses as $status)
                            <option value="{{ $status->value }}">{{ $status->label() }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
                Salvar Livro
            </button>
        </form>
    </div>
</x-app-layout>