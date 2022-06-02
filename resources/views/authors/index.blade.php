@extends('adminlte::page')

@section('content')
    <h1>Autores</h1>
    <table class="table table-stripe table-bordered table-hover">
        <thead>
            <th>Nome</th>
            <th>Data de Nascimento</th>
        </thead>
        <tbody>
            @foreach($authors as $author)
                <tr>
                    <td>{{ $author->name }}</td>
                    <td>{{ $author->birthday }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop