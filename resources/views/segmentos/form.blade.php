@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


            <div class="card">
                <div class="card-header">
                    @if (Route::currentRouteName() == 'segmentos.editar')
                        Alteração de Segmentos
                    @else
                        Cadastro de Segmentos
                    @endif
                    <a href="{{ route('segmentos.index') }}" class="btn btn-default float-right">Voltar</a>
                </div>

                <div class="card-body">
                <form action="@if (Route::currentRouteName() == 'segmentos.editar') {{ route('segmentos.editar', ['category' => $category->id]) }} @else {{ route('segmentos.novo') }} @endif" method="post">
                    @csrf

                    @if (Route::currentRouteName() == 'segmentos.editar')
                        @method('put')
                    @endif
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" class="form-control" name="name" value="@if (Route::currentRouteName() == 'segmentos.editar') {{ $category->name }} @endif" placeholder="Digite o Segmento">
                    </div>
                    <button type="submit" class="btn btn-primary">@if (Route::currentRouteName() == 'segmentos.editar') Alterar @else Cadastrar @endif</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
