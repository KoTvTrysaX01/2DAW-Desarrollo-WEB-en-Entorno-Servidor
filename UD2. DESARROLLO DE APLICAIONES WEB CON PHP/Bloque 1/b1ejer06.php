<?php
if(!isset($_GET['char'])) {
    echo "El char no es encontrado<br>";
}else{
    if(!ctype_alpha($_GET['char'])){
        echo "Valor '{$_GET['char']}' no es un char<br>";
    }else{
        $char = $_GET['char'];
      if($char === 'S'){
        echo "El char {$char} = 'S'<br>";
      }else if($char === 'N'){
        echo "El char {$char} = 'N'<br>";
      }else{
        echo "El char {$char} no es ni 'S' ni 'N'";
      }
    }
}
echo "Pulsa en <a href='?char=S'>S</a> para generar un URL con 'S'<br> o <a href='?char=N'>N</a> para generar un URL con 'N'";
// $random=rand(-10, 10);
// echo "Pulsa en <a href='?char=$random'>random</a> para generar un random char automaticamente<br>";
?>