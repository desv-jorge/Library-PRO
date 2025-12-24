<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        // Recuperamos estatísticas simples
        $totalAuthors = Author::count();
        $recentAuthors = Author::latest()->take(5)->get();

        return view('dashboard', compact('totalAuthors', 'recentAuthors'));
    }
}
