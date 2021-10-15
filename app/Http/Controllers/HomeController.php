<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $result = DB::table('pokemons')->orderBy('id', 'asc')->get();
        return view('Home', ['posts' => $result]);
    }
}
