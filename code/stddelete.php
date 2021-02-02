<?php
require 'database.php';
$rsid=$_POST['rsid'];
$sql="DELETE FROM users WHERE rsid='$rsid'";
$mm=new db_mysql();
$mm->sql_comm($sql);
?>