@extends('app')
@section('content')
	<div class="container">
		<h1>Products</h1>
		<a href="{{ route('admin.products.create') }}", class="btn btn-success">Cadastro</a>
		<br/>
		<br/>
		<table class="table">
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Description</th>
				<th>Price</th>
				<td>Category</td>
				<th>Action</th>
			</tr>
			@foreach($products as $product)
				<tr>
					<td>{{ $product->id }}</td>
					<td>{{ $product->name }}</td>
					<td>{{ str_limit($product->description, $limit = 100, $end = '...') }}</td>
					<td>{{ $product->price }}</td>
					<td>{{ $product->category->name }}</td>
					<td>
						<a href="{{ route('admin.products.edit', ['id' => $product->id]) }}" class="btn btn-warning btn-sm">Editar</a> |
						<a href="{{ route('admin.products.images.index', ['id' => $product->id]) }}" class="btn btn-primary btn-sm">Images</a> |
						<a href="{{ route('admin.products.destroy', ['id' => $product->id]) }}" class="btn btn-danger btn-sm">Apagar</a>
					</td>
							</tr>
			@endforeach
		</table>
		{!! $products->render() !!}
	</div>
@endsection