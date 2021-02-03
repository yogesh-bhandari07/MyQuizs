<?php
require 'database.php';
$email=$_POST['email'];
$mob=$_POST['mob'];
$_enrol=$_POST['enroll'];
$sql="UPDATE users SET stdmob='$mob',stdemail='$email' WHERE enrollment='$_enrol'";
$mm=new db_mysql();
$mm->sql_comm($sql);
echo('Deleted');
?>