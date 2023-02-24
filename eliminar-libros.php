<?php

session_start();

require_once "conexion.php";
 $id=$_POST['idlibro'];
$categoria2=$_POST['categoria2'];
 $_SESSION['ids']=$id;
 $sql="UPDATE inventariolibros SET activo=0 WHERE idlibro=$id";    
 $result=mysqli_query($conex,$sql);


header("location:inventariolibros.php?mensaje=borrado");
 ?>   