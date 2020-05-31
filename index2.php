<?php
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
				<li><a href="index2.php"><b><font size = "">HOME</font></b></a></li>
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
		<h2>ASSET MANAGEMENT SYSTEM</h2>

		<?php
			if(isset($_SESSION['u_uid']))
			{
				echo "<marquee>You Are Logged In!!</marquee><br><br><br><br><br>";
					
				echo 	'<form action="index.php" method="POST" class="signup-form">
							<button type="submit" name="contosocomps">CONTOSO </br> COMPS</button>
						</form>

						<form action="index3.php" method="POST" class="signup-form">
							<button type="submit" name="contosocars">CONTOSO </br> CARS</button>
						</form>

						<form action="includes/contosofurniture.inc.php" method="POST" class="signup-form">
							<button type="submit" name="contosofurniture">CONTOSO </br> FURNITURE</button>
						</form>

						<form action="includes/contososupplies.inc.php" method="POST" class="signup-form">
							<button type="submit" name="contososupplies">CONTOSO </br> SUPPLIES</button>
						</form>';
			}
		?>

		<?php

			
		?>

	</div>
</section>

<?php
	include_once 'footer.php';
?>

