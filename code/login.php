<?php
require 'database.php';
$username=$_POST["username"];
$password=$_POST["password"];

$cy=date('y');
$cn="f";
$tcn="F";

$pos = strpos($username, $cn);

$tt=ucfirst($username);
$tpos=strpos($tt, $tcn);

if($pos==true or $tpos==true){
    $username=strtoupper($username);
    $conn=mysqli_connect("localhost","root","","quiz");
    $cmd="select facrsid,facpass from staff where facrsid='$username' and facpass='$password'";
    if($conn==true){
        
        $x=mysqli_query($conn,$cmd);
        if(mysqli_num_rows($x))
               {
                //    echo"check";
                   $row=mysqli_fetch_assoc($x);
                   $enroll=$row["facrsid"];
                    $pass=$row["facpass"];
                   if($enroll==$username && $pass==$password)
                   {
                       session_start();
                       // Make Session 
                       $con = new mysqli('localhost', 'root', '','quiz');
                    // Check connection
                       if ($con->connect_error) {
                       die("Connection failed: " . $con->connect_error);
                       }
   
                       $sql = "SELECT * FROM staff WHERE facrsid='$enroll'";
                       $result = $con->query($sql);
                       if ($result->num_rows > 0) {
                       
                       while($row = $result->fetch_assoc()) {
                        //    echo 'id: ' . $row["admname"];
                           
                           $_SESSION['facname']=$row['facname'];
                           $_SESSION['username']=$row['facname'];
                           $_SESSION['facsub']=$row['facsub'];
                           
   
                       }
                       } else {
                       echo "0 results";
                    //    return;
                       }
                       $con->close();
                       echo('<script>window.location.href="../templates/index.php"</script>');
                   }
       
           }

           else
           {
              echo "<script>alert('Invalid Username or Password');;window.location.href='../templates/index.php'</script>"; 
              
           }



        }



    

}












else if (filter_var($username, FILTER_VALIDATE_EMAIL)) {

    // echo("$username is a valid email address");
    $conn=mysqli_connect("localhost","root","","quiz");
    $cmd="select admemail,admpassword from superuser where admemail='$username' and admpassword='$password'";
    if($conn==true){
        
        $x=mysqli_query($conn,$cmd);
        if(mysqli_num_rows($x))
               {
                //    echo"check";
                   $row=mysqli_fetch_assoc($x);
                   $enroll=$row["admemail"];
                    $pass=$row["admpassword"];
                   if($enroll==$username && $pass==$password)
                   {
                       session_start();
                       // Make Session 
                       $con = new mysqli('localhost', 'root', '','quiz');
                    // Check connection
                       if ($con->connect_error) {
                       die("Connection failed: " . $con->connect_error);
                       }
   
                       $sql = "SELECT * FROM superuser WHERE admemail='$enroll'";
                       $result = $con->query($sql);
                       if ($result->num_rows > 0) {
                       
                       while($row = $result->fetch_assoc()) {
                        //    echo 'id: ' . $row["admname"];
                           
                           $_SESSION['username']=$row['admname'];
                           $_SESSION['email']=$row['admemail'];
                           
   
                       }
                       } else {
                       echo "0 results";
                    //    return;
                       }
                       $con->close();
                       echo('<script>window.location.href="../templates/index.php"</script>');
                   }
       
           }


           else
           {
              echo "<script>alert('Invalid Username or Password');;window.location.href='../templates/index.php'</script>"; 
              
           }


        }

} 
else{
    $username=strtoupper($username);
    $conn=mysqli_connect("localhost","root","","quiz");
    $cmd="select rsid,password from users where rsid='$username' and password='$password'";
    if($conn==true){
     $x=mysqli_query($conn,$cmd);
     if(mysqli_num_rows($x))
            {
	            $row=mysqli_fetch_assoc($x);
                $enroll=$row["rsid"];
             	$pass=$row["password"];
                if($enroll==$username && $pass==$password)
                {
                    session_start();
                    // Make Session 
                    $con = new mysqli('localhost', 'root', '','quiz');
// Check connection
                    if ($con->connect_error) {
                    die("Connection failed: " . $con->connect_error);
                    }

                    $sql = "SELECT * FROM users WHERE rsid='$enroll'";
                    $result = $con->query($sql);
                    if ($result->num_rows > 0) {
                    
                    while($row = $result->fetch_assoc()) {
                        // echo 'id: ' . $row["stdname"];
                        $_SESSION['username']=$row['stdname'];
                        $_SESSION['enrollment']=$row['enrollment'];
                        $_SESSION['userimg']=$row['stdimg'];
                        $_SESSION['class']=$row['stdclass'];
                        $_SESSION['stdemail']=$row['stdemail'];
                    }
                    } else {
                    echo "0 results";
                    }
                    $con->close();
                    echo('<script>window.location.href="../templates/index.php"</script>');
                }
    
        }
 else
 {
	echo "<script>alert('Invalid Username or Password');window.location.href='../templates/index.php'</script>"; 
	
 }

}

}

?>
