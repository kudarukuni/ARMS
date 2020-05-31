<?php
	include_once 'header1.php';
	include_once 'includes/dbh.inc.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>ASSET REGISTER</h2>
		
		<?php
			if(isset($_SESSION['u_uid']))
			{
				echo "<marquee>You Are Logged In!!</marquee>";
				echo "<br><br><br>";
			}
		?>

<?php

	$sql0 = "SELECT COUNT(seria) as 'countseria' FROM assetregister1";
	$result0 = mysqli_query($conn, $sql0);
	$resultCheck0 = mysqli_num_rows($result0);
	$row0 = mysqli_fetch_array($result0);				
				
	echo "<br><b><font color='brown' size='9'><center>Assets Registered: " . $row0['countseria'] . '</center></font></b>';

?>

	<form action="includes/assetregister1.inc.php" method="POST" class="signup-form" onsubmit="checkfields()">

		<input type="text" id="seria" name="seria" placeholder="SERIAL NUMBER"><br>
		<input type="text" id="model" name="model" placeholder="ASSET MODEL"><br>
		<input type="date" id="dob" name="dob" placeholder="DATE BOUGHT"><br>
		<input type="text" id="sp" name="sp" placeholder="STOCK PRICE"><br>
		
		<button type="submit" name="submit">REGISTER</button><br><br>

	</form>

	<script>
		function checkfields()
		{
			if (document.getElementById("seria").value == "" || document.getElementById("model").value == "" || document.getElementById("dob").value == "" || document.getElementById("sp").value == "")
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