<!DOCTYPE html>
<html lang="id">
<head>
    <title>Pemesanan Tiket Kereta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-dark bg-dark mb-4 shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">STASIUN-KU</a>
            <div class="ms-auto">
                @auth
                    <span class="text-light me-3 small">Halo, {{ Auth::user()->name }}</span>
                    <a href="/cart" class="btn btn-info btn-sm">Keranjang</a>
                    <a href="/logout" class="btn btn-danger btn-sm">Logout</a>
                @else
                    <a href="/login" class="btn btn-outline-light btn-sm">Login</a>
                    <a href="/register" class="btn btn-light btn-sm text-dark">Daftar</a>
                @endauth
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="py-3 text-center">
            <h2 class="fw-bold text-dark">Tiket Kereta Tersedia</h2>
            <p class="text-muted">Pesan tiket perjalananmu dengan mudah dan cepat.</p>
        </div>

        <div class="row">
            @forelse($products as $p)
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title fw-bold text-primary">{{ $p->name }}</h5>
                        <p class="text-muted mb-2 small">Kategori Kelas:</p>
                        <div class="mb-3">
                            @foreach($p->categories as $c)
                                <span class="badge bg-secondary me-1">{{ $c->name }}</span>
                            @endforeach
                        </div>
                        <h6 class="fw-bold">Rp {{ number_format($p->price, 0, ',', '.') }}</h6>
                        <hr>
                        
                        @auth
                            <button onclick="addToCart({{ $p->id }})" class="btn btn-primary w-100">Beli Tiket</button>
                        @else
                            <a href="/login" class="btn btn-outline-primary w-100">Login untuk Membeli</a>
                        @endauth
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <div class="alert alert-warning">Tiket belum tersedia. Siahkan Admin mengisi data di panel kontrol.</div>
            </div>
            @endforelse
        </div>
    </div>

    @if(session('success'))
    <script>
    alert("{{ session('success') }}");
    </script>
    @endif

    <script>
        function addToCart(productId) {
            fetch('/cart/add/' + productId)
                .then(response => {
                    if (response.ok) {
                        alert('Berhasil membeli tiket!');
                    } else {
                        alert('Gagal menambah ke keranjang.');
                    }
                })
                .catch(error => {
                    alert('Terjadi kesalahan: ' + error.message);
                });
        }
    </script>
</body>
</html>