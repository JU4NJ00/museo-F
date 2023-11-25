<?php

// Conexion a la Base de Datos Biblioteca 
 
session_start();
if(isset($_SESSION["dniadmin"])){
	
}else{
 if(isset($_SESSION["dniencargado"])){
	header("location:inicio_encargado.php");
 }else {header("location:index.php");}}

require_once "conexion.php";

/* Si no existe mensaje resultante de actualización (Porque aún no hizo actualizacion) */

if (!isset($_GET['msje'])){

  // Guarda el id enviado por parámetro en URL, desde listado.php, y lo evalúa con $_GET

   $id=$_GET['id'];

}else{
    
     // Guarda la Variable de Sesión ids, creada en el archivo editar.php 

     $id=$_SESSION['ids'];
}     

$sql="SELECT * FROM usuarios where idusuario= $id";

//die($sql);

$result=mysqli_query($conex,$sql); 

$fila=mysqli_fetch_array($result);
        
include('primero.php');
    
    include('header.php');

  ?>

  
 <section>
 
 <div class="container mt-2 mb-5">
 <div class="text-center my-5 text-primary"><h2>eliminar Datos Personales</h2></div>	
       
 <form class="row g-3" action="eliminar.php" method="post">

 <input type="hidden" class="form-control" name="idusuario" id="idusuario" value="<?php echo $fila['idusuario'];?>">
 
 <div class="col-sm-6">
   <label for="nombre" class="form-label">* Nombre</label>
   <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Editar tu Nombre" value="<?php echo $fila['nombre'];?>" disabled>
 </div>
 <div class="col-sm-6 mb-3">
   <label for="apellido" class="form-label">* Apellido</label>
   <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Ingresa tu Apellido" value="<?php echo $fila['apellido'];?>" disabled>
 </div>
 <div class="col-sm-6 mb-3">
   <label for="telefono" class="form-label">* Telefono</label>
   <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Ingresa tu telefono" value="<?php echo $fila['telefono'];?>" disabled>
 </div>
  <div class="col-sm-6 mb-3">
   <label for="dni" class="form-label">* DNI</label>
   <input type="text" class="form-control" name="dni" id="dni" placeholder="Ingresa DNI de 8 dígitos numéricos" value="<?php echo $fila['dni'];?>" disabled>
 </div>

 <div class="col-sm-6 mb-3">
   <label for="fecha" class="form-label">* Fecha de alta</label>
   <input type="date" class="form-control" name="fecha" id="fecha" placeholder="Ingresa tu fecha de nacimiento" value="<?php echo $fila['fecha_alta'];?>" disabled>
 </div>
 <div class="col-sm-6 mb-3">
   <label for="email" class="form-label">* Email</label>
   <input type="email" class="form-control" name="email" id="email" placeholder="Ingresa tu Correo Electrónico" value="<?php echo $fila['email'];?>" disabled>
 </div>
 <div class="col-sm-6 mb-3" hidden>
   <label for="clave" class="form-label">* Clave</label>
   <input type="text" class="form-control" name="pass" id="pass" placeholder="Ingresa una clave de 8 caracteres como mínimo" value="<?php echo $fila['clave']; ?>" disabled>
 </div>    
 <div class="col-12 text-center">
    <div> <h5> ¿Estas seguro que quieres eliminar este usuario?</h5>
        <br>
 <button type="submit" class="btn btn-primary btn-sm" name="btn_editar" id="editar">Confirmar</button>
 <a class="btn btn-success btn-sm ms-2" href="listado.php" role="button">Cancelar</a>
 </div>
 
 </form>
  

  <?php
   
   // Uso de GET para mostrar Mensaje resultante de la operacion de Actualizacion

   if (isset($_GET["msje"])){

      if($_GET["msje"]!="ok"){

        echo "<div class='text-center mt-4 mb-5'><div class='alert alert-danger' role='alert'><strong>".$_GET["msje"]."</strong><a href='listado.php' class='text-primary ms-3'>Volver al Listado</a></div></div>"; 
        
      }else{

              
        echo "<div class='text-center mt-4 mb-5'><div class='alert alert-success' role='alert'><strong>"."Actualización Exitosa!"."</strong><a href='listado.php' class='text-primary ms-3'>Volver al Listado</a></div></div>";  
      
      }  
 } 
 ?> 

</section>

 <?php
   include('footer.php');
 ?>

<script src="bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>