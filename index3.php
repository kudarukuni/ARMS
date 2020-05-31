<?php
	//include_once 'header.php';
	include_once 'includes/dbh.inc.php';
?>

<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>www.arms.com</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>

<header>
	<nav>

		<div class="main-wrapper">
			<ul>
				<li><a href="index3.php"><b><font size = "">HOME</font></b></a></li>
				<li>

					<?php
						if (isset($_SESSION['u_id'])) 
						{
							echo'<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="register1.php">REGISTRATION</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="maintain1.php">MAINTANANCE</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="report1.php">QUERY</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="analysis1.php">ANALYSIS</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="confisticated1.php">INVENTORY</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="library1.php">LIBRARY</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="printform1.php">PRINT FORM</a></b>';
						}
					?>

				</li>
			</ul>

			<div class="nav-login">
				
				<?php
					if (isset($_SESSION['u_id'])) 
					{
						echo '	<form action="includes/logout.inc.php" method="POST">
									<button type="submit" name="submit" style="cursor:pointer; display: block; margin: 0 auto; width: 97%;	height: 25px;	border: none; background-color: #222; font-family: arial; font-size: 16px; color: #fff;">LOGOUT</button>
								</form>';
					}
					else
					{
						echo '	<form action="includes/login.inc.php" method="POST" onsubmit="checkfields()">
									<input type="text" id="uid" name="uid" placeholder="Username / E-mail">
									<input type="password" id="pwd" name="pwd" placeholder="Password">
									
									<button type="submit" name="submit" style="cursor:pointer; display: block; margin: 0 auto; width: 17%;	height: 30px;	border: none; background-color: #222; font-family: arial; font-size: 16px; color: #fff;">LOGIN</button>
								</form>

								<script>
									function checkfields()
									{
										if (document.getElementById("uid").value == "" || document.getElementById("pwd").value == "")
										{
											alert("Please fill in all fields");											
											return false;
										}
									}
								</script>';
								
								//<a href="sigup.php">SIGN UP</a>';
					}
				?>				
				
			</div>

		</div>
	</nav>
</header>

<section class="main-container">
	<div class="main-wrapper">
		<h2><b>ASSET MANAGEMENT SYSTEM</b></a></h2>

		<?php
			if(isset($_SESSION['u_uid']))
			{
				echo "<marquee>You Are Logged In!!</marquee><br><br>";

				echo "<br><br><a href='index2.php'><b>CHANGE DOMAIN</b></a><br><br>";
			
				$sql9 = "SELECT * FROM register1";
				$result9 = mysqli_query($conn, $sql9);
				$row9 = mysqli_fetch_assoc($result9);

				$exp_date = $row9['dod'];
				$today_date = date('Y/m/d');

				$sql7 = "SELECT * FROM register1 WHERE dod < '$today_date'";
				$result7 = mysqli_query($conn, $sql7);
				$resultCheck7 = mysqli_num_rows($result7);

				$sql19 = "SELECT COUNT(dod) as 'expiredcomps' FROM register1 WHERE dod < '$today_date'";
				$result19 = mysqli_query($conn, $sql19);
				$resultCheck19 = mysqli_num_rows($result19);
				$row19 = mysqli_fetch_assoc($result19);			
							
				if ($resultCheck7 > 0 || $resultCheck19 > 0)
				{
					echo "<br><br><b><font size='9' color='red'><center>Vehicle's Expired : " . $row19['expiredcomps'] . "</center></font></b>";

					echo '<table border="2" align="center">
								<th colspan="5"><font color="white">Expired Vehicles</font></th>
									<tr>
										<td><b>EC-NUMBER</b></td>
										<td><b>REGISTRATION NUMBER</b></td>
										<td><b>SERIAL NUMBER</b></td>
										<td><b>VEHICLES MODEL</b></td>
										<td><b>EXPIRY DATE</b></td>
									</tr>';		
					while($row7 = mysqli_fetch_assoc($result7)) 
					{
						echo 		'<tr>
										<td>' . $row7['ecnum'] . '</td>
										<td>' . $row7['regnum'] . '</td>
										<td>' . $row7['seria'] . '</td>
										<td>' . $row7['model'] . '</td>
										<td>' . $row7['dod'] . '</td>
									</tr>';
					}
					echo "<br></table><br><br><br><br>";
				}
					
				echo 	'<form action="register1.php" method="POST" class="signup-form">
							<button type="submit" name="register1">REGISTER</button>
						</form>

						<form action="maintain1.php" method="POST" class="signup-form">
							<button type="submit" name="update">UPDATE</button>
						</form>

						<form action="report1.php" method="POST" class="signup-form">
							<button type="submit" name="search">SEARCH</button>
						</form>

						<form action="analysis1.php" method="POST" class="signup-form">
							<button type="submit" name="submit">SCRAP <br> VALUE</button>
						</form>

						<form action="confisticated1.php" method="POST" class="signup-form">
							<button type="submit" name="submit">CONFISTICATE</button>
						</form>

						<form action="library1.php" method="POST" class="signup-form">
							<button type="submit" name="submit">RETURN</button>
						</form>

						<form action="printform1.php" method="POST" class="signup-form">
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

