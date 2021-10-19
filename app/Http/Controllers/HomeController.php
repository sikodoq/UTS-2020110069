<?php

namespace App\Http\Controllers;

use App\Models\Pokemons;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function index()
    {
        return view('home', ['pokemons' => Pokemons::all()]);
    }

    public function search(Request $request)
    {
        $search = $request->search_query;
        $pokemons = Pokemons::where('name', 'like', "%" . $search . "%")->orWhere('id', 'like', "%" . $search . "%")->get();
        return view('home', ['pokemons' => $pokemons]);
    }


    public function detail($id)
    {
        $result = Pokemons::where('id', $id)->get();
        $evos = Pokemons::all();
        return view('detail', compact('result', 'evos'));
    }

    public function randomize()
    {
        $pokemons = Pokemons::inRandomOrder()->get();
        return view('home', ['pokemons' => $pokemons]);
    }
}
