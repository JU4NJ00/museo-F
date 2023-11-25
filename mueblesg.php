
<?php
session_start();

// Conexion a la Base de Datos Biblioteca 

 require_once "conexion.php";
 require_once "fpaginadomueblesgeneral.php";

 //paginadolibro
 if(isset($_POST['clavebuscada'])){
    $clavebusqueda=$_POST['clavebuscada'];
 }
 if(isset($_GET['clav']) && ((($_GET['clav'])!="") || ($_GET['clav'])!=" ")){
    $clavebusqueda=$_GET['clav'];

}else {$clavebusqueda="";}
 $cantmax=contar_registros($conex,$clavebusqueda);

 if(isset($_GET['clav']) && ((($_GET['clav'])!="") || ($_GET['clav'])!=" ")){
    $clavebusqueda=$_GET['clav'];

}



 if (isset($_POST['btnbuscar']) && $_POST['clavebuscada']!=''){
    //si el boton buscar manda algo se ejecuta esto

$clavebusqueda=$_POST['clavebuscada'];
 }
$cantmax=contar_registros($conex,$clavebusqueda);

if (!isset($_GET['pg'])){
    $pag=0;
    $result=registros_porpagina($conex,$pag,$clavebusqueda); 
}else{
    $pag=$_GET['pg'];
    $result=registros_porpagina($conex,$pag,$clavebusqueda);
} 
 if (mysqli_num_rows($result)>0){

         
    include ("primero.php");
        
        include('header.php');

    ?>
      
    <section>
        <?php
    if((isset($_GET['clav']) && ($_GET['clav'])!="") || (isset($_POST['btnbuscar']) && $_POST['clavebuscada']!='')){
            echo '<a href="mueblesg.php"><i class="fa-sharp fa-solid fa-arrow-left fa-2x m-2"></i></a>';}?>
    
 

    <div class="container text-center">
        <div class="text-center mt-5 mb-3"><h3>Listado de Muebles</h3></div>


        
        <?php 

//mensaje buscador

if(isset($_GET['mensaje'])){
    switch ($_GET['mensaje']) {
        case 'noencontrado':
            echo "<div class='text-center mt-4 mb-5'><div class='alert alert-danger' role='alert'><strong>".'Mueble no encontrado'."</strong></div></div>";
       break;
        }
}

?>

        <table class="table table-striped table-hover">
            <div class="row">
            <div class="row">
                <div class="col-4">
                <form action="mueblesg.php" method="POST">	
                  	<div class="input-group mt-2">
          					<input type="text" name="clavebuscada" class="form-control" value="<?php if (!empty($_POST['clavebuscada'])){ echo $_POST['clavebuscada']; }?>">
          					<button class="btn btn-outline-secondary btn-sm" type="submit" name="btnbuscar" id="btnbuscar" value="Buscar">Buscar</button>
          			</div>
				</form>


           
                <thead>
                <tr>
                    <th scope="col">Designacion</th>
                    <th scope="col">Modo de Adquisicion</th>
                    <th scope="col">Nombre de Donante</th>
                    <th scope="col">Fecha de Ingreso</th>
                    <!-- <th scope="col">Dato Descriptivo</th>
                    <th scope="col">Procedencia</th>
                    <th scope="col">Estado de Consevacion</th> -->
                    <!-- <th scope="col">Dato Descriptivo</th>
                    <th scope="col">Procedencia</th>
                    <th scope="col">Estado de Consevacion</th>
                    <th scope="col">Categoria</th> -->
        
                    <th scope="col">Acciones</th>

                </thead>

          
            <tbody>

            <?php

                While ($fila=mysqli_fetch_array($result)){
    
            ?>
        
        <tr>
                    
                    <th scope="row"><?php echo $fila["designacion"]; ?></th>
                    <td><?php echo $fila["modoadquisicion"]; ?></td>
                    <td><?php echo $fila["nomdonante"]; ?></td>
                    <td><?php echo $fila["fechaing"]; ?></td>
                    <!-- <td><?php // echo $fila["datodescr"]; ?></td>
                    <td><?php //echo $fila["procedencia"]; ?></td>
                    <td><?php //echo $fila["estadoconserv"]; ?></td> -->
                    <?php 
           
                include("verMueblesG.php");
            ?>
                        
                        <td>
                        <a class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#verinfo<?php echo $fila ['idmuebles'];?>"><i class="fa fa-eye fa-1x" aria-hidden="true"></i></a>
                        </td>
                
                
                    

</tr>
            
            <?php } ?>
                
                    
            
            </tbody>



    </table></div>



     
    <div>
    <ul class="pagination justify-content-center">

   <?php
    
    //paginado

$itemxpag=$cantmax/5;
for ($i = 0; $i < $itemxpag; $i++) { ?>
    <li class="page-item"><?php echo "<a class='page-link' href='mueblesg.php?clav=$clavebusqueda&pg=".$i."'>"; echo $i+1;}?></a></li>
 </ul> 
  </div>  

   <?php

     }else header("location:mueblesg.php?mensaje=noencontrado");
   ?>  
    
    </section>    

    <?php
  
    include('footer.php');

    ?>
    

   
   <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
 </body>
 </html>


