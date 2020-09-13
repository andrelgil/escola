@extends('layouts.app')

<style>
     .div-geral{
         display: flex;
     }
     .materias{
        display: flex;
        height: 600;
        border: 1px solid #000;
        padding: 5px;
        border-radius: 5px;
        background-color: #eee;
        margin: 5px;
      }

     .bimestres{
        border: 1px solid #000;
        padding: 5px;
        border-radius: 5px;
        background-color: #eee;
        margin: 5px;
        display: flex;
     }

</style>

@section('content')
<div class="container div-geral">
    <div class="col-md-4 materias">
        <table class="table">
        <thead>
           <tr>
           <th scope="col">Matérias</th>
           </tr>
        </thead>
        </table>
    </div>
    <div class="col-md-8 bimestres">
        <table class="table">
            <thead>
                <tr>
                   <th scope="col">Bimestres</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td>
                    <button type="button" class="btn btn-light"> 1º Bimestre </button>
                    <button type="button" class="btn btn-light"> 2º Bimestre </button>
                    <button type="button" class="btn btn-light"> 3º Bimestre </button>
                    <button type="button" class="btn btn-light"> 4º Bimestre </button>
                </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

    <!--
        <table class="table">
            <thead>
            <tr>
            <th scope="col">Matérias</th>
            <tr>
            <th scope="col">Bimestres</th>
            </tr>
            </thead>
        </table>

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">{{ __('Conteúdo') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Você está Logado!') }}
                </div>

            </div>
        </div>
    </div>
    -->
</div>



@endsection
