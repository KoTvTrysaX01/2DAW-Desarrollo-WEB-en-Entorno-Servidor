<?php
$nombres_m = ["Pedro", "Antonio", "José", "Vadim", "Luis", "Saba", "Hector", "Ricardo", "Aaron", "Nestor"];
$nombres_f = ["Ana", "Andrea", "Mar", "Tania", "Kristina", "Bela", "Malori", "Lina", "Amalia", "Elisa"];
$nombres_todos = [];

for ($i = 0; $i < 10; $i++) {
    array_push($nombres_todos, $nombres_m[$i], $nombres_f[$i]);
}

sort($nombres_todos);

foreach($nombres_todos as $clave => $nombre){
    echo $nombre . "<br>";
}
?>