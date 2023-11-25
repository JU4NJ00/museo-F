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
  

$sql="SELECT * FROM categorialibro where idcategorias= $id";

//die($sql);

$result=mysqli_query($conex,$sql); 

$fila=mysqli_fetch_array($result);
        
include('primero.php');
    include('header.php');

  ?>

  
 <section>
 
 <div class="container mt-2 mb-5">
 <div class="text-center my-5 text-primary"><h2>Eliminar categoria</h2></div>	
       
 <form class="row g-3" action="eliminar-cat2.php" method="post">
 <input type="hidden" class="form-control" name="idcategorias" id="idcategorias" value="<?php echo $fila['idcategorias'];?>">
 <div class="col-sm-12">
    <label for="categoria" class="form-label"> Nombre</label>
    <input type="text" class="form-control" name="categoria" id="categoria" placeholder="Ingresar nombre de categoria" value="<?php echo $fila['nombre']; ?>" disabled>
  </div>

  <div class="col-sm-6 mb-3">
</div>

 
 <div class="col-12 text-center">
    <div> <h5>¿Quieres eliminar esta categoria?</h5>
        <br>
 <button type="submit" class="btn btn-success btn-sm">Confirmar</button>
 <a class="btn btn-danger btn-sm ms-2" href="categoriaLibros.php" role="button">Cancelar</a>
 </div>
 
 </form>
  

</section>

 <?php
   include('footer.php');
 ?>

<script src="bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>