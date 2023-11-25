<?php
require_once "conexion.php";


function contar_registros($conex,$clavebusqueda){
    if($clavebusqueda=='' || $clavebusqueda==" "){

        $sql="SELECT count(idmuebles) AS cantidad_total FROM inventariomuebles where activo=1 ORDER BY idmuebles;";

//die($sql);
   $result=mysqli_query($conex,$sql);
   $fila=mysqli_fetch_assoc($result);
   return $fila['cantidad_total'];
    }else{
        $sql="SELECT count(idmuebles) AS cantidad_total FROM inventariomuebles where designacion like '%$clavebusqueda%' or nomdonante like '%$clavebusqueda%' or estadoconserv like '%$clavebusqueda%' or modoadquisicion like '%$clavebusqueda%' and activo=1 ORDER BY idmuebles;";
    //die($sql);

       $result=mysqli_query($conex,$sql);
       $fila=mysqli_fetch_assoc($result);
       return $fila['cantidad_total'];
    }
}
function registros_porpagina($conex,$pag,$clavebusqueda){

    if($clavebusqueda=='' || $clavebusqueda==" "){
        $sql="SELECT * FROM inventariomuebles where activo=1 LIMIT ".($pag*5).",5";
        $result=mysqli_query($conex,$sql);
        return $result;
        
    }else{
     ;
    $sql="SELECT * FROM inventariomuebles WHERE designacion like '%$clavebusqueda%' or nomdonante like '%$clavebusqueda%' or estadoconserv like '%$clavebusqueda%' or modoadquisicion like '%$clavebusqueda' and activo=1 LIMIT ".($pag*5).",5";
    $result=mysqli_query($conex,$sql);
    return $result;}
}

?>