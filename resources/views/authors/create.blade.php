@extends('adminlte::page')

@section('content')
    <h3>Novo Autor</h3>

    {!! Form::open(['url' => 'authors/store']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Nome:') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('birthday', 'Data de Nascimento:') !!}
            {!! Form::date('birthday', null, ['class' => 'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Criar autor', ['class' => 'btn btn-primary']) !!}
            {!! Form::reset('Limpar', ['class' => 'btn btn-default']) !!}
        </div>
    {!! Form::close() !!}
@stop