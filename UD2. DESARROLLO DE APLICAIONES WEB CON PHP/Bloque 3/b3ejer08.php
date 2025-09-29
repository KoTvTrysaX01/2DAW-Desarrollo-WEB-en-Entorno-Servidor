<?php
if (!isset($_GET['letras'])) {
    echo "No se pudo encontrar el valor <br>";
}
elseif(!ctype_alpha($_GET['letras'])) {
    echo "El valor no son letras <br>";
}else{
    $letras = str_split(strtoupper($_GET['letras']));
    $frase = "CON EL TIEMPO Y LA PACIENCIA SE ADQUIERE LA CIENCIA";

    for($i = 0; $i < strlen($frase); $i++){
        if(in_array($frase[$i], $letras)){
            echo $frase[$i];
        }elseif($frase[$i] == " "){
            echo " ";
        }
        else{
            echo "-";
        }
    }
}
?>