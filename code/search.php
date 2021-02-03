<?php
require 'database.php';
$enroll=$_POST['enroll'];
$class=$_POST['class'];
$enroll=ucfirst($enroll);
$class=ucfirst($class);




$con = new mysqli('localhost', 'root', '','quiz');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}


$sql="SELECT * FROM users WHERE enrollment='$enroll' OR rsid='$class' ";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {

        echo'
        <table class="table table-dark">
                        <thead>
                          <tr>
                            <th scope="col">Profile Pic</th>
                            <th scope="col">Student</th>
                            <th scope="col">Enrollment No.</th>
                            <th scope="col">Class</th>
                            <th scope="col">
                                Download Result
                            </th>


                           
                                                              
                          </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><img class="rounded" src="../imgs/userpic/'.$row['stdimg'].'" alt="" style="max-height: 100px; min-height: 100px;max-width: 100px;min-width: 100px;"></td>
                                <td>'.$row['stdname'].'</td>
                                <td>'.$row['enrollment'].'</td>
                                <td>'.$row['stdclass'].'</td>
                                <td>

                                <form action="../code/stdresult.php" method="POST">
                                    <input type="hidden" name="enroll" id="enroll" value="'.$row['enrollment'].'">
                                    <input type="hidden" name="class" id="class" value="'.$row['stdclass'].'">
                                    <input type="hidden" name="name" id="name" value="'.$row['stdname'].'">
                                    <button type="submit"  class="btn btn-outline-light">Result</button>
                                </form>
                                </td>
                               
                                </tr>
                            </tbody>
                    </table>
        
        
        ';

    }}



?>