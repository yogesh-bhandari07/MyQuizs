<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MyQuiz</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/starttest.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="icon" type="image/png" sizes="32x32" href="../imgs/webfav.png">
</head>

<body>
    <div class="card\r">
        <?php
        // require 'database.php';
        class db_mysql{
    
            function sql_comm($sql){
                $servername = "localhost";
                $username = "root";
                $password = "";
                $db= "quiz";
                $conn = mysqli_connect($servername, $username, $password,$db);
                if (!$conn) {
                  die("Connection failed: " . mysqli_connect_error());
                }
                if (mysqli_query($conn, $sql)) {
                            
                            return;
                          } else {
                            die("This User Already Performed This test !!!");
                          }
            }
        }




        session_start();
        echo'<div class="card-header bg-dark text-light font-weight-bold text-center">';
        $testname=$_POST['subject'];
        $tn=str_replace(" ","_",$testname);
        
        $usern=$_SESSION['username'];
        $usern=str_replace(" ","_",$usern);
        $tablename='Attend_'.$tn.'_'.$usern.'';
        
        $sql="CREATE TABLE $tablename(
            qno INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        question VARCHAR(150) NOT NULL,
        choice VARCHAR(150) NOT NULL
        )";
        $runquery=new db_mysql();
        $runquery->sql_comm($sql);
        $testname=strtok($testname, " ");
        echo($testname);
        echo'</div>';
        echo'<div class="card-body ">';
            $con = new mysqli('localhost', 'root', '','quiz');
            if ($con->connect_error) {
                die("Connection failed: " . $con->connect_error);
            }      
            $sql = "SELECT * FROM $testname";
            $result = $con->query($sql);
            
            $qnos=$result->num_rows;
            

            if ($result->num_rows > 0) {
                
                echo'<form method="POST" action="../code/donetest.php">';
                while($row = $result->fetch_assoc()) {
                echo '
            <h6 class="card-title"> Q - '.$row['qno'].') '.$row['question'].'?</h6>
            <input type="hidden" name="question_'.$qnos.'" id="question_'.$qnos.'" value="'.$row['question'].'" >
            <input type="hidden" name="questionnos" id="questionnos" value="'.$qnos.'" >
            <input type="radio" id="op_'.$row['qno'].'" name="op_'.$row['qno'].'" value="'.$row['option1'].'" >
            <label for="'.$row['qno'].'">'.$row['option1'].'</label><br>

            <input type="radio" id="op_'.$row['qno'].'" name="op_'.$row['qno'].'" value="'.$row['option2'].'">
            <label for="'.$row['qno'].'">'.$row['option2'].'</label><br>

            <input type="radio" id="op_'.$row['qno'].'" name="op_'.$row['qno'].'" value="'.$row['option3'].'">
            <label for="'.$row['qno'].'">'.$row['option3'].'</label><br>

            <input type="radio" id="op_'.$row['qno'].'" name="op_'.$row['qno'].'" value="'.$row['option4'].'">
            <label for="'.$row['qno'].'">'.$row['option4'].'</label>
                ';
                echo('<div class="dropdown-divider"></div>');
            
            }
            echo'<center><button type="submit" class="btn btn-success">Submit</button></center>
            </form>';
            } else {
            echo "<center><h1>NO TEST FOUND !!!</h1></center>";
            }
            $con->close();

?>
    </div>

   

    </div>








    <script src="../js/jquery.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/starttest.js" async defer></script>
</body>

</html>