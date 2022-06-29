@extends('layouts.default')

@section('content')
    <div class="container">
        <h1>Compras</h1>

        {!! Form::open(['name' => 'form_name', 'route' => 'purchases']) !!}
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
                <th>Cliente</th>
                <th>Livros</th>
                <th>Total</th>
                <th>Forma de Pagamento</th>
                <th>Status</th>
                <th>Ações</th>
            </thead>
            <tbody>
                @foreach($purchases as $purchase)
                    <tr>
                        <td>{{ $purchase->id }}</td>
                        <td>{{ $purchase->client->name }}</td>
                        <td>
                            @foreach ($purchase->books as $book)
                            <li>{{ $book->name }}</li>
                            @endforeach
                        </td>
                        <td>{{ $purchase->total }}</td>
                        <td>{{ $purchase->payment_method }}</td>
                        <td>
                            @if ($purchase->status)
                            Pago
                            @else
                            Não Pago
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('purchases.edit', ['id' => $purchase->id]) }}" class="btn btn-sm btn-warning">Editar</a>
                            <button type="button" onclick="return ConfirmDelete({{ $purchase->id }})" class="btn btn-sm btn-danger">Remover</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $purchases->links("pagination::bootstrap-4") }}

        <a href="{{ route('purchases.create', []) }}" class="btn-sm btn-info">Nova Compra</a>
    </div>
@stop

@section('table-delete')
"purchases"
@endsection