<?php

session_start();
if (!isset($_SESSION['dniadmin'])){
    header("location:inicio_encargado.php");
   }

// Conexion a la Base de Datos Biblioteca 

 require_once "conexion.php";

 $sql="SELECT * FROM usuarios ORDER BY idusuario";

 $result=mysqli_query($conex,$sql);

 if (mysqli_num_rows($result)>0){

         

 include ("primero.php");
        
        include('header.php');

        

        // Conexion a la Base de Datos Biblioteca 
        
         
         
         
         $cantmax=0;
        
         // Se evalúa si se ha realizado clic en el botón Buscar y si 
         // el valor o clave buscada es distinto de vacío 
         
         if (isset($_POST['btnbuscar']) && $_POST['clavebuscada']!=''){
        
             $clavebusqueda=$_POST['clavebuscada'];
        
             $sql="SELECT * FROM usuarios WHERE apellido like '%$clavebusqueda%' or nombre like '%$clavebusqueda%' or dni like '$clavebusqueda%' or email like '%$clavebusqueda%'";
             //die($sql);
             
             $result=mysqli_query($conex,$sql);
        
         }
        
        ?>

    
      
    <section>
     <?php
    if(isset($_POST['btnbuscar']) && $_POST['clavebuscada']!=''){
            echo '<a href="listado.php"><i class="fa-sharp fa-solid fa-arrow-left fa-2x m-2"></i></a>';}?>
    


    <div class="container text-center ">
        <div class="text-center mt-5 mb-3"><h3>Listado de usuarios</h3></div>
        
        <table class="table table-striped table-hover">
            <div class="row">
                <div class="col-4">
                <form action="listado.php" method="POST">	
                  	<div class="input-group mt-2">
          					<input type="text" name="clavebuscada" class="form-control" value="<?php if (!empty($_POST['clavebuscada'])){ echo $_POST['clavebuscada']; }?>">
          					<button class="btn btn-outline-secondary btn-sm" type="submit" name="btnbuscar" id="btnbuscar" value="Buscar">Buscar</button>
          					</div>
				          </form>
                </div>
<div class="col-5">

</div>
                    <div class="col-3">
                    <div class="btn btn-primary btn-sm " > <a class="text-decoration-none text-white" href="agregar.php">Agregar</a></div>
                </div>
            </div>

            <thead>
                <tr>
                <th scope="col">DNI</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Email</th>
                <th scope="col">Acciones</th>
                </tr>
            </thead>
        
            <tbody>

            <?php

                While ($fila=mysqli_fetch_array($result)){
    
            ?>
        
                <tr>
                    
                    <th scope="row"><?php echo $fila["dni"]; ?></th>
                    <td><?php echo $fila["nombre"]; ?></td>
                    <td><?php echo $fila["apellido"]; ?></td>
                    <td><?php echo $fila["email"]; ?></td>
                    <td><a class="me-1 btn btn-outline-success btn-sm " href="form-editar.php?id=<?php echo $fila ['idusuario'];?>"><i class="fa fa-pencil fa-1x" aria-hidden="true"></i></a>
                    <a class="me-1 btn btn-outline-danger btn-sm" href="form_eliminar.php?id=<?php echo $fila ['idusuario'];?>"><i class="fa fa-trash fa-1x" aria-hidden="true"></i></a>
</td>

                </tr>
                

            <?php
            }
            ?>         
            
            </tbody>



    </table></div>

   
   <?php
     }else header("location:agregar.php");
   ?>  
    
    </section>    

    <?php

    include('footer.php');

    ?>
   
   <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
 </body>
 </html>