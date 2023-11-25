<?php
function ValidacionDatos() {

 global $error;

	$var_bool=TRUE;

	// Validar el nombre, apellido, dni, edad, email, clave

	if (!is_string($_POST['nombre']) || !preg_match('/^[a-zA-ZñÑ\s]+$/', $_POST['nombre'])) {
		$error .= "Error Nombre ";
		$var_bool = FALSE;
	}
	
	// Get the
	if (!is_string($_POST['apellido']) || !preg_match('/^[a-zA-ZñÑ\s]+$/', $_POST['apellido'])) {
		$error .= "Error Apellido ";
		$var_bool = FALSE;
	}

	if(preg_match("/[a-zA-Z]/",$_POST['dni']) || strlen($_POST['dni'])<>8){
		$error.="Error DNI ";
		$var_bool=FALSE;
	}
	
	

	
	if(!is_string($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
		$error.="Error Email ";
		$var_bool=FALSE;
	}
	
	if(strlen($_POST['pass'])<8){
		$error.="Error Password ";
		$var_bool=FALSE;
	}
	

	return $var_bool;
}


function validarLogin(){
	$var_bool=TRUE;
	global $error;
	if(preg_match("/[a-zA-Z]/",$_POST['dni']) || strlen($_POST['dni'])<>8){
		$error.="Error DNI ";
		$var_bool=FALSE;
	}
	return $var_bool;
}

function validarBusqueda(){
	$var_bool=TRUE;
	global $error;
	$regex = '/^[^\'"]+$/';

	if(preg_match($regex,$_POST['dni']) || strlen($_POST['dni'])<>8){
		$error.="Error DNI ";
		$var_bool=FALSE;
	}
	return $var_bool;
}


?>
