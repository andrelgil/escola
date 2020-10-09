@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">
                    @if (Route::currentRouteName() == 'matters.edit')
                        Alteração de Disciplinas
                    @else
                        Cadastro de Disciplinas
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
                        <input
                            type="text"
                            class="form-control @error('name') is-invalid @enderror"
                            name="name"
                            @if(isset($matter))
                                value="{{ $matter->name }}"
                            @else
                                value="{{ old('name') }}"
                            @endif
                            placeholder="Digite a Disciplina">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    Anos Relacionados à Disciplina
                    <ul class="list">
                        @foreach($rooms as $room)
                        <li class="list-item">
                            <input class="form-check-input" type="checkbox" name="rooms[]" value="{{ $room->id }}" @if(isset($matter) && $matter->hasRoom($room)) checked @endif style="position: relative; margin: 0 10px 0 0;">{{ $room->name }}
                        </li>
                        @endforeach
                    </ul>

                    <br>
                    <button type="submit" class="btn btn-primary">@if (Route::currentRouteName() == 'matters.edit') Alterar @else Cadastrar @endif</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
