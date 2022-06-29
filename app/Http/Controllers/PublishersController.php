<?php

namespace App\Http\Controllers;

use App\Http\Requests\PublisherRequest;
use App\Models\Publisher;
use Illuminate\Http\Request;

class PublishersController extends Controller
{
    /**
     * Index Method
     */
    public function index(Request $filter) {
        $filtering = $filter->get('desc_filter');

        if ($filtering == null)
            $publishers = Publisher::orderBy('name')->paginate(5);
        else
            $publishers = Publisher::where('name', 'ilike', '%'.$filtering.'%')
                                ->orderBy("name")
                                ->paginate(5)
                                ->setpath('publishers?name=' . $filtering);

        return view('publishers.index', ['publishers' => $publishers]);
    }

    /** 
     * Create Publisher Method
     */
    public function create() {
        return view('publishers.create');
    }

    /**
     * Store Publisher Method
     * Stores a new publisher into the database
     */
    public function store(PublisherRequest $request) {
        Publisher::create($request->all());

        return redirect('publishers');
    }

    /**
     * Delete Publisher Method
     */
    public function delete($id) {
        Publisher::find($id)->delete();

        return redirect('publishers');
    }

    /**
     * Edit Publisher Method
     */
    public function edit($id) {
        $publisher = Publisher::find($id);

        return view('publishers.edit', compact('publisher'));
    }

    /**
     * Update Publisher Method
     * Updates a publisher attributes
     */
    public function update(PublisherRequest $request, $id) {
        Publisher::find($id)->update($request->all());

        return redirect('publishers');
    }
}
