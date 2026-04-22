<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="header">
        <h1>Welcome to Dashboard</h1>
    </div>

    <div class="cards">
        <div class="card">
            <h3>Total Users</h3>
            <p>150</p>
        </div>
        <div class="card">
            <h3>Total Products</h3>
            <p>45</p>
        </div>
    
    </div>

    <h2>Recent Products</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>NamaProduk</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Product A</td>
                <td>10.000</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Product B</td>
                <td>20.000</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Product C</td>
                <td>30.000</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
