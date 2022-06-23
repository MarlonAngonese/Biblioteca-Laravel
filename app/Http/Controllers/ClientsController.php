<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index(){
       $name = "jony";
       return view('clients', ['name' => $name]);
    }
}
