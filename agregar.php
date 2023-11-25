<?php
session_start();
if (isset($_SESSION['dniadmin'])){
 } else{
  if(isset($_SESSION["dniencargado"])){
    header("location:inicio_encargado.php");
  }else {header("location:index.php");}}
 
// Conexion a la BD
require_once "conexion.php";



 include "primero.php";
 
   
     
     include('header.php');

   ?>
      
            
    
   <!-- Index.php contiene un Formulario --> 

   
   
  <section>
   
  <div>

  <?php
    
    // Uso de GET para mostrar Mensaje resultante 

    if (isset($_GET["mensaje"])){

    	 if($_GET["mensaje"]!="ok"){

         echo "<div class='text-center mt-4 mb-5'><div class='alert alert-danger' role='alert'><strong>".$_GET["mensaje"]."</strong></div></div>"; 
         
       }else{

        $tiempo_espera = 3;
         header("refresh: $tiempo_espera; url=http://localhost/proyectomuseo/listado.php");
         
         echo "<div class='text-center mt-4 mb-5'><div class='alert alert-success' role='alert'><strong>".$_GET["mensaje"]."</strong></div></div>";  
       
       }  
  } 
  ?> 

  </div>
  
  <div class="container mt-2 mb-5">
  <div class="text-center mt-5 mb-2"><h2>Datos Personales</h2></div>	
  <div class="text-secondary"><p><small>Datos Obligatorios</small></p></div>
  	
  <form class="row g-3" action="insertar_datos.php" method="post">
  
  <div class="col-sm-6">
    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingresa tu Nombre" required>
  </div>
  <div class="col-sm-6 mb-3">
    <label for="apellido" class="form-label">Apellido</label>
    <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Ingresa tu Apellido" required>
  </div>
  <div class="col-sm-6 mb-3">
    <label for="telefono" class="form-label">Telefono</label>
    <input type="number" class="form-control" name="telefono" id="telefono" placeholder="Ingresa tu telefono" required>
  </div>
   <div class="col-sm-6 mb-3">
    <label for="dni" class="form-label">DNI</label>
    <input type="number" class="form-control" name="dni" id="dni" placeholder="Ingresa DNI de 8 dígitos numéricos" required>
  </div>

  <div class="col-sm-6 mb-3">
    <label for="fecha" class="form-label">Fecha de alta</label>
    <input type="date" class="form-control" name="fecha" id="fecha" placeholder="Ingresa tu fecha de nacimiento" required>
  </div>
  <div class="col-sm-6 mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="text" class="form-control" name="email" id="email" placeholder="Ingresa tu Correo Electrónico" required>
  </div>
  <div class="col-sm-6 mb-3">
    <label for="pass" class="form-label">Clave</label>
    <input type="password" class="form-control" name="pass" id="pass" placeholder="Ingresa una clave de 8 caracteres como mínimo" required>
  </div>    
 

  <div class="col-sm-6 mb-3">
  <label for="tipousuario" class="form-label">Tipo de Usuario</label>
    <select class="form-control" name="tipo" id="tipo" required>
      <option value="">Selecciona un rol</option>
      <option value="1">Administrador</option>
      <option value="2">Encargado</option>
    </select>
  <div class="col-sm-6 mb-3">
  

</div>
  <div class="col-12 text-center">
  <button type="submit" class="btn btn-primary" name="enviar" id="enviar">Enviar</button>
  
  </div>
  
  </form>
   
    
 
  



  </section>

  <?php
    include('footer.php');
  ?>
   
   <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>