<?php
	include_once 'header.php';
	include_once 'includes/dbh.inc.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>PC REGISTER</h2>
		
		<?php
			if(isset($_SESSION['u_uid']))
			{
				echo "<marquee>You Are Logged In!!</marquee>";
				echo "<br><br>";
			}
		?>

		<?php

			$sql0 = "SELECT COUNT(ecnum) as 'countcomps' FROM register";
			$result0 = mysqli_query($conn, $sql0);
			$resultCheck0 = mysqli_num_rows($result0);
			$row0 = mysqli_fetch_array($result0);				
				
			echo "<br><b><font color='brown' size='9'><center>PC's Registered: " . $row0['countcomps'] . '</center></font></b>';

		?>

		<form action="includes/register.inc.php" method="POST" class="signup-form" onsubmit="checkfields()">

			<input type="text" id="ecnum" name="ecnum" placeholder="EC-NUMBER"><br>
			<input type="text" id="mac" name="mac" placeholder="MAC ADRESS"><br>
			<input type="text" id="seria" name="seria" placeholder="SERIAL NUMBER"><br>
			<input type="text" id="model" name="model" placeholder="PC MODEL"><br>
			<input type="text" id="intel" name="intel" placeholder="PROCESSOR"><br>
			<input type="text" id="bos" name="bos" placeholder="BUILT-IN OPERATING SYSTEM"><br>
			<input type="text" id="bits" name="bits" placeholder="SYSTEM TYPE"><br>			
			<input type="text" id="ram" name="ram" placeholder="RAM"><br>
			<input type="text" id="sp" name="sp" placeholder="STOCK PRICE"><br>
			<input type="date" id="dob" name="dob" placeholder="DATE BOUGHT"><br>
			<input type="date" id="dod" name="dod" placeholder="EXPIRY DATE"><br>
			
			<button type="submit" name="submit">REGISTER</button><br><br>

		</form>

		<script>
			function checkfields()
			{
				if (document.getElementById("ecnum").value == "" || document.getElementById("mac").value == "" || document.getElementById("seria").value == "" || document.getElementById("model").value == "" || document.getElementById("intel").value == "" || document.getElementById("bos").value == "" || document.getElementById("bits").value == "" || document.getElementById("ram").value == "" || document.getElementById("sp").value == "" || document.getElementById("dob").value == "" || document.getElementById("dod").value == "")
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