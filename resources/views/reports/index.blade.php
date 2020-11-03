@extends('layouts.app')

@section('content')
<div class="container bg-white py-4">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-4">
            @include('layouts.flashMessage')
            <form action="{{ route('reports.repositories') }}" method="GET" target="_blank">
                <div class="form-group">
                    <label for="tag_id">Selecione a Taga para filtrar os repositórios</label>
                    <select name="tag_id" id="tag_id" class="form-control">
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Emitir</button>
            </form>
        </div>
    </div>
</div>
@endsection