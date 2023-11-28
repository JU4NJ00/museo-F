<?php
include 'conexion.php';
require_once "./fpdf/fpdf.php";
require_once "./mipdf.php";

$tipo = $_GET['tipo'] ?? 'general';  // Valor por defecto 'general'

// Crear instancia de MIPDF
$pdf = new MIPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L', 'A4'); // 'P' para retrato, usa 'L' para paisaje
$pdf->SetFont('Times', '', 7);


// Título de la sección de Libros
$pdf->Ln(10);
$pdf->Cell(0, 10, utf8_decode('Sección de Libros'), 0, 1, 'C');


// Define fixed titles for each column
$columnTitles = array(
    
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
    'nomImg' => 'Imagen',
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
            if ($key == 'nomImg') {
                $imageValue = !empty($row[$key]) ? 'Sí' : 'No';
                $rowData[] = $imageValue;
            } elseif ($key == 'fechaedicion') {
                // Formatear la fecha de edición
                $fechaEdicion = date('d/m/Y', strtotime($row[$key]));
                $rowData[] = $fechaEdicion;
            } else {
                $rowData[] = $row[$key];
            }
        }
        $pdf->Row($rowData);
    }
}

// Título de la sección de Muebles
$pdf->AddPage();
$pdf->Ln(10);
$pdf->Cell(0, 10, utf8_decode('Sección de Muebles'), 0, 1, 'C');

// Define fixed titles for each column
$columnTitles = array(
    
    'designacion' => 'Designación',
    'nomdonante' => 'Nombre del donante',
    'estadoconserv' => 'Estado de conservación',
    'modoadquisicion' => 'Modo de adquisición',
    'fechaing' => 'Fecha de ingreso',
    'procedencia' => 'Procedencia',
    'datodescr' => 'Datos descriptivos',
    'nomImg' => 'Imagen',
);

$cellWidth = 31;

$pdf->SetWidths(array_fill(0, count($columnTitles), $cellWidth));
$pdf->SetAligns(array_fill(0, count($columnTitles), 'L'));

$pdf->Row(array_values($columnTitles));

$sql = "SELECT * FROM inventariomuebles WHERE activo=1 ORDER BY idmuebles;";
$result = $conex->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $rowData = array();
        foreach ($columnTitles as $key => $title) {
            if ($key == 'nomImg') {
                $imageValue = !empty($row[$key]) ? 'Sí' : 'No';
                $rowData[] = $imageValue;
            } elseif ($key == 'fechaing') {
                // Formatear la fecha de ingreso
                $fechaIngreso = date('d/m/Y', strtotime($row[$key]));
                $rowData[] = $fechaIngreso;
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
