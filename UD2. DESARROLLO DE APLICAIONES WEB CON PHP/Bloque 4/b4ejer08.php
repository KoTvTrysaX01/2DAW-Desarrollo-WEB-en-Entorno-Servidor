<?php
$ciudades = ["Madrid", "Barcelona", "Londres", "New York", "Los Ángeles", "Chicago"];
foreach($ciudades as $indice => $nombre){
    echo "La ciudad con el índice " . $indice . " tiene el nombre " . $nombre . "<br>";
}

sort($ciudades);
echo "<br>El array ordenado:<br>";
foreach($ciudades as $indice => $nombre){
    echo "La ciudad con el índice " . $indice . " tiene el nombre " . $nombre . "<br>";
}
?>