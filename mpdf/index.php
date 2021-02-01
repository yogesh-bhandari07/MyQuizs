<?php
// Require composer autoload

use Mpdf\Mpdf;

require_once __DIR__ . '/vendor/autoload.php';
$html='<style>@page {
    margin-top: 2.54cm;
    margin-bottom: 2.54cm;
    margin-left: 3.175cm;
    margin-right: 3.175cm;
    border:2px solid #000;
   }</style>';



// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf([
    'default_font_size' => 14,
	'default_font' => 'dejavusans'
]);
// Write some HTML code:
// $mpdf=new mPDF('','A4');
$mpdf->WriteHTML($html);
$mpdf->showWatermarkText="True";
$mpdf->SetWatermarkText("MMIT",0.3);


$mpdf->WriteHTML('<h1>Registration Payment Slip</h1>');
$mpdf->WriteHTML('<hr>');
$mpdf->WriteHTML('<br>');
$mpdf->WriteHTML('<br>');


$mpdf->WriteCell(90,20,"Hello WOrld $tx",0,0,'L');
$mpdf->WriteCell(90,20,"Hello WOrld",0,1,'C');

$mpdf->WriteCell(90,20,"Hello WOrld $tx",0,0,'L');
$mpdf->WriteCell(90,20,"Hello WOrld",0,1,'C');

$mpdf->WriteCell(90,20,"Hello WOrld $tx",0,0,'L');
$mpdf->WriteCell(90,20,"Hello WOrld",0,1,'C');

$mpdf->WriteCell(90,20,"Hello WOrld $tx",0,0,'L');
$mpdf->WriteCell(90,20,"Hello WOrld",0,1,'C');

$mpdf->WriteCell(90,20,"Hello WOrld $tx",0,0,'L');
$mpdf->WriteCell(90,20,"Hello WOrld",0,1,'C');

$mpdf->WriteCell(90,20,"Hello WOrld $tx",0,0,'L');
$mpdf->WriteCell(90,20,"Hello WOrld",0,1,'C');

$mpdf->WriteCell(90,20,"Hello WOrld $tx",0,0,'L');
$mpdf->WriteCell(90,20,"Hello WOrld",0,1,'C');

$mpdf->WriteCell(90,20,"Hello WOrld $tx",0,0,'L');
$mpdf->WriteCell(90,20,"Hello WOrld",0,1,'C');


$mpdf->SetDisplayMode('fullpage');
$mpdf->Output();
?>