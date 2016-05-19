@extends('app')

@section('content')
    <div class="container">
        <h1>Categories</h1>

        <a href="{{ route('admin.categories.create') }}", class="btn btn-success">Cadastro</a>

        <br><br>

        <table class="table">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Ação</th>
            </tr>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td>
                        <a href='{{ route("admin.categories.edit", ["id"=>"$category->id"]) }}' class="btn btn-primary btn-xs">Editar</a> |
                        <a href='{{ route("admin.categories.destroy", ["id"=>"$category->id"]) }}' class="btn btn-danger btn-xs">Apagar</a>
                    </td>
                </tr>
            @endforeach
        </table>
        {!! $categories->render() !!}
    </div>
@endsection