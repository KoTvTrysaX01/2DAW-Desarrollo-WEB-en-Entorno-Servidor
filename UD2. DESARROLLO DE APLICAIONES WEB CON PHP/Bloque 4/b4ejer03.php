<?php
$nombres = array('roberto', 'juan', 'marta', 'maria', 'martin', 'jorge', 'miriam', 'manuel', 'pedro');
$m_nombres = [];

foreach ($nombres as $clave => $nombre) {
    if ($nombre[0] == 'm') {
        array_push($m_nombres, $nombre);
    }
}

echo "Los nombres que comiencen con la letra 'm' <br>";
for ($i = 0; $i < count($m_nombres); $i++) {
    if ($i == count($m_nombres) - 1) {
        echo $m_nombres[$i];
    } else {
        echo $m_nombres[$i] . ", ";
    }
}
?>