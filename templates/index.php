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
                                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                                </li>
                              

                                <?php
                                session_start();
                                if(isset($_SESSION['email'])){

                                    echo'
                                <li class="nav-item active">
                                    <a class="nav-link" href="../templates/admin.php">Admin Zone</a>
                                </li>';
                            }
                            else  if(isset($_SESSION['username'])){
                                echo'
                                <li class="nav-item active">
                                    <a class="nav-link" href="../templates/myquiz.php">Quizs</a>
                                </li>';
                            }
                            else{
                                echo "";
                            }
                                ?>
                            </ul>
                            <ul class="navbar-nav ml-auto">



                                <?php
                              
                                // session_start();
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


function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'y',
        'm' => 'm',
        'w' => 'w',
        'd' => 'd',
        'h' => 'h',
        'i' => 'm',
        's' => 'sec',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}



                                    $con = new mysqli('localhost', 'root', '','quiz');
                                    if ($con->connect_error) {
                                        die("Connection failed: " . $con->connect_error);
                                    }
                                    if(isset($_SESSION['class'])){
                                        $class=$_SESSION['class'];
                                        
                                        // $sql = "SELECT * FROM runningtest";
                                        $sql = "SELECT * FROM runningtest WHERE testclass='$class'";
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
    <!-- Registration form -->
    <div class="modal fade bg-dark" id="registermodal" tabindex="-1" aria-labelledby="#registermodal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content  rounded" style="border: 3px solid #EEE">
                <div class="modal-header bg-dark">

                    <h5>Candidate Registration</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body bg-dark">

                    <div class="row mt-3">

                        <div class="col-sm-2"></div>
                        <div class="col-sm-8">
                            <form action="../code/regitration.php" method="POST" enctype="multipart/form-data">

                                <center>
                                    <img id="output_img" src="../imgs/user.jpg" style="border: 5px solid #EEE;" width="150" height="150" class=" rounded-circle" alt=""><br>
                                    <input class="btn btn-info" id="register_student_img" name="file" type="file" accept="image/*" onchange="preview_image(event)">
                                </center>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="register_student_name">Name</label>
                                        <input type="text" id="register_student_name" name="register_student_name" class="form-control" placeholder="Enter Your Name" required>

                                        <label for="register_student_email">Email ID</label>
                                        <input type="email" id="register_student_email" name="register_student_email" class="form-control" placeholder="Example@gmail.com" required>
                                        <label for="register_student_enroll">Enrollment</label>
                                        <input type="text" id="register_student_enroll" name="register_student_enroll" class="form-control" placeholder="Enrollment Number" required>

                                        <label for="register_student_dob">D.O.B</label>
                                        <input type="date" id="register_student_dob" placeholder="Enter Your D.O.B" name="register_student_dob" class="form-control" required>

                                        <label for="gender" class="mb-2">Gender</label>
                                        <div id="gender">
                                            <input type="radio" id="male" name="register_student_gender" value="m">
                                            <label for="male">Male</label>
                                            <input type="radio" id="female" name="register_student_gender" value="f">
                                            <label for="female">Female</label>
                                            <input type="radio" id="other" name="register_student_gender" value="o">
                                            <label for="other">Other</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">

                                        <label for="register_student_fname">Father Name</label>
                                        <input type="text" id="register_student_fname" placeholder="Enter Your Father Name" name="register_student_fname" class="form-control" required>
                                        <label for="register_student_phone">Mobile Number</label>
                                        <input type="text" id="register_student_phone" placeholder="Enter Your Mobile Number" name="register_student_phone" class="form-control" required>
                                        <label for="register_student_password">Password</label>
                                        <input type="password" id="register_student_password" name="register_student_password" class="form-control" placeholder="Password" required>
                                        <label for="register_student_class">Class</label>
                                        <select class="form-control" name="register_student_class" id="register_student_class">
                                            <option  class="text-dark" value="1">1</option>
                                            <option  class="text-dark" value="2">2</option>
                                            <option  class="text-dark" value="3">3</option>
                                            <option  class="text-dark" value="4">4</option>
                                            <option  class="text-dark" value="5">5</option>
                                            <option class="text-dark"  value="6">6</option>
                                            <option class="text-dark"  value="7">7</option>
                                            <option  class="text-dark" value="8">8</option>
                                        </select>





                                        <button class="btn btn-success float-left mt-3 ml-auto" type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Login modal -->
    <div class="modal fade bg-dark" id="login" tabindex="-1" aria-labelledby="login" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content  " style="border: 3px solid #EEE">
                <div class="modal-header bg-dark">

                    <h5>Student Login</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
     </button>
                </div>
                <div class="modal-body bg-dark">
                    <div class="row mt-3">

                        <div class="col-sm-2"></div>
                        <div class="col-sm-8">
                            <form action="../code/login.php" method="POST">

                                <label for="username">Username</label>
                                <input type="text" placeholder="Username" id="username" name="username" class="form-control" required>
                                <label for="password">Password</label>
                                <input type="password" id="password" placeholder="Password" name="password" class="form-control mb-3" required>
                                <center><a role='button' data-toggle="modal" data-target="#changepass">Forget Password</a></center>
                                <button class="btn btn-success float-right mt-2" type="submit">Login</button>
                            </form>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="../js/jquery.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/index.js" async defer></script>

</body>

</html>