<?php
$qnos=$_POST['questionnos'];
echo($qnos);
$i=1;
while($i<=$qnos)
{
    $q=$_POST["question_$i"];
    echo($q);
    $i++;
}



?>