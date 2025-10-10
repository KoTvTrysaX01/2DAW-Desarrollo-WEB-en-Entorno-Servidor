<?php
// $miMail = "abc__123@abc---123.es"; // cumple
// $miMail = "abc_._123@ab.c---12.3.es"; // cumple
$miMail = "abc...123@abc-.--12._3.es"; // NO cumple

function checkMail($email)
{
    // $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

if (checkMail($miMail)) {
    echo "El correo '" . $miMail . "' cumple con el formato.";
} else {
    echo "El correo '" . $miMail . "' NO cumple con el formato.";
}
?>