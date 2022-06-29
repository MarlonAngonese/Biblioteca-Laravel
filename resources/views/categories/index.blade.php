@extends('layouts.default')

@section('content')
    <div class="container">
        <h1>Categorias</h1>

        {!! Form::open(['name' => 'form_name', 'route' => 'categories']) !!}
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
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            @foreach ($category->books as $book)
                                <li>{{ $book->name }}</li>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('categories.edit', ['id' => $category->id]) }}" class="btn btn-sm btn-warning">Editar</a>
                            <button type="button" onclick="return ConfirmDelete({{$category->id}})" class="btn btn-sm btn-danger">Remover</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $categories->links("pagination::bootstrap-4") }}

        <a href="{{ route('categories.create', []) }}" class="btn-sm btn-info">Nova Categoria</a>
    </div>
@stop

@section('table-delete')
"categories"
@endsection