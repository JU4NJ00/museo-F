<?php
session_start();

// Verificar la sesión
if (isset($_SESSION['dniadmin'])) {
} else {
    if (isset($_SESSION["dniencargado"])) {
        header("location:inicio_encargado.php");
    } else {
        header("location:index.php");
    }
}

require_once "conexion.php";
require_once "fpaginado_libros_borrados.php";

$clavebusqueda = "";
$busqueda_realizada = false; // Variable para indicar si se ha realizado una búsqueda

if (isset($_POST['btnbuscar']) && !empty($_POST['clavebuscada'])) {
    $clavebusqueda = $_POST['clavebuscada'];
    $busqueda_realizada = true; // Se ha realizado una búsqueda
}

if (isset($_GET['clav']) && !empty($_GET['clav'])) {
    $clavebusqueda = $_GET['clav'];
    $busqueda_realizada = true; // Se ha realizado una búsqueda
}

$cantmax = contar_registros($conex, $clavebusqueda);

$pag = isset($_GET['pg']) ? $_GET['pg'] : 0;
$result = registros_porpagina($conex, $pag, $clavebusqueda);

include("primero.php");
include('header.php');
?>

<section>
    <?php
    if ((!empty($_GET['clav']) || $busqueda_realizada)) {
        echo '<a href="lista_libros_borrados.php"><i class="fa-sharp fa-solid fa-arrow-left fa-2x m-2"></i></a>';
    }
    ?>

    <div class="container text-center">
        <div class="text-center mt-5 mb-3">
            <h3>Listado de Libros Borrados</h3>
        </div>

        <?php
        if (isset($_GET['mensaje'])) {
            switch ($_GET['mensaje']) {
                case 'eliminado':
                    echo "<div class='text-center mt-4 mb-5'><div class='alert alert-success' role='alert'><strong>Libro borrado exitosamente</strong></div></div>";
                    break;
                case 'restaurado':
                    echo "<div class='text-center mt-4 mb-5'><div class='alert alert-success' role='alert'><strong>Libro restaurado exitosamente</strong></div></div>";
                    break;
                case 'noencontrado':
                    echo "<div class='text-center mt-4 mb-5'><div class='alert alert-danger' role='alert'><strong>Libro no encontrado</strong></div></div>";
                    break;
            }
        }
        ?>

        <div class="row">
            <div class="col-4">
                <form action="lista_libros_borrados.php" method="POST">
                    <div class="input-group mt-2">
                        <input type="text" name="clavebuscada" class="form-control" value="<?php echo htmlspecialchars($clavebusqueda); ?>">
                        <button class="btn btn-outline-secondary btn-sm" type="submit" name="btnbuscar" id="btnbuscar" value="Buscar">Buscar</button>
                    </div>
                </form>
            </div>
        </div>

        <?php if (mysqli_num_rows($result) > 0) : ?>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Cod</th>
                        <th scope="col">Autor</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Editorial</th>
                        <th scope="col">Fecha de edicion</th>
                        <?php if (isset($_SESSION['dniadmin']) || isset($_SESSION['dniencargado'])) : ?>
                            <th scope="col">Acciones</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($fila = mysqli_fetch_array($result)) {
                        if ($fila['activo'] == 0) {
                    ?>
                            <tr>
                            <th scope="row"><?php echo $fila["codigo"]; ?></th>
                            <td><?php echo $fila["autor"]; ?></td>
                            <td><?php echo $fila["nombre"]; ?></td>
                            <td><?php echo $fila["editorial"]; ?></td>
                            <td><?php echo $fila["fechaedicion"]; ?></td>
                                <?php if (isset($_SESSION['dniadmin']) || isset($_SESSION['dniencargado'])) : ?>
                                    <td>
                                        <a class="btn btn-outline-danger btn-sm" href="form-borrar-libro.php?id=<?php echo $fila['idlibro']; ?>">Eliminar o Restaurar</a>
                                        <a class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#verinfo<?php echo $fila['idlibro']; ?>">
                                            <i class="fa fa-eye fa-1x" aria-hidden="true"></i>
                                        </a>
                                        </td>
                                <?php endif; ?>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
            <?php else : ?>
                <div class="text-center mt-4 mb-5">
                    <div class="alert alert-info text-center mt-4 mb-5" role="alert">
                        <strong><?php echo $busqueda_realizada ? 'No se encontraron resultados' : 'No hay libros borrados en este momento'; ?></strong>
                    </div>
                </div>
        <?php endif; ?>


        <div>
            <ul class="pagination justify-content-center">
                <?php
                $itemxpag = $cantmax / 5;
                for ($i = 0; $i < $itemxpag; $i++) {
                    echo "<li class='page-item'><a class='page-link' href='lista_libros_borrados.php?clav=$clavebusqueda&pg=" . $i . "'>" . ($i + 1) . "</a></li>";
                }
                ?>
            </ul>
        </div>
    </div>
</section>

<?php
include('footer.php');
?>

<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
