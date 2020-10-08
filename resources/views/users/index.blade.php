@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <!-- inicio | header do card -->
                <div class="card-header">
                    <h3 class="float-left">Usuários</h3>
                    <a href="{{ route('users.create') }}" class="btn btn-success float-right">Novo</a>
                </div>
                <!-- termino | header do card -->

                <!-- inicio | body do card -->
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="aluno-tab" data-toggle="tab" href="#aluno" role="tab" aria-controls="aluno" aria-selected="true">Alunos</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="professor-tab" data-toggle="tab" href="#professor" role="tab" aria-controls="professor" aria-selected="false">Professores</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="administrador-tab" data-toggle="tab" href="#administrador" role="tab" aria-controls="administrador" aria-selected="false">Administradores</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <!-- inicio | Lista de Alunos -->
                        <div class="tab-pane fade show active" id="aluno" role="tabpanel" aria-labelledby="aluno-tab">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    @if (!$user->teacher)
                                    <tr>
                                        <th scope="row" width="70">{{ $user->id }}</th>
                                        <td>{{ $user->name }}</td>
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
                        <!-- termino | Lista de Alunos -->
                        <!-- inicio | Lista de Professores -->
                        <div class="tab-pane fade" id="professor" role="tabpanel" aria-labelledby="professor-tab">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    @if ($user->teacher)
                                    <tr>
                                        <th scope="row" width="70">{{ $user->id }}</th>
                                        <td>{{ $user->name }}</td>
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
                        <!-- termino | Lista de Professores -->
                        <!-- inicio | Lista de Administradores -->
                        <div class="tab-pane fade" id="administrador" role="tabpanel" aria-labelledby="administrador-tab">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    @if ($user->admin)
                                    <tr>
                                        <th scope="row" width="70">{{ $user->id }}</th>
                                        <td>{{ $user->name }}</td>
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
                        <!-- termino | Lista de Administradores -->
                    </div>





                </div>
                <!-- termino | body do card -->

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
