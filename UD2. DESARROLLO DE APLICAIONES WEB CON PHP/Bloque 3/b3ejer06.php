<?php
if (!isset($_GET['cadena'])) {
    echo "<h2>No se pudo encontrar el valor</h2><br>";
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