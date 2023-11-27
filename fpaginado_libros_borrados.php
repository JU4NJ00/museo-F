<?php
require_once "conexion.php";


function contar_registros($conex,$clavebusqueda){
    if($clavebusqueda=='' || $clavebusqueda==" "){

        $sql="SELECT count(idlibro) AS cantidad_total FROM inventariolibros where activo=0 ORDER BY idlibro;";
   
//die($sql);
   $result=mysqli_query($conex,$sql);
   $fila=mysqli_fetch_assoc($result);
   return $fila['cantidad_total'];
    }else{
    $sql="SELECT count(idlibro) AS cantidad_total FROM inventariolibros where autor like '%$clavebusqueda%' or nomdonante like '%$clavebusqueda%' or modoadquisicion like '%$clavebusqueda%' and activo=0 ORDER BY idlibro;";
       
    //die($sql);
       $result=mysqli_query($conex,$sql);
       $fila=mysqli_fetch_assoc($result);
       return $fila['cantidad_total'];
    }
}
function registros_porpagina($conex, $pag, $clavebusqueda)
{
    if ($clavebusqueda == '' || $clavebusqueda == " ") {
        $sql = "SELECT * FROM inventariolibros WHERE activo=0 LIMIT " . ($pag * 5) . ",5";
        $result = mysqli_query($conex, $sql);
        return $result;
    } else {
        $sql = "SELECT * FROM inventariolibros WHERE autor LIKE '%$clavebusqueda%' OR nomdonante LIKE '%$clavebusqueda%' OR modoadquisicion LIKE '%$clavebusqueda%' AND activo=0 LIMIT " . ($pag * 5) . ",5";
        $result = mysqli_query($conex, $sql);
        return $result;
    }
}


?>