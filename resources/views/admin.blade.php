<!DOCTYPE html>
<html lang="id">
<head>
    <title>Panel Admin - StasiunKu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    
    <nav class="navbar navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">Admin Panel - StasiunKu</a>
            <a href="/logout" class="btn btn-danger btn-sm">Logout</a>
        </div>
    </nav>

    <div class="container">
        <h4 class="mb-4 text-secondary">Kelola Tiket Kereta</h4>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card shadow-sm mb-4 border-0">
            <div class="card-body">
                <h6 class="text-primary mb-3">Tambah Tiket Baru</h6>
                <form action="/admin/product" method="POST">
                    @csrf
                    <div class="row g-2">
                        <div class="col-md-4">
                            <input type="text" name="name" class="form-control" placeholder="Nama Kereta (Cth: Argo Bromo)" required>
                        </div>
                        <div class="col-md-3">
                            <input type="number" name="price" class="form-control" placeholder="Harga Tiket" required>
                        </div>
                        <div class="col-md-3">
                            <select name="category_id" class="form-control" required>
                                <option value="">-- Pilih Kelas --</option>
                                @foreach($categories as $c)
                                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-success w-100">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <table class="table table-striped mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>Nama Kereta</th>
                            <th>Harga</th>
                            <th>Kelas/Kategori</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $p)
                        <tr>
                            <td>{{ $p->name }}</td>
                            <td>Rp {{ number_format($p->price, 0, ',', '.') }}</td>
                            <td>
                                @foreach($p->categories as $c)
                                    <span class="badge bg-secondary">{{ $c->name }}</span>
                                @endforeach
                            </td>
                            <td class="text-center">
                                <a href="/admin/product/delete/{{ $p->id }}" class="btn btn-sm btn-outline-danger">Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>