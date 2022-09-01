<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesRequest;
use App\Models\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request) 
    {
        $series = Serie::with(['seasons'])->get();
        $mensagemSucesso = session('mensagem.sucesso');
        return view('series.index')
            ->with('series', $series)
            ->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create() {
        return view('series.create');
    }

    public function store(SeriesRequest $request)
    {
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
        // dd($series->seasons); // pelo atributo eu pego a coleção
        // dd($series->seasonsO); // pelo método eu pego o relacionamento e posso fazer queries
        return view('series.edit')
            ->with(['serie' => $series]);
    }

    public function update(Serie $series, SeriesRequest $request)
    {
        $series->fill($request->all());
        $series->save();

        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '$series->nome' alterada com sucesso.");
    }
}
