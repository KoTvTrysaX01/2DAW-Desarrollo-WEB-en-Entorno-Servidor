<?php
$miMatricula = "1234-XX";

function checkMatricula($matricula)
{
    if (strlen($matricula) == 7 || strlen($matricula) == 8) {
        if ($matricula[4] == '-') {
            if (ctype_digit(substr($matricula, 0, 4)) && ctype_alpha(substr($matricula, 5))) {
                return true;
            }
        }
    }else{
        return false;
    }
}

if (checkMatricula($miMatricula)) {
    echo "La matricula '" . $miMatricula . "' cumple con el formato.";
} else {
    echo "La matricula '" . $miMatricula . "' NO cumple con el formato.";
}
?>