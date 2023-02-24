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

    $sql="SELECT * FROM inventariolibros where activo=1 LIMIT ".($pag*5).",5";
    $result=mysqli_query($conex,$sql);
    return $result;
}

function contar_registrosBUSCADOR($conex,$clavebusqueda){

    $sql="SELECT count(idlibro) AS cantidad_total FROM inventariolibros where autor like '%$clavebusqueda%' or nomdonante like '%$clavebusqueda%' or modoadquisicion like '%$clavebusqueda%' and activo=1 ORDER BY idlibro;";
       
    //die($sql);
       $result=mysqli_query($conex,$sql);
       $fila=mysqli_fetch_assoc($result);
       return $fila['cantidad_total'];
    }

function registros_porpaginaBUSCADOR($conex,$pag,$clavebusqueda){

    $sql="SELECT * FROM inventariolibros WHERE autor like '%$clavebusqueda%' or nomdonante like '%$clavebusqueda%' or modoadquisicion like '%$clavebusqueda%' and activo=1 ORDER BY idlibro";
    $result=mysqli_query($conex,$sql);
    return $result;
}

?>