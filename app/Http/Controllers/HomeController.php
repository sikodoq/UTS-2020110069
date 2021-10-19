<?php

namespace App\Http\Controllers;

use App\Models\Pokemons;
use Illuminate\Http\Request;

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
        $previous = Pokemons::where('id', '<', $id)->orderBy('id', 'desc')->first();
        $next = Pokemons::where('id', '>', $id)->orderBy('id')->first();
        $first = Pokemons::first('id');
        $latest = Pokemons::latest('id')->first();
        return view('detail', compact('result', 'evos', 'previous', 'next', 'first', 'latest'));
    }

    public function randomize()
    {
        $pokemons = Pokemons::inRandomOrder()->get();
        return view('home', ['pokemons' => $pokemons]);
    }

    public function ascid()
    {
        $pokemons = Pokemons::orderBy('id')->get();
        return view('home', ['pokemons' => $pokemons]);
    }
    public function descid()
    {
        $pokemons = Pokemons::orderByDesc('id')->get();
        return view('home', ['pokemons' => $pokemons]);
    }
    public function ascname()
    {
        $pokemons = Pokemons::orderBy('name')->get();
        return view('home', ['pokemons' => $pokemons]);
    }
    public function descname()
    {
        $pokemons = Pokemons::orderByDesc('name')->get();
        return view('home', ['pokemons' => $pokemons]);
    }
}
