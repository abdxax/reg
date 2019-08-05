<?php
require 'autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
// connectio database 
$connect=mysqli_connect();
$ch="SET CHARACTER SET utf8";
mysqli_query($conn,$ch);
$swl="";
//object from library
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$res=mysqli_query($connect,$sql);
$count=2;
// Nmae the first coloum the file excel 
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'Name ');
while($row=mysqli_fetch_array()){

$sheet->setCellValue('A'.$count, $row['']);

//count
	$count++;
}

//download file 
$writer = new Xlsx($spreadsheet);

$writer->save('reg.xlsx');
  header('Content-Type: application/vnd.ms-excel');
   header('Content-Disposition: attachment; filename="export.xlsx"');
   $writer->save("php://output");
    exit;