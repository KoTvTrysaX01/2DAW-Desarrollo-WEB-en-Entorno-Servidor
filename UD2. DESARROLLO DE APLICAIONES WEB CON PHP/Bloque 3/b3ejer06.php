<?php
if (!isset($_GET['cadena'])) {
    echo "<h2>El valor de 'cadena' no está establecido.</h2>";
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