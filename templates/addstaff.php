<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MyQuiz</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/addstaff.css">
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















    <div class="content">
        <div class="row p-0 m-0">
            <div class="col-sm-2 p-1">
                <div class="sidenav">
                <a href="../templates/admin.php">Admin</a>
                        <a href="../code/student.php">Students</a>
                        <a href="../templates/runningtest.php">Running Test</a>
                        <a href="../code/attend.php">Attend Test</a>
                        <a href="../templates/addstaff.php">Add Staff</a>
                        <a href="../templates/staff.php">Staff</a>
                </div>
            </div>






            <div class="col-sm-10 p-0 m-0">


            <div class="card bg-dark m-3">
                <div class="card-header">
                  <h2 class="text-center">Staff Registrations</h2>

                </div>
                <div class="card-body">
                    <form action="../code/addteacher.php" method="POST" enctype="multipart/form-data">
                
                        <center>
                            <img id="output_img" src="../imgs/user.jpg" style="border: 5px solid #EEE;" width="150" height="150" class=" rounded-circle" alt=""><br>
                            <input class="btn btn-info" id="register_teacher_img" name="file" type="file" accept="image/*" onchange="preview_image(event)">
                        </center>

                        <div class="row">
                            <div class="col-sm-6">
                                <label for="register_teacher_name">Name</label>
                                <input type="text" id="register_teacher_name" name="register_teacher_name" class="form-control" placeholder="Enter Your Name" required>

                                <label for="register_teacher_email">Email ID</label>
                                <input type="email" id="register_teacher_email" name="register_teacher_email" class="form-control" placeholder="Example@gmail.com" required>
                                

                                <label for="register_teacher_dob">D.O.B</label>
                                <input type="date" id="register_teacher_dob" placeholder="Enter Your D.O.B" name="register_teacher_dob" class="form-control" required>


                                <label for="register_teacher_subject">Subject</label>
                                <input type="text" id="register_teacher_subject" name="register_teacher_subject" class="form-control" placeholder="Subject" required>
                                


                                <label for="gender" class="mb-2">Gender</label>
                                <div id="gender">
                                    <input type="radio" id="male" name="register_teacher_gender" value="m">
                                    <label for="male">Male</label>
                                    <input type="radio" id="female" name="register_teacher_gender" value="f">
                                    <label for="female">Female</label>
                                    <input type="radio" id="other" name="register_teacher_gender" value="o">
                                    <label for="other">Other</label>

                                </div>
                            </div>
                            <div class="col-sm-6">

                                <label for="register_teacher_fname">Father Name</label>
                                <input type="text" id="register_teacher_fname" placeholder="Enter Your Father Name" name="register_teacher_fname" class="form-control" required>
                                <label for="register_teacher_phone">Mobile Number</label>
                                <input type="text" id="register_teacher_phone" placeholder="Enter Your Mobile Number" name="register_teacher_phone" class="form-control" required>
                                
                                
                                
                                <label for="register_teacher_addhar">Addhar Number</label>
                                <input type="text" id="register_teacher_addhar" name="register_teacher_addhar" class="form-control" maxlength="12" placeholder="Aadhar Number" required>

                                <label for="register_teacher_password">Password</label>
                                <input type="password" id="register_teacher_password" name="register_teacher_password" class="form-control" placeholder="Password" required>

                                

                                <button class="btn btn-success float-left mt-3 ml-auto" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
              </div>



        </div>



    </div>















































</div>




<script src="../js/jquery.js"></script>
<script src="../js/popper.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/addstaff.js" async defer></script>
</body>
</html>