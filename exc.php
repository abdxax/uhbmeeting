<?php
require 'vendor/autoload.php';
//require 'control/staf.php';

//require 'control/stad.php';
//$staf=new Staf();
//$subs=$staf->displayData();
$cons=mysqli_connect("localhost","root","","uhbmeeting");
$sql="SELECT * FROM info ";
$res=mysqli_query($cons,$sql);
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'الاسم');
$sheet->setCellValue('B1', 'الجامعة');
$sheet->setCellValue('C1', 'المنصب');
$sheet->setCellValue('D1', 'رقم الجوال');
$sheet->setCellValue('E1', 'البريد الالكتروني ');


$count=2;
/*foreach($subs as $x){
    $sheet->setCellValue('A'.$count, $key['name']);
}*/
while($rows=mysqli_fetch_array($res)){
    $sheet->setCellValue('A'.$count,$rows['name']);
    $sheet->setCellValue('B'.$count, $rows['unviersity']);
    $sheet->setCellValue('C'.$count, $rows['postion']);
   $sheet->setCellValue('D'.$count, $rows['phone']);
    $sheet->setCellValue('E'.$count, $rows['email']);
    
  
    
    
    $count++;

}

$writer = new Xlsx($spreadsheet);
$writer->save('uhb.xlsx');
  header('Content-Type: application/vnd.ms-excel');
   header('Content-Disposition: attachment; filename="export.xlsx"');
   $writer->save("php://output");
    exit;