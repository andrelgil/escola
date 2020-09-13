@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @if (Route::currentRouteName() == 'materias.editar')
                        Alteração de Matérias
                    @else
                        Cadastro de Matérias
                    @endif
                    <a href="{{ route('materias.index') }}" class="btn btn-default float-right">Voltar</a>
                </div>

                <div class="card-body">
                <form action="@if (Route::currentRouteName() == 'materias.editar') {{ route('materias.editar', ['material' => $material->id]) }} @else {{ route('materias.novo') }} @endif" method="post">
                    @csrf

                    @if (Route::currentRouteName() == 'materias.editar')
                        @method('put')
                    @endif
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" class="form-control" name="name" value="@if (Route::currentRouteName() == 'materias.editar'){{ $material->name }}@endif" placeholder="Digite a Matéria">
                    </div>
                    <button type="submit" class="btn btn-primary">@if (Route::currentRouteName() == 'materias.editar') Alterar @else Cadastrar @endif</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
