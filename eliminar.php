<?php
session_start();
if(isset($_SESSION["dniadmin"])){
	header("location:inicio_admin.php");
}else{
 if(isset($_SESSION["dniencargado"])){
	header("location:inicio_encargado.php");
 }else {header("location:index.php");}}

require_once "conexion.php";
 $id=$_POST['idusuario'];

 $_SESSION['ids']=$id;
            
 $sql="DELETE FROM usuarios WHERE idusuario=$id";    
        
 mysqli_query($conex,$sql);

 //die($sql); 

header("location:listado.php")
 ?>   