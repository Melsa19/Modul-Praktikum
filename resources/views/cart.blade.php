<!DOCTYPE html>
<html lang="id">
<head>
    <title>Keranjang Tiket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h3 class="text-secondary">Keranjang Tiket Anda</h3>
        <a href="/landing" class="btn btn-outline-secondary mb-3">Kembali</a>
        
        <table class="table table-bordered bg-white">
            <thead class="table-secondary">
                <tr>
                    <th>Nama Kereta</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if($cart)
                    @foreach($cart as $id => $details)
                    <tr>
                        <td>{{ $details['name'] }}</td>
                        <td>Rp {{ number_format($details['price'], 0, ',', '.') }}</td>
                        <td>{{ $details['quantity'] }}</td>
                        <td>
                            <a href="/cart/remove/{{ $id }}" class="btn btn-sm btn-danger">Batal</a>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr><td colspan="4" class="text-center">Keranjang kosong.</td></tr>
                @endif
            </tbody>
        </table>
    </div>
</body>
</html>