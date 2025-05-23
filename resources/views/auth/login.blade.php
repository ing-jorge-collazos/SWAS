<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <form action="/login" method="POST" class="bg-white p-4 rounded shadow" style="width: 300px;">
        @csrf
        <h4 class="mb-3 text-center">Iniciar Sesión</h4>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required/>
        </div>
        <div class="mb-3">
            <label>Contraseña</label>
            <input type="password" name="password" class="form-control" required/>
        </div>
        <button type="submit" class="btn btn-primary w-100">Ingresar</button>
    </form>
</body>
</html>
