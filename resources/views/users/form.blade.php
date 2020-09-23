@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @if (Route::currentRouteName() == 'users.edit')
                        Alteração de Usuários
                    @else
                        Cadastro de Usuários
                    @endif
                    <a href="{{ route('users.index') }}" class="btn btn-default float-right">Voltar</a>
                </div>
                <div class="card-body">
                    <form action="@if (Route::currentRouteName() == 'users.edit') {{ route('users.editar', ['user' => $user->id]) }}@else{{ route('users.create') }}@endif" method="post">
                        @csrf
                        @if (Route::currentRouteName() == 'usuarios.editar')
                            @method('put')
                        @endif
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="@if (Route::currentRouteName() == 'users.edit'){{ $user->name }}@endif" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="@if (isset($user)) {{ $user->email }}@endif" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" @if (Route::currentRouteName() == 'users.create') required @endif autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Senha') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  @if (Route::currentRouteName() == 'users.create') required @endif autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4"></div>
                            <div class="col-md-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="teacher" value="1" @if (isset($user) && $user->teacher == 1) checked @endif>
                                    <label class="form-check-label" for="teacher">Professor</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="teacher" value="0" @if (isset($user) && $user->teacher == 0) checked @endif>
                                    <label class="form-check-label" for="teacher">Aluno</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4"></div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="admin" value="1" @if (isset($user) && $user->admin == 1) checked @endif>
                                    <label class="form-check-label">Administrador</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4"></div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">@if (Route::currentRouteName() == 'users.edit') Alterar @else Cadastrar @endif</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
