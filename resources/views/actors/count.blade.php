<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Contador de Actores</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <div class="card shadow border-0">
                    <div class="card-body p-5">
                        <i class="fas fa-users fa-4x text-primary mb-4"></i>
                        <h1 class="display-5 fw-bold">Total de Actores</h1>
                        <p class="text-muted mb-4">Actualmente registrados en el sistema</p>
                        
                        <div class="display-1 fw-bold text-dark mb-4">
                            {{ $count }}
                        </div>

                        <div class="d-grid gap-2 d-md-block">
                            <a href="{{ route('actors') }}" class="btn btn-outline-primary px-4">
                                <i class="fas fa-list me-2"></i>Ver Lista
                            </a>
                            <a href="/" class="btn btn-secondary px-4">
                                <i class="fas fa-home me-2"></i>Inicio
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>