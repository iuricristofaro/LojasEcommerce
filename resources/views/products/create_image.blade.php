@extends('app')
@section('content')
	<div class="container">
		<h1>Upload Imagem</h1>

		@if($errors->any())
			<ul class="alert">
				@foreach($errors->all() as $erro)
					<li>{{ $erro }}</li>
				@endforeach
			</ul>
			@endif

		{!! Form::open(['route'=>['admin.products.images.store', $product->id], 'method'=>'post', 'enctype'=>"multipart/form-data"]) !!}
		
		<!-- Name Form Input -->
		<div class="form-group">
			{!! Form::label('image', 'Imagem:') !!}
			{!! Form::file('image', null, ['class'=>'form-control']) !!}
		</div>

		<!-- Submit Button -->
		<div class="form-group">
			{!! Form::submit('Upload Image', ['class'=>'btn btn-primary']) !!}
		</div>

		{!! Form::close() !!}
	</div>
@endsection