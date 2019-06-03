
<?php
include 'dbconnection.php';

session_start();

if(isset($_GET['amt1'])){

    $att=$_GET["amt1"];
    print_r($att);
 }

 // if(isset($_GET['tk'])){

 //    $bt1=$_GET["tk"];
 // }
    if (!(isset($_SESSION['logid']))) {
    header('location:index.php');
}
$id = $_SESSION['logid'];
?>
<?php
   
   $b="SELECT * FROM `tbl_booking` WHERE status=0";
   $d=mysqli_query($con,$b);
   $bb=mysqli_fetch_array($d);

   $p="SELECT * FROM `tbl_add_package` WHERE pid='$bb[pid]'";
   $d1=mysqli_query($con,$p);
   $b1=mysqli_fetch_array($d1);

   $sql2="SELECT  * FROM `tbl_add_boat` WHERE bid='$b1[bid]'";
   $data2=mysqli_query($con,$sql2) or die(mysqli_error($con));
   $result1=mysqli_fetch_array($data2);

   ?>

   





<html>
	<head>
		<meta charset="utf-8">
		<title>bill</title>
		<link rel="stylesheet" href="style.css">
		<link rel="license" href="https://www.opensource.org/licenses/mit-license/">
		<link rel="stylesheet" href="theme/css/bill.css">
		<script src="script.js"></script>
		<script src="theme/js/bill.js"></script>

	</head>
	<body>
		<header>
			<h1><?php echo $result1['bname'];?></h1>
			<!-- <address contenteditable>
				<p>Jonathan Neal</p>
				<p>101 E. Chapman Ave<br>Orange, CA 92866</p>
				<p>(800) 555-1234</p>
			</address -->
			<!-- <span><img alt="" src="http://www.jonathantneal.com/examples/invoice/logo.png"><input type="file" accept="image/*"></span> -->
		</header>
		<article>
			<h1>Recipient</h1>
			<address contenteditable>
				<p>Kerala Cruise <br> Complete Travel Solution </p>
			</address>
			<table class="meta">
				<tr>
					<th><span contenteditable>Id #</span></th>
					<td><span contenteditable><?php echo $bb['book_id'];?></span></td>
				</tr>
				<tr>
					<th><span contenteditable> Check In Date</span></th>
					<td><span contenteditable><?php echo $bb['check_in'];?></span></td>
				</tr>
				<tr>
					<th><span contenteditable>Check Out Date</span></th>
					<td><span contenteditable><?php echo $bb['check_out'];?></span></td>
				</tr>
			</table>
			<table class="inventory">
				<thead>
					<tr>
						<th><span contenteditable>Boat Name</span></th>
						<th><span contenteditable>Package</span></th>
						<th><span contenteditable>Source</span></th>
						<th><span contenteditable>Destnation</span></th>
						<th><span contenteditable>Amount</span></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><a class="cut">-</a><span contenteditable><?php echo $result1['bname'];?></span></td>
						<td><span contenteditable><?php echo $b1['pname'];?></span></td>
						<!-- <td><span data-prefix>$</span><span contenteditable>150.00</span></td> -->
						<td><span contenteditable>Alappuzha</span></td>
						<td><span contenteditable>Alappuzha</span></td>
						<td><span data-prefix>Rs.</span><?php echo $att;?></td>
					</tr>
				</tbody>
			</table>
			<a class="add">+</a>
			<table class="balance">
				<tr>
					<th><span contenteditable>Total</span></th>
					<td><span data-prefix>$</span><span>600.00</span></td>
				</tr>
				<tr>
					<th><span contenteditable>Amount Paid</span></th>
					<td><span data-prefix>$</span><span contenteditable>0.00</span></td>
				</tr>
				<tr>
					<th><span contenteditable>Balance Due</span></th>
					<td><span data-prefix>Rs.</span><span>0.00</span></td>
				</tr>
			</table>
		</article>
		<aside>
			<h1><span contenteditable></span></h1>
			<div contenteditable>
				<center>Nice Journey...</center>
			</div>
		</aside>
		<br><br>

		<div class="print" style=margin-left:300px;>
        <button onclick="myFunction()">Print this page</button>
</div>
<script>
function myFunction() {
    window.print();
}
</script>
		
	</body>
</html>