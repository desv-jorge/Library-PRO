<?php

namespace App\Models;

use App\Enums\BookStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    protected $fillable = ['title', 'isbn', 'author_id', 'status'];

    protected $casts = [
        'status' => BookStatus::class, // Converte string do banco para Enum automaticamente
    ];

    // Relação: Livro PERTENCE A um Autor
    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }
}
