<x-layout title="Nova série">
    <form action="{{ route('series.store') }}" method="post">
        @csrf
        <div class="row mb-3">
            <div class="col-8">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" 
                    name="nome" 
                    autofocus
                    id="nome" 
                    class="form-control"
                    value="{{ old('nome') }}" >
            </div>
            <div class="col-2">
                <label for="seasonsQty" class="form-label">Nº Temporadas</label>
                <input type="text" 
                    name="seasonsQty" 
                    id="seasonsQty" 
                    class="form-control"
                    value="{{ old('seasonsQty') }}" >
            </div>
            <div class="col-2">
                <label for="episodesPerSeason" class="form-label">Eps / Temporada</label>
                <input type="text" 
                    name="episodesPerSeason" 
                    id="episodesPerSeason" 
                    class="form-control"
                    value="{{ old('episodesPerSeason') }}" >
            </div>
        </div>
        <input type="submit" value="Salvar" class="btn btn-primary">
    </form>
</x-layout>