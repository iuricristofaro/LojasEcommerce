@extends('app')

@section('content')
    <div class="container">
        <h1>Editar</h1>
        @if($errors->any())
            <ul class="alert">
                @foreach($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::model($order, ['route'=>['admin.orders.update', $order->id], 'method' => 'put']) !!}
            <div class="form-group">
                {!! Form::label('status', 'Status:') !!}
                {!! Form::select('status', [
                    '0' => 'Aguardando pagamento',
                    '1' => 'Pagamento confirmado',
                    '2' => 'Aprovado',
                    '3' => 'Enviado',
                    '4' => 'Cancelado',
                    ], null, ['class'=>'form-control']) 
                !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Atualizar', ['class'=>'btn btn-primary']) !!}
                <a href="{{ route('admin.orders.index') }}" class='btn btn-default '>Voltar</a>
            </div>
        {!! Form::close() !!}
    </div>
@endsection