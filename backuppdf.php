
<?php
    session_start();
    // include ("primero.php");
        
    // include('header.php');


    require_once "./fpdf/fpdf.php";
    require_once "./mipdf.php";

    $pdf=new MIPDF();
    
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Times','',12);
    for($i=1;$i<=40;$i++)
        $pdf->Cell(0,10, utf8_decode('línea númeroñññññññ ').$i,0,1);
    $pdf->Output("D","backup.pdf",true);
   
    
    // include('footer.php');
?>
