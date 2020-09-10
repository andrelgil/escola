@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


            <div class="card">
                <div class="card-header">
                    @if (Route::currentRouteName() == 'series.editar')
                        Alteração de Series
                    @else
                        Cadastro de Series
                    @endif
                    <a href="{{ route('series.index') }}" class="btn btn-default float-right">Voltar</a>
                </div>

                <div class="card-body">
                <form action="@if (Route::currentRouteName() == 'series.editar') {{ route('series.editar', ['classRoom' => $room->id]) }} @else {{ route('series.novo') }} @endif" method="post">
                    @csrf

                    @if (Route::currentRouteName() == 'series.editar')
                        @method('put')
                    @endif
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" class="form-control" name="name" value="@if (Route::currentRouteName() == 'series.editar') {{ $room->name }} @endif" placeholder="Digite a Série">
                    </div>
                    <button type="submit" class="btn btn-primary">@if (Route::currentRouteName() == 'series.editar') Alterar @else Cadastrar @endif</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
