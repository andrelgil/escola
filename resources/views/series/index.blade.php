@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


            <div class="card">
                <div class="card-header">
                    <h3 class="float-left">Séries</h3>
                    <a href="{{ route('series.create') }}" class="btn btn-success float-right">Novo</a>
                </div>

                <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nome</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rooms as $room)
                        <tr>
                            <th scope="row">{{ $room->id }}</th>
                            <td>{{ $room->name }}</td>
                            <td align="right" width="170">
                                <form action="{{ route('series.destroy', ['series' => $room->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="{{ route('series.edit', [ 'series' => $room->id ]) }}" class="btn btn-outline-primary btn-sm">
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
