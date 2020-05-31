<?php
	include_once 'header.php';
	include_once 'includes/dbh.inc.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2><b>ASSET MANAGEMENT SYSTEM</b></a></h2>

		<?php
			if(isset($_SESSION['u_uid']))
			{
				echo "<marquee>You Are Logged In!!</marquee><br><br>";

				echo "<br><br><a href='index2.php'><b>CHANGE DOMAIN</b></a><br><br>";
			
				$sql9 = "SELECT * FROM register";
				$result9 = mysqli_query($conn, $sql9);
				$row9 = mysqli_fetch_assoc($result9);

				$exp_date = $row9['dod'];
				$today_date = date('Y/m/d');

				$sql7 = "SELECT * FROM register WHERE dod < '$today_date'";
				$result7 = mysqli_query($conn, $sql7);
				$resultCheck7 = mysqli_num_rows($result7);

				$sql19 = "SELECT COUNT(dod) as 'expiredcomps' FROM register WHERE dod < '$today_date'";
				$result19 = mysqli_query($conn, $sql19);
				$resultCheck19 = mysqli_num_rows($result19);
				$row19 = mysqli_fetch_assoc($result19);			
							
				if ($resultCheck7 > 0 || $resultCheck19 > 0)
				{
					echo "<br><br><b><font size='9' color='red'><center>PC's Expired : " . $row19['expiredcomps'] . "</center></font></b>";

					echo '<table border="2" align="center">
								<th colspan="5"><font color="white">Expired Computers</font></th>
									<tr>
										<td><b>EC-NUMBER</b></td>
										<td><b>MAC ADDRESS</b></td>
										<td><b>SERIAL NUMBER</b></td>
										<td><b>PC MODEL</b></td>
										<td><b>EXPIRY DATE</b></td>
									</tr>';		
					while($row7 = mysqli_fetch_assoc($result7)) 
					{
						echo 		'<tr>
										<td>' . $row7['ecnum'] . '</td>
										<td>' . $row7['mac'] . '</td>
										<td>' . $row7['seria'] . '</td>
										<td>' . $row7['model'] . '</td>
										<td>' . $row7['dod'] . '</td>
									</tr>';
					}
					echo "<br></table><br><br><br><br>";
				}
					
				echo 	'<form action="register.php" method="POST" class="signup-form">
							<button type="submit" name="register">REGISTER</button>
						</form>

						<form action="maintain.php" method="POST" class="signup-form">
							<button type="submit" name="update">UPDATE</button>
						</form>

						<form action="report.php" method="POST" class="signup-form">
							<button type="submit" name="search">SEARCH</button>
						</form>

						<form action="analysis.php" method="POST" class="signup-form">
							<button type="submit" name="submit">SCRAP <br> VALUE</button>
						</form>

						<form action="confisticated.php" method="POST" class="signup-form">
							<button type="submit" name="submit">CONFISTICATE</button>
						</form>

						<form action="library.php" method="POST" class="signup-form">
							<button type="submit" name="submit">RETURN</button>
						</form>

						<form action="printform.php" method="POST" class="signup-form">
							<button type="submit" name="submit">SEND TO PRINT</button><br><br>
						</form>';
			}
            else
            {
                echo "	<p><center>Research Topic:</br>
							An investigation on the impact of Asset Management Systems on product life-span. Case study of ZESA Holdings.
						</p></center>";

				echo "	<center><img src='logo2.png' width='200' height='200'></center>";		

				echo "</br></br></br></br></br></br></br><p><center>KUDAKWASHE WILLIAM JAY YOU RUKUNI made this website copyright protected.</center></p>";
            }
		?>

		<?php

			
		?>

	</div>
</section>

<?php
	include_once 'footer.php';
?>

