@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="float-left">Alterar Senha</h3>
                    <a href="{{ route('usuarios.novo') }}" class="btn btn-success float-right">Novo</a>
                </div>

                <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Administrador</th>
                        <th scope="col">Professor/Aluno</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>@if ($user->admin == 1) Sim @else Não @endif</td>
                            <td>@if ($user->teacher == 1) Professor @else Aluno @endif</td>
                            <td align="right" width="170">
                                <form action="{{ route('usuarios.destroy', ['user' => $user->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="{{ route('usuarios.editar', [ 'user' => $user->id ]) }}" class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <button type="submit" class="btn btn-outline-danger btn-sm">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
