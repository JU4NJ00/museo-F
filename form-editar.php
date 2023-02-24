<?php
// Conexion a la Base de Datos Biblioteca  
session_start();

require_once "conexion.php";

/* Si no existe mensaje resultante de actualización (Porque aún no hizo actualizacion) */

if (!isset($_GET['msje'])){

  // Guarda el id enviado por parámetro en URL, desde listado.php, y lo evalúa con $_GET

  $id=$_GET['id'];
  $_SESSION['ids']=$id;

}    

$sql="SELECT * FROM usuarios where idusuario = $id";

//die($sql);

$result=mysqli_query($conex,$sql); 

$fila=mysqli_fetch_array($result);

 include ("primero.php");
     
     include('header-volver.php');

   ?>

   
  
  <div class="container mt-2 mb-5">
  <div class="text-center mt-5 mb-2"><h2>Editar datos personales</h2></div>	
  <br>
  <HR>
  <br>
  	
  <form class="row g-3" action="editar.php" method="POST">
  
  <div class="col-sm-6">
    <label for="nombre" class="form-label">* Nombre</label>
    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Editar tu Nombre" value="<?php echo $fila['nombre']; ?>" required>
  </div>
  <div class="col-sm-6 mb-3">
    <label for="apellido" class="form-label">* Apellido</label>
    <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Ingresa tu Apellido" value="<?php echo $fila['apellido']; ?>" required>
  </div>
  <div class="col-sm-6 mb-3">
    <label for="telefono" class="form-label">* Telefono</label>
    <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Ingresa tu telefono" value="<?php echo $fila['telefono']; ?>" required>
  </div>
   <div class="col-sm-6 mb-3">
    <label for="dni" class="form-label">* DNI</label>
    <input type="text" class="form-control" name="dni" id="dni" placeholder="Ingresa DNI de 8 dígitos numéricos" value="<?php echo $fila['dni']; ?>" required>
  </div>
  
  <div class="col-sm-6 mb-3">
    <label for="fecha" class="form-label">* fecha de alta</label>
    <input type="date" class="form-control" name="fecha" id="fecha" placeholder="Ingresa tu fecha de alta" value="<?php echo $fila['fecha_alta']; ?>" required>
  </div>
  <div class="col-sm-6 mb-3">
    <label for="email" class="form-label">* Email</label>
    <input type="text" class="form-control" name="email" id="email" placeholder="Ingresa tu Correo Electrónico" value="<?php echo $fila['email']; ?>" required>
  </div>

  <?php if($_SESSION["dniadmin"] || $_SESSION["dniencargado"]===$fila['dni']) {
      ?>
  <div class="col-sm-6 mb-3">
    <label for="clave" class="form-label">* Clave</label>
    <input type="text" class="form-control" name="pass" id="pass" placeholder="Ingresa una clave de 8 caracteres como mínimo" value="<?php 
    echo $_SESSION['miclave'];?>" required>
  </div>
  <?php  } ?>
  <div class="col-sm-6 mb-3">
    <label for="tipo" class="form-label">* Tipo de usuario</label>
    <input type="text" class="form-control" name="tipo" id="tipo" placeholder="1=Administrador 2=Encargado"  value="<?php echo $fila['tipodeusuario']; ?>" required>
  </div>

  <div class="col-12 text-center">
  <button type="submit" class="btn btn-primary" name="enviar" id="enviar">Actualizar datos</button>
  
  </div>
  
  </form>
   


</body>

</html>