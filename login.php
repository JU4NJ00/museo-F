<?php
 session_start();
 if (isset($_SESSION['dniadmin'])){
  header("location:listado.php");
 } else {
  if (isset($_SESSION["dniencargado"])){
    header("location:agregar.php");
  }
 }
include("primero.php");
     
     include('header.php');

   ?>
      
            
    
   <!-- Index.php contiene un Formulario --> 

   
   
  <section class="container ">
   <div class="row justify-content-center">
    <div class="col-6 formulario">
    

      
                      <form action="validar.php" method="POST">
                        <?php    
                  if (isset($_GET["mensaje"])){

                    if($_GET["mensaje"]!="ok"){
             
                      echo "<div class='text-center mt-4 mb-5'><div class='alert alert-danger' role='alert'><strong>".$_GET["mensaje"]."</strong></div></div>"; 
                      
                    }
               }
                  ?>
                    
        <div class="mb-3">
          <label for="dni" class="form-label">Ingrese su DNI</label>
          <input type="text" class="form-control" id="dni" name="dni" aria-describedby="emailHelp" placeholder="">
          
        </div>
        <div class="mb-3">
          <label for="pass" class="form-label">Ingrese su contraseña</label>
          <input type="password" class="form-control" id="pass" name="pass">
        </div>
        
        <button type="submit" class="btn btn-primary" name="ingresar">Ingresar</button>
      </form>
    </div>
   </div>

   <?php
      
   ?>


  </section>

  <?php
    include('footer.php');
  ?>
   
   <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>