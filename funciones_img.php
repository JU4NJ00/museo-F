<?php

function procesarimg($ruta,$nombre){

//$imgorigen=imagecreatefromjpeg($ruta.$nombre);
$imgorigen=imagecreatefromstring(file_get_contents($ruta.$nombre));

$ancho_origen=imagesx($imgorigen);
$alto_origen=imagesy($imgorigen);

$ancho_max=600;

if ($ancho_origen>$alto_origen){

      $ancho_nuevo=$ancho_max;
      $alto_nuevo=$ancho_max*$alto_origen/$ancho_origen;
}else{
     
     $alto_nuevo=$ancho_max;
     $ancho_nuevo=$ancho_max*$ancho_origen/$alto_origen;
}      

$imgdestino=imagecreatetruecolor($ancho_nuevo, $alto_nuevo);

imagecopyresized($imgdestino, $imgorigen, 0, 0, 0, 0, $ancho_nuevo, $alto_nuevo, $ancho_origen, $alto_origen);

imagejpeg($imgdestino,$ruta.$nombre);


imagedestroy($imgorigen);
imagedestroy($imgdestino);

}




?>