@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @if (Route::currentRouteName() == 'matters.edit')
                        Alteração de Matérias
                    @else
                        Cadastro de Matérias
                    @endif
                    <a href="{{ route('matters.index') }}" class="btn btn-default float-right">Voltar</a>
                </div>

                <div class="card-body">
                <form action="@if (Route::currentRouteName() == 'matters.edit') {{ route('matters.update', ['matter' => $matter->id]) }} @else {{ route('matters.store') }} @endif" method="post">
                    @csrf
                    @if (Route::currentRouteName() == 'matters.edit')
                        @method('PUT')
                    @endif
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="@if (Route::currentRouteName() == 'matters.edit'){{ $matter->name }}@else{{ old('name') }}@endif" placeholder="Digite a Matéria">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">@if (Route::currentRouteName() == 'matters.edit') Alterar @else Cadastrar @endif</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection