<?php
$valores = array(
    'email' => "",
    'password' => ""
);


$entrar = false;
if (isset($_POST['login'])) {
    if (isset($_POST['email'])) {
        $valores['email'] = addslashes(trim($_POST['email']));
    }
    if (isset($_POST['password'])) {
        $valores['password'] = addslashes(trim($_POST['password']));
    }
    $entrar = true;
}

if ($entrar) {
    $sqlBD = sqlConecta($hostSql, $userSql, $passSql, $basedatosSql);
    $sqlSelect = "SELECT * FROM users WHERE email='" . $valores['email'] . "'";
    $sqlCursor = sqlQuery($sqlBD, $sqlSelect);
    $regUsuario = sqlObtenerRegistro($sqlBD, $sqlCursor);

    if (!is_null($regUsuario)) {
        if (isset($regUsuario['password'])) {
            $calculated_hash = hash('sha256', $valores['password']);
            // if (password_verify($valores['password'], $regUsuario['password'])) {
            if ($calculated_hash === $regUsuario['password']) {

                $_SESSION['usuario'] = $regUsuario['nombre'];
                echo $_SESSION['usuario'];
                header('Location: ' . "index.php");
            }
        }
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Foodie Express</title>
    <link rel="stylesheet" href="./styles/login.css">
</head>

<body>

    <div class="container">
        <h2>Login</h2>
        <form method="post">
            <div class="input-box">
                <input type="email" placeholder="Email" name="email" required>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" name="password" required>
            </div>
            <button type="submit" class="btn" name="login">Login</button>
            <button class="btn" onclick="location.href='index.php?page=login'">Go Back</button>
        </form>
    </div>
</body>

</html>