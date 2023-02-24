<?php
// Conexion a la Base de Datos museo 

 require_once "conexion.php";

 require_once "fpaginadolibrogeneral.php";

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

$sql="SELECT * FROM inventariolibros WHERE autor like '%$clavebusqueda%' or nomdonante like '%$clavebusqueda%' or modoadquisicion like '%$clavebusqueda%' and activo=1 ORDER BY idlibro";
//die($sql);

$result=mysqli_query($conex,$sql);
}else{



 $sql="SELECT * FROM inventariolibros ORDER BY idlibro";

 $result=mysqli_query($conex,$sql);

}if (mysqli_num_rows($result)>0){

    include ("primero.php");    
 ?>


 
      
    <section>
     
    <div class="container text-center ">
        <div class="text-center mt-5 mb-3"><h3>Listado de Libros</h3></div>
        


        <?php 

            //mensaje buscador

            if(isset($_GET['mensaje'])){
                switch ($_GET['mensaje']) {
                    case 'noencontrado':
                        echo "<div class='text-center mt-4 mb-5'><div class='alert alert-danger' role='alert'><strong>".'Libro no encontrado'."</strong></div></div>";
                   break;
                    }
         }

         ?>

         <!-- buscador -->

        <table class="table table-striped table-hover">
            <div class="row">
            <div class="row">
                <div class="col-4">
                <form action="librosGeneral.php" method="POST">	
                  	<div class="input-group mt-2">
          					<input type="text" name="clavebuscada" class="form-control" value="<?php if (!empty($_POST['clavebuscada'])){ echo $_POST['clavebuscada']; }?>">
          					<button class="btn btn-outline-secondary btn-sm" type="submit" name="btnbuscar" id="btnbuscar" value="Buscar">Buscar</button>
          			</div>
				</form>

                


       

           
                <thead>
                    <tr>
                    <th scope="col">Autor</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Editorial</th>
                    <th scope="col">Fecha de edicion</th>
                    <th scope="col">Lugar</th>
                    <th scope="col">Cantidad de paginas</th>
                    <th scope="col">Modo de adquisicion</th>
                    <th scope="col">Nombre del/la donante</th>
                    <th scope="col">Fecha de ingreso</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Procedencia</th>
                    <th scope="col">Estado</th>

                    </tr>
                </thead>

          
            <tbody>

            <?php

                While ($fila=mysqli_fetch_array($result)){
    
            ?>
        
                <tr>
                    
                    <th scope="row"><?php echo $fila["autor"]; ?></th>
                    <td><?php echo $fila["nombre"]; ?></td>
                    <td><?php echo $fila["editorial"]; ?></td>
                    <td><?php echo $fila["fechaedicion"]; ?></td>
                    <td><?php echo $fila["lugar"]; ?></td>
                    <td><?php echo $fila["paginas"]; ?></td>
                    <td><?php echo $fila["modoadquisicion"]; ?></td>
                    <td><?php echo $fila["nomdonante"]; ?></td>
                    <td><?php echo $fila["fechaingreso"]; ?></td>
                    <td><?php echo $fila["descripcion"]; ?></td>
                    <td><?php echo $fila["procedencia"]; ?></td>
                    <td><?php echo $fila["estado"]; ?></td>
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
    <li class="page-item"><?php echo "<a class='page-link' href='librosgeneral.php?pg=".$i."'>"; echo $i+1;}?></a></li>
 </ul> 
  </div>  

     
    
    
       

    <?php
   }else header("location:librosgeneral.php?mensaje=noencontrado");
 
?>
</section>
<?php   
    
   include('footer.php');

    ?>

   
   <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
 </body>
 </html>



