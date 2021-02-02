<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MyQuiz</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/attend.css">
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









                    <div class="container pt-3">
                        <div class="card-deck">




<!-- up -->

 
<!-- down -->

<center><h1 class="text-center">Staff</h1></center>

                            <?php
                                    $con = new mysqli('localhost', 'root', '','quiz');
                                    if ($con->connect_error) {
                                        die("Connection failed: " . $con->connect_error);
                                    }
                                    
                                    $sql = "SELECT * FROM staff";
                                    $result = $con->query($sql);
                                    if ($result->num_rows > 0) {
echo'
<table class="table table-dark">
  <thead>
    <tr>
      
      <th scope="col">Staff Name</th>
      <th scope="col">Staff ID</th>
      <th scope="col">Father Name</th>
      <th scope="col">Subject</th>
      <th scope="col">DOB</th>
      <th scope="col">Mobile Number</th>
      <th scope="col">Email ID</th>
      <th scope="col">Gender</th>

                                        
    </tr>
  </thead>
  <tbody>

';

                                        


                                        while($row = $result->fetch_assoc()) {                                    
                                        echo '
                                        
    <tr>
    
    <td>'.$row['facname'].'</td>
    <td>'.$row['facrsid'].'</td>
    <td>'.$row['facfname'].'</td>
    <td>'.$row['facsub'].'</td>
    <td>'.$row['facdob'].'</td>
    <td>'.$row['facmob'].'</td>
    <td>'.$row['facemail'].'</td>
    <td>'.$row['facgender'].'</td>
  </tr>
                                        ';
                                        
                                    
                                    }
                                    } else {
                                    echo "<center><h1>NO TEST FOUND !!!</h1></center>";
                                    }
                                    echo' </tbody>
                                    </table>';
                                    $con->close();
                                    
                                    
                                    ?>









                        </div>
                    </div>













                </div>





            </div>



        </div>


































        <!-- this ned -->

    </div>
</body>



<script src="../js/jquery.js"></script>
<script src="../js/popper.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/attend.js" async defer></script>


</html>