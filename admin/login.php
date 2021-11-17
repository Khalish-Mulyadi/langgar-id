<?php 
session_start();
include_once("../koneksi.php");
if ( isset($_SESSION["login_admin"]) ) {
    header("Location: index.php");
}

if (isset($_POST['login'])) 
{
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $sql = "SELECT * FROM admin WHERE username= '$username'";

    $checkUsername = mysqli_query($conn,$sql);

    if (mysqli_num_rows($checkUsername) === 1 ) {
        $row = mysqli_fetch_assoc($checkUsername);
        if ( password_verify($password, $row["password"] ) ) {
            $_SESSION['username'] = $username;
            $_SESSION['admin'] = $row['nama_admin'];
            // set session
            $_SESSION['login_admin'] = true;
            header("Location: index.php");
        } else {
            echo "<script>alert('Salah username atau password')</script>";
        }
    } 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- online bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    
    <title>Login - Admin Langgar ID</title>
</head>
<body>
    <div class="container bg-success w-25 h-45 position-absolute top-50 start-50 translate-middle rounded-3 px-3 py-3">
        <h1 class="text-light">LOGIN ADMIN LANGGAR ID</h1>
        <form method="post" action="">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label text-light">Username</label>
            <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label text-light">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
          </div>
          <button type="submit" name="login" class="btn btn-light">Submit</button>
        </form>
    </div>
    
    <!-- bootstrap 5 js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>