<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthorRequest;
use App\Models\Author;

use App\Http\Requests\UpdateAuthorRequest;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AuthorController extends Controller
{
    // Exibe o formulário
    public function create(): View
    {
        return view('authors.create');
    }

    public function edit(Author $author): View
    {
        return view('authors.edit', compact('author'));
    }

    public function update(UpdateAuthorRequest $request, Author $author): RedirectResponse
    {
        // O método update() do Eloquent já filtra pelo $fillable
        $author->update($request->validated());

        return to_route('authors.index')
            ->with('message', 'Autor atualizado com sucesso!');
    }

    public function destroy(Author $author): RedirectResponse
    {
        // Verifica se o autor tem livros antes de deletar (Integridade Referencial)
        // Embora tenhamos usado cascadeOnDelete na migration, é bom avisar o usuário ou impedir via software se preferir.
        // Aqui deixaremos o banco cuidar do cascade.
        
        $author->delete();

        return to_route('authors.index')
            ->with('message', 'Autor removido com sucesso!');
    }

    public function index(): View
    {
        // Paginação automática de 10 itens por página, ordenado pelo mais recente
        $authors = Author::latest()->paginate(10);
        
        return view('authors.index', compact('authors'));
    }

    // Processa o formulário
    // Note a injeção de dependência do StoreAuthorRequest
    public function store(StoreAuthorRequest $request): RedirectResponse
    {
        // O método validated() retorna apenas os campos que passaram nas regras.
        // Isso é muito mais seguro que $request->all().
        Author::create($request->validated());

        // Sintaxe curta e legível para redirecionamento [cite: 74]
        return to_route('authors.index')
            ->with('message', 'Autor cadastrado com sucesso!'); 
    }
}
