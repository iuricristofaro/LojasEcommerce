@extends('app')

@section('content')
	<div class="container">
		<h1>Editar Produtos</h1>


		{!! Form::model($product, ['route'=>['admin.products.update', $product->id], 'method'=>'put']) !!}
		
		@include('products._form')

		<!-- Submit Button -->
		<div class="form-group">
			{!! Form::submit('Salvor Editar', ['class'=>'btn btn-primary']) !!}
		</div>

		{!! Form::close() !!}
	</div>

@endsection