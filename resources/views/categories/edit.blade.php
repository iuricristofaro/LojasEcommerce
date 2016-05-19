@extends('app')

@section('content')
    <div class="container">
        <h1>Editar Categorias</h1>

        @if ($errors->any())
            <ul class="alert">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::model($category, ['route'=>['admin.categories.update', $category->id], 'method'=>'put']) !!}

        @include('categories._form')

        <div class="form-group">

            {!! Form::submit('Salvor Editar', ['class'=>'btn btn-primary']) !!}

        </div>

        {!! Form::close() !!}

    </div>
@endsection