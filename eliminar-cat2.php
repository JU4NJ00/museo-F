<?php

session_start();

require_once "conexion.php";
 $id=$_POST['idcategorias'];
 $sql="DELETE FROM categorialibro WHERE idcategorias=$id";    
 $result=mysqli_query($conex,$sql);


header("location:categoriaLibros.php?mensaje=borrado");
 ?>   