@extends('store.store')


@section('content')


    <div class="col-sm-9 padding-right">
            <h3>Meus pedidos</h3>

        <table class="table">
            <tbody>
            <tr>
                <th>Código da Transação</th>
                <th>Itens</th>
                <th>Valor</th>
                <th>Status</th>
                {{-- <th>Meio de pagamento</th> --}}
            </tr>

            @foreach($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
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
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop