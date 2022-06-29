@extends('layouts.default')

@section('content')
    <div class="container">
        <h1>Editoras</h1>

        {!! Form::open(['name' => 'form_name', 'route' => 'publishers']) !!}
            <div class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="desc_filter" class="form-control" style="width: 80% !important" placeholder="Pesquisa...">
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
                <th>Livros</th>
                <th>Ações</th>
            </thead>
            <tbody>
                @foreach($publishers as $publisher)
                    <tr>
                        <td>{{ $publisher->id }}</td>
                        <td>{{ $publisher->name }}</td>
                        <td>
                            @foreach ($publisher->books as $book)
                                <li>{{ $book->name }}</li>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('publishers.edit', ['id' => $publisher->id]) }}" class="btn btn-sm btn-warning">Editar</a>
                            <button type="button" onclick="return ConfirmDelete({{$publisher->id}})" class="btn btn-sm btn-danger">Remover</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $publishers->links("pagination::bootstrap-4") }}

        <a href="{{ route('publishers.create', []) }}" class="btn-sm btn-info">Nova Editora</a>
    </div>
@stop

@section('table-delete')
"publishers"
@endsection