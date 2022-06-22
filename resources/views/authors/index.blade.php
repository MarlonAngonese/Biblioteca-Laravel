@extends('adminlte::page')
@extends('layouts.default')

@section('content')
    <h1>Autores</h1>
    <table class="table table-stripe table-bordered table-hover">
        <thead>
            <th>#</th>
            <th>Nome</th>
            <th>Data de Nascimento</th>
            <th>Ações</th>
        </thead>
        <tbody>
            @foreach($authors as $author)
                <tr>
                    <td>{{ $author->id }}</td>
                    <td>{{ $author->name }}</td>
                    <td>{{ Carbon\Carbon::parse($author->birthday)->format('d/m/Y') }}</td>
                    <td>
                        <a href="{{ route('authors.edit', ['id' => $author->id]) }}" class="btn-sm btn-warning">Editar</a>
                        <a href="#" onclick="return ConfirmaExclusao({{$author->id}})" class="btn-sm btn-danger">Remover</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop

@section('table-delete')
"authors"
@endsection