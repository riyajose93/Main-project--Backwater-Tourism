<?php
include 'dbconnection.php';
$id=$_GET["id1"];
$q="select * from tbl_staff_reg where staff_regid='$id'";
$data=mysqli_query($con,$q) or die (mysqli_error($con));
if($r=mysqli_fetch_array($data))

$res="SELECT * FROM `tbl_designation` WHERE des_id='$r[9]'";
$data1=mysqli_query($con,$res) or die(mysqli_error($con));
$r1=mysqli_fetch_array($data1);

$result="SELECT * FROM `tbl_qualification` WHERE qid='$r1[1]'";
$data2=mysqli_query($con,$result) or die(mysqli_error($con));
$r2=mysqli_fetch_array($data2);

{
	?>
	<form method="post">
	<table border='1'>
	<tr>
	<td>Name:<?php echo $r['name'];?></td>
	</tr>
	<tr>
	<td>Gender:<?php echo $r['gender'];?></td>
	</tr>
	<tr>
	<td>Date of Birth:<?php echo $r['dob'];?></td>
	</tr>
	<tr>
	<td>Qualification:<?php echo $r2['1'];?></td>
	</tr>
	<tr>
	<td>Designation:<?php echo $r1['2'];?></td>
	</tr>
	<tr>
	<td>Mobile:<?php echo $r['mobile'];?></td>
	</tr>
	<tr>
	<td><input type="submit" name="btn1" value="APPROVE"/></td>
	<td><input type="submit"  name="btn2" value="REJECT" /></td>
	</tr>
	</table>
	</form>
	<?Php
}

if(isset($_POST["btn1"]))
{
	$id=$_GET["id1"];
	$q="update tbl_staff_reg set status='approved' where staff_regid='$id'";
	$data=mysqli_query($con,$q) or die( mysqli_error($con));
	// $q1="update tbl_login set status='approved' where lid='$id'";
	// echo '$q1';
	// $data1=mysqli_query($con,$q1) or die( mysqli_error($con));
	if(mysqli_affected_rows($con)>0)
	{
		
		?>
		<script>
			alert("approved")
				window.location.href="staff_approval.php";
			</script>
		<?php
	}
}
if(isset($_POST["btn2"]))
{
	$id=$_GET["id1"];
	$q="update tbl_staff_reg set status='rejected' where staff_regid='$id'";
	$data=mysqli_query($con,$q) or die( mysqli_error($con));
	if(mysqli_affected_rows($con)>0)
	{
		?>
		<script>
			alert("rejected")
				window.location.href="staff_approval.php";
			</script>
		<?php
	}
}

?>
