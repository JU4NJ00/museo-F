<?php
session_start();
if(isset($_SESSION["dniadmin"])){
	header("location:index.php");
}else{
 if(isset($_SESSION["dniencargado"])){
	header("location:index.php");
 }else {header("location:index.php");}}
// Conexion a la Base de Datos Biblioteca 

 require_once "conexion.php";
 require_once "fpaginado.php";
 
 $cantmax=0;

 // Se evalúa si se ha realizado clic en el botón Buscar y si 
 // el valor o clave buscada es distinto de vacío 
 
 if (isset($_POST['btnbuscar']) && $_POST['clavebuscada']!=''){

     $clavebusqueda=$_POST['clavebuscada'];

     $sql="SELECT * FROM usuarios WHERE apellido like '$clavebusqueda%' or nombre like '$clavebusqueda%' or dni like '$clavebusqueda%' or email like '$clavebusqueda%'";
     //die($sql);
     
     $result=mysqli_query($conex,$sql);

 }else{    

	 //LLamada a funciones de Paginado

	 $cantmax=contar_registros($conex);

	 
	   if (!isset($_GET['pg'])){
	       $pag=0;
	       $result=registros_porpagina($conex,$pag); 
	   }else{
	       $pag=$_GET['pg'];
	       $result=registros_porpagina($conex,$pag);
	   } 
 }

?>