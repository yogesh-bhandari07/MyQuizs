<?php
 class db_mysql{
    
    function sql_comm($sql){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db= "php";
        $conn = mysqli_connect($servername, $username, $password,$db);
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }
        if (mysqli_query($conn, $sql)) {
                    echo "Command apply successfully";
                  } else {
                    echo "Error creating table: " . mysqli_error($conn);
                  }
    }
}
?>