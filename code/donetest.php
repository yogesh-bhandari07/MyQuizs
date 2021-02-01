<?php
require 'database.php';
$qnos=$_POST['questionnos'];
$tablename=$_POST['tablename'];
$test_name=$_POST['testname'];
$i=1;
$q_a = array();
$dt=array();
$r_a=array();
$cr=0;
$in=0;
session_start();
$total=$_SESSION['totalmarks'];
$stdemail=$_SESSION['stdemail'];
$each=$total/$qnos;

$con = new mysqli('localhost', 'root', '','quiz');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}      
$sql = 'SELECT * FROM '.$test_name.'';
$result = $con->query($sql);
            
$qnos=$result->num_rows;
if ($result->num_rows > 0) {
    echo'<form method="POST" action="../code/donetest.php">';
    while($row = $result->fetch_assoc()) {
            $r_a[]=$row['currect'];
            }
}
$con->close();
// $r_a=implode(" ",$r_a);
// echo($r_a);
while($i<=$qnos)
{
    $question=$_POST["question_$i"];
    $ans=$_POST["op_$i"];
    if(in_array($ans,$r_a)){
    $sql="INSERT INTO ".$tablename."(question,choice,currect)VALUES('$question','$ans','Currect')";
        $runquery=new db_mysql();
        $runquery->sql_comm($sql);
    }
    else{
        $sql="INSERT INTO ".$tablename."(question,choice,currect)VALUES('$question','$ans','Incurrect')";
        $runquery=new db_mysql();
        $runquery->sql_comm($sql);
    }
    
    $q_a[]=array("question" => "$question","choice" => "$ans",);
    if($i==$qnos){
        
        foreach($q_a as $cd) {
            // $data ='Q ) '.$cd['question'].' ? Your Choice is   ('.$cd['choice'].') <br>';
            if(in_array($cd['choice'],$r_a)){
                $data='Q ) '.$cd['question'].' ? Your Choice is  '.$cd['choice'].' (Your is Currect) <br>';
                $cr=$cr+$each;
            }
            else{
                $data='Q ) '.$cd['question'].' ? Your Choice is  '.$cd['choice'].' (Your is Incurrect) <br>';
                
            }
            $dt[]=$data;
        }
        
        ;
        $dt=implode(" ",$dt);
        
        
        $to_email = "$stdemail";
        $subject = "MyQuiz Test";
        $body = "Hi, This Your Test Has Been Submited Successfully Your Result is $cr and Your Performance is \n $dt";
        $headers = "From:kiratkumar9062@gmail.com";
        
        if (mail($to_email, $subject, $body, $headers)) {
            echo("<script>alert('Test Has Been Submited You Got $cr / $total');window.location.href='../templates/index.php'</script>");
        } else {
            echo("<script>alert('Test Has Been Submited You Got $cr / $total');window.location.href='../templates/index.php'</script>");
        }

        
    }


    $i++;

}
$user=$_SESSION['username'];
$cdate=date("y-m-d");
$sqllll="INSERT INTO attend(testname,stdname,udate,marks)VALUES('$test_name','$user','$cdate','$cr')";
$runqueryy=new db_mysql();
$runqueryy->sql_comm($sqllll);

?>