<?php
session_start();
if (!isset($_SESSION['dniadmin'])){
    header("location:inicio_encargado.php");
   }
include ('conexion.php');



$dni=$_POST["dni"];
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
        header("location:inicio_admin.php");
    }else if($fila['tipodeusuario']==2){
        $_SESSION["dniencargado"]=$dni;
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