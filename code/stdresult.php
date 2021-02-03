

<?php
// Require composer autoload
use Mpdf\Mpdf;
require_once __DIR__ . '../../mpdf/vendor/autoload.php';
$html='<style>@page {
    margin-top: 1.54cm;
    margin-bottom: 2.54cm;
    margin-left: 1.175cm;
    margin-right: 1cm;
    border:2px solid #000;
   }
   </style>';

   
session_start();
if(isset($_SESSION['class'])){

  $enroll=$_SESSION['enrollment'];
  $name=$_SESSION['username'];
  $class=$_SESSION['class'];
}
else
{
  $enroll=$_POST['enroll'];
  $name=$_POST['name'];
  $class=$_POST['class'];
}
   $con = new mysqli('localhost', 'root', '','quiz');
    if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
    }
    $sql = "SELECT * FROM attend WHERE enroll='$enroll'";
    $result = $con->query($sql);
    $data=array();
    $mpdf = new \Mpdf\Mpdf([
        'default_font_size' => 14,
        'default_font' => 'dejavusans'
    ]);
    $mpdf->WriteHTML($html);
    $mpdf->showWatermarkText="True";
    $mpdf->SetWatermarkText("MMIT",0.2);
    $mpdf->WriteHTML('<h3 style="text-align: center; text-decoration: underline;"; >RESULT</h3>');
    $mpdf->WriteHTML('<br>');
    $mpdf->WriteHTML('<table border="1" width="100%">');
    $mpdf->WriteHTML('<tr>
    <th>Name</th>
    <td >'.$name.'</td>
    </tr>
    <tr>
    <th>Enrollment</th>
    <td >'.$enroll.'</td>
    </tr>
    <tr>
    <th>Class</th>
    <td >'.$class.'</td>
  </tr>');
  $mpdf->WriteHTML('</table>');
  $mpdf->WriteHTML('<br>');
    $mpdf->WriteHTML('<table border="1" width="100%">');
    $mpdf->WriteHTML('<tr>
    <th>Subject</th>
    <th >Test Date</th>
    <th >Marks</th>
  </tr>');
    if ($result->num_rows > 0) {
                    
        while($row = $result->fetch_assoc()) {
            $mpdf->WriteHTML('
            <tr>
            <td>'.$row['testname'].'</td>
            <td>'.$row['udate'].'</td>
            <td>'.$row['marks']."/".$row['total'].'</td>
          </tr>
            ');
            $mpdf->WriteHTML('</table>');
        }
    }
$mpdf->SetDisplayMode('fullpage');
$name=strval($name);
$pdfname=$name.'.pdf';
$mpdf->Output("$pdfname",'I');
?>