<?php
	require('fpdf.php');

	$pdf = new FPDF('l', 'mm', 'A5');

	$pdf->AddPage();

	$pdf->SetFont('Arial', 'B', 16);

	$pdf->Cell(190,7, 'Laporan Antrian',0,1, 'C');
	$pdf->SetFont('Arial', 'B', 12);
	$pdf->Cell(190,7, 'Daftar Antrian',0,1, 'C');

	// Memberikan space kebawah agar tidak terlalu rapat
	$pdf->Cell(10,7,'',0,1);
 
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(35,6,'kode',1,0);
	$pdf->Cell(85,6,'Nama',1,0);
	$pdf->Cell(30,6,'No Hp',1,0);
	$pdf->Cell(30,6,'Tanggal',1,1);
 
	$pdf->SetFont('Arial','',10);
 
include 'koneksi.php';
$mahasiswa = mysqli_query($connect, "select * from antrian");
while ($row = mysqli_fetch_array($mahasiswa)){
    $pdf->Cell(35,6,$row['code_antrian'],1,0);
    $pdf->Cell(85,6,$row['nama'],1,0);
    $pdf->Cell(30,6,$row['no_telepon'],1,0);
    $pdf->Cell(30,6,$row['tanggal'],1,1); 
}
 
	$pdf->Output();
?>