@extends('adminlte::page')

@section('content')
    <div class="container w-75">
        <h3>Editando Livro: {{ $book->name }}</h3>

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['url' => 'books/update/' . $book->id, 'method' => 'put']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Nome:') !!}
                {!! Form::text('name', $book->name, ['class' => 'form-control', 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('price', 'Preço:') !!}
                {!! Form::input('number', 'price', $book->price, ['type' => 'number', 'class' => 'form-control', 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('edition', 'Edição:') !!}
                {!! Form::text('edition', $book->price, ['class' => 'form-control', 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('image_url', 'URL da Imagem:') !!}
                {!! Form::text('image_url', $book->image_url, ['class' => 'form-control', 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('category_id', 'Categoria:') !!}
                {!! Form::select(
                    'category_id',
                    \App\Models\Category::orderBy('name')->pluck('name', 'id')->toArray(),
                    $book->category->id,
                    ['class'=>'form-control', 'required']
                ) !!}
            </div>

            <div class="form-group">
                {!! Form::label('publisher_id', 'Editora:') !!}
                {!! Form::select(
                    'publisher_id',
                    \App\Models\Publisher::orderBy('name')->pluck('name', 'id')->toArray(),
                    $book->publisher->id,
                    ['class'=>'form-control', 'required']
                ) !!}
            </div>

            <hr>

            <h4>Autores</h4>
            <div class="input_fields_wrap">
                @foreach ($book->authors as $author)
                    <div>
                        <div style="width: 94%; float: left; margin-right: 1%; margin-bottom: 1%;" id="author">
                            {!! Form::select("authors[]", \App\Models\Author::orderBy("name")->pluck("name", "id")->toArray(), $author->id, ["class"=>"form-control", "required", "placeholder"=>"Selecione um autor"]) !!}
                        </div>
                        <button type="button" class="remove_field btn btn-danger btn-circle" style="margin-bottom: 1%;">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                @endforeach
            </div>
            <br>

            <button type="button" style="float:right" class="add_field_button btn btn-default">Adicionar Autor</button>

            <br>
            <br>

            <hr>

            <div class="form-group">
                {!! Form::submit('Editar Livro', ['class' => 'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
    </div>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            var wrapper = $('.input_fields_wrap');
            var add_button = $('.add_field_button');
            var x = 0;
        
            $(add_button).click(function(e) {
                x++;

                var newField = '<div><div style="width: 94%; float: left; margin-right: 1%; margin-bottom: 1%;" id="author">{!! Form::select("authors[]", \App\Models\Author::orderBy("name")->pluck("name", "id")->toArray(), null, ["class"=>"form-control", "required", "placeholder"=>"Selecione um autor"]) !!}</div><button type="button" class="remove_field btn btn-danger btn-circle" style="margin-bottom: 1%;"><i class="fa fa-times"></button></div>';
                $(wrapper).append(newField);
            });
        
            $(wrapper).on("click", ".remove_field", function(e) {
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            });
        })
    </script>
@stop