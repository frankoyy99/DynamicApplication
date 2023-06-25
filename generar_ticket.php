<?php
require('fpdf/fpdf.php');
require('conexion.php');
$id_pago = $_GET['id_pago'];
$registros="SELECT p.id_pago, p.monto, p.fecha_pago, h.numero_habitacion, r.id_reservacion, c.nombre
FROM pagos p
INNER JOIN reservaciones r ON p.id_reservacion = r.id_reservacion
INNER JOIN clientes c ON c.id_cliente = r.id_cliente
INNER JOIN habitaciones h ON r.id_habitacion = h.id_habitacion WHERE id_pago= '$id_pago'";
$resultado = $conexion->query($registros);

class PDF extends FPDF
 {
 // Cabecera de página
 function Header()
 {
     // Logo
     $this->Image('css/image/logo2.jpg',58,5,20);
     // Arial bold 15
     $this->SetFont('Arial','B',7);

     $this->Text(10,30, utf8_decode('Direccion: Fernando López Arias, Centro, Ver.'));
     $this->Text(10,35, utf8_decode('Tel: +525554149486'));
     $this->SetFont('Arial','B',9);
     $this->SetY(40);
     $this->SetX(22);
     $this->Cell(40,5,"Hotel Imperial Sontecomapan",'B',0,'C');
     $this->Ln(12);
 }

 // Pie de página
 function Footer()
 {
     // Posición: a 1,5 cm del final
     //$this->SetY(-15);
     // Arial italic 8
     //$this->SetFont('Arial','B',8);
     // Número de página
     //$this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');

     $this->SetFont('Arial', 'B', 8);
     $this->SetY(-15);
     $this->SetX(12);
     //$this->Cell(95,5,utf8_decode('Página ').$this->PageNo().' / {nb}',0,0,'L');
     //$this->Cell(95,5,date('d/m/Y | g:i:a') ,0,1,'L');
     $this->Cell(0,5,utf8_decode("© Todos los derechos reservados."),0,0,"C");
 }
 }

 // Creación del objeto de la clase heredada
 $pdf = new PDF('P','mm',array(80,150));//definimos la orientacion de la pagina y el array indica el tamaño de la hoja
 $pdf->AliasNbPages();
 $pdf->AddPage();
 //$pdf->SetFillColor(47,161,215,219);
 $pdf->setX(10);
 $pdf->SetFont('Arial','B',9);
 $pdf->Cell(25,6,utf8_encode('Fecha Pago'),0,0,'C',0);
 $pdf->Cell(20,6,utf8_decode('N° Habitacion'),0,0,'C',0);
 $pdf->Cell(20,6,utf8_encode('Cliente'),0,1,'C',0);


 
 while($row = $resultado->fetch_assoc()){
    //$pdf->SetFillColor(45,121,173,219);
    $pdf->SetFont('Arial','',8);
     $pdf->setX(10);
     $pdf->Cell(25,6,utf8_decode($row['fecha_pago']) ,0,0,'C',0);
     $pdf->Cell(20,6,utf8_decode($row['numero_habitacion']),0,0,'C',0);
     $pdf->Cell(20,6,utf8_decode($row['nombre']),0,1,'C',0);
 

 $pdf->Ln(10);
 $pdf->setX(15);
 $pdf->SetFont('Arial','B',8);
 $pdf->Cell(45,5,'TOTAL:',0,0,'L',0);

 $pdf->SetFont('Arial','',8);
 $pdf->Cell(12,5,'$'.number_format($row['monto'],2),'B');
 }
 $pdf->Ln(50);
 $pdf->SetFont('Arial','B',8);
 $pdf->setX(10);
 $pdf->Cell(0,5,utf8_decode('¡GRACIAS POR HOSPEDARSE!'),0,0,"C");

 $pdf->Output();
?>