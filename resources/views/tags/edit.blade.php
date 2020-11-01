@extends('layouts.app')

@section('content')
<div class="container bg-white py-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2>
                Editar a Tag
                <a href="{{ route('tags.index') }}" class="btn btn-sm btn-primary">
                    Voltar para listagem
                </a>
            </h2>
            @include('layouts.flashMessage')
            <form action="{{ route('tags.update', $tag->id) }}" method="POST">
                @method('PUT')
                @include('tags.form', ['tag' => $tag])
            </form>
        </div>
    </div>
</div>
@endsection