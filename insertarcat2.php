<?php

session_start();


// Conexion a la Base de Datos Biblioteca 

 require_once "conexion.php";
 require_once "funcion_concatenar.php";


if(!empty(trim($_POST['nombre'])) ){
	
         
		$nombre= $_POST['nombre'];
        $inicialesunidas=concatenar($nombre);

       

     

            
        $sql="INSERT INTO categorialibro(nombre,iniciales) VALUES('$nombre','$inicialesunidas')";
       
        $result=mysqli_query($conex,$sql);
        // die($sql);

        if ($result){
             header("Location:categoriaLibros.php?mensaje=agregado");

        }


}
?>
