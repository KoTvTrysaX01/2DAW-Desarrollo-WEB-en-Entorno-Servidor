<?php
if (!isset($_GET['cadena'])) {
    echo "No se pudo encontrar el valor <br>";
}
elseif(!ctype_alpha($_GET['cadena'])) {
    echo "El valor no es una cadena <br>";
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