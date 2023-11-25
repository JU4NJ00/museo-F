<?php

// Conexion a la Base de Datos Biblioteca 
session_start();
if(isset($_SESSION["dniadmin"])){

}else{
 if(isset($_SESSION["dniencargado"])){
	header("location:inicio_encargado.php");
 }else {header("location:index.php");}}


require_once "conexion.php";

    
     // recibimos el ID enviado por get desde categorialibros.php

     $id=$_GET['id'];
  

$sql="SELECT * FROM categoria where idcategoriaboss= $id";

//die($sql);

$result=mysqli_query($conex,$sql); 

$fila=mysqli_fetch_array($result);
        
?>


<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Eliminar Categoria</title>
   <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="css/style.css">
</head>
<body>


  <?php
    
    include("primero.php");
    include('header.php');

  ?>

  
 <section>
 
 <div class="container mt-2 mb-5">
 <div class="text-center my-5 text-primary"><h2>Eliminar categoria principal</h2></div>	
       
 <form class="row g-3" action="eliminar-categoriaboss.php" method="post">
 <input type="hidden" class="form-control" name="idcategorias" id="idcategorias" value="<?php echo $fila['idcategoriaboss'];?>">
 <div class="col-sm-12">
    <label for="categoria" class="form-label"> Nombre</label>
    <input type="text" class="form-control" name="categoria" id="categoria" placeholder="Ingresar nombre de categoria" value="<?php echo $fila['nombre']; ?>" disabled>
  </div>

  <div class="col-sm-6 mb-3">
</div>

 
 <div class="col-12 text-center">
    <div> <h5>¿Estas segur@ que quieres eliminar esta categoria?</h5>
        <br>
 <button type="submit" class="btn btn-danger btn-sm">Confirmar</button>
 <a class="btn btn-success btn-sm ms-2" href="categoriaMuebles.php" role="button">Cancelar</a>
 </div>
 
 </form>
  

</section>

 <?php
   include('footer.php');
 ?>

<script src="bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>