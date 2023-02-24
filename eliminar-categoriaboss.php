<?php

session_start();

require_once "conexion.php";
 $id=$_POST['idcategorias'];
 $sql="DELETE FROM categoria WHERE idcategoriaboss=$id";    
 $result=mysqli_query($conex,$sql);


header("location:categoriaMuebles.php?mensaje=borrado");
 ?>   