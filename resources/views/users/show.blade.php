@extends('layouts.app')
@section('pageTitle', 'Detalhes do usuário')
@section('content')
<div class="container bg-white py-4">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-4">
            <a href="{{ route('home') }}" class="btn btn-sm btn-secondary">
                Voltar para o inicio
            </a>
            @if(Auth::user()->id == $user->id)
                <a href="{{ route('users.edit', ['user' => Auth::user()->id]) }}" class="btn btn-sm btn-primary">
                    Editar meu perfil
                </a>
                <form style="display: inline-block;" action="{{ route('users.destroy', ['user' => Auth::user()->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="mr-3 btn btn-sm btn-danger" onclick="return confirm('Você tem certeza disso? Você perderá todas os seus dados')">Excluir minha conta</button>
                </form>
            @endif
            <div class="mt-3">
                @include('layouts.flashMessage')
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <strong>Informações do usuário</strong>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <strong>Nome: </strong> 
                                    {{ $user->name }}
                                </li>
                                <li class="list-group-item">
                                    <strong>Email: </strong> 
                                    {{ $user->email }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection