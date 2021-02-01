<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
include('../database.php');
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");
$paytmChecksum = "";
$paramList = array();

$isValidChecksum = "FALSE";
$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	// echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		// echo "<center><h1>Transaction is Success</h1></center>" . "<br/>";
		if(isset($_POST['ORDERID']) && isset($_POST['TXNAMOUNT'])){
			$order_id=$_POST['ORDERID'];
			$status=$_POST['STATUS'];
			$amount=$_POST['TXNAMOUNT'];
			$dt=$_POST['TXNDATE'];
			$respmsg=$_POST['RESPMSG'];



			$sql="UPDATE users SET amount='$amount',respmsg='$respmsg',txndate='$dt' WHERE 
			txtorderid='$order_id'";
			$runquery=new db_mysql();
			$runquery->sql_comm($sql);
			session_start();
			$_SESSION['oid']=$order_id;
			echo"<script>alert('Your Ragistration is Successfully Done');window.location.href='../../templates/index.php'</script>";

			

			
		}
	}
	else {
			$sql="DELETE FROM users WHERE enrollment=$enrollment";
			$runquery=new db_mysql();
			$runquery->sql_comm($sql);
	}

	if (isset($_POST) && count($_POST)>0 )
	{ 
		// foreach($_POST as $paramName => $paramValue) {
		// 		echo "<br/>" . $paramName . " = " . $paramValue;
		// }
	}
	

}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}

?>