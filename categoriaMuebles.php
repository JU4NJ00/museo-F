<?php
session_start();
if (isset($_SESSION['dniadmin'])){
} else{
 if(isset($_SESSION["dniencargado"])){
   header("location:inicio_encargado.php");
 }else {header("location:index.php");}}

 require_once "conexion.php";



 $sql="SELECT * FROM categoria";

 $result=mysqli_query($conex,$sql);

 if (mysqli_num_rows($result)>0){

         
    include ("primero.php");


    include('header.php');
                ?>

      
    <section>
     
    <div class="container text-center ">
        <div class="text-center mt-5 mb-3"><h3>Categorias</h3></div>


        
        <?php if(isset($_GET['mensaje'])) {
                switch ($_GET['mensaje']) {
                    case 'agregado':
                        echo "<div class='text-center mt-4 mb-5'><div class='alert alert-success' role='alert'><strong>".'Categoria agregada exitosamente'."</strong></div></div>";
                        break;
                    case 'edit':
                        echo "<div class='text-center mt-4 mb-5'><div class='alert alert-success' role='alert'><strong>".'Categoria modificada exitosamente'."</strong></div></div>";
                        break; 
                    case 'borrado':
                        echo "<div class='text-center mt-4 mb-5'><div class='alert alert-success' role='alert'><strong>".'Categoria borrada exitosamente'."</strong></div></div>";
                        break;
                }
              }
        ?>
        <table class="table table-striped table-hover">
            <div class="row">
                <div class="col-9"></div>
                    <div class="col-3">
                    <div class="btn btn-primary btn-sm "> <a class="text-decoration-none text-white" href="form-agregar-cat.php">Agregar</a></div>
                </div>
            </div>
                <thead>
                    <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Iniciales</th>
            <?php 
            if (isset($_SESSION['dniadmin']) || isset($_SESSION['dniencargado'])){
            ?>
                    <th scope="col">Acciones</th>
            <?php 
            }
            ?>
                    </tr>
                </thead>

          
            <tbody>

            <?php

                While ($fila=mysqli_fetch_array($result)){
    
            ?>
        
                <tr>
                    
                    <th scope="row"><?php echo $fila["nombre"]; ?></th>
                    <td><?php echo $fila["iniciales"]; ?></td>

            <?php 
            if (isset($_SESSION['dniadmin']) || isset($_SESSION['dniencargado'])){
            ?>
                    <td>

                    <a class="me-1 btn btn-outline-success btn-sm " href="form-edit-cat1.php?id=<?php echo $fila ['idcategoriaboss'];?>"><i class="fa fa-pencil fa-1x" aria-hidden="true"></i></a>
              
                     <a class="me-1 btn btn-outline-danger btn-sm" href="form-eliminar-categoriaboss.php?id=<?php echo $fila ['idcategoriaboss'];?>"><i class="fa fa-trash fa-1x" aria-hidden="true"></i></a>
                </td>

                </tr>
                
            <?php 
            }
            ?>
            <?php
            }
            ?>         
            
            </tbody>



    </table></div>

   
   <?php
     }else header("location:agregarmuebles.php");
   ?>  
    
    </section>    

    <?php

    include('footer.php');

    ?>
   
   <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
 </body>
 </html>



