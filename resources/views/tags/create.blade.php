@extends('layouts.app')
@section('pageTitle', 'Criando Tag')
@section('content')
<div class="container bg-white py-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2>
                Adicionar nova Tag 
                <a href="{{ route('tags.index') }}" class="btn btn-sm btn-primary">
                    Voltar para listagem
                </a>
            </h2>
            @include('layouts.flashMessage')
            <form action="{{ route('tags.store') }}" method="POST">
                @include('tags.form', ['tag' => $tag])
            </form>
        </div>
    </div>
</div>
@endsection