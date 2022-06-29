@extends('adminlte::page')

@section('content')
    <div class="container w-75">
        <h3>Editando Ilustrador: {{ $illustrator->name }}</h3>

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['url' => 'illustrators/update/' . $illustrator->id, 'method' => 'put']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Nome:') !!}
                {!! Form::text('name', $illustrator->name, ['class' => 'form-control', 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('birthday', 'Data de Nascimento:') !!}
                {!! Form::date('birthday', $illustrator->birthday, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('bio', 'Biografia:') !!}
                {!! Form::textarea('bio', $illustrator->bio, ['class' => 'form-control', 'rows' => 3]) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Editar Ilustrador', ['class' => 'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
    </div>
@stop