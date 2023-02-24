<?php
// Conexion a la Base de Datos Biblioteca 

require_once "conexion.php";

require_once "fpaginadomueblesgeneral.php";



//paginado
$cantmax=contar_registros($conex);


if (!isset($_GET['pg'])){
    $pag=0;
    $result=registros_porpagina($conex,$pag); 
}else{
    $pag=$_GET['pg'];
    $result=registros_porpagina($conex,$pag);
} 


if (isset($_POST['btnbuscar']) && $_POST['clavebuscada']!=''){
   
   

   //si el boton buscar manda algo se ejecuta esto
$clavebusqueda=$_POST['clavebuscada'];

$sql="SELECT * FROM inventariomuebles WHERE activo=1 and designacion like '%$clavebusqueda%' or nomdonante like '%$clavebusqueda%' or estadoconserv like '%$clavebusqueda%' or modoadquisicion like '%$clavebusqueda%' ORDER BY idmuebles";
    //die($sql);

$result=mysqli_query($conex,$sql);
}else{







 $sql="SELECT * FROM inventariomuebles  where activo=1 ORDER BY idmuebles";

 $result=mysqli_query($conex,$sql);

}if (mysqli_num_rows($result)>0){
include("primero.php");
         
 ?>

 
 
  
    <section>
     
    <div class="container text-center ">
        <div class="text-center mt-5 mb-3"><h3>Listado de muebles</h3></div>
        
    

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

         <!-- buscador -->

        <table class="table table-striped table-hover">
            <div class="row">
            <div class="row">
                <div class="col-4">
                <form action="mueblesGeneral.php" method="POST">	
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
                    <th scope="col">Dato Descriptivo</th>
                    <th scope="col">Procedencia</th>
                    <th scope="col">Estado de Consevacion</th>
                    </tr>
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
                    <td><?php echo $fila["datodescr"]; ?></td>
                    <td><?php echo $fila["procedencia"]; ?></td>
                    <td><?php echo $fila["estadoconserv"]; ?></td>
                </tr>
                
            <?php 
            }
            ?>    
            
            </tbody>



    </table></div>


    <div>
    <ul class="pagination justify-content-center">

   <?php
    
    

    //paginado

$itemxpag=$cantmax/10;
for ($i = 0; $i < $itemxpag; $i++) { ?>
    <li class="page-item"><?php echo "<a class='page-link' href='mueblesgeneral.php?pg=".$i."'>"; echo $i+1;}?></a></li>
 </ul> 
  </div>  

     
    
    
       

    <?php
   }else header("location:mueblesgeneral.php?mensaje=noencontrado");
 
?>
   

    
    </section>    

   
   <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
 </body>
 </html>



