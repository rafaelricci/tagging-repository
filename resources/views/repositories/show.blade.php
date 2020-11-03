@extends('layouts.app')
@section('pageTitle', 'Detalhes do repositório')
@section('content')
<div class="container bg-white py-4">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-4">
            <a href="{{ route('repositories.index') }}" class="btn btn-sm btn-secondary">
                Voltar para listagem de repositórios
            </a>
            <div class="mt-3">
                @include('layouts.flashMessage')
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>{{ $repository['full_name'] }}</h2>
            <table class="table">
                <tbody>
                    <tr>
                        <td><strong>Descrição:</strong></td>
                        <td>{{ $repository['description'] }}</td>
                    </tr>
                    <tr>
                        <td><strong>URL:</strong></td>
                        <td>
                           <a href="{{ $repository['html_url'] }}">{{ $repository['html_url'] }}</a>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Linguagem:</strong></td>
                        <td>{{ $repository['language'] }}</td>
                    </tr>
                </tbody>
            </table>
            <div class="card">
                <div class="card-header">
                    <strong>Informações do proprietário</strong>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="{{ $repository['owner']['avatar_url'] }}" class="img-thumbnail">
                        </div>

                        <div class="col-md-9">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <strong>Login: </strong> {{ $repository['owner']['login'] }}
                                </li>
                                <li class="list-group-item">
                                    <strong>Perfil: </strong> <a href="{{ $repository['owner']['html_url'] }}">{{ $repository['owner']['html_url'] }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <h3>Adicionar Tag</h3>
            <form class="form-inline" action="{{ route('repositories.store') }}" method="POST">
                @csrf
                <input type="hidden" value="{{ $repository['id'] }}" name="repository_id" />
                <input type="hidden" value="{{ Auth::user()->id }}" name="user_id" />
                <div class="form-group mx-sm-3 mb-2">
                    <select class="form-control" name="tag_id" id="choices-multiple-remote-fetch" multiple
                    ></select>
                </div>
                <button type="submit" class="btn btn-success mb-2">Salvar</button>
            </form>

            <h3>Tags adicionadas</h3>
            @foreach($tags as $tag)
                <span class="badge badge-secondary p-2">
                    {{ $tag->title }}
                    <form
                        style="display: inline;"
                        action="{{ route('repositories.destroy', [
                            'repository_id' => $repository['id'],
                            'tag_id' => $tag->id,
                            'user_id' => Auth::user()->id
                        ]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Você tem certeza disso? Essa tag sera desassociada deste repositório')" class="text-danger bg-white rounded-circle border-0 p-1">X</button>
                    </form>
                </span>
                
            @endforeach
        </div>
    </div>
</div>
@endsection