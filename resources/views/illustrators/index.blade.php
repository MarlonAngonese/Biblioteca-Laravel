@extends('layouts.default')

@section('content')
    <div class="container">
        <h1>Ilustradores</h1>

        {!! Form::open(['name' => 'form_name', 'route' => 'illustrators']) !!}
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
                <th>Data de Nascimento</th>
                <th>Livros</th>
                <th>Ações</th>
            </thead>
            <tbody>
                @foreach($illustrators as $illustrator)
                    <tr>
                        <td>{{ $illustrator->id }}</td>
                        <td>{{ $illustrator->name }}</td>
                        <td>{{ Carbon\Carbon::parse($illustrator->birthday)->format('d/m/Y') }}</td>
                        <td>
                            @foreach ($illustrator->books as $book)
                                <li>{{ $book->name }}</li>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('illustrators.edit', ['id' => $illustrator->id]) }}" class="btn btn-sm btn-warning">Editar</a>
                            <button type="button" onclick="return ConfirmDelete({{$illustrator->id}})" class="btn btn-sm btn-danger">Remover</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $illustrators->links("pagination::bootstrap-4") }}

        <a href="{{ route('illustrators.create', []) }}" class="btn-sm btn-info">Novo ilustrador</a>
    </div>
@stop

@section('table-delete')
"illustrators"
@endsection