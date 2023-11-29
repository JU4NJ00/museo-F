<?php
session_start();

if(isset($_SESSION["dniadmin"])){

}else{
 if(isset($_SESSION["dniencargado"])){
	
 }else {header("location:index.php");}}
// Conexion a la BD
require_once "conexion.php";
include("primero.php");
     
     include('header.php');

   ?>
      
      
      <?php

if (!isset($_GET['msje'])){

  // Guarda el id enviado por parámetro en URL, desde listado.php, y lo evalúa con $_GET
  
   $id=$_GET['id'];
   $_SESSION['ids']=$id;

}
$sql="SELECT * FROM inventariolibros WHERE idlibro = $id";

//die($sql);

$result=mysqli_query($conex,$sql); 

$fila=mysqli_fetch_array($result);
               


       ?>
            
    
   <!-- Index.php contiene un Formulario --> 

   
   
  <section>
   
  
  <div class="container mt-2 mb-5">
  <div class="text-center mt-5 mb-2"><h2>Editar inventario</h2></div>	

<div class="row">
  <div class="col-11"></div>
  <div class="col-1 text-right">
  <div class="btn btn-danger btn-sm"> <a class="text-decoration-none text-white" href="inventariolibros.php">Cancelar</a></div>
</div>
  	</div>
  <form class="row g-3" action="editarinventario-libros.php" method="post">
  
  <input type="hidden" class="form-control" name="categoria2" id="categoria2" value="<?php echo $fila['categorialibro_idcategorias'];?>">

  <div class="col-sm-6">
    <label for="autor" class="form-label"> Autor</label>
    <input type="text" class="form-control" name="autor" id="autor" placeholder="Ingresar el autor" value="<?php echo $fila['autor']; ?>" >
  </div>
  <div class="col-sm-6 mb-3">
    <label for="nombre" class="form-label"> Nombre</label>
    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingresar nombre del libro" value="<?php echo $fila['nombre']; ?>" >
  </div>

  <div class="col-sm-6 mb-3">
    <label for="nombre" class="form-label">Imagen</label>
    <?php if ($fila['nomImg']) { ?>
        <img src="./imagenes/<?php echo $fila['nomImg']; ?>" alt="Imagen existente" class="img-thumbnail">
    <?php } else { ?>
        <b>no encontrada</b>
    <?php } ?>
    <input type="file" class="form-control" name="imagen" id="imagen" placeholder="Subir imagen">
</div>


  <div class="col-sm-6 mb-3">
    <label for="editorial" class="form-label"> Editorial</label>
    <input type="text" class="form-control" name="editorial" id="editorial" placeholder="Ingresar editorial" value="<?php echo $fila['editorial']; ?>">
  </div>
   <div class="col-sm-6 mb-3">
    <label for="fechaedicion" class="form-label"> Fecha de edicion</label>
    <input type="date" class="form-control" name="fechaedicion" id="fechaedicion" placeholder="Ingresar fecha de edicion" value="<?php echo $fila['fechaedicion']; ?>">
  </div>

  <div class="col-sm-6 mb-3">
    <label for="lugar" class="form-label"> Lugar</label>
    <input type="text" class="form-control" name="lugar" id="lugar" placeholder="Ingresar lugar" value="<?php echo $fila['lugar']; ?>" >
  </div>

  <div class="col-sm-6 mb-3">
    <label for="paginas" class="form-label"> Paginas</label>
    <input type="int" class="form-control" name="paginas" id="paginas" placeholder="Ingresar paginas" value="<?php echo $fila['paginas']; ?>">
  </div>

  <div class="col-sm-6 mb-3">
  <label for="modoadquisicion" class="form-label">Modo de adquisicion</label>
    <select class="form-control" name="modoadquisicion" id="modoadquisicion" required>
      <option <?php if ($fila['modoadquisicion']=='Donacion'){echo "selected";}?> value="Donacion">Donacion</option>
    </select>
  </div>

  <div class="col-sm-6 mb-3">
    <label for="nomdonante" class="form-label"> Nombre del donante</label>
    <input type="text" class="form-control" name="nomdonante" id="nomdonante" placeholder="Ingresar nombre del donante" value="<?php echo $fila['nomdonante']; ?>">
  </div>

  <div class="col-sm-6 mb-3">
    <label for="fechaingreso" class="form-label"> Fecha de ingreso</label>
    <input type="date" class="form-control" name="fechaingreso" id="fechaingreso" placeholder="Ingresar fecha de ingreso " value="<?php echo $fila['fechaingreso']; ?>">
  </div>

  

  <div class="col-sm-6 mb-3">
    <label for="descripcion" class="form-label"> Descripcion</label>
    <textarea class="form-control" name="descripcion" id="descripcion" placeholder="Datos descriptivos" cols="10" rows="3"><?php echo $fila['descripcion']; ?></textarea>

    
  </div>

  <div class="col-sm-6 mb-3">
    <label for="procedencia" class="form-label"> Procedencia</label>
    <input type="text" class="form-control" name="procedencia" id="procedencia" placeholder="Ingresa tu Correo Electrónico" value="<?php echo $fila['procedencia']; ?>">
  </div>



  <div class="col-sm-6 mb-3">
  <label for="estado" class="form-label">Estado de Conservacion</label>
    <select class="form-control" name="estado" id="estado" required>
      <option <?php if ($fila['estado']=='Excelente'){echo "selected";}?> value="Excelente">Excelente</option>
      <option <?php if ($fila['estado']=='Buen estado'){echo "selected";}?> value="Buen estado">Buen estado</option>
      <option <?php if ($fila['estado']=='Mal estado'){echo "selected";}?> value="Mal estado">Mal estado</option>
    </select>
  </div> 


<div class="col-sm-6 mb-3">
  <label for="categoria" class="form-label">Categoria secundaria</label>
    <select class="form-control" name="categoria" id="categoria" required>
      <option <?php if ($fila['categorialibro_idcategorias']==1){echo "selected";}?> value="1">Historia Ferrocarril</option>
      <option <?php if ($fila['categorialibro_idcategorias']==2){echo "selected";}?> value="2">Talleres</option>
      <option <?php if ($fila['categorialibro_idcategorias']==3){echo "selected";}?> value="3">Varios</option>
    </select>
  </div>  
  <div class="col-sm-6 mb-3">
  </div>
  <div class="col-12 text-center">
  <button type="submit" class="btn btn-primary" name="enviar" id="enviar">Enviar</button>
  
  </div>
  
  </form>
   
    
  <?php
    
    // Uso de GET para mostrar Mensaje resultante 

    if (isset($_GET["mensaje"])){

    	 if($_GET["mensaje"]!="ok"){

         echo "<div class='text-center mt-4 mb-5'><div class='alert alert-danger' role='alert'><strong>".$_GET["mensaje"]."</strong></div></div>"; 
         
       }else{

        $tiempo_espera = 3;
         header("refresh: $tiempo_espera; url=http://localhost/museo2/inventariomuebles.php");
         
         echo "<div class='text-center mt-4 mb-5'><div class='alert alert-success' role='alert'><strong>".$_GET["mensaje"]."</strong></div></div>";  
       
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