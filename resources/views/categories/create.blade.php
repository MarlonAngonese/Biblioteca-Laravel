@extends('adminlte::page')

@section('content')
    <div class="container w-75">
        <h3>Nova Categoria</h3>

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['url' => 'categories/store']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Nome:') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Criar Categoria', ['class' => 'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
    </div>
@stop