<?php
session_start();
if(isset($_SESSION["dniadmin"])){
	header("location:inicio_admin.php");
}else{
 if(isset($_SESSION["dniencargado"])){
	header("location:inicio_encargado.php");
 }else {header("location:index.php");}}
// Conexion a la BD
require_once "conexion.php";
require_once "funcion_concatenar.php";
//Funcion de Validacion de Datos




$error = "";

 // Recibe el id oculto desde el form_editar

 $id=$_SESSION['ids'];
  

 

        
        $nombre=$_POST['nombre'];
        $iniciales=concatenar($nombre);
       
        // Se arma la sentencia SQL de Actualización

        $sql="UPDATE categorialibro SET nombre='$nombre', iniciales='$iniciales' WHERE idcategorias=$id";    
        
        // Ejecuta la sentencia

        mysqli_query($conex,$sql);

        //die($sql);

        // Evalúa si se realizó la actualización de algun dato

        if (mysqli_affected_rows($conex)==1){
            header("Location:categoriaLibros.php?mensaje=edit");

        }
	
	
 

?>