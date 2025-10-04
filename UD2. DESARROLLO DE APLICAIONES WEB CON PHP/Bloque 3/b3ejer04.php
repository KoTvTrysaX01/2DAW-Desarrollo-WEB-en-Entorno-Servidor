<?php
if (!isset($_GET['password']) || !isset($_GET['encriptar'])) {
    echo "<h2>Uno o más valores no están establecidos. Especifique el valor de password y encriptar</h2>";
} elseif ($_GET['encriptar'] == "md5" || $_GET['encriptar'] == "sha256" || $_GET['encriptar'] == "crc32") {
    // $password = $_GET['password'];
    // $encriptar = $_GET['encriptar'];
    echo "Tú contraseña: " . $_GET['password'] . "<br>";
    echo "El algoritmo de encryptación: " . $_GET['encriptar'] . "<br>";
    echo "La contraseña encryptada: " . hash($_GET['encriptar'], $_GET['password']);
} else {
    echo "El algoritmo no reconocido<br>";
}
?>