<?php

namespace App\Http\Controllers;

use App\Enums\BookStatus;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Author;
use App\Models\Book;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class BookController extends Controller
{
    public function index(): View
    {
        // Eager Loading: Traz o autor junto para evitar 101 queries
        $books = Book::with('author')->latest()->paginate(10);
        return view('books.index', compact('books'));
    }

    public function create(): View
    {
        // Precisamos da lista de autores para preencher o <select>
        $authors = Author::orderBy('name')->get(); 
        $statuses = BookStatus::cases(); // Passamos os casos do Enum
        
        return view('books.create', compact('authors', 'statuses'));
    }

    public function edit(Book $book): View
    {
        $authors = Author::orderBy('name')->get(); 
        $statuses = BookStatus::cases();

        return view('books.edit', compact('book','authors', 'statuses'));
    }

    // UPDATE: Processa as alterações
    public function update(UpdateBookRequest $request, Book $book): RedirectResponse
    {
        // O método update() do Eloquent já filtra pelo $fillable
        $book->update($request->validated());

        return to_route('books.index')
            ->with('message', 'Livro atualizado com sucesso!');
    }

    // DESTROY: Remove do banco
    public function destroy(Book $book): RedirectResponse
    {
        // Verifica se o autor tem livros antes de deletar (Integridade Referencial)
        // Embora tenhamos usado cascadeOnDelete na migration, é bom avisar o usuário ou impedir via software se preferir.
        // Aqui deixaremos o banco cuidar do cascade.
        
        $book->delete();

        return to_route('books.index')
            ->with('message', 'livro removido com sucesso!');
    }

    public function store(StoreBookRequest $request): RedirectResponse
    {
        Book::create($request->validated());
        return to_route('books.index')->with('message', 'Livro cadastrado com sucesso!');
    }
}
