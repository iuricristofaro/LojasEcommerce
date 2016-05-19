@extends('app')

@section('content')
    <div class="container">
                        <h1>Usuários</h1>

                        <a href="{{ route('admin.users.create') }}" class="btn btn-success">Novo Usuários</a>
                        <br />  <br />
                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Permissão</th>
                                <th>Action</th>
                            </tr>

                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->is_admin == 0 ? 'Autor' : 'Administrador'  }}</td>
                                    <td>
                    <a href="{{ route('admin.users.edit', ['id' => $user->id]) }}" class="btn btn-primary btn-xs">Editar</a> |
                    <a href="{{ route('admin.users.destroy', ['id' => $user->id]) }}" class="btn btn-danger btn-xs">Apagar</a>
                </td>
            </tr>
            @endforeach
        </table>

        {!! $users->render() !!}
    </div>
@endsection