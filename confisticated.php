<?php
	include_once 'header.php';
	include_once 'includes/dbh.inc.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>PC INVENTORY</h2>
		
		<?php
			if(isset($_SESSION['u_uid']))
			{
				echo "<marquee>You Are Logged In!!</marquee>";
				echo "<br><br><br>";
			}
		?>

		<?php

			$sql0 = "SELECT COUNT(mac) as 'countcomps' FROM confisticated";
			$result0 = mysqli_query($conn, $sql0);
			$resultCheck0 = mysqli_num_rows($result0);
			$row0 = mysqli_fetch_array($result0);				
				
			echo "<b><font color='brown' size='9'><center>PC's Confisticated: " . $row0['countcomps'] . '</center></font></b>';

		?>

		<form action="includes/confisticated.inc.php" method="POST" class="signup-form" onsubmit="checkfields()">

			<input type="text" id="mac" name="mac" placeholder="MAC ADRESS"><br>
			<input type="text" id="seria" name="seria" placeholder="SERIAL NUMBER"><br>

			<button type="submit" name="submit">CONFISTICAT</button><br><br>

		</form>

		<script>
			function checkfields()
			{
				if (document.getElementById("mac").value == "" || document.getElementById("seria").value == "")
				{
					alert("Please fill in all fields");
					return false;
				}
			}
		</script>

		<?php

			$sql10 = "SELECT * FROM confisticated";
			$result10 = mysqli_query($conn, $sql10);
			$resultCheck10 = mysqli_num_rows($result10);

			if($resultCheck10 > 0)
			{
				echo "<a href='#birds'>SHOW AVAILABLE COMPUTERS</a><br><br>";

				echo 	'<form action="confisticated.php" method="POST" class="signup-form" onsubmit="checkfields3()">
							<input type="text" id="search" name="search" placeholder="SEARCH THE INVENTORY BY MAC ADDRESS">
						
							<br>
							<br>
						
							<button type="submit" name="submitit">SEARCH</button>
						</form>

						<script>
							function checkfields3()
							{
								if (document.getElementById("search").value == "")
								{
									alert("Please fill in all fields");
									return false;
								}
							}
						</script>';																
			}

			if (isset($_POST['submitit'])) 
			{
				
				$search = mysqli_real_escape_string($conn, $_POST['search']);

				if (empty($search))
				{
					header("Location: confisticated.php?search=empty");
					exit();
				}

				$sql619 = "SELECT * FROM confisticated WHERE mac = '$search'";
				$result619 = mysqli_query($conn, $sql619);
				$resultCheck619 = mysqli_num_rows($result619);
				$row619 = mysqli_fetch_assoc($result619);					

				if($resultCheck619 < 1)
				{
					header("Location: confisticated.php?search=dontexist");
					exit();
				}

				$sql1 = "SELECT * FROM maintain WHERE mac = '$search'";
				$result1 = mysqli_query($conn, $sql1);
				$resultCheck1 = mysqli_num_rows($result1);

				if($resultCheck1 < 1)
				{
					$sql007 = "SELECT * FROM confisticated WHERE mac = '$search'";
					$result007 = mysqli_query($conn, $sql007);

					echo '<br><br><br><br><table border="2" align="center">
					<th colspan="7"><font color="white">Confisticated Computer: </font><font color="purple">' . $row619['seria'] . '</font></th>
						<tr>
							<td><b>MAC ADRESS</b></td>
							<td><b>SERIAL NUMBER</b></td>
							<td><b>PC MODEL</b></td>					
							<td><b>STOCK PRICE</b></td>
							<td><b>DATE BOUGHT</b></td>
							<td><b>SALVAGE VALUE</b></td>
						</tr>';

						while ($row007 = mysqli_fetch_assoc($result007)) 
						{
							echo '	<tr>
										<td>' . $row007['mac'] . '</td>
										<td>' . $row007['seria'] . '</td>
										<td>' . $row007['model'] . '</td>
										<td>' . $row007['sp'] . '</td>
										<td>' . $row007['dob'] . '</td>
										<td>' . $row007['salvage'] . '</td>
									</tr>';
						}
						echo '</table>';
				}

				if($resultCheck1 > 0)
				{
					echo 	'	<br><br><br><br><a name="birds"><table border="2" align="center">
									<th colspan="7"><font color="white">Maintainance Report: </font><font color="red">' . $row619['seria'] . '</font></th>
										<tr>
											<td><b>EC-NUMBER</b></td>
											<td><b>MAC ADDRESS</b></td>
											<td><b>PC MODEL</b></td>
											<td><b>HISTORY</b></td>
											<td><b>REPAIR COST</b></td>
											<td><b>REPAIRED BY</b></td>					
											<td><b>DATE FIXED</b></td>
										</tr>';
					while ($row1 = mysqli_fetch_assoc($result1)) 
					{
						echo '			<tr>
											<td>' . $row1['ecnum'] . '</td>
											<td>' . $row1['mac'] . '</td>
											<td>' . $row1['model'] . '</td>
											<td>' . $row1['history'] . '</td>
											<td>' . $row1['cost'] . '</td>
											<td>' . $row1['repaired'] . '</td>
											<td>' . $row1['fix'] . '</td>
										</tr>';
					}
					echo '		</table>';
				}				
			}

			echo '<br><br><br><br><a name="birds"><table border="2" align="center">
					<th colspan="7"><font color="purple">Available Computers</font></th>
						<tr>
							<td><b>MAC ADRESS</b></td>
							<td><b>SERIAL NUMBER</b></td>
							<td><b>PC MODEL</b></td>					
							<td><b>STOCK PRICE</b></td>
							<td><b>DATE BOUGHT</b></td>
							<td><b>SALVAGE VALUE</b></td>
						</tr>';
			while ($row10 = mysqli_fetch_assoc($result10)) 
			{
				echo '	<tr>
							<td>' . $row10['mac'] . '</td>
							<td>' . $row10['seria'] . '</td>
							<td>' . $row10['model'] . '</td>
							<td>' . $row10['sp'] . '</td>
							<td>' . $row10['dob'] . '</td>
							<td>' . $row10['salvage'] . '</td>
						</tr>';
			}
			echo "</table><br><br>";
			
		?>
		
		<form action="includes/sell.inc.php" method="POST" class="signup-form" onsubmit="checkfields4()">
			<input type="text" id="searched" name="searched" placeholder="SEARCH THE INVENTORY BY MAC ADDRESS">						
			<button type="submit" name="submitme">SELL PC</button>
		</form>

		<script>
			function checkfields4()
			{
				if (document.getElementById("searched").value == "")
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