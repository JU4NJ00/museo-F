<?php
session_start();

// Conexion a la Base de Datos museo

 require_once "conexion.php";


 require_once "fpaginadomuebles.php";

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
            //si el boton buscar esta vacio se ejecuta esto
 $sql="SELECT * FROM inventariomuebles where activo=1 ORDER BY idmuebles";

 $result=mysqli_query($conex,$sql);
 }
 if (mysqli_num_rows($result)>0){

         
 include("primero.php");

                    include('header.php');

                     // Conexion a la Base de Datos Biblioteca 
        
         
                    //  require_once "fpaginado.php";
         
                    //  $cantmax=0;
                    
                     // Se evalúa si se ha realizado clic en el botón Buscar y si 
                     // el valor o clave buscada es distinto de vacío 
                     
                     
                    
                    //  }else{    
                    
                         //LLamada a funciones de Paginado
                    
                        //  $cantmax=contar_registros($conex);
                    
                         
                        //    if (!isset($_GET['pg'])){
                        //        $pag=0;
                        //        $result=registros_porpagina($conex,$pag); 
                        //    }else{
                        //        $pag=$_GET['pg'];
                        //        $result=registros_porpagina($conex,$pag);
                        //    } 
                    //  }
                    
        ?>
                

      
    <section>
     
    <div class="container text-center ">
        <div class="text-center mt-5 mb-3"><h3>Listado de muebles</h3></div>
        
            <?php 
                if(isset($_GET['mensaje'])){
                    switch ($_GET['mensaje']) {
                            case 'agregado':
                            echo "<div class='text-center mt-4 mb-5'><div class='alert alert-success' role='alert'><strong>".'Agregado exitosamente'."</strong></div></div>";
                            break;
                            case 'borrado':
                                echo "<div class='text-center mt-4 mb-5'><div class='alert alert-success' role='alert'><strong>".'Borrado exitosamente'."</strong></div></div>";
                                break;
                            case 'edit':
                                echo "<div class='text-center mt-4 mb-5'><div class='alert alert-success' role='alert'><strong>".'Modificado exitosamente'."</strong></div></div>";
                            break;
                            case 'noencontrado':
                                echo "<div class='text-center mt-4 mb-5'><div class='alert alert-danger' role='alert'><strong>".'Elemento no encontrado'."</strong></div></div>";
                            break;
                            }
                }
            ?>
        <table class="table table-striped table-hover">
            <div class="row">
                <div class="col-4">
                <form action="inventariomuebles.php" method="POST">	
                  	<div class="input-group mt-2">
          					<input type="text" name="clavebuscada" class="form-control" value="<?php if (!empty($_POST['clavebuscada'])){ echo $_POST['clavebuscada']; }?>">
          					<button class="btn btn-outline-secondary btn-sm" type="submit" name="btnbuscar" id="btnbuscar" value="Buscar">Buscar</button>
          			</div>
				</form>

                </div>
            <div class="col-5">

                </div>
                    <div class="col-3">
                    <div class="btn btn-primary btn-sm "> <a class="text-decoration-none text-white" href="agregarmuebles.php">Agregar</a></div>
                </div>
            </div>

           
                <thead>
                    <tr>
                    <th scope="col">Cod</th>
                    <th scope="col">Designacion</th>
                    <th scope="col">Modo de Adquisicion</th>
                    <th scope="col">Nombre de Donante</th>
                    <th scope="col">Fecha de Ingreso</th>
                    <!-- <th scope="col">Dato Descriptivo</th>
                    <th scope="col">Procedencia</th>
                    <th scope="col">Estado de Consevacion</th>
                    <th scope="col">Categoria</th> -->
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
                    
                    <th scope="row"><?php echo $fila["codigo"]; ?></th>
                    <td><?php echo $fila["designacion"]; ?></td>
                    <td><?php echo $fila["modoadquisicion"]; ?></td>
                    <td><?php echo $fila["nomdonante"]; ?></td>
                    <td><?php echo $fila["fechaing"]; ?></td>
                    <!-- <td><?php /* echo $fila["datodescr"]; ?></td>
                    <td><?php echo $fila["procedencia"]; ?></td>
                    <td><?php echo $fila["estadoconserv"]; ?></td>
                    <td><?php echo $fila["categoria_idcategoriaboss"]; */?></td> -->
            <?php 
            if (isset($_SESSION['dniadmin']) || isset($_SESSION['dniencargado'])){
                include("verMuebles.php");
            ?>
                                
                    
                    <td>
                        <a class="me-1 btn btn-outline-success btn-sm " href="form-edit-muebles.php?id=<?php echo $fila ['idmuebles'];?>"><i class="fa fa-pencil fa-1x" aria-hidden="true"></i></a>
              
                        <a class="me-1 btn btn-outline-danger btn-sm" href="form-eliminar-muebles.php?id=<?php echo $fila ['idmuebles'];?>"><i class="fa fa-trash fa-1x" aria-hidden="true"></i></a>
                        

                       
                        <a class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#verinfo<?php echo $fila ['idmuebles'];?>"><i class="fa fa-eye fa-1x" aria-hidden="true"></i></a>
                        
                
                
                    </td>



                </tr>
                
            <?php 
            }
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
    <li class="page-item"><?php echo "<a class='page-link' href='inventariomuebles.php?pg=".$i."'>"; echo $i+1;}?></a></li>
 </ul> 
  </div>  



   <?php
     }else header("location:inventariomuebles.php?mensaje=noencontrado");
   ?>  
    
    </section>    

    <?php

    include('footer.php');

    ?>
   
   <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
 </body>
 </html>



