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
                header('Location: ' . "index.php?category=home");
            }
        }
    }
}
?>

<div class="container">
    <h1>Login</h1>
    <form method="post">
        <div class="input-box login">
            <input type="email" placeholder="Email" name="email" required>
        </div>
        <div class="input-box login">
            <input type="password" placeholder="Password" name="password" required>
        </div>
        <button type="submit" class="btn" name="login">Login</button>
        <button class="btn" onclick="location.href='logs.php'">Go Back</button>
    </form>
</div>