<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\AuthorBook;
use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Index Method
     */
    public function index(Request $filter) {
        $filtering = $filter->get('desc_filter');

        if ($filtering == null)
            $books = Book::orderBy('name')->paginate(5);
        else
            $books = Book::where('name', 'ilike', '%'.$filtering.'%')
                                ->orderBy("name")
                                ->paginate(5)
                                ->setpath('books?name=' . $filtering);

        return view('books.index', ['books' => $books]);
    }

    /** 
     * Create Book Method
     */
    public function create() {
        return view('books.create');
    }

    /**
     * Store Book Method
     * Stores a new book into the database
     */
    public function store(BookRequest $request) {
        $book = Book::create($request->all());
        $book->authors()->sync($request->get('authors'));
        $book->illustrators()->sync($request->get('illustrators'));

        return redirect('books');
    }

    /**
     * Delete Book Method
     */
    public function delete($id) {
        Book::find($id)->delete();

        return redirect('books');
    }

    /**
     * Edit Book Method
     */
    public function edit($id) {
        $book = Book::find($id);

        return view('books.edit', compact('book'));
    }

    /**
     * Update Book Method
     * Updates a book attributes
     */
    public function update(BookRequest $request, $id) {
        $book = Book::find($id);
        $book->update($request->all());
        $book->authors()->sync($request->get('authors'));
        $book->illustrators()->sync($request->get('illustrators'));

        return redirect('books');
    }

    /**
     * View Book Method
     * View a book attributes
     */
    public function view($id) {
        $book = Book::find($id);

        return view ('books.view', compact('book'));
    }
}
