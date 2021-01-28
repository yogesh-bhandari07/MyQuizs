<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MyQuiz</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/test.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="icon" type="image/png" sizes="32x32" href="../imgs/webfav.png">
</head>

<body>

    <div class="card\r">
        <?php
        echo'<div class="card-header bg-dark text-light font-weight-bold text-center">';
        $testname=$_POST['testname'];
        echo($testname);
        echo'<input type="hidden" id="test"  value="'.$testname.'">';
        echo'<btuuon href="../templates/runningtest.php" class="btn btn-danger ml-5 " onclick="test_delete()">Delete</btuuon>';
        echo'</div>';
        echo'<div class="card-body ">';
            $con = new mysqli('localhost', 'root', '','quiz');
            if ($con->connect_error) {
                die("Connection failed: " . $con->connect_error);
            }
            
            $sql = "SELECT * FROM $testname";
            $result = $con->query($sql);
            if ($result->num_rows > 0) {
                
                while($row = $result->fetch_assoc()) {
                echo '
            
            <h6 class="card-title"> Q - '.$row['qno'].') '.$row['question'].'?</h6>
            <input type="radio" id="option_1">
            <label for="option_1">'.$row['option1'].'</label><br>
            <input type="radio" id="option_2">
            <label for="option_2">'.$row['option2'].'</label><br>
            <input type="radio" id="option_3">
            <label for="option_3">'.$row['option3'].'</label><br>
            <input type="radio" id="option_4">
            <label for="option_4">'.$row['option4'].'</label>
                ';
                echo('<div class="dropdown-divider"></div>');
            
            }
            } else {
            echo "<center><h1>NO TEST FOUND !!!</h1></center>";
            }
            $con->close();

?>
    </div>

    <center><a href="../templates/runningtest.php" class="btn btn-primary">Go Back</a></center>

    </div>








    <script src="../js/jquery.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/test.js" async defer></script>
</body>

</html>