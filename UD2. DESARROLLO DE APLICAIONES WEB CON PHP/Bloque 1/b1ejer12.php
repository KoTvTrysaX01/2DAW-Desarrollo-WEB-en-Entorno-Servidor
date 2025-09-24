<?php
if(!isset($_GET['opcion'])) {
    echo "<h1>Elige la opción</h1><br>";
}else{
    if(!is_string($_GET['opcion'])){
        echo "El valor no es una cadena<br>";
    }else{
        $opcion = $_GET['opcion'];
        switch($opcion){
            case "archivo";
                echo"<h1>Archivo</h1><p>Archivamos...</p><br>";
                break;
            case "buscar";
                echo"<h1>Buscar</h1><p>Buscamos...</p><br>";
                break;
            case "salir";
                echo"<h1>Salir</h1><p>Salimos...</p><br>";
                break;
            default:
                echo "La opción '{$opcion}' no es una opción correcta<br>";
				break;
        }
    }
}
echo "<ul>
        <li><a href='?opcion=archivo'>Archivo</a></li>
        <li><a href='?opcion=buscar'>Buscar</a></li>
        <li><a href='?opcion=salir'>Salir</a></li>
        <li><a href='?opcion=otro'>Otro</a></li>
     </ul>";
?>