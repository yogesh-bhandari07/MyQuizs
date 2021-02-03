<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/profile.css">
        <link rel="stylesheet" href="../css/bootstrap.css">
    </head>
    <body>
    <div class="container-fluid p-0 m-0">

 


<?php
        $con = new mysqli('localhost', 'root', '','quiz');
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }
        session_start();
        $roll=$_SESSION['enrollment'];

        $sql = "SELECT * FROM users WHERE enrollment='$roll'";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {         
                
                echo'
                
                <div class="row p-0 m-0">
                <div class="col-sm-12 m-0 p-0">
                    <div class="text-center">
                        <img src="../imgs/userpic/'.$row['stdimg'].'" class="rounded-circle" alt="student img" id="userimg">
                      </div>
                </div>
            </div>
    
            <div class="card p-3 m-3" style="background: #282828; border: 2px solid #fff;">
                <div class="card-header text-center">
                  <h1>Student</h1>
                </div>
                <div class="card-body">
                    <div class="row p-0 m-0">
                        <div class="col-sm-6 m-0 pl-1">
                            <label for="">Name</label>
                            <input type="text" name="" id="" value="'.$row['stdname'].'"  class="form-control" readonly>
                            <label for="">Father Name</label>
                            <input type="text" name="" id="" value="'.$row['stdfname'].'" class="form-control" readonly>
                            <label for="">Enrollment Number</label>
                            <input type="text" name="enroll" id="enroll" value="'.$row['enrollment'].'" class="form-control" readonly>
                            <label for="">Registration Number</label>
                            <input type="text" name="" id="" value="'.$row['rsid'].'" class="form-control" readonly>
                            <label for="">Email Id</label>
                            <input type="text" name="stdemail" id="stdemail" value="'.$row['stdemail'].'" class="form-control">
                            <label for="">Number</label>
                            <input type="text" name="stdmob" id="stdmob" value="'.$row['stdmob'].'" class="form-control">
                            
                            
                        </div>
                        <div class="col-sm-6 m-0 p-0">
                            <label for="">Class</label>
                            <input type="text" name="" id="" value="'.$row['stdclass'].'" class="form-control" readonly>
                            <label for="">D.O.B</label>
                            <input type="text" name="" id="" value="'.$row['stddob'].'" class="form-control" readonly>
                            <label for="">Gender</label>
                            <input type="text" name="" id="" value="'.$row['stdgeder'].'" class="form-control" readonly>
                            <label for="">Transaction Id</label>
                            <input type="text" name="" id="" value="'.$row['txtorderid'].'" class="form-control" readonly>
                            
                            <label for="">Transaction Date</label>
                            <input type="text" name="" id="" value="'.$row['txndate'].'" class="form-control" readonly>
                            <label for="">Transaction Amount</label>
                            <input type="text" name="" id="" value="'.$row['amount'].'" class="form-control" readonly>
                            
                        </div>
            
                    </div>
                </div>
                <div class="card-footer">
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <center><button class="btn btn-success" onclick="update_data()">Update</button></center>
                        </div>
                        <div class="col-sm-6">
                            <center><a href="../code/stdresult.php" class="btn btn-success">Result</a></center>
                        </div>
                    </div>
                
                
                
                ';










            }}
?>


       
                        
                    
                    
                
                
                
              
            </div>
          </div>

    </div>






    <script src="../js/jquery.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.js"></script>
        <script src="../js/profile.js" async defer></script>
    </body>
</html>