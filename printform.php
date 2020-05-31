<?php
	session_start();
	include_once 'includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>contosocomps.ga</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>

	<section class="main-container">
		<div class="main-wrapper">

			<h2><center><a href="index.php">COMPANY NAME (Pvt) Ltd.</a></center></h2>
			<h1><center><a href="index.php">Head Office</a></center></h1>

			<?php
				$sql0 = "SELECT COUNT(form_id) as 'countforms' FROM printform";
				$result0 = mysqli_query($conn, $sql0);
				$resultCheck0 = mysqli_num_rows($result0);
				$row0 = mysqli_fetch_array($result0);				
					
				echo "<br><b><font color='brown'><center>NO. " . $row0['countforms'] . '</center></font></b>';
			?>

            <br>
			<center><img src="logo2.png" width="150" height="150"></center>

			<p><center><u>ASSET REMOVAL AUTHORITY FORM S101A</center></u></center></p>

			<br><br>

		<form action="includes/printform.inc.php" method="POST" onsubmit="checkfields()">
			<p><center>
				The bearer <input type="text" id="bearer" name="bearer" style="width: 25%; height: 15px; border: none; background-color: #fff; color: #111;"> National ID <input type="text" id="natid" name="natid" style="width: 15%; height: 15px; border: none; background-color: #fff; color: #111;"> has permission to bring / remove <br> the under mentioned article(s) <input type="text" id="articles" name="articles" style="width: 31%; height: 15px; border: none; background-color: #fff; color: #111;"> Serial Number <input type="text" id="seria" name="seria" style="width: 20%; height: 15px; border: none; background-color: #fff; color: #111;"> <br> from the / to Head Office/Stores/Garage
				<input type="text" id="stores" name="stores" style="width: 20%; height: 15px; border: none; background-color: #fff; color: #111;"> <br><br> Reason: <textarea style="width: 50%; height: 80px; border: none; background-color: #fff; color: #111;" type="text" id="reason" name="reason"></textarea> <br><br><br> Date: <input type="date" id="datemove" name="datemove" style="width: 15%; height: 25px; border: none; background-color: #fff; color: #111;"><br><br><br><br> Authorised By: ____________________________________________________________________________ <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(SECTION HEAD)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DATE<br><br><br> Approved By: _____________________________________________________________________________ <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(MANAGER)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DATE<br><br><br> Checked By: ______________________________________________________________________________ <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(SECURITY SECTION)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DATE<br><br><br> Out: _____________________________________________________________________________________ <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(SECURITY SECTION)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DATE<br><br><br> Date Returned: ___________________________________________________________________________<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(SECURITY OFFICER)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DATE
			</center></p>
			<br><br>
			<center><button type = "submit" name = "submitme" style="cursor:pointer; display: block; margin: 0 auto; width: 10%;	height: 40px;	border: none; background-color: #222; font-family: arial; font-size: 16px; color: white;"><a titlt="print screen" alt="print screen" onclick="window.print();" target="blank">PRINT</a></button></center>
		</form>

		<script>
			function checkfields()
			{
				if (document.getElementById("bearer").value == "" || document.getElementById("stores").value == "" || document.getElementById("reason").value == "" || document.getElementById("datemove").value == "")
				{
					alert("Please fill in all fields");
					return false;
				}
			}
		</script>

	</div>
</section>

<?php

	include_once 'footer.php';

?>