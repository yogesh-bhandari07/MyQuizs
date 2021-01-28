<?php
include 'database.php';
$uploadir="C:/xampp/htdocs/quizs/imgs/userpic/";
$uploadfile=$uploadir.basename($_FILES["file"]["name"]);
$stdname=$_POST["register_student_name"];
$stdname=ucfirst($stdname);
$stdfname=$_POST['register_student_fname'];
$stdfname=ucfirst($stdfname);
$enrollment=$_POST['register_student_enroll'];
$enrollment=ucfirst($enrollment);
$stddob=$_POST['register_student_dob'];
$stdemail=$_POST["register_student_email"];
$stdmob=$_POST["register_student_phone"];
$stdgender=$_POST["register_student_gender"];
$password=$_POST['register_student_password'];
$class=$_POST['register_student_class'];
$upic=$_FILES["file"]["name"];
$sql="insert into users values('$enrollment','$stdname','$stdfname','$stdmob','$stdemail','$stddob','$stdgender','$upic','$password','$class')";
$runquery=new db_mysql();
$runquery->sql_comm($sql);
if(move_uploaded_file($_FILES["file"]["tmp_name"],$uploadfile))	{
	echo "<script>alert('Thanks For Register');window.location.href='../templates/index.php'</script>";
}
else{
	echo "<script>alert('Something Wrong Please Try Again');window.location.href='../templates/index.php'</script>";
}
?>