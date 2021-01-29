<?php
require 'database.php';
$subject_name=$_POST["tsubject"];
$subject_name=ucfirst($subject_name);
$teacher_name=$_POST["tename"];
$teacher_name=ucfirst($teacher_name);
$test_name=$_POST["tname"];
$subject_name=str_replace(" ","_",$subject_name);
$test_name=str_replace(" ","_",$test_name);
$test_name=str_replace("!","_",$test_name);
$test_name=str_replace("~","_",$test_name);
$test_name=str_replace("`","_",$test_name);
$test_name=str_replace("#","_",$test_name);
$test_name=str_replace("@","_",$test_name);
$test_name=str_replace("$","_",$test_name);
$test_name=str_replace("%","_",$test_name);
$test_name=str_replace("^","_",$test_name);
$test_name=str_replace("&","_",$test_name);
$test_name=str_replace("*","_",$test_name);
$test_name=str_replace("(","_",$test_name);
$test_name=str_replace(")","_",$test_name);
$test_name=str_replace("-","_",$test_name);
$test_name=str_replace("=","_",$test_name);
$test_name=str_replace("+","_",$test_name);
$test_name=str_replace(":","_",$test_name);
$test_name=str_replace("<","_",$test_name);
$test_name=str_replace(">","_",$test_name);
$test_name=str_replace("?","_",$test_name);
$test_name=str_replace("/","_",$test_name);
$test_name=str_replace("'","_",$test_name);
$test_name=str_replace(",","_",$test_name);
$test_name=str_replace(".","_",$test_name);
$test_name=str_replace("|","_",$test_name);
$test_name=str_replace("'\'","_",$test_name);
$test_name=str_replace("{","_",$test_name);
$test_name=str_replace("}","_",$test_name);
$test_name=str_replace("[","_",$test_name);
$test_name=str_replace("]","_",$test_name);
$test_name=str_replace(";","_",$test_name);


// this is new
$test_name=$subject_name.'_'.$test_name;
// 
$test_name=ucfirst($test_name);
$total_marks=$_POST["tmarks"];
$test_class=$_POST["tclass"];
$test_time=$_POST["ttime"];
$test_expiry=$_POST["texdate"];
$qno=$_POST['noq'];
session_start();
$_SESSION['qno']=$qno;
$_SESSION['table']=$test_name;
$current_date=date("y-m-d");
if($test_name!=""){
$sql="CREATE TABLE $test_name(
    qno INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    question varchar(150) NOT NULL,
    option1 varchar(150) NOT NULL,
    option2 varchar(150) NOT NULL,
    option3 varchar(150) NOT NULL,
    option4 varchar(150) NOT NULL,
    currect varchar(150) NOT NULL)";
    $runquery=new db_mysql();
    $runquery->sql_comm($sql);
    $sqll="INSERT INTO runningtest(subjectname,teachername,testname,totalmarks,testtime,testexpiry,testclass)VALUES('$subject_name','$teacher_name','$test_name','$total_marks','$test_time','$test_expiry','$test_class')";
    $runquery=new db_mysql();
    $runquery->sql_comm($sqll);
echo("<script>window.location.href='../templates/make.php';</script>");
}
  ?>