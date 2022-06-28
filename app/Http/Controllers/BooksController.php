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
    public function index(Request $filtro) {
        $filtragem = $filtro->get('desc_filtro');

        if ($filtragem == null)
            $books = Book::orderBy('name')->paginate(5);
        else
            $books = Book::where('name', 'ilike', '%'.$filtragem.'%')
                                ->orderBy("name")
                                ->paginate(5)
                                ->setpath('books?name=' . $filtragem);

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
        $book = Book::create([
            'name' => $request->get('name'),
            'price' => $request->get('price'),
            'edition' => $request->get('edition'),
            'image_url' => $request->get('image_url'),
            'category_id' => $request->get('category_id'),
            'publisher_id' => $request->get('publisher_id'),
        ]);

        $authors = $request->authors;

        foreach ($authors as $i => $author) {
            AuthorBook::create([
                'book_id' => $book->id,
                'author_id' => $authors[$i]
            ]);
        }

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

    // /**
    //  * Update Book Method
    //  * Updates an book attributes
    //  */
    // public function update(BookRequest $request, $id) {
    //     $book = Book::find($id)->update([
    //         'name' => $request->get('name'),
    //         'price' => $request->get('price'),
    //         'edition' => $request->get('edition'),
    //         'image_url' => $request->get('image_url'),
    //         'category_id' => $request->get('category_id'),
    //         'publisher_id' => $request->get('publisher_id'),
    //     ]);

    //     $authors = $request->authors;

    //     foreach ($authors as $i => $author) {
    //         AuthorBook::findOrNew([
    //             'book_id' => $book->id,
    //             'author_id' => $authors[$i]
    //         ]);
    //     }

    //     return redirect('books');
    // }

}
