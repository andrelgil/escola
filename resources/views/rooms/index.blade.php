@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                    <h3 class="float-left">Anos</h3>
                    <a href="{{ route('rooms.create') }}" class="btn btn-success float-right">Novo</a>
                </div>

                <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                        <th scope="col" width="70">Id</th>
                        <th scope="col">Nome</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rooms as $room)
                        <tr>
                            <th scope="row">{{ $room->id }}</th>
                            <td>{{ $room->name }}</td>
                            <td align="right" width="85">
                                <form id="form_{{ $room->id }}" action="{{ route('rooms.destroy', ['room' => $room->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="{{ route('rooms.edit', [ 'room' => $room->id ]) }}" class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <button type="button" onclick="confirmDelete('form_{{ $room->id }}')" class="btn btn-outline-danger btn-sm">
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
@section('scripts')
<script>
    const confirmDelete = (form) => {
        Swal.fire({
            title: "Atenção!",
            text: "Você deseja realmente excluir esse Ano?",
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
