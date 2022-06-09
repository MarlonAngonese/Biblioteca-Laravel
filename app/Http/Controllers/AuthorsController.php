<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{
    /**
     * Index Method
     */
    public function index() {
        $authors = Author::All();
        return view('authors.index', ['authors' => $authors]);
    }

    /** 
     * Create Author Method
     */
    public function create() {
        return view('authors.create');
    }

    /**
     * Store Author Method
     * Stores a new author into the database
     */
    public function store(Request $request) {
        $new_author = $request->all();
        Author::create($new_author);

        return redirect('authors');
    }

    /**
     * Delete Author Method
     */
    public function delete($id) {
        Author::find($id)->delete();
        return redirect('authors');
    }
}