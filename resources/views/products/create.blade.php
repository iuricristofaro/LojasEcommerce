@extends('app')

@section('content')
	<div class="container">
		<h1>Cadastro</h1>

		@if ($errors->any())
			<ul class="alert">
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		@endif

		{!! Form::open(['route'=>'admin.products.store', 'method'=>'post']) !!}

		@include('products._form')

		<!-- Submit Button -->
		<div class="form-group">
			{!! Form::submit('Salvor Cadastro', ['class'=>'btn btn-primary']) !!}
		</div>

		{!! Form::close() !!}
	</div>
@endsection
