<?php
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Payement</title>
<meta name="GENERATOR" content="Evrsoft First Page">
<link rel="stylesheet" href="../css/pyment.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>

<?php
require 'database.php';













$uploadir="C:/xampp/htdocs/quizs/imgs/userpic/";
$uploadfile=$uploadir.basename($_FILES["file"]["name"]);
$stdname=$_POST["register_student_name"];
$stdname=ucfirst($stdname);
$stdfname=$_POST['register_student_fname'];
$stdfname=ucfirst($stdfname);
$enrollment=$_POST['register_student_enroll'];
$enrollment=ucfirst($enrollment);
$stddob=$_POST['register_student_dob'];
$stdemail=$_POST["register_student_email"];
$stdmob=$_POST["register_student_phone"];
$stdgender=$_POST["register_student_gender"];
$password=$_POST['register_student_password'];
$class=$_POST['register_student_class'];
$upic=$_FILES["file"]["name"];
$oid="ORDS".rand(10000,99999999);



$con = new mysqli('localhost', 'root', '','quiz');
// Check connection
if ($con->connect_error) {
die("Connection failed: " . $con->connect_error);
}

$sqll = "SELECT * FROM users";
$result = $con->query($sqll);
$ct=$result->num_rows;
$ct=strval($ct);

if($result->num_rows==0){
	$cdt=date('y');
	$ct='1';
	$ct='000'.$ct;
	$rsid="HDPS".$cdt.$class.$ct;
}
else if(strlen($ct)==1){
	$cdt=date('y');
	$ct=$ct+1;
	$ct='000'.$ct;
	$rsid="HDPS".$cdt.$class.$ct;
}
else if(strlen($ct)==2){
	$cdt=date('y');
	$ct=$ct+1;
	$ct='00'.$ct;
	$rsid="HDPS".$cdt.$class.$ct;

}
else if(strlen($ct)==3){
	$cdt=date('y');
	$ct='0'.$ct;
	$ct=$ct+1;
	$rsid="HDPS".$cdt.$class.$ct;
}
else if(strlen($ct)==4){
	$cdt=date('y');
	$ct=$ct;
	$rsid="HDPS".$cdt.$class.$ct;
}













$sql="insert into users(enrollment, stdname, stdfname, stdmob, stdemail, stddob, stdgeder, stdimg, password, stdclass,txtorderid,amount,respmsg,txndate,rsid)VALUES('$enrollment','$stdname','$stdfname','$stdmob','$stdemail','$stddob','$stdgender','$upic','$password','$class','$oid','','','','$rsid')";
$runquery=new db_mysql();
$runquery->sql_comm($sql);
if(move_uploaded_file($_FILES["file"]["tmp_name"],$uploadfile))	{
	
// uper
echo '



<div class="container-fluid m-0 p-0">
        <div class="row p-0 m-0">
            <div class="col-sm-2"></div>
            <div class="col-sm-8 p-4 border rounded mt-3">
                <center><h1>Registration Payment</h1></center>

	
	<form method="post" action="../code/PaytmKit/pgRedirect.php">
        
                    <label for="">Name</label>
                    <input type="text"  class="form-control" readonly value="'.$stdname.'">
                    <label for="">Father Name</label>
                    <input type="text" class="form-control" readonly value="'.$stdfname.'">
                    <label for="">Roll no</label>
                    <input type="text" name="enrollment" class="form-control" readonly value="'.$enrollment.'">
					<label>ORDER_ID :- </label>
					<input  readonly class="form-control" id="ORDER_ID" tabindex="1" maxlength="20" size="20"
						name="ORDER_ID" autocomplete="off"
						value="'.$oid.'">
					
				
				
					
					<!-- <label>CUSTID  :- </label> -->
					<input type="hidden" class="form-control" id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="CUST001">
				
				
					
					<!-- <label>INDUSTRY_TYPE_ID  :- </label> -->
					<input type="hidden" class="form-control" id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail">
				
				
					
					<!-- <label>Channel  :- </label> -->
					<input type="hidden" class="form-control" id="CHANNEL_ID" tabindex="4" maxlength="12"
						size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
					
				
				
					
					<label>Total Amount :-</label>
					<input readonly  class="form-control" title="TXN_AMOUNT" tabindex="10"
						type="text" name="TXN_AMOUNT"
						value="500">
					
				
				
					
					
					<center><input value="Payment" class="btn btn-success mt-5" type="submit"	onclick=""> <br><a href="../templates/index.php" class="btn btn-danger mt-3">Go Back</a></center>
				
		
		
    </form></div>
    <div class="col-sm-2"></div>
    </div>
    </div>












';



}
else{
	echo "<script>alert('Something Wrong Please Try Again');window.location.href='../templates/index.php'</script>";
}
 








?>

</body>
</html>