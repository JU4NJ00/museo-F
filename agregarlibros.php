<?php
session_start();
if(isset($_SESSION["dniadmin"])){
}else{
 if(isset($_SESSION["dniencargado"])){
 }else {header("location:index.php");}}
 
// Conexion a la BD
require_once "conexion.php";
$sql="SELECT * FROM categorialibro";
$result=mysqli_query($conex,$sql);
  include('primero.php');
     include('header.php');

   ?>
      
            
    
   <!-- Index.php contiene un Formulario --> 
   
   
   
  <section>
   
  
  <div class="container mt-2 mb-5">
  <div class="text-center mt-5 mb-2"><h2>Agregar Libro</h2></div>	
  


  <form class="row g-3" action="insertardatoslibros.php" method="post" enctype="multipart/form-data">
  
  <div class="col-sm-6">
    <label for="autor" class="form-label">Autor</label>
    <input type="text" class="form-control" name="autor" id="autor" placeholder="Ingresar el autor" required>
  </div>

  <div class="col-sm-6">
    <label for="imagen" class="form-label">Imagen</label>
    <input type="file" class="form-control" name="archivo" id="archivo" >
  </div>

  <div class="col-sm-6 mb-3">
    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingresar nombre del libro" required>
  </div>
  <div class="col-sm-6 mb-3">
    <label for="editorial" class="form-label">Editorial</label>
    <input type="text" class="form-control" name="editorial" id="editorial" placeholder="Ingresar editorial" required>
  </div>
   <div class="col-sm-6 mb-3">
    <label for="fechaedicion" class="form-label">Fecha de edicion</label>
    <input type="date" class="form-control" name="fechaedicion" id="fechaedicion" placeholder="Ingresar fecha de edicion" required>
  </div>

  <div class="col-sm-6 mb-3">
    <label for="lugar" class="form-label">Lugar</label>
    <input type="text" class="form-control" name="lugar" id="lugar" placeholder="Ingresar lugar">
  </div>

  <div class="col-sm-6 mb-3">
    <label for="paginas" class="form-label">Paginas</label>
    <input type="int" class="form-control" name="paginas" id="paginas" placeholder="Ingresar paginas">
  </div>

  <div class="col-sm-6 mb-3">
  <label for="modoadquisicion" class="form-label">Modo de adquisicion</label>
    <select class="form-control" name="modoadquisicion" id="modoadquisicion" required>
      <option value="">Selecciona una opcion</option>
      <option value="Donacion">Donacion</option>
    </select>
  </div> 

  <div class="col-sm-6 mb-3">
    <label for="nomdonante" class="form-label">Nombre del donante</label>
    <input type="text" class="form-control" name="nomdonante" id="nomdonante" placeholder="Ingresar nombre del donante">
  </div>

  <div class="col-sm-6 mb-3">
    <label for="fechaingreso" class="form-label">Fecha de ingreso</label>
    <input type="date" class="form-control" name="fechaingreso" id="fechaingreso" placeholder="Ingresar fecha de ingreso" required>
  </div>

  <div class="col-sm-6 mb-3">
    <label for="descripcion" class="form-label">Descripcion</label>
    <textarea type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Ingresar descripcion" cols="10" rows="3"></textarea>
</div>

<div class="col-sm-6 mb-3">
    <label for="procedencia" class="form-label">Procedencia</label>
    <input type="text" class="form-control" name="procedencia" id="procedencia" placeholder="Ingresa Procedencia" required>
</div>

<div class="col-sm-6 mb-3">
    <label for="estado" class="form-label">Estado de Conservacion</label>
    <select class="form-control" name="estado" id="estado" required>
        <option value="">Selecciona una opcion</option>
        <option value="Excelente">Excelente</option>
        <option value="Muy Bueno">Muy Bueno</option>
        <option value="Bueno">Bueno</option>
        <option value="Regular">Regular</option>
        <option value="Muy Mal Estado">Muy Mal Estado</option>
    </select>
</div>   

<div class="col-sm-6 mb-3">
    <label for="categoria" class="form-label">Categoria secundaria</label>
    <select class="form-control" name="categoria" id="categoria" required>
        <option value="">Selecciona una categoria</option>
        <?php while($fila=mysqli_fetch_array($result)){ ?>
        <option value="<?php echo $fila['idcategorias']?>"><?php echo $fila['nombre']?></option>
        <?php } ?>
    </select>
</div>

  

  <div class="col-sm-6 mb-3">


  


</div>
  <div class="col-12 text-center">
  <button type="submit" class="btn btn-primary" name="" id="">Enviar</button>
  
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