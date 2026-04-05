<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

<div class="login-container">

    <div class="login-box">

        <h2>Login</h2>
        @if(session('error'))
            <div style="color: red; margin-bottom: 15px; font-size: 14px;">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('login.proses') }}" method="POST">

       <form action="{{ route('login.proses') }}" method="POST">
    
    @csrf

    <input class="login-input" type="text" name="username" placeholder="Username" required>
    <input class="login-input" type="password" name="password" placeholder="Password" required>

    <button class="login-button" type="submit">Login</button>
</form>

    </div>

</div>

</body>
</html>