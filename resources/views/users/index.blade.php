@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="float-left">Usuários</h3>
                    <a href="{{ route('users.create') }}" class="btn btn-success float-right">Novo</a>
                </div>
                <div class="card-body">
                <table class="table table-striped table-bordered">
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
                        @if (auth()->user()->id != $user->id)
                        <tr>
                            <th scope="row" width="70">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td width="70">@if ($user->admin == 1) Sim @else Não @endif</td>
                            <td width="70">@if ($user->teacher == 1) Professor @else Aluno @endif</td>
                            <td align="right" width="85">
                                <form id="form_{{ $user->id }}" action="{{ route('users.destroy', ['user' => $user->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="{{ route('users.edit', [ 'user' => $user->id ]) }}" class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <button type="button" onclick="confirmDelete('form_{{ $user->id }}')" class="btn btn-outline-danger btn-sm">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    const confirmDelete = (form) => {
        Swal.fire({
            title: "Atenção!",
            text: "Você deseja realmente excluir esse Usuário?",
            showCancelButton: true,
            cancelButtonText: 'Não',
            cancelButtonColor: '#3085D6',
            confirmButtonText: 'Sim, Excluir!',
            confirmButtonColor: '#C70000',
            icon: 'warning',
        }).then(result => {
            if (result.isConfirmed) {
                document.querySelector(`#${form}`).submit();
            }
        });
    }
</script>
@endsection
