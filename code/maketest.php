<?php
require 'database.php';

$question=$_POST['question'];
$question=ucfirst($question);
// right answer
$ranswer=$_POST['ranswer'];
$rans=str_replace(" ","",$ranswer);
$rans=strtolower($rans);
//option1
$option_1=$_POST['option_1'];
$opt1=str_replace(" ","",$option_1);
$opt1=strtolower($opt1);
//option2
$option_2=$_POST['option_2'];
$opt2=str_replace(" ","",$option_2);
$opt2=strtolower($opt2);
//option3
$option_3=$_POST['option_3'];
$opt3=str_replace(" ","",$option_3);
$opt3=strtolower($opt3);
//option4
$option_4=$_POST['option_4'];
$opt4=str_replace(" ","",$option_4);
$opt4=strtolower($opt4);
//get How many numbers of questions
$qno=$_POST['qno'];
session_start();
$test_name=$_SESSION['table'];
if($rans==$opt1 || $rans==$opt2 || $rans==$opt3 || $rans==$opt4){
$sql="
INSERT INTO ".$test_name."(question,option1,option2,option3,option4,currect)VALUES('$question','$option_1','$option_2','$option_3','$option_4','$ranswer')
";
$m=new db_mysql();
$m->sql_comm($sql);
$qno--;
echo($qno);
}
else{
    echo("Please Enter Currect Right Answer or Options $rans $opt1 $opt2 $opt3 $opt4");

}
?>