<?php

session_start();
if(isset($_SESSION["dniadmin"])){
	header("location:inicio_admin.php");
}else{
 if(isset($_SESSION["dniencargado"])){
	header("location:inicio_encargado.php");
 }else {header("location:index.php");}}

require_once "conexion.php";
 $id=$_POST['idlibro'];
$categoria2=$_POST['categoria2'];
 $_SESSION['ids']=$id;
 $sql="UPDATE inventariolibros SET activo=0 WHERE idlibro=$id";    
 $result=mysqli_query($conex,$sql);


header("location:inventariolibros.php?mensaje=borrado");
 ?>   