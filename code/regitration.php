<?php
include 'database.php';
// $sql_connections=new db_mysql($query);
// $sql_connections->sql_comm($query);


$uploadir="C:\xampp\htdocs\quizs\imgs\userpic";
$uploadfile=$uploadir.basename($_FILES["file"]["name"]);
$name=$_POST["register_student_name"];
$email=$_POST["register_student_email"];
$dob=$_POST["register_student_dob"];
$mob=$_POST["register_student_number"];
$vpic=$_FILES["file"]["name"];
$dt=date('d/m/Y');
$cmd="insert into volunteer values('$userid','$name','$email','$dob','$mob','$password','$vpic','$dt')";
$sql_connections=new db_mysql($query);
$sql_connections->sql_comm($cmd);
if($x==true)
{
if(move_uploaded_file($_FILES["file"]["tmp_name"],$uploadfile))	
{
	echo "<script>alert('Thanks for Joining Us');window.location.href='../templates/index.php'</script>";
}
}
else
{
	echo "<script>alert('Your Request is Not Completed');window.location.href='../templates/index.php'</script>";
}

?>

kaha