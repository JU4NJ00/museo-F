<?php
session_start();

if (isset($_SESSION["dniadmin"])) {
    header("location:inicio_admin.php");
} elseif (isset($_SESSION["dniencargado"])) {
    header("location:inicio_encargado.php");
} else {
    header("location:index.php");
}

require_once "conexion.php";

$id = $_POST['idlibro'];
$_SESSION['ids'] = $id;

// Verifica si se ha enviado el formulario para borrar o restaurar
if (isset($_POST['restaurar'])) {
    // Actualiza el estado del mueble
    $sql = "UPDATE inventariolibros SET activo=1 WHERE idlibro=$id";
    $mensaje = "restaurado"; // Cambiado de "borrado" a "restaurado"
    //die($sql);
} elseif (isset($_POST['borrar'])) {
    // Elimina la fila correspondiente de la base de datos
    $sql = "DELETE FROM inventariolibros WHERE idlibro=$id";
    $mensaje = "eliminado";
} else {
    // En caso de que no se haya enviado ninguna acción válida
    header("location:lista_libros_borrados.php");
    exit();
}

$result = mysqli_query($conex, $sql);

//die($sql);

header("location:lista_libros_borrados.php?mensaje=$mensaje");
?>
