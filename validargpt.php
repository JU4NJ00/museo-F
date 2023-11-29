<?php
require_once "conexion.php";

function proceseimg($ruta, $nombre)
{
    $nom1 = substr($nombre, 0, 3);

    // Definir el tamaño máximo de la imagen redimensionada
    $max_dimension = 1280;

    // Ruta de la imagen original
    $imagen_original = $ruta . "/" . $nombre;

    // Obtener las dimensiones de la imagen original
    list($ancho_original, $alto_original) = getimagesize($imagen_original);

    // Calcular la nueva dimensión proporcional
    if ($ancho_original > $alto_original) {
        $nuevo_ancho = $max_dimension;
        $nuevo_alto = round($max_dimension / $ancho_original * $alto_original);
    } else {
        $nuevo_ancho = round($max_dimension / $alto_original * $ancho_original);
        $nuevo_alto = $max_dimension;
    }

    // Crear una imagen vacía con las nuevas dimensiones
    $nueva_imagen = imagecreatetruecolor($nuevo_ancho, $nuevo_alto);

    // Cargar la imagen original
    $imagen_original = imagecreatefromjpeg($imagen_original);

    // Redimensionar la imagen original a las nuevas dimensiones
    imagecopyresampled($nueva_imagen, $imagen_original, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho_original, $alto_original);

    // Generar un nombre único para la nueva imagen
    $nuevo_nombre = $nom1 . rand(1, 10000) . rand(1, 2000) . '.jpg';

    // Guardar la nueva imagen en un archivo
    imagejpeg($nueva_imagen, 'imagenes/' . $nuevo_nombre, 80);

    // Liberar la memoria utilizada por las imágenes
    imagedestroy($nueva_imagen);
    imagedestroy($imagen_original);

    return $nuevo_nombre;
}
?>
