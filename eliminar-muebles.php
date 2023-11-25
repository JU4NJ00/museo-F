<?php

session_start();
if(isset($_SESSION["dniadmin"])){
	header("location:inicio_admin.php");
}else{
 if(isset($_SESSION["dniencargado"])){
	header("location:inicio_encargado.php");
 }else {header("location:index.php");}}

require_once "conexion.php";
 $id=$_POST['idmuebles'];
 $_SESSION['ids']=$id;
            
 $sql="UPDATE inventariomuebles SET activo=0 WHERE idmuebles=$id";    
 $result=mysqli_query($conex,$sql);   

 //die($sql); 

header("location:inventariomuebles.php?mensaje=borrado")
 ?>   