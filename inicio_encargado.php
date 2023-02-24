<?php
  session_start();

 if (!isset($_SESSION["dniencargado"]) && !isset($_SESSION["dniadmin"])){
         header("Location:index.php");      
 }elseif (isset($_SESSION["dniadmin"])){
        header("Location:inicio_admin.php"); 
 } 
   include ("primero.php");
     
     include('header.php');

   ?>
      
            
    
   <!-- Este Archivo Contiene la Bienvenida al Alumno --> 

   
   
  <section>
   
  <div class="container mt-4 mb-1">
  <div class="row">
    <div class="col-12 col-md-6">
      <img src="./imagenes/fotoencargado.jpg" alt="" class="foto_home">
    </div>
  <div class="col-12 col-md-6">
    <h2 class="titulo__parrafo">Menu de encargado</h2>
    <h3>Sistema de inventario</h3>
    <h3>Museo ferroviario San Cristobal</h3>
    <P>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum aut nisi, ducimus porro praesentium aliquid, eum consequuntur nam laborum deleniti delectus fugit. Praesentium, dolore aliquid? Reiciendis eaque quos ullam nesciunt.</P>
  </div>
  </div>
  </div>


  </section>


  <?php
    include('footer.php');
  ?>
   
   <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>