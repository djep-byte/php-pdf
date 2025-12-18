<?php
require('fpdf.php');
include('koneksi.php');

class PDF extends FPDF {
    function Header() {
        $this->SetFont('Arial', 'B', 16);
        $this->Cell(0, 10, 'DAFTAR SISWA KELAS IX', 0, 1, 'C');
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'JURUSAN REKAYASA PERANGKAT LUNAK', 0, 1, 'C');
        $this->Ln(10);
    }
}

$pdf = new PDF();
$pdf->AddPage('P', 'A4');
$pdf->SetAutoPageBreak(true, 15);

$pdf->SetFont('Arial', 'B', 10);
$pdf->SetFillColor(200, 220, 255);
$pdf->Cell(10, 8, 'No', 1, 0, 'C', true);
$pdf->Cell(30, 8, 'NIS', 1, 0, 'C', true);
$pdf->Cell(70, 8, 'Nama Siswa', 1, 0, 'C', true);
$pdf->Cell(40, 8, 'Jenis Kelamin', 1, 0, 'C', true);
$pdf->Cell(40, 8, 'Kelas', 1, 1, 'C', true);

$pdf->SetFont('Arial', '', 10);
$query = "SELECT * FROM siswa WHERE kelas = 'IX RPL' ORDER BY nis ASC";
$result = $koneksi->query($query);

$no = 1;
while ($row = $result->fetch_assoc()) {
    $pdf->Cell(10, 7, $no++, 1, 0, 'C');
    $pdf->Cell(30, 7, $row['nis'], 1, 0, 'C');
    $pdf->Cell(70, 7, $row['nama_siswa'], 1, 0, 'L');
    $pdf->Cell(40, 7, $row['jenis_kelamin'], 1, 0, 'C');
    $pdf->Cell(40, 7, $row['kelas'], 1, 1, 'C');
}

$koneksi->close();
$pdf->Output('I', 'Daftar_Siswa_IX_RPL.pdf');
?>