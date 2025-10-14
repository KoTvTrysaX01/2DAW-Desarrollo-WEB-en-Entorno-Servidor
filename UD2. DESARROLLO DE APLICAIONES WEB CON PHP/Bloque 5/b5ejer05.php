<?php
function checkEmail($email)
{
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

if (checkEmail("ejem.---o@gmail.es")) {
    echo "Cumple el formato";
} else {
    echo "No cumple el formato";
}
?>