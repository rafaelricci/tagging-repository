@extends('layouts.app')
@section('pageTitle', 'Editando usuário')
@section('content')
<div class="container bg-white py-4">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-4">
            <a href="{{ route('users.show', ['user' => Auth::user()->id]) }}" class="btn btn-sm btn-secondary">
                Voltar para o meu perfil
            </a>
            <div class="mt-3">
                @include('layouts.flashMessage')
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <strong>Editando do usuário</strong>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name">Nome</label>
                                    <input class="form-control" id="name" name="name" value="{{ $user->name }}" required />
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input class="form-control" id="email" name="email" value="{{ $user->email }}" required />
                                </div>
                                <button style="display: inline;" type="submit"class="btn btn-sm btn-success">
                                    Atualizar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection