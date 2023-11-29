<?php

require_once "funciones_img.php";

//Tratamiento y validación del archivo subido
$temporal=$_FILES['imagen']['tmp_name'];
$nombre=$_FILES['imagen']['name'];
$tipo = $_FILES['imagen']['type'];
$tamano = $_FILES['imagen']['size'];

 //Se evalúa el archivo de imagen subido en extensión y tamaño
 if ($tipo!='image/jpg' && $tipo!='image/jpeg') {

 	 // Si la imagen no está ok, se genera un mensaje de error
      header("Location:editarinventario-libros.php?msjp=error");
 }else {
 
  /* Si la imágen subida está ok en extension, chequeo tamaño */
    
     $ruta="./imagenes/";

     if ($tamano<=100000){

        // Muevo la imágen directamente a la carpeta imágenes, sin redimensionarla

         move_uploaded_file($temporal,$ruta.$nombre);
     	  
	    // Inserción Exitosa
	     header("Location:editarinventario-libros.php?msjp=ok");
     }else{

		  // Redimensiono la imágen y la sobreescribo en la carpeta

		 move_uploaded_file($temporal,$ruta.$nombre);

		 procesarimg($ruta,$nombre);
			  
	    // Inserción Exitosa
	     header("Location:editarinventario-libros.php?msjp=ok");
	     
    }
}

?>

