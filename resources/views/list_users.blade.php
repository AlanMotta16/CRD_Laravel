<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>List of Users</title>
        <!-- Adicione aqui os links para CSS se necessário -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid justify-content-start">
                <a class="navbar-brand" href="/">Cadastrar Dados</a>
                <a class="navbar-brand" href="#">Mostrar Dados</a>
            </div>
        </nav>
        @if (session()->has('success'))
            <p class='alert alert-success'>{{ session('success'); }}</p>
        @endif
        <div class="container pt-3">
            <h3>Usuários Cadastrados</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Dinheiro</th>
                        <th>Deletar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dados as $user)
                        <tr>
                            <td>{{$user['id']}}</td>
                            <td>{{$user['nome']}}</td>
                            <td>{{$user['cpf']}}</td>
                            <td>US${{number_format($user['dinheiro'], 2, '.', ',')}}</td>
                            <td>
                                <form action="delete_user" method="post">
                                    @csrf
                                    <input type = "hidden" name = "id" value = "{{ $user['id']}}">
                                    <!-- <input type="hidden" name="id" value="{{ $user['id']}}"> -->
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>