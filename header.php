<header>
     <!-- Encabezado -->       
    <div class="container-fluid encabezado">
        <div class="row">

    
          <div class="col-3 logo">
            <div class="">
              <a href="index.php"><img src="./imagenes/logomuseo.png" alt="logo"  id="img1"></a>
        </div>
            </div>
      <div class="col-9">
        
      <h1 class="titulo__texto">Museo Ferroviario</h1>
      <h2 class="titulo__texto">San Cristobal</h2></div>
      </div>
      </div>
      </div>

       <!-- Menú de Navegación -->  
      <nav class="navbar navbar-expand-md navbar-dark bg-success">
      <div class="container-fluid">
    
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <?php
          if ( !isset($_SESSION["dniadmin"]) && !isset($_SESSION["dniencargado"]) ) {
        ?>
      <ul class="navbar-nav">
        
      
        <!-- <li class="nav-item">
          <a class="nav-link" href="index.php"><i class="bi bi-house"></i></a>
        </li>

        <li class="nav-item pt-1">
          <a class="nav-link" href="https://www.facebook.com/groups/178208595674717/"><i class="bi bi-facebook"></i></a>
        </li> -->

        <li class="nav-item pt-1">
            <!-- Example single danger button -->
            <div class="btn-group">
              <button type="button" class="btn dropdown-toggle nav-link" data-bs-toggle="dropdown" aria-expanded="false">
              Listados
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="mueblesg.php">Muebles</a></li>
                <li><a class="dropdown-item" href="librosg.php">Libros</a></li>
              </ul>
            </div>

 <!-- Agregado  -->
 <li class="nav-item dropdown nav-item pt-1">
    <a class="nav-link dropdown-toggle" href="#" id="navbarPDF" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fa-solid fa-file-pdf"></i>
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarPDF">
        <li><a class="dropdown-item" href="pdflibrosg.php?tipo=libros"><i class="fa-solid fa-file-pdf"></i> Descargar Listado Libros</a></li>
        <li><a class="dropdown-item" href="pdfmueblesg.php?tipo=muebles"><i class="fa-solid fa-file-pdf"></i> Descargar Listado Muebles</a></li>
        <li><a class="dropdown-item" href="pdfgeneralg.php?tipo=general"><i class="fa-solid fa-file-pdf"></i> Descargar Listado General</a></li>
    </ul>
</li>

    <!--  -->

          
        </li>

       </ul>
        <ul class="navbar-nav ms-auto">

        <li class="nav-item pt-1">
          <a class="nav-link" href="login.php">Administracion</a>
        </li>
        </ul>
        <?php
           }else{ 
            ?> <script src="js/perfil.js"></script> <?php
            if (isset($_SESSION['dniadmin']) ){
            ?>
        <ul class="navbar-nav">
            <li class="nav-item pt-1">
              <a class="nav-link" href="listado.php">Usuarios</a>
            </li>

            <li class="nav-item pt-1">
              <a class="nav-link" href="inventariomuebles.php">Inventario Muebles</a>
            </li>
            <li class="nav-item pt-1">
              <a class="nav-link" href="categoriaMuebles.php">Categorias Muebles</a>
            </li>
            <li class="nav-item pt-1">
              <a class="nav-link" href="inventariolibros.php">Inventario Libros</a>
            </li>
            <li class="nav-item pt-1">
              <a class="nav-link" href="categoriaLibros.php">Categorias Libros</a>
            </li>
           <!-- Agregado  -->
            <li class="nav-item dropdown nav-item pt-1">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Elementos Borrados
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="lista_muebles_borrados.php">Muebles Borrados</a></li>
            <li><a class="dropdown-item" href="lista_libros_borrados.php">Libros Borrados</a></li>
          </ul>
        </li>

<!--  -->

           <!-- Agregado  -->
           <li class="nav-item dropdown nav-item pt-1">
    <a class="nav-link dropdown-toggle" href="#" id="navbarPDF" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fa-solid fa-file-pdf"></i>
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarPDF">
        <li><a class="dropdown-item" href="pdflibros.php?tipo=libros"><i class="fa-solid fa-file-pdf"></i> Descargar Listado Libros</a></li>
        <li><a class="dropdown-item" href="pdfmuebles.php?tipo=muebles"><i class="fa-solid fa-file-pdf"></i> Descargar Listado Muebles</a></li>
        <li><a class="dropdown-item" href="pdfgeneral.php?tipo=general"><i class="fa-solid fa-file-pdf"></i> Descargar Listado General</a></li>
    </ul>
</li>

    <!--  -->
    </ul>
        <ul class="navbar-nav ms-auto">


        
            <div id="divA" class= "mt-2  border rounded p-1">
           <span>
              <?php echo $_SESSION["nomadmin"];?>
          </span>
          </div>
      
        <li class="nav-item pt-1">
          <a class="nav-link" href="salir.php">Cerrar sesion</a>
        </li>
        </ul>
        <?php }else{ ?>
          <ul class="navbar-nav">
              <li class="nav-item pt-1">
              <a class="nav-link" href="agregarmuebles.php">Registrar muebles</a>
            </li>	
            <li class="nav-item pt-1">
              <a class="nav-link" href="agregarlibros.php">Registrar libros</a>
            </li>	
            <li class="nav-item pt-1">
              <a class="nav-link" href="inventariomuebles.php">Listado de muebles</a>
            </li>	
            <li class="nav-item pt-1">
              <a class="nav-link" href="inventariolibros.php">Listado de libros</a>
            </li>	
         

             <!-- Agregado  -->
             <li class="nav-item dropdown nav-item pt-1">
    <a class="nav-link dropdown-toggle" href="#" id="navbarPDF" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fa-solid fa-file-pdf"></i>
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarPDF">
        <li><a class="dropdown-item" href="pdflibros.php?tipo=libros"><i class="fa-solid fa-file-pdf"></i> Descargar Listado Libros</a></li>
        <li><a class="dropdown-item" href="pdfmuebles.php?tipo=muebles"><i class="fa-solid fa-file-pdf"></i> Descargar Listado Muebles</a></li>
        <li><a class="dropdown-item" href="pdfgeneral.php?tipo=general"><i class="fa-solid fa-file-pdf"></i> Descargar Listado General</a></li>
    </ul>
</li>
</ul>
    <!--  -->

         <ul class="navbar-nav ms-auto">
            <div id="divE" class= "mt-2  border rounded p-1">
           <span>
              <?php echo $_SESSION['nomencargado'];?>
          </span>
          </div>
          <li class="nav-item pt-1">
          <a class="nav-link" href="salir.php">Cerrar sesion</a>
        </li>
          </ul>
          <?php
         }}
          ?>
      </div>
      </div>
      </nav>       
  
</header>
    
    