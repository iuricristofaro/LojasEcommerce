@extends('app')

@section('content')
    <div class="container">
        <h1>Show</h1>
        <br>

        <p><b>User:</b> {{$order->user->name}}</p>
        <p><b>Valor:</b> {{$order->total}}</p>
        <p><b>Status:</b> 
            @if($order->status == 0)
                Aguardando pagamento
            @elseif($order->status == 1)
                Pagamento confirmado
            @elseif($order->status == 2)
                Aprovado
            @elseif($order->stauts == 3)
                Enviado
            @else
                Cancelado
            @endif
        </p>
        <p><b>Itens:</b><p>
            <table class="table">
                <tr>
                    <td>#ID</td>
                    <td>Nome</td>
                    <td>Qtd</td>
                    <td>Valor unitário</td>
                </tr>
                @foreach($order->items as $item)
                <tr>
                    <td><a href="{{ route('admin.products.show',['id'=>$item->product->id]) }}">{{ $item->product->id }}</a></td>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->qtd }}</td>
                    <td>{{ $item->price }}</td>
                </tr>
                @endforeach
            </table>
        <br>
        <a href="{{ route('admin.orders.edit', ['id'=>$order->id]) }}" class='btn btn-primary '>Editar</a>
        <a href="{{ route('admin.orders.index') }}" class='btn btn-default '>Voltar</a>
    </div>
@endsection