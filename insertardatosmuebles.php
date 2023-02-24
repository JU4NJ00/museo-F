<?php

session_start();


// Conexion a la Base de Datos Biblioteca 

 require_once "conexion.php";

 require_once "funcionesval2.php";

 




$error2 = "";


if(!empty(trim($_POST['designacion'])) && !empty(trim($_POST['modoadquisicion'])) && 
   !empty(trim($_POST['nomdonante'])) && !empty(trim($_POST['fechaing'])) && !empty(trim($_POST['datodescr'])) && !empty(trim($_POST['procedencia'])) && !empty(trim($_POST['estadoconserv']))){
	
         
		$designacion = $_POST['designacion'];
		$modoadquisicion = $_POST['modoadquisicion'];
		$nomdonante = $_POST['nomdonante'];
		$fechaing = $_POST['fechaing'];
		$datodescr =$_POST['datodescr'];
		//Campos agregados
		$procedencia=$_POST['procedencia'];
        $estadoconserv=$_POST['estadoconserv'];
		$categoria=$_POST['categoriaboss'];
		$idusuario=$_SESSION['id'];
		$cont2="UPDATE categoria SET contador=contador+1 WHERE idcategoriaboss=$categoria";
		mysqli_query($conex,$cont2);
		
        //die($sql);
		//agregado
		$cod="SELECT concat(idcategoriaboss,'-',contador,'-',iniciales) as codigo FROM categoria WHERE idcategoriaboss=$categoria";

		$result1=mysqli_query($conex,$cod); $fila=mysqli_fetch_array($result1);
		$codigo=$fila['codigo'];

		//die($cod);
            
        $sql="INSERT INTO inventariomuebles(designacion,modoadquisicion,nomdonante,fechaing,datodescr,procedencia,estadoconserv,categoria_idcategoriaboss,usuarios_idusuario,codigo) VALUES('$designacion','$modoadquisicion','$nomdonante','$fechaing','$datodescr','$procedencia','$estadoconserv','$categoria','$idusuario','$codigo')";

        $result=mysqli_query($conex,$sql);
		//die($sql);



        if ($result){
			
		
             header("Location:inventariomuebles.php?mensaje=agregado");

        }
	
	else{
		header("Location:inventariomuebles.php?mensaje=".$error2);
	}

}
?>
