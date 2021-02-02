//<?php
// $uploadir="C:/xampp/htdocs/quizs/imgs/userpic/";
// $uploadfile=$uploadir.basename($_FILES["file"]["name"]);
// $stdname=$_POST["register_student_name"];
// $stdname=ucfirst($stdname);
// $stdfname=$_POST['register_student_fname'];
// $stdfname=ucfirst($stdfname);
// $enrollment=$_POST['register_student_enroll'];
// $enrollment=ucfirst($enrollment);
// $stddob=$_POST['register_student_dob'];
// $stdemail=$_POST["register_student_email"];
// $stdmob=$_POST["register_student_phone"];
// $stdgender=$_POST["register_student_gender"];
// $password=$_POST['register_student_password'];
// $class=$_POST['register_student_class'];
// $upic=$_FILES["file"]["name"];
// $sql="insert into users values('$enrollment','$stdname','$stdfname','$stdmob','$stdemail','$stddob','$stdgender','$upic','$password','$class')";
// $runquery=new db_mysql();
// $runquery->sql_comm($sql);
// if(move_uploaded_file($_FILES["file"]["tmp_name"],$uploadfile))	{
	
// 	echo "<script>alert('Thanks For Register');window.location.href='../templates/index.php'</script>";

// }
// else{
// 	echo "<script>alert('Something Wrong Please Try Again');window.location.href='../templates/index.php'</script>";
// }

// session_start();
// $order_id=$_SESSION['ORDERID'];
// $status=$_SESSION['STATUS'];
// $amount=$_SESSION['AMOUNT'];
// $date=$_SESSION['DATE'];
// $respmsg=$_SESSION['respmsg'];


			
// $upic=$_SESSION['upic'];
// $stdname=$_SESSION['stdname'];
// $stdfname=$_SESSION['stdfname'];
// $stddob=$_SESSION['stddob'];
// $enrollment=$_SESSION['enrollment'];
// $stdemail=$_SESSION['stdemail'];
// $stdmob=$_SESSION['stdmob'];
// $stdgender=$_SESSION['stdgender'];
// $password=$_SESSION['password'];
// $stdclass=$_SESSION['stdclass'];
// $uploadir="C:/xampp/htdocs/quizs/imgs/userpic/";
// $uploadfile=$uploadir.basename($upic);
// $sql="insert into users values('$enrollment','$stdname','$stdfname','$stdmob','$stdemail','$stddob','$stdgender','$upic','$password','$stdclass','$order_id','$amount','$respmsg','$date')";
// $runquery=new db_mysql();
// $runquery->sql_comm($sql);
// if(move_uploaded_file($_FILES["file"]["tmp_name"],$uploadfile))	{

// echo "<script>alert('Your Ragistration is Successfully Done Your');window.location.href='../templates/index.php'</script>";
// // session_destroy();
// }
// else{
// echo "<script>alert('Something Wrong Please Try Again');window.location.href='../templates/index.php'</script>";

// }
// ?>







<?php
// Require composer autoload

use Mpdf\Mpdf;

require_once __DIR__ . '../../mpdf/vendor/autoload.php';
$html='<style>@page {
    margin-top: 2.54cm;
    margin-bottom: 2.54cm;
    margin-left: 3.175cm;
    margin-right: 3.175cm;

    
    
    
    
    border:2px solid #000;
   }</style>';


session_start();
$orid=$_SESSION['oid'];
   $con = new mysqli('localhost', 'root', '','quiz');
// Check connection
    if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
    }

    $sql = "SELECT * FROM users WHERE txtorderid='$orid'";
    $result = $con->query($sql);
    $data=array();
    // Create an instance of the class:
    $mpdf = new \Mpdf\Mpdf([
        'default_font_size' => 14,
        'default_font' => 'dejavusans'
    ]);
    // Write some HTML code:
    // $mpdf=new mPDF('','A4');
    $mpdf->WriteHTML($html);
    $mpdf->showWatermarkText="True";
    $mpdf->SetWatermarkText("MMIT",0.2);
    
    
    $mpdf->WriteHTML('<h1>Registration Payment Slip</h1>');
    $mpdf->WriteHTML('<hr>');
    
    $mpdf->WriteHTML('<br>');
    $mpdf->WriteHTML('<br>');

    if ($result->num_rows > 0) {
                    
        while($row = $result->fetch_assoc()) {

            $txtid=$row['txtorderid'];
            $respmsg=$row['respmsg'];
            $stdname=$row['stdname'];
            $stdfname=$row['stdfname'];
            $stdclass=$row['stdclass'];
            $enrollment=$row['enrollment'];
            $rsid=$row['rsid'];
            $amount=$row['amount'];
            $txndate=$row['txndate'];


        }



    }




$mpdf->WriteCell(90,20,"Transaction ID :- ",0,0,'L');
$mpdf->WriteCell(90,20,"$txtid",0,1,'C');

$mpdf->WriteCell(90,20,"Status :- ",0,0,'L');
$mpdf->WriteCell(90,20,"$respmsg",0,1,'C');

$mpdf->WriteCell(90,20,"Student Name :- ",0,0,'L');
$mpdf->WriteCell(90,20,"$stdname",0,1,'C');

$mpdf->WriteCell(90,20,"Father Name :- ",0,0,'L');
$mpdf->WriteCell(90,20,"$stdfname",0,1,'C');

$mpdf->WriteCell(90,20,"Class :- ",0,0,'L');
$mpdf->WriteCell(90,20,"$stdclass",0,1,'C');

$mpdf->WriteCell(90,20,"Roll Number :- ",0,0,'L');
$mpdf->WriteCell(90,20,"$enrollment",0,1,'C');

$mpdf->WriteCell(90,20,"Registration Number :- ",0,0,'L');
$mpdf->WriteCell(90,20,"$rsid",0,1,'C');


$mpdf->WriteCell(90,20,"Amount :- ",0,0,'L');
$mpdf->WriteCell(90,20,"$amount",0,1,'C');


$mpdf->WriteCell(90,20,"Transaction Date :- ",0,0,'L');
$mpdf->WriteCell(90,20,"$txndate",0,1,'C');


$mpdf->SetDisplayMode('fullpage');
$stdname=strval($stdname);
$pdfname=$stdname.'.pdf';
unset($_SESSION['oid']);
$mpdf->Output("$pdfname",'I');

  

?>