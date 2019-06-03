<?php
include 'dbconnection.php';

 session_start();
    if (!(isset($_SESSION['logid']))) {
    header('location:index.php');
}

 include 'component/nav/userheader.php';

?>

<?php
if(isset($_POST['submit'])){
	bookingaction($con);
}
	function bookingaction($con)
	{
		$id = $_SESSION['logid'];
		$pk=$_GET["uid"];
		$bid=$_GET["bt"];
		$checkin=$_POST["checkin"];
		$checkout=$_POST["checkout"];
        // $pick=$_POST["pickup"];
        // $dest=$_POST["destination"];

        $checkin= date("Y-m-d",strtotime($checkin));
        $checkout= date("Y-m-d",strtotime($checkout));

        
		$sqlbook="INSERT INTO `tbl_booking`(`book_id`, `lid`, `bid`,`pid`, `check_in`, `check_out`, `status`) VALUES (NULL,'$id','$bid','$pk','$checkin','$checkout','1')";
        $result2=mysqli_query($con,$sqlbook); 
          // echo "<script>alert('Booking successfully')</script>";
        echo "<script>window.location='booking_details.php'</script>";
	}

	
?>


