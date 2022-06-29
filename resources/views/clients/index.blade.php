@extends('layouts.default')

@section('content')
    <div class="container">
        <h1>Clientes</h1>

        {!! Form::open(['name' => 'form_name', 'route' => 'clients']) !!}
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
                        <th>Sobrenome</th>
                        <th>E-mail</th>
                        <th>Usuário</th>
                        <th>Data de Nascimento</th>
                        <th>Ações</th>
            </thead>
            <tbody>
                @foreach($clients as $client)
                    <tr>
                        <td>{{ $client->id }}</td>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->lastname }}</td>
                        <td>{{ $client->email }}</td>
                        <td>{{ $client->username }}</td>
                        <td>{{ Carbon\Carbon::parse($client->birthday)->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('clients.edit', ['id' => $client->id]) }}" class="btn btn-sm btn-warning">Editar</a>
                            <button type="button" onclick="return ConfirmDelete({{$client->id}})" class="btn btn-sm btn-danger">Remover</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $clients->links("pagination::bootstrap-4") }}

        <a href="{{ route('clients.create', []) }}" class="btn-sm btn-info">Novo Cliente</a>
    </div>
@stop

@section('table-delete')
"clients"
@endsection