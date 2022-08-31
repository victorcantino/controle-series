<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request) 
    {
        // $series = Serie::all();
        // return view('listar-series', compact('series'));
        $series = Serie::query()->orderBy('nome')->get();
        $mensagemSucesso = $request->session()->get('mensagem.sucesso');
        return view('series.index')
            ->with('series', $series)
            ->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create() {
        return view('series.create');
    }

    public function store(Request $request)
    {
        // $serie = new Serie();
        // $serie->nome = $request->input('nome');
        // $serie->save();
        // return redirect('/series');
        // return redirect(route('series.index'));
        // return redirect()->route('series.index');
        $serie = Serie::create($request->all());
        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '$serie->nome' adicionada com sucesso");
    }

    /**
     * 
     * @param $series
     *   Quando passamos um Model, o laravel faz o select com a informação passada no request
     *   to_route() já faz o parse da $request->session()->flash
     *   então adicionamos a mensagem com with
     */
    public function destroy(Serie $series)
    {
        $series->delete();
        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '$series->nome' removida com sucesso");
    }

    public function edit(Serie $series)
    {
        return view('series.edit')
            ->with(['serie' => $series]);
    }

    public function update(Serie $series, Request $request)
    {
        $series->fill($request->all());
        $series->save();

        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '$series->nome' alterada com sucesso.");
    }
}
