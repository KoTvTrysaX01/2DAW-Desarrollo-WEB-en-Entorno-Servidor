<?php
$registro = array(
    'Nombre' => 'Pedro Torres',
    'Dirección' => 'C/ Mayor, 37',
    'Teléfono' => 123456789
);

foreach($registro as $clave => $valor){
    echo $clave . " => " . $valor . " <br>";
}
?>