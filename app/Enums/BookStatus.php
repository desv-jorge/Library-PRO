<?php

declare(strict_types=1);

namespace App\Enums;

enum BookStatus: string
{
    case AVAILABLE = 'available';
    case BORROWED = 'borrowed';
    
    public function label(): string
    {
        return match($this) {
            self::AVAILABLE => 'Disponível',
            self::BORROWED => 'Emprestado',
        };
    }
}