<?php
require_once "conexion.php";
function contar_registros($conex){

$sql="SELECT count(idmuebles) AS cantidad_total FROM inventariomuebles where activo=1 ORDER BY idmuebles;";
   
//die($sql);
   $result=mysqli_query($conex,$sql);
   $fila=mysqli_fetch_assoc($result);
   return $fila['cantidad_total'];
}



function registros_porpagina($conex,$pag){

    $sql="SELECT * FROM inventariomuebles LIMIT ".($pag*10).",10";
    $result=mysqli_query($conex,$sql);
    return $result;
}

?>