<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="css/style.css">
</head>

<body>

<div class="login-container">

    <div class="login-box">

        <h2>Login</h2>

        <form action="controller/proses_login.php" method="POST">

            <input class="login-input" type="text" name="username" placeholder="Username" required>

            <input class="login-input" type="password" name="password" placeholder="Password" required>

            <button class="login-button" type="submit">Login</button>

        </form>

    </div>

</div>

</body>
</html>