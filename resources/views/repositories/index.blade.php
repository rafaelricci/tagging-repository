@extends('layouts.app')

@section('content')
<div class="container bg-white py-4">
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
                        <td>{{ $repository['html_url'] }}</td>
                        <td>
                            <a
                                href="{{ route('repositories.show', ['id' => $repository['id']]) }}"
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