<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MyQuiz</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/myquiz.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="icon" type="image/png" sizes="32x32" href="../imgs/webfav.png">
</head>

<body>
    <div class="container-fluid p-0 m-0">
        <div class="header">
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







        <div class="content">
            <div class="container pt-4 pb-4">
                <h3 class="text-center mb-3">Fill Details Carefully</h3>
                <ol>
                    <h6>Notice :-</h6>
                    <li>
                        Once you start your test, you will have to submit.
                    </li>
                    <li>
                        Taking the test keeping in mind the time.
                    </li>
                    <li>
                        You can attend the test only once.
                    </li>
                    <li>

                        After submission your answer key will be sent to your email id.
                    </li>
                </ol>

                <br>
                <div class="row p-0 m-0">




                    <?php 
                    
                    echo '
                    <div class="col-sm-6">
                        <form action="../code/starttest.php" method="post">
                            <label for="enrollment">Enrollment</label>
                            <input type="text" disabled class="form-control" id="enrollment" name="enrollment" value="'.$_SESSION["enrollment"].'">
                            
                            <label for="stdclass">Class</label>
                            <input type="text" disabled id="stdclass" name="stdclass" class="form-control" value="'.$_SESSION["class"].'">
                    </div>
                    <div class="col-sm-6">
                        <label for="stdname">Name</label>
                        <input type="text" id="stdname" name="stdname" disabled class="form-control" value="'.$_SESSION["username"].'">   
                        
                        <label for="subject">Subjects</label>
                        <select id="subject" name="subject" class="form-control " id="subject">
                           
                        ';
                        
                        
                        $con = new mysqli('localhost', 'root', '','quiz');
                        if ($con->connect_error) {
                            die("Connection failed: " . $con->connect_error);
                        }
                        
                        $sql = 'SELECT * FROM runningtest where testclass='.$_SESSION["class"];
                        $result = $con->query($sql);
                        if ($result->num_rows > 0) {
                            
                            while($row = $result->fetch_assoc()) {

                                echo'<option value="'.$row["testname"].' '.$row['subjectname'].'" class="text-dark">'.str_replace("_"," ",$row['testname']).'</option>';

                            }
                            
                        }                            
                        else{
                            echo'<option value="No Test Available Now">No Test Available Now</option>';
                        }
                          echo'</select>
                           <Button class="btn btn-success mt-4 " type="submit">Next</Button>
                        </form>
                    </div>';
?>

                </div>
            </div>
        </div>

    </div>




    <script src="../js/jquery.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/myquiz.js" async defer></script>
</body>

</html>