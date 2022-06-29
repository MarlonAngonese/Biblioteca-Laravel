@extends('adminlte::page')

@section('content')
    <div class="container w-75">
        <h3>Editando Cliente: {{ $client->name }}</h3>

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['url' => 'clients/update/' . $client->id, 'method' => 'put']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Nome:') !!}
                {!! Form::text('name', $client->name, ['class' => 'form-control', 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('birthday', 'Data de Nascimento:') !!}
                {!! Form::date('birthday', $client->birthday, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('lastname', 'Sobrenome:') !!}
                {!! Form::text('lastname', $client->lastname, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', 'E-mail:') !!}
                {!! Form::text('email', $client->email, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password', 'Senha:') !!}
                {!! Form::input('password','password', $client->password, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('username', 'Usuário:') !!}
                {!! Form::text('username', $client->username, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Editar Cliente', ['class' => 'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
    </div>
@stop