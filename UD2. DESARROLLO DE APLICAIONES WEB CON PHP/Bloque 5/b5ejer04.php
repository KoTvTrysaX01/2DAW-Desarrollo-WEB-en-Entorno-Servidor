<?php
function checkMatricula($matricula)
{
    if ((strlen($matricula) == 7) || (strlen($matricula) == 8)) {
        if (ctype_digit(substr($matricula, 0, 4))) {
            if (ctype_upper(substr($matricula, 5))) {
                if ($matricula[4] === '-') {
                    return true;
                }
            }
        }
    } else {
        return false;
    }
}


if (checkMatricula("9599-XX")) {
    echo "Cumple con el formato";
} else {
    echo "No cumple con el formato";
}
?>