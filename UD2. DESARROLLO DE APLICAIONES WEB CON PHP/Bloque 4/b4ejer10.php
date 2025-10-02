<?php
$nombres_m = ["Pedro", "Antonio", "José", "Vadim", "Luis", "Saba", "Hector", "Ricardo", "Aaron", "Nestor"];
$nombres_f = ["Ana", "Andrea", "Mar", "Tania", "Kristina", "Bela", "Malori", "Lina", "Amalia", "Elisa"];

$nombres_todos = array_merge($nombres_m, $nombres_f);

sort($nombres_todos);

foreach($nombres_todos as $clave => $nombre){
    echo $nombre . "<br>";
}
?>