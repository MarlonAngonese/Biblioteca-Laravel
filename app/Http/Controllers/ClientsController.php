<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Http\Requests\ClientRequest;

class ClientsController extends Controller
{
    /**
     * Index Method
     */
    public function index(Request $filter) {
        $filtering = $filter->get('desc_filter');

        if ($filtering == null)
            $clients = Client::orderBy('name')->paginate(5);
        else
            $clients = Client::where('name', 'ilike', '%'.$filtering.'%')
                                ->orderBy("name")
                                ->paginate(5)
                                ->setpath('clients?name=' . $filtering);

        return view('clients.index', ['clients' => $clients]);
    }
    /** 
     * Create Client Method
     */
    public function create() {
        return view('clients.create');
    }

    /**
     * Store Client Method
     * Stores a new client into the database
     */
    public function store(ClientRequest $request) {
        Client::create($request->all());

        return redirect('clients');
    }

     /**
     * Delete Client Method
     */
    public function delete($id) {
        Client::find($id)->delete();

        return redirect('clients');
    }

     /**
     * Edit Client Method
     */
    public function edit($id) {
        $client = Client::find($id);

        return view('clients.edit', compact('client'));
    }

     /**
     * Update Client Method
     * Updates an client attributes
     */
    public function update(ClientRequest $request, $id) {
        Client::find($id)->update($request->all());

        return redirect('clients');
    }

}

