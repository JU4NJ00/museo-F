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
$sql="SELECT * FROM inventariomuebles WHERE idmuebles = $id";


//die($sql);

$result=mysqli_query($conex,$sql); 
$fila=mysqli_fetch_array($result);

$cat=$fila['categoria_idcategoriaboss'];    

$sql2="SELECT categoria.nombre from categoria INNER JOIN inventariomuebles on categoria.idcategoriaboss=inventariomuebles.categoria_idcategoriaboss where categoria.idcategoriaboss=$cat";
$result2=mysqli_query($conex,$sql2); 
$fila2=mysqli_fetch_array($result2);


       ?>
            
    
   <!-- Index.php contiene un Formulario --> 

   
   
  <section>
   
  
  <div class="container mt-2 mb-5">
  <div class="text-center mt-5 mb-2"><h2>editar inventario</h2></div>	
  <div class="row">
  <div class="col-11"></div>
  <div class="col-1 text-right">
  <div class="btn btn-danger btn-sm"> <a class="text-decoration-none text-white" href="inventariomuebles.php">Cancelar</a></div>
</div>
  	
  <form class="row g-3" action="editarinventario.php" method="post">
  
  <!-- mandamos la categoria vieja a editarinventario.php -->
  <input type="hidden" class="form-control" name="categoria2" id="categoria2" value="<?php echo $fila['categoria_idcategoriaboss'];?>">

  <div class="col-sm-6">
    <label for="designacion" class="form-label"> Designacion</label>
    <input type="text" class="form-control" name="designacion" id="designacion" placeholder="Ingresa tu Nombre" value="<?php echo $fila['designacion']; ?>" >
  </div>


  <div class="col-sm-6 mb-3">
  <label for="modoadquisicion" class="form-label">Modo de adquisicion</label>
    <select class="form-control" name="modoadquisicion" id="modoadquisicion" required>
      <option <?php if ($fila['modoadquisicion']=='Donacion'){echo "selected";}?> value="Donacion">Donacion</option>
    </select>
  </div> 


  <div class="col-sm-6 mb-3">
    <label for="nomdonante" class="form-label"> Nombre de Donante</label>
    <input type="text" class="form-control" name="nomdonante" id="nomdonante" placeholder="Nombre del donante" value="<?php echo $fila['nomdonante']; ?>">
  </div>
   <div class="col-sm-6 mb-3">
    <label for="fechaing" class="form-label"> Fecha de Ingreso</label>
    <input type="date" class="form-control" name="fechaing" id="fechaing" placeholder="Fecha de ingreso" value="<?php echo $fila['fechaing']; ?>">
  </div>

  <div class="col-sm-6 mb-3">
    <label for="datodescr" class="form-label"> Datos Descriptivos</label>

    <textarea class="form-control" name="datodescr" id="datodescr" placeholder="Datos descriptivos" cols="10" rows="3"><?php echo $fila['datodescr']; ?></textarea>

    <!-- <input type="text" class="form-control" name="datodescr" id="datodescr" placeholder="Ingresa tu fecha de nacimiento" value=" <?//php echo $fila['datodescr']; ?>" > -->

  </div>
  <div class="col-sm-6 mb-3">
    <label for="procedencia" class="form-label"> Procedencia</label>
    <input type="text" class="form-control" name="procedencia" id="procedencia" placeholder="Procedencia" value="<?php echo $fila['procedencia']; ?>">
  </div>



  <div class="col-sm-6 mb-3">
  <label for="estadoconserv" class="form-label">Estado de Conservacion</label>
    <select class="form-control" name="estadoconserv" id="estadoconserv" required>
      <option <?php if ($fila['estadoconserv']=='Excelente'){echo "selected";}?> value="Excelente">Excelente</option>
      <option <?php if ($fila['estadoconserv']=='Buen estado'){echo "selected";}?> value="Buen estado">Buen estado</option>
      <option <?php if ($fila['estadoconserv']=='Mal estado'){echo "selected";}?> value="Mal estado">Mal estado</option>
    </select>
  </div> 

  <div class="col-sm-6 mb-3">
    <label for="codigo" class="form-label">Codigo</label>
    <input type="text" class="form-control" name="codigo" id="codigo" value="<?php echo $fila['codigo']; ?>" disabled>
  </div>

  <div class="col-sm-6 mb-3">
  <label for="categoriaboss" class="form-label">Categoria</label>
    <select class="form-control" name="categoriaboss" id="categoriaboss" required>

      <option <?php if ($fila['categoria_idcategoriaboss']==1){echo "selected";}?> value=1>Muebles</option>
      <option <?php if ($fila['categoria_idcategoriaboss']==3){echo "selected";}?> value=3>Elementos Ferroviarios</option>
    </select>
  </div>  

  <div class="col-sm-6 mb-3">
  

</div>
  <div class="col-12 text-center">
  <button type="submit" class="btn btn-success" name="enviar" id="enviar">Confirmar</button>
  
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