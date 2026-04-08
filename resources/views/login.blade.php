<!DOCTYPE html>
<html lang="id">
<head>
    <title>Login - StasiunKu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center" style="height: 100vh;">
    
    <div class="card shadow-sm p-4" style="width: 100%; max-width: 400px;">
        <h3 class="text-center text-primary mb-4">Masuk Akun</h3>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="/login" method="POST">
            @csrf <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            
            <button type="submit" class="btn btn-primary w-100">Masuk</button>
        </form>
        
        <div class="mt-3 text-center">
            <p class="text-muted">Belum punya akun? <a href="/register" class="text-decoration-none">Daftar di sini</a></p>
        </div>
    </div>

</body>
</html>