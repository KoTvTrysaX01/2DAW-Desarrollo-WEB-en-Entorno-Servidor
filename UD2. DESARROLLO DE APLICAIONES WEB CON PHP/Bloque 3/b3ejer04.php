<?php
if (!isset($_GET['password']) || !isset($_GET['encriptar'])) {
    echo "<h2>No se pudo encontrar unos valores</h2><br>";
}
elseif($_GET['encriptar'] == "md5" || $_GET['encriptar'] == "sha256" || $_GET['encriptar'] == "crc32") {
    // $password = $_GET['password'];
    // $encriptar = $_GET['encriptar'];
    echo "Tú contraseña: " . $_GET['password'] . "<br>";
    echo "El algoritmo de encryptación: " . $_GET['encriptar'] . "<br>";
    echo "La contraseña encryptada: " . hash($_GET['encriptar'], $_GET['password']);
}else{
    echo "El algoritmo no reconocido<br>";
}
?>