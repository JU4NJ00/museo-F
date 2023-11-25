<?php
session_start();
if(isset($_SESSION["dniadmin"])){

}else{
 if(isset($_SESSION["dniencargado"])){
	header("location:inicio_encargado.php");
 }else {header("location:index.php");}}

// Conexion a la BD
require_once "conexion.php";


include ("primero.php");
     
     include('header.php');

   ?>

  <section>
   
  
  <div class="container mt-2 mb-5 ">
  <div class="text-center mt-5 mb-2"><h2>Agregar categoria</h2></div>	
  
  	
  <form class="row g-3 justify-content-center" action="insertarcat2.php" method="post">

  <div class="col-sm-6 ">
    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese nombre" required>
  </div>

  
  <!-- <div class="col-sm-2 mb-3"> -->
  
</div>
  <div class="col-12 text-center">
  <button type="submit" class="btn btn-primary" name="" id="">Enviar</button>
  
  </div>
  
  </form>
   
    
  </section>

  <?php
    include('footer.php');
  ?>
   
   <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>