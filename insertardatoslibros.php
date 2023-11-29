<?php

session_start();

// Conexion a la Base de Datos Biblioteca 
require_once "conexion.php";

// die(basename($_FILES['archivo']['name']));
$error2 = "";
if (!empty(basename($_FILES['archivo']['name']))) {
    //tratamos la imagen aquí
    require_once('validargpt.php');
    
    // Ruta temporal del archivo subido
    $temporal = $_FILES['archivo']['tmp_name'];

    // Verifica si el archivo subido es una imagen
    if (getimagesize($temporal) !== false) {
        // Si el archivo es una imagen, continúa con el proceso
        $ruta = './imagenes/';
        $nombrearchivo = basename($_FILES['archivo']['name']);
        $destino = $ruta . $nombrearchivo;

        // Verifica si el archivo ya existe en el directorio de destino
        if (file_exists($destino)) {
            $mens = 0; //el archivo ya existe
        } else {
            // Si el archivo no existe, mueve el archivo de la carpeta temporal a la carpeta de destino
            if (move_uploaded_file($temporal, $destino)) {
                $nomImg = proceseimg($ruta, $nombrearchivo);
                unlink($ruta.$_FILES['archivo']['name']);
                $mens = 1; //se ha subido correctamente
            } else {
                $mens = 2; //Hubo un error al subir el archivo
            }
        }
    } else {
        // Si el archivo no es una imagen, muestra un mensaje de error
        $mens = 3; //el archivo no es una imagen
    }
}

if (
    !empty(trim($_POST['autor'])) && !empty(trim($_POST['nombre'])) &&
    !empty(trim($_POST['editorial'])) && !empty(trim($_POST['fechaedicion'])) &&
    !empty(trim($_POST['lugar'])) && !empty(trim($_POST['paginas'])) &&
    !empty(trim($_POST['modoadquisicion'])) && !empty(trim($_POST['nomdonante'])) &&
    !empty(trim($_POST['fechaingreso'])) && !empty(trim($_POST['descripcion'])) &&
    !empty(trim($_POST['procedencia'])) && !empty(trim($_POST['estado']))
) {

    $autor = $_POST['autor'];
    $nombre = $_POST['nombre'];
    $editorial = $_POST['editorial'];
    $fechaedicion = $_POST['fechaedicion'];
    $lugar = $_POST['lugar'];
    //Campos agregados
    $paginas = $_POST['paginas'];
    $modoadquisicion = $_POST['modoadquisicion'];
    $nomdonante = $_POST['nomdonante'];
    $fechaingreso = $_POST['fechaingreso'];
    $descripcion = $_POST['descripcion'];
    $procedencia = $_POST['procedencia'];
    $estado = $_POST['estado'];
    $categoriaboss = 2;
    $categoria = $_POST['categoria'];
    $idusuarrio = $_SESSION['id'];

    //contador de las categorias
    $cont = "UPDATE categorialibro SET contador=contador+1 WHERE idcategorias=$categoria";
    mysqli_query($conex, $cont);

    $cont2 = "UPDATE categoria SET contador=contador+1 WHERE idcategoriaboss=$categoriaboss";
    mysqli_query($conex, $cont2);

    //codigo propio
    $cod = "SELECT concat($categoriaboss,'-',contador,'-',iniciales) as codigo FROM categorialibro WHERE idcategorias=$categoria";

    $result1 = mysqli_query($conex, $cod);
    $fila = mysqli_fetch_array($result1);
    $codigo = $fila['codigo'];

    $sql = "INSERT INTO inventariolibros(autor,nombre,editorial,fechaedicion,lugar,paginas,modoadquisicion,nomdonante,fechaingreso,descripcion,procedencia,estado,categoria_idcategoriaboss, categorialibro_idcategorias,usuarios_idusuario,codigo, nomImg) VALUES('$autor','$nombre','$editorial','$fechaedicion','$lugar','$paginas','$modoadquisicion','$nomdonante','$fechaingreso','$descripcion','$procedencia','$estado','$categoriaboss','$categoria','$idusuarrio','$codigo', '$nomImg')";

    $result = mysqli_query($conex, $sql);

    if ($result && ($mens == 1)) {
        header("Location:inventariolibros.php?mensaje=agregado");
    } elseif ($result && ($mens == 2)) {
        header("Location:inventariolibros.php?mensaje=agregado pero no se pudo subir la imagen");
    } elseif ($result && ($mens == 3)) {
        header("Location:inventariolibros.php?mensaje=agregado pero no se pudo subir la imagen ya que el formato es inválido");
    } elseif ($result && ($mens == 0)) {
        header("Location:inventariolibros.php?mensaje=agregado pero no se pudo subir la imagen porque ya existe");
    } else {
        header("Location:inventariolibros.php?mensaje=" . $error2);
    }
}

?>
