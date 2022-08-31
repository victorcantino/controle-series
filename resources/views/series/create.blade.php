<x-layout title="Nova série">
    <form action="{{ route('series.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-">
        </div>

        <input type="submit" value="Adicionar" class="btn btn-primary">
    </form>
</x-layout>