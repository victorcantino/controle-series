<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function index() 
    {
        // $series = Serie::all();
        $series = Serie::query()->orderBy('nome')->get();
        return view('series.index')->with('series', $series);
        // return view('listar-series', compact('series'));
    }

    public function create() {
        return view('series.create');
    }

    public function store(Request $request)
    {
        $serie = new Serie();
        $serie->nome = $request->input('nome');
        $serie->save();
        return redirect('/series');
    }
}
