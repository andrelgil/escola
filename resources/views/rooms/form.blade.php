@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                    @if (Route::currentRouteName() == 'rooms.edit')
                        Alteração de Anos
                    @else
                        Cadastro de Anos
                    @endif
                    <a href="{{ route('rooms.index') }}" class="btn btn-default float-right">Voltar</a>
                </div>

                <div class="card-body">
                    <form action="@if (Route::currentRouteName() == 'rooms.edit'){{ route('rooms.update', ['room' => $room->id]) }}@else{{ route('rooms.store') }}@endif" method="post">
                        @csrf
                        @if (Route::currentRouteName() == 'rooms.edit')
                            @method('PUT')
                        @endif
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="@if (Route::currentRouteName() == 'rooms.edit'){{ $room->name }}@else{{ old('name') }}@endif" placeholder="Digite o Ano">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">@if (Route::currentRouteName() == 'rooms.edit') Alterar @else Cadastrar @endif</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
