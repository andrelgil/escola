@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                    @if (Route::currentRouteName() == 'series.edit')
                        Alteração de Series
                    @else
                        Cadastro de Series
                    @endif
                    <a href="{{ route('series.index') }}" class="btn btn-default float-right">Voltar</a>
                </div>

                <div class="card-body">
                    <form action="@if (Route::currentRouteName() == 'series.edit'){{ route('series.update', ['series' => $room->id]) }}@else{{ route('series.store') }}@endif" method="post">
                        @csrf
                        @if (Route::currentRouteName() == 'series.edit')
                            @method('PUT')
                        @endif
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="@if (Route::currentRouteName() == 'series.edit') {{ $room->name }} @endif" required placeholder="Digite a Série">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">@if (Route::currentRouteName() == 'series.edit') Alterar @else Cadastrar @endif</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
