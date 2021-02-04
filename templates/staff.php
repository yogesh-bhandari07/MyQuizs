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
                <h1 class="pt-4">Wecome To MyQuiz</h1>
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
                        <?php
                    if(isset($_SESSION['facname'])){
                            echo'<a  href="../templates/faczone.php">Make Test</a>
                            <a href="../code/student.php">Students</a>
                            <a href="../templates/runningtest.php">Running Test</a>
                            <a href="../code/attend.php">Attend Test</a>
                            <a href="../code/astdresult.php">Result</a>   ';
                        }
                        else{
                            echo'<a  href="../templates/admin.php">Admin</a>
                            <a href="../code/student.php">Students</a>
                            <a href="../templates/runningtest.php">Running Test</a>
                            <a href="../code/attend.php">Attend Test</a>
                            <a href="../templates/addstaff.php">Add Staff</a>
                            <a style="color:yellowgreen;" href="../templates/staff.php">Staff</a>
                            <a href="../code/astdresult.php">Result</a>    ';
                        }
                        ?>
                        
                        
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
      <th scope="col">DOB</th>
      <th scope="col">Gender</th>
      <th scope="col">Delete</th>
      <th scope="col">Update</th>
                                        
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
    <td>'.$row['facdob'].'</td>
    <td>'.$row['facgender'].'</td>

    <td><button class="btn btn-danger" onclick="delete_data('."'".$row['facrsid']."'".')"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
      </svg></button></td>



    <td><button class="btn btn-secondary" data-toggle="modal" data-target="#registermodal" 
    onclick="set_data(
        '."'".$row['facname']."'".","."'".$row['facimg']."'".","."'".$row['facfname']."'".","."'".$row['facaddn']."'".","."'".$row['facdob']."'".","."'".$row['facgender']."'".","."'".$row['facmob']."'".","."'".$row['facsub']."'".","."'".$row['facemail']."'".","."'".$row['facrsid']."'" 
        .')"
    
    
    
    ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
        <path d="M13.498.795l.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
      </svg></button></td>



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




        <script>
    var name;
    var upic;
    var fname;
    var roll;
    var dob;
    var gen;
    var mob;
    var cl;

function set_data(name,upic,fname,roll,dob,gen,mob,cl,email,rsid){
    document.getElementById('register_student_name').value=name;
    var st1="../imgs/facimg/";
    upic=st1.concat(upic);
    document.getElementById('output_img').src=upic;
    document.getElementById('register_student_fname').value=fname;
    document.getElementById('register_student_enroll').value=roll;
    document.getElementById('register_student_dob').value=dob;
    document.getElementById('register_student_phone').value=mob;
    document.getElementById('register_student_class').value=cl;
    document.getElementById('register_student_email').value=email;
    document.getElementById('register_student_rsid').value=rsid;
}
var rid;
function delete_data(rid){
    var rbtn = confirm("Do Wanna Delete This Student Data");
        if (rbtn== true) {
            $.ajax({
            type: "post",
            url: "../code/stdelete.php",
            data: {
               rsid:rid
            },
            success: function(x) {
                alert('Student Data Deleted !!!');
                window.location.href = '../code/student.php';
                
            }
        });
        } else {
            window.location.href = '../code/student.php';
        }
    


}



</script>





























        <!-- this ned -->

    </div>




    <div class="modal fade bg-dark" id="registermodal" tabindex="-1" aria-labelledby="#registermodal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content  rounded" style="border: 3px solid #EEE">
                <div class="modal-header bg-dark">

                    <h5>Update Staff Data</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body bg-dark">

                    <div class="row mt-3">

                        <div class="col-sm-2"></div>
                        <div class="col-sm-8">
                            <form action="../code/stupdate.php" method="POST" enctype="multipart/form-data">

                                <center>
                                    <img id="output_img" src="../imgs/user.jpg" style="border: 5px solid #EEE;" width="150" height="150" class=" rounded-circle" alt=""><br>
                                    <input class="btn btn-info" id="register_student_img" name="file" type="file" accept="image/*" onchange="preview_image(event)">
                                </center>

                                <div class="row">
                                    <div class="col-sm-6">
                                    <input type="hidden" id="register_student_rsid" name="register_student_rsid">
                                        <label for="register_student_name">Name</label>
                                        <input type="text" id="register_student_name" name="register_student_name" class="form-control" placeholder="Enter Your Name" required>

                                        <label for="register_student_email">Email ID</label>
                                        <input type="email" id="register_student_email" name="register_student_email" class="form-control" placeholder="Example@gmail.com" required>
                                        <label for="register_student_enroll">Addhar Number</label>
                                        <input type="text" id="register_student_enroll" name="register_student_enroll" class="form-control" placeholder="Enrollment Number" required>

                                        <label for="register_student_dob">D.O.B</label>
                                        <input type="date" id="register_student_dob" placeholder="Enter Your D.O.B" name="register_student_dob" class="form-control" required>

                                        
                                    </div>
                                    <div class="col-sm-6">

                                        <label for="register_student_fname">Father Name</label>
                                        <input type="text" id="register_student_fname" placeholder="Enter Your Father Name" name="register_student_fname" class="form-control" required>
                                        <label for="register_student_phone">Mobile Number</label>
                                        <input type="text" id="register_student_phone" placeholder="Enter Your Mobile Number" name="register_student_phone" class="form-control" required>
                                        
                                        
                                        <label for="register_student_class">Subject</label>
                                        <input class="form-control" type="text" name="register_student_class" id="register_student_class">


                                        

                                        
                                    </div>
                                    <button class="btn btn-success float-left mt-3 ml-auto" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>



<script src="../js/jquery.js"></script>
<script src="../js/popper.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/staff.js" async defer></script>


</html>