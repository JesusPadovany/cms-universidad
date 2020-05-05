<?php

namespace App\Http\Controllers;

use App\Book;
use App\Page;

class LibraryController extends Controller
{
    public function index()
    {
        return view('library.index', [
            'books' => Book::paginate(10),
            'page' => Page::where('name', 'biblioteca')->first()
        ]);
    }

    public function show($slug, $id)
    {
        $book = Book::where('id', $id)
            ->where('slug', $slug)
            ->firstOrFail();

        return view('library.show', [
            'book' => $book
        ]);
    }
}
