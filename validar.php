<?php
session_start();
include ('conexion.php');
require_once('funcionesval.php');

if (!isset($_SESSION['dniadmin'])){
    header("location:inicio_encargado.php");
   }



if (validarLogin()){
    $dni=$_POST["dni"];
}else{
    $dni=0;
}

$pass=$_POST["pass"];


$sql="SELECT * FROM usuarios WHERE dni='$dni'";
$resultado=mysqli_query($conex,$sql);
//die($sql);
if(mysqli_num_rows($resultado)!==0){ 
    $fila=mysqli_fetch_assoc($resultado);
    $_SESSION['id']=$fila['idusuario'];
  
    if(password_verify($pass,$fila['clave'])){

        $_SESSION['miclave']=$pass;
    if ($fila['tipodeusuario']==1){
        $_SESSION["dniadmin"]=$dni;
        $_SESSION['nomadmin']=$fila['nombre']." ".$fila['apellido'];

        header("location:inicio_admin.php");
    }else if($fila['tipodeusuario']==2){
        $_SESSION["dniencargado"]=$dni;
        $_SESSION['nomencargado']=$fila['nombre']." ".$fila['apellido'];

        header("location:inicio_encargado.php");
    }
 }else{
    header("location:login.php?mensaje=Error usuario o contraseña incorrectos");
}
}
else{
    header("location:login.php?mensaje=Error usuario o contraseña incorrectos");
}

?>