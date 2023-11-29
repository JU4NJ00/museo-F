<?php
require_once('validargpt.php');
//var_dump(gd_info());

// Ruta temporal del archivo subido
function imagen()
$temporal = $_FILES['archivo']['tmp_name'];

// Verifica si el archivo subido es una imagen
if (getimagesize($temporal) !== false) {
  
    // Si el archivo es una imagen, continúa con el proceso
    $ruta = 'imagenes/';
    $nombrearchivo = basename($_FILES['archivo']['name']);
    $destino = $ruta.$nombrearchivo;

    // Verifica si el archivo ya existe en el directorio de destino
    if (file_exists($destino)) {
        echo "<br>El archivo ya existe.";
    } else {
        // Si el archivo no existe, mueve el archivo de la carpeta temporal a la carpeta de destino
       
        

        if (move_uploaded_file($temporal, $destino)) {
            proceseimg($ruta,$nombrearchivo);
            echo "<br>El archivo ". $nombrearchivo . " se ha subido correctamente.";
        } else {
            echo "<br>Hubo un error al subir el archivo.";
        }
    }
} else {
    // Si el archivo no es una imagen, muestra un mensaje de error
    echo "<br>El archivo no es una imagen.";
}
?>
