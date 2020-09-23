@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @if (Route::currentRouteName() == 'segments.edit')
                        Alteração de Segmentos
                    @else
                        Cadastro de Segmentos
                    @endif
                    <a href="{{ route('segments.index') }}" class="btn btn-default float-right">Voltar</a>
                </div>
                <div class="card-body">
                <form action="@if (Route::currentRouteName() == 'segments.edit') {{ route('segments.update', ['segment' => $segment->id]) }} @else {{ route('segments.store') }} @endif" method="post">
                @csrf
                    @if (Route::currentRouteName() == 'segments.edit')
                        @method('PUT')
                    @endif
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="@if (Route::currentRouteName() == 'segments.edit'){{ $segment->name }}@else{{ old('name') }}@endif" placeholder="Digite o Segmento">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">@if (Route::currentRouteName() == 'segments.edit') Alterar @else Cadastrar @endif</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
