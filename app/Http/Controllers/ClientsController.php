<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientsController extends Controller
{
    /**
     * Index Method
     */
    public function index(Request $filtro) {
        $filtragem = $filtro->get('desc_filtro');

        if ($filtragem == null)
            $clients = Client::orderBy('name')->paginate(5);
        else
            $clients = Client::where('name', 'ilike', '%'.$filtragem.'%')
                                ->orderBy("name")
                                ->paginate(5)
                                ->setpath('clients?name=' . $filtragem);

        return view('clients.index', ['clients' => $clients]);
    }
}
