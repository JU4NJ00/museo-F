<?php

session_start();

require_once "conexion.php";
 $id=$_POST['idmuebles'];
 $_SESSION['ids']=$id;
            
 $sql="UPDATE inventariomuebles SET activo=0 WHERE idmuebles=$id";    
 $result=mysqli_query($conex,$sql);   

 //die($sql); 

header("location:inventariomuebles.php?mensaje=borrado")
 ?>   