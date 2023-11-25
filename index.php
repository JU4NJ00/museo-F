<?php
session_start();

// Conexion a la BD
require_once "conexion.php";
include("primero.php");
     
     include('header.php');

   ?>
      
            
    
   <!-- Index.php contiene un Formulario --> 

   
   
  <section class="container-fluid seccion__index">
  <div class="row">
  <div class="col-md-12 mx-auto placa" >


        <h1 class="placa__texto">Sistema de Control de Inventario</h1>

  </div>
   </div>
  <!-- <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="imagenes/carrousel1.png" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>San Cristobal - Santa Fe</h5>
      </div>
    </div>
    <div class="carousel-item">
      <img src="imagenes/carrousel2.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
      </div>
    </div>
    <div class="carousel-item">
      <img src="imagenes/carrousel3.jpg" class="d-block w-100"  alt="...">
      <div class="carousel-caption d-none d-md-block">
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button> -->
<!-- </div> -->
  
    
  



  </section>
  <?php
    include('index_seccion2.php');
  ?>

  <?php
    include('footer.php');
  ?>
   
   <script src="bootstrap/js/bootstrap.bundle.min.js"></script>


</body>

</html>