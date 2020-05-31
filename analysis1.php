<?php
	include_once 'header1.php';
?>

<section class="main-container">
		<div class="main-wrapper">
			<h2><center>ANALYSIS</center></h2>

			<?php
				if(isset($_SESSION['u_uid']))
				{
					echo '<marquee>You Are Logged In!!</marquee>';
					echo "<br><br><br>";
				}
			?>

			<p><center>DEPRECIATION = 25%</center></p>

			<form class="signup-form" action="analysis1.php" method="POST" onsubmit="checkfields()">
								
				<input type="text" name="rc" id="rc" placeholder="Repair Costs">
				<input type="text" name="pp" id="pp" placeholder="Purchase Price">
				<input type="text" name="ls" id="ls" placeholder="Lifespan">								
																								
				<button type="submit" name="submit">SCRAP <br> VALUE</button>
			</form>

			<script>
				function checkfields()
				{
					if (document.getElementById("rc").value == "" || document.getElementById("pp").value == "" || document.getElementById("ls").value == "")
					{
						alert("Please fill in all fields");
						return false;
					}
				}
			</script>

			<?php
				if (isset($_POST['submit']))
				{
					if (!empty($_POST['rc']) || !empty($_POST['pp']) || !empty($_POST['ls']))
					{
						$repaircost = $_POST['rc'];
						$purchaseprice = $_POST['pp'];
						$lifespan = $_POST['ls'];

						$dep = (1-0.25);
						$rate = pow($dep, $lifespan);

						$scrapvalue = $purchaseprice * $rate;

						$profitloss = $scrapvalue - $repaircost;

						echo "<br><br><br><b><font size='9' color='green'>Scrap Value = " . $scrapvalue . "</font></b>";					

						echo "<br><br><b><font size='9' color='red'>Profit / Loss = " . $profitloss . "</font></b>";
					
						echo "<br><br><br><br><br>Formula: </b><br><br>Scrap Value =  Purchase Price(1 - Depreciation Rate)^Lifespan<br><b>" . $scrapvalue . " = " . $purchaseprice . "(1 - 25%)^" . $lifespan . "</b>";
					}
				}
			?>

		</div>
	</section>

<?php
	include_once 'footer.php';
?>