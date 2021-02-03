<?php
require 'database.php';







$rsid=$_POST["register_student_rsid"];

$facname=$_POST["register_student_name"];
$facname=ucfirst($facname);

$facfname=$_POST['register_student_fname'];
$facfname=ucfirst($facfname);

$enrollment=$_POST['register_student_enroll'];
$enrollment=ucfirst($enrollment);

$facdob=$_POST['register_student_dob'];

$facemail=$_POST["register_student_email"];

$facmob=$_POST["register_student_phone"];

$class=$_POST['register_student_class'];

$facname=str_replace(" ","_",$facname);

$filename   = $facname . "-" . time(); 
$extension  = pathinfo( $_FILES["file"]["name"], PATHINFO_EXTENSION ); // jpg
$basename   = $filename . "." . $extension; // 5dab1961e93a7_1571494241.jpg

$source       = $_FILES["file"]["tmp_name"];
$destination  = "C:/xampp/htdocs/quizs/imgs/facimg/{$basename}";
$upic=$basename;


$facname=str_replace("_"," ",$facname);
$sql="UPDATE staff SET facname='$facname',facfname='$facfname',facaddn='$enrollment',facemail='$facemail',facmob='$facmob',facsub='$class',facdob='$facdob',facimg='$upic' WHERE facrsid='$rsid'";



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