@extends('app')

@section('content')
    <div class="container">
        <h1>Orders</h1>
        <br>

        <table class="table">
            <tr>
                <th>#ID</th>
                <th>User</th>
                <th>Itens</th>
                <th>Valor</th>
                <th>Status</th>
                <th>Ação</th>
            </tr>
            @foreach($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>
                        <ul>
                            @foreach($order->items as $item)
                                <li>{{ $item->product->name }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>{{$order->total}}</td>
                    <td>
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
                    </td>
                    <td>
                        <a href="{{ route('admin.orders.show', ['id'=>$order->id]) }}" class="btn btn-primary btn-xs">Show</a> |
                        <a href="{{ route('admin.orders.edit', ['id'=>$order->id]) }}" class="btn btn-primary btn-xs">Editar</a>
                    </td>
                </tr>
            @endforeach
        </table>
        {!! $orders->render() !!}
    </div>    
@endsection