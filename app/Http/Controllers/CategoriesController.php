<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Index Method
     */
    public function index(Request $filter) {
        $filtering = $filter->get('desc_filter');

        if ($filtering == null)
            $categories = Category::orderBy('name')->paginate(5);
        else
            $categories = Category::where('name', 'ilike', '%'.$filtering.'%')
                                ->orderBy("name")
                                ->paginate(5)
                                ->setpath('cateogries?name=' . $filtering);

        return view('categories.index', ['categories' => $categories]);
    }

    /** 
     * Create Category Method
     */
    public function create() {
        return view('categories.create');
    }

    /**
     * Store Category Method
     * Stores a new Category into the database
     */
    public function store(CategoryRequest $request) {
        Category::create($request->all());

        return redirect('categories');
    }

    /**
     * Delete Category Method
     */
    public function delete($id) {
        Category::find($id)->delete();

        return redirect('categories');
    }

    /**
     * Edit Category Method
     */
    public function edit($id) {
        $category = Category::find($id);

        return view('categories.edit', compact('category'));
    }

    /**
     * Update Category Method
     * Updates a Category attributes
     */
    public function update(CategoryRequest $request, $id) {
        Category::find($id)->update($request->all());

        return redirect('categories');
    }
}
