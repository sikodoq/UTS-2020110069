<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $pokemons = DB::table('pokemons')->orderBy('id', 'asc')->get();
        return view('home', ['pokemons' => $pokemons]);
    }

    public function search(Request $request)
    {
        $search = $request->search_query;
        $pokemons = DB::table('pokemons')->where('name', 'like', "%" . $search . "%")->orWhere('id', 'like', "%" . $search . "%")->get();
        return view('home', ['pokemons' => $pokemons]);
    }


    public function detail($id)
    {
        $result = DB::table('pokemons')->where('id', $id)->get();
        $alldata = DB::table('pokemons')->get();
        return view('detail', ['id' => $result, 'evos' => $alldata]);
    }
}
