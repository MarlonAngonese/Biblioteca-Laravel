<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Illustrator;
use App\Http\Requests\IllustratorRequest;


class IllustratorsController extends Controller
{
    /**
     * Index Method
     */
    public function index(Request $filter) {
        $filtering = $filter->get('desc_filter');

        if ($filtering == null)
            $illustrators = Illustrator::orderBy('name')->paginate(5);
        else
            $illustrators = Illustrator::where('name', 'ilike', '%'.$filtering.'%')
                                ->orderBy("name")
                                ->paginate(5)
                                ->setpath('illustrators?name=' . $filtering);

        return view('illustrators.index', ['illustrators' => $illustrators]);
    }
    /** 
     * Create Illustrator Method
     */
    public function create() {
        return view('illustrators.create');
    }

    /**
     * Store Illustrator Method
     * Stores a new client into the database
     */
    public function store(IllustratorRequest $request) {
        Illustrator::create($request->all());

        return redirect('illustrators');
    }

     /**
     * Delete Illustrator Method
     */
    public function delete($id) {
        Illustrator::find($id)->delete();

        return redirect('illustrators');
    }

     /**
     * Edit Illustrator Method
     */
    public function edit($id) {
        $illustrator = Illustrator::find($id);

        return view('illustrators.edit', compact('illustrator'));
    }

     /**
     * Update Illustrator Method
     * Updates an Illustrator attributes
     */
    public function update(IllustratorRequest $request, $id) {
        Illustrator::find($id)->update($request->all());

        return redirect('illustrators');
    }

}
