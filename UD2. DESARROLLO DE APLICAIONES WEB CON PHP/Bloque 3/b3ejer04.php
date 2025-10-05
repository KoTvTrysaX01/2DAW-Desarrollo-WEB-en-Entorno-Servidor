<?php
if (!isset($_GET['password']) || !isset($_GET['encriptar'])) {
<<<<<<< HEAD
    echo "<h2>Uno o más valores no están establecidos. Especifique el valor de password y encriptar</h2>";
} elseif ($_GET['encriptar'] == "md5" || $_GET['encriptar'] == "sha256" || $_GET['encriptar'] == "crc32") {
=======
    echo "<h2>No se pudo encontrar unos valores</h2><br>";
}
elseif($_GET['encriptar'] == "md5" || $_GET['encriptar'] == "sha256" || $_GET['encriptar'] == "crc32") {
>>>>>>> dd5d9fc7a1f039d2cb388c0796c7f220d9f010fa
    // $password = $_GET['password'];
    // $encriptar = $_GET['encriptar'];
    echo "Tú contraseña: " . $_GET['password'] . "<br>";
    echo "El algoritmo de encryptación: " . $_GET['encriptar'] . "<br>";
    echo "La contraseña encryptada: " . hash($_GET['encriptar'], $_GET['password']);
<<<<<<< HEAD
} else {
=======
}else{
>>>>>>> dd5d9fc7a1f039d2cb388c0796c7f220d9f010fa
    echo "El algoritmo no reconocido<br>";
}
?>