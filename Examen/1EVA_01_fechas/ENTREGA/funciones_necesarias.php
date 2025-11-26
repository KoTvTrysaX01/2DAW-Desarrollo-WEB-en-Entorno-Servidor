<?php
  // Variable String con el valor de fecha
  $fecha = '2025-11-18';
//   if(isset($_GET['fecha'])){
//    $fecha = $_GET['fecha'];
//   }

  // Variable Timestamp de fecha
  $timestamp = strtotime($fecha);
  if (is_int($timestamp))  {
     echo 'Fecha válida<br>';
  } else {
     echo 'Fecha no válida<br>';
  }

  // Mostrar día de la semana de la variable Timestamp
  echo 'Día de la semana en inglés<br>';
  echo date('l', $timestamp);
?>