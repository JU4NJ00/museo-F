<?php
function ValidacionDatos2() {

 global $error2;

	$var_bool2=TRUE;

	// Validar el nombre, apellido, dni, edad, email, clave

	if(!is_string($_POST['designacion']) || !preg_match("/^[a-zA-Z ]+$/", $_POST['designacion'])){
		$error2.="Error designacion ";
		$var_bool2=FALSE;
	}
	
	if(!is_string($_POST['modoadquisicion']) || !preg_match("/^[a-zA-Z ]+$/", $_POST['modoadquisicion'])){
		$error2.=" Error modoadquisicion ";
		$var_bool2=FALSE;
	}

	if(!is_string($_POST['nomdonante']) || !preg_match("/^[a-zA-Z ]+$/", $_POST['nomdonante'])){
		$error2.=" Error nombre de donante ";
		$var_bool2=FALSE;
	}

	if(!is_string($_POST['datodescr']) || !preg_match("/^[a-zA-Z ]+$/", $_POST['datodescr'])){
		$error2.=" Error en datos de descripcion ";
		$var_bool2=FALSE;
	}    

    if(!is_string($_POST['procedencia']) || !preg_match("/^[a-zA-Z ]+$/", $_POST['procedencia'])){
		$error2.=" Error en procedencia ";
		$var_bool2=FALSE;
	}    
	
    if(!is_string($_POST['estadoconserv']) || !preg_match("/^[a-zA-Z ]+$/", $_POST['estadoconserv'])){
		$error2.=" Error estado de conservacion invalido ";
		$var_bool2=FALSE;
	}    
	

	return $var_bool2;
}

?>