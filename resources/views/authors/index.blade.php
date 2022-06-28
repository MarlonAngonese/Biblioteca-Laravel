@extends('layouts.default')

@section('content')
    <div class="container">
        <h1>Autores</h1>

        {!! Form::open(['name' => 'form_name', 'route' => 'authors']) !!}
            <div class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="desc_filtro" class="form-control" style="width: 80% !important" placeholder="Pesquisa...">
                    <span class="input-group-btn">
                        <button type="submit" name="search" id="search-btn" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </div>
        {!! Form::close() !!}

        <br>

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
                            <a href="{{ route('authors.edit', ['id' => $author->id]) }}" class="btn btn-sm btn-warning">Editar</a>
                            <button type="button" onclick="return ConfirmDelete({{$author->id}})" class="btn btn-sm btn-danger">Remover</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $authors->links("pagination::bootstrap-4") }}

        <a href="{{ route('authors.create', []) }}" class="btn-sm btn-info">Novo Autor</a>
    </div>
@stop

@section('table-delete')
"authors"
@endsection