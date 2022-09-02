<x-layout title="Episódios" :mensagem-sucesso="$mensagemSucesso">
    <form method="post">
        @csrf
        <ul class="list-group">
            @foreach($episodes as $episode)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Episódio {{$episode->number}}
                    <input type="checkbox" 
                        name="episodes[]" 
                        value="{{$episode->id}}"
                        @if ($episode->watched)
                            checked="checked"
                        @endif >
                </li>
            @endforeach
        </ul>
        <input type="submit" class="btn btn-primary mb-2 mt-2" value="Salvar">
    </form>
</x-layout>
