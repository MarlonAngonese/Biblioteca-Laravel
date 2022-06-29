@extends('layouts.default')

@section('content')
    <div class="container">
        <h1>Livros</h1>
        <br>

        <p><strong>Id: </strong>{{ $book->id }}</p>
        <p><strong>Nome: </strong>{{ $book->name }}</p>
        <p><strong>Preço: </strong>R${{ $book->price }}</p>
        <p><strong>Categoria: </strong>{{ $book->category->name }}</p>
        <p><strong>Editora: </strong>{{ $book->publisher->name }}</p>
        <p>
            <strong>Autores: </strong>
            @foreach ($book->authors as $author)
                <li>{{ $author->name }}</li>
            @endforeach
        </p>
        <p>
            <strong>Ilustradores: </strong>
            @foreach ($book->illustrators as $illustrator)
                <li>{{ $illustrator->name }}</li>
            @endforeach
        </p>
    </div>
@stop