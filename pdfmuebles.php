<?php
include 'conexion.php';
require_once "./fpdf/fpdf.php";
require_once "./mipdf.php";

$tipo = $_GET['tipo'] ?? 'muebles';

$pdf = new MIPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L', 'A4');
$pdf->SetFont('Times', '', 7);

$columnTitles = array(
    'codigo' => 'Código',
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
                // Formatear la fecha
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
