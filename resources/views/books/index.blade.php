@extends('layouts.default')

@section('content')
    <div class="container">
        <h1>Livros</h1>

        {!! Form::open(['name' => 'form_name', 'route' => 'books']) !!}
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
                <th>Categoria</th>
                <th>Edição</th>
                <th>Editora</th>
                <th>Autores</th>
                <th>Ilustradores</th>
                <th>Ações</th>
            </thead>
            <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->name }}</td>
                        <td>{{ $book->category->name }}</td>
                        <td>{{ $book->edition }}</td>
                        <td>{{ $book->publisher->name }}</td>
                        <td>
                            @foreach ($book->authors as $author)
                                <li>{{ $author->name }}</li>
                            @endforeach
                        </td>
                        <td>
                            @foreach ($book->illustrators as $illustrator)
                                <li>{{ $illustrator->name }}</li>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('books.edit', ['id' => $book->id]) }}" class="btn btn-sm btn-warning">Editar</a>
                            <button type="button" onclick="return ConfirmDelete({{$book->id}})" class="btn btn-sm btn-danger">Remover</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $books->links("pagination::bootstrap-4") }}

        <a href="{{ route('books.create', []) }}" class="btn-sm btn-info">Novo Livro</a>
    </div>
@stop

@section('table-delete')
"books"
@endsection