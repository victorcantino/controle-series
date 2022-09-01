<x-layout title="Series">
    <a href="{{ route('series.create') }}" class="btn btn-dark mb-2">Adicionar</a>
    
    @isset($mensagemSucesso)
        <div class="alert alert-success">
            {{ $mensagemSucesso }}
        </div>
    @endisset
    
    <ul class="list-group">
        @foreach($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('seasons.index', $serie->id) }}">
                    {{$serie->nome}}
                </a>
                <span class="d-flex">
                    <form action="{{ route('series.edit', $serie->id) }}" method=get>
                        @csrf
                        <input type="submit" class="btn btn-primary btn-sm" value="&#9998;" title="Alterar">
                    </form>
                    <form action="{{ route('series.destroy', $serie->id) }}" method="post" class="ms-2">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger btn-sm" value="&#x2421;" title="Apagar">
                    </form>
                </span>
            </li>
        @endforeach
    </ul>
</x-layout>
