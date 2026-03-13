<!DOCTYPE html>
<html lang="es">
<head>
    <title>Lista de Actores</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h1 class="mb-4">Listado de Actores</h1>

    @if($actors->isEmpty())
        <div class="alert alert-info">No hay actores en la base de datos.</div>
    @else
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Fecha de Nacimiento</th>
                </tr>
            </thead>
            <tbody>
                @foreach($actors as $actor)
                    <tr>
                        <td>{{ $actor->name }}</td>
                        <td>{{ $actor->surname }}</td>
                        <td>{{ $actor->birthdate }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="/">Volver</a>
</body>
</html>