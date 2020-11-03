@extends('layouts.app')

@section('content')
<div class="container bg-white py-4">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-4">
            @include('layouts.flashMessage')
            <form action="{{ route('repositories.search') }}" method="GET">
                <div class="form-group">
                    <label for="term">Termo</label>
                    <input type="text" class="form-control search-input" id="term" name="term" required>
                </div>
                <div class="form-group">
                    <label for="language">Linguagem de programação</label>
                    <input type="text" class="form-control search-input" id="language" name="language">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="order">Ordem de chegada</label>
                        <select id="order" class="form-control search-input" name="order">
                            <option value="">Selecione um opção (opcional)</option>
                            <option value="desc">Mais antigos</option>
                            <option value="asc">Mais recentes</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check">
                            <input class="form-check-input search-input" type="checkbox" id="stars" name="stars">
                            <label class="form-check-label" for="stars">
                            Ordernar por estrelas
                            </label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </form>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2>
                Listagem de Repositórios
            </h2>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Link</th>
                        <th scope="col" colspan="1"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($repositories as $repository)
                    <tr>
                        <th scope="row">{{ $repository['id'] }}</th>
                        <td>{{ $repository['full_name'] }}</td>
                        <td>
                            <a href="{{ $repository['html_url'] }}">
                                {{ $repository['html_url'] }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('repositories.show', ['id' => $repository['id']]) }}"
                                class="btn btn-sm btn-primary">
                                Detalhes
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-md-12">
            {{ $repositories->links() }}
        </div>

    </div>
</div>
@endsection