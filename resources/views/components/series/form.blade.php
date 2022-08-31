    <form action="{{ $action }}" method="post">
        @csrf
        @if($update)
            @method('PUT')
        @endif
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" 
                name="nome" 
                id="nome" 
                class="form-controle"
                @isset($nome) value="{{ $nome }}" @endisset >
        </div>
        <input type="submit" value="Salvar" class="btn btn-primary">
    </form>