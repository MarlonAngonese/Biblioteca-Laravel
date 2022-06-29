@extends('adminlte::page')

@section('content')
    <div class="container w-75">
        <h3>Editando Categoria: {{ $category->name }}</h3>

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['url' => 'categories/update/' . $category->id, 'method' => 'put']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Nome:') !!}
                {!! Form::text('name', $category->name, ['class' => 'form-control', 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Editar Categoria', ['class' => 'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
    </div>
@stop