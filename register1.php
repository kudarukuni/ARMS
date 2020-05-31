<?php
	include_once 'header1.php';
	include_once 'includes/dbh.inc.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>VEHICLE REGISTER</h2>
		
		<?php
			if(isset($_SESSION['u_uid']))
			{
				echo "<marquee>You Are Logged In!!</marquee>";
				echo "<br><br>";
			}
		?>

		<?php

			$sql0 = "SELECT COUNT(ecnum) as 'countcomps' FROM register1";
			$result0 = mysqli_query($conn, $sql0);
			$resultCheck0 = mysqli_num_rows($result0);
			$row0 = mysqli_fetch_array($result0);				
				
			echo "<br><b><font color='brown' size='9'><center>Vehicle's Registered: " . $row0['countcomps'] . '</center></font></b>';

		?>

		<form action="includes/register1.inc.php" method="POST" class="signup-form" onsubmit="checkfields()">

			<input type="text" id="ecnum" name="ecnum" placeholder="EC-NUMBER"><br>
			<input type="text" id="regnum" name="regnum" placeholder="REGISTRATION NUMBER"><br>
			<input type="text" id="seria" name="seria" placeholder="SERIAL NUMBER"><br>
			<input type="text" id="model" name="model" placeholder="VEHICLE MODEL"><br>
			<input type="text" id="engine" name="engine" placeholder="ENGINE TYPE"><br>
			<input type="text" id="consumpt" name="consumpt" placeholder="FUEL CONSUMPTION"><br>
			<input type="text" id="sp" name="sp" placeholder="STOCK PRICE"><br>
			<input type="date" id="dob" name="dob" placeholder="DATE BOUGHT"><br>
			<input type="date" id="dod" name="dod" placeholder="EXPIRY DATE"><br>
			
			<button type="submit" name="submit">REGISTER</button><br><br>

		</form>

		<script>
			function checkfields()
			{
				if (document.getElementById("ecnum").value == "" || document.getElementById("regnum").value == "" || document.getElementById("seria").value == "" || document.getElementById("model").value == "" || document.getElementById("engine").value == "" || document.getElementById("consumpt").value == "" || document.getElementById("sp").value == "" || document.getElementById("dob").value == "" || document.getElementById("dod").value == "")
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
