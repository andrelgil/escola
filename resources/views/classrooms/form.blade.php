@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                    @if (Route::currentRouteName() == 'classrooms.edit')
                        Alteração de Series
                    @else
                        Cadastro de Series
                    @endif
                    <a href="{{ route('classrooms.index') }}" class="btn btn-default float-right">Voltar</a>
                </div>

                <div class="card-body">
                    <form action="@if (Route::currentRouteName() == 'classrooms.edit'){{ route('classrooms.update', ['classroom' => $room->id]) }}@else{{ route('classrooms.store') }}@endif" method="post">
                        @csrf
                        @if (Route::currentRouteName() == 'classrooms.edit')
                            @method('PUT')
                        @endif
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="@if (Route::currentRouteName() == 'classrooms.edit'){{ $room->name }}@else{{ old('name') }}@endif" placeholder="Digite a Série">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">@if (Route::currentRouteName() == 'classrooms.edit') Alterar @else Cadastrar @endif</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
