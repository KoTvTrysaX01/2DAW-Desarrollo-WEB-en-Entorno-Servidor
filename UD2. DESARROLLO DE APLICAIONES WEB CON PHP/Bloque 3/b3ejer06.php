<?php
if (!isset($_GET['cadena'])) {
<<<<<<< HEAD
    echo "<h2>El valor de 'cadena' no está establecido.</h2>";
=======
    echo "<h2>No se pudo encontrar el valor</h2><br>";
>>>>>>> dd5d9fc7a1f039d2cb388c0796c7f220d9f010fa
}
elseif(!ctype_alpha($_GET['cadena'])) {
    echo "<h2>El valor deben ser una cadena</h2>";
}else{
    $vocales = ['a', 'o', 'i', 'u', 'y', 'e'];
    $cadena = $_GET['cadena'];
    foreach($vocales as $clave => $vocal){
        if(str_contains($cadena, $vocal)){
            $cadena = str_replace($vocal, "#", $cadena);
        }
    }
    echo $cadena;
}
?>