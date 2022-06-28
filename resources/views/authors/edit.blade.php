@extends('adminlte::page')

@section('content')
    <div class="container w-75">
        <h3>Editando Autor: {{ $author->name }}</h3>

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['url' => 'authors/update/' . $author->id, 'method' => 'put']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Nome:') !!}
                {!! Form::text('name', $author->name, ['class' => 'form-control', 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('birthday', 'Data de Nascimento:') !!}
                {!! Form::date('birthday', $author->birthday, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('bio', 'Sobre:') !!}
                {!! Form::textarea('bio', $author->bio, ['class' => 'form-control', 'rows' => 3]) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Criar autor', ['class' => 'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
    </div>
@stop