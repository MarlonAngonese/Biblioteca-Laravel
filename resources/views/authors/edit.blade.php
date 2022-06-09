@extends('adminlte::page')

@section('content')
    <h3>Editando Autor: {{ $author->name }}</h3>

    {!! Form::open(['url' => 'authors/update/$author->id', 'method' => 'put']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Nome:') !!}
            {!! Form::text('name', $author->name, ['class' => 'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('birthday', 'Data de Nascimento:') !!}
            {!! Form::date('birthday', $author->birthday, ['class' => 'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Criar autor', ['class' => 'btn btn-primary']) !!}
            {!! Form::reset('Limpar', ['class' => 'btn btn-default']) !!}
        </div>
    {!! Form::close() !!}
@stop