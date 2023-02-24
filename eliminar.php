<?php

session_start();

require_once "conexion.php";
 $id=$_POST['idusuario'];

 $_SESSION['ids']=$id;
            
 $sql="DELETE FROM usuarios WHERE idusuario=$id";    
        
 mysqli_query($conex,$sql);

 //die($sql); 

header("location:listado.php")
 ?>   