<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MyQuiz</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="icon" type="image/png" sizes="32x32" href="../imgs/webfav.png">
</head>

<body>
    <div class="container-fluid p-0 m-0">
        <div class="header p-0 m-0">
            <div class="row p-0 m-0">
                <div class="col-sm-12 text-center">
                    <h1 class="pt-4">Welcome To MyQuiz</h1>
                </div>
            </div>
        </div>
        <div class="menu">
            <div class="row m-0 p-0">
                <div class="col-sm-12 m-0 p-0">
                    <nav class="navbar navbar-expand-lg navbar-dark">
                        <a class="navbar-brand" href="#">
                            <img src="../imgs/weblogo.png" width="30" height="30" alt="" loading="lazy">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="../templates/index.php">Home <span class="sr-only">(current)</span></a>
                                </li>
                            </ul>
                            <ul class="navbar-nav ml-auto">



                                <?php
                              
                             session_start();
                                if(isset($_SESSION['username'])){
                                echo '<li class="nav-item dropdown active">
                                <a class="nav-link dropdown-toggle" href="#" id="userdrop" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.
                            "Welcome ".$_SESSION['username'].
                          '</a>
                          <div class="dropdown-menu" aria-labelledby="userdrop">
                              <a class="dropdown-item" href="../code/logout.php">Logout</a>
                              
                              </li>';
                            }
                            else{
                          echo'
                                <li class="nav-link">
                                    <a class="btn btn-light" role="button" data-toggle="modal" data-target="#registermodal">
                                    Registrations
                                   </a>
                                </li>
                                <li class="nav-link">
                                    <a role="button" class="btn btn-light" data-toggle="modal" data-target="#login">
                                       Login
                                    </a>
                                </li>';
                                    
                                }
                                
?>
                            </ul>

                        </div>
                    </nav>
                </div>
            </div>




        </div>










        <!-- ?uper -->



        <div class="content">
            <div class="row p-0 m-0">







                <div class="col-sm-12 p-0 m-0">









                    <div class="container pt-3">
                        <div class="card-deck">







                            <?php
                                    $con = new mysqli('localhost', 'root', '','quiz');
                                    $test_name=$_POST['testname'];
                                    if ($con->connect_error) {
                                        die("Connection failed: " . $con->connect_error);
                                    }
                                    if($test_name!=""){
                                        $sql = "SELECT * FROM attend WHERE testname='$test_name'";
                                        $result = $con->query($sql);
                                        if ($result->num_rows > 0) {
                                            
                                            while($row = $result->fetch_assoc()) {
                                            
                                        
                                            echo '
                                            <form action="../code/test.php" method="post">
                                            <div class="card mb-4">
                                                <div class="card-body bg-dark">
                                                    <h4 class="card-title text-warning">Quiz <small class="text-danger">new </small></h4>

                                                    
                                                    <h5 class="card-title">Student :- '.$row["stdname"].' </h5>
                                                    <h5 class="card-title">Marks :- '.$row["marks"].' </h5>
                                                    <h6>Upload On :- <small class="mr-auto"> '.$row["udate"].'</small></h6>
                                                    </div>
                                                    
                                                    </div>
                                                    </form>
                                                    ';
                                            }
                                                // <button class="btn btn-info text-light font-weight-bold" type="submit">Check Out</button>
                                        
                                    
                                    }
                                    }
                                    
                                    else {
                                    // echo "<center><h1>NO TEST FOUND !!!</h1></center>";

                                    $sql = "SELECT * FROM runningtest";
                                    $result = $con->query($sql);
                                    if ($result->num_rows > 0) {
                                        
                                        while($row = $result->fetch_assoc()) {
                                        $timedate=$row['testupdate'];
                                        $time=time_elapsed_string($timedate, true);
                                    
                                        echo '
                                        <form action="../code/test.php" method="post">
                                        <div class="card mb-4">
                                            <div class="card-body bg-dark">
                                                <h4 class="card-title text-warning">Quiz <small class="text-danger">new </small></h4>

                                                <h5 class="card-title">Class :- '.$row["testclass"].'</h5>
                                                <h5 class="card-title">Subject :- '.$row["subjectname"].' ('.$row['testname'] .')</h5>
                                                <h5 class="card-title">Expiry Date :-'.$row["testexpiry"].' </h5>
                                                <h6>Upload On :- <small class="mr-auto">'.$time.'</small></h6>
                                                </div>
                                                <input type="hidden" name="testname" value="'.$row["testname"].'">
                                                </div>
                                                </form>
                                                ';
                                        }
                                            // <button class="btn btn-info text-light font-weight-bold" type="submit">Check Out</button>
                                    
                                
                                }



                                    }
                                    if($result->num_rows == 0){
                                        echo('<h1>No Test Uploaded Yet</h1>');
                                    }
                                    $con->close();
                                    
                                    
                                    ?>









                        </div>
                    </div>













                </div>





            </div>



        </div>

























        <!-- end -->




































































    </div>


    <script src="../js/jquery.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/index.js" async defer></script>

</body>

</html>