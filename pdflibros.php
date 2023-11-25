<?php
session_start();
include 'conexion.php';

require_once "./fpdf/fpdf.php";
require_once "./mipdf.php";

$tipo = $_GET['tipo'] ?? 'libros';

// Crear instancia de MIPDF
$pdf = new MIPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L', 'A4');
$pdf->SetFont('Times', '', 7);

$columnTitles = array(
    'codigo' => 'Código',
    'autor' => 'Autor',
    'nomdonante' => 'Nombre del donante',
    'editorial' => 'Editorial',
    'modoadquisicion' => 'Modo de adquisición',
    'fechaedicion' => 'Fecha de edición',
    'procedencia' => 'Procedencia',
    'descripcion' => 'Datos descriptivos',
    'lugar' => 'Lugar',
    'paginas' => 'Páginas',
    'estado' => 'Estado de conservación',
    'imagen' => 'Imagen',
);

$cellWidth = 25;

$pdf->SetWidths(array_fill(0, count($columnTitles), $cellWidth));
$pdf->SetAligns(array_fill(0, count($columnTitles), 'L'));

$pdf->Row(array_values($columnTitles));

$sql = "SELECT * FROM inventariolibros WHERE activo=1 ORDER BY idlibro;";
$result = $conex->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $rowData = array();
        foreach ($columnTitles as $key => $title) {
            if ($key == 'imagen') {
                $imageValue = !empty($row[$key]) ? 'Sí' : 'No';
                $rowData[] = $imageValue;
            } else {
                $rowData[] = $row[$key];
            }
        }
        $pdf->Row($rowData);
    }
} else {
    echo "0 results";
}

$pdf->Output("D", "backup.pdf", true);
?>