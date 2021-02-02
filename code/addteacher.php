<?php
require 'database.php';



// $uploadir="C:/xampp/htdocs/quizs/imgs/facimg/";
// $uploadfile=$uploadir.basename($_FILES["file"]["name"]);

$facname=$_POST["register_teacher_name"];
$facname=ucfirst($facname);

$facfname=$_POST['register_teacher_fname'];
$facfname=ucfirst($facfname);

$facaddn=$_POST['register_teacher_addhar'];
$facaddn=ucfirst($facaddn);

$facdob=$_POST['register_teacher_dob'];

$facemail=$_POST["register_teacher_email"];

$facmob=$_POST["register_teacher_phone"];

$facgender=$_POST["register_teacher_gender"];

$password=$_POST['register_teacher_password'];

$subject=$_POST['register_teacher_subject'];








$filename   = $facname . "-" . time(); 
$extension  = pathinfo( $_FILES["file"]["name"], PATHINFO_EXTENSION ); // jpg
$basename   = $filename . "." . $extension; // 5dab1961e93a7_1571494241.jpg

$source       = $_FILES["file"]["tmp_name"];
$destination  = "C:/xampp/htdocs/quizs/imgs/facimg/{$basename}";
$upic=$basename;

















$con = new mysqli('localhost', 'root', '','quiz');
if ($con->connect_error) {
die("Connection failed: " . $con->connect_error);
}

$sqll = "SELECT * FROM staff";
$result = $con->query($sqll);
$ct=$result->num_rows;
$ct=strval($ct);

if($result->num_rows==0){
	$cdt=date('y');
	$ct='1';
	$ct='000'.$ct;
	$facrsid="HDPS".$cdt.'F'.$ct;
}
else if(strlen($ct)==1){
	$cdt=date('y');
	$ct=$ct+1;
	$ct='000'.$ct;
	$facrsid="HDPS".$cdt.'F'.$ct;
}
else if(strlen($ct)==2){
	$cdt=date('y');
	$ct=$ct+1;
	$ct='00'.$ct;
	$facrsid="HDPS".$cdt.'F'.$ct;

}
else if(strlen($ct)==3){
	$cdt=date('y');
	$ct='0'.$ct;
	$ct=$ct+1;
	$facrsid="HDPS".$cdt.'F'.$ct;
}
else if(strlen($ct)==4){
	$cdt=date('y');
	$ct=$ct;
	$facrsid="HDPS".$cdt.'F'.$ct;
}


$facadate=date('y-m-d');


$sql="INSERT INTO staff (facrsid, facname, facfname, facemail, facmob, facdob, facaddn, facsub, facpass, facadate,facimg,facgender) VALUES('$facrsid','$facname','$facfname','$facemail','$facmob','$facdob','$facaddn','$subject','$password','$facadate','$upic','$facgender')";

$mm=new db_mysql();
$mm->sql_comm($sql);
if(move_uploaded_file($source,$destination))	{
echo("<script>alert('Staff Add Successfully !!'); window.location.href='../templates/admin.php';</script>");
}
else{
    echo("<script>alert('Some thing went Wrong !!'); window.location.href='../templates/admin.php';</script>");
}
?> 