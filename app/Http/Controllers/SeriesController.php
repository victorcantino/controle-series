<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request) 
    {
        //dd($request);

        $series = [
            'série 1',
            'série 2',
            'série 3',
        ];

        // return view('listar-series', compact('series'));
        return view('series.index')->with('series', $series);
    }

    public function create() {
        return view('series.create');
    }
}
