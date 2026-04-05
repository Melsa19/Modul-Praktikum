<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$user_benar = "admin";
$pass_benar = "12345";

if($username == $user_benar && $password == $pass_benar){

    $_SESSION['username'] = $username;

    header("Location: ../index.php");
    exit();

}else{

    echo "<script>
            alert('Username atau Password salah');
            window.location='../login.php';
          </script>";
}
?>