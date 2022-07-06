@extends('layouts.default')

@section('content')
    <div class="container">
        <h1>Idiomas</h1>

        {!! Form::open(['name' => 'form_name', 'route' => 'languages']) !!}
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
                <th>Ações</th>
            </thead>
            <tbody>
                @foreach($languages as $language)
                    <tr>
                        <td>{{ $language->id }}</td>
                        <td>{{ $language->name }}</td>
                        <td>
                            <a href="{{ route('languages.edit', ['id' => $language->id]) }}" class="btn btn-sm btn-warning">Editar</a>
                            <button type="button" onclick="return ConfirmDelete({{$language->id}})" class="btn btn-sm btn-danger">Remover</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $languages->links("pagination::bootstrap-4") }}

        <a href="{{ route('languages.create', []) }}" class="btn-sm btn-info">Novo Idioma</a>
    </div>
@stop

@section('table-delete')
"languages"
@endsection