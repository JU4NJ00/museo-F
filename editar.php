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

//Funcion de Validacion de Datos

require_once "funcionesval.php";


$error = "";

$id=$_SESSION['ids'];

 

if(!empty(trim($_POST['nombre'])) && !empty(trim($_POST['apellido'])) && 
   !empty(trim($_POST['dni'])) && !empty(trim($_POST['email'])) && !empty(trim($_POST['pass'])) && !empty(trim($_POST['fecha'])) && !empty(trim($_POST['telefono']))){
	

	if (ValidacionDatos()){
         
        
		$nombre = preg_replace('/\s+/',' ',$_POST['nombre']);
		$apellido = preg_replace('/\s+/',' ',$_POST['apellido']);
		$dni = $_POST['dni'];
		$email = $_POST['email'];
		$pass = password_hash($_POST['pass'],PASSWORD_DEFAULT);
		//Campos agregados
		$telefono=$_POST['telefono'];
        $fecha=$_POST['fecha'];
		$tipo=$_POST['tipo'];

       
        // Se arma la sentencia SQL de Actualización
            
        $sql="UPDATE usuarios SET nombre='$nombre',apellido='$apellido',dni='$dni',fecha_alta='$fecha',telefono='$telefono',email='$email',clave='$pass',tipodeusuario='$tipo' WHERE idusuario=$id";    
        
        // Ejecuta la sentencia

        mysqli_query($conex,$sql);
		
        //die($sql);

        // Evalúa si se realizó la actualización de algun dato

        if (mysqli_affected_rows($conex)==1){
 	

            header("Location:listado.php?msje=ok");

        }else{ 
			
            $error.="No se realizó Actualización! ";
	        header("Location:form_editar.php?msje=".$error);
        }
	
	}else{
		header("Location:form_editar.php?msje=".$error);
	}
}else{

	$error.="Faltan Datos ";
	header("Location:listado.php?msje=".$error);
	
}

 

?>