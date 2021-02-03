<?php
require 'database.php';
$rsid=$_POST['rsid'];
$sql="DELETE FROM staff WHERE facrsid='$rsid'";
$mm=new db_mysql();
$mm->sql_comm($sql);
?>