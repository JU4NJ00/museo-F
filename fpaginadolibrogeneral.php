<?php
require_once "conexion.php";
function contar_registros($conex){

$sql="SELECT count(idlibro) AS cantidad_total FROM inventariolibros where activo=1 ORDER BY idlibro;";
   
//die($sql);
   $result=mysqli_query($conex,$sql);
   $fila=mysqli_fetch_assoc($result);
   return $fila['cantidad_total'];
}



function registros_porpagina($conex,$pag){

    $sql="SELECT * FROM inventariolibros LIMIT ".($pag*10).",10";
    $result=mysqli_query($conex,$sql);
    return $result;
}

?>