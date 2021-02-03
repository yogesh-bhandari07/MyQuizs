<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MyQuiz</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="icon" type="image/png" sizes="32x32" href="../imgs/webfav.png">
</head>

<body>
    <div class="container-fluid p-0 m-0">
        <div class="header">
            <div class="col-sm-12 text-center">
                <h1 class="pt-4">Welcome To Admin Zone</h1>
            </div>
        </div>









        <div class="menu">


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

        <!-- uper -->





        <div class="content ">
            <div class="row p-0 m-0">
                <div class="col-sm-2 p-1">
                    <div class="sidenav">
                        <a style="color:yellowgreen;" href="../templates/admin.php">Admin</a>
                        <a href="../code/student.php">Students</a>
                        <a href="../templates/runningtest.php">Running Test</a>
                        <a href="../code/attend.php">Attend Test</a>
                        <a href="../templates/addstaff.php">Add Staff</a>
                        <a href="../templates/staff.php">Staff</a>
                        <a href="../code/astdresult.php">Result</a>    
                        
                    </div>




                </div>
                <div class="col-sm-10">

                    <h4 class="text-center">Create Your Question Paper</h4>
                    <form action="../code/mtable.php" method="post">
                        <div class="row pt-4 m-0">
                            <div class="col-sm-6">
                                <label for="tsubject">Subject</label>
                                <input type="text" name="tsubject" id="tsubject" required class="form-control" placeholder="Subject">
                                <label for="tename">Teacher Name</label>
                                <input type="text" name="tename" id="tename" required class="form-control" placeholder="Teacher Name">
                                <label for="texdate">Expiry Date</label>
                                <input type="date" name="texdate" id="texdate" required class="form-control">
                                <label for="noq">Number Questions</label>
                                <input type="number" name="noq" id="noq" required class="form-control" placeholder="Number of Questions">
                            </div>
                            <div class="col-sm-6">
                                <label for="tname">Test Name</label>
                                <input type="text" name="tname" id="tname" required class="form-control" placeholder="Test Name">
                                <label for="tclass">Class</label>
                                <!-- <input type="text" name="tclass" id="tclass" required class="form-control" placeholder="Class"> -->
                                <select name="tclass" id="tclass" class="form-control">
                                    <option value="5" class="text-dark">5</option>
                                    <option value="6" class="text-dark">6</option>
                                    <option value="7" class="text-dark">7</option>
                                    <option value="8" class="text-dark">8</option>
                                    <option value="9" class="text-dark">9</option>    
                                </select>
                                <label for="ttime">Test Time</label>
                                <select name="ttime" id="ttime" class="form-control">
                            <option value="15" class="text-dark">15 Minute</option>
                            <option value="20" class="text-dark">20 Minute</option>
                            <option value="20" class="text-dark">20 Minute</option>
                            <option value="20" class="text-dark">20 Minute</option>
                            <option value="25" class="text-dark">25 Minute</option>
                            <option value="30" class="text-dark">30 Minute</option>
                            <option value="35" class="text-dark">35 Minute</option>
                            <option value="40" class="text-dark">40 Minute</option>
                            <option value="45" class="text-dark">45 Minute</option>
                            <option value="50" class="text-dark">50 Minute</option>
                            <option value="60" class="text-dark">60 Minute</option>
                            <option value="90" class="text-dark">90 Minute</option>
                            <option value="120" class="text-dark">120 Minute</option>
                            <option value="150" class="text-dark">150 Minute</option>
                            <option value="180" class="text-dark">180 Minute</option>
                        </select>
                                <label for="tmarks">Total Marsk</label>
                                <input type="text" name="tmarks" id="tmarks" required class="form-control" placeholder="Total Marks">
                                <button type="submit" class="btn btn-success mt-4">Next</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>













































        <!-- this ned -->

    </div>
</body>



<script src="../js/jquery.js"></script>
<script src="../js/popper.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/admin.js" async defer></script>


</html>