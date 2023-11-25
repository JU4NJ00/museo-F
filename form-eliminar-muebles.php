<?php

// Conexion a la Base de Datos Biblioteca 
 
session_start();
if(isset($_SESSION["dniadmin"])){
	
}else{
 if(isset($_SESSION["dniencargado"])){
	
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

$sql="SELECT * FROM inventariomuebles where idmuebles= $id";

//die($sql);

$result=mysqli_query($conex,$sql); 

$fila=mysqli_fetch_array($result);
        
include('primero.php');
    include('header.php');

  ?>

  
 <section>
 
 <div class="container mt-2 mb-5">
 <div class="text-center my-5 text-primary"><h2>Eliminar elemento del inventario</h2></div>	

 <div class="row">
  <div class="col-11"></div>
  <div class="col-1 text-right">
  <div class="btn btn-danger btn-sm"> <a class="text-decoration-none text-white" href="inventariomuebles.php">Cancelar</a></div>
</div>

 <form class="row g-3" action="eliminar-muebles.php" method="post">

 <input type="hidden" class="form-control" name="idmuebles" id="idmuebles" value="<?php echo $fila['idmuebles'];?>">
 <!-- mandamos la categoria principal al eliminar-muebles.php -->
 <input type="hidden" class="form-control" name="categoria1" id="categoria1" value="<?php echo $fila['categoria_idcategoriaboss'];?>">

 <div class="col-sm-6">
    <label for="designacion" class="form-label"> Designacion</label>
    <input type="text" class="form-control" name="designacion" id="designacion" value="<?php echo $fila['designacion']; ?>" disabled>
  </div>
  <div class="col-sm-6 mb-3">
    <label for="modoadquisicion" class="form-label"> Modo de Adquisicion</label>
    <input type="text" class="form-control" name="modoadquisicion" id="modoadquisicion" value="<?php echo $fila['modoadquisicion']; ?>" disabled>
  </div>
  <div class="col-sm-6 mb-3">
    <label for="nomdonante" class="form-label"> Nombre de Donante</label>
    <input type="text" class="form-control" name="nomdonante" id="nomdonante" value="<?php echo $fila['nomdonante']; ?>" disabled>
  </div>
   <div class="col-sm-6 mb-3">
    <label for="fechaing" class="form-label"> Fecha de Ingreso</label>
    <input type="date" class="form-control" name="fechaing" id="fechaing" value="<?php echo $fila['fechaing']; ?>" disabled>
  </div>

  <div class="col-sm-6 mb-3">
    <label for="datodescr" class="form-label"> Datos Descriptivos</label>
    <textarea class="form-control" name="datodescr" id="datodescr" placeholder="Datos descriptivos" cols="10" rows="3" disabled><?php echo $fila['datodescr']; ?></textarea>
  </div>

  <div class="col-sm-6 mb-3">
    <label for="procedencia" class="form-label"> Procedencia</label>
    <input type="text" class="form-control" name="procedencia" id="procedencia" placeholder="Ingresa tu Correo Electrónico" value="<?php echo $fila['procedencia']; ?>" disabled>
  </div>

  <div class="col-sm-6 mb-3">
    <label for="estadoconserv" class="form-label"> Estado de Conservacion</label>
    <input type="text" class="form-control" name="estadoconserv" id="estadoconserv" value="<?php echo $fila['estadoconserv']; ?>" disabled>
  </div>    
  
  <div class="col-sm-6 mb-3">
  <label for="categoriaboss" class="form-label">Categoria</label>
    <select class="form-control" name="categoriaboss" id="categoriaboss" disabled>

      <option <?php if ($fila['categoria_idcategoriaboss']==1){echo "selected";}?> value=1>Muebles</option>
      <option <?php if ($fila['categoria_idcategoriaboss']==3){echo "selected";}?> value=3>Elementos Ferroviarios</option>
    </select>
  </div>    

  <div class="col-sm-6 mb-3">

</div>

 
 <div class="col-12 text-center">
    <div> <h5> ¿Estas segur@ que quieres eliminar a este elemento?</h5>
        <br>
 <button type="submit" class="btn btn-success btn-sm">Confirmar</button>

 </div>
 
 </form>
  

  <?php
   
   // Uso de GET para mostrar Mensaje resultante de la operacion de Actualizacion

   if (isset($_GET["msje"])){

      if($_GET["msje"]!="ok"){

        echo "<div class='text-center mt-4 mb-5'><div class='alert alert-danger' role='alert'><strong>".$_GET["msje"]."</strong><a href='inventariomuebles.php' class='text-primary ms-3'>Volver al Listado</a></div></div>"; 
        
      }else{

              
        echo "<div class='text-center mt-4 mb-5'><div class='alert alert-success' role='alert'><strong>"."Actualización Exitosa!"."</strong><a href='inventariomuebles.php' class='text-primary ms-3'>Volver al Listado</a></div></div>";  
      
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