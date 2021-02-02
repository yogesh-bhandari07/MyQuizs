<?php
require 'database.php';







$rsid=$_POST["register_student_rsid"];
$stdname=$_POST["register_student_name"];
$stdname=ucfirst($stdname);
$stdfname=$_POST['register_student_fname'];
$stdfname=ucfirst($stdfname);
$enrollment=$_POST['register_student_enroll'];
$enrollment=ucfirst($enrollment);
$stddob=$_POST['register_student_dob'];
$stdemail=$_POST["register_student_email"];
$stdmob=$_POST["register_student_phone"];
$class=$_POST['register_student_class'];

$filename   = $stdname . "-" . time(); 
$extension  = pathinfo( $_FILES["file"]["name"], PATHINFO_EXTENSION ); // jpg
$basename   = $filename . "." . $extension; // 5dab1961e93a7_1571494241.jpg

$source       = $_FILES["file"]["tmp_name"];
$destination  = "C:/xampp/htdocs/quizs/imgs/userpic/{$basename}";
$upic=$basename;



$sql="UPDATE users SET stdname='$stdname',stdfname='$stdfname',enrollment='$enrollment',stdemail='$stdemail',stdmob='$stdmob',stdclass='$class',stddob='$stddob',stdimg='$upic' WHERE rsid='$rsid'";



$mm=new db_mysql();
$mm->sql_comm($sql);

if(move_uploaded_file($source,$destination))	{
    echo("<script>alert('Student Data Change Successfully !!'); window.location.href='../templates/admin.php';</script>");
    }
    else{
        // echo("<script>alert('Something went Worng !!'); window.location.href='../templates/admin.php';</script>");
        echo('dikkat');
    }








?>