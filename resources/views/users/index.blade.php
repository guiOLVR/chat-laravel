<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Laravel 9 CRUD Usuários</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Laravel 9 CRUD Usuários</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="/users/create"> Create User</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th width="80px">Desativar</th>
                    <th width="180px">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>
                        {{ $user->name }}
                        @if($user->deleted_at)
                        <!-- Dado desativado -->
                        <br />
                        <span class="text-danger">Excluído em {{ $user->deleted_at }}</span>
                        @endif
                    </td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if($user->deleted_at)
                        <form method="POST" action="{{ route('users.restore', $user->id) }}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <button type="submit" class="btn btn-success">Ativar</button>
                        </form>
                        @else
                        <!-- Dado ativo -->
                        <form method="POST" action="{{ route('users.softDelete', $user->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-warning">Desativar</button>
                        </form>
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este usuário?')">
                            <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $users->links() !!}
    </div>
</body>

</html>