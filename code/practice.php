<?php
// $a=10;
// if($a==5){
//     echo("this");

// }
// else{
//     echo ("Dash");
// }

// $ram=50;
// for($i=1;$i<=$ram;$i++)
// {
//     echo $i;
//     echo "<br>";
// }
// $i=1;
// while($i<=10){
//     echo $i;
//     echo "<br>";
//     $i++;
// }
// $i=1;
// do{
//     echo $i;
//     echo "<br>";
//     $i++;
// }while($i<=10);

// $i=4;
// switch($i){
//     case 1:
//         echo "ram";
//         break;
//     case 2:
//         echo "m";
//         break;
//     case 3:
//         echo "rmmam";
//         break;
    
//     case 4:
//         echo "rammmmm";
//         break;
    
//     case 5:
//         echo "ramuuu";
//         break;
    
// }

// $cars=array('a','b','c','d');
// $lent=count($cars);
// for ($i=0;$i<=$lent-1;$i++) {
//     echo $cars[$i];
//     # code...
// }


$conn=mysqli_connect("localhost","root","","mypra");
if(!$conn){
    die("Conction failed".mysqli_connect_error());

}
else{
    echo "Success";
}
// $sql="INSERT INTO users(sname,email,number_p)values('Yogesh','Yk@nbabmsn',8384855717)
// $sql="UPDATE users SET email='yk@gmail.com' WHERE id=1
// $sql="DELETE from users where id=1

";

if(mysqli_query($conn,$sql)){
    echo ("Success of query");

}
else{
    echo("failed".mysqli_error($conn));
}

?>