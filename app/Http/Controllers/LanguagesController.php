<?php

namespace App\Http\Controllers;

use App\Http\Requests\LanguageRequest;
use App\Models\Language;
use Illuminate\Http\Request;

class LanguagesController extends Controller
{
    /**
     * Index Method
     */
    public function index(Request $filter) {
        $filtering = $filter->get('desc_filter');

        if ($filtering == null)
            $languages = Language::orderBy('name')->paginate(5);
        else
            $languages = Language::where('name', 'ilike', '%'.$filtering.'%')
                                ->orderBy("name")
                                ->paginate(5)
                                ->setpath('languages?name=' . $filtering);

        return view('languages.index', ['languages' => $languages]);
    }

    /** 
     * Create Language Method
     */
    public function create() {
        return view('languages.create');
    }

    /**
     * Store Language Method
     * Stores a new Language into the database
     */
    public function store(LanguageRequest $request) {
        Language::create($request->all());

        return redirect('languages');
    }

    /**
     * Delete Language Method
     */
    public function delete($id) {
        Language::find($id)->delete();

        return redirect('languages');
    }

    /**
     * Edit Language Method
     */
    public function edit($id) {
        $language = Language::find($id);

        return view('languages.edit', compact('language'));
    }

    /**
     * Update Language Method
     * Updates a Language attributes
     */
    public function update(LanguageRequest $request, $id) {
        Language::find($id)->update($request->all());

        return redirect('languages');
    }
}
