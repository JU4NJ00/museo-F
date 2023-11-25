<?php
// Conexion a la Base de Datos Biblioteca 
session_start();
 require_once "conexion.php";

 //Funcion de Validacion de Datos

 require_once "funcionesval.php";

 




$error = "";

if(!empty(trim($_POST['nombre'])) && !empty(trim($_POST['apellido'])) && 
   !empty(trim($_POST['dni'])) && !empty(trim($_POST['email'])) && !empty(trim($_POST['pass'])) && !empty(trim($_POST['fecha'])) && !empty(trim($_POST['telefono'])) && !empty(trim($_POST['tipo']))){
	


	if (ValidacionDatos()){
         
		$nombre = preg_replace('/[^a-zA-ZñÑ\s]+/', '', $_POST['nombre']);
		$apellido = preg_replace('/[^a-zA-ZñÑ\s]+/', '',$_POST['apellido']);
		$dni = $_POST['dni'];
		$email = $_POST['email'];
		//Campos agregados
		$pass =password_hash($_POST['pass'],PASSWORD_DEFAULT);
		$telefono=$_POST['telefono'];
        $fecha=$_POST['fecha'];
		$tipo_usuario=$_POST['tipo' ];
		
            
        $sql="INSERT INTO usuarios(nombre,apellido,dni,fecha_alta,telefono,email,clave,tipodeusuario) VALUES('$nombre','$apellido','$dni','$fecha','$telefono','$email','$pass','$tipo_usuario')";

        $result=mysqli_query($conex,$sql);


        if ($result){
			
		
             header("Location:listado.php?mensaje=ok");

        }else{ 
			//codigo 1062 duplicado
            if(mysqli_errno($conex)==1062){
				$error.="Error, DNI duplicado";
				header("location:agregar.php?mensaje=".$error);
			}else{
            $error.="Error en la Inserción de datos ";
            header("Location:agregar.php?mensaje=".$error);
        }
     
     }
	
	}else{
		header("Location:agregar.php?mensaje=".$error);
	}
}else{

	$error.="Faltan Datos ";
	header("Location:agregar.php?mensaje=".$error);
	
}

  

	

?>
