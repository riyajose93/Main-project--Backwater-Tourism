<?php
include 'dbconnection.php';
include 'component/nav/add_header.php';


$sql="SELECT * FROM tbl_ownerinfo WHERE lid='$id'";
$result=mysqli_query($con,$sql) or die(mysqli_error());
while ($row=mysqli_fetch_array($result))
{
    $name=$row['name'];
    $mobile=$row['mobile'];
    $lice=$row['license_no'];
}



if(isset($_POST['submit'])){

        $target_dir = "uploads/";
			$target_file = $target_dir . basename($_FILES["imageup"]["name"]);
            move_uploaded_file($_FILES["imageup"]["tmp_name"], $target_file);

        $add = $_POST["place"];
        $com = $_POST["cn"];
        
        // $checkBox = $_POST['package'];

   //          $s = "";

   //  if (isset($_POST['ch1'])) {
   //      $ch1 = $_POST['ch1'];
   //      $s .= $ch1 . ',';
   //  }
   //  //$ch1 = $_POST["ch1"];

   //  if (isset($_POST['ch2'])) {
   //      $ch2 = $_POST['ch2'];
   //      $s .= $ch2 . ',';
   //  }
   //  // $ch2 = $_POST["ch2"];

   //  if (isset($_POST['ch3'])) {
   //      $ch3 = $_POST['ch3'];
   //      $s .= $ch3 . ',';
   //  }
   //  // $ch3 = $_POST["ch3"];

   //  if (isset($_POST['ch4'])) {
   //      $ch4 = $_POST['ch4'];
   //      $s .= $ch4 . ',';
   //  }
   //  // $ch4 = $_POST["ch4"];

   //  if (isset($_POST['ch5'])) {
   //      $ch5 = $_POST['ch5'];
   //      $s .= $ch5 . ',';
   //  }
   //  // $ch5 = $_POST["ch5"];

   //  if (isset($_POST['ch6'])) {
   //      $ch6 = $_POST['ch6'];
   //      $s .= $ch6 . ',';
   //  }
    


   //      $bt = $_POST["bt1"];
   //      $cat = $_POST["ct"];
   //      $rt = $_POST["rt1"];
   //      $nr = $_POST["nr"];

   //      $target_dir = "uploads/";
			// $target_file1 = $target_dir . basename($_FILES["imageupload"]["name"]);
   //          move_uploaded_file($_FILES["imageupload"]["tmp_name"], $target_file);
        
        
   //      $msg = $_POST["message"];

        
       
      $sql = "UPDATE `tbl_ownerinfo` SET `lic_proof`='$target_file',`address`='$add',`company_nme`='$com' WHERE lid='$id'" ;
  
if((mysqli_query($con, $sql)) or die(mysqli_error($con))){ 
    echo "Record was updated successfully"; 
    echo "<script>window.location='owner_home.php?view=boatdet'</script>";
   
} else { 
    echo "ERROR: Could not able to execute $sql. ";
}
    }

         
 
?>

<!DOCTYPE html>
<html>
<head>
<title>owner :: add  details</title>
<!-- for-mobile-apps -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="keywords" content="Job Application Form Widget Responsive, Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<!-- //for-mobile-apps -->
<link href='//fonts.googleapis.com/css?family=Questrial' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="theme/owner/css/j-forms.css">
<link href="theme/owner/css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
<div class="content">
		<h1>Add Details</h1>
		<div class="main">
			<form method="POST" class="contact-forms" name="boatdet" action="" enctype="multipart/form-data" >
				<!-- end /.header-->

					<!-- start name -->
					<div class="first-line">
						<div class="span6 main-row">
							<div class="input">
								
								<input type="text" id="name" name="name" value="<?php echo $name;?>" placeholder="Owner Name" readonly="">
							</div>
						</div>
						<div class="span6 main-row">
							<div class="input">
								
								<input type="text" id="mob" name="mob" value="<?php echo $mobile;?>" placeholder="Mobile" readonly="" >
							</div>
						</div>
					</div>
					<!-- end name -->

					<!-- start email phone -->
					<div class="first-line">
						<div class="span6 main-row">
							<div class="input">
								
								<input type="text" placeholder="License Number" id="lic" name="lic" value="<?php echo $lice;?>" readonly="">
							</div>
						</div>
						<div class="span6 main-row">

							<div class=" main-row">
							<!-- <label class="input append-small-btn">
								<div class="upload-btn">
									Browse
									<input type="file" name="imageup" id="imageup">
								</div>
								<input type="text" placeholder="License Proof">
								<span class="hint">Only: pdf / doc Size: lessthan 1 Mb</span>
							</label> -->
							<label>License Proof</label>
							<input type="file" name="imageup">
						</div>
						
							
						</div>
					</div>
				


					<!-- start city post code -->
					<div class="first-line">

						
						<div class="span6 main-row">
							<div class="input">
								
								<input type="text" id="place" name="place" placeholder="Address"  >
							</div>
						</div>
						<div class="span6 main-row">
							<div class="input">
								
								<input type="text" id="cn" name="cn" placeholder="Company Name">
							</div>
						</div>

						</div>
					<!-- 	<div class="span6 main-row">
							<div class="input">
								<!-- <input type="text" placeholder="Package"> -->
<!-- 
								<label>Package</label><br>
								<input type="checkbox" id="ch1" name="ch1" value="Honeymoon">Honeymoon<br>
								<input type="checkbox" id="ch2" name="ch2" value="Family Houseboat">Family Houseboat<br>
								<input type="checkbox" id="ch3" name="ch3" value="Corporate Meetings">Corporate Meetings<br>
								<input type="checkbox" id="ch4" name="ch4" value="Events & Celebrations">Events & Celebrations<br>
								<input type="checkbox" id="ch5" name="ch5" value="Houseboat Roundtrips">Houseboat Roundtrips<br>
								<input type="checkbox" id="ch6" name="ch6" value="Others">Others
		
							</div>
						</div>
					
					<!-- end city post code -->

					<!-- start address -->

	<!-- 				<div class="main-row">
						<div class="input">
							<text placeholder="" spellcheck="false" name="message"></textarea>
								<span class="tooltip tooltip-right-top">Key Specification</span>
						</div>
					</div>
					<div class="first-line">
						<div class="span6 main-row">
							<label class="input select">
							<select name="bt1">
								<option value="none" selected disabled="">Boat Type</option>
								
								<option value="Dock"> Dock</option>
								<option value="Shikkari Boat"> Shikkari Boat </option>
								<option value="Speed Boat"> Speed Boat </option>
								
							</select>

							<i></i>
						</label>
				
								
								
							
						</div>
						<div class="span6 main-row">
							<!-- <div class="input"> -->
		<!-- 						<label class="input select">
							<select name="ct" id="ct">
								<option value="none" selected disabled="">Choose Category</option>
								<option value="Luxuary"> Luxuary</option>
								<option value="Premium"> Premium</option>
								<option value="Deluxe"> Deluxe</option>
								
							</select>
						<i></i>
					</label>
						
								
								
						</div>	</div>
					<!-- end address -->

			<!-- 		<div class="first-line">
						<div class="span6 main-row">
							<label class="input select">
							<select name="rt1">
								<option value="none" selected disabled="">Room Type</option>
								
								<option value="A/C"> A/C</option>
								<option value="Non-A/C"> Non-A/C</option>
								
							</select>

							<i></i>
						</label>
					
							
						</div>
						<div class="span6 main-row">
						<label class="input select">
							<select name="nr" id="nr">
								<option value="none" selected disabled="">No: of Rooms</option>
								
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								
							</select>
							<i></i>
						</label>
					</div>
					
								
								<!-- <input type="text" id="nr" name="nr" placeholder="No: Of Rooms"> -->
				<!-- 			</div>
						
					
					


					
					<div class="main-row">
						<div class="input">
							<textarea placeholder="Additional info" spellcheck="false" name="message"></textarea>
								<span class="tooltip tooltip-right-top">Key Specification</span>
						</div>
					</div>
					<!-- end message -->

					<!-- start files -->
					
					<!-- 	 <div class=" main-row">

						 	<label>Add Images</label>
							<input type="file" name="imageupload"> --> 
							<!-- <label class="input append-small-btn">
								<div class="upload-btn">
									Browse
									<input type="file" name="imageupload" id="imageupload" >
								</div>
								<input type="text" placeholder="Add images">
								<span class="hint">Only: jpg / png Size: lessthan 40 kb</span>
							</label> -->
						<!-- </div>  -->
						
					
					<!-- end files -->

			
				<!-- end /.content -->

				<div class="footer">
					<button type="submit" class="primary-btn" name="submit">Submit</button>
					<!-- <button type="reset" class="secondary-btn">Reset</button>  -->
				</div>
				<!-- end /.footer -->

			</form>
		</div>
		<!-- <p class="copy_rights">&copy; 2016 Job Application Form Widget. All Rights Reserved | Design by  <a href="http://w3layouts.com/"> W3layouts</a></p> -->
</div>
		<!-- Scripts -->
		<script src="theme/owner/js/jquery.1.11.1.min.js"></script>

		<!--[if lt IE 10]>
				<script src="j-folder/js/jquery.placeholder.min.js"></script>
			<![endif]-->

		<script>
			$(document).ready(function(){

				// Phone masking
				$('#phone').mask('(999) 999-9999', {placeholder:'x'});

				// Post code masking
				$('#post').mask('999-9999', {placeholder:'x'});

			});
		</script>
</body>
</html>
