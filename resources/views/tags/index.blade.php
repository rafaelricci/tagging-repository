@extends('layouts.app')
@section('pageTitle', 'Tags')
@section('content')
<div class="container bg-white py-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2>
                Listagem de Tags 
                <a href="{{ route('tags.create') }}" class="btn btn-sm btn-primary">
                    Adicionar nova Tag
                </a>
            </h2>
            @include('layouts.flashMessage')
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Título</th>
                        <th scope="col" colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tags as $tag)
                    <tr>
                        <th scope="row">{{ $tag->id }}</th>
                        <td>{{ $tag->title }}</td>
                        <td>
                            <a
                                href="{{ route('tags.edit', ['tag' => $tag->id]) }}"
                                class="btn btn-sm btn-primary">
                                Editar
                            </a>
                        </td>
                        <td>
                            <form
                                style="display: inline;"
                                action="{{ route('tags.destroy', ['tag' => $tag->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Você tem certeza disso? Essa tag sera desassociada dos repositórios a qual foi registrada')" class="btn btn-sm btn-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-md-12">
            {{ $tags->links() }}
        </div>

    </div>
</div>
@endsection