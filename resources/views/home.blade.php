@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">Bem vindo {{ Auth::user()->name }}!</div>

        <div class="card-body">
            Está app permitira você criar Tags e associar aos repositórios buscados no GitHub!
        </div>
    </div>
</div>

<div class="col-md-12 mt-3" id="chartDiv">
</div>
@endsection