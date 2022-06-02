<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{
    public function index() {
        $authors = Author::All();
        return view('authors.index', ['authors' => $authors]);
    }

    public function create() {
        return view('authors.create');
    }
}
