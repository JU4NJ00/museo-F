<?php

session_start();


// Conexion a la Base de Datos Biblioteca 

 require_once "conexion.php";


 




$error2 = "";


if(!empty(trim($_POST['autor'])) && !empty(trim($_POST['nombre'])) && 
   !empty(trim($_POST['editorial'])) && !empty(trim($_POST['fechaedicion'])) && !empty(trim($_POST['lugar'])) && !empty(trim($_POST['paginas'])) && !empty(trim($_POST['modoadquisicion'])) && !empty(trim($_POST['nomdonante'])) && !empty(trim($_POST['fechaingreso'])) && !empty(trim($_POST['descripcion'])) && !empty(trim($_POST['procedencia'])) && !empty(trim($_POST['estado'])));{
	
         
	$autor=$_POST['autor'];
	$nombre=$_POST['nombre'];
	$editorial=$_POST['editorial'];
	$fechaedicion=$_POST['fechaedicion'];
	$lugar=$_POST['lugar'];
	//Campos agregados
	$paginas=$_POST['paginas'];
	$modoadquisicion=$_POST['modoadquisicion'];
	$nomdonante=$_POST['nomdonante'];
	$fechaingreso=$_POST['fechaingreso'];
	$descripcion= $_POST['descripcion'];
	$procedencia= $_POST['procedencia'];
	$estado=$_POST['estado'];
	$categoriaboss=2;
	$categoria=$_POST['categoria'];
    $idusuarrio=$_SESSION['id'];

	//contador de las categorias
	$cont="UPDATE categorialibro SET contador=contador+1 WHERE idcategorias=$categoria";
	mysqli_query($conex,$cont);

	$cont2="UPDATE categoria SET contador=contador+1 WHERE idcategoriaboss=$categoriaboss";
	mysqli_query($conex,$cont2);

	//codigo propio
	$cod="SELECT concat($categoriaboss,'-',contador,'-',iniciales) as codigo FROM categorialibro WHERE idcategorias=$categoria";

	$result1=mysqli_query($conex,$cod); $fila=mysqli_fetch_array($result1);
	$codigo=$fila['codigo'];

            
        $sql="INSERT INTO inventariolibros(autor,nombre,editorial,fechaedicion,lugar,paginas,modoadquisicion,nomdonante,fechaingreso,descripcion,procedencia,estado,categoria_idcategoriaboss, categorialibro_idcategorias,usuarios_idusuario,codigo) VALUES('$autor','$nombre','$editorial','$fechaedicion','$lugar','$paginas','$modoadquisicion','$nomdonante','$fechaingreso','$descripcion','$procedencia','$estado','$categoriaboss','$categoria','$idusuarrio','$codigo')";

        $result=mysqli_query($conex,$sql);


        //die($sql);


        if ($result){
			
            header("Location:inventariolibros.php?mensaje=agregado");

        }
	
	else{
		header("Location:inventariolibros.php?mensaje=".$error2);
	}
}
?>
